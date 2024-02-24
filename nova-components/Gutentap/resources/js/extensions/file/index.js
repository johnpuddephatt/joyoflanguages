import { mergeAttributes, Node } from "@tiptap/core";
import { VueNodeViewRenderer } from "@tiptap/vue-3";

import File from "./File.vue";

export default Node.create({
    name: "file",

    group: "block",

    // atom: false,

    content: "inline*",

    addAttributes() {
        return {
            media: {
                default: null,
            },
            title: {
                default: null,
            },
        };
    },

    parseHTML() {
        return [
            {
                tag: "file-block",
            },
        ];
    },

    renderHTML({ HTMLAttributes }) {
        return ["file-block", mergeAttributes(HTMLAttributes)];
    },

    addNodeView() {
        return VueNodeViewRenderer(File);
    },
});
