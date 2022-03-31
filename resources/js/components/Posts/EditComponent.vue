<template>
  <form @submit.prevent="handleFormSubmit">
    <div class="form-group">
      <label for="unit_code">Unit Code</label>
      <input
        type="text"
        class="form-control"
        id="unit_code"
        v-model="form.data.unit_code"
        placeholder="Enter unit code"
      />
    </div>

    <div class="form-group">
      <label for="unit_title">Unit Title</label>
      <input
        type="text"
        class="form-control"
        id="unit_title"
        v-model="form.data.unit_title"
        placeholder="Enter unit title"
      />
    </div>

    <div class="form-group">
      <label for="title">Title</label>
      <input
        type="text"
        class="form-control"
        v-model="form.data.title"
        id="title"
        placeholder="Post title"
      />
      <small class="text-danger" v-if="validation.errors.title">
        {{ validation.errors.title[0] }}
      </small>
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <QuillEditor
        theme="snow"
        contentType="html"
        ref="description_editor"
        placeholder="Post description"
        v-model:content="form.data.description"
      />
      <small class="text-danger" v-if="validation.errors.description">
        {{ validation.errors.description[0] }}
      </small>
    </div>
    <div class="form-group">
      <label for="file">Thumbnail</label>
      <ImagePickerComponent
        ref="image_picker"
        @requestForChange="handleImageChange"
        @requestForDelete="handleImageDelete"
      />
      <small class="text-danger" v-if="validation.errors.thumbnail">
        {{ validation.errors.thumbnail[0] }}
      </small>
    </div>

    <button
      type="submit"
      class="btn btn-outline-primary"
      :disabled="form.isSubmitting"
    >
      Submit
    </button>
  </form>
</template>

<script>
import { reactive, ref, computed, watch, onMounted } from "vue";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import ImagePickerComponent from "../Global/ImagePickerComponent.vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  components: {
    ImagePickerComponent,
    QuillEditor,
  },
  props: ["post_data"],
  setup({ post_data }) {
    const form = reactive({
      data: {
        unit_code: "",
        unit_title: "",
        title: "",
        description: "",
        thumbnail: "",
      },
      isSubmitting: false,
    });
    const post = JSON.parse(post_data);

    onMounted(() => {
      form.data.unit_code = post.unit_code;
      form.data.unit_title = post.unit_title;
      form.data.title = post.title;
      form.data.description = post.description;
      form.data.thumbnail = post.thumbnail_url;

      description_editor.value.setHTML(form.data.description);

      if (post.thumbnail_url) image_picker.value.setImage(post.thumbnail_url);
    });

    const validation = reactive({
      errors: {},
      message: "",
    });

    const description_editor = ref(0);

    const image_picker = ref(0);

    const handleImageChange = (data) => {
      form.data.thumbnail = data.image;
      setImage(data.image);
    };

    const handleImageDelete = () => {
      form.data.thumbnail = "";
      setImage("");
    };

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
      formErrorReset();
      form.isSubmitting = true;

      axios
        .patch("admin/posts/" + post.id, form.data)
        .then((res) => {
          //   resetForm();
          Swal.fire({
            icon: "success",
            title: res.data.message,
            timer: 2000,
          });
        })
        .catch((err) => {
          if (err.response.status == 422) {
            validation.errors = err.response.data.errors;
            validation.message = err.response.data.message;
          } else {
            Swal.fire({
              icon: "error",
              title: err.response.data.message,
            });
          }
        })
        .finally(() => {
          form.isSubmitting = false;
        });
    };

    const formErrorReset = () => {
      validation.errors = {};
      validation.message = "";
    };

    const resetForm = () => {
      form.data = {
        title: "",
        description: "",
        thumbnail: "",
      };
      description_editor.value.setHTML("");
      image_picker.value.deleteImage();
    };

    return {
      form,
      validation,
      image_picker,
      description_editor,
      handleImageChange,
      setData,
      handleImageDelete,
      handleFormSubmit,
    };
  },
};
</script>
