<template>
  <div id="list">
    <div v-if="!loading" class="flex flex-col items-center gap-6 w-full">
      <h1 class="text-3xl">
        Terreni in vendita
      </h1>
      <div class="flex justify-end gap-3">
        <button class="py-1 px-2 bg-yellow-300 rounded-md"
                @click="sort('desc')">
          Più grandi ↓
        </button>
        <button class="py-1 px-2 bg-yellow-300 rounded-md"
                @click="sort('asc')">
          Più piccoli ↑
        </button>
      </div>
      <div class="grid grid-cols-3 gap-6 h-full">
        <div v-for="(terrain, index) in terrains" :key="index"
             class="bg-slate-200 border-b-4 border-emerald-700 shadow-md">
          <img :src="terrain.img" class="">
          <div class="flex flex-col py-6 px-3 gap-2">
            <p>Comune: {{ terrain.comune }}</p>
            <p>Ettari: {{ terrain.ettari }}km</p>
            <p>Terreno: {{ terrain.tipo_terreno }}</p>
          </div>
          <div class="flex justify-around mt-auto pb-3">
            <router-link :to="'/view/'+terrain.id"
                         class="py-1 px-2 bg-yellow-300 rounded-md">
              Vedi
            </router-link>
            <router-link :to="'/modify/'+terrain.id"
                         class="py-1 px-2 bg-yellow-300 rounded-md">
              Modifica
            </router-link>
            <button class="py-1 px-2 bg-yellow-300 rounded-md"
                    @click="remove(terrain)">
              Elimina
            </button>
          </div>
        </div>
      </div>
    </div>

    <div v-else>Loading...</div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      loading: true,
      sortMethod: 'desc',
      terrains: []
    }
  },

  async mounted() {
    await this.init();
  },

  methods: {
    async init() {
      const api = 'http://127.0.0.1:8000/api/terrains?sort=';

      try {
        let response = await axios.get(api + this.sortMethod);
        console.log('Response status: ', response.status);
        this.terrains = response.data;
        console.log(this.terrains);
      } catch (error) {
        console.log(error)
      }
      this.loading = false;
    },

    async remove(terrain) {
      const api = 'http://127.0.0.1:8000/api/terrains/';
 
      if (confirm("Eliminare terreno?")) {
        await axios.delete(api + terrain.id);
        this.loading = true;
        this.init();
      }
    },

    sort(direction) {
      if (this.sortMethod != direction) {
        this.sortMethod = direction;
        this.init();
      }
    },
  }
}
</script>>
