<?php
return [
    "title" => "We use cookies",
    "intro" =>
        "This website uses cookies in order to enhance the overall user experience.",
    "link" =>
        'Take a look at our <a href=":url">Cookies Policy</a> for more information.',

    "essentials" => "Only essentials",
    "all" => "Accept all",
    "customize" => "Customize",
    "manage" => "Manage cookies",
    "details" => [
        "more" => "More details",
        "less" => "Less details",
    ],
    "save" => "Save settings",

    "categories" => [
        "essentials" => [
            "title" => "Essential cookies",
            "description" =>
                "Cookies we have to include for certain web pages to function. For this reason, they do not require your consent.",
        ],
        "analytics" => [
            "title" => "Analytics cookies",
            "description" =>
                "Used for internal research on how we can improve our service. These cookies assess how you interact with our website.",
        ],
        // "optional" => [
        //     "title" => "Optional cookies",
        //     "description" =>
        //         "These cookies enable features that could improve your user experience, but their absence will not impact your ability to browse our website.",
        // ],
        "commenting" => [
            "title" => "Commenting cookies",
            "description" =>
                "These cookies are used to enable commenting functionality on our website. This setting authorizes our commenting system provider (Disqus) to deploy their own cookies.",
        ],
    ],

    "defaults" => [
        "consent" => 'Used to store the user\'s cookie consent preferences.',
        "session" => 'Used to identify the user\'s browsing session.',
        "csrf" =>
            "Used to secure both the user and our website against cross-site request forgery attacks.",
        "_ga" =>
            "Main cookie used by Google Analytics, enables a service to distinguish one visitor from another.",
        "_ga_ID" => "Used by Google Analytics to persist session state.",
        "_gid" => "Used by Google Analytics to identify the user.",
        "_gat" => "Used by Google Analytics to throttle the request rate.",
    ],
];
