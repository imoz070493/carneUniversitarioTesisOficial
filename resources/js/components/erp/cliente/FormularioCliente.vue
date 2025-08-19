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
                                    <label><dt>Documento: *</dt></label>
                                    <tipo-documento-select v-model="editable.tipo_documento"></tipo-documento-select>
                                    <span class="text-error" v-if="errors.tipo_documento">{{errors.tipo_documento}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Documento: *</dt></label>
                                    <documento-busqueda
                                        v-model="editable.num_documento" 
                                        :tipo_documento="editable.tipo_documento"
                                        @setBusqueda="setBusqueda($event)"
                                    ></documento-busqueda>
                                    <span class="text-error" v-if="errors.num_documento">{{errors.num_documento}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Nombre o Razón Social: *</dt></label>
                                    <input type="text" v-model="editable.nombre_completo" class="form-control" placeholder="Nombre o Razón Social...">
                                    <span class="text-error" v-if="errors.nombre_completo">{{errors.nombre_completo}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Direccion: </dt></label>
                                    <input type="text" v-model="editable.direccion" class="form-control" placeholder="Direccion...">
                                    <span class="text-error" v-if="errors.direccion">{{errors.direccion}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Telefono: </dt></label>
                                    <input type="text" v-model="editable.telefono" class="form-control" placeholder="Descripcion...">
                                    <span class="text-error" v-if="errors.telefono">{{errors.telefono}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Email: </dt></label>
                                    <input type="text" v-model="editable.email" class="form-control" placeholder="Descripcion...">
                                    <span class="text-error" v-if="errors.email">{{errors.email}}</span>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarCliente()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarCliente()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>

const TipoDocumentoSelect = () => import("@/components/referencias/TipoDocumentoSelect");
const DocumentoBusqueda = () => import("@/components/referencias/DocumentoBusqueda");

export default {
    components: {
        "tipo-documento-select": TipoDocumentoSelect,
        "documento-busqueda": DocumentoBusqueda,
    },
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
            editable: Object.assign({
                tipo_documento : '',
            },this.value),
            errors: [],
            btn: {
                registrar: false,
                actualizar: false,
            },
        };
    },
    mounted() {
        if(!this.editable.id){
            //Nuevo
            this.editable.estado = 'activo';
            this.editable.tipo_documento = 'ruc';
        }else{
            //Editar
            if(this.editable.tipo_documento == 'ruc'){
                this.editable.nombre_completo = this.editable.razon_social;
            }
            else if(this.editable.tipo_documento == 'dni'){
                this.editable.nombre_completo = this.editable.nombre;
            }
        }
        this.$forceUpdate();
    },
    methods: {
        registrarCliente(){
            let me = this;
            this.btn['registrar'] = true;

            axios.post('/cliente/registrar',this.editable).then(function (response){
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
        actualizarCliente(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.put('/cliente/actualizar',this.editable).then(function (response){
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
        setBusqueda(e){
            if(typeof e === 'object'){
                if(this.editable.tipo_documento == 'ruc'){
                    this.editable.nombre_completo = e.razonSocial;
                    this.editable.direccion = e.direccion;
                }
                else if(this.editable.tipo_documento == 'dni'){
                    this.editable.nombre_completo = e.apellidoPaterno+' '+e.apellidoMaterno+' '+e.nombres;
                    this.editable.direccion = '';
                }
            }else{
                alert("Puede volver a realizar la busqueda");
            }

            this.$forceUpdate();
        }
    },
    watch: {
        
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
    @media (max-height: 500px) {
        .modal-xl {
            max-width: 1140px;} }
</style>