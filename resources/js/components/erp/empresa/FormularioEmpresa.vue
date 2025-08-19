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
                                        <option value="ruc">RUC</option>
                                    </select>
                                    <span class="text-error" v-if="errors.tipo_documento">{{errors.tipo_documento}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Documento: *</dt></label>
                                    <documento-busqueda
                                        v-model="editable.ruc" 
                                        :tipo_documento="editable.tipo_documento"
                                        @setBusqueda="setBusqueda($event)"
                                    ></documento-busqueda>
                                    <span class="text-error" v-if="errors.ruc">{{errors.ruc}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Razon Social: </dt></label><br>
                                    <span v-if="editable.razonSocial" v-text="editable.razonSocial"></span>
                                    <span class="text-error" v-if="errors.razonSocial">{{errors.razonSocial}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Nombre Comercial: </dt></label><br>
                                    <span v-if="editable.nombreComercial" v-text="editable.nombreComercial"></span>
                                    <span class="text-error" v-if="errors.nombreComercial">{{errors.nombreComercial}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Telefonos: </dt></label><br>
                                    <span v-if="editable.telefonos" v-text="editable.telefonos"></span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Tipo: </dt></label><br>
                                    <span v-if="editable.tipo" v-text="editable.tipo"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Estado: </dt></label><br>
                                    <span v-if="editable.estado" v-text="editable.estado"></span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Condicion: </dt></label><br>
                                    <span v-if="editable.condicion" v-text="editable.condicion"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Direccion: </dt></label><br>
                                    <span v-if="editable.direccion" v-text="editable.direccion"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Departamento: </dt></label><br>
                                    <span v-if="editable.departamento" v-text="editable.departamento"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Provincia: </dt></label><br>
                                    <span v-if="editable.provincia" v-text="editable.provincia"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Distrito: </dt></label><br>
                                    <span v-if="editable.distrito" v-text="editable.distrito"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Inscripcion: </dt></label><br>
                                    <span v-if="editable.fechaInscripcion" v-text="String(editable.fechaInscripcion).split('-').reverse().join('-')"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Sistema Emision: </dt></label><br>
                                    <span v-if="editable.sistEmsion" v-text="editable.sistEmsion"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Sistema Contabilidad: </dt></label><br>
                                    <span v-if="editable.sistContabilidad" v-text="editable.sistContabilidad"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Actividad Exterior: </dt></label><br>
                                    <span v-if="editable.actExterior" v-text="editable.actExterior"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Actividades Economicas: </dt></label><br>
                                    <span v-if="editable.actEconomicas" v-text="editable.actEconomicas"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Comprobante de Pago: </dt></label><br>
                                    <span v-if="editable.cpPago" v-text="editable.cpPago"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Sistema Eletronica: </dt></label><br>
                                    <span v-if="editable.sistElectronica" v-text="editable.sistElectronica"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Emision FE: </dt></label><br>
                                    <span v-if="editable.fechaEmisorFe" v-text="String(editable.fechaEmisorFe).split('-').reverse().join('-')"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>CPE Electronico: </dt></label><br>
                                    <span v-if="editable.cpeElectronico" v-text="editable.cpeElectronico"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Ple: </dt></label><br>
                                    <span v-if="editable.fechaPle" v-text="String(editable.fechaPle).split('-').reverse().join('-')"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Padrones: </dt></label><br>
                                    <span v-if="editable.padrones" v-text="editable.padrones"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Baja: </dt></label><br>
                                    <span v-if="editable.fechaBaja" v-text="String(editable.fechaBaja).split('-').reverse().join('-')"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Profesion: </dt></label><br>
                                    <span v-if="editable.profesion" v-text="editable.profesion"></span>
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
            tipo_documento: 'ruc'
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

            axios.post('/empresa/registrar',this.editable).then(function (response){
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

            axios.put('/empresa/actualizar',this.editable).then(function (response){
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
                    this.editable.razonSocial = e.razonSocial;
                    this.editable.nombreComercial = e.nombreComercial;
                    this.editable.telefonos = JSON.stringify(e.telefonos);
                    this.editable.tipo = e.tipo;
                    this.editable.estado = e.estado;
                    this.editable.condicion = e.condicion;
                    this.editable.direccion = e.direccion;
                    this.editable.departamento = e.departamento;
                    this.editable.provincia = e.provincia;
                    this.editable.distrito = e.distrito;
                    if(e.fechaInscripcion) this.editable.fechaInscripcion = String(e.fechaInscripcion).substr(0,10);
                    this.editable.sistEmsion = e.sistEmsion;
                    this.editable.sistContabilidad = e.sistContabilidad;
                    this.editable.actExterior = e.actExterior;
                    this.editable.actEconomicas = JSON.stringify(e.actEconomicas);
                    this.editable.cpPago = JSON.stringify(e.cpPago);
                    this.editable.sistElectronica = JSON.stringify(e.sistElectronica);
                    if(e.fechaEmisorFe) this.editable.fechaEmisorFe = String(e.fechaEmisorFe).substr(0,10);
                    this.editable.cpeElectronico = JSON.stringify(e.cpeElectronico);
                    if(e.fechaPle) this.editable.fechaPle = String(e.fechaPle).substr(0,10);
                    this.editable.padrones = JSON.stringify(e.padrones);
                    this.editable.fechaBaja = e.fechaBaja;
                    this.editable.profesion = e.profesion;
                }
                else if(this.editable.tipo_documento == 'dni'){
                    this.editable.nombres = e.nombres;
                    this.editable.apellidoPaterno = e.apellidoPaterno;
                    this.editable.apellidoMaterno = e.apellidoMaterno;
                    this.editable.codVerifica = e.codVerifica;
                }
            }else{
                this.editable.razonSocial = '';
                this.editable.nombreComercial = '';
                this.editable.telefonos = '';
                this.editable.tipo = '';
                this.editable.estado = '';
                this.editable.condicion = '';
                this.editable.direccion = '';
                this.editable.departamento = '';
                this.editable.provincia = '';
                this.editable.distrito = '';
                this.editable.fechaInscripcion = '';
                this.editable.sistEmsion = '';
                this.editable.sistContabilidad = '';
                this.editable.actExterior = '';
                this.editable.actEconomicas = '';
                this.editable.cpPago = '';
                this.editable.sistElectronica = '';
                this.editable.fechaEmisorFe = '';
                this.editable.cpeElectronico = '';
                this.editable.fechaPle = '';
                this.editable.padrones = '';
                this.editable.fechaBaja = '';
                this.editable.profesion = '';
                alert("Persona juridica no encontrada, puede volver a realizar la busqueda");
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