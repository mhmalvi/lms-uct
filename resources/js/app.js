require("./bootstrap");
import { createApp } from "vue";
import store from "./store";
import axios from "axios";

import { createRouter, createWebHistory } from "vue-router";

import CopyWrite from "./components/CopyWrite.vue";
import UserLogin from "./components/Auth/Users/LoginComponent.vue";
import AdminLogin from "./components/Auth/Admin/LoginComponent.vue";

// Import the components here
import CreateCategories from "./components/Categories/CreateCategories.vue";
import ListCategories from "./components/Categories/ListCategories.vue";
import EditCategory from "./components/Categories/EditCategory.vue";

import CourseList from "./components/Courses/ListCourses.vue";
import CreateCourses from "./components/Courses/CreateCourses.vue";
import UpdateCourse from "./components/Courses/UpdateCourse.vue";

import EnrollUserForm from "./components/Users/EnrollUserForm.vue";
import StudentsList from "./components/Users/StudentsList.vue";
import StudentEditForm from "./components/Users/StudentEditForm.vue";

import TeachersList from "./components/Users/TeachersList.vue";
import TeachersEditForm from "./components/Users/TeacherEditForm.vue";
import CreateClassroom from "./components/Classrooms/CreateClassroom.vue";

//profile
import UserEditProfile from "./components/Profile/EditProfile.vue";

import ClassroomItemsGridList from "./components/Classrooms/ClassroomItemsGridList.vue";
import ClassroomView from "./components/Classrooms/ClassroomView.vue";

import HomeCourseListComponent from "./components/Home/CourseListComponent.vue";

import EventCalendarComponent from "./components/EventCalendarComponent.vue";

import NewsNoticeListComponent from "./components/NewsNotices/NewsNoticeListComponent.vue";
import CreateNewsNoticeComponent from "./components/NewsNotices/NewsNoticeCreateComponent.vue";
import UpdateNewsNoticeComponent from "./components/NewsNotices/NewsNoticeUpdateComponent.vue";

import AvatarHeaderComponent from "./components/AvatarHeaderComponent.vue";
// import LiveClass from "./components/LiveClass/CreateClass.vue";
import LiveClassListComponent from "./components/LiveClass/LiveClassListComponent.vue";
import CreateLiveClassComponent from "./components/LiveClass/CreateLiveClassComponent.vue";
import UpdateLiveClassComponent from "./components/LiveClass/UpdateLiveClassComponent.vue";

/**
 * importing students components
 */
import ClassroomList from "./components/Users/ClassroomList.vue";
import StudentClassroomView from "./components/Users/ClassroomView.vue";
// import StudentClassroomList from "./components/Users/StudentClassroomList.vue";
// import StudentClassroomView from "./components/Users/StudentClassroomView.vue";

const app = createApp({});

axios.defaults.baseURL = document.head.querySelector(
    'meta[name="api-base-url"]'
).content;

// Register all components here

// Admin components
app.component("create-categories", CreateCategories);
app.component("list-categories", ListCategories);
app.component("edit-category", EditCategory);

app.component("course-list", CourseList);
app.component("create-courses", CreateCourses);
app.component("update-course", UpdateCourse);

app.component("enrole-user-form", EnrollUserForm);
app.component("students-list", StudentsList);
app.component("student-edit-form", StudentEditForm);

app.component("teachers-list", TeachersList);
app.component("teacher-edit-form", TeachersEditForm);
app.component("create-classroom", CreateClassroom);
app.component("user-edit-profile", UserEditProfile);

app.component("classroom-items-grid-list", ClassroomItemsGridList);
app.component("classroom-view", ClassroomView);

app.component("live-class-list-component", LiveClassListComponent);
app.component("create-live-class-component", CreateLiveClassComponent);
app.component("edit-live-class-component", UpdateLiveClassComponent);
// End of Admin components

// Students components
app.component("student-classroom-list", ClassroomList);
// app.component("student-classroom-list", StudentClassroomList);
app.component("student-classroom-view", StudentClassroomView);
// End of students components

// for both admin, students and teachers
app.component("event-calendar-component", EventCalendarComponent);
app.component("avatar-header-component", AvatarHeaderComponent);
// ---

app.component("news-notice-list-component", NewsNoticeListComponent);
app.component("create-news-notice-component", CreateNewsNoticeComponent);
app.component("edit-news-notice-component", UpdateNewsNoticeComponent);

/**
 * Guest
 */
app.component("copy-write", CopyWrite);
app.component("login-component", UserLogin);

app.component("home-course-list-component", HomeCourseListComponent);

/**
 * Admin
 */
app.component("admin-login", AdminLogin);

/**
 * Vue Router
 */
import { routes } from "./routes";
const router = createRouter({
    history: createWebHistory(),
    routes,
});

app.use(router).use(store).mount("#app");

require("alpinejs");
