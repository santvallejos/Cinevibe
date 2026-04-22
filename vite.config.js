import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// tailwindcss() removido — proyecto usa CSS puro (sin Tailwind)
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
