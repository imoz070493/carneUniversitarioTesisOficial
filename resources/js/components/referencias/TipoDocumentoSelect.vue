<template>
    <select class="form-control" v-model="tipo_documento_id">
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
        {id: 'ruc', nombre: 'RUC'},
        {id: 'dni', nombre: 'DNI'},
      ],
      tipo_documento_id: this.value,
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
  },
  watch: {
    tipo_documento_id: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.tipo_documento_id = newvalue;
      }
    },
  }
};
</script>