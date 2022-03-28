<template>
  <div class="mt-5">
    <form @submit.prevent="handleFormSubmit">
      <div class="row mb-32pt">
        <div class="col-lg-4">
          <div class="page-separator">
            <div class="page-separator__text">Basic Informations</div>
          </div>
          <p class="card-subtitle text-70 mb-16pt mb-lg-0"></p>
        </div>
        <div class="col-lg-8 d-flex align-items-center">
          <div class="flex" style="max-width: 100%">
            <div class="form-group">
              <label class="form-label" for="username">
                Username<small class="text-danger">*</small></label
              >
              <input
                type="text"
                class="form-control"
                id="username"
                placeholder="Enter username.."
                v-model="form.username"
                required
              />
              <p
                class="text-danger"
                v-if="
                  errors.validation.username &&
                  errors.validation.username.length > 0
                "
              >
                {{ errors.validation.username[0] }}
              </p>
            </div>

            <div class="form-group">
              <label class="form-label" for="email">
                Email<small class="text-danger">*</small>
              </label>
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Enter email here.."
                v-model="form.email"
                required
              />
              <p
                class="text-danger"
                v-if="
                  errors.validation.email && errors.validation.email.length > 0
                "
              >
                {{ errors.validation.email[0] }}
              </p>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">
                Password<small class="text-danger">*</small>
              </label>
              <input
                type="password"
                class="form-control"
                id="password"
                placeholder="Enter password here.."
                v-model="form.password"
                required
              />
              <p
                class="text-danger"
                v-if="
                  errors.validation.password &&
                  errors.validation.password.length > 0
                "
              >
                {{ errors.validation.password[0] }}
              </p>
            </div>

            <div class="form-group">
              <label for="password_confirmation" class="form-label">
                Confirm Password<small class="text-danger">*</small>
              </label>
              <input
                type="password"
                class="form-control"
                id="password_confirmation"
                placeholder="Enter confirmation password here.."
                v-model="form.password_confirmation"
                required
              />
              <p
                class="text-danger"
                v-if="
                  errors.validation.password_confirmation &&
                  errors.validation.password_confirmation.length > 0
                "
              >
                {{ errors.validation.password_confirmation[0] }}
              </p>
            </div>

            <div class="form-group">
              <label class="form-label" for="user_type">User Type</label>
              <select
                id="user_type"
                class="form-control"
                v-model="form.user_type"
              >
                <option value="">Choose</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-32pt">
        <div class="col-md-8 offset-md-4">
          <div class="alert alert-danger" v-if="errors.message">
            {{ errors.message }}
          </div>
          <button
            type="submit"
            class="btn btn-primary"
            :class="isLoading && 'is-loading'"
            :disabled="!formIsValid || isLoading"
          >
            <span class="material-icons mr-2">save</span>
            Save Now
          </button>

          <button type="reset" class="btn btn-light ml-2">
            <span class="material-icons mr-2">clear_all</span>
            Clear all
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import { ref, computed, reactive } from "vue";
import Validators from "../../modules/Validators";

export default {
  setup() {
    const isLoading = ref(false);
    const { email, password } = Validators();

    const form = reactive({
      username: "",
      email: "",
      password: "",
      password_confirmation: "",
      user_type: "",
    });

    const errors = reactive({
      validation: {
        username: [],
        email: [],
        password: [],
        password_confirmation: [],
        user_type: [],
      },
      message: "",
    });

    const formIsValid = computed(() => {
      return form.username &&
        form.email &&
        form.password &&
        form.password_confirmation &&
        form.user_type &&
        email(form.email) &&
        password(form.password, 5, 20)
        ? true
        : false;
    });

    const handleFormSubmit = () => {
      isLoading.value = true;
      errors.validation = [];
      errors.message = "";
      axios
        .post("admin/enroll-users", form)
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          resetForm();
        })
        .catch((err) => {
          if (err.response.data.errors) {
            errors.validation = err.response.data.errors;
          } else {
            errors.message = err.response.data.message;
          }
        })
        .finally(() => {
          isLoading.value = false;
        });
    };

    const resetForm = () => {
      form.username = "";
      form.email = "";
      form.password = "";
      form.password_confirmation = "";
      form.user_type = "";
    };

    return {
      form,
      isLoading,
      formIsValid,
      handleFormSubmit,
      errors,
    };
  },
};
</script>
