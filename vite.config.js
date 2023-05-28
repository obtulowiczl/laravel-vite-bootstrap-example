import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
            // below you can add your custom styles and scripts to compile with Vite
                'resources/js/page-scripts/customscript.js',
                'resources/css/customstyle.css'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')
        }
    },
    // make 'vite run dev' works properly with Docker, route domain local.test to 0.0.0.0 in /etc/hosts 
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'local.test'
        },
        watch: {
		    // https://vitejs.dev/config/server-options.html#server-watch
            usePolling: false
        }
    },
});
