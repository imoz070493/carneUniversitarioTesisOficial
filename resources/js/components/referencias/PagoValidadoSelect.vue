<template>
    <select class="form-control" v-model="pago_validado_id">
        <!-- <option selected>Seleccione</option> -->
        <option v-for="pago_validado in array_pagos_validadas" :key="pago_validado.id" :value="pago_validado.id" v-text="pago_validado.nombre"></option>
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
      array_pagos_validadas: [
        {id: 'todos', nombre: 'Todos'},
        {id: 'si', nombre: 'Si'},
        {id: 'no', nombre: 'No'},
      ],
      pago_validado_id: this.value,
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
    buscar() {
        let me = this, pagos_validadas = [];
        axios.get('/pago_validado/select').then(function (response){
            pagos_validadas = response.data;

            pagos_validadas.forEach(element => {/* console.log(element) */
              me.array_pagos_validadas.push(element);              
            });
            me.pago_validado_id = 'todos';
        })
        .catch(function (error){
            console.log(error);
        });
    },
  },
  watch: {
    pago_validado_id: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.pago_validado_id = newvalue;
      }
    },
  }
};
</script>