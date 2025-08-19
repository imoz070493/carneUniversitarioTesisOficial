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
                                    <label><dt>Emisor: </dt></label><br>
                                    <span v-if="editable.numRuc" v-text="editable.numRuc"></span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Tipo Comprobante: </dt></label><br>
                                    <span v-if="editable.codComp" v-text="getNombreTipoComprobante(editable.codComp)"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Serie: </dt></label><br>
                                    <span v-if="editable.numeroSerie" v-text="editable.numeroSerie"></span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Correlativo: </dt></label><br>
                                    <span v-if="editable.numero" v-text="editable.numero"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Emision: </dt></label><br>
                                    <span v-if="editable.fechaEmision" v-text="String(editable.fechaEmision).split('/').join('-')"></span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Monto: </dt></label><br>
                                    <span v-if="editable.monto" v-text="parseFloat(editable.monto).toFixed(2)"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Origen: </dt></label><br>
                                    <span v-if="editable.origen" v-text="String(editable.origen).split('/').join('-')"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Estado Comprobante: </dt></label><br>
                                    <span v-if="getValueEstadoCp(editable.data)=='1'" class="badge badge-success">ACEPTADO</span>
                                    <span v-if="getValueEstadoCp(editable.data)=='0'" class="badge badge-danger">NO EXISTE</span>
                                    <span v-if="getValueEstadoCp(editable.data)=='2'" class="badge badge-success">ANULADO</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Estado Ruc: </dt></label><br>
                                    <span v-if="getValueEstadoRuc(editable.data)=='00'" class="badge badge-success">ACTIVO</span>
                                    <span v-if="getValueEstadoRuc(editable.data)=='01'" class="badge badge-danger">BAJA PROVISIONAL</span>
                                    <span v-if="getValueEstadoRuc(editable.data)=='02'" class="badge badge-danger">BAJA PROV. POR OFICIO</span>
                                    <span v-if="getValueEstadoRuc(editable.data)=='03'" class="badge badge-danger">SUSPENSION TEMPORAL</span>
                                    <span v-if="getValueEstadoRuc(editable.data)=='10'" class="badge badge-danger">BAJA DEFINITIVA</span>
                                    <span v-if="getValueEstadoRuc(editable.data)=='11'" class="badge badge-danger">BAJA DE OFICIO</span>
                                    <span v-if="getValueEstadoRuc(editable.data)=='22'" class="badge badge-danger">INHABILITADO-VENT.UNICA</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Estado Domicilio: </dt></label><br>
                                    <span v-if="getValueEstadoDomicilio(editable.data)=='00'" class="badge badge-success">HABIDO</span>
                                    <span v-if="getValueEstadoDomicilio(editable.data)=='09'" class="badge badge-danger">PENDIENTE</span>
                                    <span v-if="getValueEstadoDomicilio(editable.data)=='11'" class="badge badge-danger">POR VERIFICAR</span>
                                    <span v-if="getValueEstadoDomicilio(editable.data)=='12'" class="badge badge-danger">NO HABIDO</span>
                                    <span v-if="getValueEstadoDomicilio(editable.data)=='20'" class="badge badge-danger">NO HALLADO</span>
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
        getNombreTipoComprobante(code){
            let nombre = '';

            switch (code) {
                case '01':
                    nombre = 'FACTURA';
                    break;
                case '03':
                    nombre = 'BOLETA DE VENTA';
                    break;
                case '04':
                    nombre = 'LIQUIDACION DE COMPRA';
                    break;
                case '07':
                    nombre = 'NOTA DE CREDITO';
                    break;
                case '08':
                    nombre = 'NOTA DE DEBITO';
                    break;
                case 'R1':
                    nombre = 'RECIBO POR HONORARIOS';
                    break;
                case 'R7':
                    nombre = 'NOTA DE CREDITO DE RECIBOS';
                    break;
            
                default:
                    break;
            }

            return nombre;
        },
        getValueEstadoCp(e){
            if(e) return JSON.parse(e).estadoCp;
            return;
        },
        getValueEstadoRuc(e){
            if(e) return JSON.parse(e).estadoRuc;
            return;
        },
        getValueEstadoDomicilio(e){
            if(e) return JSON.parse(e).condDomiRuc;
            return;
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