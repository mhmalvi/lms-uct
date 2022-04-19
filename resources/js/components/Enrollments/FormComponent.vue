<template>
  <div>
    <transition name="fade">
      <LLNComponent v-if="state.count == 1" @onClickEvent="doSomething" />
    </transition>

    <transition name="fade">
      <PTRComponent v-if="state.count == 2" @onClickEvent="doSomething" />
    </transition>

    <transition name="fade">
      <EnrollmentComponent v-if="state.count == 3" />
    </transition>
  </div>
</template>
<script>
import { reactive } from "vue";
import LLNComponent from "./LLNComponent.vue";
import PTRComponent from "./PTRComponent.vue";
import EnrollmentComponent from "./EnrollmentComponent.vue";
export default {
  components: { LLNComponent, PTRComponent, EnrollmentComponent },
  setup() {
    const state = reactive({
      count: 1,
    });

    function doSomething(event) {
      state.count++;
    }

    return {
      state,
      doSomething,
    };
  },
};
</script>
<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>