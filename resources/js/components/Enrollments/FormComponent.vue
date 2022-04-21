<template>
  <div>
    <transition name="fade">
      <LLNComponent v-if="state.count == 1" />
    </transition>
    <transition name="fade">
      <PTRComponent v-if="state.count == 2" @onClickEvent="doSomething2" />
    </transition>
    <transition name="fade">
      <EnrollmentComponent
        v-if="state.count == 3"
        @onClickEvent="doSomething3"
      />
    </transition>
  </div>
</template>
<script>
import { reactive } from "vue";
import LLNComponent from "./LLNComponent.vue";
import PTRComponent from "./PTRComponent.vue";
import EnrollmentComponent from "./EnrollmentComponent.vue";
import axios from "axios";

export default {
  components: { LLNComponent, PTRComponent, EnrollmentComponent },
  setup() {
    const state = reactive({
      count: 1,
      lln: {},
      ptr: {},
      enrollment: {},
    });

    function doSomething1(event) {
      state.count++;
      state.lln = event;
    }

    function doSomething2(event) {
      state.count++;
      state.ptr = event;
    }

    function doSomething3(event) {
      state.enrollment = event;
      formSubmitHandler();
    }

    const formSubmitHandler = () => {
      const formData = {
        ...state.lln,
        ...state.ptr,
        ...state.enrollment,
      };

      axios
        .post("enrolment", formData)
        .then((res) => {
          console.log(res.data);
        })
        .catch((err) => {
          console.error(err);
        });
    };

    return {
      state,
      doSomething1,
      doSomething2,
      doSomething3,
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