<template>
  <div>
    <v-select
      v-model="lugar"
      label="data"
      :options="array_vehiculos"
      placeholder="Buscar Vehiculo..."
      :clearable="true"
      :disabled="disabled"
      @search="selectVehiculo"
      @input="getDatosVehiculo"
    >
      <span slot="no-options">No se encontraron resultados.</span>
      <!-- <template slot="option" slot-scope="option">{{ option.data }}</template> -->
      <template #option="{ data, numero_placa, marca}">
        <em>{{ data }} {{numero_placa}} {{marca}}</em>
      </template>
      <template slot="selected-option" slot-scope="option">{{option.numero_placa}}</template>
    </v-select>
  </div>
</template>
<script>

export default {
  props: {
    value: {
      type: 0
    },
    disabled: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      array_vehiculos: [],
      seleccionado: this.value,
      loading: false,
      lugar: "",
      option: {},
      seleccion: 0,
      inputId: 0
    };
  },
  mounted() {
    if (this.value) {
      console.log("buscar");
      this.buscar(this.value);
    }
  },
  methods: {
    buscar(val) {
      let url = '/vehiculo/select?buscar='+val, me = this;

      axios.get(url).then(function (response){
        console.log(response.data);
        me.array_vehiculos = response.data;
        if(me.array_vehiculos.length == 1){
          me.lugar = me.array_vehiculos[0];
        }
      })
      .catch(function (error){
          console.log(error);
      });
    },
    getDatosVehiculo(val1) {
      if (val1) {
        this.loading = false;
        this.seleccionado = val1.id;
        this.option = val1;
        this.$emit("input", this.seleccionado);
        this.$emit("setArticulo", val1);
      } else {
        this.lugar = "";
        this.array_vehiculos = [];
        this.$emit("input");
      }
    },
    selectVehiculo(search) {
      let me = this;
      if(!search)
        return;

      let url = '/vehiculo/select?buscar='+search;

      axios.get(url).then(function (response){
          me.array_vehiculos = response.data;
      })
      .catch(function (error){
          console.log(error);
      });
    },
    reiniciar() {
      this.lugar = "";
      this.array_vehiculos = [];
      this.$forceUpdate();
    }
  },
  watch: {
    lugar: function(newvalue, oldvalue) {
      console.log('lugar',newvalue)
      if (newvalue) {
        // this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      console.log('value',newvalue)
      if (newvalue) {
        this.buscar(newvalue);
      }
    },
  }
};
</script>