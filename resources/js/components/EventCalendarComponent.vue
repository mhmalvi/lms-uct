<template>
  <div class="row">
    <div class="d-relative" :class="editable ? 'col-md-8' : 'col-md-12'">
      <FullCalendar ref="fullCalendar" :options="calendarOptions" />

      <transition name="fade">
        <div
          class="
            loading-overlay
            d-flex
            justify-content-center
            align-items-center
          "
          v-if="fetchingData"
        >
          <i class="fas fa-circle-notch fa-spin text-dark loader-icon"></i>
        </div>
      </transition>
    </div>

    <div class="col-md-4" v-if="editable">
      <create-event-form-component @newEventAdded="handleNewEvent" />
    </div>
  </div>
</template>

<script>
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import timeGridPlugin from "@fullcalendar/timegrid";
import bootstrapTheme from "@fullcalendar/bootstrap";
import { reactive, ref, onMounted } from "vue";
import "vue3-date-time-picker/dist/main.css";
import CreateEventFormComponent from "./CreateEventFormComponent.vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  components: {
    FullCalendar,
    CreateEventFormComponent,
  },
  props: ["editable"],
  setup({ editable }) {
    const fetchingData = ref(false);
    const calendarOptions = reactive({
      plugins: [
        dayGridPlugin,
        bootstrapTheme,
        interactionPlugin,
        timeGridPlugin,
      ],
      headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek",
      },
      initialView: "dayGridMonth",
      themeSystem: "bootstrap",
      events: [],
      eventClick: (info) => {
        if (editable) {
          attemptEventDelete(info);
        }
      },
    });

    const fullCalendar = ref(0);
    let calendarApi = null;

    onMounted(() => {
      calendarApi = fullCalendar.value.getApi();

      getEvents();

      // for resizing the calendar UI after a small delay.
      // this is becuase calendar UI gets broken at initial render
      setTimeout(() => {
        calendarApi.updateSize();
      }, 100);
    });

    const getEvents = () => {
      fetchingData.value = true;
      axios
        .get("/calendar-events/list")
        .then((res) => {
          calendarApi.removeAllEvents();
          putEventsInCalendar(res.data.data);
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: err.response.data.message,
          });
        })
        .finally(() => {
          fetchingData.value = false;
        });
    };

    const putEventsInCalendar = (events) => {
      events.forEach((event) => {
        addEvent(event);
      });
    };

    const addEvent = (data) => {
      let event = {
        id: data.id,
        title: data.title,
        start: data.start_date,
        end: data.end_date,
        textColor: "#fff",
        backgroundColor: data.color ? data.color : "#303840",
        borderColor: data.color ? data.color : "#303840",
      };

      if (data.start_time) {
        event.start = new Date(event.start + " " + data.start_time);
      }
      if (data.end_time) {
        event.end = new Date(event.end + " " + data.end_time);
      }

      calendarApi.addEvent(event);
    };

    const handleNewEvent = () => {
      getEvents();
    };

    const attemptEventDelete = (data) => {
      Swal.fire({
        icon: "question",
        title: "Are you sure want you to delete this event?",
        text: "Event name: " + data.event.title,
        showCancelButton: true,
      }).then((res) => {
        if (res.isConfirmed) {
          deleteEvent(data.event.id);
        }
      });
    };

    const deleteEvent = (event_id) => {
      axios
        .post("/admin/calendar-events/destroy/" + event_id, {
          _method: "DELETE",
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          getEvents();
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: err.response.data.message,
          });
        });
    };

    return {
      calendarOptions,
      fullCalendar,
      fetchingData,
      handleNewEvent,
      editable,
    };
  },
};
</script>

<style scoped>
.loading-overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 3;
  background: rgba(255, 255, 255, 0.7);
}

.loader-icon {
  position: absolute;
  font-size: 22px;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.4s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.fade-enter-to,
.fade-leave-from {
  opacity: 1;
}
</style>
