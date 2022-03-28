<template>
  <div>
    <div v-if="!isOpened">
      <button class="btn btn-primary btn-sm btn-block" @click="isOpened = true">
        <span class="material-icons mr-2">edit</span>
        Create a post
      </button>
    </div>
    <transition name="reveal">
      <div v-if="isOpened">
        <form @submit.prevent="handleFormSubmit">
          <div class="form-group">
            <h4>Publish a post</h4>
          </div>

          <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <quill-editor
              theme="snow"
              contentType="html"
              ref="description"
              v-model:content="form.description"
            />
          </div>

          <div>
            <google-file-picker-component @filesSelected="handleFilesUpload" />
          </div>

          <div class="col-7">
            <p
              v-for="(file, index) in form.attachments"
              :key="index"
              class="d-flex justify-content-between p-2 align-items-center"
            >
              {{ file.name }}
              <button
                class="btn btn-flush btn-primary p-2"
                @click="removeAttachment(file)"
              >
                <i class="fas fa-times"></i>
              </button>
            </p>
          </div>

          <div class="form-group d-flex justify-content-end">
            <button
              class="btn btn-primary"
              :class="isSubmitting && 'is-loading'"
              type="submit"
              :disabled="!isValid || isSubmitting"
            >
              <span class="material-icons mr-2">send</span>
              Publish
            </button>
          </div>
        </form>
      </div>
    </transition>
  </div>
</template>

<script>
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import axios from "axios";
import Swal from "sweetalert2";
import { reactive, computed, ref } from "vue";
import { useStore } from "vuex";
import GoogleFilePickerComponent from "./GoogleFilePickerComponent.vue";

export default {
  components: { QuillEditor, GoogleFilePickerComponent },
  setup() {
    const store = useStore();

    const classroom_id = store.getters.getClassroomId;

    const form = reactive({
      description: "",
      attachments: [],
    });
    const description = ref(null); // for binding with the quill editor with reference
    const isSubmitting = ref(false);

    const isValid = computed(() => {
      return form.description.trim().length > 0;
    });

    const isOpened = ref(false);

    const handleFormSubmit = () => {
      if (description.value.getText().trim().length == 0) {
        return;
      }
      isSubmitting.value = true;
      axios
        .post("/admin/classrooms/posts/publish", {
          ...form,
          classroom_id,
        })
        .then((res) => {
          setTimeout(() => {
            store.dispatch("classroomPosts/newPostAdded");
          }, 2000);
          resetForm();
          Swal.fire({
            icon: "success",
            title: res.data.message,
            timer: 2000,
          });
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong!",
            timer: 3000,
          });
          console.error(err);
        })
        .finally(() => (isSubmitting.value = false));
    };

    const resetForm = () => {
      description.value.setHTML("");
      form.attachments = [];
      form.description = "";
    };

    const handleFilesUpload = (files) => {
      form.attachments = form.attachments.concat(files);
    };

    const removeAttachment = (file) => {
      form.attachments.forEach((item, index) => {
        if (file.id == item.id) {
          form.attachments.splice(index, 1);
        }
      });
    };

    return {
      form,
      isValid,
      handleFormSubmit,
      isSubmitting,
      description,
      isOpened,
      handleFilesUpload,
      removeAttachment,
    };
  },
};
</script>

<style>
.reveal-enter-active {
  transition: all 1s ease-out;
}

.reveal-enter-from {
  opacity: 0;
}

.reveal-enter-to {
  opacity: 1;
}
</style>
