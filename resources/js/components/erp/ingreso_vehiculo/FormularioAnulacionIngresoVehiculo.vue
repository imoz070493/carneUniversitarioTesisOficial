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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Motivo:</dt></label>
                                    <textarea type="text" v-model="editable.motivo_anulacion" class="form-control" placeholder="Ingrese un motivo..."></textarea>
                                    <span class="text-error" v-if="errors.motivo_anulacion">{{errors.motivo_anulacion}}</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarIngresoVehiculo()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarIngresoVehiculo()">Registrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>

export default {
    components: {
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
            },
            nuevo: {},
            var_config_vehiculo: {}
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
        registrarIngresoVehiculo(){
            let me = this;
            this.btn['registrar'] = true;

            axios.post('/ingreso_vehiculo/registrar',this.editable).then(function (response){
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
        actualizarIngresoVehiculo(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.put('/ingreso_vehiculo/actualizar_anulacion',this.editable).then(function (response){
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
        crearVehiculo(){
            this.nuevo = {
                _estado: 'creando',
            };
            this.var_config_vehiculo = {
                title: 'Registrar Vehiculo',
                tipo_accion: 'registrar'
            };
            
        },
        setVehiculo(e){
            this.editable.vehiculo_id = e.id;
            this.$forceUpdate();
        },
        setBusqueda(e){
            console.log(e);
            if(typeof e === 'object'){
                if(this.editable.tipo_documento == 'ruc'){
                    this.editable.conductor_id = e.id;
                    this.editable.nombre_conductor = e.razonSocial;
                    // this.editable.direccion = e.direccion;
                }
                else if(this.editable.tipo_documento == 'dni'){
                    this.editable.conductor_id = e.id;
                    this.editable.nombre_conductor = e.nombre;
                    // this.editable.direccion = '';
                }
            }else{
                alert("No se encontro este documento");
                this.editable.conductor_id = null;
                this.editable.nombre_conductor = '';
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