<template>
  <div class="col-md-3">
    <div class="card card-sm card--elevated p-relative card-group-row__card">
      <a
        :href="getClassroomLink()"
        class="card-img-top js-image classroom-item"
        data-position="center"
        data-height="150"
        data-domfactory-upgraded="image"
        :style="{ 'background-image': 'url(' + background_image + ')' }"
      >
      </a>

      <div class="card-body flex">
        <div class="">
          <div class="d-flex justify-content-between">
            <a class="card-title" :href="getClassroomLink()">
              {{ classroom.title }}
            </a>
            <small class="text-50 font-weight-bold mb-4pt">
              <a
                href="javascript:void(0)"
                @click.prevent="attemptDelete(classroom)"
                class="link-danger"
                title="Delete this class"
                v-if="!isDeleting"
              >
                <i class="fas fa-trash"></i>
              </a>
              <a
                href="javascript:void(0)"
                class="link-danger"
                title="Delete this class"
                v-else
              >
                <i class="fas fa-circle-notch fa-spin"></i>
              </a>
            </small>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row justify-content-between">
          <div class="col-auto d-flex align-items-center">
            <span class="material-icons icon-16pt text-50 mr-4pt">room</span>
            <p class="flex text-50 lh-1 mb-0">
              <small>{{ classroom.section }}</small>
            </p>
          </div>
          <div class="col-auto d-flex align-items-center">
            <span class="material-icons icon-16pt text-50 mr-4pt">people</span>
            <p class="flex text-50 lh-1 mb-0">
              <small>{{ classroom.students_count }} Students</small>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from "vue";
import Swal from "sweetalert2";

export default {
  props: ["classroom"],
  setup(props, { emit }) {
    const classroom = props.classroom;
    const background_image = ref("");
    const isDeleting = ref(false);

    onMounted(() => {
      console.log(classroom);
      if (classroom.cover_photo) {
        background_image.value = classroom.cover_photo;
      } else {
        background_image.value =
          location.origin + "/assets/images/paths/sketch_430x168.png";
      }
    });

    const getClassroomLink = () => {
      return "/admin/classrooms/" + classroom.unique_id + "/posts";
    };

    const attemptDelete = (classroom) => {
      Swal.fire({
        icon: "question",
        title: "Are you sure you want to delete this classroom?",
        showCancelButton: true,
        cancelButtonText: "No, cancel it!",
        confirmButtonText: "Yes, delete it!",
      }).then((res) => {
        if (res.isConfirmed) {
          deleteClassroom(classroom);
        }
      });
    };

    const deleteClassroom = (classroom) => {
      isDeleting.value = true;
      axios
        .delete("/admin/classrooms/" + classroom.unique_id)
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          emit("classroomDelete");
        })
        .catch((err) => {
          if (!err.response.data.errors) {
            Swal.fire({
              icon: "error",
              title: err.response.data.message,
            });
          }
        })
        .then(() => {
          isDeleting.value = false;
        });
    };

    return {
      classroom,
      background_image,
      isDeleting,
      getClassroomLink,
      attemptDelete,
    };
  },
};
</script>

<style scoped>
.classroom-item {
  display: block;
  position: relative;
  overflow: hidden;
  background-size: cover;
  background-position: center center;
  height: 140px;
}
</style>
