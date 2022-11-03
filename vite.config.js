import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import Components from 'unplugin-vue-components/vite'
import { NaiveUiResolver } from 'unplugin-vue-components/resolvers'

const ASSET_URL = process.env.ASSET_URL || '';
export default defineConfig({
    base: ASSET_URL,
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: ASSET_URL,
                    includeAbsolute: false,
                },
            },
        }),
        Components({
            resolvers: [NaiveUiResolver()]
        })
    ],
    resolve: {
        alias: {
            '@assets': '/resources/assets',
        },
    },
    server: {
        ASSET_URL,
        hmr: { ASSET_URL }
    },
});
