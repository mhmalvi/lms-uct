<template>
  <div class="py-5">
    <div class="card table-responsive">
      <table class="table">
        <thead class="bg-light">
          <tr>
            <th>#</th>
            <th>Course Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody v-if="isLoading">
          <tr>
            <td colspan="12" class="text-center">
              <b>Loading...</b>
            </td>
          </tr>
        </tbody>
        <tbody v-else-if="courses.length == 0">
          <tr>
            <td colspan="12" class="text-center">
              <b>No course found! </b>
            </td>
          </tr>
        </tbody>
        <tbody v-else>
          <tr v-for="(course, index) in courses" v-bind:key="index">
            <td>{{ index + 1 }}</td>
            <td>
              <div class="row mx-1">
                <div class="d-flex align-items-center">
                  <img class="rounded" :src="course.thumbnail" width="50" />
                </div>
                <div class="ml-3">
                  {{ course.title }}
                  <small v-if="!course.publish" class="text-muted">
                    &mdash; Draft
                  </small>
                  <div class="pt-1">
                    <a :href="getEditLink(course)" class="btn text-primary pl-0"
                      >Edit</a
                    >
                    <a
                      class="btn text-primary pl-0"
                      @click="deleteCourse(course)"
                      >Delete</a
                    >
                  </div>
                </div>
              </div>
            </td>
            <td>{{ course.category.title }}</td>
            <td>{{ course.publish_status }}</td>
            <td>{{ course.created_at }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from "vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  setup() {
    const courses = ref([]);
    const itemsPerPage = ref(5);
    const search = ref("");
    const isLoading = ref(false);

    onMounted(() => {
      getCourses();
    });

    const getCourses = () => {
      isLoading.value = true;
      axios
        .get("admin/courses/all", {
          params: {
            items: itemsPerPage.value,
            search: search.value,
          },
        })
        .then((res) => {
          courses.value = res.data.data;
        })
        .catch((error) => {
          console.error(error);
        })
        .finally(() => {
          isLoading.value = false;
        });
    };

    const deleteCourse = (course) => {
      Swal.fire({
        icon: "warning",
        title: "Are you sure you want to delete this course?",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it",
      }).then((res) => {
        if (res.isConfirmed) {
          axios
            .post("admin/courses/" + course.uuid, {
              _method: "DELETE",
            })
            .then((res) => {
              Swal.fire({
                icon: "success",
                title: res.data.message,
              });
              getCourses();
            })
            .catch((error) => {
              Swal.fire({
                icon: "error",
                title: "Failed to delete the course",
              });
              console.error(error);
            });
        }
      });
    };

    const getEditLink = (course) => {
      return "/admin/courses/edit/" + course.code;
    };

    return {
      courses,
      isLoading,
      deleteCourse,
      getEditLink,
    };
  },
};
</script>
