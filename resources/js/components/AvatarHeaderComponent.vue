<template>
  <img :src="avatar" alt="logo" class="img-fluid" v-if="avatar" />
  <img :src="defaultImage" alt="logo" class="img-fluid" v-else />
</template>

<script>
import { ref, onMounted, watch } from "vue";
import { useStore } from "vuex";

export default {
  props: ["avatar_url"],
  setup({ avatar_url }) {
    const avatar = ref("");
    const store = useStore();
    const defaultImage = `${window.location.origin}/assets/images/user_default.webp`;

    onMounted(() => {
      avatar.value = avatar_url != "" ? avatar_url : defaultImage;
    });

    watch(
      () => {
        return store.getters.getAvatar;
      },
      (newVal, oldVal) => {
        avatar.value = newVal != null ? newVal : defaultImage;
      }
    );

    return {
      avatar,
      defaultImage,
    };
  },
};
</script>
