<template>
  <div>
    <p v-if="isLoading" class="text-center py-4">
      <i class="fas fa-circle-notch fa-spin"></i>
    </p>

    <h4
      class="text-center py-3"
      v-else-if="teachers.length == 0 && !hadTeachers"
    >
      No teacher here
    </h4>

    <div class="d-flex justify-content-between mb-2" v-else>
      <label class="form-label">
        <span>Added Teacher</span>
      </label>
      <button
        class="btn btn-outline-primary btn-sm"
        v-if="isAdmin()"
        @click="updateTeacherList"
        :disabled="removed_teacher_list.length < 1 || isUpdating"
      >
        <i class="fas fa-circle-notch mr-2 fa-spin" v-if="isUpdating"></i>
        <i class="fas fa-plus-circle mr-2" v-else></i>
        Update
      </button>
    </div>

    <div v-if="teachers.length == 0 && hadTeachers">
      <p class="text-muted">
        All teacher has been removed. Click on update button to save the
        changes!
      </p>
    </div>
    <div v-else>
      <ul class="list-group">
        <li
          class="list-group-item"
          v-for="(teacher, index) in teachers"
          :key="index"
        >
          <span>
            {{ teacher.user.username }}
          </span>
          <a
            href="javascript:void(0)"
            @click="removeTeacher(index)"
            v-if="isAdmin()"
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
import axios from "axios";
import { useStore } from "vuex";
import Swal from "sweetalert2";

export default {
  setup() {
    const store = useStore();

    const classroom_id = store.getters.getClassroomId;
    const user_mode = store.getters.getUserMode;

    const action = "/classrooms/" + classroom_id + "/teachers/list";
    const teachers = ref([]);
    const isLoading = ref(false);
    const isUpdating = ref(false);
    const removed_teacher_list = ref([]);
    const hadTeachers = ref(false);

    const getAddedTeachers = (action) => {
      isLoading.value = true;
      teachers.value = [];
      hadTeachers.value = false;

      axios
        .get(action)
        .then((res) => {
          Object.keys(res.data.data).forEach((key) => {
            teachers.value.push(res.data.data[key]);
          });
          if (teachers.value.length > 0) {
            hadTeachers.value = true;
          } else {
            hadTeachers.value = false;
          }
        })
        .finally(() => {
          isLoading.value = false;
        });
    };

    const isAdmin = () => {
      return user_mode == "admin";
    };

    const removeTeacher = (index) => {
      removed_teacher_list.value.push(teachers.value[index].user_id);
      teachers.value.splice(index);
    };

    const updateTeacherList = () => {
      isUpdating.value = true;
      axios
        .post("/admin/classrooms/" + classroom_id + "/teachers/update", {
          _method: "PATCH",
          removed_teacher_list: removed_teacher_list.value,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });

          getAddedTeachers(action);
        })
        .finally(() => {
          isUpdating.value = false;
        });
    };

    store.watch(
      (state, _) => {
        return state.classroomTeachers.newTeachers;
      },
      (newVal, oldVal) => {
        getAddedTeachers(action);
      }
    );

    onMounted(() => {
      getAddedTeachers(action);
    });

    return {
      teachers,
      isLoading,
      isUpdating,
      isAdmin,
      removeTeacher,
      updateTeacherList,
      removed_teacher_list,
      hadTeachers,
    };
  },
};
</script>
