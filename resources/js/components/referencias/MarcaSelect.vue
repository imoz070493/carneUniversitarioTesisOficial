<template>
    <select class="form-control" v-model="marca_id">
        <!-- <option selected>Seleccione</option> -->
        <option v-for="marca in array_marcas" :key="marca.id" :value="marca.id" v-text="marca.nombre"></option>
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
      array_marcas: [],
      marca_id: this.value,
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
        axios.get('/marca/select').then(function (response){
            me.array_marcas = response.data;
        })
        .catch(function (error){
            console.log(error);
        });
    },
  },
  watch: {
    marca_id: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.marca_id = newvalue;
      }
    },
  }
};
</script>