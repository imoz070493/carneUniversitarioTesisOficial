<template>
    <!-- definir aqui el encabezado del componente -->
    <!-- <h4>Lista de Ventas: {{ruta.charAt(0).toUpperCase()}}{{ruta.substr(1)}}</h4> -->
    <!-- escuchamos los eventos del toolbar y redirigimos el mensaje al componente correspondiente, usamos los refs para identificarlos y al ser metodos muy pequeños los escribimos inline en lugar de crear un metodo nuevo -->

    <main class="main">
      <!-- Breadcrumb -->
      <!-- <ol class="breadcrumb">
          <li class="breadcrumb-item">Escritorio</li>
          <li class="breadcrumb-item active">Resumen</li>
      </ol> -->
      <div class="container-fluid"><!-- {{$store.state.permisos}} -->

        <!-- FILTROS -->
        <!-- <div style="padding:10px;background-color:white;">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group pull-right">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" v-model="editable.options" class="custom-control-input" id="customSwitch3" @change="verOpcionesAvanzadas($event)">
                    <label class="custom-control-label" for="customSwitch3" v-html="'Opciones Avanzadas'"></label>
                </div>
            </div>
            </div>
          </div>
          <div v-bind:class="{'row': true, 'show-options': show.options, 'hide-options': !show.options}">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 15px">
                <dt style="border-bottom: 1px solid #d7d4d4;">Opciones Avanzadas:</dt>
                A continuación puedes seleccionar los diferentes criterios
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                    <label><dt>Fecha Inicio:</dt></label>
                      <date-picker-2 
                          v-model="editable.fecha_inicio"
                          lang="es" 
                          type="date" 
                          format="DD-MM-YYYY"
                          :disabled="lock.fecha_inicio"
                      ></date-picker-2>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label><dt>Fecha Fin:</dt></label>
                    <date-picker-2 
                        v-model="editable.fecha_fin"
                        lang="es"
                        type="date"
                        format="DD-MM-YYYY"
                        :disabled="lock.fecha_fin"
                    ></date-picker-2>
                </div>
            </div>

        </div>
        </div>
        <br> -->

        <!-- CARDS -->
        <!-- <div style="padding:10px;background-color:white;">
          <div class="row">
            <div class="col-lg-3 col-6">
              
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{numberFormat2(resumen.ventas)}}</h3>

                  <p><strong>Ventas</strong></p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
            <div class="col-lg-3 col-6">
              
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{numberFormat2(resumen.compras)}}</h3>

                  <p>Compras</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
            <div class="col-lg-3 col-6">
              
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{numberFormat2(resumen.ingresos)}}</h3>

                  <p>Ingresos</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
            <div class="col-lg-3 col-6">
              
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{numberFormat2(resumen.egresos)}}</h3>

                  <p>Egresos</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
          </div>
        </div> -->
        
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Carné Universitario
                <!-- <button type="button" @click="crear()" class="btn btn-secondary">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button> -->
                <button type="button" class="btn btn-primary pull-right" :disabled="btn.registrar" @click="registrarArticulo()">Guardar</button>
                <!-- <div class="form-group pull-right">
                    <button type="button" class="btn btn-primary pull-right" :disabled="btn.actualizar"  @click="actualizarPerfil()">Guardar</button>
                </div> -->
            </div>
            <div v-bind:class="{'show-container': btn.registrar, 'hide-container': !btn.registrar}">
                    <div class="loader"></div>
                </div>
            <div class="card-body">
                    <!-- <button @click="aumentar">+</button>
                    <button @click="ddisminuir(2)">-</button>
                    <button @click="obtenerCursos">Obtener Cursos</button>
                    <h1>numero {{ numero }}</h1> -->
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <!-- {{editable}} -->
                    <!-- {{btn}} -->
                    <div class="row">
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
                                    placeholder="V###-####"
                                    :disabled="lock.numero_recibo"
                                >
                                <span class="text-error" v-if="errors.numero_recibo">{{errors.numero_recibo}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label><dt>Apellidos Paterno: *</dt></label>
                                <input type="text" v-model="editable.apellido_paterno" class="form-control" placeholder="Apellidos Paterno..." :disabled="lock.apellido_paterno">
                                <span class="text-error" v-if="errors.apellido_paterno">{{errors.apellido_paterno}}</span>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label><dt>Apellidos Materno: *</dt></label>
                                <input type="text" v-model="editable.apellido_materno" class="form-control" placeholder="Apellidos Materno..." :disabled="lock.apellido_materno">
                                <span class="text-error" v-if="errors.apellido_materno">{{errors.apellido_materno}}</span>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label><dt>Nombres: *</dt></label>
                                <input type="text" v-model="editable.nombres" class="form-control" placeholder="Nombres..." :disabled="lock.nombres">
                                <span class="text-error" v-if="errors.nombres">{{errors.nombres}}</span>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label><dt>DNI: *</dt></label>
                                <input type="text" v-model="editable.dni" class="form-control" placeholder="DNI..." :disabled="lock.dni">
                                <span class="text-error" v-if="errors.dni">{{errors.dni}}</span>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label><dt>Escuela Profesional: *</dt></label>
                                <input type="text" v-model="editable.escuela_profesional" class="form-control" placeholder="Escuela Profesional..." :disabled="lock.escuela_profesional">
                                <span class="text-error" v-if="errors.escuela_profesional">{{errors.escuela_profesional}}</span>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label><dt>Correo Institucional: *</dt></label>
                                <input type="text" v-model="editable.correo_institucional" class="form-control" placeholder="correo@unajma.edu.pe..." :disabled="lock.correo_institucional">
                                <span class="text-error" v-if="errors.correo_institucional">{{errors.correo_institucional}}</span>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label><dt>Correo Personal: *</dt></label>
                                <input type="text" v-model="editable.correo_personal" class="form-control" placeholder="correo@gmail.com...">
                                <span class="text-error" v-if="errors.correo_personal">{{errors.correo_personal}}</span>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label><dt>Telefono 1: *</dt></label>
                                <input type="text" v-model="editable.telefono1" class="form-control" placeholder="Telefono...">
                                <span class="text-error" v-if="errors.telefono1">{{errors.telefono1}}</span>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label><dt>Telefono 2: </dt></label>
                                <input type="text" v-model="editable.telefono2" class="form-control" placeholder="Telefono...">
                                <span class="text-error" v-if="errors.telefono2">{{errors.telefono2}}</span>
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
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group pull-right">
                                        <label><dt>¿Duplicado?: * ({{setFecha(editable.fecha_expiracion)}})</dt></label><br>
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
                                        <label><dt>Foto: *</dt></label>
                                        <input 
                                            type="file"
                                            @change="imageChanged"
                                            class="form-control"
                                            accept=".jpeg, .jpg, .png"
                                            ref="cmp_input_image"
                                        >
                                        <span class="text-error" v-if="errors.new_document">{{errors.new_document}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                                        <textarea type="text" v-model="editable.observacion" class="form-control" placeholder="Observacion..." rows="5"></textarea>
                                        <span class="text-error" v-if="errors.observacion">{{errors.observacion}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" :disabled="btn.actualizar"  @click="validarImagenBackend()">Validar</button>
                                    <button type="button" class="btn btn-primary" :disabled="btn.actualizar"  @click="recortar_imagen()">Recortar</button>
                                    <button type="button" class="btn btn-primary" :disabled="btn.actualizar"  @click="cambiarDpi()">DPI</button>
                                    <button type="button" class="btn btn-primary" :disabled="btn.actualizar"  @click="obtenerFotoAnterior()">Foto Anterior</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label><dt>Imagen:</dt></label>
                                    <div class="form-group">
                                        <img id="image" width="240" height="288"/>
                                        <!-- <img id="imagen" width="240" height="288"/> -->
                                    </div>
                                </div>        
                            </div>
                        </div>

                        <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div>
                                        <h5>Imagen Original:</h5>
                                        <img width="500" height="400" style="height" ref="image" :src="urlImage" alt="Cropper Image" />
                                        <button type="button" @click="cropImage">Recortar Imagen</button>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div v-if="croppedImage">
                                        <h5>Imagen Recortada:</h5>
                                        <img width="240" height="288" :src="croppedImage" alt="Cropped Preview" />
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    

                    

                    

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pull-right">
                                <button type="button" class="btn btn-primary" :disabled="btn.registrar" @click="registrarArticulo()">Guardar</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <!-- Recortar Imagen -->
        <v-formulario-recortar-imagen 
            v-if="recortar_nuevo._estado=='creando'" 
            v-model="recortar_nuevo"
            ref="cmp_recortar_imagen"
            :var_config="var_config"
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
    </main>
</template>
<script>
/**
 * Unificacion de los modelos de persona en una sola vista
 */

const MatriculadoBusqueda = () => import("@/components/referencias/MatriculadoBusqueda");
const FormularioRecortarImagen = () => import("@/components/erp/inscrito/FormularioRecortarImagen");
const FormularioValidacion = () => import("@/components/erp/inscrito/FormularioValidacion");

//cargamos el componente solo cuando se cree el componente
import Chart from 'chart.js';

import Croppie from "croppie";
import "croppie/croppie.css";

import Cropper from "cropperjs";
import "cropperjs/dist/cropper.css";

export default {
  components: {
    "matriculado-busqueda": MatriculadoBusqueda,
    "v-formulario-recortar-imagen": FormularioRecortarImagen,
    "v-formulario-validacion": FormularioValidacion,
  },
  data() {
    return {
      ruta: "venta",
      labels: [],
      data_ingresos: [],
      data_salidas: [],
      data_pie: [],
      resumen: {
        ventas:0,
        compras:0,
        ingresos:0,
        egresos:0
      },
      lock: {},
      editable: {
        tipo_documento: 'codigo',
        credencial_validado: 'no_validado',
        new_document: ''
      },
      recortar_nuevo: {},
      validacion_nuevo: {},
      show: {
        options: false
      },
      errors:{

      },
      btn: {
        registrar: false,
        // actualizar: false,
        // importar: false,
      },
      lock: {},
    text: {},
      cropInstance: null,
      croppedImage: null,
      urlImage: "/storage/imagen_prueba.jpg"
    };
  },
  mounted() {
    // this.obtenerVentasUtilidades();
    // this.obtenerIngresosSalidas();
    // this.construiGraficoTorta();



    // this.construiGraficoLineal();

    // this.initializeCropper();
    // Carga una imagen de ejemplo
    // this.loadImage("https://media.istockphoto.com/id/1952253409/es/foto/skyline-paris.webp?a=1&b=1&s=612x612&w=0&k=20&c=Wp6eDtssDcs4M1Mv4I4o-1hQM21PSA6PZUPFEJSVqiI=");

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
            this.lock['correo_institucional'] = true;
        }else{
            //Editar
        }

    // this.initCropper();

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
        //   me.$emit('guardado');
        //   me.cerrarModal();
        let datos = response.data;console.log(datos);
        let estudiante = me.editable.apellido_paterno+" "+me.editable.apellido_materno+" "+me.editable.nombres+" - "+me.editable.codigo_estudiante;
        me.btn['registrar'] = false;
        me.reiniciarVariables();
        
        me.$forceUpdate();
          swal(
              'Solicitud registrada',
              "El estudiante "+estudiante+" ha registrado su trámite con éxito",
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
    reiniciarVariables(){
        let me = this;
        me.editable = Object.assign({
            tipo_documento: 'codigo',
            credencial_validado: 'no_validado',
            _foto_validado: false,
            _duplicado: false,
        },{});

        me.text._duplicado = 'NO';
        me.text._validado = 'NO';

        me.$refs.cmp_input_image.value='';
        document.getElementById("image").src='';
    },
    async imageChanged(e) {
        let me = this;
        let is_valid = await this.validarImagen(e);console.log("is_valid",is_valid)
        if(!is_valid) return;
        console.log("charging image")
        let propiedades = e.target.files[0];

        var fileReader = new FileReader();
        var imgtag = document.getElementById("image");


        fileReader.readAsDataURL(e.target.files[0]);
        fileReader.onload = e => {
            me.editable.name_document = propiedades.name;
            me.editable.new_document = e.target.result;
            imgtag.src = e.target.result;
            // this.loadImage(e.target.result);
            // this.cropperInstance.replace(e.target.result);
            // this.$nextTick(() => {
            //     this.initCropper(); // Initialize Cropper after image loads
            // });
        };
        me.$forceUpdate();
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
    /* getCroppedImage() {
      this.cropInstance.result({ type: "base64", size: "viewport" }).then((result) => {
          this.croppedImage = result;
      });
    },
    initializeCropper() {
        this.cropInstance = new Croppie(this.$refs.cropper, {
            viewport: {
                width: 240, // Ajusta el ancho del recorte
                height: 288, // Ajusta el alto del recorte
                type: "square", // Cambiar a 'circle' si es necesario
            },
            boundary: {
                width: 400,
                height: 400,
            },
            enableResize: false, // Habilita el ajuste de tamaño
            enableOrientation: true,
            guides: true,
            cropBoxResizable: false
        });
    },
    loadImage(imageUrl) {
        this.cropInstance.bind({
            url: imageUrl,
        });
    }, */




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
      if (this.cropperInstance) {
        const croppedCanvas = this.cropperInstance.getCroppedCanvas();
        this.croppedImage = croppedCanvas.toDataURL("image/png"); // Convert to base64
      }
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



    obtenerVentasUtilidades(){
      let me = this;
      axios.post('dashboard/ventas_utilidades',this.editable).then(function (response){
          me.labels = response.data.fechas;
          me.data_ingresos = response.data.ventas;
          me.data_salidas = response.data.utilidades;
          me.construiGraficoLineal();
          me.$forceUpdate();
      })
      .catch(function (error){
          console.log(error);
      });
    },
    obtenerIngresosSalidas(){
        let me = this;

        axios.post('dashboard',this.editable).then(function (response){
            me.resumen = response.data.movimientos;
            // console.log(respuesta);
            // me.labels = respuesta.ingresos.dias;
            // me.data_ingresos = respuesta.ingresos.cantidades;
            // me.data_salidas = respuesta.salidas.cantidades;
            // me.construiGraficoLineal();

            // let suma_ingresos = 0, suma_salidas=0;
            // me.data_ingresos.forEach(e => suma_ingresos +=e);
            // me.data_salidas.forEach(e => suma_salidas +=e);
            // console.log('suma_ingresos',suma_ingresos);
            // console.log('suma_salidas',suma_salidas);

            // me.data_pie.push(suma_ingresos);
            // me.data_pie.push(suma_salidas);

            // me.construiGraficoTorta();
            me.$forceUpdate();
        })
        .catch(function (error){
            console.log(error);
        });
    },
    construiGraficoLineal(){
      var c = document.getElementById("revenue-chart-canvas");
      var ctx = c.getContext("2d");  
        let vueCanvas = ctx;

        let salesChartData = {
          // labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          labels: this.labels,
          datasets: [
            {
              label: 'Ventas',
              // backgroundColor: 'rgba(60,141,188,0.9)',
              backgroundColor: 'rgba(3,166,19,0.3)',
              borderColor: 'rgba(81,131,254,0.8)',
              pointRadius: 5,
              pointColor: '#3b8bba',
              pointBackgroundColor: 'rgba(255,255,255,1)',
              pointBorderWidth: 2,
              pointHoverRadius: 8,
              pointStrokeColor: 'rgba(60,141,188,1)',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              // data: [28, 48, 40, 19, 86, 27, 90],
              data: this.data_ingresos,
            },
            {
              label: 'Utilidades',
              // backgroundColor: 'rgba(210, 214, 222, 1)',
              backgroundColor: 'rgba(181, 40, 212, 0.3)',
              borderColor: 'rgba(190, 137, 236, 0.8)',
              pointRadius: 5,
              pointColor: 'rgba(210, 214, 222, 1)',
              pointBackgroundColor: 'rgba(255,255,255,1)',
              pointBorderWidth: 2,
              pointHoverRadius: 8,
              pointStrokeColor: '#c1c7d1',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              // data: [65, 59, 80, 81, 56, 55, 40],
              data: this.data_salidas
            }
          ]
        }

        let salesChartOptions = {
          maintainAspectRatio: false,
          responsive: true,
          legend: {
            display: true
          },
          scales: {
            xAxes: [{
              gridLines: {
                display: true
              },
            }],
            yAxes: [{
              gridLines: {
                display: true
              },
            }]
          },
          tooltips: {
            backgroundColor: 'rgba(0,0,0,0.8)',
          },
        }

        var salesChart = new Chart(vueCanvas, { // lgtm[js/unused-local-variable]
          type: 'line',
          data: salesChartData,
          options: salesChartOptions
        })
    },
    construiGraficoTorta(){
      var c = document.getElementById("sales-chart-canvas");
      var ctx = c.getContext("2d");  
      let vueCanvas = ctx;

      // var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
      var pieData = {
        labels: [
          'Ingresos',
          'Salidas',
          // 'Mail-Order Sales'
        ],
        datasets: [
          {
            // data: [30, 12/* , 20 */],
            data: this.data_pie,
            backgroundColor: ['#03a613', '#b528d4'/* , '#f39c12' */]
          }
        ]
      }
      var pieOptions = {
        legend: {
          display: false
        },
        maintainAspectRatio: false,
        responsive: true
      }
      // Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      // eslint-disable-next-line no-unused-vars
      var pieChart = new Chart(vueCanvas, { // lgtm[js/unused-local-variable]
        type: 'doughnut',
        data: pieData,
        options: pieOptions
      })
    },
    numberFormat2(number){
      return numberFormat2(number);
    },
    verOpcionesAvanzadas(e){
      if(this.show.options){
        this.show.options = false;
        this.editable.fecha_inicio = now(true);
        this.editable.fecha_fin = now(true);
      }else{
        this.show.options = true;
      }

      this.$forceUpdate()
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
            if(e.telefono1) this.editable.telefono1 = e.telefono1;
            if(e.telefono2) this.editable.telefono2 = e.telefono2;
            if(e.estudiante_id) this.editable.estudiante_id = e.estudiante_id;


            if(e.tipo_tramite=='nuevo'){
                this.editable._duplicado = false;
                this.text._duplicado = "NO";
            }
            else if(e.tipo_tramite=='duplicado'){
                this.editable._duplicado = true;
                this.text._duplicado = "SI";
            }

            if(e.fecha_expiracion) this.editable.fecha_expiracion = e.fecha_expiracion;
            else this.editable.fecha_expiracion = '';

            this.editable.fecha_inicio_tramite = now();
            
        }else{
            alert("El alumno no ha sido matriculado. Puede volver a realizar la busqueda");
        }

        this.$forceUpdate();
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
      this.var_config = {
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
      this.var_config = {
          title: 'Resultado de Validacion',
          tipo_accion: 'registrar'
      };
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
    setFecha(date){
        if(date)
            return date.split("-").reverse().join("-");
        return "";
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
    obtenerFotoAnterior(){
      let me = this;
    //   me.btn['registrar'] = true;

        if(!me.editable.estudiante_id){
            swal(
                'Advertencia',
                'Primero debe seleccionar un estudiante',
                'warning'
            )
            return;
        }

      let _editable = {estudiante_id: this.editable.estudiante_id}

      axios({
                url:'/inscrito/obtener_foto_anterior_estudiante',
                method: 'POST',
                responseType: 'blob',
                data: _editable
      }).then(function (response){
          me.btn['registrar'] = false;

          if (response.data.type.startsWith('image/')) {
            // Es una imagen, seguimos adelante
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
                  'Carga de imagen anterior correcta!',
                  'success'
              )
            }
            me.$forceUpdate();    
          } else {
              // No es una imagen, probablemente un error en texto
              console.error('Se recibió un tipo de archivo inesperado:', response.data.type);
              // Opcionalmente puedes intentar leerlo como texto:
              const reader = new FileReader();
              reader.onload = function() {
                  console.error('Contenido del error:', reader.result);
              };
              reader.readAsText(response.data);
              swal(
                  'Advertencia',
                  'Foto anterior NO ENCONTRADA!',
                  'warning'
              )
          }

          
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
  },
  watch: {
    "editable.fecha_inicio": function(newvalue, oldvalue) {
        if (newvalue) {
            // this.obtenerIngresosSalidas();
            // this.obtenerVentasUtilidades();
        }
        this.$forceUpdate();
    },
    "editable.fecha_fin": function(newvalue, oldvalue) {
        if (newvalue) {
            // this.obtenerIngresosSalidas();
            // this.obtenerVentasUtilidades();
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

.text-error{
    color: red !important;
    font-weight: bold;
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