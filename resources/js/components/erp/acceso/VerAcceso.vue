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
                        <!-- <br> -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Documento: </dt></label><br>
                                    <span v-text="'RUC'"></span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Documento: </dt></label><br>
                                    <span v-if="editable.ruc" v-text="editable.ruc"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Razon Social: </dt></label><br>
                                    <span v-if="editable.razonSocial" v-text="editable.razonSocial"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Nombre Comercial: </dt></label><br>
                                    <span v-if="editable.nombreComercial" v-text="editable.nombreComercial"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Telefonos: </dt></label><br>
                                    <span v-if="editable.telefonos" v-text="JSON.parse(editable.telefonos)"></span>
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
                                    <span v-if="editable.actEconomicas" v-text="JSON.parse(editable.actEconomicas)"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Comprobante de Pago: </dt></label><br>
                                    <span v-if="editable.cpPago" v-text="JSON.parse(editable.cpPago)"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Sistema Eletronica: </dt></label><br>
                                    <span v-if="editable.sistElectronica" v-text="JSON.parse(editable.sistElectronica)"></span>
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
                                    <span v-if="editable.cpeElectronico" v-text="JSON.parse(editable.cpeElectronico)"></span>
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
                                    <span v-if="editable.padrones" v-text="JSON.parse(editable.padrones)"></span>
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
            show: {},
        };
    },
    mounted() {
        if(!this.editable.id){
            //Nuevo
        }else{
            //ver
        }
        this.$forceUpdate();
    },
    methods: {
        cerrarModal(){
            this.$emit('input',{});
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
    @media (max-height: 500px) {
        .modal-xl {
            max-width: 1140px;} }
</style>