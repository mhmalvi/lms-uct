<template>
  <div>
    <form @submit.prevent="handleUpdate">
      <div class="col-lg-8 offset-lg-4">
        <div class="alert alert-success" v-if="success_message">
          {{ success_message }}
        </div>
        <div class="alert alert-danger" v-if="errors.message">
          {{ errors.message }}
        </div>
      </div>
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
          </div>
        </div>
      </div>

      <div class="row mb-32pt">
        <div class="col-md-8 offset-md-4">
          <button
            type="submit"
            class="btn btn-primary"
            :class="isUpdating && 'is-loading'"
            :disabled="!formIsValid || isUpdating"
            @click.prevent="handleUpdate"
          >
            <span class="material-icons mr-2">update</span>
            Update now
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { ref, reactive, computed } from "vue";
import Validators from "../../modules/Validators";

export default {
  props: ["teacher_data"],
  setup(props) {
    const teacher = reactive(JSON.parse(props.teacher_data));

    const isUpdating = ref(false);

    const { email } = Validators();

    const form = reactive({
      username: teacher.username,
      email: teacher.email,
    });

    const errors = reactive({
      validation: {
        username: [],
        email: [],
      },
      message: "",
    });

    const success_message = ref("");

    const formIsValid = computed(() => {
      return form.username && form.email && email(form.email);
    });

    const handleUpdate = () => {
      isUpdating.value = true;
      success_message.value = "";
      errors.validation = {};
      errors.message = "";

      axios
        .post("admin/teachers/" + teacher.uuid, {
          _method: "PATCH",
          ...form,
          uuid: teacher.uuid,
        })
        .then((res) => {
          success_message.value = res.data.message;
        })
        .catch((error) => {
          if (error.response.data.errors) {
            errors.validation = error.response.data.errors;
          } else {
            errors.message = error.response.data.message;
          }
        })
        .finally(() => {
          isUpdating.value = false;
        });
    };

    return {
      teacher,
      formIsValid,
      handleUpdate,
      form,
      errors,
      isUpdating,
      success_message,
    };
  },
};
</script>
