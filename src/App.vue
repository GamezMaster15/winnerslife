<script setup>
import { routeLocationKey, RouterLink, RouterView, useRoute } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
import { ref, onMounted, watch, onUnmounted } from 'vue';
import { useRouter } from 'vue-router';
import { useStore } from 'vuex';
import 'bootstrap';



const expandedMenu = () => {
  document.querySelector("#sidebar").classList.toggle("expand");
};

const menu = ref([
  {
    id: 2,
    name: 'Escritorio',
    icon: 'fi fi-rr-dashboard-panel',
    link: '/dashboard',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
  {
    id: 8,
    name: 'Academia',
    icon: 'fi fi-rr-users-class',
    link: '/',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
  {
    id: 4,
    name: 'Herramientas',
    icon: 'fi fi-rr-tools',
    link: '/',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
  {
    id: 5,
    name: 'Plataformas',
    icon: 'fi fi-rr-selling',
    link: '/',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
  {
    id: 7,
    name: 'WIA',
    icon: 'fi fi-rr-sparkles',
    link: '/',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
])


const store = useStore();
const router = useRouter();

const logout = () => {
  store.dispatch('mockLogout')
  router.push('/')
}

const isUserAuth = ref(false);

const direction = ref('/menu');
const iconMenu = ref('fi fi-rr-menu-burger');

const checkIsUserAuth = () => {
  if(store.state.loggedIn) {
    isUserAuth.value = true;
  } else {
    isUserAuth.value = false
    
  }
}
watch(
  () => store.state.loggedIn,
  (newUser) => {
    checkIsUserAuth();
  } 
)

onMounted(() => {
  checkIsUserAuth();
})

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
  <header class="container-fluid bg-blur position-fixed mt-0 z-3 w-100" v-if="isUserAuth === false">
    <div class="row px-3 w-100">
      <div class="col-2 col-md-1 my-auto text-center">
        <RouterLink :to="direction" class="btn text-white btnIcon" @click="handleMenu">
          <i :class="iconMenu"></i>
        </RouterLink>
      </div>
      <div class="col-8 col-md-10 text-center py-4 text-center">
        <RouterLink to="/" class="mx-auto">
          <h4 class="logo m-0 d-md-block d-none" @click="handleHome">winner's<span class="title-logo">life</span></h4>
          <h5 class="logo m-0 d-md-none d-block text-center" @click="handleHome">winner's<span class="title-logo">life</span></h5>
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
  <RouterView class="z-2"  v-if="isUserAuth === false"/>
  
  <div class="container-fluid" v-if="isUserAuth"> 
    <div class="row">
      <div class="col-12 py-2 pb-1">
        <div class="container-fluid">
          <div class="row">
            <div class="col-1 pt-2 my-auto">
              <button class="toggle-btn m-0 p-0" type="button" @click="expandedMenu">
                  <i class="fi fi-rr-apps"></i>
                </button>
            </div>
            <div class="col-2 my-auto">
              <h5 class="logo m-0 d-md-block d-none text-start text-white" @click="handleHome">winner's<span class="title-logo">life</span></h5>
              <h5 class="logo m-0 d-md-none d-block text-start text-white" @click="handleHome">winner's<span class="title-logo">life</span></h5>
            </div>
            <div class="col-5 offset-1">
              <div class="form-group has-feedback">
                <span class="fi fi-rr-search form-control-feedback text-white"></span>
                <input type="text" class="form-control bg-dark-input-flat text-white" placeholder="Que deseas aprender?">
              </div>
            </div>
            <div class="col-2">
              <p></p>
            </div>
            <div class="col-1 d-flex my-auto">
              <a href="" class="p-2"><i class="fi fi-rr-store-alt"></i></a>
              <a href="" class="p-2 ms-3"><i class="fi fi-rr-circle-user"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 p-0">
        <div class="wrapper">
        <aside id="sidebar">
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <RouterLink to="/" class="sidebar-link">
                        <i class="fi fi-rr-home"></i>
                        <span class="text-white">Inicio</span>
                    </RouterLink>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="fi fi-rr-book"></i>
                        <span class="text-white">Academia</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <RouterLink to="/" class="sidebar-link">Cursos</RouterLink>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Libros</a>
                            <a href="#" class="sidebar-link">Ficha Tecnicas</a>
                        </li>
                    </ul>
                </li> 
                <li class="sidebar-item">
                    <RouterLink to="/calendar" class="sidebar-link">
                        <i class="fi fi-rr-video-camera-alt"></i>
                        <span class="text-white">Zooms</span>
                    </RouterLink>
                </li>               
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fi fi-rr-tool-box"></i>
                        <span class="text-white">Herramientas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="fi fi-rr-data-transfer"></i>
                        <span class="text-white">Plataformas</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="https://backoffice.winnerworldlatino.com/login" target="_blank" class="sidebar-link">
                                BackOffice
                            </a>
                            <a href="https://winnerworldlatino.com/ecommerce/" target="_blank" class="sidebar-link">
                                Ecommerce
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                      <i class="fi fi-rr-tools"></i>
                        <span class="text-white">Congifuracion</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <RouterLink to="/logout" class="sidebar-link">                    
                  <i class="fi fi-rr-exit"></i>
                  <span class="text-white">Cerrar Sesion</span>
                </RouterLink>
            </div>
        </aside>
        <div class="main p-3">            
          <RouterView class="z-2"/>
        </div>
      </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>
