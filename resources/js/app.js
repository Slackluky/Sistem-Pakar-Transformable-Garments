import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '/vendor/tightenco/ziggy/dist/vue.es.js';
import { Ziggy } from './ziggy.js';
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Luky Setiawan';

function createElement(tag, attributes = {}) {
    const element = document.createElement(tag);
    for (let attribute in attributes) {
        element.setAttribute(attribute, attributes[attribute]);
    }

    return element;
}

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        document.head.appendChild(
            createElement("meta", { name: "naive-ui-style" })
        );
        return createApp({ render: () => h(app, props) })
            .use(plugin, ZiggyVue, Ziggy)
            .mixin({ methods: { route: window.route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
