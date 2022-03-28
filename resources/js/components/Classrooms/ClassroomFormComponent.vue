<template>
  <form @submit.prevent="handleFormSubmit">
    <div class="form-group">
      <label for="title">Title</label>
      <input
        type="text"
        class="form-control"
        id="title"
        placeholder="The title is required"
        v-model="form.title"
      />
      <small
        class="text-danger"
        v-if="validation.errors && validation.errors.title"
      >
        {{ validation.errors.title[0] }}
      </small>
    </div>
    <div class="form-group">
      <label for="section">Section</label>
      <input
        type="text"
        class="form-control"
        id="section"
        placeholder="The section is required"
        v-model="form.section"
      />
      <small
        class="text-danger"
        v-if="validation.errors && validation.errors.section"
      >
        {{ validation.errors.section[0] }}
      </small>
    </div>
    <div class="form-group">
      <label for="course">Course</label>
      <select id="course" class="form-control" v-model="form.course">
        <option value="">Choose</option>
        <option
          v-for="(course, index) in courses"
          v-bind:key="index"
          :value="course.uuid"
        >
          {{ course.title }}
        </option>
      </select>
      <small
        class="text-danger"
        v-if="validation.errors && validation.errors.course"
      >
        {{ validation.errors.course[0] }}
      </small>
    </div>
    <div class="form-group">
      <label for="cover_photo">Cover Photo</label>
      <ImagePickerComponent
        ref="image_picker"
        @requestForChange="onImageChange"
        @requestForDelete="onImageRemove"
      />
      <small
        class="text-danger"
        v-if="validation.errors && validation.errors.cover_photo"
      >
        {{ validation.errors.cover_photo[0] }}
      </small>
    </div>

    <button
      type="submit"
      class="btn btn-sm btn-primary"
      :class="isSubmitting && 'is-loading'"
      :disabled="isSubmitting"
    >
      <i class="fas fa-plus-circle"></i>
      <span class="ml-2">Create</span>
    </button>
  </form>
</template>

<script>
import axios from "axios";
import { onMounted, ref, reactive, watch } from "vue";
import ImagePickerComponent from "../Global/ImagePickerComponent.vue";
import StringHandler from "../../modules/StringHandler";

export default {
  components: {
    ImagePickerComponent,
  },
  setup(_, { emit }) {
    const form = reactive({
      title: "",
      slug: "",
      section: "",
      course: "",
      cover_photo: "",
    });
    const courses = ref([]);
    const isSubmitting = ref(false);
    const validation = reactive({
      errors: [],
      message: "",
    });
    const image_picker = ref(0);

    onMounted(() => {
      getCourses();
    });

    watch(
      () => form.title,
      (newVal, oldVal) => {
        form.slug = StringHandler.slug(newVal);
      }
    );

    const getCourses = () => {
      axios
        .get("/admin/courses/raw")
        .then((res) => {
          courses.value = res.data.data;
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong while fetching courses!",
          });
          console.log(err.response);
        });
    };

    const handleFormSubmit = () => {
      isSubmitting.value = true;
      validation.errors = [];
      validation.message = "";

      emit("formSubmit", form);
    };

    const resetForm = () => {
      form.title = "";
      form.section = "";
      form.course = "";
      form.cover_photo = "";

      image_picker.value.deleteImage();
    };

    const success = (reset = true) => {
      if (reset) {
        resetForm();
      }
    };
    const fail = (data) => {
      validation.errors = data.errors;
      validation.message = data.message;
    };
    const completed = () => {
      isSubmitting.value = false;
    };

    const onImageChange = (data) => {
      form.cover_photo = data.image;
      image_picker.value.setImage(data.image);
    };

    const onImageRemove = () => {
      form.cover_photo = "";
      image_picker.value.deleteImage();
    };

    return {
      form,
      courses,
      isSubmitting,
      validation,
      image_picker,
      handleFormSubmit,
      success,
      fail,
      completed,
      onImageChange,
      onImageRemove,
    };
  },
};
</script>
