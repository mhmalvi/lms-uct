<template>
  <div>
    <div class="form-group">
      <label
        for="select_student"
        class="form-label d-flex justify-content-between"
      >
        <span>Select Students</span>
        <button
          class="btn btn-outline-primary btn-sm"
          @click="save"
          :disabled="selected_students.length == 0 || isSubmitting"
        >
          <i class="fas fa-circle-notch mr-2 fa-spin" v-if="isSubmitting"></i>
          <i class="fas fa-plus-circle mr-2" v-else></i>
          Add Students
        </button>
      </label>
      <input
        list="select_student"
        class="form-control form-control-flush"
        @change="newUserAdded"
        placeholder="Type student name ..."
        v-model="student_select"
      />
      <datalist id="select_student">
        <option
          v-for="(student, index) in students"
          :key="index"
          :value="student.username"
        >
          {{ student.username }} {{ getFullName(student) }} -
          {{ student.email }}
        </option>
      </datalist>
    </div>

    <div class="form-group">
      <p
        class="mr-2"
        v-for="(student, index) in selected_students"
        :key="index"
      >
        {{ student }}
        <a href="javascript:void(0)" @click="removeStudent(index)">
          <i class="fas fa-times ml-2"></i>
        </a>
      </p>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import { ref, onMounted } from "vue";
import { useStore } from "vuex";

export default {
  setup() {
    const students = ref([]);
    const student_select = ref("");
    const selected_students = ref([]);
    const isSubmitting = ref(false);

    const store = useStore();

    const classroom_id = store.getters.getClassroomId;

    const getStudents = () => {
      axios
        .get("/admin/students/raw")
        .then((res) => {
          students.value = res.data.data;
        })
        .catch((error) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong while fetching students!",
            text: error.response.data.message,
          });
        });
    };

    const newUserAdded = () => {
      // check if there is a student who's username matches with user's input
      let found_student = students.value.filter((student) => {
        return student.username == student_select.value;
      });
      // if no matching student found, return and quit
      if (found_student.length == 0) return;

      // found a student who's username matches with user's input
      // now add the student in the added list
      if (
        student_select.value != "" &&
        selected_students.value.indexOf(student_select.value) == -1
      ) {
        selected_students.value.push(student_select.value);
      }
      student_select.value = "";
    };

    const removeStudent = (index) => {
      selected_students.value.splice(index, 1);
    };

    const save = () => {
      isSubmitting.value = true;

      axios
        .post("/admin/classrooms/members/add", {
          users: selected_students.value,
          classroom_id,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });

          store.dispatch("classroomStudents/newStudentAdded");

          selected_students.value = [];
        })
        .catch()
        .finally(() => {
          isSubmitting.value = false;
        });
    };

    onMounted(() => {
      getStudents();
    });

    const getFullName = (student) => {
      if (student.info && student.info.first_name && student.info.last_name) {
        return (
          "(" + student.info.first_name + " " + student.info.last_name + ")"
        );
      }
      return "";
    };

    return {
      students,
      student_select,
      newUserAdded,
      selected_students,
      removeStudent,
      save,
      isSubmitting,
      getFullName,
    };
  },
};
</script>
