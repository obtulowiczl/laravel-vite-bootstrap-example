import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/js/customscript.js'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')
        }
    },
    // make 'vite run dev' works properly with Docker, route custom domain to 0.0.0.0 in /etc/hosts 
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost'
        },
    },
});
