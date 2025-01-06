<script setup>
import { computed } from 'vue';
import { useRoute } from 'vue-router'; // Importar useRoute
import PublicLayout from './layout/publicLayout.vue';
import AuthenticatedLayout from './layout/AuthenticatedLayout.vue';

const route = useRoute();

const layoutComponent = computed(() => {
  return route.meta.requiresAuth ? AuthenticatedLayout : PublicLayout;
});
</script>

<template>
  <component :is="layoutComponent">
    <router-view />
  </component>
</template>
