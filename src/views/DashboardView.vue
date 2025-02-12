<script setup>
import { ref } from 'vue';
import store from '../stores/index';

import axios from 'axios';

const cursos = ref(null)

const token = store.state.token; 

axios.get('https://campusiutirlaempresarial.com/api/public/api/listCourse', {
    headers: {
        'Authorization': `Bearer ${token}`
    }
})
.then(response => {
    cursos.value = response.data.data
    console.log(cursos.value);
    
    
})
.catch(error => {
    console.error('Error en la petición:', error);
});


var palabras = ['hola', 'mundo', 'javascript']
var result = palabras.every((palabras) => {
  return palabras.length > 3
})


console.log(result)

</script>
<template>
  <div class="container-fluid p-0 m-0">
  <div class="row">
    <div class="col-9 rounded text-center">
      <img src="../assets/banner.png" class="w-100" alt="">
    </div>
    <div class="col-3 rounded text-center">
      <img src="../assets/squad.png" class="w-100" alt="">
    </div>
    <div class="col-12 mt-4 mb-3" v-if="cursos">
      <div class="row">
        <div class="col-auto"><h5 class="my-5">Mis Cursos</h5></div>
        <div class="col my-auto text-right">
        <p class="my-5"><a href="#" class="mx-5">Explorar mas</a></p>
        </div>
      </div>
      <div class="row mt-3">        
        <RouterLink to="/course/234c" class="col-3" v-for="(value, key) in cursos" :key="key">
          <img src="../assets/course.png" class="w-100 rounded" alt="">
          <div class="row mt-2">
            <div class="col-2">
              <img src="../assets/squad.png" class="rounded-circle mt-2" width="40" alt="">
            </div>
            <div class="col-10">
              <p class="mt-2 fa-2 mb-0">{{ value.nombre_courses}}</p>
              <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
            </div>
          </div>
        </RouterLink>
      </div>
    </div>

    <div class="col-12 mt-4 mb-3">
      <div class="row">
        <div class="col-auto"><h5 class="my-5">Cursos de Marketing</h5></div>
        <div class="col my-auto text-right">
        <p class="my-5"><a href="#" class="mx-5">Explorar mas</a></p>
        </div>
      </div>
      <div class="row mt-3">
        <RouterLink to="/course/234c" class="col-3">
          <img src="../assets/course.png" class="w-100 rounded" alt="">
          <div class="row mt-2">
            <div class="col-2">
              <img src="../assets/squad.png" class="rounded-circle mt-2" width="40" alt="">
            </div>
            <div class="col-10">
              <p class="mt-2 fa-2 mb-0">Curso Gratis de Estrategias para vender en el MLM</p>
              <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
            </div>
          </div>
        </RouterLink>
        <div class="col-3">
          <img src="../assets/course.png" class="w-100 rounded" alt="">
          <div class="row mt-2">
            <div class="col-2">
              <img src="../assets/squad.png" class="rounded-circle mt-2" width="40" alt="">
            </div>
            <div class="col-10">
              <p class="mt-2 fa-2 mb-0">Curso Gratis de Estrategias para vender en el MLM</p>
              <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <img src="../assets/course.png" class="w-100 rounded" alt="">
          <div class="row mt-2">
            <div class="col-2">
              <img src="../assets/squad.png" class="rounded-circle mt-2" width="40" alt="">
            </div>
            <div class="col-10">
              <p class="mt-2 fa-2 mb-0">Curso Gratis de Estrategias para vender en el MLM</p>
              <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <img src="../assets/course.png" class="w-100 rounded" alt="">
          <div class="row mt-2">
            <div class="col-2">
              <img src="../assets/squad.png" class="rounded-circle mt-2" width="40" alt="">
            </div>
            <div class="col-10">
              <p class="mt-2 fa-2 mb-0">Curso Gratis de Estrategias para vender en el MLM</p>
              <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 mt-4 mb-3">
      <div class="row">
        <div class="col-auto"><h5 class="my-5">Cursos de Marketing</h5></div>
        <div class="col my-auto text-right">
        <p class="my-5"><a href="#" class="mx-5">Explorar mas</a></p>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-3">
          <img src="../assets/course.png" class="w-100 rounded" alt="">
          <div class="row mt-2">
            <div class="col-2">
              <img src="../assets/squad.png" class="rounded-circle mt-2" width="40" alt="">
            </div>
            <div class="col-10">
              <p class="mt-2 fa-2 mb-0">Curso Gratis de Estrategias para vender en el MLM</p>
              <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <img src="../assets/course.png" class="w-100 rounded" alt="">
          <div class="row mt-2">
            <div class="col-2">
              <img src="../assets/squad.png" class="rounded-circle mt-2" width="40" alt="">
            </div>
            <div class="col-10">
              <p class="mt-2 fa-2 mb-0">Curso Gratis de Estrategias para vender en el MLM</p>
              <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <img src="../assets/course.png" class="w-100 rounded" alt="">
          <div class="row mt-2">
            <div class="col-2">
              <img src="../assets/squad.png" class="rounded-circle mt-2" width="40" alt="">
            </div>
            <div class="col-10">
              <p class="mt-2 fa-2 mb-0">Curso Gratis de Estrategias para vender en el MLM</p>
              <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <img src="../assets/course.png" class="w-100 rounded" alt="">
          <div class="row mt-2">
            <div class="col-2">
              <img src="../assets/squad.png" class="rounded-circle mt-2" width="40" alt="">
            </div>
            <div class="col-10">
              <p class="mt-2 fa-2 mb-0">Curso Gratis de Estrategias para vender en el MLM</p>
              <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>
