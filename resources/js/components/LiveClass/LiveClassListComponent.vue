<template>
  <div class="row" v-if="state.isLoading">
    <div class="col-12 text-center">
      <h4>
        <i class="fas fa-circle-notch fa-spin"></i>
      </h4>
    </div>
  </div>
  <div
    class="row d-flex justify-content-center"
    v-else-if="state.liveClasses.length == 0"
  >
    <h5>No live class here</h5>
  </div>
  <div class="row" v-else>
    <LiveClassGridItemComponent
      v-for="(liveClass, index) in state.liveClasses"
      :key="index"
      :live_class="liveClass"
      @onDelete="refreshList()"
    />

    <nav
      v-if="state.pagination.meta.pageCount > 1"
      class="col-12 d-flex justify-content-center"
      aria-label="Page navigation example"
    >
      <ul class="pagination">
        <li
          class="page-item"
          :class="{ disabled: state.pagination.options.pageNumber == 1 }"
        >
          <a
            href="javascript:void(0)"
            @click.prevent="getPage(state.pagination.options.pageNumber - 1)"
            class="page-link"
          >
            Prev
          </a>
        </li>
        <li
          class="page-item"
          v-for="(value, key) in [
            ...Array(state.pagination.meta.pageCount).keys(),
          ]"
          :class="{ active: state.pagination.meta.pageNumber == value + 1 }"
          :key="key"
        >
          <a
            class="page-link"
            href="javascript:void(0)"
            @click.prevent="getPage(value + 1)"
          >
            {{ value + 1 }}
          </a>
        </li>
        <li
          class="page-item"
          :class="{
            disabled:
              state.pagination.options.pageNumber ==
              state.pagination.meta.pageCount,
          }"
        >
          <a
            href="javascript:void(0)"
            @click.prevent="getPage(state.pagination.meta.pageNumber + 1)"
            class="page-link"
          >
            Next
          </a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import LiveClassGridItemComponent from "./LiveClassGridItemComponent.vue";
import { reactive, onMounted } from "vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  components: {
    LiveClassGridItemComponent,
  },
  setup() {
    const state = reactive({
      isLoading: false,
      action_link: "/admin/liveclass/list",
      liveClasses: [],
      pagination: {
        meta: {
          pageCount: 0,
          pageNumber: 0,
          pageSize: 0,
          totalRecords: 0,
        },
        options: {
          perPage: 8,
          pageNumber: 1,
        },
      },
    });

    onMounted(() => {
      getLiveClasses();
    });

    const getLiveClasses = () => {
      state.isLoading = true;
      let timezone_offset = parseInt(new Date().getTimezoneOffset()) * 60;

      axios
        .get(state.action_link, {
          params: {
            ...state.pagination.options,
            timezoneOffset: timezone_offset,
          },
        })
        .then((res) => {
          state.liveClasses = res.data.data;

          state.pagination.meta.pageCount = res.data.page_count;
          state.pagination.meta.pageNumber = res.data.page_number;
          state.pagination.meta.pageSize = res.data.page_size;
          state.pagination.meta.totalRecords = res.data.total_records;
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: err.response.data.message,
          });
          console.error(err.response.data.error);
        })
        .finally(() => {
          state.isLoading = false;
        });
    };

    const getPage = (page_number) => {
      state.pagination.options.pageNumber = page_number;
      getLiveClasses();
    };

    const refreshList = () => {
      getLiveClasses();
    };

    return {
      state,
      getPage,
      refreshList,
    };
  },
};
</script>
