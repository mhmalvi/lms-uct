<template>
  <div>
    <LiveClassFormComponent ref="form_component" @formSubmit="handleSubmit" />
  </div>
</template>

<script>
import { reactive, ref } from "vue";
import LiveClassFormComponent from "./LiveClassFormComponent.vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  components: { LiveClassFormComponent },
  setup() {
    const state = reactive({});
    const form_component = ref(0);

    const handleSubmit = (data) => {
      axios
        .post("/admin/liveclass/store", data)
        .then((res) => {
          form_component.value.success();

          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
        })
        .catch((err) => {
          form_component.value.fail(err.response.data);
        })
        .finally(() => {
          form_component.value.completed();
        });
    };

    return {
      state,
      form_component,
      handleSubmit,
    };
  },
};
</script>
