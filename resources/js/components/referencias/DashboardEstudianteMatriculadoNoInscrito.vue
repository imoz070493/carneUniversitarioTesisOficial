<template>
    <div class="row">
        <div v-bind:class="{'show-container': btn.registrar, 'hide-container': !btn.registrar}">
            <div class="loader"></div>
        </div>
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <!-- {{editable}} -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label><dt>N° Recibo: *</dt></label>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group mb-3">
                                <span class="input-group-append">
                                    <button type="button" @click="togglePopup()" class="btn btn-info btn-flat"><i class="fa fa-info"></i></button>
                                    <!-- <button @click="togglePopup" class="info-button">i</button> -->
                                </span>
                                <input 
                                    type="text" 
                                    v-model="editable.numero_recibo" 
                                    class="form-control" 
                                    placeholder="Ejm: V001-4154"
                                    :disabled="lock.numero_recibo"
                                >
                            </div>
                        </div>
                        <span class="text-error" v-if="errors.numero_recibo">{{errors.numero_recibo}}</span>
                    </div>
                </div>

                <div v-if="showPopup" class="popup">
                    <button class="close-btn" @click="togglePopup">✖</button>
                    <img src="/images/ubicacion_numero_recibo.jpg" alt="Guía de ubicación" class="info-image" />
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label><dt>Correo Personal: *</dt></label>
                        <input type="text" v-model="editable.correo_personal" class="form-control" placeholder="correo@gmail.com..." :disabled="lock.correo_personal">
                        <span class="text-error" v-if="errors.correo_personal">{{errors.correo_personal}}</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label><dt>Telefono 1: *</dt></label>
                        <input type="text" v-model="editable.telefono1" class="form-control" placeholder="Telefono..." :disabled="lock.telefono1">
                        <span class="text-error" v-if="errors.telefono1">{{errors.telefono1}}</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label><dt>Telefono 2: </dt></label>
                        <input type="text" v-model="editable.telefono2" class="form-control" placeholder="Telefono..." :disabled="lock.telefono2">
                        <span class="text-error" v-if="errors.telefono2">{{errors.telefono2}}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label><dt>Estado Trámite: </dt></label>
                        <label v-if="editable.estado_tramite=='no_inscrito'" class="col-form-label"><span class="badge badge-secondary">Pendiente</span></label>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label><dt>Tipo Solicitud: </dt></label>
                        <label v-if="editable.tipo_tramite=='nuevo'" class="col-form-label"><span class="badge badge-secondary">Nuevo</span></label>
                        <label v-if="editable.tipo_tramite=='duplicado'" class="col-form-label"><span class="badge badge-success">Duplicado</span></label>
                    </div>
                </div>

                <div v-if="editable.foto_anterior" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label><dt>¿Desea utilizar la foto de la convocatoria anterior?: *</dt></label>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" v-model="editable._usar_foto_anterior" class="custom-control-input" id="customSwitch4" @change="changeTipoFotoAnterior($event)" :disabled="lock._usar_foto_anterior">
                            <label style="width:70px;" class="custom-control-label" for="customSwitch4" v-html="text._usar_foto_anterior"></label>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><dt>Foto: </dt></label>
                                <input 
                                    type="file" 
                                    @change="imageStudentChanged"
                                    class="form-control"
                                    accept=".jpeg, .jpg, .png"
                                    :disabled="lock._new_document"
                                    v-if="show._new_document"
                                >
                                <span class="text-error" v-if="errors.new_document">{{errors.new_document}}</span>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <!-- <label><dt>Imagen:</dt></label> -->
                                <img v-if="text._usar_foto_anterior=='NO'" id="student_image" width="240" height="288"/>
                                <img v-if="text._usar_foto_anterior=='SI'" id="image" width="240" height="288" v-bind:src="'/storage/'+editable.foto_anterior"/>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label><dt>Voucher de Pago: *</dt></label>
                                <input 
                                    type="file"
                                    @change="imageVoucherChanged"
                                    class="form-control"
                                    accept=".jpeg, .jpg, .png"
                                    v-if="show._new_document_voucher"
                                >
                                <span class="text-error" v-if="errors.new_document_voucher">{{errors.new_document_voucher}}</span>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <!-- <label><dt>Imagen:</dt></label> -->
                                <img id="voucher_image" width="240" height="288"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group pull-right">
                        <button type="button" class="btn btn-primary" :disabled="btn.registrar"  @click="registrarSolicitud()">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>

