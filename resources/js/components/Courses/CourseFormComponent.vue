<template>
  <div>
    <form @submit.prevent="onSaveAndPublish()">
      <div
        class="row mb-4"
        v-if="
          validation.message &&
          validation.message.length > 0 &&
          (validation.errors == null || validation.errors.length == 0)
        "
      >
        <div class="col-lg-8 offset-lg-4">
          <div class="alert alert-danger">
            {{ validation.message }}
          </div>
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
              <label class="form-label" for="code"
                >Course Code <small class="text-danger">*</small></label
              >
              <input
                type="text"
                class="form-control"
                id="code"
                placeholder="Enter course code .."
                v-model="formData.code"
              />
              <small
                class="text-danger"
                v-if="
                  validation.errors.code && validation.errors.code.length > 0
                "
              >
                {{ validation.errors.code[0] }}
              </small>
            </div>
            <div class="form-group">
              <label class="form-label" for="title"
                >Course Title <small class="text-danger">*</small></label
              >
              <input
                type="text"
                class="form-control"
                id="title"
                placeholder="Enter course title .."
                v-model="formData.title"
              />
              <small
                class="text-danger"
                v-if="
                  validation.errors.title && validation.errors.title.length > 0
                "
              >
                {{ validation.errors.title[0] }}
              </small>
            </div>
            <div class="form-group">
              <label class="form-label" for="category">Course Category</label>
              <select
                id="category"
                class="form-control custom-select"
                v-model="formData.category"
              >
                <option value="" selected>Uncategorized</option>
                <option
                  v-for="(category, index) in data.categories"
                  :value="category.uuid"
                  :key="index"
                >
                  {{ category.title }}
                </option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-32pt">
        <div class="col-lg-4">
          <div class="page-separator">
            <div class="page-separator__text">Course Informations</div>
          </div>
          <p class="card-subtitle text-70 mb-16pt mb-lg-0"></p>
        </div>
        <div class="col-lg-8 d-flex align-items-center">
          <div class="flex" style="max-width: 100%">
            <div class="form-group">
              <label class="form-label" for="description">Descriptions</label>
              <quill-editor
                theme="snow"
                v-model:content="formData.description"
                contentType="html"
                ref="myEditor"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-32pt">
        <div class="col-lg-4">
          <div class="page-separator">
            <div class="page-separator__text">Thumbnail Image</div>
          </div>
          <p class="card-subtitle text-70 mb-16pt mb-lg-0"></p>
        </div>
        <div class="col-lg-8">
          <ImagePickerComponent
            ref="image_picker"
            @requestForChange="changeThumbnail"
            @requestForDelete="deleteThumbnail"
          />

          <div class="mt-5">
            <button
              type="button"
              class="btn btn-sm btn-outline-secondary mr-1"
              @click="onSaveAsDraft"
              :disabled="!formIsValid || isLoading"
            >
              <span class="material-icons mr-2">save</span>
              save as draft
            </button>
            <button
              type="submit"
              class="btn btn-sm btn-outline-primary m-1"
              :disabled="!formIsValid || isLoading"
            >
              <span class="material-icons mr-2">add_circle_outline</span>
              save &amp; publish
            </button>
            <button
              type="button"
              @click="resetForm"
              class="btn btn-sm btn-outline-light m-1"
              :disable="isLoading"
            >
              <span class="material-icons mr-2">clear_all</span>
              clear
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { ref, reactive, computed, onMounted } from "vue";
import axios from "axios";
import Validators from "../../modules/Validators";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import IsLoading from "../../modules/IsLoading";
import Swal from "sweetalert2";
import ImagePickerComponent from "../Global/ImagePickerComponent.vue";

export default {
  components: { QuillEditor, ImagePickerComponent },
  setup(props, { emit }) {
    const isLoading = ref(false);
    const isValid = ref(false);
    const data = reactive({
      categories: {},
    });
    const validation = reactive({
      errors: [],
      message: "",
    });
    const image_picker = ref(0);

    const { start, stop } = IsLoading();

    onMounted(() => {
      axios.get("admin/categories/all").then((res) => {
        data.categories = res.data.data;
      });
    });

    const formData = reactive({
      id: null,
      uuid: "",
      code: "",
      title: "",
      category: "",
      thumbnail: "",
      description: "",
      draft: false,
    });
    const myEditor = ref(0);

    const formIsValid = computed(() => {
      return formData.title && formData.code;
    });

    const setData = (course) => {
      formData.id = course.id;
      formData.uuid = course.uuid;
      formData.code = course.code;
      formData.title = course.title;
      formData.category = course.category ?? "";
      formData.description = course.description;
      formData.thumbnail = course.image;
      myEditor.value.setHTML(course.description);

      image_picker.value.setImage(formData.thumbnail);
    };

    const resetForm = () => {
      isValid.value = false;
      formData.uuid = "";
      formData.code = "";
      formData.title = "";
      formData.category = "uncategorized";
      formData.description = "";
      formData.thumbnail = "";
      myEditor.value.setHTML("");
    };

    const onSaveAsDraft = () => {
      formData.draft = true;
      onFormSubmitHandlar();
    };

    const onSaveAndPublish = () => {
      formData.draft = false;
      onFormSubmitHandlar();
    };

    const onFormSubmitHandlar = () => {
      start();
      isLoading.value = true;
      validation.message = "";
      validation.errors = [];

      emit("formSubmit", formData);
    };

    const success = (reset = true) => {
      stop();
      if (reset) {
        resetForm();
      }
    };

    const fail = (error) => {
      stop();

      validation.errors = error.data.errors;
      validation.message = error.data.message;

      if (!validation.errors) {
        Swal.fire({
          icon: "error",
          title: validation.message,
        });
      }
    };

    const completed = () => {
      isLoading.value = false;
    };

    const changeThumbnail = ({ image }) => {
      image_picker.value.setImage(image);
      formData.thumbnail = image;
    };

    const deleteThumbnail = () => {
      image_picker.value.deleteImage();
      formData.thumbnail = "";
    };

    return {
      data,
      formData,
      formIsValid,
      validation,
      isLoading,
      myEditor,
      image_picker,
      setData,
      onFormSubmitHandlar,
      onSaveAsDraft,
      onSaveAndPublish,
      resetForm,
      success,
      fail,
      completed,
      changeThumbnail,
      deleteThumbnail,
    };
  },
};
</script>
