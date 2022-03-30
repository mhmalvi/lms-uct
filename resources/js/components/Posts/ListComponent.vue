<template>
  <div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="(post, index) in state.posts" :key="index">
                    <td>#</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive } from "vue";

export default {
  setup() {
    const state = reactive({
      posts: [],
    });

    const getPosts = async () => {
      axios.get("/api/posts");
      state.posts = response.data.data;
    };

    return {
      state,
    };
  },
};
</script>
