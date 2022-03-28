<template>
  <div>
    <transition name="fade">
      <alert-danger
        :message="errors.message"
        v-if="errors.message"
      ></alert-danger>
    </transition>
    <form @submit.prevent="formSubmitHandler" novalidate>
      <div class="form-group">
        <label class="text-label" for="email_2">Email Address:</label>
        <div class="input-group input-group-merge">
          <input
            id="email_2"
            type="email"
            v-model="form.email"
            class="form-control form-control-prepended"
            :class="errors.validation.email.length > 0 && 'is-invalid'"
            placeholder="john@doe.com"
          />
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="far fa-envelope"></span>
            </div>
          </div>
        </div>
        <transition-group name="fade">
          <div v-if="errors.validation.email.length > 0">
            <div
              class="invalid-feedback d-block"
              v-for="(error, index) in errors.validation.email"
              :key="index"
            >
              {{ error }}
            </div>
          </div>
        </transition-group>
      </div>
      <div class="form-group">
        <label class="text-label" for="password_2">Password:</label>
        <div class="input-group input-group-merge">
          <input
            id="password_2"
            type="password"
            v-model="form.password"
            class="form-control form-control-prepended"
            :class="errors.validation.email.length > 0 && 'is-invalid'"
            placeholder="Enter your password"
          />
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fa fa-key"></span>
            </div>
          </div>
        </div>
        <transition-group name="fade">
          <div v-if="errors.validation.password.length > 0">
            <div
              class="invalid-feedback d-block"
              v-for="(error, index) in errors.validation.password"
              :key="index"
            >
              {{ error }}
            </div>
          </div>
        </transition-group>
      </div>
      <div class="form-group">
        <button
          class="btn btn-block btn-primary"
          :class="isLoading && 'is-loading'"
          type="submit"
          :disabled="!isValid"
        >
          Login
        </button>
      </div>
      <!-- <div class="form-group text-center">
        <a href="">Forgot password?</a> <br />
      </div> -->
    </form>
  </div>
</template>
<script>
import { ref, reactive, computed } from "vue";
import AlertDanger from "../../AlertDanger.vue";
import Validators from "../../../modules/Validators.js";
export default {
  components: {
    AlertDanger,
  },
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

    const formSubmitHandler = async () => {
      isLoading.value = true;
      await axios
        .post("login", form)
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

    const isValid = computed(() => {
      return form.email &&
        form.password &&
        email(form.email) &&
        password(form.password, 6, 20)
        ? true
        : false;
    });

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
