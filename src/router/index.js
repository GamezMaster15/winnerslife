import { createRouter, createWebHistory } from 'vue-router'
import store from '../stores'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: () => {
        if(!store.state.loggedIn){
          return import('../views/HomeView.vue')
        } else {
          router.push('/dashboard')
        }
      },
    },
    {
      path: '/login',
      name: 'Login',
      component: () => import('../views/LoginView.vue')
    },
    {
      path: '/menu',
      name: 'Menu',
      component: () => import('../views/MenuView.vue')
    },
    {
      path: '/dashboard',
      name: 'Escritorio',
      component: () => import('../views/DashboardView.vue'),
      meta: { requiresAuth : true }
    },
    {
      path: '/course/:id',
      name: 'cursos',
      component: () => import('../views/CourseView.vue'),
      meta: { requiresAuth : true }
    },
    {
      path: '/calendar',
      name: 'calendar',
      component: () => import('../views/CalendarView.vue'),
      meta: { requiresAuth : true }
    }
  ]
})

router.beforeEach((to, from, next) => {
  if(to.matched.some(route => route.meta.requiresAuth)) {
    if(!store.state.loggedIn) {
      next('/login')
    } else {
      next()
    }
  } else {
    next()
  }
})


export default router
