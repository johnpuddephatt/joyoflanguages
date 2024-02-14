<template>
    <div style="height: 600px; width: 800px">
        <l-map @ready="mapReady" ref="map" v-model:zoom="zoom" :center="center">
            <l-tile-layer
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                layer-type="base"
                name="OpenStreetMap"
            ></l-tile-layer>
        </l-map>
    </div>
</template>

<script>
import "leaflet/dist/leaflet.css";
import L from "leaflet";
import { LMap, LTileLayer } from "@vue-leaflet/vue-leaflet";

export default {
    components: {
        LMap,
        LTileLayer,
    },
    data() {
        return {
            zoom: 13,
            center: [53.8008, -1.5491],
        };
    },

    methods: {
        mapReady() {
            this.$nextTick(() => {
                let map = this.$refs.map.leafletObject;
                setTimeout(() => {
                    console.log("fly to");
                    // map.flyTo([47.42222, -1.125482], 6);
                    map.panTo([53.8508, -1.5451]);
                }, 3000);
            });
        },
    },
};
</script>

<style></style>
