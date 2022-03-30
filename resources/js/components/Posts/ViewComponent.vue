<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>
            {{ post.title }}
          </h3>

          <span v-html="post.description"></span>

          <img
            :src="post.thumbnail_url"
            alt="Thumbnail"
            class="card-thumbnail"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post_data"],
  setup({ post_data }) {
    const post = JSON.parse(post_data);

    return {
      post,
    };
  },
};
</script>
