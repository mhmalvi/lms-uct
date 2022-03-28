<template>
  <div>
    <form class="mx-auto" @submit.prevent="handleCreateEvent()">
      <h3>Create an event</h3>
      <div class="form-group">
        <label for="title" class="form-label">Title*</label>
        <input
          type="text"
          class="form-control"
          name="title"
          v-model="form.title"
        />
        <p
          class="text-danger"
          v-if="validation.errors.title && validation.errors.title.length > 0"
        >
          {{ validation.errors.title[0] }}
        </p>
      </div>
      <div class="form-group">
        <label for="event_datetime" class="form-label">Event Date*</label>
        <Datepicker :enableTimePicker="false" range v-model="form.date" />
        <p
          class="text-danger"
          v-if="validation.errors.date && validation.errors.date.length > 0"
        >
          {{ validation.errors.date[0] }}
        </p>
      </div>
      <div class="form-group row">
        <div class="col-6">
          <label for="start_time" class="form-label">Start time</label>
          <input
            type="time"
            class="form-control"
            name="start_time"
            v-model="form.start_time"
          />
          <p
            class="text-danger"
            v-if="
              validation.errors.start_time &&
              validation.errors.start_time.length > 0
            "
          >
            {{ validation.errors.start_time[0] }}
          </p>
        </div>
        <div class="col-6">
          <label for="end_time" class="form-label">End time</label>
          <input
            type="time"
            class="form-control"
            name="end_time"
            v-model="form.end_time"
          />
          <p
            class="text-danger"
            v-if="
              validation.errors.end_time &&
              validation.errors.end_time.length > 0
            "
          >
            {{ validation.errors.end_time[0] }}
          </p>
        </div>
      </div>
      <div class="form-group">
        <select class="form-control" v-model="form.color">
          <option value="" selected>
            Optionally you can choose an event color ...
          </option>
          <option value="#5567ff" :style="['color: #5567ff']">Primary</option>
          <option value="#868e96" :style="['color: #868e96']">Secondary</option>
          <option value="#ed0b4c" :style="['color: #ed0b4c']">Accent</option>
          <option value="#303840" :style="['color: #303840']">Dark</option>
          <option value="#6610f2" :style="['color: #6610f2']">Indigo</option>
          <option value="#fd7e14" :style="['color: #fd7e14']">Orange</option>
          <option value="#20c997" :style="['color: #20c997']">Teal</option>
        </select>
      </div>
      <div class="form-group mt-4">
        <button
          class="btn btn-outline-primary"
          type="submit"
          :disabled="isSubmitting"
        >
          <i class="fa fa-plus mr-2" v-if="!isSubmitting"></i>
          <i class="fas fa-circle-notch fa-spin mr-2" v-else></i>
          Create Event
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import { ref, reactive } from "vue";
import Datepicker from "vue3-date-time-picker";
import { ColorPicker } from "vue3-colorpicker";
import "vue3-colorpicker/style.css";

export default {
  components: {
    ColorPicker,
    Datepicker,
  },
  setup(props, context) {
    const isSubmitting = ref(false);
    const form = reactive({
      title: "",
      date: "",
      start_time: "",
      end_time: "",
      color: "",
    });
    const validation = reactive({
      errors: {},
      message: "",
    });

    const handleCreateEvent = () => {
      resetValidationErrors();
      isSubmitting.value = true;
      axios
        .post("/admin/calendar-events/store", form)
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          context.emit("newEventAdded");
          resetForm();
        })
        .catch((err) => {
          if (err.response.status == 422) {
            validation.errors = err.response.data.errors;
          } else {
            Swal.fire({
              icon: "error",
              title: err.response.data.message,
            });
          }
          console.log(err.response);
        })
        .finally(() => {
          isSubmitting.value = false;
        });
    };

    const resetValidationErrors = () => {
      validation.errors = {};
      validation.message = "";
    };

    const resetForm = () => {
      form.title = "";
      form.date = "";
      form.start_time = "";
      form.end_time = "";
    };

    return {
      isSubmitting,
      handleCreateEvent,
      form,
      validation,
    };
  },
};
</script>
<style>
.vc-color-wrap.transparent {
  width: 50px !important;
  height: 50px !important;
}
</style>
