<template>
    <node-view-wrapper
        :data-block-width="node.attrs.blockWidth"
        class="my-4 relative border border-gray-300 rounded overflow-hidden"
    >
        <div contenteditable="false">
            <NMHChooseMediaModal
                :initialSelectedMediaItems="media"
                :show="showChooseModal"
                @close="showChooseModal = false"
                @confirm="mediaItemsSelected"
                :field="{
                    readonly: 'false',
                    multiple: false,
                    attribute: 'foo',
                }"
            />

            <div v-if="mediaItem">
                <input @input="titleUpdated" v-model="title" type="text" />
            </div>
            <div class="bg-gray-100 p-4 text-center" v-else>
                <button
                    class="bg-primary-500 hover:bg-primary-400 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900"
                    @click.prevent="showChooseModal = true"
                >
                    Add file
                </button>
            </div>
            <node-view-content class="hidden" />
        </div>
    </node-view-wrapper>
</template>

<script>
import { nodeViewProps, NodeViewWrapper, NodeViewContent } from "@tiptap/vue-3";

export default {
    components: {
        NodeViewWrapper,
        NodeViewContent,
    },

    props: nodeViewProps,

    data() {
        return {
            mediaItem: null,
            title: "",
            showChooseModal: false,
            processing: false,
        };
    },

    mounted() {
        this.mediaItem = this.node.attrs.media;
        this.title = this.node.attrs.title;
        Nova.$on("open-media-hub-modal", () => {
            this.showChooseModal = true;
        });
    },

    methods: {
        // fetchImage() {
        //     Nova.request()
        //         .get(`/nova-vendor/media-hub/media/${this.node.attrs.media}`)
        //         .then((response) => {
        //             this.mediaItem = response.data;
        //             if (!this.title) {
        //                 this.title = this.mediaItem.file_name;
        //             }
        //         });
        // },

        mediaItemsSelected(mediaItem) {
            this.mediaItem = mediaItem;

            if (!this.title) {
                this.title = this.mediaItem.file_name;
            }
            this.updateAttributes({
                media: mediaItem.id,
                title: mediaItem.file_name,
            });
            this.showChooseModal = false;
        },

        titleUpdated() {
            this.updateAttributes({
                title: this.title,
            });
        },
    },
};
</script>

<style></style>
