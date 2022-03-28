<template>
  <div class="mb-5">
    <div class="row mb-2">
      <div class="col-sm-12 col-md-6 col-lg-5">
        <div class="row">
          <div class="input-group">
            <select class="form-control" v-model="filtering.items">
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="20">20</option>
              <option value="50">50</option>
            </select>
            <select class="form-control" v-model="filtering.post_type">
              <option value="">All (Type)</option>
              <option value="news">News</option>
              <option value="notice">Notice</option>
            </select>
            <select class="form-control" v-model="filtering.post_status">
              <option value="">All (Status)</option>
              <option value="published">Published</option>
              <option value="unpublished">Unpublished</option>
            </select>
          </div>
        </div>
      </div>

      <div
        class="col-sm-12 col-md-5 col-lg-4 offset-md-1 offset-lg-3 mt-2 mt-md-0"
      >
        <div class="row">
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="Search by title..."
              v-model="filtering.search"
            />
            <div class="input-group-prepend" v-if="filtering.search.length > 0">
              <button class="btn btn-flush p-2" @click="filtering.search = ''">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card table-responsive">
        <table class="table">
          <thead class="bg-light">
            <tr>
              <th>#</th>
              <th width="120px">Image</th>
              <th>Title</th>
              <th class="text-center">Post Type</th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="isLoading">
              <td
                class="text-center"
                colspan="12"
                :height="blankTableHeight + 'px'"
              >
                <i class="fas fa-circle-notch fa-spin"></i>
              </td>
            </tr>
            <tr v-else-if="data.news_notices.length == 0">
              <td
                class="text-center"
                colspan="12"
                :height="blankTableHeight + 'px'"
              >
                No data found!
              </td>
            </tr>
            <tr
              v-else
              v-for="(news_notice, index) in data.news_notices"
              :key="index"
            >
              <td>{{ data.meta.from + index }}</td>
              <td>
                <img
                  class="thumbnail-image img-thumbnail"
                  :src="validateImage(news_notice.image)"
                  :alt="news_notice.title"
                />
              </td>
              <td>
                {{ news_notice.title }}
                <small class="text-muted">
                  {{ news_notice.is_published ? "" : " &mdash; Draft" }}
                </small>
                <div>
                  <a
                    :href="getEditLink(news_notice)"
                    class="btn text-primary pl-0"
                    >Edit</a
                  >
                  <a
                    href="javascript:void(0)"
                    class="btn text-primary pl-0"
                    @click.prevent="askForDelete(news_notice)"
                    >Delete</a
                  >
                </div>
              </td>
              <td class="text-center">
                <span
                  class="badge badge-primary badge-pill"
                  v-if="news_notice.post_type == 'news'"
                  >News</span
                >
                <span
                  class="badge badge-success badge-pill"
                  v-if="news_notice.post_type == 'notice'"
                  >Notice</span
                >
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <nav
        v-if="data.meta.last_page > 1"
        class="mt-3 col-12 d-flex justify-content-center"
        aria-label="Page navigation example"
      >
        <ul class="pagination">
          <li
            class="page-item"
            v-for="(page, key) in data.meta.links"
            :key="key"
            :class="page.url == null ? 'disabled' : ''"
          >
            <a
              class="page-link"
              href="javascript:void(0)"
              @click="getNewsNotices(page.url)"
              v-html="page.label"
            ></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
import { reactive, ref, onMounted, watch } from "vue";
import Swal from "sweetalert2";
import axios from "axios";
import _ from "lodash";

export default {
  setup() {
    const data = reactive({
      news_notices: [],
      meta: {},
      action_link: "/admin/news_notices/all",
    });
    const isLoading = ref(false);
    const filtering = reactive({
      items: 5,
      post_type: "",
      post_status: "",
      search: "",
    });
    const blankTableHeight = ref("400");

    onMounted(() => {
      getNewsNotices(data.action_link);
    });

    const handleFilterUpdate = _.debounce(() => {
      getNewsNotices(data.action_link);
    }, 500);

    watch(filtering, handleFilterUpdate, {
      deep: true,
    });

    const getNewsNotices = (action_link) => {
      isLoading.value = true;
      axios
        .get(action_link, {
          params: filtering,
        })
        .then((res) => {
          data.news_notices = res.data.data;
          data.meta = res.data.meta;
          console.log(data);
        })
        .catch((err) => {
          console.error(err.response);
        })
        .finally(() => {
          isLoading.value = false;
        });
    };

    const getEditLink = (item) => {
      return "/admin/news_notices/edit/" + item.slug;
    };

    const validateImage = (image) => {
      if (!image) {
        return "https://via.placeholder.com/150/DDDDDD";
      }
      return image;
    };

    const askForDelete = (item) => {
      Swal.fire({
        icon: "question",
        title: "Are you sure you want to delete this news/notice?",
        showCancelButton: true,
        cancelButtonText: "No, cancel it.",
        confirmButtonText: "Yes, delete it!",
      }).then((res) => {
        if (res.isConfirmed) {
          deleteItem(item);
        }
      });
    };

    const deleteItem = (item) => {
      axios
        .post("/admin/news_notices/destroy/" + item.id, {
          _method: "DELETE",
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });

          getNewsNotices(data.action_link);
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: err.response.data.message,
          });
        });
    };

    return {
      data,
      isLoading,
      filtering,
      blankTableHeight,
      getEditLink,
      validateImage,
      askForDelete,
      getNewsNotices,
    };
  },
};
</script>

<style>
.thumbnail-image {
  width: 70px;
  height: auto;
}
</style>
