<template>
  <div>
    <div class="card" v-if="isAdmin()">
      <div class="card-body">
        <add-teacher-component />
      </div>
    </div>

    <teacher-list-component />
  </div>
</template>

<script>
import AddTeacherComponent from "../AddTeacherComponent.vue";
import TeacherListComponent from "../../TeacherListComponent.vue";
import { useStore } from "vuex";

export default {
  components: {
    AddTeacherComponent,
    TeacherListComponent,
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
