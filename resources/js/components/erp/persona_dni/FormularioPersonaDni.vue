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
                        {{editable}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Documento: *</dt></label>
                                    <select class="form-control col-md-12" v-model="editable.tipo_documento">
                                        <option value="dni">DNI</option>
                                    </select>
                                    <span class="text-error" v-if="errors.tipo_documento">{{errors.tipo_documento}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Documento: *</dt></label>
                                    <documento-busqueda
                                        v-model="editable.dni" 
                                        :tipo_documento="editable.tipo_documento"
                                        @setBusqueda="setBusqueda($event)"
                                    ></documento-busqueda>
                                    <span class="text-error" v-if="errors.dni">{{errors.dni}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Nombres: *</dt></label>
                                    <input type="text" v-model="editable.nombres" class="form-control" placeholder="Nombres...">
                                    <span class="text-error" v-if="errors.nombres">{{errors.nombres}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Apellido Paterno: *</dt></label>
                                    <input type="text" v-model="editable.apellidoPaterno" class="form-control" placeholder="Apellido Paterno...">
                                    <span class="text-error" v-if="errors.apellidoPaterno">{{errors.apellidoPaterno}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Apellido Materno: *</dt></label>
                                    <input type="text" v-model="editable.apellidoMaterno" class="form-control" placeholder="Apellido Materno...">
                                    <span class="text-error" v-if="errors.apellidoMaterno">{{errors.apellidoMaterno}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>CodVerifica: </dt></label>
                                    <input type="text" v-model="editable.codVerifica" class="form-control" placeholder="Cod Verifica...">
                                    <span class="text-error" v-if="errors.codVerifica">{{errors.codVerifica}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Imagen:</dt></label>
                                    <input type="file" @change="imageChanged" class="form-control" accept="jpeg, jpe, png">
                                    <span class="text-error" v-if="errors.otro_imagen">{{errors.otro_imagen}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Imagen:</dt></label>
                                    <img id="image" class="form-control"/>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarPersonaDni()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarPersonaDni()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>

const DocumentoBusqueda = () => import("@/components/referencias/DocumentoBusqueda");

export default {
    components: {
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
            tipo_documento: 'dni'
        },this.value),
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
            this.editable.origen = 'local';
        }else{
            //Editar
        }
        this.$forceUpdate();
    },
    methods: {
        registrarPersonaDni(){
            let me = this;
            this.btn['registrar'] = true;

            axios.post('/persona_dni/registrar',this.editable).then(function (response){
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
        actualizarPersonaDni(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.put('/persona_dni/actualizar',this.editable).then(function (response){
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
            this.$emit('cerrado');
            this.$emit('input',{});
        },
        imageChanged(e) {
            console.log(e.target.files[0]);
            let propiedades = e.target.files[0];

            var fileReader = new FileReader();
            var imgtag = document.getElementById("image");

            fileReader.readAsDataURL(e.target.files[0]);
            fileReader.onload = e => {
                this.editable.name_document = propiedades.name;
                this.editable.new_document = e.target.result;
                imgtag.src = e.target.result;
            };

            reader.onload = function(event) {
                imgtag.src = event.target.result;
            };
        },
        setBusqueda(e){
            if(typeof e === 'object'){
                if(this.editable.tipo_documento == 'ruc'){
                    this.editable.nombre = e.razonSocial;
                    this.editable.direccion = e.direccion;
                }
                else if(this.editable.tipo_documento == 'dni'){
                    this.editable.nombres = e.nombres;
                    this.editable.apellidoPaterno = e.apellidoPaterno;
                    this.editable.apellidoMaterno = e.apellidoMaterno;
                    this.editable.codVerifica = e.codVerifica;
                }
            }else{
                this.editable.nombres = '';
                this.editable.apellidoPaterno = '';
                this.editable.apellidoMaterno = '';
                this.editable.codVerifica = '';
                alert("Persona no encontrada, puede volver a realizar la busqueda");
            }

            this.$forceUpdate();
        }
    },
    watch:{
        'editable.numero_placa': function(newval, olval){
            if(newval){
                this.editable.numero_placa = String(newval).toUpperCase();
                this.editable.placa_vigente = newval;
                this.$forceUpdate();
            }
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
    @media (max-height: 500px) {
        .modal-xl {
            max-width: 1140px;} }
</style>