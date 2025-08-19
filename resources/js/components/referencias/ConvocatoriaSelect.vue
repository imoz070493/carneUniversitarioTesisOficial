<template>
    <select class="form-control" v-model="convocatoria_id">
        <!-- <option selected>Seleccione</option> -->
        <option v-for="convocatoria in array_convocatorias" :key="convocatoria.id" :value="convocatoria.id" v-text="convocatoria.nombre"></option>
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
      array_convocatorias: [{
        id: 'todos',
        nombre: 'Todos',
        activo: ''
      }],
      convocatoria_id: '',
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
        let me = this, convocatorias = [];
        axios.get('/convocatoria/select').then(function (response){
            convocatorias = response.data;

            convocatorias.forEach(element => {/* console.log(element) */
              me.array_convocatorias.push(element);              
            });
            me.convocatoria_id = 'todos';
        })
        .catch(function (error){
            console.log(error);
        });
    },
  },
  watch: {
    convocatoria_id: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.convocatoria_id = newvalue;
      }
    },
  }
};
</script>