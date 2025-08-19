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
                <button type="button" class="btn btn-primary pull-right" v-if="show.boton_guardar" :disabled="btn.actualizar"  @click="registrarSolicitud()">Guardar</button>
                <!-- <div class="form-group pull-right">
                    <button type="button" class="btn btn-primary pull-right" :disabled="btn.actualizar"  @click="registrarSolicitud()">Guardar</button>
                </div> -->
            </div>
            <div class="card-body">
                    <!-- <button @click="aumentar">+</button>
                    <button @click="ddisminuir(2)">-</button>
                    <button @click="obtenerCursos">Obtener Cursos</button>
                    <h1>numero {{ numero }}</h1> -->

                  {{editable}}
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <h5>Datos</h5><hr>
                        <div class="form-group">
                            <label class="col-form-label"><dt>Estudiante: </dt></label><br>
                            <label class="col-form-label align-center">{{editable_lectura.apellido_paterno}} {{editable_lectura.apellido_materno}} {{editable_lectura.nombres}}</label><br>
                            <label class="col-form-label"><dt>Codigo: </dt></label><br>
                            <label class="col-form-label">{{editable_lectura.codigo_estudiante}}</label><br>
                            <label class="col-form-label"><dt>Escuela Profesional: </dt></label><br>
                            <label class="col-form-label">{{editable_lectura.escuela_profesional}}</label>
                            <label class="col-form-label"><dt>Correo Institucional: </dt></label><br>
                            <label class="col-form-label">{{editable_lectura.correo_institucional}}</label>
                            <label class="col-form-label"><dt>Fecha Expiración: </dt></label><br>
                            <label class="col-form-label">{{formatDate(editable_lectura.fecha_expiracion)}}</label>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        <h5>Trámite de Carné Universitario - {{editable_lectura.convocatoria}}</h5><hr>

                        <!-- Dashboard Estudiante Matriculado No Inscrito -->
                        <!-- {{dashboard_estudiante_estado}} -->
                        <!--
                          :var_config="var_config" 
                          @cerrarModal="cerrarModalDashboardEstudiante"
                          -->
                        <v-dashboard-estudiante-sin-convocatoria 
                            v-if="dashboard_estudiante_estado._estado=='sin_convocatoria'"
                            v-model="dashboard_estudiante_estado"
                            ref="cmp_dashboard_estudiante_estado"
                        ></v-dashboard-estudiante-sin-convocatoria>

                        <v-dashboard-estudiante-no-matriculado 
                            v-if="dashboard_estudiante_estado._estado=='no_matriculado'"
                            v-model="dashboard_estudiante_estado"
                            ref="cmp_dashboard_estudiante_estado"
                        ></v-dashboard-estudiante-no-matriculado>

                        <v-dashboard-estudiante-matriculado-no-inscrito 
                            v-if="dashboard_estudiante_estado._estado=='matriculado_no_inscrito'"
                            v-model="dashboard_estudiante_estado"
                            ref="cmp_dashboard_estudiante_estado"
                            @guardado="obtenerInscripcionEstudiante"
                        ></v-dashboard-estudiante-matriculado-no-inscrito>

                        <v-dashboard-estudiante-matriculado-inscrito 
                            v-if="dashboard_estudiante_estado._estado=='matriculado_inscrito'"
                            v-model="dashboard_estudiante_estado"
                            ref="cmp_dashboard_estudiante_estado"
                            @guardado="obtenerInscripcionEstudiante"
                        ></v-dashboard-estudiante-matriculado-inscrito>

                        <!-- <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        {{editable}}
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
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
                                    <label v-if="editable_lectura.estado_tramite=='inscrito'" class="col-form-label"><span class="badge badge-success">{{editable_lectura.estado_tramite}}</span></label>
                                    <label v-if="editable_lectura.estado_tramite=='no_inscrito'" class="col-form-label"><span class="badge badge-secondary">{{editable_lectura.estado_tramite}}</span></label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Tipo Solicitud: </dt></label>
                                    <label v-if="editable_lectura.tipo_tramite=='nuevo'" class="col-form-label"><span class="badge badge-secondary">Nuevo</span></label>
                                    <label v-if="editable_lectura.tipo_tramite=='duplicado'" class="col-form-label"><span class="badge badge-success">Duplicado</span></label>
                                </div>
                            </div>

                            <div v-if="editable_lectura.foto_anterior" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                                            <img v-if="text._usar_foto_anterior=='NO' && editable_lectura.estado_tramite=='Pendiente'" id="student_image" width="240" height="288"/>
                                            <img v-if="text._usar_foto_anterior=='SI' && editable_lectura.estado_tramite=='Pendiente'" id="image" width="240" height="288" v-bind:src="'/storage/'+editable_lectura.foto_anterior"/>
                                            <img v-if="editable_lectura.estado_tramite=='inscrito'" id="image" width="240" height="288" v-bind:src="'/storage/'+editable.folder+'/1_validado/'+editable.foto"/>
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
                                    <button type="button" class="btn btn-primary" v-if="show.boton_guardar" :disabled="btn.actualizar"  @click="registrarSolicitud()">Guardar</button>
                                </div>
                            </div>
                        </div>

                        </form> -->
                    </div>
                </div>
            </div>
        </div>
      </div>
    </main>
