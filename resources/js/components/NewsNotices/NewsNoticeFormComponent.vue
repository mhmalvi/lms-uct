<template>
  <form @submit.prevent="handlePublishSubmit">
    <div
      class="row mb-2"
      v-if="
        validation.message.length > 0 &&
        (validation.errors == null || validation.errors.length == 0)
      "
    >
      <div class="offset-lg-4 col-lg-8 d-flex align-items-center">
        <div class="flex" style="max-width: 100%">
          <div class="alert alert-danger">{{ validation.message }}</div>
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
            <label class="form-label" for="title"
              >Title <small class="text-danger">*</small></label
            >
            <input
              type="text"
              class="form-control"
              id="title"
              placeholder="Enter title.."
              v-model="form.data.title"
            />
            <p
              class="text-danger"
              v-if="
                validation.errors &&
                validation.errors.title &&
                validation.errors.title.length > 0
              "
            >
              {{ validation.errors.title[0] }}
            </p>
          </div>
          <div class="form-group">
            <label for="slug" class="form-label">Slug</label>
            <input
              type="text"
              class="form-control"
              id="slug"
              :placeholder="generated_slug"
              v-model="form.data.slug"
            />
            <p
              class="text-danger"
              v-if="
                validation.errors &&
                validation.errors.slug &&
                validation.errors.slug.length > 0
              "
            >
              {{ validation.errors.slug[0] }}
            </p>
          </div>
          <div class="form-group">
            <label class="form-label" for="description"
              >Description <small class="text-danger">*</small></label
            >
            <QuillEditor
              theme="snow"
              contentType="html"
              ref="description_editor"
              v-model:content="form.data.description"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-32pt">
      <div class="col-lg-4">
        <div class="page-separator">
          <div class="page-separator__text">Featured Image</div>
        </div>
        <p class="card-subtitle text-70 mb-16pt mb-lg-0"></p>
      </div>
      <div class="col-lg-8">
        <ImagePickerComponent
          ref="image_picker"
          label="news/notice"
          @requestForChange="handleImageChange"
          @requestForDelete="handleImageDelete"
        />

        <div class="form-group">
          <label class="form-label" for="post_type"
            >Post type <small class="text-danger">*</small></label
          >
          <div class="form-check">
            <input
              type="radio"
              class="form-check-input"
              name="post_type"
              id="news"
              v-model="form.data.post_type"
              value="news"
            />
            <label class="form-check-label" for="news">News</label>
          </div>
          <div class="form-check">
            <input
              type="radio"
              class="form-check-input"
              name="post_type"
              id="notice"
              v-model="form.data.post_type"
              value="notice"
            />
            <label class="form-check-label" for="notice">Notice</label>
          </div>
        </div>

        <div class="mt-5">
          <button
            type="button"
            @click="handleDraftSubmit"
            class="btn btn-sm btn-outline-secondary mr-1"
            :disabled="!formIsValid || form.isSubmitting"
          >
            <span class="material-icons mr-2">save</span>
            save as draft
          </button>
          <button
            type="submit"
            class="btn btn-sm btn-outline-primary m-1"
            :disabled="!formIsValid || form.isSubmitting"
          >
            <span class="material-icons mr-2">add_circle_outline</span>
            save &amp; publish
          </button>
          <button
            type="button"
            class="btn btn-sm btn-outline-light m-1"
            @click.prevent="formReset()"
            :disabled="form.isSubmitting"
          >
            <span class="material-icons mr-2">clear_all</span>
            clear
          </button>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import { reactive, ref, computed, watch, onMounted } from "vue";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import ScrollHandler from "../../modules/ScrollHandler";
import StringHandler from "../../modules/StringHandler";
import ImagePickerComponent from "../Global/ImagePickerComponent.vue";

export default {
  components: {
    ImagePickerComponent,
    QuillEditor,
  },
  setup(_, { emit }) {
    const form = reactive({
      data: {
        title: "",
        slug: "",
        description: "",
        image: "",
        post_type: null,
        is_published: false,
      },
      isSubmitting: false,
    });
    const validation = reactive({
      errors: [],
      message: "",
    });
    const generated_slug = ref("");
    const image_picker = ref(0);
    const description_editor = ref(0);
    const component_loaded = ref(false);

    onMounted(() => {
      component_loaded.value = true;
    });

    watch(
      () => form.data.title,
      (newVal, oldVal) => {
        generated_slug.value = StringHandler.slug(newVal);
      }
    );

    const handleImageChange = (data) => {
      form.data.image = data.image;
      setImage(data.image);
    };

    const handleImageDelete = () => {
      form.data.image = "";
      setImage("");
    };

    const formIsValid = computed(() => {
      return (
        form.data.title.length > 0 &&
        form.data.post_type &&
        form.data.post_type.length > 0
      );
    });

    const setImage = (image) => {
      image_picker.value.setImage(image);
    };

    const setData = async (data) => {
      form.data = data;
      form.data.image = data.image_url;

      description_editor.value.setHTML(data.description);
      setImage(data.image_url);
    };

    const handleFormSubmit = () => {
      form.isSubmitting = true;
      if (form.data.slug.length == 0) {
        form.data.slug = generated_slug.value;
      }
      validation.errors = [];
      validation.message = "";
      emit("formSubmit", form.data);
    };

    const handlePublishSubmit = () => {
      form.data.is_published = true;
      handleFormSubmit();
    };

    const handleDraftSubmit = () => {
      form.data.is_published = false;
      handleFormSubmit();
    };

    const fail = (error) => {
      validation.errors = error.data.errors;
      validation.message = error.data.message;

      ScrollHandler.smoothScrollTop();
    };

    const complete = () => {
      form.isSubmitting = false;
    };

    const formReset = () => {
      form.data.title = "";
      form.data.slug = "";
      form.data.description = "";
      form.data.image = "";
      form.data.post_type = "";

      description_editor.value.setHTML("");
      setImage("");
    };

    return {
      image_picker,
      form,
      description_editor,
      formIsValid,
      generated_slug,
      validation,
      handleImageChange,
      handleImageDelete,
      formReset,
      fail,
      complete,
      setData,
      handleDraftSubmit,
      handlePublishSubmit,
    };
  },
};
</script>
