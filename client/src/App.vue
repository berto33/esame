<template>
  <main class="h-screen flex flex-col">
    <Navigation/>
    <div class="max-w-screen-md mx-auto grow p-8">
      <router-view></router-view>
    </div>
  </main>
</template>

<script>
import Navigation from '@/components/Navigation.vue'; 

export default {
  components: {
    Navigation
  },
}
</script>
