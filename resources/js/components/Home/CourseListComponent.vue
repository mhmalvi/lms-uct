<template>
  <div>
    <div v-if="isLoading" class="row d-flex justify-content-center py-4">
      <h5>
        <i class="fas fa-circle-notch fa-spin"></i>
      </h5>
    </div>
    <div class="row card-group-row" v-else>
      <course-item-component
        v-for="(course, index) in courses"
        :key="index"
        :course="course"
      />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CourseItemComponent from "./CourseItemComponent.vue";
import { ref } from "vue";

export default {
  components: { CourseItemComponent },
  setup() {
    const isLoading = ref(true);
    const courses = ref([]);
    axios
      .get("/api/courses", {
        params: {
          items: 8,
        },
      })
      .then((res) => {
        courses.value = res.data.data;
      })
      .finally(() => (isLoading.value = false));

    return {
      courses,
      isLoading,
    };
  },
};
</script>
