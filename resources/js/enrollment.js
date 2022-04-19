require("./bootstrap");
import { createApp } from "vue";
import store from "./store";
import axios from "axios";

import FormComponent from "./components/Enrollments/FormComponent.vue";

const app = createApp({});

// axios.defaults.baseURL = document.head.querySelector(
//     'meta[name="api-base-url"]'
// ).content;

app.component("form-component", FormComponent);

app.mount("#enrollment");
