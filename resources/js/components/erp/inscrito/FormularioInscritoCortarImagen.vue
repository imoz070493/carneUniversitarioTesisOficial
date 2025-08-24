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
                                    <label><dt>Documento: *</dt></label>
                                    <select class="form-control col-md-12" v-model="editable.tipo_documento">
                                        <option value="codigo">Codigo</option>
                                        <option value="dni">DNI</option>
                                    </select>
                                    <span class="text-error" v-if="errors.tipo_documento">{{errors.tipo_documento}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Codigo: *</dt></label>
                                    <matriculado-busqueda
                                        v-model="editable.numero_documento" 
                                        :tipo_documento="editable.tipo_documento"
                                        @setEsperando="setEsperando()"
                                        @setBusqueda="setBusqueda($event)"
                                    ></matriculado-busqueda>
                                    <span class="text-error" v-if="errors.numero_documento">{{errors.numero_documento}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label><dt>Sexo: *</dt></label>
                                            <input 
                                                type="text" 
                                                v-model="editable.sexo" 
                                                class="form-control" 
                                                placeholder="Sexo..."
                                                :disabled="lock.sexo"
                                            >
                                            <span class="text-error" v-if="errors.sexo">{{errors.sexo}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group pull-right">
                                            <label><dt>¿Duplicado?: *</dt></label><br>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" v-model="editable._duplicado" class="custom-control-input" id="customSwitch3" @change="changeDuplicado($event)">
                                                <label style="width:70px;" class="custom-control-label" for="customSwitch3" v-html="text._duplicado"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label><dt>Imagen *:</dt></label>
                                            <input type="file" @change="imageChanged" class="form-control" accept="jpeg, jpe, png">
                                            <span class="text-error" v-if="errors.new_document">{{errors.new_document}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group pull-right">
                                            <label><dt>¿Validado?: *</dt></label><br>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" v-model="editable._foto_validado" class="custom-control-input" id="customSwitch4" @change="changeTipo($event)">
                                                <label style="width:70px;" class="custom-control-label" for="customSwitch4" v-html="text._foto_validado"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                            <img id="image" width="240" height="288"/>
                                        </div>
                                        <div ref="cropper" class="crop-container"></div>
                                        <button type="button" @click="getCroppedImage">Recortar Imagen</button>
                                        <img :src="croppedImage" alt="Imagen recortada" v-if="croppedImage" />
                                    </div>        
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarArticuloVariasVeces()">Guardar</button>
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

import Croppie from "croppie";
import "croppie/croppie.css";

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
                tipo_documento: 'codigo',
                credencial_validado: 'no_validado',

                apellido_materno: "DURAND",
                apellido_paterno: "ALARCÓN",
                codigo_estudiante: "1102320231",
                credencial_validado: "no_validado",
                dni: "74548679",
                duplicado:0,
                escuela_profesional:"EDUCACIÓN PRIMARIA INTERCULTURAL",
                estudiante_id:88,
                fecha_expiracion:"",
                fecha_inicio_tramite:"2025-8-24 9:00:25",
                foto_validado:0,
                name_document:"0f45af68-2b49-4eca-b301-528f67f53d9c.jpg",
                new_document:"",
                nombres:"ALICIA",
                numero_documento:"1102320231",
                numero_recibo:"v001-223",
                sexo:"FEMENINO",
                telefono1:"988674768",
                tipo_documento:"codigo",
                _duplicado:false,
                _foto_validado:false,
            },this.value),
            errors: [],
            btn: {
                registrar: false,
                actualizar: false,
            },
            lock: {},
            text: {},
            cropInstance: null,
            croppedImage: null,
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
        }

        this.initializeCropper();
        // Carga una imagen de ejemplo
        this.loadImage("https://media.istockphoto.com/id/1952253409/es/foto/skyline-paris.webp?a=1&b=1&s=612x612&w=0&k=20&c=Wp6eDtssDcs4M1Mv4I4o-1hQM21PSA6PZUPFEJSVqiI=");

        me.$forceUpdate();
    },
    methods: {
        registrarArticuloVariasVeces(){
            for (let i = 0; i < 100; i++) {
                this.registrarArticulo();
            }
        },
        registrarArticulo(){
            let me = this;
            this.btn['registrar'] = true;

            if(me.editable._foto_validado) me.editable.foto_validado = 1;
            else me.editable.foto_validado = 0;

            if(me.editable._duplicado) me.editable.duplicado = 1;
            else me.editable.duplicado = 0;

            axios.post('/inscrito/registrar_test',this.editable).then(function (response){
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

            axios.put('/inscrito/actualizar',this.editable).then(function (response){
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
                if(e.estudiante_id) this.editable.estudiante_id = e.estudiante_id;
                
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
        },
        initializeCropper() {
            this.cropInstance = new Croppie(this.$refs.cropper, {
                viewport: {
                width: 500, // Ajusta el ancho del recorte
                height: 400, // Ajusta el alto del recorte
                type: "square", // Cambiar a 'circle' si es necesario
                },
                boundary: {
                width: 600,
                height: 500,
                },
                enableResize: true, // Habilita el ajuste de tamaño
                enableOrientation: true,
            });
        },
        loadImage(imageUrl) {
            this.cropInstance.bind({
                url: imageUrl,
            });
        },
        getCroppedImage() {
            this.cropInstance.result({ type: "base64", size: "viewport" }).then((result) => {
                this.croppedImage = result;
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