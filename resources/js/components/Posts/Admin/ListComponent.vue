<template>
  <div>
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="80px">#</th>
                <th>Title</th>
              </tr>
            </thead>

            <tbody v-if="state.loading">
              <tr>
                <td class="text-center py-5" colspan="12">
                  <h6 class="text-muted">
                    <i class="fas fa-circle-notch fa-spin"></i>
                    Loading
                  </h6>
                </td>
              </tr>
            </tbody>

            <tbody v-else-if="state.posts.length == 0">
              <tr>
                <td class="text-center py-5" colspan="12">
                  <h6 class="text-muted">No posts here</h6>
                </td>
              </tr>
            </tbody>

            <tbody v-else>
              <tr v-for="(post, index) in state.posts" :key="index">
                <td>#</td>
                <td>
                  <a :href="getViewLink(post)" class="text-primary">
                    {{ post.title }}
                  </a>
                  <div>
                    <a :href="getEditLink(post)" class="btn-link">Edit</a>
                    <a
                      href="javascript:void(0)"
                      class="btn-link ml-2"
                      @click="attemptDelete(post)"
                      >Delete
                    </a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <nav
          aria-label="Page navigation"
          class="d-flex justify-content-center"
          v-if="!state.loading && state.posts.length > 0"
        >
          <ul class="pagination">
            <li
              class="page-item"
              v-for="(item, index) in state.pagination_links"
              :key="index"
              :class="{ disabled: item.url == null }"
            >
              <a
                class="page-link"
                href="javascript:void(0)"
                @click="getPage(item.url)"
                :class="{ active: item.active }"
                v-html="item.label"
              ></a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive, onMounted } from "vue";
import Swal from "sweetalert2";

export default {
  setup() {
    const state = reactive({
      loading: false,
      posts: [],
      pagination_options: {
        per_page: 10,
        current_page: 1,
      },
      pagination_links: [],
    });

    onMounted(() => {
      getPosts();
    });

    const getPosts = async (link = null) => {
      try {
        state.loading = true;

        const response = await axios.get(link ?? "/admin/posts/all", {
          params: {
            per_page: state.pagination_options.per_page,
          },
        });

        state.posts = response.data.data;
        state.pagination_options.current_page = response.data.meta.current_page;
        state.pagination_links = response.data.meta.links;
      } catch (err) {
        console.log(err);
        Swal.fire({
          icon: "error",
          title: err.response.data.message,
        });
      } finally {
        state.loading = false;
      }
    };

    const getViewLink = (post) => {
      return "/admin/posts/" + post.id;
    };

    const getEditLink = (post) => {
      return "/admin/posts/" + post.id + "/edit";
    };

    const attemptDelete = (post) => {
      if (confirm("Are you sure you want to delete this post?")) {
        deletePost(post);
      }
    };

    const deletePost = async (post) => {
      try {
        const response = await axios.delete("/admin/posts/" + post.id);

        Swal.fire({
          icon: "success",
          title: response.data.message,
        });

        getPosts();
      } catch (err) {
        Swal.fire({
          icon: "error",
          title: err.response.data.message,
        });
      }
    };

    const getPage = (link) => {
      getPosts(link);
    };

    return {
      state,
      getViewLink,
      getEditLink,
      attemptDelete,
      getPage,
    };
  },
};
</script>
