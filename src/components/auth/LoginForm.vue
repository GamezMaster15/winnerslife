<script setup>
import { ref, reactive } from 'vue'
import { useRouter } from 'vue-router'
import { useStore } from 'vuex'
import { computed } from 'vue'
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';


const router = useRouter()
const store = useStore()

// Estado reactivo para el toggle del formulario
const isLoginView = ref(true)

// Estado reactivo para los formularios usando reactive
const loginForm = reactive({
  correo_user: '',
  password_user: '',
  isSubmitting: false,
  errors: {}
})

const registerForm = reactive({
  nombre_user: '',
  apellido_user: '',
  ci_user: '',
  correo_user: '',
  password_user: '',
  status: 'Activo',
  isSubmitting: false,
  errors: {}
})

// Computed properties
const isAuthenticated = computed(() => store.getters.isAuthenticated)

// Validaciones
const validateLoginForm = () => {
  loginForm.errors = {}
  
  if (!loginForm.correo_user.trim()) {
    loginForm.errors.correo_user = 'El nombre de usuario es requerido'
  }
  if (!loginForm.password_user) {
    loginForm.errors.password_user = 'La contraseña es requerida'
  }
  
  return Object.keys(loginForm.errors).length === 0
}

const validateRegisterForm = () => {
  registerForm.errors = {}
  
  if (!registerForm.nombre_user.trim()) {
    registerForm.errors.nombre_user = 'El primer nombre es requerido'
  }
  if (!registerForm.apellido_user.trim()) {
    registerForm.errors.apellido_user = 'El primer apellido es requerido'
  }
  if (!registerForm.ci_user.trim()) {
    registerForm.errors.ci_user = 'El documento de identidad es requerido'
  }
  if (!registerForm.correo_user.trim()) {
    registerForm.errors.correo_user = 'El correo electrónico es requerido'
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(registerForm.correo_user)) {
    registerForm.errors.correo_user = 'El correo electrónico no es válido'
  }
  if (!registerForm.password_user) {
    registerForm.errors.password_user = 'La contraseña es requerida'
  } else if (registerForm.password_user.length < 8) {
    registerForm.errors.password_user = 'La contraseña debe tener al menos 8 caracteres'
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

    const response = await store.dispatch('login', { correo_user: loginForm.correo_user, password_user: loginForm.password_user })

    if (response.status === 200) {

      router.push({ name: 'dashboard' })

    } else if(response.status === 401) {
      toast.warning('Credenciales Incorrectas', {
        autoClose: 3000,
        position: toast.POSITION.BOTTOM_CENTER
      })
    }

  } catch (error) {

    toast.warning('Ups... Ocurrio un error del sistema', {
      autoClose: 3000
    })

    console.log(error); 

  } finally {

    loginForm.isSubmitting = false

  }

}

const handleRegister = async () => {
  if (!validateRegisterForm()) return
  
  registerForm.isSubmitting = true
  
  try {

    const respuesta = await store.dispatch('register', registerForm)
    
    if(respuesta.status === 201){
      toast.success(respuesta.data.message, { 
        autoClose: 3000,        
        position: toast.POSITION.BOTTOM_CENTER
      });      
    }
    
    isLoginView.value = true
  } catch (error) {
    toast.warning('Error al registrar el Usuario', { 
        autoClose: 3000,        
        position: toast.POSITION.BOTTOM_CENTER
    });
    console.log(error);
    
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
              type="email"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': loginForm.errors.correo_user }"
              placeholder="Correo Electronico"
              v-model="loginForm.correo_user"
            >
            <div class="invalid-feedback" v-if="loginForm.errors.correo_user">
              {{ loginForm.errors.correo_user }}
            </div>
          </div>

          <div class="form-group mt-3">
            <input
              type="password"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': loginForm.errors.password_user }"
              placeholder="Contraseña"
              v-model="loginForm.password_user"
            >
            <div class="invalid-feedback" v-if="loginForm.errors.password_user">
              {{ loginForm.errors.password_user }}
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
              :class="{ 'is-invalid': registerForm.errors.nombre_user }"
              placeholder="Primer Nombre"
              v-model="registerForm.nombre_user"
            >
            <div class="invalid-feedback" v-if="registerForm.errors.nombre_user">
              {{ registerForm.errors.nombre_user }}
            </div>
          </div>

          <div class="col-6 text-start mt-3">
            <input
              type="text"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': registerForm.errors.apellido_user }"
              placeholder="Primer Apellido"
              v-model="registerForm.apellido_user"
            >
            <div class="invalid-feedback" v-if="registerForm.errors.apellido_user">
              {{ registerForm.errors.apellido_user }}
            </div>
          </div>

          <div class="col-12 text-start mt-3">
            <input
                type="text"
                class="bg-input-primary-wl w-100"
                :class="{ 'is-invalid': registerForm.errors.ci_user }"
                placeholder="Documento de Identidad"
                v-model="registerForm.ci_user"
            >
            <div class="invalid-feedback" v-if="registerForm.errors.ci_user">
                {{ registerForm.errors.ci_user }}
            </div>
          </div>

          <div class="col-12 text-start mt-3">
            <input
              type="text"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': registerForm.errors.correo_user }"
              placeholder="Correo Electrónico"
              v-model="registerForm.correo_user"
            >
            <div class="invalid-feedback" v-if="registerForm.errors.correo_user">
              {{ registerForm.errors.correo_user }}
            </div>
          </div>

          <div class="col-12 text-start mt-3">
            <input
              type="password"
              class="bg-input-primary-wl w-100"
              :class="{ 'is-invalid': registerForm.errors.password_user }"
              placeholder="Contraseña"
              v-model="registerForm.password_user"
            >
            <div class="invalid-feedback" v-if="registerForm.errors.password_user">
              {{ registerForm.errors.password_user }}
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
