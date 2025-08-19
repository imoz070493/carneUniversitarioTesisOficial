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
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Vehiculo: *</dt></label>
                                    <vehiculo-select v-model="editable.vehiculo_id"></vehiculo-select>
                                    <span class="text-error" v-if="errors.vehiculo_id">{{errors.vehiculo_id}}</span>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Registrar Vehiculo: </dt></label><br>
                                    <button @click="crearVehiculo()" type="button" class="btn btn-info">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Documento: *</dt></label>
                                    <documento-busqueda
                                        v-if="!editable.id"
                                        v-model="editable.num_documento" 
                                        :tipo_documento="editable.tipo_documento"
                                        @setBusqueda="setBusqueda($event)"
                                    ></documento-busqueda>
                                    <input type="text" v-else v-model="editable.num_documento" class="form-control" placeholder="N° Documento...">
                                    <span class="text-error" v-if="errors.conductor_id">{{errors.conductor_id}}</span>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Conductor *:</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.nombre_conductor" 
                                        class="form-control" 
                                        placeholder="Nombre Conductor..."
                                        list="listaformatosimagen"
                                    >
                                    <ul class="ul-conductor" v-show="show.list_conductor">
                                        <li v-for="item in array_conductores" v-bind:key="item.id" @click="setConductor(item)" class="ul-conductor-li ul-conductor-li-active">
                                            <span>{{item.nombre}}</span>
                                        </li>
                                    </ul>
                                    <span class="text-error" v-if="errors.nombre_conductor">{{errors.nombre_conductor}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Origen:</dt></label>
                                    <departamento-select v-model="editable.origen_id"></departamento-select>
                                    <span class="text-error" v-if="errors.origen_id">{{errors.origen_id}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Destino:</dt></label>
                                    <departamento-select v-model="editable.destino_id"></departamento-select>
                                    <span class="text-error" v-if="errors.destino_id">{{errors.destino_id}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Observaciones:</dt></label>
                                    <textarea type="text" v-model="editable.observaciones" class="form-control" placeholder="Observaciones..."></textarea>
                                    <span class="text-error" v-if="errors.observaciones">{{errors.observaciones}}</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarIngresoVehiculo()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarIngresoVehiculo()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

        <!-- Nuevo -->
        <v-formulario-vehiculo 
            v-if="nuevo._estado=='creando'" 
            v-model="nuevo"
            ref="cmp_crear_vehiculo"
            :var_config="var_config_vehiculo"
            @guardado="setVehiculo"
        ></v-formulario-vehiculo>
    </div>
</template>
<script>

const VehiculoSelect = () => import("@/components/referencias/VehiculoSelect");
const DepartamentoSelect = () => import("@/components/referencias/DepartamentoSelect");
const DocumentoBusqueda = () => import("@/components/referencias/DocumentoBusqueda");

const FormularioVehiculo = () => import("@/components/erp/vehiculo/FormularioVehiculoEnlazado");

export default {
    components: {
        "vehiculo-select": VehiculoSelect,
        "departamento-select": DepartamentoSelect,
        "documento-busqueda": DocumentoBusqueda,
        "v-formulario-vehiculo": FormularioVehiculo,
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
            show: {},
            btn: {
                registrar: false,
                actualizar: false,
            },
            nuevo: {},
            var_config_vehiculo: {},
            array_conductores: [],
            array_datalist: []
        };
    },
    mounted() {
        this.editable.tipo_documento = 'dni';
        this.show['list_conductor'] = false;
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

            axios.put('/ingreso_vehiculo/actualizar',this.editable).then(function (response){
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
        },
        conductorBusqueda(q) {
            let me = this;
            let url = '/conductor/busqueda?q='+q;

            axios.get(url).then(function (response){
                // console.log(response.data.data)
                me.array_conductores = response.data.data;
                me.array_datalist = [];
                if(me.array_conductores.length > 0){
                    me.show['list_conductor'] = true;
                    me.array_conductores.forEach(function(element){
                        me.array_datalist.push(element.nombre);
                    });
                }
                me.$forceUpdate();
            })
            .catch(function (error){
                console.log(error);
            });
        },
        setConductor(e){
            this.editable.nombre_conductor = e.nombre;
            this.editable.num_documento = e.num_documento;
            this.editable.conductor_id = e.id;

            this.show['list_conductor'] = false;

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
        },
        'editable.nombre_conductor': function(newval, olval){
            if(newval){
                // console.log(newval)
                let conductor_obj = this.array_conductores.find(e => e.nombre==newval);
                if(!conductor_obj){
                    this.conductorBusqueda(newval);
                }

                this.$forceUpdate();
            }
        },
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
    .ul-conductor{
        padding: 0px;
        list-style-type: none;
        border-color: rgb(110 204 79);
        position: absolute;
        top: 64px;
        left: 15px;
        border: 1px solid rgb(221, 221, 221);
        border-top: none;
        background: white;
        z-index: 100;
        max-height: 300px;
        overflow-y: auto;
        box-shadow: 0 4px 5px rgb(0 0 0 / 15%);
        color: #333;
        list-style: none;
        width: 94%;
    }
    .ul-conductor-li{
        border-bottom: 1px solid #ccc;
        padding: 8px 15px;
        font-size: 14px;
        line-height: 20px;
        width: 100%;
    }
    .ul-conductor-li-active:hover{
        background:#2B82C9;
        color: #fff;
        cursor: pointer;
    }
    @media (max-height: 500px) {
        .modal-xl {
            max-width: 1140px;} }
</style>