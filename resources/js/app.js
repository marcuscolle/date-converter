/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import { createApp } from 'vue';

//Imports
import DateConverter from "./components/DateConverter.vue";
import DateToRoman from "./components/DateToRoman.vue";
import RomanToDate from "./components/RomanToDate.vue";

import store from './store';

//External components
import { MaskInput } from 'vue-3-mask';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({}).use(store);

//Global components

//Components registration
app.component('date-converter', DateConverter);
app.component('date-to-roman', DateToRoman);
app.component('roman-to-date', RomanToDate);


//external components
app.component('MaskInput', MaskInput);


//Mounting the app
app.mount('#app');
