<template>
  <form @submit.prevent="handleFormSubmit">
    <div class="form-group">
      <label for="title">Title</label>
      <input
        type="text"
        class="form-control"
        v-model="form.data.title"
        id="title"
      />
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <QuillEditor
        theme="snow"
        contentType="html"
        ref="description_editor"
        v-model:content="form.data.description"
      />
    </div>
    <div class="form-group">
      <label for="file">Thumbnail</label>
      <ImagePickerComponent
        ref="image_picker"
        @requestForChange="handleImageChange"
        @requestForDelete="handleImageDelete"
      />
    </div>

    <button type="submit" class="btn btn-outline-primary">Submit</button>
  </form>
</template>

<script>
import { reactive, ref, computed, watch, onMounted } from "vue";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import ImagePickerComponent from "../Global/ImagePickerComponent.vue";
import axios from "axios";
export default {
  components: {
    ImagePickerComponent,
    QuillEditor,
  },
  setup(_) {
    const form = reactive({
      data: {
        title: "",
        description: "",
        image: "",
      },
      isSubmitting: false,
    });

    const image_picker = ref(0);

    const handleImageChange = (data) => {
      form.data.image = data.image;
      setImage(data.image);
    };

    const handleImageDelete = () => {
      form.data.image = "";
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
      axios
        .post("admin/posts/store", form.data)
        .then((res) => {})
        .catch((err) => {});
    };

    return {
      form,
      image_picker,
      handleImageChange,
      setData,
      handleImageDelete,
      handleFormSubmit,
    };
  },
};
</script>