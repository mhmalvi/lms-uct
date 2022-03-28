<template>
  <div class="row" v-if="isLoading">
    <div class="col-md-12 text-center">
      <h4><i class="fas fa-circle-notch fa-spin"></i></h4>
    </div>
  </div>
  <div
    class="row d-flex justify-content-center"
    v-else-if="classrooms.length == 0"
  >
    <h5>No classroom here</h5>
  </div>
  <div v-else class="row">
    <classroom-item
      v-for="(classroom, index) in classrooms"
      v-bind:key="index"
      :classroom="classroom"
      @classroomDelete="handleClassroomDelete"
    />

    <nav
      class="col-12 d-flex justify-content-center"
      aria-label="Page navigation example"
      v-if="classrooms.length > itemsPerPage"
    >
      <ul class="pagination">
        <li
          class="page-item"
          v-for="(page, key) in links"
          :key="key"
          :class="page.url == null ? 'disabled' : ''"
        >
          <a
            class="page-link"
            href="javascript:void(0)"
            @click="getLink(page.url)"
            v-html="page.label"
          ></a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import axios from "axios";
import { ref, onMounted } from "vue";
import ClassroomItem from "./ClassroomItem.vue";

export default {
  components: { ClassroomItem },
  setup() {
    const itemsPerPage = ref(12);
    const classrooms = ref([]);
    const isLoading = ref(false);
    const links = ref();
    const action_link = "admin/classrooms/all";

    const getClassrooms = (link) => {
      isLoading.value = true;
      axios
        .get(link, {
          params: {
            items: itemsPerPage.value,
          },
        })
        .then((res) => {
          classrooms.value = res.data.data;
          links.value = res.data.meta.links;
        })
        .finally(() => {
          isLoading.value = false;
        });
    };

    const getLink = (action) => {
      getClassrooms(action);
    };

    onMounted(() => {
      getClassrooms(action_link);
    });

    const handleClassroomDelete = () => {
      getClassrooms(action_link);
    };

    return {
      classrooms,
      isLoading,
      links,
      itemsPerPage,
      getLink,
      handleClassroomDelete,
    };
  },
};
</script>
