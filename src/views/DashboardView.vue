<script setup>

var palabras = ['hola', 'mundo', 'javascript']
var result = palabras.every((palabras) => {
  return palabras.length > 3
})

console.log(result)

</script>
<template>
  <div class="container-fluid p-0 m-0">
  <div class="row">
    <div class="col-12 rounded mx-auto text-center">
      <img src="../assets/banner-membership.png" class="w-100" alt="">
    </div>
    <div class="col-12 mt-4 mb-3">
      <h5>Explorar nuestros cursos</h5>
      <div class="row mt-3">
        <div class="col-3">
          <img src="../assets/course.jpg" class="w-100 rounded" alt="">
          <p class="mt-2 fa-2">Curso Gratis de Estrategias para vender en el MLM</p>
          <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
        </div>
        <RouterLink to="/course/234c" class="col-3">
          <img src="../assets/course-3.jpg" class="w-100 rounded" alt="">
          <p class="mt-2 fa-2">Estrategias para vender en el MLM *Luis Santa*</p>
          <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
        </RouterLink>
        <div class="col-3">
          <img src="../assets/course-2.jpg" class="w-100 rounded" alt="">
          <p class="mt-2 fa-2">Maximixa tus ventas, y dirigete al exito</p>
          <p class="text-gray">Por Tonny Cuero CEO Fundador WWI</p>
        </div>
        <div class="col-3">
          <img src="../assets/course.jpg" class="w-100 rounded" alt="">
          <p class="mt-2 fa-2">Como empoderar mis lideres, y convertirlos en verdaderos lideres</p>
          <p class="text-gray">Por Bryan Cuero Vicepresidente WWI</p>
        </div>
      </div>
      <button class="btn text-white border p-3 px-5 mt-2">Explorar cursos</button>
    </div>

    <div class="col-12 mt-4 mb-3">
      <h5>Inscribete en nuestros proximos Zoom</h5>
      <div class="row mt-3">
        <div class="col-3">
          <img src="../assets/course.jpg" class="w-100 rounded" alt="">
          <p class="mt-2 fa-2">Curso Gratis de Estrategias para vender en el MLM</p>
          <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
        </div>
        <div class="col-3">
          <img src="../assets/course-3.jpg" class="w-100 rounded" alt="">
          <p class="mt-2 fa-2">Estrategias para vender en el MLM *Luis Santa*</p>
          <p class="text-gray">Por Jordan Cuero Presidente WWI</p>
        </div>
        <div class="col-3">
          <img src="../assets/course-2.jpg" class="w-100 rounded" alt="">
          <p class="mt-2 fa-2">Maximixa tus ventas, y dirigete al exito</p>
          <p class="text-gray">Por Tonny Cuero CEO Fundador WWI</p>
        </div>
        <div class="col-3">
          <img src="../assets/course.jpg" class="w-100 rounded" alt="">
          <p class="mt-2 fa-2">Como empoderar mis lideres, y convertirlos en verdaderos lideres</p>
          <p class="text-gray">Por Bryan Cuero Vicepresidente WWI</p>
        </div>
      </div>
      <button class="btn text-white border p-3 px-5 mt-2">Ver todos</button>
    </div>

    <div class="col-12 mt-4 mb-3">
      <h5>Descubre nuestros productos</h5>
      <div class="row mt-3">
        <div class="col-3">
          <img src="../assets/course.jpg" class="w-100 rounded" alt="">
          <p class="mt-2 fa-2">Curso Gratis de Estrategias para vender en el MLM</p>
          <p class="text-gray">Documentacion Oficial WWI</p>
        </div>
        <div class="col-3">
          <img src="../assets/course-3.jpg" class="w-100 rounded" alt="">
          <p class="mt-2 fa-2">Estrategias para vender en el MLM *Luis Santa*</p>
          <p class="text-gray">Documentacion Oficial WWI</p>
        </div>
        <div class="col-3">
          <img src="../assets/course-2.jpg" class="w-100 rounded" alt="">
          <p class="mt-2 fa-2">Maximixa tus ventas, y dirigete al exito</p>
          <p class="text-gray">Documentacion Oficial WWI</p>
        </div>
        <div class="col-3">
          <img src="../assets/course.jpg" class="w-100 rounded" alt="">
          <p class="mt-2 fa-2">Como empoderar mis lideres, y convertirlos en verdaderos lideres</p>
          <p class="text-gray">Documentacion Oficial WWI</p>
        </div>
      </div>
      <button class="btn text-white border p-3 px-5 mt-2">Descubrir mas</button>
    </div>
  </div>
</div>
</template>
