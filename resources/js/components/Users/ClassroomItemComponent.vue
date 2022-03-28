<template>
  <div>
    <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">
      <div
        class="
          card card-sm card--elevated
          p-relative
          o-hidden
          card-group-row__card
        "
        data-toggle="popover"
        data-trigger="click"
      >
        <a
          :href="getClassroomLink()"
          class="card-img-top js-image"
          data-position=""
          data-height="140"
        >
          <img src="/assets/images/paths/photoshop_430x168.png" alt="course" />
          <span class="overlay__content">
            <span class="overlay__action d-flex flex-column text-center">
              <i class="material-icons icon-32pt">play_circle_outline</i>
              <span class="card-title text-white">Preview</span>
            </span>
          </span>
        </a>

        <div class="card-body flex">
          <div class="d-flex">
            <div class="flex">
              <a class="card-title" :href="getClassroomLink()">{{
                classroom.title
              }}</a>
              <small class="text-50 font-weight-bold mb-4pt"
                >Elijah Murray</small
              >
            </div>
            <a
              href=""
              data-toggle="tooltip"
              data-title="Add Favorite"
              data-placement="top"
              data-boundary="window"
              class="ml-4pt material-icons text-20 card-course__icon-favorite"
              >favorite_border</a
            >
          </div>
        </div>
        <div class="card-footer">
          <div class="row justify-content-between">
            <div class="col-auto d-flex align-items-center">
              <span class="material-icons icon-16pt text-50 mr-4pt"
                >access_time</span
              >
              <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
            </div>
            <div class="col-auto d-flex align-items-center">
              <span class="material-icons icon-16pt text-50 mr-4pt"
                >play_circle_outline</span
              >
              <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["classroom"],
  setup({ classroom }) {
    const getClassroomLink = () => {
      return "/classrooms/" + classroom.unique_id + "/posts";
    };

    return {
      getClassroomLink,
    };
  },
};
</script>
