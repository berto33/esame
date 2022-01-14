<template>
  <div class="view">
    <h1 class="text-3xl text-center pb-6">
      Aggiungi un terreno
    </h1>

    <div class="flex py-6 px-3 gap-6 bg-slate-200 border-b-4 border-emerald-700 shadow-md">
      <div class="flex flex-col gap-3">
        <label for="img" class="flex flex-col gap-1">
          URL immagine:
          <input type="text" id="img" class="p-1 rounded-sm"
                v-model="terrain.img">
        </label>
        <p>Anteprima immagine:</p>
        <img :src="terrain.img"
             class="rounded-sm">
      </div>
      
      <div class="flex flex-col gap-3">
        <label for="comune" class="flex flex-col gap-1">
          Comune:
          <input type="text" id="comune" class="p-1 rounded-sm"
              v-model="terrain.comune">
        </label>
        <label for="ettari" class="flex flex-col gap-1">
          Ettari (in km quadrati):
          <input type="text" id="ettari" class="p-1 rounded-sm"
              v-model="terrain.ettari">
        </label>
        <label for="tipo_terreno" class="flex flex-col gap-1">
        Tipo terreno:
        <select id="tipo_terreno" class="p-1 rounded-sm bg-white"
                v-model="terrain.tipo_terreno">          
          <option value="Argilloso">Argilloso</option>
          <option value="Sabbioso">Sabbioso</option>
          <option value="Ghiaioso">Ghiaioso</option>
          <option value="Tufo">Tufo</option>
        </select>
      </label>
      <label for="tipo_irrigazione" class="flex flex-col gap-1">
        Tipo irrigazione:
        <select id="tipo_irrigazione" class="p-1 rounded-sm bg-white"
                v-model="terrain.tipo_irrigazione">          
          <option value="A scorrimento">A scorrimento</option>
          <option value="Pozzo">Pozzo</option>
          <option value="Canale">Canale</option>
          <option value="Senz'acqua">Senz'acqua</option>
        </select>
      </label>
      </div>

      <div class="flex flex-col gap-3">
        <label for="foglio_catastale" class="flex flex-col gap-1">
          Foglio catastale:
          <input type="text" id="foglio_catastale" class="p-1 rounded-sm"
              v-model="terrain.foglio_catastale">
        </label>
        <label for="mappa_catastale" class="flex flex-col gap-1">
          Mappa catastale:
          <input type="text" id="mappa_catastale" class="p-1 rounded-sm"
              v-model="terrain.mappa_catastale">
        </label>
        <label for="parcella_catastale" class="flex flex-col gap-1">
          Parcella catastale:
          <input type="text" id="parcella_catastale" class="p-1 rounded-sm"
              v-model="terrain.parcella_catastale">
        </label>      
        <label for="tipo_offerta" class="flex flex-col gap-1 ">
          Tipo offerta:
          <select id="tipo_offerta" class="p-1 rounded-sm bg-white"
                  v-model="terrain.tipo_offerta">            

            <option value="Vendita">Vendita</option>
            <option value="Affitto">Affitto</option>
            <option value="Affiddo gratuito">Affiddo gratuito</option>
          </select>
        </label>
        
        <label for="canone_offerta" class="flex flex-col gap-1">
          Canone:
        <input type="text" id="canone_offerta" class="p-1 rounded-sm"
              v-model="terrain.canone_offerta">
        </label>
        <label for="disponibilità" class="flex">
          <p class="grow">Disponibilità</p>
          <input type="checkbox" id="disponibilità"
                v-model="terrain.disponibilità">
        </label>
      </div>
      
    </div>

    <div class="flex justify-end gap-3 pt-3">
      <button class="py-1 px-2 bg-yellow-300 rounded-md"
              @click="create()"
              :disabled="!formIsValid"
              :class="{
                'bg-slate-300 text-white cursor-not-allowed' : !formIsValid
              }">
        Aggiungi
      </button>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      loading: true,
      api: 'http://127.0.0.1:8000/api/terrains/',
      terrain: {
        comune: '',
        img: '',
        ettari: '',
        foglio_catastale: '',
        mappa_catastale: '',
        parcella_catastale: '',
        tipo_terreno: '',
        tipo_irrigazione: '',
        tipo_offerta: '',
        canone_offerta: '',
        disponibilità: ''
      }
    }
  },

  computed: {
    formIsValid() {
      return (
        this.terrain.comune != '' &
        this.terrain.img != '' &
        this.terrain.ettari != '' &
        this.terrain.foglio_catastale != '' &
        this.terrain.mappa_catastale != '' &
        this.terrain.parcella_catastale != '' &
        this.terrain.tipo_terreno != '' &
        this.terrain.tipo_irrigazione != '' &
        this.terrain.tipo_offerta != '' &
        this.terrain.canone_offerta != '' &
        this.terrain.disponibilità != null
      )
    }
  },

  methods: {
    async create() {
      if (confirm("Aggiungere terreno?")) {
        let request = await axios.post(this.api, this.terrain);
        
        if (request.status == 200) {
          this.$router.push('/')
        }
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