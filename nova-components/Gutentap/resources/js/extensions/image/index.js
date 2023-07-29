import { mergeAttributes, Node } from "@tiptap/core";
import { VueNodeViewRenderer } from "@tiptap/vue-3";

import Image from "./Image.vue";

export default Node.create({
    name: "image",

    group: "block",

    // atom: false,

    content: "inline*",

    addAttributes() {
        return {
            media: {
                default: null,
            },
            conversion: {
                default: null,
            },
            blockWidth: {
                default: "normal",
            },
        };
    },

    parseHTML() {
        return [
            {
                tag: "image-block",
            },
        ];
    },

    renderHTML({ HTMLAttributes }) {
        return ["image-block", mergeAttributes(HTMLAttributes)];
    },

    addNodeView() {
        return VueNodeViewRenderer(Image);
    },
});
