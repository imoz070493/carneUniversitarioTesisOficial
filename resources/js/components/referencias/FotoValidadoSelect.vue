<template>
    <select class="form-control" v-model="foto_validada_id">
        <!-- <option selected>Seleccione</option> -->
        <option v-for="foto_validada in array_fotos_validadas" :key="foto_validada.id" :value="foto_validada.id" v-text="foto_validada.nombre"></option>
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
      array_fotos_validadas: [
        {id: 'todos', nombre: 'Todos'},
        {id: 'si', nombre: 'Si'},
        {id: 'no', nombre: 'No'},
      ],
      foto_validada_id: this.value,
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
        let me = this, fotos_validadas = [];
        axios.get('/foto_validada/select').then(function (response){
            fotos_validadas = response.data;

            fotos_validadas.forEach(element => {/* console.log(element) */
              me.array_fotos_validadas.push(element);              
            });
            me.foto_validada_id = 'todos';
        })
        .catch(function (error){
            console.log(error);
        });
    },
  },
  watch: {
    foto_validada_id: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.foto_validada_id = newvalue;
      }
    },
  }
};
</script>