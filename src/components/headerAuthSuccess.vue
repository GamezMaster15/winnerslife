<template>
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