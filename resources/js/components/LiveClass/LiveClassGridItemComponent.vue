<template>
  <div class="col-md-3">
    <div class="card card-sm card--elevated p-relative card-group-row__card">
      <a
        :href="getZoomLink(live_class)"
        target="_blank"
        class="card-img-top js-image"
        data-position="center"
        data-height="150"
        data-domfactory-upgraded="image"
        style="
          display: block;
          position: relative;
          overflow: hidden;
          background-image: url('/assets/images/paths/sketch_430x168.png');
          background-size: cover;
          background-position: center center;
          height: 140px;
        "
        title="Click to enter the live class"
      >
      </a>

      <div class="card-body flex">
        <div class="d-flex justify-content-between">
          <a class="card-title" :href="getZoomLink(live_class)" target="_blank">
            {{ live_class.topic }}
          </a>
          <small class="text-50 font-weight-bold mb-4pt">
            <a
              :href="getEditLink(live_class)"
              class="link-success mr-2"
              title="Edit this live class"
            >
              <i class="fas fa-edit"></i>
            </a>
            <a
              href="javascript:void(0)"
              @click.prevent="attemptDelete(live_class)"
              class="link-danger"
              title="Delete this live class"
            >
              <i class="fas fa-trash"></i>
            </a>
          </small>
        </div>
      </div>
      <div class="card-footer">
        <div class="row justify-content-between">
          <div class="col-auto d-flex align-items-center">
            <span class="material-icons icon-16pt text-50 mr-4pt"
              >date_range</span
            >
            <p
              class="flex text-50 lh-1 mb-0"
              :title="live_class.start_time + ' - ' + getTimezoneName()"
            >
              <small>{{ live_class.start_time }}</small>
            </p>
          </div>
          <div class="col-auto d-flex align-items-center">
            <span class="material-icons icon-16pt text-50 mr-4pt">timer</span>
            <p class="flex text-50 lh-1 mb-0" title="Live class duration">
              <small>{{ live_class.duration }}</small>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";

export default {
  props: ["live_class"],
  setup({ live_class }, { emit }) {
    const getEditLink = (data) => {
      return "/admin/liveclass/edit/" + data.id;
    };

    const attemptDelete = (data) => {
      Swal.fire({
        icon: "question",
        title: "Are you sure you want to delete this live class?",
        showCancelButton: true,
        cancelButtonText: "No, cancel it",
        confirmButtonText: "Yes, delete it!",
      }).then((res) => {
        if (res.isConfirmed) {
          deleteLiveClass(data);
        }
      });
    };

    const deleteLiveClass = (data) => {
      axios
        .delete("/admin/liveclass/delete/" + data.id)
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });

          emit("onDelete");
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: err.response.data.message,
          });
        });
    };

    const getZoomLink = (live_class) => {
      return live_class.join_url;
    };

    const getTimezoneName = () => {
      return Intl.DateTimeFormat().resolvedOptions().timeZone;
    };

    return {
      live_class,
      getEditLink,
      attemptDelete,
      getZoomLink,
      getTimezoneName,
    };
  },
};
</script>
