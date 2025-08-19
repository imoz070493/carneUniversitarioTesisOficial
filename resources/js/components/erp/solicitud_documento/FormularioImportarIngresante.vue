<template>
    <div class="modal fade mostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

        <div class="modal-dialog modal-primary modal-xl">
            <div class="modal-content">
                <div v-bind:class="{'show-container': btn.importar, 'hide-container': !btn.importar}">
                    <div class="loader"></div>
                </div>
                <div class="modal-header">
                    <h4 class="modal-title" v-text="var_config.title"></h4>
                    <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style='max-height:450px;overflow-y:auto;overflow-x:hidden;'>
                    
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <!-- {{editable}} -->
                        <span class="text-error" v-if="errors.formulario">{{errors.formulario}}</span>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Excel: *</dt></label>
                                    <input type="file" @change="imageChanged" class="form-control" accept=".xlsx">
                                    <span class="text-error" v-if="errors.excel_document">{{errors.excel_document}}</span>
                                    <span class="text-error" v-if="errors.convocatoria">{{errors.convocatoria}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                Utilizar la siguiente plantilla para realizar las consultas: 
                                <a href="#" @click="descargarPlantilla()">Excel</a>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" :disabled="btn.importar" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='importar'" class="btn btn-success" :disabled="btn.importar" @click="importar()">Importar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarPersonaDni()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarPersonaDni()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

        <!-- Errores -->
        <v-listar-error
            v-if="nuevo_error._estado=='viendo_error'"
            v-model="nuevo_error"
            ref="cmp_mostrar_error"
            :var_config="var_config_error"
        ></v-listar-error>
    </div>
</template>
<script>

const ListarError = () => import("@/components/erp/matricula/ListarError");
const PeriodoAcademicoSelect = () => import("@/components/referencias/PeriodoAcademicoSelect");

export default {
    components: {
        "v-listar-error": ListarError,
        "periodo-academico-select": PeriodoAcademicoSelect,
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
                importar: false,
            },
            nuevo_error: {},
            var_config_error: {},
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
        importar(){
            let me = this;
            this.btn['importar'] = true;

            axios({
                url:'/ingresante/importar',
                method: 'POST',
                data: this.editable,
                responseType: 'blob',
            }).then(response => {
                
                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = "Fichas de Matricula.pdf";

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

                swal(
                    'Generado correctamente',
                    'Exito!',
                    'success'
                )

                me.$emit('guardado');
                me.cerrarModal();
            }).catch(error => {
                me.btn['importar'] = false;

                if(error.request.status){
                    // La session ha expirado
                    if(error.request.status == 419){
                        location.reload();
                    }

                    // Validacion de campos de formulario
                    if(error.request.status == 422){
                        if(error.request.response){
                            let response = JSON.parse(error.request.response);
                            console.log(response);
                            if(response.errors)
                                me.errors = response.errors;
                        }
                    }

                    // Validacion de datos de excel
                    if(error.request.status == 500){
                        if(error.request.response){
                            me.errors = error.response.data;console.log('errorrrr',me.errors)

                            if(me.errors.data){
                                me.nuevo_error._estado = "viendo_error";
                                me.nuevo_error.data = me.errors.data;

                                me.var_config_error = {
                                    title: 'Errores en Excel'
                                };
                            }else{
                                if(me.errors.code=='sin_periodo_actual' || me.errors.code=='excel_vacio')
                                    me.errors.formulario = me.errors.message;
                            }
                        }
                    }
                }



                
            });
        },
        descargarPlantilla(){
            let me = this;
            this.btn['actualizar'] = true;

            axios({
                url:'/matricula/plantilla',
                method: 'POST',
                responseType: 'blob',
            }).then(response => {
                if(response.data && response.data.size){
                    let filename = "Matriculas.xlsx";
    
                    var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                    var fileLink = document.createElement('a');
                    fileLink.href = fileURL;
                    if (!filename) {
                        filename = url.substr(url.lastIndexOf('/') + 1)
                    }
                    fileLink.setAttribute('download', filename);
                    document.body.appendChild(fileLink);
                    fileLink.click();                }
            }).catch(error => {
                me.btn['actualizar'] = false;
                // La session ha expirado
                if(error.request.status == 419){
                    location.reload();
                }

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
                this.editable.name_excel = propiedades.name;
                this.editable.excel_document = e.target.result;
            };
        }
    },
    watch:{
        // 'editable.numero_placa': function(newval, olval){
        //     if(newval){
        //         this.editable.numero_placa = String(newval).toUpperCase();
        //         this.editable.placa_vigente = newval;
        //         this.$forceUpdate();
        //     }
        // }
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


    .hide-container{
        display: none;
    }

    .show-container{
        display: flex;
        width: calc(100% + 10px);
        height: calc(100% - 66px);
        /* border: 1px solid black; */
        position: absolute;
        z-index: 100;
        margin: 66.8px 0 0 -1px;
        background: rgba(162, 153, 153, .5);
    }

    .loader {
        border: 10px solid #f3f3f3;
        border-radius: 50%;
        border-top: 10px solid #3498db;
        width: 50px;
        height: 50px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
        top: calc(50%);
        left: 50%;
        position: absolute;
        margin: -25px 0 0 -25px;
        z-index: 100;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>