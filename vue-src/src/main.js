// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'

import axios from 'axios'
import swal from 'sweetalert'

Vue.config.productionTip = false

//axios.defaults.baseURL = 'http://localhost:8000'
axios.interceptors.response.use(function (response) {
  return response;
}, function (error) {
  let response = error.response;
  if(response.status == 422){
    swal(response.status.toString(), 'Fill all the required field.', 'error');
  } else {
    swal(response.status.toString(), response.data.error, 'error');
  }
  return Promise.reject(error);
});

Vue.prototype.$http = axios

/* eslint-disable no-new */
new Vue({
  el: '#app',
  template: '<App/>',
  components: { App }
})
