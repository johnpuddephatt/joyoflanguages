<template>
    <DefaultField
        :field="field"
        :errors="errors"
        :show-help-text="showHelpText"
        :full-width-content="fullWidthContent"
    >
        <template #field>
            <GutenTap
                editorClass="prose max-w-none min-h-40"
                v-model="value"
                mode="json"
                :blockTools="blockTools"
                :extensions="extensions"
                :blockWidthTypes="blockWidthTypes"
                :alignmentTools="alignmentTools"
            />
        </template>
    </DefaultField>
</template>

<script>
import { GutenTap } from "gutentap";
import "gutentap/style.css";

import Image from "../extensions/image";
import Quote from "../extensions/quote";

import { FormField, HandlesValidationErrors } from "laravel-nova";

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ["resourceName", "resourceId", "field"],

    components: {
        GutenTap,
    },

    data() {
        return {
            blockWidthTypes: [
                "horizontalRule",
                "blockquote",
                "youtube",
                "image",
            ],
            extensions: [Image, Quote],

            blockTools: [
                {
                    name: "paragraph",
                    tools: [
                        {
                            title: "Default",
                            name: "default",
                            icon: '<svg class="w-5 h-5 md:w-6 md:h-6" xmlns="http://www.w3.org/2000/svg" width="48" height="48"  viewBox="0 0 48 48"><path fill="currentColor" d="M33.52 13.16a13.63 13.63 0 0 0-.19 2.24v2.45l-.15.14h-.92l-.16-.13a16 16 0 0 0-.17-2.2A1 1 0 0 0 31 15h-4.76v12.39a32.3 32.3 0 0 0 .19 4.54.65.65 0 0 0 .5.55c.15 0 .72.08 1.71.14l.15.15v1l-.15.15c-1-.06-2.47-.09-4.51-.09s-3.59 0-4.51.09l-.13-.14v-1l.14-.15c1-.06 1.57-.11 1.72-.14a.65.65 0 0 0 .5-.55 34 34 0 0 0 .15-4.62V19c0-2.41 0-3.77-.05-4.07h-2.07a14.74 14.74 0 0 0-3.06.16.66.66 0 0 0-.33.22 3.28 3.28 0 0 0-.22.94c-.06.52-.11 1.05-.13 1.6L16 18h-.93l-.16-.14v-2.51a18.58 18.58 0 0 0-.17-2.18l.13-.15c.58.1 2.67.15 6.3.15h5.93q5 0 6.3-.15Z"/></svg>',
                            command: (editor) => {
                                editor
                                    .chain()
                                    .focus()
                                    .setVariant("default")
                                    .run();
                            },
                            isActiveTest: (editor) =>
                                editor.isActive({ variant: "default" }),
                        },
                        {
                            title: "Large",
                            name: "large",
                            icon: '<svg class="w-5 h-5 md:w-6 md:h-6" xmlns="http://www.w3.org/2000/svg" width="48" height="48"  viewBox="0 0 48 48"><path fill="currentColor" d="M41.37 6.12a27.85 27.85 0 0 0-.35 4L41 14.56l-.26.26h-1.69l-.29-.23a31.65 31.65 0 0 0-.29-4 1.83 1.83 0 0 0-1.69-1.24c-.35-.05-2-.08-5-.08h-3.49c0 .62-.05 3.06-.05 7.33v15a59.2 59.2 0 0 0 .34 8.18 1.14 1.14 0 0 0 .89 1 30 30 0 0 0 3.09.27l.26.26v1.77l-.26.26q-2.61-.16-8.12-.16t-8.12.16l-.24-.24v-1.8l.26-.26a29.7 29.7 0 0 0 3.09-.27 1.13 1.13 0 0 0 .89-1 58.62 58.62 0 0 0 .35-8.18v-15q0-6.51-.08-7.33h-3.77a27.11 27.11 0 0 0-5.51.29 1.12 1.12 0 0 0-.58.4 5.32 5.32 0 0 0-.4 1.69c-.12.93-.2 1.89-.24 2.87l-.26.26H8.17l-.29-.26L7.82 10a30.21 30.21 0 0 0-.31-3.93l.24-.26q1.54.25 11.33.26h10.68q9 0 11.34-.26Z"/></svg>',
                            command: (editor) => {
                                editor
                                    .chain()
                                    .focus()
                                    .setVariant("large")
                                    .run();
                            },
                            isActiveTest: (editor) =>
                                editor.isActive({ variant: "large" }),
                        },
                    ],
                },
                {
                    name: "image",
                    title: "Image",
                    hasInlineTools: false,

                    icon: '<svg class="w-5 h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>',
                    insertCommand: ({ editor, range }) => {
                        editor
                            .chain()
                            .focus()
                            .deleteRange(range)
                            .insertContent("<image-block></image-block>")
                            .run();
                    },
                    tools: [
                        {
                            title: "Replace image",
                            name: "replace",
                            icon: '<svg class="w-5 p-0.5 h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" /></svg>',
                            command: (editor) => {
                                Nova.$emit("open-media-hub-modal");
                            },
                            isActiveTest: (editor) =>
                                editor.isActive({ variant: "default" }),
                        },
                    ],
                },
                {
                    name: "quote",
                    title: "Quote",
                    hasInlineTools: false,
                    icon: '<svg class="w-5 h-5 md:w-6 md:h-6" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" focusable="false"><path d="M13 6v6h5.2v4c0 .8-.2 1.4-.5 1.7-.6.6-1.6.6-2.5.5h-.3v1.5h.5c1 0 2.3-.1 3.3-1 .6-.6 1-1.6 1-2.8V6H13zm-9 6h5.2v4c0 .8-.2 1.4-.5 1.7-.6.6-1.6.6-2.5.5h-.3v1.5h.5c1 0 2.3-.1 3.3-1 .6-.6 1-1.6 1-2.8V6H4v6z"></path></svg>',
                    insertCommand: ({ editor, range }) => {
                        editor
                            .chain()
                            .focus()
                            .deleteRange(range)
                            .insertContent("<quote-block></quote-block>")
                            .run();
                    },
                },
            ],
        };
    },

    mounted() {},

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            // this.value = JSON.parse(this.field.value) || [];
            this.value = this.field.value || "";
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(
                this.field.attribute,
                JSON.stringify(this.value) || "[]"
                // this.value || ""
            );
        },
    },
};
</script>
