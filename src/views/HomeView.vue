<script setup>
import TheWelcome from '../components/TheWelcome.vue'
</script>

<template>
  <main class="container-fluid p-0 bg-gradient-primary">
    <section class="row">      
      <div class="offset-lg-1 col-lg-4 d-md-none d-lg-block d-none my-auto">
        <p class="mb-2">¿Que es Winner’slife?</p>
        <h1 class="akira ali">
          Sistema de <br>
          formacion de <br>
          <span>lideres</span>
        </h1>
        <button class="btn btn-primary-wl py-3 px-5 mt-2">
          Inicia tu camino
        </button>
      </div>
      <div class="col-lg-7 col-md-12 tecnologia-imagen-home">
        <img src="../assets/Jordan y Tonny.png" class="w-100 mt-5 pt-3" alt="">
      </div>      
      <div class="col-md-12 my-auto text-center d-lg-none d-md-block mt-5">
        <p class="mb-2">¿Que es Winner’slife?</p>
        <h1 class="akira ali">
          Sistema de <br>
          formacion de <br>
          <span>lideres</span>
        </h1>
        <button class="btn btn-primary-wl py-3 px-5 mt-2">
          Inicia tu camino
        </button>
      </div>
    </section>   
  </main>
  
  <section class="container-fluid mt-5 p-0 pb-5 bg-section-two">
      <div class="row">
        <hr>
        <div class="col-12 col-md-10 mx-auto text-center mt-5 pt-5">
          <h1 class="akira h1">
            el sistema de mayor <b class="fz"><br><span>duplicacion</span> del <span>mlm</span></b>
          </h1>
        </div>
        <div class="col-11 col-md-9 mx-auto text-center">
          <p class="p">Es un sistema hecho para tener la vida de un ganador, a nivel físico, financiero, mental y espiritual. Un ganador debe ser una persona que esta bien en todos sus ámbitos y por eso estamos comprometidos con tu Éxito a nivel global.</p>
        </div>
      </div>
    </section>
    <section class="container-fluid mt-0 p-0 mb-5 pb-5">
      <div class="row">
        <div class="col-12 bg-section-flat">
          <div class="row">
            <div class="col-11 mx-auto rounded text-center">
              <img src="../assets/charts.png" class="w-100 p-0" alt="">
            </div>
          </div>
          <div class="row h-100 w-100 content-text-flat">
            <div class="col-8 text-flat text-center mx-auto">
              <h1 class="akira h1">historias de <span>exito</span></h1>
              <p class="p">Nuestro Corporativo y lideres diamantes son verdaderos casos de éxito, representando el liderazgo y la excelencia en Winner. Son inspiradores que han demostrado que con dedicación y esfuerzo, se pueden alcanzar grandes logros.</p>
            </div>
          </div>
        </div>
        <div class="col-11 rounded mx-auto bg-dark p-5 mtn mindset d-flex">
          <div class="row">
            <div class="col-6">
              <p class="mb-0">Es hora de cambiar tu</p>
              <h1 class="akira h1">Mindset</h1>
              <p class="pa-2">Tu mindset es clave para cambiar tu vida, ya que determina cómo enfrentas las situaciones. Una mentalidad positiva te ayuda a ver oportunidades y a aprender de tus errores, empoderándote para alcanzar tus metas.</p>
              <button class="btn btn-primary-wl py-3 px-5 mt-2">
                Inicia tu camino
              </button>              
            </div>
          </div>
        </div>  
      </div>
    </section> 


    <section class="container-fluid ">
      <div class="row backgroundImg">
        <div class="col-12 text-center">
          <div class="space"></div>
          <h1 class="akira pt-5 mt-5 h1">
            nuestro <span>sistema</span> <br>
            es completamente <br>
            <span>intuitivo y efectivo</span>
          </h1>          
          <img src="../assets/devices.png" class="w-100 mtn" alt="" />
        </div>
      </div>
    </section>

    <section class="container-fluid bg-dark-footer pt-3">
      <div class="row pt-5 px-5 pb-2">
        <div class="col-2 mx-auto">
          <div class="row">
            <div class="col-12">
              <h4 class="akira">Winner's<span>life</span></h4>
            </div>
            <div class="col-12 mt-4">
              <p>
                Mas que un sistema de formacion es adoptar un
                estilo de vida, la vida de un ganador.
              </p>
            </div>
            <div class="col-12 mt-2">
              <p>
                Te invitamos a forjar nuestro estilo de vida.
              </p>
            </div>
          </div>
        </div>
        <div class="col-2 mx-auto">
          <h4 class="akira">Menu</h4>
          <ul class="mt-4">
            <li><RouterLink to="/">Paso a paso</RouterLink></li>
            <li><RouterLink>Herramientas</RouterLink></li>
            <li><RouterLink>Profesor</RouterLink></li>
            <li><RouterLink>Empieza tu camino</RouterLink></li>
            <li><RouterLink>Plataformas</RouterLink></li>
          </ul>
        </div>
        <div class="col-2 mx-auto">
          <h4 class="akira">Paises</h4>
          <p class="mt-4">
            ECUADOR, COLOMBIA, BRASIL, MEXICO, PERÚ, BOLIVIA, USA, PARAGUAY, ESPAÑA, PUERTO RICO, REPUBLICA DOMINICANA,EL SALVADOR, PANAMA, NICARAGUA, COSTA RICA, VENEZUELA.
          </p>
        </div>
        <div class="col-2 mx-auto">
          <h4 class="akira">Oficina</h4>
          <ul class="mt-4">
            <li><RouterLink to="/">Ecuador</RouterLink></li>
            <li><RouterLink>Colombia</RouterLink></li>
            <li><RouterLink>Mexico</RouterLink></li>
            <li><RouterLink>Bolivia</RouterLink></li>
            <li><RouterLink>Peru</RouterLink></li>
            <li><RouterLink>Brasil</RouterLink></li>
            <li><RouterLink>Panama</RouterLink></li>
          </ul>
        </div>
      </div>
      <hr>
      <div class="row bg-dark-footer text-center">
        <div class="col-12 px-5 py-3 pt-2">
          <p class="mb-1">Copyright © 2024 Formación Multinivel | <b class="akira">Winner's<span>Life</span></b></p>
        </div>
      </div>
    </section>
</template>
