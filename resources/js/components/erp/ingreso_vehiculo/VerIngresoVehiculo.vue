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
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Vehiculo: *</dt></label><br>
                                    <span v-if="editable.numero_placa" v-text="editable.numero_placa"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Documento: *</dt></label><br>
                                    <span v-if="editable.num_documento" v-text="editable.num_documento"></span>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Conductor *:</dt></label><br>
                                    <span v-if="editable.nombre_conductor" v-text="editable.nombre_conductor"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Origen:</dt></label><br>
                                    <span v-if="editable.nombre_origen" v-text="editable.nombre_origen"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Destino:</dt></label><br>
                                    <span v-if="editable.nombre_destino" v-text="editable.nombre_destino"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Observaciones:</dt></label><br>
                                    <span v-if="editable.observaciones" v-text="editable.observaciones"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row" v-if="editable.anulado">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Anulacion:</dt></label><br>
                                    <span v-if="editable.anulado" v-text="editable.anulado"></span>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Motivo anulacion:</dt></label><br>
                                    <span v-if="editable.motivo_anulacion" v-text="editable.motivo_anulacion"></span>
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
        cerrarModal(){
            this.$emit('input',{});
        },
        descargarComprobante(vehiculo){

            if(!vehiculo.document_tarjeta_propiedad){
                swal(
                    'Error',
                    'El tarjeta de propiedad de este vehiculo no ha sido adjuntado',
                    'warning'
                )
                return;
            }
            

            let obj_vehiculo = vehiculo;
            axios({
                url:'/vehiculo/comprobante',
                method: 'POST',
                responseType: 'blob',
                data: {
                    document_name: obj_vehiculo.document_tarjeta_propiedad,
                }
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    let names = String(obj_vehiculo.document_tarjeta_propiedad).split(';');
                    names = String(names[1]).split('.pdf');
                    let filename = names[0]+".pdf";
    
                    var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                    var fileLink = document.createElement('a');
                    fileLink.href = fileURL;
                    if (!filename) {
                        filename = url.substr(url.lastIndexOf('/') + 1)
                    }
                    fileLink.setAttribute('download', filename);
                    document.body.appendChild(fileLink);
                    fileLink.click();
                }
            });
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