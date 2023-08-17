import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";
import Swiper from "swiper";
import "swiper/css";

window.Swiper = Swiper;
window.Alpine = Alpine;
Alpine.plugin(intersect);
Alpine.start();
