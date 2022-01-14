import Vue from 'vue'
import VueRouter from 'vue-router'
import List from '@/components/List.vue'
import View from '@/components/View.vue'
import Modify from '@/components/Modify.vue'
import Create from '@/components/Create.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/home',
    component: List
  },
  {
    path: '',
    redirect: '/home'
  },
  {
    path: '/view/:id',
    component: View
  },
  {
    path: '/modify/:id',
    component: Modify
  },
  {
    path: '/create',
    component: Create
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
