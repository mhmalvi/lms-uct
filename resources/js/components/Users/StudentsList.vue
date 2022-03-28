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
          <tbody v-else-if="students.length == 0">
            <td class="text-center" colspan="12">
              <h6>No student found</h6>
            </td>
          </tbody>
          <tbody v-else>
            <tr v-for="(student, index) in students" v-bind:key="index">
              <td>{{ index + 1 }}</td>
              <td>
                <div class="d-flex">
                  <div>
                    <img class="rounded" src="https://via.placeholder.com/30" />
                  </div>
                  <div class="ml-2">
                    <span>
                      {{ student.username }}
                    </span>
                    <div class="pt-3 action-links">
                      <a
                        :href="'/admin/students/edit/' + student.username"
                        class="text-primary"
                        >Edit</a
                      >
                      <a
                        href="javascript:void(0)"
                        class="text-primary"
                        @click.prevent="handleUserDelete(student)"
                        >Delete</a
                      >
                    </div>
                  </div>
                </div>
              </td>
              <td></td>
              <td>{{ student.email }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted } from "@vue/runtime-core";
import axios from "axios";
import Swal from "sweetalert2";
import { ref } from "vue";

export default {
  setup() {
    const students = ref([]);
    const itemsPerPage = ref(5);
    const isLoading = ref(false);

    const getStudents = () => {
      isLoading.value = true;
      axios
        .get("admin/students/all", {
          params: {
            items: itemsPerPage.value,
          },
        })
        .then((res) => {
          students.value = res.data.data;
        })
        .catch((error) => {
          console.error(error);
        })
        .finally(() => {
          isLoading.value = false;
        });
    };

    const handleUserDelete = (student) => {
      Swal.fire({
        icon: "warning",
        title: "Are you sure you want to delete this student?",
        confirmButtonText: "Yes, delete it!",
        showCancelButton: true,
        cancelButtonText: "No, Cancel",
      }).then((res) => {
        if (res.isConfirmed) {
          axios
            .post("admin/students/" + student.uuid, {
              _method: "DELETE",
            })
            .then((res) => {
              Swal.fire({
                icon: "success",
                title: res.data.message,
              });
              getStudents();
            })
            .catch((error) => {
              Swal.fire({
                icon: "error",
                title: "Something went wrong!",
              });
              console.error(error);
            });
        }
      });
    };
    onMounted(() => {
      getStudents();
    });

    return {
      students,
      handleUserDelete,
      isLoading,
    };
  },
};
</script>
<style scoped>
</style>
