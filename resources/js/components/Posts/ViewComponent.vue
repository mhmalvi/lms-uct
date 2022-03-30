<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h3>
        {{ post.title }}
      </h3>

      <p class="text-muted">{{ post.unit_code }} - {{ post.unit_title }}</p>

      <div v-html="post.description"></div>

      <img :src="post.thumbnail_url" alt="Thumbnail" class="card-thumbnail" />
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
