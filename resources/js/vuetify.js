import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)

import { library } from '@fortawesome/fontawesome-svg-core'
import { faTrash, faPencilAlt } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faTrash, faPencilAlt)


Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false;


export default new Vuetify({
    theme: {
        themes: {
            light: {
                primary: '#3f51b5',
                secondary: '#696969',
                accent: '#8c9eff',
                error: '#b71c1c',
            },
        },
    },
})