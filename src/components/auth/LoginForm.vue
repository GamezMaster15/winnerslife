<script setup>
import { ref, reactive } from 'vue'
import { useRouter } from 'vue-router'
import { useStore } from 'vuex'
import { computed } from 'vue'

const router = useRouter()
const store = useStore()

// Estado reactivo para el toggle del formulario
const isLoginView = ref(true)

// Estado reactivo para los formularios usando reactive
const loginForm = reactive({
  username: '',
  password: '',
  isSubmitting: false,
  errors: {}
})

const registerForm = reactive({
  primerNombre: '',
  segundoNombre: '',
  primerApellido: '',
  segundoApellido: '',
  ci: '',
  email: '',
  password: '',
  isSubmitting: false,
  errors: {}
})

// Computed properties
const isAuthenticated = computed(() => store.getters.isAuthenticated)

// Validaciones
const validateLoginForm = () => {
  loginForm.errors = {}
  
  if (!loginForm.username.trim()) {
    loginForm.errors.username = 'El nombre de usuario es requerido'
  }
  if (!loginForm.password) {
    loginForm.errors.password = 'La contraseña es requerida'
  }
  
  return Object.keys(loginForm.errors).length === 0
}

const validateRegisterForm = () => {
  registerForm.errors = {}
  
  if (!registerForm.primerNombre.trim()) {
    registerForm.errors.primerNombre = 'El primer nombre es requerido'
  }
  if (!registerForm.primerApellido.trim()) {
    registerForm.errors.primerApellido = 'El primer apellido es requerido'
  }
  if (!registerForm.ci.trim()) {
    registerForm.errors.ci = 'El documento de identidad es requerido'
  }
  if (!registerForm.email.trim()) {
    registerForm.errors.email = 'El correo electrónico es requerido'
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(registerForm.email)) {
    registerForm.errors.email = 'El correo electrónico no es válido'
  }
  if (!registerForm.password) {
    registerForm.errors.password = 'La contraseña es requerida'
  } else if (registerForm.password.length < 6) {
    registerForm.errors.password = 'La contraseña debe tener al menos 6 caracteres'
  }
  
  return Object.keys(registerForm.errors).length === 0
}

// Métodos
const toggleView = () => {
  isLoginView.value = !isLoginView.value
  // Limpiar formularios al cambiar de vista
  loginForm.errors = {}
  registerForm.errors = {}
}

const handleLogin = async () => {
  if (!validateLoginForm()) return
  
  loginForm.isSubmitting = true
  
  try {
    if (loginForm.username === 'carlitos' && loginForm.password === '234') {
      await store.dispatch('login', {
        username: loginForm.username,
        password: loginForm.password
      })
      router.push({ name: 'dashboard' })
    } else {
      loginForm.errors.auth = 'Credenciales inválidas'
    }
  } catch (error) {
    loginForm.errors.auth = 'Credenciales inválidas'
  } finally {
    loginForm.isSubmitting = false
  }
}

const handleRegister = async () => {
  if (!validateRegisterForm()) return
  
  registerForm.isSubmitting = true
  
  try {
    // Aquí iría la lógica de registro
    // await store.dispatch('register', registerForm)
    isLoginView.value = true
  } catch (error) {
    registerForm.errors.submit = 'Error al registrar usuario'
  } finally {
    registerForm.isSubmitting = false
  }
}
</script>

