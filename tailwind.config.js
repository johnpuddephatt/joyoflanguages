const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "tailwind.safelist.txt",
    ],

    plugins: [
        require("tailwind-scrollbar-hide"),
        require("@tailwindcss/typography"),
    ],
    theme: {
        container: {
            center: false,
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                lg: "4rem",
                xl: "5rem",
                "2xl": "6rem",
            },
        },
        colors: {
            white: "#ffffff",
            black: "#181919",
            gray: "#414141",
            transparent: "#ffffff00",
            current: "currentColor",
            yellow: "#ffd800",
            orange: "#f6b16b",
            pink: "#f3b5ba",
            blue: "#629ce4",
            teal: "#1e8080",
            "light-teal": "#4badb8",
            beige: "#f1e2d9",
        },
        fontFamily: {
            sans: ['"Brandon Text"', ...defaultTheme.fontFamily.sans],
            logo: ["Labours", ...defaultTheme.fontFamily.sans],
        },
        extend: {
            maxWidth: {
                "8xl": "100rem",
            },
            typography: {
                DEFAULT: {
                    css: {
                        color: "#181919",
                        lineHeight: "1.3",
                    },
                },
                lg: {
                    css: {
                        lineHeight: "1.3",
                    },
                },
            },
        },
    },
};
