<template>
    <div class="modal fade mostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

        <div class="modal-dialog modal-primary modal-lg">
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
                                    <label><dt>N° Placa: *</dt></label>
                                    <input type="text" v-model="editable.numero_placa" class="form-control" placeholder="N° Placa..." maxlength="6">
                                    <span class="text-error" v-if="errors.numero_placa">{{errors.numero_placa}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Serie:</dt></label>
                                    <input type="text" v-model="editable.numero_serie" class="form-control" placeholder="N° Serie...">
                                    <span class="text-error" v-if="errors.numero_serie">{{errors.numero_serie}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° VIN:</dt></label>
                                    <input type="text" v-model="editable.numero_vin" class="form-control" placeholder="N° VIN...">
                                    <span class="text-error" v-if="errors.numero_vin">{{errors.numero_vin}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Motor:</dt></label>
                                    <input type="text" v-model="editable.numero_motor" class="form-control" placeholder="N° Motor...">
                                    <span class="text-error" v-if="errors.numero_motor">{{errors.numero_motor}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Color:*</dt></label>
                                    <input type="text" v-model="editable.color" class="form-control" placeholder="Color...">
                                    <span class="text-error" v-if="errors.color">{{errors.color}}</span>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Marca:*</dt></label>
                                    <input type="text" v-model="editable.marca" class="form-control" placeholder="Marca...">
                                    <span class="text-error" v-if="errors.marca">{{errors.marca}}</span>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Modelo:*</dt></label>
                                    <input type="text" v-model="editable.modelo" class="form-control" placeholder="Modelo...">
                                    <span class="text-error" v-if="errors.modelo">{{errors.modelo}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Placa Vigente:*</dt></label>
                                    <input type="text" v-model="editable.placa_vigente" class="form-control" placeholder="N° Placa Vigente...">
                                    <span class="text-error" v-if="errors.placa_vigente">{{errors.placa_vigente}}</span>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Placa Anterior:</dt></label>
                                    <input type="text" v-model="editable.placa_anterior" class="form-control" placeholder="N° Placa Anterior...">
                                    <span class="text-error" v-if="errors.placa_anterior">{{errors.placa_anterior}}</span>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Estado:</dt></label>
                                    <input type="text" v-model="editable.estado_vehiculo" class="form-control" placeholder="Estado...">
                                    <span class="text-error" v-if="errors.estado_vehiculo">{{errors.estado_vehiculo}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Anotaciones:</dt></label>
                                    <textarea type="text" v-model="editable.observaciones" class="form-control" placeholder="Anotaciones..."></textarea>
                                    <span class="text-error" v-if="errors.observaciones">{{errors.observaciones}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Sede Registral:</dt></label>
                                    <sede-registral-select v-model="editable.sede_registral_id"></sede-registral-select>
                                    <span class="text-error" v-if="errors.sede_registral_id">{{errors.sede_registral_id}}</span>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Propietario:</dt></label>
                                    <input type="text" v-model="editable.propietario" class="form-control" placeholder="Propietario...">
                                    <span class="text-error" v-if="errors.propietario">{{errors.propietario}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Tarjeta de Propiedad: </dt></label>
                                    <input type="file" @change="imageChanged" class="form-control" accept=".pdf">
                                    <span class="text-error" v-if="errors.otro_imagen">{{errors.otro_imagen}}</span>
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

const SedeRegistralSelect = () => import("@/components/referencias/SedeRegistralSelect");

export default {
    components: {
        "sede-registral-select": SedeRegistralSelect,
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
            
        }else{
            //Editar
        }
        this.$forceUpdate();
    },
    methods: {
        registrarVehiculo(){
            let me = this;
            this.btn['registrar'] = true;

            axios.post('/vehiculo/registrar',this.editable).then(function (response){
                me.$emit('guardado', response.data);
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

            axios.put('/vehiculo/actualizar',this.editable).then(function (response){
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