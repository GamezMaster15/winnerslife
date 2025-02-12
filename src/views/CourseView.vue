<script setup>
import { nextTick, ref } from 'vue';
import { useRoute } from 'vue-router';

const routes = useRoute();

const idVideo = routes.params.id;

const resView = ref(null)

const inputRes = ref(null)

const getVideoCourse = () => {

};

const resHandled = (id) => {
  resView.value = id;
  nextTick(() => {
    inputRes.value.focus();
  })
}

const hiddeInputRes = () => {
  resView.value = null;
}

/*

<div class="container-fluid p-0  m-0">
  <div class="row">
    <div class="col-8 hv-00 px-4">
      <div class="row">
        <div class="col-12 p-0 m-0">
          <iframe class="w-100 hv-45 rounded p-0 m-0" src="https://www.youtube.com/embed/5U8_QPfXXIg?si=7gqtNZbsHiYbbQx5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          <h4 class="mt-4 mb-0">1.0 Curso Gratis de Estrategias para vender en el MLM</h4>
          <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
        </div>
        <div class="col-12 mt-3">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-12 p-0">
          <div class="accordion accordion-flush" id="accordionFlushExampleTwo">
            <div class="accordion-item bg-dark rounded text-white">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-dark rounded text-white " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOneTwo" aria-expanded="false" aria-controls="flush-collapseOneTwo">
                  Recursos
                </button>
              </h2>
              <div id="flush-collapseOneTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExampleTwo">
                <div class="accordion-body">
                  <div class="col-12">
                    <p class=" py-2 mb-0">
                      <RouterLink to="#"><i class="fi fi-rr-book-bookmark me-3"></i>Ebook de Ventas</RouterLink>
                      <hr>
                      <RouterLink to="#"><i class="fi fi-rr-link me-3"></i>Link de Backoffice</RouterLink>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 p-0">
          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item bg-dark rounded text-white">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-dark rounded text-white " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Temario
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="col-12">
                    <p class=" py-2 mb-0">
                      <RouterLink to="#"><i class="fi fi-rr-unlock me-3"></i>1.0 Curso Gratis de Estrategias para vender en el MLM </RouterLink>
                      <hr>
                      <RouterLink to="#"><i class="fi fi-rr-lock me-3"></i>1.1 Aprende a usar las herramientas.</RouterLink>
                      <hr>
                      <RouterLink to="#"><i class="fi fi-rr-lock me-3"></i>1.2 Analizando las estadisticas.</RouterLink>
                      <hr>
                      <RouterLink to="#"><i class="fi fi-rr-lock me-3"></i>1.3 Maximixa las ventas.</RouterLink>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    </div>
  </div>
</div>

*/
</script>
<template>
  <div class="container-fluid p-0 m-0">
  <div class="row">
    <div class="col-9">
      <div class="row">
        <div class="col-12">
          <img src="../assets/banner-video.png" class="w-100" alt="">
        </div>
        <div class="col-12 mt-4 mb-3">
          <div class="row">
            <div class="col-auto">
              <h5 class="my-5 mx-2">RoadMap</h5></div>
            <div class="col my-auto text-right">
            <p class="my-5"><a href="#" class="mx-5">Explorar mas</a></p>
            </div>
          </div>
          <div class="row mt-3">
            <RouterLink to="/course/234c" class="col-4">
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
            <div class="col-4">
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
            <div class="col-4">
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
        <div class="col-12 mt-3">
          <div class="row ">
            <div class="col-12 mb-4 mt-2">
              <div class="form-group has-feedback">
                  <span class="fi fi-rr-paper-plane form-control-feedback py-4 px-5"></span>
                  <input type="text" class="form-control text-white py-3" placeholder="Escribe tu comentario o pregunta">
              </div>
            </div>
          </div>
          <div class="row mt-3 px-3"> 
            <div class="col-12 mb-3">
              <div class="row">
                <div class="col-1">
                  <img src="../assets/profile.jpg" class="w-100 rounded-circle" alt="">
                </div>
                <div class="col-10 bg-dark border-rounded pt-2">
                  <p class="mb-0 fa-2">Carlos Gamez</p>
                  <p><i class="text-gray">Estudiante</i> • <i class="text-gray">Hace 3 dias</i></p>
                  <p class="text-gray">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae quas nam ipsam illo, autem accusantium sequi deleniti sint iusto. Libero numquam minima et exercitationem provident porro repellat consequuntur dolor. Dolore.</p>
                </div>
                <div class="col-10 offset-2 mt-1">
                  <a href="#" class="a fz-2 mb-0" @click="resHandled(2)" v-if="resView != 2">Responder</a>
                </div>
                <div class="col-10 offset-2 mt-2" v-if="resView == 2">
                  <div class="form-group has-feedback">
                  <span class="fi fi-rr-paper-plane form-control-feedback"></span>
                  <input type="text" class="form-control text-white" placeholder="Responder a Carlos Gamez" ref="inputRes" @blur="hiddeInputRes">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-10 offset-2 mb-3">
              <div class="row">
                <div class="col-2">
                  <img src="../assets/profile.jpg" class="w-100 rounded-circle" alt="">
                </div>
                <div class="col-10 bg-dark border-rounded pt-2">
                  <p class="mb-0 fa-2">Manuel Garcia</p>
                  <p><i class="text-gray">Estudiante</i> • <i class="text-gray">Hace 3 dias</i></p>
                  <p class="text-gray">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae quas nam ipsam illo, autem accusantium sequi deleniti sint iusto. Libero numquam minima et exercitationem provident porro repellat consequuntur dolor. Dolore.</p>
                </div>
                <div class="col-10 offset-2 mt-1">
                  <a href="#" class="a fz-2 mb-0" @click="resHandled(4)" v-if="resView != 4">Responder</a>
                </div>
                <div class="col-10 offset-2 mt-2" v-if="resView == 4">
                  <div class="form-group has-feedback">
                  <span class="fi fi-rr-paper-plane form-control-feedback"></span>
                  <input type="text" class="form-control text-white" placeholder="Responder a Manuel Garcia" ref="inputRes" @blur="hiddeInputRes">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 mb-3">
              <div class="row">
                <div class="col-2">
                  <img src="../assets/profile.jpg" class="w-100 rounded-circle" alt="">
                </div>
                <div class="col-10 bg-dark border-rounded pt-2">
                  <p class="mb-0 fa-2">Carlos Gamez</p>
                  <p><i class="text-gray">Estudiante</i> • <i class="text-gray">Hace 3 dias</i></p>
                  <p class="text-gray">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae quas nam ipsam illo, autem accusantium sequi deleniti sint iusto. Libero numquam minima et exercitationem provident porro repellat consequuntur dolor. Dolore.</p>
                </div>
                <div class="col-10 offset-2 mt-1">
                  <a href="#" class="a fz-2 mb-0" @click="resHandled(3)" v-if="resView != 3">Responder</a>
                </div>
                <div class="col-10 offset-2 mt-2" v-if="resView == 3">
                  <div class="form-group has-feedback">
                  <span class="fi fi-rr-paper-plane form-control-feedback"></span>
                  <input type="text" class="form-control text-white" placeholder="Responder a Carlos Gamez" ref="inputRes" @blur="hiddeInputRes">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>        
        
        
      </div>
      
      

    
    </div>
    <div class="col-3 rounded text-center">
      <div class="row">
        <div class="col-12">
          <img src="../assets/squad.png" class="w-100" alt="">
        </div>
         
      </div>
    </div>
  </div>
</div>
</template>
