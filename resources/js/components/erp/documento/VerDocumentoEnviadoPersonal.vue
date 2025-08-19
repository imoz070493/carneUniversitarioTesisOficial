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
                        <!-- {{editable}} -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Carta: *</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.carta" 
                                        class="form-control" 
                                        placeholder=""
                                        :disabled="true"
                                    >
                                    <span class="text-error" v-if="errors.carta">{{errors.numero_documento}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Facultad: *</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.facultad" 
                                        class="form-control" 
                                        placeholder=""
                                        :disabled="true"
                                    >
                                    <span class="text-error" v-if="errors.facultad">{{errors.numero_documento}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Codigo: *</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.codigo" 
                                        class="form-control" 
                                        placeholder=""
                                        :disabled="true"
                                    >
                                    <span class="text-error" v-if="errors.codigo">{{errors.numero_documento}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Estudiante: *</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.nombre_estudiante" 
                                        class="form-control" 
                                        placeholder=""
                                        :disabled="true"
                                    >
                                    <span class="text-error" v-if="errors.nombre_estudiante">{{errors.numero_documento}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Procesado: <span v-if="editable.fecha_procesado" class="badge badge-success">Exito</span><span v-else class="badge badge-secondary">Pendiente</span></dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.fecha_procesado" 
                                        class="form-control" 
                                        placeholder=""
                                        :disabled="true"
                                    >
                                    <span class="text-error" v-if="errors.fecha_procesado">{{errors.numero_documento}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Env. Facultad: <span v-if="editable.fecha_envio_facultad" class="badge badge-success">Exito</span><span v-else class="badge badge-secondary">Pendiente</span></dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.fecha_envio_facultad" 
                                        class="form-control" 
                                        placeholder=""
                                        :disabled="true"
                                    >
                                    <span class="text-error" v-if="errors.fecha_envio_facultad">{{errors.numero_documento}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Recibido: <span v-if="editable.fecha_recibido" class="badge badge-success">Exito</span><span v-else class="badge badge-secondary">Pendiente</span></dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.fecha_recibido" 
                                        class="form-control" 
                                        placeholder=""
                                        :disabled="true"
                                    >
                                    <span class="text-error" v-if="errors.fecha_recibido">{{errors.numero_documento}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Estado: *</dt></label>
                                    <div v-if="editable.estado=='procesando'">
                                        <span class="badge badge-warning">Procesando</span>
                                    </div>
                                    <div v-else-if="editable.estado=='facultad'">
                                        <span class="badge badge-info">Facultad</span>
                                    </div>
                                    <div v-else-if="editable.estado=='recibido'">
                                        <span class="badge badge-success">Recibido</span>
                                    </div>
                                    <span class="text-error" v-if="errors.estado">{{errors.numero_documento}}</span>
                                </div>
                            </div>
                        </div>
                        

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <!-- <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarArticulo()">Guardar</button> -->
                    <!-- <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarArticulo()">Actualizar</button> -->
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
            arrayInscrito: [],
            show: {},
            disabled: {}
        };
    },
    mounted() {
        let me = this;
        if(!this.editable.id){
            //Nuevo
            me.editable._foto_validado = false;
            me.text._foto_validado = "NO";

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
            if(me.editable.foto_validado=='1'){
                me.lock['_foto_validado'] = true;
                me.lock['new_document'] = true;
                me.editable._foto_validado = true;
                me.text._foto_validado = 'SI';
            }
            if(me.editable.foto_validado=='0'){
                me.lock['_foto_validado'] = false;
                me.lock['new_document'] = false;
                me.editable._foto_validado = false;
                me.text._foto_validado = 'NO';
            }

            this.lock['new_document'] = true;
            this.lock['_foto_validado'] = true;
            this.lock['_duplicado'] = true;
            
            this.lock['numero_documento'] = true;
            this.lock['escuela_profesional'] = true;
            this.lock['dni'] = true;
            this.lock['codigo_estudiante'] = true;
            this.lock['apellido_paterno'] = true;
            this.lock['apellido_materno'] = true;
            this.lock['nombres'] = true;
            this.lock['sexo'] = true;
            this.lock['observacion'] = true;
        }

        this.listarDetalleEnvio(1, this.buscar, this.criterio);
        this.$forceUpdate();
    },
    methods: {
        listarDetalleEnvio(page, buscar, criterio){
            let me = this;
            // var url = '/detalle_envio?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.post('/detalle_envio',{
                page: page,
                buscar: buscar,
                criterio: criterio,
                per_page: this.per_page,
                documento_envio_id: this.editable.id
            }).then(function (response){console.log(response)
            
                var respuesta = response.data;
                me.arrayInscrito = respuesta.detalles_envios;
                me.pagination = respuesta.pagination;

                if(me.arrayInscrito.length==0) me.show['arrayInscrito'] = true;
                else me.show['arrayInscrito'] = false;
            })
            .catch(function (error){
                console.log(error);
if(error.request.status){
                    if(error.request.status == 419){
                        location.reload();
                    }
                }
            });

        },
        registrarArticulo(){
            let me = this;
            this.btn['registrar'] = true;

            if(me.editable._foto_validado) me.editable.foto_validado = 1;
            else me.editable.foto_validado = 0;

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
        actualizarArticulo(){
            let me = this;
            this.btn['actualizar'] = true;

            if(me.editable._foto_validado) me.editable.foto_validado = 1;
            else me.editable.foto_validado = 0;

            // Validando la fotografia adjuntada
            if(!me.editable.new_document){
                me.errors.new_document = 'Adjunte la fotografia.';
                me.btn['actualizar'] = false;
                return;
            }else{
                delete me.errors.new_document;
            }

            // Validando la validacion verdadera
            if(!me.editable._foto_validado){
                me.errors._foto_validado = 'Marque la opcion validar.';
                me.btn['actualizar'] = false;
                return;
            }else{
                delete me.errors.new_document;
            }

            axios.put('/inscrito/actualizar',this.editable).then(function (response){
                me.$emit('guardado');
                me.cerrarModal();

                swal(
                    'Actualizado',
                    'El tramite ha sido actualizado con exito',
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
        imageChanged(e) {
            console.log(e.target.files[0]);
            let propiedades = e.target.files[0];

            var fileReader = new FileReader();
            var imgtag = document.getElementById("image");

            fileReader.readAsDataURL(e.target.files[0]);
            fileReader.onload = e => {
                this.editable.name_document = propiedades.name;
                this.editable.new_document = e.target.result;
                imgtag.src = e.target.result;
            };

            // reader.onload = function(event) {
            //     imgtag.src = event.target.result;
            // };
        },
        setEsperando(){
            this.btn['registrar'] = true;
        },
        setBusqueda(e){console.log('setBusqueda',e)
            this.btn['registrar'] = false;

            if(typeof e === 'object'){

                if(e.escuela_profesional) this.editable.escuela_profesional = e.escuela_profesional;
                if(e.numero_documento) this.editable.dni = e.numero_documento;
                if(e.codigo_estudiante) this.editable.codigo_estudiante = e.codigo_estudiante;
                if(e.apellido_paterno) this.editable.apellido_paterno = e.apellido_paterno;
                if(e.apellido_materno) this.editable.apellido_materno = e.apellido_materno;
                if(e.nombres) this.editable.nombres = e.nombres;
                if(e.sexo) this.editable.sexo = e.sexo;
                
            }else{
                alert("El alumno no ha sido matriculado. Puede volver a realizar la busqueda");
            }

            this.$forceUpdate();
        },
        changeTipo(e){
            if(e.target.checked) this.text._foto_validado = 'SI';
            else this.text._foto_validado = 'NO';
            this.$forceUpdate();
        },
        changeDuplicado(e){
            if(e.target.checked) this.text._foto_duplicado = 'SI';
            else this.text._foto_duplicado = 'NO';
            this.$forceUpdate();
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