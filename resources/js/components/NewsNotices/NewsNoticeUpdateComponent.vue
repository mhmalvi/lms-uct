<template>
  <div>
    <NewsNoticeFormComponent ref="form_component" @formSubmit="handleUpdate" />
  </div>
</template>

<script>
import NewsNoticeFormComponent from "./NewsNoticeFormComponent.vue";
import { ref, onMounted } from "vue";
import Swal from "sweetalert2";

export default {
  components: { NewsNoticeFormComponent },
  props: ["data"],
  setup({ data }) {
    const form_component = ref(0);
    let news_notice = null;

    onMounted(() => {
      news_notice = JSON.parse(data);
      form_component.value.setData(news_notice);
    });

    const handleUpdate = (data) => {
      axios
        .post("/admin/news_notices/edit/" + news_notice.id, {
          _method: "PATCH",
          ...data,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          if (res.data.redirect_back) {
            location.replace(res.data.index_page);
          }
        })
        .catch((err) => {
          form_component.value.fail(err.response);
        })
        .finally(() => {
          form_component.value.complete();
        });
    };

    return {
      form_component,
      handleUpdate,
    };
  },
};
</script>
