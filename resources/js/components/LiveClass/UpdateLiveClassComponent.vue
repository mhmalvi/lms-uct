<template>
  <div>
    <LiveClassFormComponent
      ref="form_component"
      :data="state.liveClass"
      @formSubmit="handleSubmit"
    />
  </div>
</template>

<script>
import { reactive, ref } from "vue";
import LiveClassFormComponent from "./LiveClassFormComponent.vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  props: ["data"],
  components: { LiveClassFormComponent },
  setup({ data }) {
    const state = reactive({
      liveClass: {},
    });

    const form_component = ref(0);

    state.liveClass = JSON.parse(data);

    const handleSubmit = (data) => {
      axios
        .patch("/admin/liveclass/update/" + state.liveClass.id, data)
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          form_component.value.success(false);
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: err.response.data.message,
          });
          console.log(err.response.data.error);
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
