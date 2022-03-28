<template>
  <div>
    <transition name="fade">
      <div
        class="bg-red-50 border-l-4 border-red-500 text-red-700 py-3 px-4 mb-4"
        role="alert"
        v-if="errors.message"
      >
        <p class="font-bold mb-0">Whoops! Something went wrong</p>
        <p class="mb-0">{{ errors.message }}</p>
      </div>
    </transition>
    <form @submit.prevent="formSubmitHandler">
      <div class="form-group">
        <label class="text-label font-semibold" for="email_2"
          >Email Address:</label
        >
        <div class="input-group input-group-merge">
          <input
            id="email_2"
            type="email"
            v-model="form.email"
            required
            class="form-control form-control-prepended"
            placeholder="john@doe.com"
          />
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="far fa-envelope"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="text-label font-semibold" for="password_2"
          >Password:</label
        >
        <div class="input-group input-group-merge">
          <input
            id="password_2"
            type="password"
            v-model="form.password"
            required
            class="form-control form-control-prepended"
            placeholder="Enter your password"
          />
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fa fa-key"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <button
          class="btn btn-block btn-primary"
          type="submit"
          :disabled="!isValid"
          :class="isLoading && 'is-loading'"
        >
          Login
        </button>
      </div>
    </form>
  </div>
</template>
<script>
import { ref, reactive, computed } from "vue";
import Validators from "../../../modules/Validators.js";
export default {
  setup() {
    const isLoading = ref(false);
    const { email, password } = Validators();

    const form = reactive({
      email: "",
      password: "",
    });

    const errors = reactive({
      validation: {
        email: [],
        password: [],
      },
      message: "",
    });

    const isValid = computed(() => {
      return form.email &&
        form.password &&
        email(form.email) &&
        password(form.password, 5, 20)
        ? true
        : false;
    });

    const formSubmitHandler = async () => {
      isLoading.value = true;
      await axios
        .post("admin/login", form)
        .then((res) => {
          window.location.href = res.data.redirectTo;
          isLoading.value = false;
        })
        .catch((error) => {
          isLoading.value = false;
          if (error.response.data.errors) {
            errors.validation = error.response.data.errors;
          } else {
            errors.message = error.response.data.message;
          }
        });
    };

    return {
      form,
      isLoading,
      isValid,
      errors,
      formSubmitHandler,
    };
  },
};
</script>
<style>
.fade-enter-from {
  opacity: 0;
}
.fade-enter-active {
  transition: all 0.3s ease;
}
</style>