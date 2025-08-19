<template>
    <select class="form-control" v-model="credencial_validada_id">
        <!-- <option selected>Seleccione</option> -->
        <option v-for="credencial_validada in array_credenciales_validadas" :key="credencial_validada.id" :value="credencial_validada.id" v-text="credencial_validada.nombre"></option>
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
      array_credenciales_validadas: [
        {id: 'todos', nombre: 'Todos'},
        {id: 'si', nombre: 'Si'},
        {id: 'no', nombre: 'No'},
        {id: 'no_encontrado', nombre: 'No Encontrado'},
      ],
      credencial_validada_id: this.value,
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
        let me = this, credenciales_validadas = [];
        axios.get('/credencial_validada/select').then(function (response){
            credenciales_validadas = response.data;

            credenciales_validadas.forEach(element => {/* console.log(element) */
              me.array_credenciales_validadas.push(element);              
            });
            me.credencial_validada_id = 'todos';
        })
        .catch(function (error){
            console.log(error);
        });
    },
  },
  watch: {
    credencial_validada_id: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.credencial_validada_id = newvalue;
      }
    },
  }
};
</script>