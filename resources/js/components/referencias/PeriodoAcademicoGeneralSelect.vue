<template>
    <select class="form-control" v-model="periodo_academico_id" :disabled="disabled">
        <!-- <option selected>Seleccione</option> -->
        <option v-for="periodo_academico in array_periodos_academicos" :key="periodo_academico.id" :value="periodo_academico.id" v-text="periodo_academico.nombre"></option>
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
      array_periodos_academicos: [],
      periodo_academico_id: this.value,
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
        axios.get('/periodo_academico/general/select').then(function (response){
            me.array_periodos_academicos = response.data;

            me.periodo_academico_id = me.array_periodos_academicos.find((element) => element.estado == 'Activo').id;
        })
        .catch(function (error){
            console.log(error);
        });
    },
    reiniciar() {
      this.periodo_academico_id = "";
      this.$forceUpdate();
    },
    setValue(newvalue){
      let periodo;
      periodo = this.array_periodos_academicos.find(e=>e.id==newvalue);
      // console.log('periodo',periodo);
      this.$emit('setValue',periodo);

    }
  },
  watch: {
    periodo_academico_id: function(newvalue, oldvalue) {
      if (newvalue || newvalue == "") {
        this.$emit('input',newvalue);
        this.setValue(newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.periodo_academico_id = newvalue;
      }
    },
  }
};
</script>