import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173, // keep vite's port separate from Laravel's
        hmr: {
            host: 'legendary-garbanzo-q7x7xg6g6j6g7-8000.app.github.dev',
            protocol: 'wss'
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
