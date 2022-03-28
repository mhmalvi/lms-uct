<template>
  <div>
    <form @submit.prevent="submit">
      <div
        class="row"
        v-if="
          validation.message &&
          (!validation.errors || validation.errors.length == 0)
        "
      >
        <div class="col-lg-4 offset-lg-4">
          <div class="alert alert-success">
            {{ validation.message }}
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="page-separator">
            <div class="page-separator__text">Basic Informations</div>
          </div>
          <p class="card-subtitle text-70 mb-16pt mb-lg-0"></p>
        </div>
        <div class="col-lg-4 d-flex align-items-center">
          <div class="flex" style="max-width: 100%">
            <div class="form-group">
              <label for="title">Title</label>
              <input
                type="text"
                class="form-control"
                id="title"
                v-model="form.title"
              />
              <small v-if="validation.errors.title" class="text-danger">
                {{ validation.errors.title[0] }}
              </small>
            </div>

            <div class="form-group">
              <label>Slug</label>
              <button
                class="btn btn-link btn-sm float-right"
                @click="generateSlug()"
                type="button"
              >
                Generate slug
              </button>
              <input type="text" class="form-control" v-model="form.slug" />
              <small v-if="validation.errors.slug" class="text-danger">
                {{ validation.errors.slug[0] }}
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

            <div class="d-flex justify-content-center">
              <ImagePickerComponent
                ref="image_picker"
                @requestForChange="handleImageChange"
                @requestForDelete="handleImageDelete"
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
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { ref, reactive, computed, onMounted } from "vue";
import axios from "axios";
import Swal from "sweetalert2";
import ImagePickerComponent from "../Global/ImagePickerComponent.vue";
import StringHandler from "../../modules/StringHandler";

export default {
  props: ["data"],
  components: {
    ImagePickerComponent,
  },
  setup({ data }) {
    const category = data ? JSON.parse(data) : "";
    const isSubmitting = ref(false);
    const image_picker = ref(0);

    const formIsValid = computed(
      () => {
        return (
          form.title &&
          form.title.length > 0 &&
          form.slug &&
          form.slug.length > 0
        );
      },
      {
        deep: true,
      }
    );

    const form = reactive({
      id: category.id,
      title: category.title,
      slug: category.slug,
      description: category.description,
      thumbnail: category.thumbnail_url,
    });

    const validation = reactive({
      errors: [],
      message: "",
    });

    onMounted(() => {
      image_picker.value.setImage(form.thumbnail);
    });

    const submit = () => {
      isSubmitting.value = true;
      axios
        .post("/admin/categories/edit/" + category.slug, {
          _method: "PATCH",
          ...form,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          if (res.data.redirect_back) {
            setTimeout(() => {
              location.replace(res.data.this_page);
            }, 2000);
          }
        })
        .catch((err) => {
          validation.errors = err.response.data.errors;
          validation.message = err.response.data.message;
        })
        .finally(() => {
          isSubmitting.value = false;
        });
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
      image_picker,
      form,
      validation,
      formIsValid,
      image_picker,
      submit,
      handleImageChange,
      handleImageDelete,
    };
  },
};
</script>
