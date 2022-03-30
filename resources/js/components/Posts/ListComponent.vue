<template>
  <div class="mt-2">
    <div class="row" v-if="state.loading">
      <div class="col-md-12">
        <p class="text-center">
          <i class="fas fa-circle-notch fa-spin"></i>
          Loading
        </p>
      </div>
    </div>
    <div class="row" v-else-if="state.posts.length == 0">
      <div class="col-md-12">
        <h4 class="text-center text-muted">No post here</h4>
      </div>
    </div>
    <div class="row" v-else>
      <div class="col-md-8 mx-auto">
        <a
          :href="getPostLink(post.id)"
          v-for="(post, index) in state.posts"
          :key="index"
        >
          <div class="card">
            <div v-if="post.thumbnail_url" class="post-image-wrapper">
              <img
                :src="post.thumbnail_url"
                alt="Thumbnail"
                class="card-img-top"
              />
            </div>

            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h3>
                  {{ post.title }}
                </h3>
                <div v-if="admin">
                  <a
                    href="javascript:void(0)"
                    @click="attemptDelete(post.id)"
                    class="btn-link"
                    >Delete</a
                  >
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive, onMounted } from "vue";
import Swal from "sweetalert2";

export default {
  props: ["admin"],
  setup({ admin }) {
    const state = reactive({
      posts: [],
      loading: false,
      list_api: "/posts/all",
    });

    onMounted(() => {
      if (admin) state.list_api = "/admin" + state.list_api;
      getPosts();
    });

    const getPosts = async () => {
      state.loading = true;

      try {
        const response = await axios.get(state.list_api);

        state.posts = response.data.data;
      } catch (err) {
        Swal.fire({
          title: err.response.data.message,
        });
      } finally {
        state.loading = false;
      }
    };

    const attemptDelete = (post_id) => {
      if (confirm("Are you sure you want to delete this post?")) {
        deletePost(post_id);
      }
    };

    const deletePost = async (post_id) => {
      try {
        const response = await axios.delete(`/admin/posts/${post_id}`);

        Swal.fire({
          title: response.data.message,
          icon: "success",
        });

        getPosts();
      } catch (err) {
        Swal.fire({
          title: err.response.data.message,
          icon: "error",
        });
      }
    };

    const getPostLink = (post_id) => {
      return (admin ? "/admin" : "") + "/posts/" + post_id;
    };

    return {
      state,
      admin,
      attemptDelete,
      getPostLink,
    };
  },
};
</script>

<style scoped>
.post-image-wrapper {
  max-height: 200px;
  overflow: hidden;
}
</style>
