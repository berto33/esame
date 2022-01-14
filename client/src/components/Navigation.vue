<template>
  <div class="flex items-center gap-6 pr-6 p-3 bg-emerald-400 shadow-lg">
    <div @click="goTo('/home')" class="grow">
      <h1 class="w-fit text-3xl tracking-wide font-bold italic text-white cursor-pointer hover:text-slate-300 duration-300">
        Banca della Terra
      </h1>
    </div>
    <a
      v-for="(link, index) in links"
      :key="index"
      @click="goTo(link.path)"
      class="text-white cursor-pointer hover:text-slate-300 duration-300"
    >
      {{ link.label }}
    </a>
  </div>
</template>

<script>
export default {
  data() {
    return {
      links: [
        {
          path: '/home',
          label: 'Home'
        },
        {
          path: '/create',
          label: 'Nuovo terreno'
        }
      ]
    }
  },

  methods: {
    goTo(path) {
      this.$router.push({ path: path })
    }
  }
};
</script>
