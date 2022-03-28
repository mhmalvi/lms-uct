<template>
  <div class="alert alert-soft-accent alert-dismissible fade show" role="alert">
    <div class="d-flex flex-wrap align-items-start">
      <div class="mr-8pt">
        <i class="material-icons">error</i>
      </div>
      <div class="flex" style="min-width: 180px">
        <small class="text-black-100">
          <strong>Warning - </strong>{{ message }}
        </small>
      </div>
    </div>
  </div>
</template>
<script>
import { computed } from "vue";
export default {
  props: {
    message: String,
  },
  setup(props) {
    const message = computed(() => {
      return props.message;
    });

    return {
      message,
    };
  },
};
</script>
<style lang="">
</style>