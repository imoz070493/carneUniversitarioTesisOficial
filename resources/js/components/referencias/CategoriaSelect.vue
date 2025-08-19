<template>
    <select class="form-control" v-model="categoria_id">
        <!-- <option selected>Seleccione</option> -->
        <option v-for="categoria in array_categorias" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre"></option>
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
      array_categorias: [],
      categoria_id: this.value,
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
        axios.get('/categoria/select').then(function (response){
            me.array_categorias = response.data;
        })
        .catch(function (error){
            console.log(error);
        });
    },
  },
  watch: {
    categoria_id: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.categoria_id = newvalue;
      }
    },
  }
};
</script>