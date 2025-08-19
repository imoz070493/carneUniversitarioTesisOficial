<template>
    <select class="form-control" v-model="tipo_comprobante_id">
        <option v-for="tipo_comprobante in array_tipos_comprobantes" :key="tipo_comprobante.id" :value="tipo_comprobante.id" v-text="tipo_comprobante.nombre"></option>
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
      array_tipos_comprobantes: [
        {id: '0', nombre: 'SELECCIONE EL T. COMPROBANTE...'},
        {id: '01', nombre: 'FACTURA'},
        {id: '03', nombre: 'BOLETA'},
      ],
      tipo_comprobante_id: this.value,
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
    //     axios.get('/tipo_comprobante/select').then(function (response){
    //         me.array_tipos_comprobantes = response.data;
    //     })
    //     .catch(function (error){
    //         console.log(error);
    //     });
    // },
  },
  watch: {
    tipo_comprobante_id: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.tipo_comprobante_id = newvalue;
      }
    },
  }
};
</script>