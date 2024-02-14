import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";

import focus from "@alpinejs/focus";
import Swiper from "swiper";
import "swiper/css";

import { createApp } from "vue";
const app = createApp();

// import teamMap from "./components/teammap.vue";
// app.component("team-map", teamMap);
// app.mount("#app");

window.Swiper = Swiper;
window.Alpine = Alpine;
Alpine.plugin(intersect);
Alpine.plugin(focus);
Alpine.start();
