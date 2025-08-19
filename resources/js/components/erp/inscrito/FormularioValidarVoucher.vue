<template>
    <div class="modal fade mostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

        <div class="modal-dialog modal-primary modal-xl">
            <div class="modal-content">
                <div v-bind:class="{'show-container': btn.registrar, 'hide-container': !btn.registrar}">
                    <div class="loader"></div>
                </div>
                <div class="modal-header">
                    <h4 class="modal-title" v-text="var_config.title"></h4>
                    <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style='max-height:550px;overflow-y:auto;overflow-x:hidden;'>
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{editable}}
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Escuela Profesional: *</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.escuela_profesional" 
                                        class="form-control" 
                                        placeholder="Escuela Profesional..."
                                        :disabled="lock.escuela_profesional"
                                    >
                                    <span class="text-error" v-if="errors.escuela_profesional">{{errors.escuela_profesional}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Codigo de Estudiante: *</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.codigo_estudiante" 
                                        class="form-control" 
                                        placeholder="Codigo Estudiante..."
                                        :disabled="lock.codigo_estudiante"
                                    >
                                    <span class="text-error" v-if="errors.codigo_estudiante">{{errors.codigo_estudiante}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>DNI: *</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.dni" 
                                        class="form-control" 
                                        placeholder="N° DNI..."
                                        :disabled="lock.dni"
                                    >
                                    <span class="text-error" v-if="errors.dni">{{errors.dni}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Apellido Paterno: *</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.apellido_paterno" 
                                        class="form-control" 
                                        placeholder="Apellido Paterno..."
                                        :disabled="lock.apellido_paterno"
                                    >
                                    <span class="text-error" v-if="errors.apellido_paterno">{{errors.apellido_paterno}}</span>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Apellido Materno: *</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.apellido_materno" 
                                        class="form-control" 
                                        placeholder="Apellido Materno..."
                                        :disabled="lock.apellido_materno"
                                    >
                                    <span class="text-error" v-if="errors.apellido_materno">{{errors.apellido_materno}}</span>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Nombres: *</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.nombres" 
                                        class="form-control" 
                                        placeholder="Nombres..."
                                        :disabled="lock.nombres"
                                    >
                                    <span class="text-error" v-if="errors.nombres">{{errors.nombres}}</span>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Recibo: *</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.numero_recibo" 
                                        class="form-control" 
                                        placeholder="N° Recibo..."
                                        :disabled="lock.numero_recibo"
                                    >
                                    <span class="text-error" v-if="errors.numero_recibo">{{errors.numero_recibo}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label><dt>Imagen *:</dt></label>
                                            <input type="file" @change="imageChanged" class="form-control" accept="jpeg, jpe, png" :disabled="lock.new_document">
                                            <span class="text-error" v-if="errors.new_document">{{errors.new_document}}</span>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label><dt>¿Validado?: *</dt></label><br>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" v-model="editable._voucher_validado" class="custom-control-input" id="customSwitch6" @change="changeTipo($event)" :disabled="lock._voucher_validado">
                                                <label style="width:70px;" class="custom-control-label" for="customSwitch6" v-html="text._voucher_validado"></label>
                                                <span class="text-error" v-if="errors._voucher_validado">{{errors._voucher_validado}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label><dt>Observacion:</dt></label>
                                            <textarea type="text" v-model="editable.observacion" class="form-control" placeholder="Observacion..."></textarea>
                                            <span class="text-error" v-if="errors.observacion">{{errors.observacion}}</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <!-- <label><dt>Imagen:</dt></label> -->
                                            <img id="image" width="240" v-bind:src="'/storage/'+editable.folder+'/4_vouchers/'+editable.foto"/>
                                            <!-- <img id="image_sin_validar" width="240" height="288" v-bind:src="'/storage/'+editable.folder+'/2_sin_validar/'+editable.foto"/> -->
                                            <!-- <img id="image" width="240" height="288" />
                                            <img id="image_sin_validar" width="240" height="288" /> -->
                                        </div>
                                    </div>        
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarArticulo()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarArticulo()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

    </div>
</template>
<script>

const MatriculadoBusqueda = () => import("@/components/referencias/MatriculadoBusqueda");


export default {
    components: {
        "matriculado-busqueda": MatriculadoBusqueda,

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
                tipo_documento: 'codigo'
            },this.value),
            errors: [],
            btn: {
                registrar: false,
                actualizar: false,
            },
            lock: {},
            text: {},
            var_config1: {},
            recortar_nuevo: {},
            validacion_nuevo: {},
        };
    },
    mounted() {
        let me = this;
        if(!this.editable.id){
            //Nuevo
            me.editable._voucher_validado = false;
            me.text._voucher_validado = "NO";

            me.editable._duplicado = false;
            me.text._duplicado = "NO";

            this.lock['escuela_profesional'] = true;
            this.lock['dni'] = true;
            this.lock['codigo_estudiante'] = true;
            this.lock['apellido_paterno'] = true;
            this.lock['apellido_materno'] = true;
            this.lock['nombres'] = true;
            this.lock['sexo'] = true;
        }else{
            //Editar

            // Duplicado
            if(me.editable.duplicado=='1') {
                me.editable._duplicado = true;
                me.text._duplicado = 'SI';
            }
            if(me.editable.duplicado=='0') {
                me.editable._duplicado = false;
                me.text._duplicado = 'NO';
            }

            // Foto Validado
            if(me.editable.voucher_validado=='1'){
                me.lock['_voucher_validado'] = true;
                me.lock['new_document'] = true;
                me.editable._voucher_validado = true;
                me.text._voucher_validado = 'SI';
            }
            if(me.editable.voucher_validado=='0'){
                me.lock['_voucher_validado'] = false;
                me.lock['new_document'] = false;
                me.editable._voucher_validado = false;
                me.text._voucher_validado = 'NO';
            }


            this.lock['_duplicado'] = true;
            
            this.lock['numero_documento'] = true;
            this.lock['escuela_profesional'] = true;
            this.lock['dni'] = true;
            this.lock['codigo_estudiante'] = true;
            this.lock['apellido_paterno'] = true;
            this.lock['apellido_materno'] = true;
            this.lock['nombres'] = true;
            this.lock['sexo'] = true;
            this.lock['numero_recibo'] = true;
        }

        this.editable.fecha_inicio_edicion = now();

        this.$forceUpdate();

        
    },
    methods: {
        registrarArticulo(){
            let me = this;
            this.btn['registrar'] = true;

            if(me.editable._voucher_validado) me.editable.voucher_validado = 1;
            else me.editable.voucher_validado = 0;

            if(me.editable._duplicado) me.editable.duplicado = 1;
            else me.editable.duplicado = 0;

            axios.post('/inscrito/registrar',this.editable).then(function (response){
                me.$emit('guardado');
                me.cerrarModal();

                swal(
                    'Registrado',
                    'El tramite ha sido registrado con exito',
                    'success'
                )
            })
            .catch(error => {
                me.btn['registrar'] = false;

                if(error.request.status){
                    if(error.request.status == 419){
                        location.reload();
                    }
                }

                if(error.request.response){
                    let response = JSON.parse(error.request.response);
                    console.log(response);
                    me.errors = response.errors;
                }
            });
        },
        actualizarArticulo(){console.log("actualizarArticulo")
            let me = this;
            this.btn['actualizar'] = true;

            if(me.editable._voucher_validado) me.editable.voucher_validado = 1;
            else me.editable.voucher_validado = 0;

            // Validando la validacion verdadera
            if(!me.editable._voucher_validado){
                me.errors._voucher_validado = 'Marque la opcion validar.';
                me.btn['actualizar'] = false;
                return;
            }else{
                delete me.errors.new_document;
            }

            this.editable.fecha_fin_edicion = now();

            axios.put('/inscrito/validar_voucher',{
                id: this.editable.id,
                voucher_validado: this.editable.voucher_validado,
                observacion: this.editable.observacion,
            }).then(function (response){
                me.$emit('guardado');
                me.cerrarModal();

                swal(
                    'Actualizado',
                    'El voucher ha sido validado con exito',
                    'success'
                )
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
        changeTipo(e){
            if(e.target.checked) this.text._voucher_validado = 'SI';
            else this.text._voucher_validado = 'NO';
            this.$forceUpdate();
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