<template>
  <div>
    <div class="d-flex justify-content-center" v-if="isLoading">
      <h5 class="mt-5">
        <i class="fas fa-circle-notch fa-spin"></i>
      </h5>
    </div>
    <div
      class="d-flex justify-content-center"
      v-else-if="classrooms.length == 0"
    >
      <h5>No classrooms here</h5>
    </div>
    <div v-else>
      <div v-for="(classroom, index) in classrooms" :key="index">
        <classroom-item :classroom="classroom" />
      </div>
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
  </div>
</template>

<script>
import axios from "axios";
import { ref, onMounted } from "vue";
import ClassroomItem from "./ClassroomItemComponent.vue";

export default {
  components: { ClassroomItem },
  setup() {
    const classrooms = ref([]);
    const isLoading = ref(false);
    const itemsPerPage = ref(5);
    const links = ref([]);
    const action_link = "/classrooms/list";

    const getClassrooms = (link) => {
      isLoading.value = true;
      axios
        .get(link, {
          items: itemsPerPage.value,
        })
        .then((res) => {
          classrooms.value = res.data.data;
          links.value = res.data.meta.links;
        })
        .catch((err) => {
          console.log(err);

          Swal.fire({
            icon: "error",
            title: "Something went wrong while fetch classrooms!",
          });
        })
        .finally(() => (isLoading.value = false));
    };

    const getLink = (link) => {
      getClassrooms(link);
    };

    onMounted(() => {
      getClassrooms(action_link);
    });

    return {
      classrooms,
      isLoading,
      links,
      itemsPerPage,
      getLink,
    };
  },
};
</script>
