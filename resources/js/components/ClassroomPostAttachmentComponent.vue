<template>
  <a
    :href="attachment.file_url"
    target="_blank"
    class="media align-items-center mt-2 text-decoration-0 pl-2 pr-3"
  >
    <span class="avatar mr-2">
      <span class="avatar-title rounded-circle">
        <i
          class="material-icons font-size-24pt"
          v-if="attachment.type == 'video'"
          >movie</i
        >
        <i
          class="material-icons font-size-24pt"
          v-else-if="attachment.type == 'photo'"
          >image</i
        >
        <i class="material-icons font-size-24pt" v-else>attach_file</i>
      </span>
    </span>
    <span class="media-body" style="line-height: 1.5">
      <span class="text-primary">
        {{ attachment.title }}
      </span>
      <br />
      <span class="text-50">{{ attachment.file_size }} MB</span>
    </span>
  </a>
</template>

<script>
export default {
  props: ["attachment"],
  setup({ attachment }) {
    return {
      attachment,
    };
  },
};
</script>

<style scoped>
.avatar {
  width: 35px;
  height: 35px;
}
.media {
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 5px 2px;
  width: 100%;
}
</style>
