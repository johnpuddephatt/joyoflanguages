<template>
    <node-view-wrapper
        :data-block-width="node.attrs.blockWidth"
        class="my-4 relative border border-gray-300 rounded overflow-hidden"
    >
        <div contenteditable="false">
            <div :key="mediaItem.id" v-if="mediaItem">
                <div
                    class="bg-light-teal px-6 group !mb-4 flex flex-row rounded-full bg-opacity-20 !no-underline transition hover:bg-opacity-80"
                >
                    <input
                        class="focus:outline-none type-xs my-0 py-3 pl-8"
                        @input="titleUpdated"
                        v-model="title"
                        type="text"
                    />

                    <p
                        class="my-1 ml-auto flex gap-2 rounded-full border-[3px] bg-white py-1.5 px-6 font-bold text-black md:py-2 md:pl-6"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-6 w-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"
                            />
                        </svg>
                        Download
                    </p>
                </div>
            </div>
            <div class="bg-gray-100 p-4 text-center" v-else>
                <button
                    class="bg-primary-500 hover:bg-primary-400 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900"
                    @click.prevent="openMediaModal"
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

    props: {
        editor: {
            type: Object,
        },
        getPos: {
            type: Function,
        },
    },

    data() {
        return {
            editor_id: null,
            mediaItem: null,
            title: "",
            processing: false,
        };
    },

    mounted() {
        this.editor_id = this.editor.options.element.parentNode.id;
        this.mediaItem = this.node.attrs.media;
        this.title = this.node.attrs.title;

        Nova.$on(
            "media-hub-selected-" + this.editor_id + "_" + this.getPos(),
            (mediaItem) => {
                console.log("event heard...");
                this.mediaItem = mediaItem;

                if (!this.title) {
                    this.title = this.mediaItem.file_name;
                }
                this.updateAttributes({
                    media: mediaItem.id,
                    title: mediaItem.file_name,
                });
            },
        );
    },

    methods: {
        openMediaModal() {
            console.log("media-hub-open", this.editor_id, this.getPos());

            Nova.$emit("media-hub-open", this.editor_id, this.getPos());
        },
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

        // mediaItemsSelected(mediaItem) {
        //     this.mediaItem = mediaItem;

        //     if (!this.title) {
        //         this.title = this.mediaItem.file_name;
        //     }
        //     this.updateAttributes({
        //         media: mediaItem.id,
        //         title: mediaItem.file_name,
        //     });
        //     this.showChooseModal = false;
        // },

        titleUpdated() {
            this.updateAttributes({
                title: this.title,
            });
        },
    },
};
</script>

<style></style>
