<template>
    <node-view-wrapper
        :data-block-width="node.attrs.blockWidth"
        class="my-4 p-4 relative flex flex-row items-center border border-gray-300 rounded overflow-hidden"
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

            <div v-if="mediaItem" class="mr-6">
                <img
                    class="!my-0 w-[6rem] rounded-full block pointer-events-none"
                    :key="mediaItem.id"
                    :src="
                        typeof mediaItem.conversions === 'object' &&
                        Object.keys(mediaItem.conversions).length
                            ? mediaItem.url.replace(mediaItem.file_name, '') +
                              'conversions/' +
                              mediaItem.conversions[node.attrs.media]
                            : mediaItem.url
                    "
                />
                <button @click.prevent="removeImage">Remove image</button>
            </div>
            <button
                v-else
                class="mr-6 bg-primary-500 hover:bg-primary-400 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900"
                @click.prevent="showChooseModal = true"
            >
                Add image
            </button>
            <node-view-content class="hidden" />
        </div>
        <div contenteditable="false">
            <div
                class="text-xl font-bold block mb-4"
                contenteditable="true"
                @input="quoteChanged"
            >
                {{ node.attrs.quote }}
            </div>

            <div
                class="block font-bold"
                @input="nameChanged"
                contenteditable="true"
            >
                {{ node.attrs.name }}
            </div>
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
            showChooseModal: false,
        };
    },

    mounted() {
        if (this.node.attrs.media) {
            Nova.request()
                .get(`/nova-vendor/media-hub/media/${this.node.attrs.media}`)
                .then((response) => {
                    this.mediaItem = response.data;
                });
        }
        Nova.$on("open-media-hub-modal", () => {
            this.showChooseModal = true;
        });
    },

    methods: {
        removeImage() {
            this.mediaItem = null;
            this.updateAttributes({
                media: null,
            });
        },
        quoteChanged(event) {
            this.updateAttributes({
                quote: event.target.innerText,
            });
        },
        nameChanged(event) {
            this.updateAttributes({
                name: event.target.innerText,
            });
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
        mediaItemsSelected(mediaItem) {
            this.mediaItem = mediaItem;
            this.updateAttributes({
                media: mediaItem.id,
            });
            this.fetchImage();
            this.showChooseModal = false;
        },
    },
};
</script>

<style></style>
