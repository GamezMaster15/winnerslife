<script setup>
import LoginForm from '@/components/auth/LoginForm.vue';  
import SocialLogin from '@/components/auth/SocialLogin.vue';

const hasSocialLogin = false;
</script>

<template>
  <div class="login-view">
    <LoginForm />
    <SocialLogin v-if="hasSocialLogin" />
  </div>
</template>