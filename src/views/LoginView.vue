<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import store from '../stores/index';

const router = useRouter();

const login = ref(true)
const input = ref({
  username: '',
  password: ''
})

const handleClikLogin = () => {
  login.value = !login.value;
}

const loginAuth = () => {
  // Aquí puedes ajustar las credenciales según tu lógica
  if (input.value.username === 'carlitos' && input.value.password === '234') {
    store.dispatch('mockLogin'); // Despacha la acción de inicio de sesión
    router.push('/dashboard');
  } else {
    alert('No existe');
  }
};

</script>
<template>
  <div class="space"></div>
  <section class="container-fluid p-0 bg-login mb-5">
    <div class="row h-100">
      <div class="col-md-4 col-10 my-auto bg-dark-login mx-auto my-auto p-4 text-center shadow py-5" v-if="login">
        <h2 class="mb-0">Inicia Sesion</h2>
        <p class="mb-0">¿Aun no tienes una cuenta? <a class="a" @click="handleClikLogin">Dale click aqui</a> </p>
        <input type="text" class="bg-input-primary-wl w-100 mt-4" placeholder="Nombre de usuario" v-model="input.username">
        <input type="password" class="bg-input-primary-wl w-100 mt-3" placeholder="Contraseña" v-model="input.password">
        <button class="btn form-control btn-login py-3 mt-4" @click="loginAuth">Iniciar sesion</button>
      </div>
      <div class="col-md-4 col-10 my-auto bg-dark-login mx-auto my-auto p-4 text-center shadow py-5" v-if="login == false">
        <h2 class="mb-0">Crear cuenta</h2>
        <p class="mb-0">¿Ya tienes una cuenta? <a class="a" @click="handleClikLogin">Dale click aqui</a> </p>
        <div class="row mx-auto mt-3">
          <div class="col-6 text-start mt-3">
            <input type="text" class="bg-input-primary-wl w-100" placeholder="Nombre">
          </div>
          <div class="col-6 text-start mt-3">
            <input type="text" class="bg-input-primary-wl w-100" placeholder="Apellido">
          </div>
          <div class="col-12 mt-3 text-start">
            <input type="text" class="bg-input-primary-wl w-100" placeholder="Correo Electronico">
          </div>        
          <div class="col-12 mt-3 text-start">
            <input type="text" class="bg-input-primary-wl w-100" placeholder="Numero de Telefono">
          </div>
          <div class="col-6 mt-3 text-start">
            <input type="text" class="bg-input-primary-wl w-100" placeholder="Contraseña">
          </div>
          <div class="col-6 mt-3 text-start">
            <input type="text" class="bg-input-primary-wl w-100" placeholder="Repita Contraseña">
          </div>
          <div class="col-12">
            <button class="btn btn-login py-3 mt-4 w-100">Registrarme</button>
          </div>
        </div>
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
