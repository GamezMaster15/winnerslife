<script setup>
import { ref } from 'vue';
import TheWelcome from '../components/TheWelcome.vue'

const menu = ref([
  {
    id: 1,
    name: 'Inicio',
    link: '/',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: `En Winner's Life, te invitamos a explorar un mundo de oportunidades y motivación. Esta página web está diseñada para inspirarte a alcanzar tus metas y convertirte en la mejor versión de ti mismo.`
  },
  {
    id: 2,
    name: 'Escritorio',
    link: '/dashboard',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
  {
    id: 3,
    name: 'Paso a Paso',
    link: '/',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
  {
    id: 4,
    name: 'Herramientas',
    link: '/',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
  {
    id: 5,
    name: 'Plataformas',
    link: '/',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
  {
    id: 6,
    name: 'Profesor',
    link: '/',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
  {
    id: 7,
    name: 'WIA',
    link: '/',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
  {
    id: 8,
    name: 'Academia',
    link: '/',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
  {
    id: 9,
    name: 'Login',
    link: '/',
    video: 'https://www.youtube.com/embed/2Fi-yRpazTk?si=NDEMCl1WplUD73pR&amp;controls=0&amp;start=0&autoplay=1',
    description: 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque veritatis facere, culpa dignissimos iure, nesciunt repellat autem id, rerum perspiciatis odit asperiores praesentium maiores. Eos explicabo omnis mollitia cumque iure?'
  },
])

const show = ref(false)

const hoverlink = (item) => {
  alert(item)
}

</script>

<template>
  <div class="space"></div>
  <section class="container p-0">
    <div class="row">
      <div class="col-8 col-md-4 offset-2 offset-md-0">                          
        <h1 class="akira">
          Menu
        </h1>
        <div class="row mt-3 mx-4">                  
          <div class="col-12 py-3" v-for="item in menu" :key="item.id">
            <RouterLink :to="item.link" @mouseover="show = item.id" @mouseleave="show = false">{{item.name}} <i class="fi fi-rr-arrow-small-right" v-if="show == item.id"></i></RouterLink>
          </div>
        </div>
      </div>
      <div class="col-8 px-5 my-auto d-none d-md-block">
        <div class="row">
          <div class="col-12 p-0" v-if="show == false">
            <div class="w-100 bg-dark p-4 rounded" >
            <h4 class="akira mt-4">Default</h4>
            <p>La idea es tener una imagen por default para cuando abres el menu o no estas posicionado en ningun link del mismo.6</p>
            </div> 
          </div>
          
          <div class="col-12 p-0" v-for="item in menu" :key="item.id">
            <div class="w-100 bg-dark p-4 rounded" v-if="show == item.id" >
            <iframe class="w-100 rounded" height="380px" :src="item.video" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <h4 class="akira mt-4">{{item.name}}</h4>
            <p>{{item.description}}</p>
            </div> 
          </div>  
        </div> 
      </div>
    </div>
  </section>
</template>
