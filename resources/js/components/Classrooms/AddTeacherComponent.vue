<template>
  <div>
    <div class="form-group">
      <label
        for="select_teacher"
        class="form-label d-flex justify-content-between"
      >
        <span> Select Teacher </span>
        <button
          class="btn btn-outline-primary btn-sm"
          @click="save"
          :disabled="teacher_select == '' || isSubmitting"
        >
          <i class="fas fa-circle-notch mr-2 fa-spin" v-if="isSubmitting"></i>
          <i class="fas fa-plus-circle mr-2" v-else></i>
          Add Teacher
        </button>
      </label>
      <select
        id="select_teacher"
        class="form-control form-control-flush"
        v-model="teacher_select"
      >
        <option value="" selected disabled>Select a teacher</option>
        <option
          v-for="(teacher, index) in teachers"
          :key="index"
          :value="teacher.username"
        >
          {{ teacher.username }} - {{ teacher.email }}
        </option>
      </select>
    </div>

    <div class="form-group"></div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import { ref, onMounted } from "vue";
import { useStore } from "vuex";

export default {
  setup() {
    const teachers = ref([]);
    const teacher_select = ref("");
    const isSubmitting = ref(false);

    const store = useStore();

    const classroom_id = store.getters.getClassroomId;

    const getTeachers = () => {
      axios
        .get("/admin/teachers/raw")
        .then((res) => {
          teachers.value = res.data.data;
        })
        .catch((error) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong while fetching teachers!",
          });
        });
    };

    const save = () => {
      isSubmitting.value = true;
      axios
        .post("/admin/classrooms/members/add", {
          users: [teacher_select.value], // the api expects an array of usernames here
          classroom_id,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          resetForm();
          store.dispatch("classroomTeachers/newTeacherAdded");
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: err.response.data.message,
          });
        })
        .finally(() => {
          isSubmitting.value = false;
        });
    };

    const resetForm = () => {
      teacher_select.value = [];
    };

    onMounted(() => {
      getTeachers();
    });

    return {
      teachers,
      teacher_select,
      save,
      isSubmitting,
    };
  },
};
</script>
