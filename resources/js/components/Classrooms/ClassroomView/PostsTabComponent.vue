<template>
  <div class="fadeIn">
    <div v-if="isAdmin()" class="mb-4">
      <publish-post-component />
    </div>

    <div class="">
      <post-list-component />
    </div>
  </div>
</template>

<script>
import PublishPostComponent from "../PublishPostComponent.vue";
import PostListComponent from "../../PostListComponent.vue";
import { useStore } from "vuex";

export default {
  components: { PublishPostComponent, PostListComponent },
  setup() {
    const store = useStore();

    const user_mode = store.getters.getUserMode;

    const isAdmin = () => {
      return user_mode == "admin";
    };

    return {
      isAdmin,
    };
  },
};
</script>

