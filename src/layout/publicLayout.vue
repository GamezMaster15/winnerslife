<script setup>
import { routeLocationKey, RouterLink, RouterView, useRoute } from 'vue-router'
import HelloWorld from '../components/HelloWorld.vue'
import { ref, onMounted, watch, onUnmounted } from 'vue';
import { useRouter } from 'vue-router';
import { useStore } from 'vuex';
import 'bootstrap';


const store = useStore();
const router = useRouter();

const direction = ref('/menu');
const iconMenu = ref('fi fi-rr-menu-burger');

const handleMenu = () => {
  
  if (direction.value == '/menu' && directionLogin.value == '/') {
    handleLogin();
    direction.value = '/'
    iconMenu.value = 'fi fi-rr-circle-xmark'
  } else if(direction.value == '/menu') {
    direction.value = '/'
    iconMenu.value = 'fi fi-rr-circle-xmark'
  } else {
    direction.value = '/menu'
    iconMenu.value = 'fi fi-rr-menu-burger'
  }
}


const directionLogin = ref('/login');
const iconLogin = ref('fi fi-rr-circle-user');

const handleLogin = () => {
  if(directionLogin.value == '/login' && direction.value == '/') {
    handleMenu();
    directionLogin.value = '/'
    iconLogin.value = 'fi fi-rr-circle-xmark'
  } else if (directionLogin.value == '/login') {
    directionLogin.value = '/'
    iconLogin.value = 'fi fi-rr-circle-xmark'   
  } else {
    directionLogin.value = '/login'
    iconLogin.value = 'fi fi-rr-circle-user'
  }
}

const handleHome = () => {
  if(direction.value == '/' || directionLogin.value == '/') {
    directionLogin.value = '/login'
    iconLogin.value = 'fi fi-rr-circle-user'
    direction.value = '/menu'
    iconMenu.value = 'fi fi-rr-menu-burger'
  }
}



</script>

<template>
  <header class="container-fluid bg-blur position-fixed mt-0 z-3 w-100">
    <div class="row px-3 w-100">
      <div class="col-2 col-md-1 my-auto text-center">
        <RouterLink :to="direction" class="btn text-white btnIcon" @click="handleMenu">
          <i :class="iconMenu"></i>
        </RouterLink>
      </div>
      <div class="col-8 col-md-10 text-center py-4 text-center">
        <RouterLink to="/" class="mx-auto">
          <h4 class="logo m-0 d-md-block d-none" @click="handleHome">winner's<span class="title-logo span">life</span></h4>
          <h5 class="logo m-0 d-md-none d-block text-center" @click="handleHome">winner's<span class="title-logo span">life</span></h5>
        </RouterLink>
      </div>
      <div class="col-2 col-md-1 my-auto text-center">
        <routerLink :to="directionLogin" class="btn text-white btnIcon" @click="handleLogin">
          <i :class="iconLogin"></i>
        </routerLink>
      </div>
      <hr >
    </div>
  </header>
  <RouterView class="z-2"/>
</template>

<style scoped>

</style>
