<template>
  <div>
    <CourseFormComponent
      ref="form_component"
      @formSubmit="handleCourseCreate"
    />
  </div>
</template>

<script>
import { ref } from "vue";
import CourseFormComponent from "./CourseFormComponent.vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  components: { CourseFormComponent },
  setup() {
    const form_component = ref(0);

    const handleCourseCreate = (data) => {
      axios
        .post("admin/courses", data)
        .then((res) => {
          form_component.value.success();

          Swal.fire({
            title: res.data.message,
            icon: "success",
            showCancelButton: true,
            confirmButtonText: `View course list`,
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = "/admin/courses";
            }
          });
        })
        .catch((err) => {
          form_component.value.fail(err.response);
        })
        .finally(() => {
          form_component.value.completed();
        });
    };

    return {
      form_component,
      handleCourseCreate,
    };
  },
};
</script>
<style>
.ql-container {
  height: 300px !important;
}
.swal2-styled.swal2-confirm {
  margin-right: 10px !important;
}
</style>
