<template>
  <div>
    <NewsNoticeFormComponent ref="form_component" @formSubmit="handleCreate" />
  </div>
</template>

<script>
import { ref } from "vue";
import axios from "axios";
import Swal from "sweetalert2";
import NewsNoticeFormComponent from "./NewsNoticeFormComponent.vue";

export default {
  components: { NewsNoticeFormComponent },
  setup() {
    const form_component = ref(0);

    const handleCreate = (data) => {
      axios
        .post("/admin/news_notices/store", data)
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          form_component.value.formReset();
          scrollTo({
            top: 0,
            behavior: "smooth",
          });
        })
        .catch(({ response }) => {
          console.log(response);
          form_component.value.fail(response);
        })
        .finally(() => {
          form_component.value.complete();
        });
    };

    return {
      form_component,
      handleCreate,
    };
  },
};
</script>
