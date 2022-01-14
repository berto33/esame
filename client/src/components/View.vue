<template>
  <div class="view">
    <div v-if="!loading">
      <div class="flex flex-col bg-slate-200 border-b-4 border-emerald-700 shadow-md">
        <img :src="terrain.img">
        <div class="p-6 flex flex-col gap-3">
          <h1 class="text-2xl">{{terrain.comune}}</h1>
          <div class="flex gap-6">  
            <div class="flex flex-col flex-1 gap-3">
              <p>Ettari: {{terrain.ettari}} km2</p>
              <p>Tipo terreno: {{terrain.tipo_terreno}}</p>
              <p>Irrigazione: {{terrain.tipo_irrigazione}}</p>
            </div>
            <div class="flex flex-col flex-1 gap-3">
              <p>Foglio catastale: {{terrain.foglio_catastale}}</p>
              <p>Mappa catastale: {{terrain.mappa_catastale}}</p>
              <p>Parcella catastale: {{terrain.parcella_catastale}}</p>
              <p>Disponibilità:
                <span v-if="terrain.disponibilità == 1">
                 In vendita
                </span>
                <span v-else>
                  Non disponibile
                </span>
              </p>
              <p>Offerta: {{terrain.tipo_offerta}}</p>
              <p>Canone: {{terrain.canone_offerta}}€</p>
            </div>
          </div>
        </div>
      </div>

      <div class="flex justify-end gap-3 pt-3">
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
    
    <div v-else>Loading...</div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      loading: true,
      api: 'http://127.0.0.1:8000/api/terrains/',
      id: this.$route.params.id,
      terrain: {}
    }
  },

  async mounted() {
    await this.init()
  },

  methods: {
    async init() {
      try {
        let response = await axios.get(this.api + this.id);
        console.log('Response status: ', response.status);
        this.terrain = response.data;
        console.log(this.terrain);
      } catch (error) {
        console.log(error)
      }
      this.loading = false;
    },

    async remove(terrain) {
      if (confirm("Eliminare terreno?")) {
        await axios.delete(this.api + terrain.id);
        this.loading = true;
        this.init();
      }
    },
  }
}
</script>

<style>
  img {
    max-height: 400px;
  }
</style>