<template>
    <select class="form-control" v-model="motivo_id">
        <option v-for="tipo_comprobante in array_motivos" :key="tipo_comprobante.id" :value="tipo_comprobante.id" v-text="tipo_comprobante.nombre"></option>
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
    },
    tipo_comprobante: {
      type: String|Number,
      default: ''
    }
  },
  data() {
    return {
      array_motivos_nota_credito: [
        {id:'01', nombre:'ANULACION DE LA OPERACION'},
        {id:'02', nombre:'ANULACION POR ERROR EN EL RUC'},
        {id:'03', nombre:'CORRECION POR ERROR EN LA DESCRIPCION'},
        {id:'04', nombre:'DESCUENTO GLOBAL'},
        {id:'05', nombre:'DESCUENTO POR ITEM'},
        {id:'06', nombre:'DEVOLUCION TOTAL'},
        {id:'07', nombre:'DEVOLUCION POR ITEM'},
        {id:'08', nombre:'BONIFICACION'},
        {id:'09', nombre:'DISMINUCION EN EL VALOR'},
      ],
      array_motivos_nota_debito: [
        {id:'01', nombre:'INTERES POR MORA'},
        {id:'02', nombre:'AUMENTO EN EL VALOR'},
        {id:'03', nombre:'PENALIDADES'},
      ],
      array_motivos: [],
      motivo_id: this.value,
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
    //         me.array_motivos = response.data;
    //     })
    //     .catch(function (error){
    //         console.log(error);
    //     });
    // },
  },
  watch: {
    motivo_id: function(newvalue, oldvalue) {
      let motivo;
      if (newvalue) {
        this.$emit('input',newvalue);
        
        if(this.tipo_comprobante == '07'){
          motivo = this.array_motivos_nota_credito.find(function (element) {
            return element.id == newvalue;
          });
          this.$emit('setMotivo',motivo);
        }else if(this.tipo_comprobante == '08'){
          motivo = this.array_motivos_nota_debito.find(function (element) {
            return element.id == newvalue;
          });
          this.$emit('setMotivo',motivo);
        }else{
          this.array_motivos = [];
        }
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.motivo_id = newvalue;
      }
    },
    tipo_comprobante: function(newvalue, oldvalue) {
      if (newvalue) {
        if(newvalue == '07'){
          this.array_motivos = this.array_motivos_nota_credito;
        }else if(newvalue == '08'){
          this.array_motivos = this.array_motivos_nota_debito;
        }else{
          this.array_motivos = [];
        }
      }
    },
  }
};
</script>