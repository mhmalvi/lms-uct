<template>
  <div>
    <div class="alert alert-success" v-if="message.success">
      {{ message.success }}
    </div>
    <form @submit.prevent="submit">
      <div class="form-group">
        <label for="title">Title</label>
        <input
          type="text"
          class="form-control"
          id="title"
          v-model="form.title"
        />
        <small v-if="message.errors.title" class="text-danger">
          {{ message.errors.title[0] }}
        </small>
      </div>

      <div class="form-group">
        <label>Slug</label>
        <input type="text" class="form-control" v-model="form.slug" />
        <small v-if="message.errors.slug" class="text-danger">
          {{ message.errors.slug[0] }}
        </small>
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea
          cols="30"
          rows="5"
          class="form-control"
          style="resize: none"
          v-model="form.description"
        ></textarea>
      </div>

      <div class="d-flex align-items-center">
        <ImagePickerComponent
          ref="image_picker"
          @requestForDelete="handleImageDelete"
          @requestForChange="handleImageChange"
        />
      </div>

      <div class="form-group">
        <button
          class="btn btn-sm btn-outline-primary font-weight-light px-3"
          :disabled="!formIsValid || isSubmitting"
        >
          <i class="fas fa-circle-notch fa-spin" v-if="isSubmitting"></i>
          <i class="fas fa-plus-circle" v-else></i>
          <span class="ml-2">Save</span>
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import { ref, reactive, computed, watch } from "vue";
import axios from "axios";
import { useStore } from "vuex";
import Validators from "../../modules/Validators";
import ImagePickerComponent from "../Global/ImagePickerComponent.vue";

export default {
  components: {
    ImagePickerComponent,
  },
  setup() {
    const isSubmitting = ref(false);
    const image_picker = ref(0);

    const form = reactive({
      title: "",
      slug: "",
      description: "",
      thumbnail: "",
    });

    const message = reactive({
      validation: {},
      errors: {},
      success: "",
    });

    watch(
      () => form.title,
      (newVal, oldVal) => {
        form.slug = StringHandler.slug(newVal);
      }
    );

    const store = useStore();

    const formIsValid = computed(() => {
      return form.title;
    });

    const submit = () => {
      isSubmitting.value = true;
      axios
        .post("admin/categories", form)
        .then((res) => {
          store.commit("courseCategories/addNewCategory", {
            uuid: res.data.category.uuid,
            title: res.data.category.title,
            slug: res.data.category.slug,
            description: res.data.category.description,
            thumbnail_url: res.data.category.thumbnail_url,
          });

          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          ScrollHandler.smoothScrollTop();

          reset();
        })
        .catch((err) => {
          message.errors = err.response.data.errors;
        })
        .finally(() => {
          isSubmitting.value = false;
        });
    };

    const reset = () => {
      form.title = "";
      form.slug = "";
      form.description = "";

      form.thumbnail = "";

      image_picker.value.deleteImage();
    };

    const handleImageChange = (data) => {
      image_picker.value.setImage(data.image);
      form.thumbnail = data.image;
    };

    const handleImageDelete = () => {
      image_picker.value.deleteImage();
    };

    return {
      isSubmitting,
      form,
      image_picker,
      message,
      formIsValid,
      submit,
      handleImageChange,
      handleImageDelete,
    };
  },
};
</script>
