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
                                    <input type="text" v-model="editable.nombre" class="form-control" placeholder="Nombre o Razón Social...">
                                    <span class="text-error" v-if="errors.nombre">{{errors.nombre}}</span>
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

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Categoria Licencia: </dt></label>
                                    <select class="form-control col-md-12" v-model="editable.categoria_licencia">
                                        <option value="a1">AI</option>
                                        <option value="a2a">AIIA</option>
                                        <option value="a2b">AIIB</option>
                                        <option value="a3a">AIIIA</option>
                                        <option value="a3b">AIIIB</option>
                                        <option value="a3c">AIIIC</option>
                                    </select>
                                    <span class="text-error" v-if="errors.categoria_licencia">{{errors.categoria_licencia}}</span>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarVehiculo()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarVehiculo()">Actualizar</button>
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
            
        }else{
            //Editar
        }
        this.$forceUpdate();
    },
    methods: {
        registrarVehiculo(){
            let me = this;
            this.btn['registrar'] = true;

            axios.post('/conductor/registrar',this.editable).then(function (response){
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
        actualizarVehiculo(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.put('/conductor/actualizar',this.editable).then(function (response){
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
                this.editable.name_document = propiedades.name;
                this.editable.new_document = e.target.result;
            };
        },
        setBusqueda(e){
            if(typeof e === 'object'){
                if(this.editable.tipo_documento == 'ruc'){
                    this.editable.nombre = e.razonSocial;
                    this.editable.direccion = e.direccion;
                }
                else if(this.editable.tipo_documento == 'dni'){
                    this.editable.nombre = e.apellidoPaterno+' '+e.apellidoMaterno+' '+e.nombres;
                    this.editable.direccion = '';
                }
            }else{
                alert("Puede volver a realizar la busqueda");
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