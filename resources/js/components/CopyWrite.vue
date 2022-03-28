<template>
  <span>{{ year }}</span>
</template>
<script>
import { ref, onMounted } from "vue";
export default {
  setup() {
    const year = ref("");

    onMounted(() => {
      year.value = new Date().getFullYear();
    });

    return {
      year,
    };
  },
};
</script>
<style>
</style>