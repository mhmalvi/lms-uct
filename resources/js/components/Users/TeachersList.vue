<template>
  <div class="py-5">
    <div class="card">
      <div class="table-responsive">
        <table class="table">
          <thead class="bg-light">
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Full Name</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody v-if="isLoading">
            <tr>
              <td class="text-center" colspan="12">
                <h6>Loading...</h6>
              </td>
            </tr>
          </tbody>
          <tbody v-else-if="teachers.length == 0">
            <tr>
              <td class="text-center" colspan="12">
                <h6>No teacher found</h6>
              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr v-for="(teacher, index) in teachers" v-bind:key="index">
              <td>{{ index + 1 }}</td>
              <td>
                <div class="d-flex">
                  <div>
                    <img class="rounded" src="https://via.placeholder.com/30" />
                  </div>
                  <div class="ml-2">
                    <span>
                      {{ teacher.username }}
                    </span>
                    <div class="pt-1">
                      <a
                        :href="'/admin/teachers/edit/' + teacher.username"
                        class="btn text-primary pl-0"
                        >Edit</a
                      >
                      <a
                        class="btn text-primary pl-0"
                        @click.prevent="handleUserDelete(teacher)"
                        >Delete</a
                      >
                    </div>
                  </div>
                </div>
              </td>
              <td></td>
              <td>{{ teacher.email }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import { onMounted, ref } from "vue";

export default {
  setup() {
    const teachers = ref([]);
    const isLoading = ref(false);
    const itemsPerPage = ref(5);

    const getTeachers = () => {
      isLoading.value = true;
      axios
        .get("admin/teachers/all", {
          params: {
            items: itemsPerPage.value,
          },
        })
        .then((res) => {
          teachers.value = res.data.data;
        })
        .catch((error) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong while fetching teachers!",
            text: error.response.data.message,
          });
        })
        .finally(() => {
          isLoading.value = false;
        });
    };

    const handleUserDelete = (teacher) => {
      Swal.fire({
        icon: "warning",
        title: "Are you sure you want to delete this instructor?",
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel it.",
      }).then((res) => {
        if (res.isConfirmed) {
          deleteUser(teacher);
        }
      });
    };

    const deleteUser = (teacher) => {
      axios
        .post("admin/teachers/" + teacher.uuid, {
          _method: "DELETE",
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });

          getTeachers();
        })
        .catch((error) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong!",
            text: error.response.data.message,
          });
        });
    };

    onMounted(() => {
      getTeachers();
    });

    return {
      teachers,
      isLoading,
      handleUserDelete,
    };
  },
};
</script>
