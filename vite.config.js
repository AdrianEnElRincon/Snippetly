import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/app.css',
                'resources/css/home.css',
                'resources/css/editor.css',
                'resources/css/jump-to-top.css',
                'resources/js/jump-to-top.js',
                'resources/js/snippets-preview.js',
                'resources/js/highlightAll.js',
                'resources/js/loader.js',
                'resources/js/snippets/show.js',
                'resources/js/snippets/editor.js',
                'resources/css/admin.css',
                'resources/js/tooltips.js'
            ],
            refresh: true,
        }),
    ],
    build: {
        assetsInlineLimit: 0
    }
});
