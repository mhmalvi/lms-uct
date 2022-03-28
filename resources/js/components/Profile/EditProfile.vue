<template>
  <div>
    <form @submit.prevent="onFormSubmitHandlar()">
      <div class="row mb-32pt">
        <div class="col-lg-4">
          <div class="page-separator">
            <div class="page-separator__text">Basic Informations</div>
          </div>
          <p class="card-subtitle text-70 mb-16pt mb-lg-0"></p>
          <div class="form-group">
            <ImagePickerComponent
              label="you profile picture"
              ref="avatar_component"
              circular
              @requestForChange="handleProfilePictureUpdate"
              @requestForDelete="handleProfilePictureDelete"
            />
          </div>
        </div>
        <div class="col-lg-8 d-flex align-items-center">
          <div class="flex" style="max-width: 100%">
            <div class="form-group">
              <label class="form-label" for="code">Username</label>
              <input
                type="text"
                class="form-control"
                id="code"
                v-model="form.username"
                disabled
              />
            </div>
            <div class="form-group">
              <label for="email" class="form-label"> Email </label>
              <input
                type="text"
                class="form-control"
                id="email"
                v-model="form.email"
                disabled
              />
            </div>

            <div class="form-group">
              <label for="first_name" class="form-label"> First Name </label>
              <input
                type="text"
                class="form-control"
                id="first_name"
                v-model="form.first_name"
              />
            </div>

            <div class="form-group">
              <label for="last_name" class="form-label">Last Name</label>
              <input
                type="text"
                class="form-control"
                id="last_name"
                v-model="form.last_name"
              />
            </div>
            <div class="form-group">
              <label for="contact" class="form-label">Contact</label>
              <input
                type="text"
                class="form-control"
                id="contact"
                v-model="form.contact"
              />
            </div>
            <div class="form-group">
              <label for="address" class="form-label">Address</label>
              <input
                type="text"
                class="form-control"
                id="address"
                v-model="form.address"
              />
            </div>
            <div class="form-group">
              <label for="bio" class="form-label">About You</label>
              <textarea
                v-model="form.bio"
                id="bio"
                rows="5"
                class="form-control"
              ></textarea>
            </div>

            <div class="form-group">
              <button
                class="btn btn-primary"
                :class="isSubmitting && 'is-loading'"
                :disabled="isSubmitting"
              >
                <span class="material-icons mr-2">save</span>
                Save Now
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import { ref, reactive, onMounted } from "vue";
import ImagePickerComponent from "../Global/ImagePickerComponent.vue";
import { useStore } from "vuex";

export default {
  props: ["user_data"],
  components: { ImagePickerComponent },
  setup(props) {
    const user = JSON.parse(props.user_data);
    const isSubmitting = ref(false);
    const store = useStore();
    const avatar_component = ref(null);

    const form = reactive({
      username: user.username,
      email: user.email,
      first_name: user.info.first_name ?? "",
      last_name: user.info.last_name ?? "",
      contact: user.info.contact ?? "",
      address: user.info.address ?? "",
      bio: user.info.about ?? "",
    });

    onMounted(() => {
      if (user.avatar) {
        avatar_component.value.setImage(user.avatar);
      }
    });

    const onFormSubmitHandlar = () => {
      isSubmitting.value = true;

      axios
        .post("/profile", {
          ...form,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong!",
            text: err.response.data.message,
          });
        })
        .finally(() => {
          isSubmitting.value = false;
        });
    };

    const handleProfilePictureUpdate = (data) => {
      Swal.fire({
        icon: "question",
        title: "Do you want to update the profile picture?",
        showCancelButton: true,
        confirmButtonText: "Yes, update it!",
      }).then((res) => {
        if (res.isConfirmed) {
          avatar_component.value.turnOnUploading();
          axios
            .post("/profile/avatar/update", {
              _method: "PUT",
              avatar: data.image,
            })
            .then((res) => {
              avatar_component.value.setImage(res.data.avatar);
              store.dispatch("newAvatarAdded", res.data.avatar);
            })
            .catch((err) => {
              Swal.fire({
                icon: "error",
                title: err.response.data.message,
              });
            })
            .finally(() => {
              avatar_component.value.turnOffUploading();
            });
        }
      });
    };

    const handleProfilePictureDelete = () => {
      Swal.fire({
        icon: "question",
        title: "Are you sure you want to delete your profile picture?",
        showCancelButton: true,
      }).then((res) => {
        if (res.isConfirmed) {
          axios
            .post("/profile/avatar/delete", {
              _method: "DELETE",
            })
            .then((res) => {
              Swal.fire({
                icon: "success",
                title: res.data.message,
              });
              avatar_component.value.deleteImage();
              store.dispatch("newAvatarAdded", res.data.avatar);
            })
            .catch((err) => {
              Swal.fire({
                icon: "error",
                title: "Something went wrong!",
                text: err.response.data.message,
              });
            });
        }
      });
    };

    return {
      form,
      isSubmitting,
      onFormSubmitHandlar,
      handleProfilePictureUpdate,
      avatar_component,
      handleProfilePictureDelete,
    };
  },
};
</script>
