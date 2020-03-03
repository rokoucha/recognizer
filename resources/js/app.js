require('./bootstrap')

window.addEventListener('load', () => {
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker
      .register('/serviceworker.js')
      .then(() => {
        console.log('Registration succeeded.')
      })
      .catch(error => {
        console.log('Registration failed.', error)
      })
  }
})

window.Vue = require('vue')

Vue.component('Checklist', require('./components/Checklist.vue').default)
Vue.component(
  'ChecklistEditor',
  require('./components/ChecklistEditor.vue').default,
)
Vue.component('Checks', require('./components/Checks.vue').default)
Vue.component('ChecksEditor', require('./components/ChecksEditor.vue').default)

new Vue({
  el: '#app',
})
