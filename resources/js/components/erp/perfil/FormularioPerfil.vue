<template>
    <div class="modal fade mostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

        <div class="modal-dialog modal-primary modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="var_config.title"></h4>
                    <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style='max-height:450px;overflow-y:auto;overflow-x:hidden;'>
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <!-- {{editable}} -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Razon Social: *</dt></label>
                                    <input type="text" v-model="editable.razon_social" class="form-control" placeholder="Razon Social...">
                                    <span class="text-error" v-if="errors.razon_social">{{errors.razon_social}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Nombre Comercial: *</dt></label>
                                    <input type="text" v-model="editable.nombre_comercial" class="form-control" placeholder="Nombre Comercial...">
                                    <span class="text-error" v-if="errors.nombre_comercial">{{errors.nombre_comercial}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>RUC: *</dt></label>
                                    <input type="text" v-model="editable.ruc" class="form-control" placeholder="RUC...">
                                    <span class="text-error" v-if="errors.ruc">{{errors.ruc}}</span>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Direccion: *</dt></label>
                                    <input type="text" v-model="editable.direccion" class="form-control" placeholder="Direccion...">
                                    <span class="text-error" v-if="errors.direccion">{{errors.direccion}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Departamento: *</dt></label>
                                    <input type="text" v-model="editable.departamento" class="form-control" placeholder="Departamento...">
                                    <span class="text-error" v-if="errors.departamento">{{errors.departamento}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Provincia: *</dt></label>
                                    <input type="text" v-model="editable.provincia" class="form-control" placeholder="Provincia...">
                                    <span class="text-error" v-if="errors.provincia">{{errors.provincia}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Distrito: *</dt></label>
                                    <input type="text" v-model="editable.distrito" class="form-control" placeholder="Distrito...">
                                    <span class="text-error" v-if="errors.distrito">{{errors.distrito}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>COD. PAIS: *</dt></label>
                                    <input type="text" v-model="editable.cod_pais" class="form-control" placeholder="Cod. Pais...">
                                    <span class="text-error" v-if="errors.cod_pais">{{errors.cod_pais}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Ubigeo: *</dt></label>
                                    <input type="text" v-model="editable.ubigeo" class="form-control" placeholder="Ubigeo...">
                                    <span class="text-error" v-if="errors.ubigeo">{{errors.ubigeo}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Telefono: *</dt></label>
                                    <input type="text" v-model="editable.telefono" class="form-control" placeholder="Telefono...">
                                    <span class="text-error" v-if="errors.telefono">{{errors.telefono}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Usuario SOL: *</dt></label>
                                    <input type="text" v-model="editable.usuario" class="form-control" placeholder="Usuario SOL...">
                                    <span class="text-error" v-if="errors.usuario">{{errors.usuario}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Clave SOL: *</dt></label>
                                    <input type="text" v-model="editable.clave" class="form-control" placeholder="Clave SOL...">
                                    <span class="text-error" v-if="errors.clave">{{errors.clave}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Contraseña Cert.: *</dt></label>
                                    <input type="text" v-model="editable.firma" class="form-control" placeholder="Contraseña Cert...">
                                    <span class="text-error" v-if="errors.firma">{{errors.firma}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Correo: </dt></label>
                                    <input type="text" v-model="editable.descripcion" class="form-control" placeholder="Descripcion...">
                                    <span class="text-error" v-if="errors.descripcion">{{errors.descripcion}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Estado: </dt></label><br>
                                    <input type="checkbox" v-model="editable.estado">
                                    <span class="text-error" v-if="errors.estado">{{errors.estado}}</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Logotipo: *</dt></label>
                                    <input type="file" @change="imageChanged" class="form-control" accept="jpeg, jpe, png">
                                    <span class="text-error" v-if="errors.otro_imagen">{{errors.otro_imagen}}</span>
                                </div>
                            </div>
                        </div>

                        <div v-if="editable.id" class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Logotipo: *</dt></label>
                                    <img v-if="editable.imagen" class="form-control" v-bind:src="'/images/'+editable.imagen"/>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarPerfil()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarPerfil()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>

export default {
  props: {
    value: {
      type: Object,
      default: {}
    },
    var_config: {
      type: Object,
      default: {}
    },
  },
  data() {
    return {
      editable: Object.assign({},this.value),
      errors: [],
      btn: {
          registrar: false,
          actualizar: false,
      }
    };
  },
  mounted() {
      if(!this.editable.id){
          //Nuevo
          this.editable.estado = 'activo';
      }else{
          //Editar
          if(this.editable.estado=='activo')this.editable.estado = true;
          if(this.editable.estado=='inactivo')this.editable.estado = false;
      }
  },
  methods: {
        registrarPerfil(){
            let me = this;
            this.btn['registrar'] = true;

            if(this.editable.estado)this.editable.estado = 'activo';
            else this.editable.estado = 'inactivo';

            axios.post('/perfil/registrar',this.editable).then(function (response){
                me.$emit('guardado');
                me.cerrarModal();
            })
            .catch(error => {
                me.btn['registrar'] = false;

                if(error.request.response){
                    let response = JSON.parse(error.request.response);
                    console.log(response);
                    me.errors = response.errors;
                }
            });
        },
        actualizarPerfil(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.put('/perfil/actualizar',this.editable).then(function (response){
                me.$emit('guardado');
                me.cerrarModal();
            })
            .catch(error => {
                me.btn['actualizar'] = false;

                if(error.request.response){
                let response = JSON.parse(error.request.response);
                console.log(response);
                me.errors = response.errors;
                }
            });
        },
        cerrarModal(){
            this.$emit('input',{});
        },
        imageChanged(e) {
            console.log(e.target.files[0]);
            let propiedades = e.target.files[0];

            var fileReader = new FileReader();

            fileReader.readAsDataURL(e.target.files[0]);
            fileReader.onload = e => {
                this.editable.name_image = propiedades.name;
                this.editable.new_imagen = e.target.result;
            };
        },
        cambiarValorItem(e){
            console.log(e);
        }
  }
};
</script>
<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>