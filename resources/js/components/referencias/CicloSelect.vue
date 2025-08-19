<template>
    <select class="form-control" v-model="ciclo_id" :disabled="disabled">
        <!-- <option selected>Seleccione</option> -->
        <option v-for="tipo_documento in array_tipos_documentos" :key="tipo_documento.id" :value="tipo_documento.id" v-text="tipo_documento.nombre"></option>
    </select>
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
      array_tipos_documentos: [
        {id: 'I', nombre: 'I'},
        {id: 'II', nombre: 'II'},
        {id: 'III', nombre: 'III'},
        {id: 'IV', nombre: 'IV'},
        {id: 'V', nombre: 'V'},
        {id: 'VI', nombre: 'VI'},
        {id: 'VII', nombre: 'VII'},
        {id: 'VIII', nombre: 'VIII'},
        {id: 'IX', nombre: 'IX'},
        {id: 'X', nombre: 'X'},
      ],
      ciclo_id: this.value,
    };
  },
  mounted() {
    // if (this.value) {
    //   console.log("buscar");
    //   this.buscar(this.value);
    // }
    // this.buscar();
  },
  methods: {
    // buscar() {
    //     let me = this;
    //     axios.get('/tipo_documento/select').then(function (response){
    //         me.array_tipos_documentos = response.data;
    //     })
    //     .catch(function (error){
    //         console.log(error);
    //     });
    // },
    reiniciar() {
      this.ciclo_id = "";
      this.$forceUpdate();
    }
  },
  watch: {
    ciclo_id: function(newvalue, oldvalue) {
      if (newvalue || newvalue=="") {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.ciclo_id = newvalue;
      }
    },
  }
};
</script>