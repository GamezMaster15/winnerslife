<template>
  <div class="not-found">
    <div class="container text-center py-5">
      <h1 class="display-1">404</h1>
      <h2 class="mb-4">Página no encontrada</h2>
      <p class="lead mb-4">Lo sentimos, la página que buscas no existe o ha sido movida.</p>
      <router-link :to="{ name: 'home' }" class="btn btn-primary">
        Volver al inicio
      </router-link>
    </div>
  </div>
</template>

<script setup>
// No se necesita lógica adicional
</script>

<style scoped>
.not-found {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style> 