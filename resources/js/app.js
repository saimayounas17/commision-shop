/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('category-view', require('./components/product.vue').default);
Vue.component('purchase-view', require('./components/purchase.vue').default);
Vue.component('sale-view', require('./components/sale.vue').default);
Vue.component('expense-view', require('./components/expense.vue').default);
Vue.component('customer-view', require('./components/customer.vue').default);
Vue.component('customerdetails-view', require('./components/customerdetails.vue').default);
Vue.component('transaction-view', require('./components/daily_transaction.vue').default);
Vue.component('product-transaction-view', require('./components/product_transaction.vue').default);
Vue.component('product-details-view', require('./components/product_details.vue').default);
Vue.component('customer-report-view', require('./components/customer_daily_report.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//sweeet alert start
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast = Toast;
//end
const app = new Vue({
    el: '#app',
});
