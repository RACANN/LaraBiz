
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/TimeClock.vue'));

const app = new Vue({
    el: '#app',
    data: {
        employees: [],
        isActive : false
      },
      mounted(){
        // axios.get('/employees').then(response => this.employees = response.data)
        this.getEmployeesAsync();
        console.log(this.employees);
        //console.log(this.employees)
      },
      methods:{
        close(){
            document.getElementById("createEmployeeForm").classList.remove("is-active");
        },
        openAdd(){
            document.getElementById("createEmployeeForm").classList.add("is-active");
        },
        saveEmployee(){
           
        },

        getEmployeesAsync(){
            axios.get('/employees-async').then(response => this.employees = response.data);
        }
        
    }

});

     $(document).ready( function () {
    $('#employeeIndexTable').DataTable();
});
