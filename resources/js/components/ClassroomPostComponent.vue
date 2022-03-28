<template>
  <div class="card post">
    <div class="card-body">
      <h4 class="card-title">
        {{ post.author.username }}
      </h4>
      <p class="card-subtitle text-muted mb-2">{{ post.created_at }}</p>
      <div class="card-text post-description" v-html="post.description"></div>
      <div class="card-text" v-if="post.attachments.length > 0">
        <div class="row mt-2">
          <div
            class="col-12"
            v-for="(attachment, index) in post.attachments"
            :key="index"
          >
            <classroom-post-attachment-component :attachment="attachment" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ClassroomPostAttachmentComponent from "./ClassroomPostAttachmentComponent.vue";

export default {
  components: { ClassroomPostAttachmentComponent },
  props: ["post"],
  setup({ post }) {
    return {
      post,
    };
  },
};
</script>

<style scoped>
.post {
  animation: fadeIn 0.2s linear;
}

@keyframes fadeIn {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}
</style>
