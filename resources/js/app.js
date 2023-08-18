import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";
import focus from "@alpinejs/focus";

import Swiper from "swiper";
import "swiper/css";

window.Swiper = Swiper;
window.Alpine = Alpine;
Alpine.plugin(intersect);
Alpine.plugin(focus);
Alpine.start();
