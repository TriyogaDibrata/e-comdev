import preset from "./vendor/filament/support/tailwind.config.preset";

export default {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
    ],
    plugins: [require("flowbite/plugin")],
    theme: {
        extend: {
            boxShadow: {
                "round-shadow": "0px 8px 24px",
            },
        },
    },
};
