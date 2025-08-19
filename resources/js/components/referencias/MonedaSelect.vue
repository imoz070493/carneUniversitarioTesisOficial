<template>
    <select class="form-control" v-model="moneda_id" :disabled="disabled">
        <!-- <option selected>Seleccione</option> -->
        <option v-for="moneda in array_monedas" :key="moneda.id" :value="moneda.id" v-text="moneda.nombre"></option>
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
      default: true
    }
  },
  data() {
    return {
      array_monedas: [
        {id: 'soles', nombre: 'Soles'},
        {id: 'dolares', nombre: 'Dolares'},
        {id: 'euros', nombre: 'Euros'},
      ],
      moneda_id: this.value,
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
    //     axios.get('/moneda/select').then(function (response){
    //         me.array_monedas = response.data;
    //     })
    //     .catch(function (error){
    //         console.log(error);
    //     });
    // },
  },
  watch: {
    moneda_id: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.moneda_id = newvalue;
      }
    },
  }
};
</script>