<template>
  <section class="container-fluid p-0 bg-login bg-img">
    <div class="row h-100">
      <!-- Formulario de Login -->
      <div 
        v-if="isLoginView"
        class="col-md-4 col-10 my-auto bg-dark-login mx-auto p-4 text-center shadow py-5"
      >
        <h2 class="mb-0">Inicia Sesión</h2>
        <p class="mb-0">
          ¿Aún no tienes una cuenta? 
          <a class="a" @click.prevent="toggleView">Dale click aquí</a>
        </p>
        
        <form @submit.prevent="handleLogin" class="mt-4">
          <div class="form-group">
            <input
              type="text"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': loginForm.errors.username }"
              placeholder="Nombre de usuario"
              v-model="loginForm.username"
            >
            <div class="invalid-feedback" v-if="loginForm.errors.username">
              {{ loginForm.errors.username }}
            </div>
          </div>

          <div class="form-group mt-3">
            <input
              type="password"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': loginForm.errors.password }"
              placeholder="Contraseña"
              v-model="loginForm.password"
            >
            <div class="invalid-feedback" v-if="loginForm.errors.password">
              {{ loginForm.errors.password }}
            </div>
          </div>

          <div class="alert alert-danger mt-3" v-if="loginForm.errors.auth">
            {{ loginForm.errors.auth }}
          </div>

          <button 
            type="submit" 
            class="btn form-control btn-login py-3 mt-4"
            :disabled="loginForm.isSubmitting"
          >
            {{ loginForm.isSubmitting ? 'Iniciando sesión...' : 'Iniciar sesión' }}
          </button>
        </form>
      </div>

      <!-- Formulario de Registro -->
      <div 
        v-else
        class="col-md-4 col-10 my-auto bg-dark-login mx-auto p-4 text-center shadow py-5"
      >
        <h2 class="mb-0">Crear cuenta</h2>
        <p class="mb-0">
          ¿Ya tienes una cuenta? 
          <a class="a" @click.prevent="toggleView">Dale click aquí</a>
        </p>

        <form @submit.prevent="handleRegister" class="row mx-auto mt-3">

          <div class="col-6 text-start mt-3">
            <input
              type="text"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': registerForm.errors.primerNombre }"
              placeholder="Primer Nombre"
              v-model="registerForm.primerNombre"
            >
            <div class="invalid-feedback" v-if="registerForm.errors.primerNombre">
              {{ registerForm.errors.primerNombre }}
            </div>
          </div>

          <div class="col-6 text-start mt-3">
            <input
              type="text"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': registerForm.errors.primerNombre }"
              placeholder="Segundo Nombre"
              v-model="registerForm.segundoNombre"
            >
            <div class="invalid-feedback" v-if="registerForm.errors.primerNombre">
              {{ registerForm.errors.segundoNombre }}
            </div>
          </div>

          <div class="col-6 text-start mt-3">
            <input
              type="text"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': registerForm.errors.primerNombre }"
              placeholder="Primer Apellido"
              v-model="registerForm.primerApellido"
            >
            <div class="invalid-feedback" v-if="registerForm.errors.primerNombre">
              {{ registerForm.errors.primerApellido }}
            </div>
          </div>

          <div class="col-6 text-start mt-3">
            <input
              type="text"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': registerForm.errors.primerNombre }"
              placeholder="Segundo Apellido"
              v-model="registerForm.segundoApellido"
            >
            <div class="invalid-feedback" v-if="registerForm.errors.primerNombre">
              {{ registerForm.errors.segundoApellido }}
            </div>
          </div>

            <div class="col-12 text-start mt-3">
            <input
                type="text"
                class="bg-input-primary-wl w-100"
                :class="{ 'is-invalid': registerForm.errors.primerNombre }"
                placeholder="Documento de Identidad"
                v-model="registerForm.ci"
            >
            <div class="invalid-feedback" v-if="registerForm.errors.primerNombre">
                {{ registerForm.errors.ci }}
            </div>
            </div>

          <div class="col-12 text-start mt-3">
            <input
              type="text"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': registerForm.errors.primerNombre }"
              placeholder="Correo Electrónico"
              v-model="registerForm.email"
            >
            <div class="invalid-feedback" v-if="registerForm.errors.primerNombre">
              {{ registerForm.errors.email }}
            </div>
          </div>

          <div class="col-12 text-start mt-3">
            <input
              type="password"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': registerForm.errors.primerNombre }"
              placeholder="Contraseña"
              v-model="registerForm.password"
            >
            <div class="invalid-feedback" v-if="registerForm.errors.primerNombre">
              {{ registerForm.errors.password }}
            </div>
          </div>

          

          <!-- Repite el patrón para los demás campos del formulario de registro -->
          
          <div class="col-12">
            <button 
              type="submit" 
              class="btn btn-login py-3 mt-4 w-100"
              :disabled="registerForm.isSubmitting"
            >
              {{ registerForm.isSubmitting ? 'Registrando...' : 'Registrarse' }}
            </button>
          </div>

          <div class="alert alert-danger mt-3" v-if="registerForm.errors.submit">
            {{ registerForm.errors.submit }}
          </div>
        </form>
      </div>
    </div>
  </section>
</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
