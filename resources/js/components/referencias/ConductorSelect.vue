<template>
  <div>
    <v-select
      v-model="lugar"
      label="data"
      :options="array_conductores"
      placeholder="Buscar Conductor..."
      :clearable="true"
      :disabled="disabled"
      @search="selectConductor"
      @input="getDatosConductor"
    >
      <span slot="no-options">No se encontraron resultados.</span>
      <!-- <template slot="option" slot-scope="option">{{ option.data }}</template> -->
      <template #option="{ data, num_documento}">
        <em>{{ data }} {{num_documento}}</em>
      </template>
      <template slot="selected-option" slot-scope="option">{{option.num_documento}}</template>
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
      array_conductores: [],
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
      //   this.array_conductores = data;
      //   if (data.length == 1) {
      //     this.seleccionado = data[0].id;
      //     this.lugar = data[0];
      //   }
      //   // loading(false)
      // });
    },
    getDatosConductor(val1) {
      if (val1) {
        this.loading = false;
        this.seleccionado = val1.id;
        this.option = val1;
        this.$emit("input", this.seleccionado);
        this.$emit("setArticulo", val1);
      } else {
        this.lugar = "";
        this.array_conductores = [];
        this.$emit("input");
      }
    },
    selectConductor(search) {
      let me = this;
      if(!search)
        return;

      let url = '/departamento/select?buscar='+search;

      axios.get(url).then(function (response){
          me.array_conductores = response.data;
      })
      .catch(function (error){
          console.log(error);
      });
    },
    reiniciar() {
      this.lugar = "";
      this.array_conductores = [];
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