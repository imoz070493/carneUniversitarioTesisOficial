<template>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <h6>Estudiante no registró matricula en el periodo presente, por favor comuníquese con la Oficina de Registros Académicos para su verificación.</h6>
        </div>
    </div>
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
    tipo_documento: {
      type: String,
      default: 'ruc'
    }
  },
  data() {
    return {
        editable: Object.assign({},this.value),
        num_documento: this.value,
        lock: {},
        errors: {},
        show: {},
        text: {},
        btn: {},
        array_convocatorias: []
    };
  },
  mounted() {
    // if (this.value) {
    //   console.log("buscar");
    //   this.buscar(this.value);
    // }
    // this.buscar();

    let me = this;

    me.listarConvocatoriasEstudiante();
    me.$forceUpdate();
  },
  methods: {
    listarConvocatoriasEstudiante() {
        let me = this;
        let url = '/matricula_estudiante/busqueda/convocatorias';

        axios.get(url).then(function (response){
            // console.log(response.data)
            me.array_convocatorias = response.data;

            me.$forceUpdate();
        }).catch(function (error){
            console.log(error);
        });

    },
  },
  watch: {
    num_documento: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.num_documento = newvalue;
      }
    },
    "editable._usar_foto_anterior": function(newvalue, oldvalue) {
        if (newvalue) {
            this.lock._new_document = true;
        }else{
            this.lock._new_document = false;
        }
        this.$forceUpdate();
    },
  }
};
</script>
<style scoped>
.hide-options {
  display: none;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
.show-options {
  display: flex;
  /* padding: 0 18px; */
  background-color: white;
  /* max-height: 0; */
  overflow: hidden;
  margin: -10px 0 0 -10px;
  transition: max-height 0.2s ease-out;
}

.text-error{
    color: red !important;
    font-weight: bold;
}

.cropper-container {
  width: 350px;   /* Ajusta el tamaño del contenedor */
  height: 500px;  /* Ajusta la altura del recorte */
  overflow: hidden;
  border: 1px solid #ddd;
}

.cropper-image {
  max-width: 100%;
  max-height: 100%;
  display: block;
}


/*.cr-boundary::before,
.cr-boundary::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 1px;
    background: rgba(255, 255, 255, 0.6);
    border-top: 1px dashed white;
}

.cr-boundary::before {
    top: 33.33%;
}

.cr-boundary::after {
    top: 66.66%;
}

.cr-viewport::before,
.cr-viewport::after {
    content: "";
    position: absolute;
    height: 100%;
    width: 1px;
    background: rgba(255, 255, 255, 0.6);
    border-left: 1px dashed white;
}

.cr-viewport::before {
    left: 33.33%;
}

.cr-viewport::after {
    left: 66.66%;
}*/
</style>