<template>
  <div>
    <div class="card" v-if="isAdmin()">
      <div class="card-body">
        <add-student-component />
      </div>
    </div>

    <student-list-component />
  </div>
</template>

<script>
import AddStudentComponent from "../AddStudentComponent.vue";
import StudentListComponent from "../../StudentListComponent.vue";
import { useStore } from "vuex";

export default {
  components: {
    AddStudentComponent,
    StudentListComponent,
  },
  setup() {
    const store = useStore();

    const user_mode = store.getters.getUserMode;

    const isAdmin = () => {
      return user_mode == "admin";
    };

    return {
      isAdmin,
    };
  },
};
</script>
