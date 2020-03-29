import Vue from 'vue'
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.css'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import LoginForm from '@/pages/LoginPage/LoginForm'

Vue.use(Router)
Vue.use(VueMaterial)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'LoginForm',
      component: LoginForm
    }
  ]
})
