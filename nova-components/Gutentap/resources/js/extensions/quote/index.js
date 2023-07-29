import { mergeAttributes, Node } from "@tiptap/core";
import { VueNodeViewRenderer } from "@tiptap/vue-3";

import Quote from "./Quote.vue";

export default Node.create({
    name: "quote",

    group: "block",

    // atom: false,

    content: "inline*",

    addAttributes() {
        return {
            media: {
                default: null,
            },
            conversion: {
                default: "square",
            },
            blockWidth: {
                default: "normal",
            },
            name: {
                default: "Katie",
            },
            quote: {
                default:
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.",
            },
        };
    },

    parseHTML() {
        return [
            {
                tag: "quote-block",
            },
        ];
    },

    renderHTML({ HTMLAttributes }) {
        return ["quote-block", mergeAttributes(HTMLAttributes)];
    },

    addNodeView() {
        return VueNodeViewRenderer(Quote);
    },
});
