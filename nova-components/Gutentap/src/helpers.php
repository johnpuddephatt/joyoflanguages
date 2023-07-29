<?php

if (!function_exists("tiptap_html")) {
    function tiptap_html($json)
    {
        return (new \Tiptap\Editor())
            ->setContent([
                "type" => "doc",
                "content" => $json,
            ])
            ->getHTML();
    }
}