</template>
<script>
/**
 * Unificacion de los modelos de persona en una sola vista
 */

const MatriculadoBusqueda = () => import("@/components/referencias/MatriculadoBusqueda");
const DashboardEstudianteSinConvocatoria = () => import("@/components/referencias/DashboardEstudianteSinConvocatoria");
const DashboardEstudianteNoMatriculado = () => import("@/components/referencias/DashboardEstudianteNoMatriculado");
const DashboardEstudianteMatriculadoNoInscrito = () => import("@/components/referencias/DashboardEstudianteMatriculadoNoInscrito");
const DashboardEstudianteMatriculadoInscrito = () => import("@/components/referencias/DashboardEstudianteMatriculadoInscrito");

//cargamos el componente solo cuando se cree el componente
import Chart from 'chart.js';

import Croppie from "croppie";
import "croppie/croppie.css";

import Cropper from "cropperjs";
import "cropperjs/dist/cropper.css";

export default {
  components: {
    "matriculado-busqueda": MatriculadoBusqueda,
    "v-dashboard-estudiante-sin-convocatoria": DashboardEstudianteSinConvocatoria,
    "v-dashboard-estudiante-no-matriculado": DashboardEstudianteNoMatriculado,
    "v-dashboard-estudiante-matriculado-no-inscrito": DashboardEstudianteMatriculadoNoInscrito,
    "v-dashboard-estudiante-matriculado-inscrito": DashboardEstudianteMatriculadoInscrito,
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
        fecha_inicio: now(true),
        fecha_fin: now(true),
        tipo_documento: "codigo"
      },
      editable_lectura: {
        'estado_tramite': 'Pendiente'
      },
      show: {
        options: false
      },
      errors:{

      },
      btn: {},
      lock: {},
    text: {},
      cropInstance: null,
      croppedImage: null,
      urlImage: "/storage/imagen_prueba.jpg",
      show: {},
      dashboard_estudiante_estado: {}
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

    me.text._usar_foto_anterior = "NO";

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
    this.obtenerDatosEstudiante();
    this.$forceUpdate();
  },
  methods: {
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
    obtenerDatosEstudiante() {
        let me = this;
        let url = '/matricula_estudiante/busqueda/convocatoria';

        axios.get(url).then(function (response){
            // console.log(response.data)

            let d_estudiante = response.data.estudiante;//console.log(d_estudiante)
            
            if(d_estudiante.escuela_profesional) me.editable_lectura.escuela_profesional = d_estudiante.escuela_profesional;
            if(d_estudiante.codigo_estudiante) me.editable_lectura.codigo_estudiante = d_estudiante.codigo_estudiante;
            if(d_estudiante.apellido_paterno) me.editable_lectura.apellido_paterno = d_estudiante.apellido_paterno;
            if(d_estudiante.apellido_materno) me.editable_lectura.apellido_materno = d_estudiante.apellido_materno;
            if(d_estudiante.nombres) me.editable_lectura.nombres = d_estudiante.nombres;
            if(d_estudiante.estudiante_id) me.editable_lectura.estudiante_id = d_estudiante.estudiante_id;
            if(d_estudiante.correo_institucional) me.editable_lectura.correo_institucional = d_estudiante.correo_institucional;

            // Validar vigencia de la convocatoria
            if(response.data.estado_convocatoria=='activo'){
                if(response.data.convocatoria)
                    me.editable_lectura.convocatoria = "Convocatoria: "+response.data.convocatoria;

                me.obtenerDatosEstudianteMatricula();
            }else if(response.data.estado_convocatoria=='inactivo'){
                me.editable_lectura.convocatoria = "Listado";
                me.cambiarEstado('sin_convocatoria',{});
            }

            me.$forceUpdate();
        }).catch(function (error){
            console.log(error);
        });

    },
    obtenerDatosEstudianteMatricula() {
        let me = this;
        let url = '/matricula_estudiante/busqueda/matricula';

        // console.log('numero_documento',this.num_documento)


        axios.get(url).then(function (response){
            // console.log(response.data)
            
            let d_matricula = response.data.matricula;
            let datos_inscripcion_estudiante = response.data.inscripcion_estudiante;

            if(d_matricula){
                if(d_matricula.tipo_tramite) me.editable_lectura.tipo_tramite = d_matricula.tipo_tramite;
                if(d_matricula.fecha_expiracion) me.editable_lectura.fecha_expiracion = d_matricula.fecha_expiracion;
            }

          if(response.data.estado_matricula) me.editable_lectura.estado_matricula = response.data.estado_matricula;


          // Convocatoria
          if(response.data.convocatoria) me.editable_lectura.convocatoria = "Convocatoria: "+response.data.convocatoria;
          else me.editable_lectura.convocatoria = "-";

          //Estado Completo(Matricula e Inscripcion)
          let estado_matricula_tramite = response.data.estado_matricula + '_' + (response.data.estado_tramite?response.data.estado_tramite:"");
          console.log('estado_matricula_tramite',estado_matricula_tramite)
          me.cambiarEstado(estado_matricula_tramite, {
                                // No inscrito
                                estado_tramite: response.data.estado_tramite,
                                foto_anterior: response.data.foto_anterior,
                                //Inscrito
                                datos_inscrito: datos_inscripcion_estudiante
                              });

          // Estado Tramite
          if(response.data.estado_tramite) {
            me.editable_lectura.estado_tramite = response.data.estado_tramite;
            if(me.editable_lectura.estado_tramite=='inscrito'){
              me.editable.numero_recibo = datos_inscripcion_estudiante.numero_recibo;
              me.editable.correo_personal = datos_inscripcion_estudiante.correo_personal;
              me.editable.telefono1 = datos_inscripcion_estudiante.telefono1;
              me.editable.telefono2 = datos_inscripcion_estudiante.telefono2;
              me.editable.folder = datos_inscripcion_estudiante.folder;
              me.editable.foto = datos_inscripcion_estudiante.foto;
            }
          }else{
            me.editable_lectura.estado_tramite = "-";
          }

          // Foto Anterior
          if(response.data.foto_anterior) me.editable_lectura.foto_anterior = response.data.foto_anterior;
          else me.editable_lectura.foto_anterior = "-";


          me.$forceUpdate();
        })
        .catch(function (error){
            console.log(error);
        });
    },
    obtenerInscripcionEstudiante() {
        let me = this;
        let url = '/matricula_estudiante/busqueda/inscripcion_estudiante';

        // console.log('numero_documento',this.num_documento)


        axios.get(url).then(function (response){
          console.log(response.data)
          let estado_matricula_tramite = me.editable_lectura.estado_matricula+"_"+response.data.estado_tramite;
          // console.log('estado_matricula_tramite',estado_matricula_tramite)
          me.cambiarEstado(estado_matricula_tramite, {
                              estado_tramite: response.data.estado_tramite,
                              datos_inscrito: response.data.inscripcion_estudiante
                          });
          me.$forceUpdate();
        })
        .catch(function (error){
            console.log(error);
        });
    },
    cambiarEstado(estado_matricula_tramite, datos){
        let me = this;
        if(estado_matricula_tramite == 'sin_convocatoria'){
            console.log('estado_matricula_tramite',estado_matricula_tramite)
            me.dashboard_estudiante_estado = Object.assign({
                _estado: 'sin_convocatoria',
            },{});
        }else if(estado_matricula_tramite == 'no_matriculado_'){
            console.log('estado_matricula_tramite',estado_matricula_tramite)
            me.dashboard_estudiante_estado = Object.assign({
                _estado: 'no_matriculado',
            },{});
        }else if(estado_matricula_tramite == 'matriculado_no_inscrito'){
            console.log('estado_matricula_tramite',estado_matricula_tramite)
            me.dashboard_estudiante_estado = Object.assign({
                _estado: 'matriculado_no_inscrito',
                estado_tramite: datos.estado_tramite,
                foto_anterior: datos.foto_anterior,
                tipo_tramite: me.editable_lectura.tipo_tramite,
            },{});
        }else if(estado_matricula_tramite == 'matriculado_inscrito'){
            console.log('estado_matricula_tramite',estado_matricula_tramite)
            me.dashboard_estudiante_estado = Object.assign({
                _estado: 'matriculado_inscrito',
                estado_tramite: datos.estado_tramite,
                numero_recibo: datos.datos_inscrito.numero_recibo,
                correo_personal: datos.datos_inscrito.correo_personal,
                telefono1: datos.datos_inscrito.telefono1,
                telefono2: datos.datos_inscrito.telefono2,
                folder: datos.datos_inscrito.folder,
                foto: datos.datos_inscrito.foto,
                tipo_tramite: datos.datos_inscrito.tipo_tramite,
                foto_validado: datos.datos_inscrito.foto_validado,
            },{});
        }
    },
    actualizarSolicitud(){
        let me = this;
        this.btn['actualizar'] = true;

        axios.put('/inscrito_estudiante/actualizar',this.editable).then(function (response){
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
  formatDate(e){
    if(e) return e.split("-").reverse().join("-");
    return "-";
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
            if(e.estudiante_id) this.editable.estudiante_id = e.estudiante_id;
            
        }else{
            alert("El alumno no ha sido matriculado. Puede volver a realizar la busqueda");
        }

        this.$forceUpdate();
    },
    changeTipoFotoAnterior(e){
        if(e.target.checked){
          this.text._usar_foto_anterior = 'SI';
        }
        else this.text._usar_foto_anterior = 'NO';
        this.$forceUpdate();
    },
    setVariablesSegunEstadoTramite(e){
      if(e == 'inscrito'){
        this.lock['numero_recibo'] = true;
        this.lock['correo_personal'] = true;
        this.lock['telefono1'] = true;
        this.lock['telefono2'] = true;
        this.lock['_usar_foto_anterior'] = true;

        this.show['boton_guardar'] = false;
        this.show['_new_document'] = false;
        this.show['_new_voucher'] = false;
      }
      this.$forceUpdate();
    }
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
    "editable._usar_foto_anterior": function(newvalue, oldvalue) {
        if (newvalue) {
            this.lock._new_document = true;
        }else{
            this.lock._new_document = false;
        }
        this.$forceUpdate();
    },
    "editable_lectura.estado_tramite": function(newvalue, oldvalue) {
        if (newvalue) {console.log('watcher estado_tramite')
          this.setVariablesSegunEstadoTramite(newvalue);
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