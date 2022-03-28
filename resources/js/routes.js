import PostsTabComponent from "./components/Classrooms/ClassroomView/PostsTabComponent.vue";
import StudentsTabComponent from "./components/Classrooms/ClassroomView/StudentsTabComponent.vue";
import TeachersTabComponent from "./components/Classrooms/ClassroomView/TeacherTabComponent.vue";
import NotFound from "./components/NotFound.vue";

const routes = [
    {
        path: "/classrooms/:classroom_id/posts",
        component: PostsTabComponent,
    },
    {
        path: "/classrooms/:classroom_id/students",
        component: StudentsTabComponent,
    },
    {
        path: "/classrooms/:classroom_id/teachers",
        component: TeachersTabComponent,
    },
    // same components and logics, different route path (for admin)
    {
        path: "/admin/classrooms/:classroom_id/posts",
        component: PostsTabComponent,
    },
    {
        path: "/admin/classrooms/:classroom_id/students",
        component: StudentsTabComponent,
    },
    {
        path: "/admin/classrooms/:classroom_id/teachers",
        component: TeachersTabComponent,
    },
    // for removing the console.warn() for not matching to any route
    {
        path: "/:pathMatch(.*)",
        component: NotFound,
    },
];

export { routes };
