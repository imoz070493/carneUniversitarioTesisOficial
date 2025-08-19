<template>
    <select class="form-control" v-model="unidad_medida_id">
        <!-- <option selected>Seleccione</option> -->
        <option v-for="unidad_medidad in array_unidades_medidas" :key="unidad_medidad.id" :value="unidad_medidad.id" v-text="unidad_medidad.titulo"></option>
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
      array_unidades_medidas: [],
      unidad_medida_id: this.value,
    };
  },
  mounted() {
    // if (this.value) {
    //   console.log("buscar");
    //   this.buscar(this.value);
    // }
    this.buscar();
  },
  methods: {
    buscar() {
        let me = this;
        axios.get('/unidad_medida/select').then(function (response){
            me.array_unidades_medidas = response.data;
        })
        .catch(function (error){
            console.log(error);
        });
    },
  },
  watch: {
    unidad_medida_id: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.unidad_medida_id = newvalue;
      }
    },
  }
};
</script>