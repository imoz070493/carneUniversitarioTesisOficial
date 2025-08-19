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
                            <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Documento: *</dt></label>
                                    <select class="form-control col-md-12" v-model="editable.tipo_documento">
                                        <option value="codigo">Codigo</option>
                                        <option value="dni">DNI</option>
                                    </select>
                                    <span class="text-error" v-if="errors.tipo_documento">{{errors.tipo_documento}}</span>
                                </div>
                            </div> -->

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Codigo: *</dt></label>
                                    <!-- <matriculado-busqueda
                                        v-model="editable.numero_documento" 
                                        :tipo_documento="editable.tipo_documento"
                                        @setEsperando="setEsperando()"
                                        @setBusqueda="setBusqueda($event)"
                                    ></matriculado-busqueda> -->
                                    <input 
                                        type="text" 
                                        v-model="editable.numero_documento" 
                                        class="form-control" 
                                        placeholder="N° Documento..."
                                        :disabled="lock.numero_documento"
                                    >
                                    <span class="text-error" v-if="errors.numero_documento">{{errors.numero_documento}}</span>
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
                                                <input type="checkbox" v-model="editable._duplicado" class="custom-control-input" id="customSwitch5" @change="changeDuplicado($event)" :disabled="lock._duplicado">
                                                <label style="width:70px;" class="custom-control-label" for="customSwitch5" v-html="text._duplicado"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label><dt>Imagen *:</dt></label>
                                            <input type="file" @change="imageChanged" class="form-control" accept="jpeg, jpe, png" :disabled="lock.new_document">
                                            <span class="text-error" v-if="errors.new_document">{{errors.new_document}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group pull-right">
                                            <label><dt>¿Validado?: *</dt></label><br>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" v-model="editable._foto_validado" class="custom-control-input" id="customSwitch6" @change="changeTipo($event)" :disabled="lock._foto_validado">
                                                <label style="width:70px;" class="custom-control-label" for="customSwitch6" v-html="text._foto_validado"></label>
                                                <span class="text-error" v-if="errors._foto_validado">{{errors._foto_validado}}</span>
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

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary" :disabled="btn.actualizar"  @click="validarImagenBackend()">Validar</button>
                                        <button type="button" class="btn btn-primary" :disabled="btn.actualizar"  @click="recortar_imagen()">Recortar</button>
                                        <button type="button" class="btn btn-primary" :disabled="btn.actualizar"  @click="cambiarDpi()">DPI</button>
                                        <!-- <button type="button" class="btn btn-primary" :disabled="btn.actualizar"  @click="obtenerFotoAnterior()">Foto Anterior</button> -->
                                    </div>
                                </div>
                                
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <!-- <label><dt>Imagen:</dt></label> -->
                                            <img id="image" width="240" height="288" v-bind:src="'/storage/'+editable.folder+'/1_validado/'+editable.foto"/>
                                            <img id="image_sin_validar" width="240" height="288" v-bind:src="'/storage/'+editable.folder+'/2_sin_validar/'+editable.foto"/>
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

        <!-- Recortar Imagen -->
            <v-formulario-recortar-imagen 
                v-if="recortar_nuevo._estado=='creando'" 
                v-model="recortar_nuevo"
                ref="cmp_recortar_imagen"
                :var_config="var_config1"
                @guardado="reemplazarImagen"
            ></v-formulario-recortar-imagen>

            <!-- Validar Parametros Imagen -->
            <v-formulario-validacion 
                v-if="validacion_nuevo._estado=='creando'" 
                v-model="validacion_nuevo"
                ref="cmp_validacion_imagen"
                :var_config="var_config"
                @guardado="reemplazarImagen"
                @cerrarModal="cerrarModalFormularioValidacion"
            ></v-formulario-validacion>
    </div>
</template>
<script>

const MatriculadoBusqueda = () => import("@/components/referencias/MatriculadoBusqueda");

const FormularioRecortarImagen = () => import("@/components/erp/inscrito/FormularioRecortarImagen");
const FormularioValidacion = () => import("@/components/erp/inscrito/FormularioValidacion");

export default {
    components: {
        "matriculado-busqueda": MatriculadoBusqueda,

        "v-formulario-recortar-imagen": FormularioRecortarImagen,
        "v-formulario-validacion": FormularioValidacion,
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


            this.lock['_duplicado'] = true;
            
            this.lock['numero_documento'] = true;
            this.lock['escuela_profesional'] = true;
            this.lock['dni'] = true;
            this.lock['codigo_estudiante'] = true;
            this.lock['apellido_paterno'] = true;
            this.lock['apellido_materno'] = true;
            this.lock['nombres'] = true;
            this.lock['sexo'] = true;
        }

        this.editable.fecha_inicio_edicion = now();

        this.obtenerBase64ImagenVersion2();
        // this.$nextTick(() => {
        //     this.obtenerBase64Imagen(); // Initialize Cropper after image loads
        // });

        this.$forceUpdate();

        
    },
    methods: {
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

            this.editable.fecha_fin_edicion = now();

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
        },
        obtenerBase64Imagen(){
            let me = this;
            const img = document.getElementById('image_sin_validar');

            // Esperamos a que la imagen cargue
            img.onload = function() {
                // Creamos un canvas
                const canvas = document.createElement('canvas');
                // canvas.width = img.width;
                // canvas.height = img.height;

                canvas.width = img.naturalWidth;
                canvas.height = img.naturalHeight;

                // Dibujamos la imagen en el canvas
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);

                // Obtenemos el base64
                const base64String = canvas.toDataURL('image/jpeg'); // o 'image/png' según el formato

                console.log(base64String); // Aquí ves el resultado en la consola
                me.editable.new_document = base64String;
            }
            this.$forceUpdate();
        },
        obtenerBase64ImagenVersion2(){
            let me = this;

            let _editable = {foto: this.editable.foto}

            axios({
                url:'/inscrito/obtener_foto',
                method: 'POST',
                responseType: 'blob',
                data: _editable
            }).then(function (response){
                me.btn['registrar'] = false;

                if(response.data && response.data.size){
                    console.log(response.data);

                    // Crea un Blob a partir de response.data
                    const blob = new Blob([response.data], { type: 'image/jpeg' });
                    // Ahora crea un archivo con nombre
                    const file = new File([blob], 'nombre_personalizado.jpg', { type: 'image/jpeg' });
                    // var fileURL = window.URL.createObjectURL(new Blob([response.data]));

                    // Crear una URL temporal para mostrar la imagen
                    const fileURL = URL.createObjectURL(file);
                    document.getElementById('image_sin_validar').src = fileURL;

                    // Ahora obtener el base64
                    const reader = new FileReader();
                    reader.onload = function (event) {
                    const base64Data = event.target.result;
                    // console.log('Base64:', base64Data);
                    me.editable.new_document = base64Data;
                    };
                    reader.readAsDataURL(file);

                    // swal(
                    //     'Corregido',
                    //     'Correccion de dpi exitosa!',
                    //     'success'
                    // )
                }
                me.$forceUpdate();
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
        recortar_imagen(){
            let me = this;

            if(!me.editable.new_document){
                swal(
                    'Advertencia',
                    'Debe adjuntar una imagen',
                    'warning'
                )
                return;
            }

            this.recortar_nuevo = {
                _estado: 'creando',
                new_document: me.editable.new_document
            };
            this.var_config1 = {
                title: 'Recortar Imagen',
                tipo_accion: 'registrar'
            };
        },
        reemplazarImagen(e){
            // console.log(e);
            var imgtag = document.getElementById("image");
            imgtag.src = e;
            this.editable.new_document = e;
            this.$forceUpdate();
        },
        cambiarDpi(){
            let me = this;
            //   me.btn['registrar'] = true;

                if(!me.editable.new_document){
                    swal(
                        'Advertencia',
                        'Debe adjuntar una imagen',
                        'warning'
                    )
                    return;
                }

            let _editable = {new_document: this.editable.new_document}

            axios({
                        url:'/inscrito/cambiar_dpi',
                        method: 'POST',
                        responseType: 'blob',
                        data: _editable
            }).then(function (response){
                me.btn['registrar'] = false;

                if(response.data && response.data.size){
                    console.log(response.data);

                    // Crea un Blob a partir de response.data
                    const blob = new Blob([response.data], { type: 'image/jpeg' });
                    // Ahora crea un archivo con nombre
                    const file = new File([blob], 'nombre_personalizado.jpg', { type: 'image/jpeg' });
                    // var fileURL = window.URL.createObjectURL(new Blob([response.data]));

                    // Crear una URL temporal para mostrar la imagen
                    const fileURL = URL.createObjectURL(file);
                    document.getElementById('image').src = fileURL;

                    // Ahora obtener el base64
                    const reader = new FileReader();
                    reader.onload = function (event) {
                    const base64Data = event.target.result;
                    // console.log('Base64:', base64Data);
                    me.editable.new_document = base64Data;
                    };
                    reader.readAsDataURL(file);

                    swal(
                        'Corregido',
                        'Correccion de dpi exitosa!',
                        'success'
                    )
                }
                me.$forceUpdate();
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
        validarImagenBackend(){
            let me = this;

            if(!me.editable.new_document){
                swal(
                    'Advertencia',
                    'Debe adjuntar una imagen',
                    'warning'
                )
                return;
            }

            this.validacion_nuevo = {
                _estado: 'creando',
                new_document: me.editable.new_document
            };
            this.var_config1 = {
                title: 'Resultado de Validacion',
                tipo_accion: 'registrar'
            };
        },
        cerrarModalFormularioValidacion(e){
            if(e){
                this.editable._foto_validado = true;
                this.text._foto_validado = "SI";
            }else{
                this.editable._foto_validado = false;
                this.text._foto_validado = "NO";
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