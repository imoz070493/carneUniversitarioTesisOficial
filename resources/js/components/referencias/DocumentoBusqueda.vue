<template>
    <div class="row"> 
      <!-- <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
        <input type="text" v-model="num_documento" @keyup.enter="buscar()" class="form-control" placeholder="Numero Documento...">
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <button @click="buscar()" type="button" class="btn btn-info form-control"><i class="fa fa-search"></i></button>
      </div> -->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group mb-3">
        <input type="text" v-model="num_documento" @keyup.enter="buscar()" class="form-control rounded-0" placeholder="N° Documento...">
        <span class="input-group-append">
          <button type="button" @click="buscar()" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
        </span>
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
      num_documento: this.value,
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
        let me = this;
        let url = '/documento/busqueda?tp='+this.tipo_documento+'&n='+this.num_documento;

        if(this.tipo_documento=='dni'){
          if(this.num_documento.length != 8){
            alert('El DNI debe contener 8 caracteres');
            return;
          }
        }
        else if(this.tipo_documento=='ruc'){
          if(this.num_documento.length != 11){
            alert('El DNI debe contener 11 caracteres');
            return;
          }
        }

        axios.get(url).then(function (response){
          // console.log(response.data)
          me.$emit('setBusqueda',response.data.data);
            // me.array_tipos_documentos = response.data;
        })
        .catch(function (error){
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
  }
};
</script>