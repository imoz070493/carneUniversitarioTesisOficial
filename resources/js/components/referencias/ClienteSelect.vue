<template>
  <div>
    <v-select
      v-model="lugar"
      label="data"
      :options="array_clientes"
      placeholder="Buscar Cliente..."
      :clearable="true"
      :disabled="disabled"
      @search="selectPersona"
      @input="getDatosPersona"
    >
      <span slot="no-options">No se encontraron resultados.</span>
      <!-- <template slot="option" slot-scope="option">{{ option.data }}</template> -->
      <template #option="{ data, nombre_cliente }">
        <em>{{ data }}</em>
      </template>
      <template slot="selected-option" slot-scope="option">{{option.nombre_cliente}}</template>
    </v-select>
  </div>
</template>
<script>
// import { listarPersonasSelect, listarPersonaId } from "@/api/persona.js";

export default {
  props: {
    value: {
      type: 0
    },
    disabled: {
      type: Boolean,
      default: false
    },
    tipo_comprobante: {
      type: String,
      default: ''
    },
  },
  data() {
    return {
      array_clientes: [],
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
      // listarPersonaId(val).then(data => {
      //   this.array_clientes = data;
      //   if (data.length == 1) {
      //     this.seleccionado = data[0].id;
      //     this.lugar = data[0];
      //   }
      //   // loading(false)
      // });
    },
    getDatosPersona(val1) {
      if (val1) {
        this.loading = false;
        this.seleccionado = val1.id;
        this.option = val1;
        this.$emit("input", this.seleccionado);
      } else {
        this.lugar = "";
        this.array_clientes = [];
        this.$emit("input");
      }
    },
    selectPersona(search) {
      let me = this;
      if(!search)
        return;

      let url = '/cliente/select?buscar='+search+'&tp='+this.tipo_comprobante;

      axios.get(url).then(function (response){
          me.array_clientes = response.data;
      })
      .catch(function (error){
          console.log(error);
      });
    },
    reiniciar() {
      this.lugar = "";
      this.array_clientes = [];
      this.$forceUpdate();
    }
  },
  watch: {
    /*
    input: function(newvalue, oldvalue) {
      connsole.log("limpiando");
      if (!newvalue) {
        this.lugar = null;
        this.seleccionado = {};
        this.$forceUpdate();
      }
    }
    */
  }
};
</script>