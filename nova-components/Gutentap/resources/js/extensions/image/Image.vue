<template>
    <node-view-wrapper
        :data-block-width="node.attrs.blockWidth"
        class="my-4 relative border border-gray-300 rounded overflow-hidden"
    >
        <div contenteditable="false">
            <div v-if="mediaItem">
                <div v-if="processing">PROCESSING...</div>
                <img
                    class="!my-0 w-full block pointer-events-none"
                    :key="mediaItem.id"
                    :src="
                        node.attrs.conversion &&
                        typeof mediaItem.conversions === 'object' &&
                        Object.keys(mediaItem.conversions).length
                            ? mediaItem.url.replace(mediaItem.file_name, '') +
                              'conversions/' +
                              mediaItem.conversions[node.attrs.conversion]
                            : mediaItem.url
                    "
                />
                <div
                    v-if="
                        mediaItem.conversions.length ||
                        Object.keys(mediaItem.conversions).length
                    "
                    class="absolute top-2 right-2"
                >
                    <select
                        :value="node.attrs.conversion"
                        @change="conversionChanged"
                        class="flex w-full bg-white form-control form-select form-select-bordered"
                    >
                        <option default value="">Default</option>
                        <option
                            v-for="conversion in Object.keys(
                                mediaItem.conversions,
                            ).filter(
                                (conversion_name, conversion_path) =>
                                    !conversion_name.includes('__'),
                            )"
                            :value="conversion"
                        >
                            {{ conversion }}
                        </option></select
                    ><svg
                        class="flex-shrink-0 pointer-events-none form-select-arrow"
                        xmlns="http://www.w3.org/2000/svg"
                        width="10"
                        height="6"
                        viewBox="0 0 10 6"
                    >
                        <path
                            class="fill-current"
                            d="M8.292893.292893c.390525-.390524 1.023689-.390524 1.414214 0 .390524.390525.390524 1.023689 0 1.414214l-4 4c-.390525.390524-1.023689.390524-1.414214 0l-4-4c-.390524-.390525-.390524-1.023689 0-1.414214.390525-.390524 1.023689-.390524 1.414214 0L5 3.585786 8.292893.292893z"
                        ></path>
                    </svg>
                </div>
            </div>
            <div class="bg-gray-100 p-4 text-center" v-else>
                <button
                    class="bg-primary-500 hover:bg-primary-400 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900"
                    @click.prevent="openMediaModal"
                >
                    Add media
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
            showChooseModal: false,
            processing: false,
        };
    },

    mounted() {
        this.editor_id = this.editor.options.element.parentNode.id;

        if (this.node.attrs.media) {
            this.fetchImage();
        }

        Nova.$on(
            "media-hub-selected-" + this.editor_id + "_" + this.getPos(),
            (mediaItem) => {
                console.log("event heard...");
                this.mediaItem = mediaItem;

                this.updateAttributes({
                    media: mediaItem.id,
                });
            },
        );
    },

    methods: {
        openMediaModal() {
            console.log("media-hub-open", this.editor_id, this.getPos());
            Nova.$emit("media-hub-open", this.editor_id, this.getPos());
        },

        fetchImage() {
            Nova.request()
                .get(`/nova-vendor/media-hub/media/${this.node.attrs.media}`)
                .then((response) => {
                    this.mediaItem = response.data;
                    if (
                        !this.mediaItem.conversions.length &&
                        !Object.keys(this.mediaItem.conversions).length
                    ) {
                        this.processing = true;
                        setTimeout(() => {
                            this.fetchImage();
                        }, 1000);
                    } else {
                        this.processing = false;
                    }
                });
        },
        conversionChanged(event) {
            this.updateAttributes({
                conversion: event.target.value,
            });
        },
        // mediaItemsSelected(mediaItem) {
        //     this.mediaItem = mediaItem;
        //     this.updateAttributes({
        //         media: mediaItem.id,
        //     });
        //     this.showChooseModal = false;
        //     this.fetchImage();
        // },
    },
};
</script>

<style></style>