export default {
  props: {
    value: {
      type: 0
    },
    disabled: {
      type: Boolean,
      default: false
    },
    tipo_documento: {
      type: String,
      default: 'ruc'
    }
  },
  data() {
    return {
        editable: Object.assign({},this.value),
        num_documento: this.value,
        lock: {},
        errors: {},
        show: {},
        text: {},
        btn: {
            registrar: false
        },
        showPopup: false
    };
  },
  mounted() {
    // if (this.value) {
    //   console.log("buscar");
    //   this.buscar(this.value);
    // }
    // this.buscar();

    let me = this;

    me.show['_new_document'] = true;
    me.show['_new_document_voucher'] = true;

    me.text._usar_foto_anterior = "NO";

    me.$forceUpdate();
  },
  methods: {
    buscar() {
        let me = this;
        let url = '/matricula/busqueda?tp='+this.tipo_documento+'&n='+this.num_documento;

        console.log('numero_documento',this.num_documento)

        if(!this.num_documento){
          alert('Ingrese el numero de documento');
          return;
        }

        if(this.tipo_documento=='dni'){
          if(this.num_documento.length != 8){
            alert('El DNI debe contener 8 caracteres');
            return;
          }
        }
        else if(this.tipo_documento=='codigo'){
          if(this.num_documento.length != 10){
            alert('El codigo debe contener 10 caracteres');
            return;
          }
        }

        me.$emit('setEsperando');

        axios.get(url).then(function (response){
          // console.log(response.data)
          me.$emit('setBusqueda',response.data);
            // me.array_tipos_documentos = response.data;
        })
        .catch(function (error){
            console.log(error);
        });
    },
    registrarSolicitud(){
        let me = this;
        this.btn['registrar'] = true;

        // if(me.editable._foto_validado) me.editable.foto_validado = 1;
        // else me.editable.foto_validado = 0;

        // if(me.editable._duplicado) me.editable.duplicado = 1;
        // else me.editable.duplicado = 0;

        if(me.editable._usar_foto_anterior) me.editable.usar_foto_anterior = 1;
        else me.editable.usar_foto_anterior = 0;

        axios.post('/inscrito_estudiante/registrar',this.editable).then(function (response){
            console.log("Registrado correctamente");
            me.$emit('guardado');
            // me.cerrarModal();

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
    changeTipoFotoAnterior(e){
        if(e.target.checked){
          this.text._usar_foto_anterior = 'SI';
        }
        else this.text._usar_foto_anterior = 'NO';
        this.$forceUpdate();
    },
    async imageStudentChanged(e) {

        let is_valid = await this.validarImagen(e);console.log("is_valid",is_valid)
        if(!is_valid) return;
        console.log("charging image")
        let propiedades = e.target.files[0];

        var fileReader = new FileReader();
        var imgtag = document.getElementById("student_image");


        fileReader.readAsDataURL(e.target.files[0]);
        fileReader.onload = e => {
            this.editable.name_document = propiedades.name;
            this.editable.new_document = e.target.result;
            imgtag.src = e.target.result;
            // this.loadImage(e.target.result);
            // this.cropperInstance.replace(e.target.result);
            // this.$nextTick(() => {
            //     this.initCropper(); // Initialize Cropper after image loads
            // });
        };
    },
    async imageVoucherChanged(e) {

        let is_valid = await this.validarImagen(e);console.log("is_valid",is_valid)
        if(!is_valid) return;
        console.log("charging image")
        let propiedades = e.target.files[0];

        var fileReader = new FileReader();
        var imgtag = document.getElementById("voucher_image");


        fileReader.readAsDataURL(e.target.files[0]);
        fileReader.onload = e => {
            this.editable.name_document = propiedades.name;
            this.editable.new_document_voucher = e.target.result;
            imgtag.src = e.target.result;
            // this.loadImage(e.target.result);
            // this.cropperInstance.replace(e.target.result);
            // this.$nextTick(() => {
            //     this.initCropper(); // Initialize Cropper after image loads
            // });
        };
    },
    async validarImagen(event){
        
        const file = event.target.files[0]; // Obtener el archivo
        if (!file) return false;

        // 1 Validar la extensión del archivo
        const validExtensions = ["jpg", "jpeg", "png", "gif", "webp"];
        const fileExtension = file.name.split('.').pop().toLowerCase();

        if (!validExtensions.includes(fileExtension)) {
            alert("Formato de archivo no permitido");
            event.target.value = ""; // Resetear input
            return false;
        }

        // 2 Validar el tipo MIME del archivo
        if (!file.type.startsWith("image/")) {
            alert("El archivo seleccionado no es una imagen válida");
            event.target.value = "";
            return false;
        }

        // 3 Validar el tamaño de la imagen (por ejemplo, máximo 5MB)
        const maxSize = 5 * 1024 * 1024; // 5MB
        if (file.size > maxSize) {
            alert("El archivo es demasiado grande. Máximo permitido: 5MB");
            event.target.value = "";
            return false;
        }

        const esValida = await this.cargaImagen(event);
        console.log("Resultado de la validación:", esValida);
        
        return esValida;
    },
    async cargaImagen(event) {
        return new Promise((resolve) => {
            const file = event.target.files[0];
            const img = new Image();

            img.src = URL.createObjectURL(file);

            img.onload = function () {
                console.log("Imagen válida. Dimensiones:", img.width, "x", img.height);
                resolve(true); // Resolver con `true` si la imagen es válida
            };

            img.onerror = function () {
                alert("El archivo no es una imagen válida o está corrupto");
                // event.target.value = "";
                resolve(false); // Resolver con `false` si la imagen es inválida
            };
        });
    },
    togglePopup() {
      this.showPopup = !this.showPopup;
    }
  },
  watch: {
    num_documento: function(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input',newvalue);
      }
    },
    value: function(newvalue, oldvalue) {
      if (newvalue) {
        this.num_documento = newvalue;
      }
    },
    "editable._usar_foto_anterior": function(newvalue, oldvalue) {
        if (newvalue) {
            this.lock._new_document = true;
        }else{
            this.lock._new_document = false;
        }
        this.$forceUpdate();
    },
  }
};
</script>
<style scoped>
.hide-options {
  display: none;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
.show-options {
  display: flex;
  /* padding: 0 18px; */
  background-color: white;
  /* max-height: 0; */
  overflow: hidden;
  margin: -10px 0 0 -10px;
  transition: max-height 0.2s ease-out;
}

.text-error{
    color: red !important;
    font-weight: bold;
}

.cropper-container {
  width: 350px;   /* Ajusta el tamaño del contenedor */
  height: 500px;  /* Ajusta la altura del recorte */
  overflow: hidden;
  border: 1px solid #ddd;
}

.cropper-image {
  max-width: 100%;
  max-height: 100%;
  display: block;
}

/* CSS para el popup de la imagen */

.popup {
  position: absolute;
  background-color: white;
  border: 1px solid #ccc;
  padding: 10px;
  z-index: 100;
  width: 300px;
  top: 30px;
  left: 0;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.close-btn {
  float: right;
  background: none;
  border: none;
  font-size: 16px;
  cursor: pointer;
}

.info-image {
  width: 100%;
  height: auto;
  margin-top: 5px;
}

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

/*.cr-boundary::before,
.cr-boundary::after {
    content: "";
    position: absolute;
    width: 100%;
    height: 1px;
    background: rgba(255, 255, 255, 0.6);
    border-top: 1px dashed white;
}

.cr-boundary::before {
    top: 33.33%;
}

.cr-boundary::after {
    top: 66.66%;
}

.cr-viewport::before,
.cr-viewport::after {
    content: "";
    position: absolute;
    height: 100%;
    width: 1px;
    background: rgba(255, 255, 255, 0.6);
    border-left: 1px dashed white;
}

.cr-viewport::before {
    left: 33.33%;
}

.cr-viewport::after {
    left: 66.66%;
}*/
</style>