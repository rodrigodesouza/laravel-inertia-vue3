import 'bootstrap/dist/css/bootstrap.min.css';

import 'bootstrap';


// import bootstrap from 'bootstrap'

// import { Toast } from '../../node_modules/bootstrap/js/dist/bootstrap.esm.min.js'

//   Array.from(document.querySelectorAll('.toast'))
//     .forEach(toastNode => new Toast(toastNode))

import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { InertiaProgress } from '@inertiajs/progress';

InertiaProgress.init()

createInertiaApp({
// esta linha deve estar de acordo com a documentação no laravel.com
//     resolve: name => require(`./Pages/${name}`),
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
    app.config.globalProperties.$route = route
    app.use(plugin)
        .mount(el)
  },
});
