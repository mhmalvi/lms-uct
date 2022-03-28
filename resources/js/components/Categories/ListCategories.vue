<template>
  <div>
    <div class="card">
      <table class="table table-responsive">
        <thead>
          <tr>
            <th width="10%">#</th>
            <th width="10%">Thumbnail</th>
            <th width="20%">Category</th>
            <th width="40%">Description</th>
            <th Width="20%">Created At</th>
          </tr>
        </thead>
        <tbody v-if="isLoading">
          <tr>
            <td colspan="12" class="text-center">
              <b>Loading...</b>
            </td>
          </tr>
        </tbody>
        <tbody v-else-if="categories.length == 0">
          <tr>
            <td colspan="12" class="text-center">
              <b>No category found! </b>
            </td>
          </tr>
        </tbody>
        <tbody v-else>
          <tr v-for="(category, index) in categories" v-bind:key="index">
            <td>{{ index + 1 }}</td>
            <td>
              <img class="rounded" :src="category.thumbnail_url" width="50" />
            </td>
            <td>
              {{ category.title }}
              <div class="pt-1">
                <a :href="getEditLink(category)" class="text-primary mr-2"
                  >Edit</a
                >
                <a
                  href="javascript:void(0)"
                  class="text-primary mr-2"
                  @click="deleteCategory(category, index)"
                  >Delete</a
                >
              </div>
            </td>
            <td>{{ category.description }}</td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import { ref, onMounted } from "vue";
import { useStore } from "vuex";

export default {
  setup() {
    const isLoading = ref(false);
    const itemsPerPage = ref(5);
    const search = ref("");
    const categories = ref([]);

    const store = useStore();

    const deleteCategory = (category, index) => {
      Swal.fire({
        icon: "warning",
        title: "Are you sure you want to delete this category?",
        showCancelButton: true,
        cancelButtonText: "No, cancel!",
        confirmButtonText: "Yes, delete it!",
      }).then((res) => {
        if (res.isConfirmed) {
          axios
            .post("/admin/categories/" + category.uuid, {
              _method: "DELETE",
            })
            .then((res) => {
              Swal.fire({
                icon: "success",
                title: res.data.message,
              });

              categories.value.splice(index, 1);
            })
            .catch((err) => {
              Swal.fire({
                icon: "error",
                title: "Something went wrong!",
              });
              console.log(err);
            });
        }
      });
    };

    // fires on mount
    onMounted(() => {
      axios
        .get("admin/categories/list", {
          params: {
            items: itemsPerPage.value,
            search: search.value,
          },
        })
        .then((res) => {
          categories.value = res.data.data;
        });
    });

    // watch for new category creation, and then add it to list
    store.watch(
      (state, _) => {
        return state.courseCategories.newCategory;
      },
      (newVal, oldVal) => {
        if (!_.isEmpty(newVal)) {
          categories.value.unshift(newVal);
          store.commit("courseCategories/resetNewCategory");
        }
      }
    );

    const getEditLink = (category) => {
      return "/admin/categories/edit/" + category.slug;
    };

    return {
      isLoading,
      itemsPerPage,
      search,
      categories,
      deleteCategory,
      getEditLink,
    };
  },
};
</script>
