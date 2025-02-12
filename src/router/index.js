import { createRouter, createWebHistory } from 'vue-router'
import store from '../stores'

// Rutas públicas y privadas separadas para mejor organización
const publicRoutes = [
  {
    path: '/',
    name: 'home',
    component: () => import('../views/HomeView.vue'),
    meta: { 
      requiresGuest: true,
      title: 'Inicio'
    }
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('../views/LoginView.vue'),
    meta: { 
      requiresGuest: true,
      title: 'Iniciar Sesión'
    }
  },
  {
    path: '/menu',
    name: 'menu',
    component: () => import('../views/MenuView.vue'),
    meta: { 
      title: 'Menú'
    }
  }
]

const privateRoutes = [
  {
    path: '/dashboard',
    name: 'dashboard',
    component: () => import('../views/DashboardView.vue'),
    meta: { 
      requiresAuth: true,
      title: 'Escritorio'
    }
  },
  {
    path: '/addCourse',
    name: 'AddCourse',
    component: () => import('../views/AddCourseView.vue'),
    meta: { 
      requiresAuth: true,
      title: 'Agregar Curso'
    }
  },
  {
    path: '/course/:id',
    name: 'course',
    component: () => import('../views/CourseView.vue'),
    meta: { 
      requiresAuth: true,
      title: 'Curso'
    },
    beforeEnter: (to, from, next) => {
      const id = parseInt(to.params.id)
      if (isNaN(id)) {
        next({ name: 'not-found' })
      } else {
        next()
      }
    }
  },
  {
    path: '/calendar',
    name: 'calendar',
    component: () => import('../views/CalendarView.vue'),
    meta: { 
      requiresAuth: true,
      title: 'Calendario'
    }
  }
]

// Rutas de sistema
const systemRoutes = [
  {
    path: '/logout',
    name: 'logout',
    async beforeEnter(to, from, next) {
      try {
        await store.dispatch('logout')
        next({ name: 'login' })
      } catch (error) {
        console.error('Error durante el logout:', error)
        next({ name: from.name || 'home' })
      }
    }
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'not-found',
    component: () => import('../views/HomeView.vue'),
    meta: { 
      title: 'Página no encontrada'
    }
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [...publicRoutes, ...privateRoutes, ...systemRoutes],
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    }
    return { top: 0 }
  }
})

// Guardias de navegación
router.beforeEach(async (to, from, next) => {
  const requiresAuth = to.matched.some(record => record.meta.requiresAuth)
  const requiresGuest = to.matched.some(record => record.meta.requiresGuest)
  const isAuthenticated = store.getters.isAuthenticated

  try {
    document.title = to.meta.title 
      ? `${to.meta.title} - Winners Life` 
      : 'Winners Life'

    if (requiresAuth && !isAuthenticated) {
      return next({
        name: 'login',
        query: { redirect: to.fullPath }
      })
    }

    if (requiresGuest && isAuthenticated) {
      return next({ name: 'dashboard' })
    }

    next()
  } catch (error) {
    console.error('Error en navegación:', error)
    next({ name: 'home' })
  }
})

// Manejador de errores de navegación
router.onError((error) => {
  console.error('Error de navegación:', error)
  router.push({ name: 'home' })
})

export default router
