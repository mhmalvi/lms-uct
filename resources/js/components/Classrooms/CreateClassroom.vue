<template>
  <div>
    <ClassroomFormComponent ref="form_component" @formSubmit="handleCreate" />
  </div>
</template>
<script>
import Swal from "sweetalert2";
import ClassroomFormComponent from "./ClassroomFormComponent.vue";
import { ref } from "vue";

export default {
  components: {
    ClassroomFormComponent,
  },
  setup() {
    const form_component = ref(0);

    const handleCreate = (data) => {
      axios
        .post("/admin/classrooms", data)
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          form_component.value.success();
        })
        .catch((err) => {
          if (!err.response.data.errors) {
            Swal.fire({
              icon: "error",
              title: "Something went wrong!",
              text: err.response.data.message,
            });
          }
          form_component.value.fail(err.response.data);
        })
        .finally(() => {
          form_component.value.completed();
        });
    };

    return {
      form_component,
      handleCreate,
    };
  },
};
</script>
