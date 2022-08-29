require('./bootstrap');

import { createApp } from 'vue'
import Products from './components/Products'

const app = createApp({})

app.component('products', Products)

app.mount('#app')