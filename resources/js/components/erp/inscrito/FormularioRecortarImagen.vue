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
                        <!-- {{croppedImage}} -->
                        {{imagen_oficial_recortada}}
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <!-- <h2>Image Cropper</h2> -->
                                        <div>
                                            <h5>Imagen Original:</h5>
                                            <img width="500" height="400" style="height" ref="image" :src="urlImage" alt="Cropper Image" />
                                            <button type="button" @click="cropImage">Recortar Imagen</button>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div v-if="croppedImage">
                                            <h5>Imagen Recortada:</h5>
                                            <img width="240" height="288" :src="croppedImage" alt="Cropped Preview" />
                                        </div>
                                        <!-- {{croppedImage}} -->
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <h5>Imagen Redimensionada:</h5>
                                        <canvas id="canvas" style="display:none;"></canvas>
                                        <img id="output" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarImagen()">Guardar</button>
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

import Cropper from "cropperjs";
import "cropperjs/dist/cropper.css";

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
                credencial_validado: 'no_validado'
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
            imagen_oficial_recortada: null,
            urlImage: "/storage/imagen_prueba.jpg"
        };
    },
    mounted() {
        let me = this;

        this.initCropper();

        console.log(this.editable);
        this.$nextTick(() => {
            if(me.editable.new_document)
                me.cropperInstance.replace(me.editable.new_document);
        });
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
        me.$forceUpdate();
    },
    methods: {
        registrarImagen(){
            let me = this;
            this.btn['registrar'] = true;

            // if(me.editable._foto_validado) me.editable.foto_validado = 1;
            // else me.editable.foto_validado = 0;

            // if(me.editable._duplicado) me.editable.duplicado = 1;
            // else me.editable.duplicado = 0;

            if(!this.imagen_oficial_recortada){
                swal(
                    'Advertencia',
                    'Recorte la imagen',
                    'warning'
                )
                this.btn['registrar'] = false;
                return;
            }

            me.$emit('guardado',this.imagen_oficial_recortada);
            me.cerrarModal();

            swal(
                'Recortado',
                'La imagen se ha recortado con exito',
                'success'
            )
            // axios.post('/inscrito/registrar',this.editable).then(function (response){
            // })
            // .catch(error => {
            //     me.btn['registrar'] = false;

            //     if(error.request.status){
            //         if(error.request.status == 419){
            //             location.reload();
            //         }
            //     }

            //     if(error.request.response){
            //         let response = JSON.parse(error.request.response);
            //         console.log(response);
            //         me.errors = response.errors;
            //     }
            // });
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





        initCropper() {
            this.cropperInstance = new Cropper(this.$refs.image, {
                aspectRatio: 5/6, // Change this for different aspect ratios
                viewMode: 2, // Ensure the image stays within the crop box
                guides: true, // Show guide lines
                autoCropArea: 0.9, // Crop the entire image by default
                movable: false, // Allow moving the image
                zoomable: true, // Enable zoom
                rotatable: true, // Allow rotation
                scalable: true, // Allow scaling
            });
            },
            cropImage() {
                let me = this;
                if (this.cropperInstance) {
                    const croppedCanvas = this.cropperInstance.getCroppedCanvas();
                    this.croppedImage = croppedCanvas.toDataURL("image/png"); // Convert to base64



                    // Base64 de ejemplo (pon tu base64 real aquí)
                    const base64 = this.croppedImage; // ← aquí va tu base64 original

                    // Llamar a la función
                    this.resizeBase64Img(base64, 240, 288, function(resizedBase64) {
                        document.getElementById('output').src = resizedBase64;
                        // console.log('Base64 redimensionado:', resizedBase64);
                        me.imagen_oficial_recortada = resizedBase64;
                    });
                }
            },
            resizeBase64Img(base64, maxWidth, maxHeight, callback) {
                const img = new Image();
                img.onload = function() {
                    let width = img.width;
                    let height = img.height;

                    // Mantener proporción
                    if (width > height) {
                        if (width > maxWidth) {
                            height = Math.round(height * (maxWidth / width));
                            width = maxWidth;
                        }
                    } else {
                        if (height > maxHeight) {
                            console.log(width+" "+maxHeight+" "+height)
                            width = Math.round(width * (maxHeight / height));
                            height = maxHeight;
                        }
                    }

                    // Redimensionar en el canvas
                    const canvas = document.getElementById('canvas');
                    const ctx = canvas.getContext('2d');
                    canvas.width = width;
                    canvas.height = height;

                    ctx.drawImage(img, 0, 0, width, height);

                    // Obtener el nuevo base64
                    const resizedBase64 = canvas.toDataURL('image/jpeg', 1);
                    callback(resizedBase64);
                };
                img.src = base64;
            },
            destroyCropper() {
                if (this.cropperInstance) {
                    this.cropperInstance.destroy();
                    this.cropperInstance = null;
                }
            },
            beforeDestroy() {
                this.destroyCropper();
            },
    },
    watch: {
        // "editable.new_document": function(newvalue, oldvalue) {
        //     if (newvalue) {console.log("Ingresando al value")
        //         // this.obtenerIngresosSalidas();
        //         // this.obtenerVentasUtilidades();
        //     }
        //     this.$forceUpdate();
        // },
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