<template>
  <div>
    <p v-if="isLoading" class="text-center py-4">
      <i class="fas fa-circle-notch fa-spin"></i>
    </p>
    <h4
      class="text-center py-4"
      v-else-if="students.length == 0 && !hadStudents"
    >
      No students here
    </h4>
    <div class="d-flex justify-content-between mb-2" v-else>
      <label class="form-label">
        <span>Students List</span>
      </label>
      <button
        class="btn btn-outline-primary btn-sm"
        v-if="editable && hadStudents"
        @click="updateList()"
        :disabled="removed_student_ids.length < 1 || isUpdating"
      >
        <i class="fas fa-circle-notch mr-2 fa-spin" v-if="isUpdating"></i>
        <i class="fas fa-plus-circle mr-2" v-else></i>
        Update
      </button>
    </div>

    <div v-if="hadStudents && students.length == 0 && !isLoading">
      <p class="text-muted">
        All user removed! Click on update button to save the changes.
      </p>
    </div>
    <div v-else>
      <ul class="list-group">
        <li
          class="list-group-item"
          v-for="(student, index) in students"
          :key="index"
        >
          <span>
            {{ student }}
          </span>
          <a
            href="javascript:void(0)"
            @click="removeStudent(index)"
            v-if="editable"
          >
            <i class="fas fa-times ml-2"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from "vue";
import { useStore } from "vuex";
import Swal from "sweetalert2";

export default {
  setup() {
    const store = useStore();

    const classroom_id = store.getters.getClassroomId;
    const editable = store.getters.getUserMode == "admin" ? true : false;

    const students = ref([]);
    const isLoading = ref(false);
    const isUpdating = ref(false);
    const hadStudents = ref(false);
    const removed_student_ids = ref([]);

    const getAddedStudents = () => {
      students.value = [];
      isLoading.value = true;
      axios
        .get("/classrooms/" + classroom_id + "/students")
        .then((res) => {
          for (let key in res.data.data) {
            students.value.push(res.data.data[key].user.username);
          }
          if (Object.keys(res.data.data).length > 0) {
            hadStudents.value = true;
          } else {
            hadStudents.value = false;
          }
        })
        .catch((error) => {
          Swal.fire({
            icon: "error",
            title:
              "Something went wrong while fetching classroom's student list!",
            text: error.response.data.message,
          });
        })
        .finally(() => {
          isLoading.value = false;
        });
    };

    const removeStudent = (index) => {
      removed_student_ids.value.push(students.value[index]);
      students.value.splice([index], 1);
    };

    const updateList = () => {
      isUpdating.value = true;
      axios
        .post("/admin/classrooms/" + classroom_id + "/students/update", {
          _method: "PATCH",
          removed_student_list: removed_student_ids.value,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });

          getAddedStudents();
        })
        .finally(() => {
          isUpdating.value = false;
        });
    };

    onMounted(() => {
      getAddedStudents();
    });

    store.watch(
      (state, _) => {
        return state.classroomStudents.newStudents;
      },
      (newVal, oldVal) => {
        getAddedStudents();
      }
    );

    return {
      isLoading,
      students,
      isUpdating,
      editable,
      removeStudent,
      hadStudents,
      updateList,
      removed_student_ids,
    };
  },
};
</script>
