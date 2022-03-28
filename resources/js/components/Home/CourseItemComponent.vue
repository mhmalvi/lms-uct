<template>
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
        :href="'/course/' + course.uuid"
        class="card-img-top js-image course-item-image-wrapper"
        data-position=""
        data-height="140"
        :style="{ backgroundImage: 'url(' + getImageUrl(course) + ')' }"
      >
        <img
          class="course-item-image"
          :src="getImageUrl(course)"
          alt="course"
        />
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
            <a class="card-title" :href="'/course/' + course.uuid">
              {{ course.title }}
            </a>
            <small class="text-50 font-weight-bold mb-4pt">Elijah Murray</small>
          </div>
          <a
            href="#"
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
    <div class="popoverContainer d-none">
      <div class="media">
        <div class="media-left mr-12pt">
          <img
            src="{{asset('assets/images/paths/sketch_40x40@2x.png')}}"
            width="40"
            height="40"
            alt="Angular"
            class="rounded"
          />
        </div>
        <div class="media-body">
          <div class="card-title mb-0">Learn Sketch</div>
          <p class="lh-1 mb-0">
            <span class="text-50 small">with</span>
            <span class="text-50 small font-weight-bold">Elijah Murray</span>
          </p>
        </div>
      </div>

      <p class="my-16pt text-70">
        Learn the fundamentals of working with Angular and how to create basic
        applications.
      </p>

      <div class="mb-16pt">
        <div class="d-flex align-items-center">
          <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
          <p class="flex text-50 lh-1 mb-0">
            <small>Fundamentals of working with Angular</small>
          </p>
        </div>
        <div class="d-flex align-items-center">
          <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
          <p class="flex text-50 lh-1 mb-0">
            <small>Create complete Angular applications</small>
          </p>
        </div>
        <div class="d-flex align-items-center">
          <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
          <p class="flex text-50 lh-1 mb-0">
            <small>Working with the Angular CLI</small>
          </p>
        </div>
        <div class="d-flex align-items-center">
          <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
          <p class="flex text-50 lh-1 mb-0">
            <small>Understanding Dependency Injection</small>
          </p>
        </div>
        <div class="d-flex align-items-center">
          <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
          <p class="flex text-50 lh-1 mb-0">
            <small>Testing with Angular</small>
          </p>
        </div>
      </div>

      <div class="row align-items-center">
        <div class="col-auto">
          <div class="d-flex align-items-center mb-4pt">
            <span class="material-icons icon-16pt text-50 mr-4pt"
              >access_time</span
            >
            <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
          </div>
          <div class="d-flex align-items-center mb-4pt">
            <span class="material-icons icon-16pt text-50 mr-4pt"
              >play_circle_outline</span
            >
            <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
          </div>
          <div class="d-flex align-items-center">
            <span class="material-icons icon-16pt text-50 mr-4pt"
              >assessment</span
            >
            <p class="flex text-50 lh-1 mb-0"><small>Beginner</small></p>
          </div>
        </div>
        <div class="col text-right">
          <a href="student-course.html" class="btn btn-primary"
            >Watch trailer</a
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["course"],
  setup({ course }) {
    const getImageUrl = (course) => {
      if (course.image) {
        return course.image;
      }
      return location.origin + "/assets/images/paths/sketch_430x168.png";
    };
    console.log(course);
    return {
      course,
      getImageUrl,
    };
  },
};
</script>

<style scoped>
.course-item-image-wrapper {
  display: block;
  position: relative;
  overflow: hidden;
  background-size: cover;
  background-position: center center;
  height: 140px;
}

.course-item-image {
  visibility: hidden;
}
</style>
