<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Documentos</li>
                <li class="breadcrumb-item"><a href="#">Generar</a></li>
                <li class="breadcrumb-item active">Documento</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <i class="fa fa-align-justify"></i> Generar Documento: 
                                <!-- <button type="button" @click="crear()" class="btn btn-secondary">
                                    <i class="icon-plus"></i>&nbsp;Nuevo
                                </button> -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="pull-right">
                                    <!-- <button type="button" @click="descargarInscritosOficial()" class="btn btn-success"> Xlsx Oficial</button>
                                    <button type="button" @click="descargarInscritos()" class="btn btn-success"> Xlsx</button>
                                    <button type="button" @click="descargarInscritosAnulado()" class="btn btn-success"> Xlsx Anulado</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8"><!-- {{editable}} -->
                                <div class="row">
                                    <div class="col-md-4" style="padding-top: 5px;">
                                        <label><dt>Estudiante: </dt></label>    
                                    </div>
                                    <div class="col-md-8">
                                        <estudiante-select 
                                            v-model="editable.estudiante_id"
                                        ></estudiante-select>
                                        <span class="text-error" v-if="errors.estudiante_id">{{errors.estudiante_id}}</span>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4" style="padding-top: 5px;">
                                        <label><dt>Tipo: </dt></label>    
                                    </div>
                                    <div class="col-md-8">
                                        <tipo-documento-academico-select 
                                            v-model="editable.tipo"
                                        ></tipo-documento-academico-select>
                                        <span class="text-error" v-if="errors.tipo">{{errors.tipo}}</span>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4" style="padding-top: 5px;">
                                        <label><dt>Fecha Primera Matricula: </dt></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input 
                                            type="text" 
                                            v-model="editable._fecha_primera_matricula" 
                                            class="form-control" 
                                            placeholder="Fecha Primera Matricula"
                                            :disabled="lock._fecha_primera_matricula"
                                        >
                                        <span class="text-error" v-if="errors._fecha_primera_matricula">{{errors._fecha_primera_matricula}}</span>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4" style="padding-top: 5px;">
                                        <label><dt>Ciclo: </dt></label>
                                    </div>
                                    <div class="col-md-8">
                                        <ciclo-select 
                                            v-model="editable.ciclo"
                                            ref="cmp_ciclo"
                                            :disabled="lock.ciclo"
                                        ></ciclo-select>
                                        <span class="text-error" v-if="errors.ciclo">{{errors.ciclo}}</span>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4" style="padding-top: 5px;">
                                        <label><dt>Periodo: </dt></label>
                                    </div>
                                    <div class="col-md-8">
                                        <periodo-academico-select
                                            v-model="editable._periodo"
                                            ref="cmp_periodo"
                                            :disabled="lock.periodo"
                                            @setValue="setValue"
                                        ></periodo-academico-select>
                                        <span class="text-error" v-if="errors.periodo">{{errors.periodo}}</span>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4" style="padding-top: 5px;">
                                        <label><dt></dt></label>
                                    </div>
                                    <div class="col-md-8">
                                        <button type="button" @click="listarSolicitudDocumento(1, '', 'nombre')" class="btn btn-warning">
                                            <i class="icon-plus"></i>&nbsp;Mostrar Historial
                                        </button>
                                        <button type="button" @click="registrarSolicitud()" class="btn btn-warning">
                                            <i class="icon-plus"></i>&nbsp;Generar
                                        </button>
                                    </div>
                                </div><br>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Codigo</th>
                                    <th>Estudiante</th>
                                    <th>N° Documento</th>
                                    <th>Tipo</th>
                                    <th>Fecha Procesado</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arraySolicitud"><th colspan="8" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="inscrito in arraySolicitud" :key="inscrito.id">
                                    <td>
                                        <div class="">
                                            <a href="#" data-toggle="dropdown">
                                                <img src="images/options.svg" style="width: 30px; height: auto;"/>
                                            </a>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#" @click="descargarConstancia(inscrito)"><img src="images/ver.svg" style="width: 20px; height: 20px;"/>   Descargar</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td v-text="inscrito.codigo_estudiante"></td>
                                    <td v-text="inscrito.apellido_paterno+' '+inscrito.apellido_materno+' '+inscrito.nombres"></td>
                                    <td v-text="inscrito.num_correlativo.toString().padStart(5,'0')+'-'+inscrito.anio"></td>
                                    <td v-if="inscrito.tipo=='constancia_primera_matricula'" v-text="'Constancia Primera Matricula'"></td>
                                    <td v-if="inscrito.tipo=='constancia_matricula'" v-text="'Constancia  Matricula'"></td>
                                    <td v-text="inscrito.fecha_procesado"></td>
                                    <td>
                                        <div>
                                            <span class="badge badge-success">Atendido</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->

            <!-- Nuevo -->
            <v-formulario-documento-enviado 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_inscrito"
                :var_config="var_config"
                @guardado="listarSolicitudDocumento(1, '', 'nombre')"
            ></v-formulario-documento-enviado>

            <!-- Editar -->
            <v-formulario-editar-inscrito 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_inscrito"
                :var_config="var_config"
                @guardado="listarSolicitudDocumento(1, '', 'nombre')"
            ></v-formulario-editar-inscrito>

            <!-- Anular -->
            <v-formulario-anular-inscrito 
                v-if="editable._estado=='anulando'" 
                v-model="editable"
                ref="cmp_anular_inscrito"
                :var_config="var_config"
                @guardado="listarSolicitudDocumento(1, '', 'nombre')"
            ></v-formulario-anular-inscrito>

            <!-- Ver -->
            <v-ver-documento-enviado 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_inscrito"
                :var_config="var_config"
            ></v-ver-documento-enviado>

            <!-- Enviar Facultad -->
            <v-formulario-documento-enviar-facultad 
                v-if="enviar_editable._estado=='enviando'" 
                v-model="enviar_editable"
                ref="cmp_ver_inscrito"
                :var_config="var_config"
                @guardado="listarSolicitudDocumento(1, '', 'nombre')"
            ></v-formulario-documento-enviar-facultad>
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioDocumentoProcesado = () => import("@/components/erp/documento/FormularioDocumentoProcesado");
const VerDocumentoEnviadoPersonal = () => import("@/components/erp/documento/VerDocumentoEnviadoPersonal");
const FormularioDocumentoEnviarFacultad = () => import("@/components/erp/documento/FormularioDocumentoEnviarFacultad");

const EstudianteSelect = () => import("@/components/referencias/EstudianteSelect");
const TipoDocumentoAcademicoSelect = () => import("@/components/referencias/TipoDocumentoAcademicoSelect");
const CicloSelect = () => import("@/components/referencias/CicloSelect");
const PeriodoAcademicoSelect = () => import("@/components/referencias/PeriodoAcademicoGeneralSelect");

export default {
    components: {
        "v-formulario-documento-enviado": FormularioDocumentoProcesado,
        "v-ver-documento-enviado": VerDocumentoEnviadoPersonal,
        "v-formulario-documento-enviar-facultad": FormularioDocumentoEnviarFacultad,

        "estudiante-select": EstudianteSelect,
        "tipo-documento-academico-select": TipoDocumentoAcademicoSelect,
        "ciclo-select": CicloSelect,
        "periodo-academico-select": PeriodoAcademicoSelect,
    },
    data(){
        return {
            nuevo: {},
            editable: {
                tipo: 'constancia_primera_matricula'
            },
            precio_editable: {},
            ver_editable: {},
            enviar_editable: {},
            show: {},
            var_config: {},
            arraySolicitud: [],
            pagination: {
                'total' : 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0, 
                'to' : 0,
            },
            offset: 3,
            criterio: 'inscritos.nombre',
            buscar: '',
            per_page: 50,
            order_by: 'created_at',
            mode_order: 'desc',
            errors: {},
            lock: {},
            btn: {}
        }
    },
    computed:{
        isActived: function(){
            return this.pagination.current_page;
        },
        pagesNumber: function(){
            if(!this.pagination.to){
                return [];
            }

            var from = this.pagination.current_page - this.offset;
            if(from < 1){
                from = 1;
            }

            var to = from + (this.offset * 2);
            if(to >= this.pagination.last_page){
                to = this.pagination.last_page;
            }

            var pagesArray = [];
            while(from <= to){
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    mounted() {
        console.log('Component mounted.')

        this.cambiarTipoDocumento(this.editable.tipo);
        // this.listarSolicitudDocumento(1, this.buscar, this.criterio);
    },
    methods: {
        listarSolicitudDocumento(page, buscar, criterio){
            let me = this;
            // var url = '/solicitud_documento?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;

            if(!me.editable.estudiante_id){
                alert('Seleccione el estudiante')
                return;
            }

            axios.post('/solicitud_documento',{
                page: page,
                buscar: buscar,
                criterio: criterio,
                per_page: this.per_page,
                order_by: this.order_by,
                mode_order: this.mode_order,
                estudiante_id: this.editable.estudiante_id,
            }).then(function (response){
            
                var respuesta = response.data;
                me.arraySolicitud = respuesta.solicitudes_documentos.data;
                me.pagination = respuesta.pagination;

                if(me.arraySolicitud.length==0) me.show['arraySolicitud'] = true;
                else me.show['arraySolicitud'] = false;
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
        registrarSolicitud(){
            let me = this;
            this.errors = [];
            this.btn['registrar'] = true;

            if(me.editable.tipo == 'constancia_primera_matricula'){
                if(!Date.parse(me.editable._fecha_primera_matricula.split('/').reverse().join('/'))){
                    alert('Debe ingresar una fecha de primera matricula valida');
                    return;
                }
            }
            
            me.editable.fecha_primera_matricula = me.editable._fecha_primera_matricula.split('/').reverse().join('-');
            axios.post('/solicitud_documento/registrar',this.editable).then(function (response){
                // me.$emit('guardado');
                // me.cerrarModal();

                swal(
                    'Registrado',
                    'El tramite ha sido registrado con exito',
                    'success'
                )

                me.listarSolicitudDocumento(1, me.buscar, me.criterio);
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
        cambiarPagina(page, buscar, criterio){
            let me = this;
            // Actualiza la pagina actual
            me.pagination.current_page = page;
            // Envia la peticion para visualizar la data de esta pagina
            me.listarSolicitudDocumento(page, buscar, criterio);
        },
        desactivarInscrito(id){
            swal({
            title: 'Esta seguro de desactivar esta inscrito?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                let me = this;

                axios.put('/inscrito/desactivar',{
                    id: id,
                }).then(function (response){
                    me.listarSolicitudDocumento(1, '', 'nombre');
                    swal(
                    'Desactivado',
                    'El registro ha sido desactivado con exito',
                    'success'
                    )
                })
                .catch(function (error){
                    console.log(error);
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === swal.DismissReason.cancel
            ) {

            }
            })
        },
        activarInscrito(id){
            swal({
            title: 'Esta seguro de activar esta inscrito?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                let me = this;

                axios.put('/inscrito/activar',{
                    id: id,
                }).then(function (response){
                    me.listarSolicitudDocumento(1, '', 'nombre');
                    swal(
                    'Activado',
                    'El registro ha sido activado con exito',
                    'success'
                    )
                })
                .catch(function (error){
                    console.log(error);
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === swal.DismissReason.cancel
            ) {

            }
            })
        },
        crear(){
            this.nuevo = {
                _estado: 'creando',
            };
            this.var_config = {
                title: 'Registrar Envio',
                tipo_accion: 'registrar'
            };
            
        },
        editar(inscrito){

            if(inscrito.foto_validado=='1'){
                swal(
                    'Validado',
                    'La fotografia ha sido validada.',
                    'success'
                )
                return;
            }

            this.editable = Object.assign({
                _estado: 'editando',
            },inscrito);
            this.var_config = {
                title: 'Editar Envio',
                tipo_accion: 'actualizar'
            };
        },
        validarCredencial(inscrito){
            let me = this;
            if(inscrito.credencial_validado=='validado'){
                swal(
                    'Ya Validado!!',
                    'Los credenciales del estudiante matriculado ha sido validado.',
                    'success'
                )
                return;
            }

            axios.post('/inscrito/validar_credencial',{
                id: inscrito.id,
                dni: inscrito.dni
            }).then(function (response){//console.log(response.data.data)
                let inscrito_validado = response.data.data;

                if(inscrito_validado.dni){
                    swal(
                        'Validado',
                        'Los credenciales del estudiante matriculado ha sido validado.',
                        'success'
                    )
                }else{
                    swal(
                        'No Encontrado',
                        'No ha sido encontrado.',
                        'warning'
                    )
                }


                me.listarSolicitudDocumento(1,me.buscar, me.criterio);
                me.$forceUpdate();
            })
            .catch(function (error){
                console.log(error);
            });
        },
        enviarFacultad(inscrito){
            this.enviar_editable = Object.assign({
                _estado: 'enviando',
            },inscrito);
            this.var_config = {
                title: 'Enviar a Facultad',
                tipo_accion: 'registrar'
            };
        },
        recibirFacultad(inscrito){
            swal({
            title: 'Esta seguro de recibir los certificados de la carta?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                let me = this;

                axios.post('/solicitud_documento/recibir',{
                    id: inscrito.id,
                }).then(function (response){
                    me.listarSolicitudDocumento(1, '', 'nombre');
                    swal(
                    '¡Recibido!',
                    'Las actas fueron recibidas correctamente',
                    'success'
                    )
                })
                .catch(function (error){
                    console.log(error);
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === swal.DismissReason.cancel
            ) {

            }
            })
        },
        ver(inscrito){
            this.ver_editable = Object.assign({
                _estado: 'viendo',
            },inscrito);
            this.var_config = {
                title: 'Ver Solicitudes',
                tipo_accion: 'actualizar'
            };
        },
        anular(inscrito){

            if(inscrito.fecha_anulado){
                swal(
                    'Anulado',
                    'El tramite ya ha sido anulado.',
                    'success'
                )
                return;
            }

            this.editable = Object.assign({
                _estado: 'anulando',
            },inscrito);
            this.var_config = {
                title: 'Anular Tramite',
                tipo_accion: 'actualizar'
            };
        },
        abrirPrecios(inscrito){
            this.precio_editable = {
                _estado: 'abriendo',
                inscrito_id: inscrito.id,
                nombre_inscrito: inscrito.nombre,
                precio_actual: inscrito.precio_actual
            };
            this.var_config = {
                title: 'Listar Precios',
                tipo_accion: 'registrar'
            };
            this.$forceUpdate();            
        },
        numberFormat2(number){
            return numberFormat2(number);
        },
        descargarInscritos(){
            axios({
                url:'/inscrito/reporte/inscritos',
                method: 'POST',
                data: {
                    // venta_id: this.value.venta_id,
                    order_by: this.order_by,
                    mode_order: this.mode_order
                },
                responseType: 'blob',
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = "Inscritos General.xlsx";
    
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
        descargarInscritosOficial(){
            axios({
                url:'/inscrito/reporte/inscritos_oficial',
                method: 'POST',
                data: {
                    // venta_id: this.value.venta_id,
                    order_by: this.order_by,
                    mode_order: this.mode_order
                },
                responseType: 'blob',
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = "Inscritos Oficial.xlsx";
    
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
        descargarInscritosAnulado(){
            axios({
                url:'/inscrito/reporte/inscritos_anulado',
                method: 'POST',
                data: {
                    // venta_id: this.value.venta_id,
                    order_by: this.order_by,
                    mode_order: this.mode_order
                },
                responseType: 'blob',
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = "Inscritos Anulado.xlsx";
    
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
        descargarConstancia(solicitud){
            axios({
                url:'/solicitud_documento/descargar_constancia',
                method: 'POST',
                data: {
                    id: solicitud.id,
                },
                responseType: 'blob',
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = "Constancia.pdf";

                    if(solicitud.tipo=='constancia_matricula')
                        filename = "Constancia de Matricula.pdf"
                    if(solicitud.tipo=='constancia_primera_matricula')
                        filename = "Constancia de Primera Matricula.pdf"
    
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
        orderByNombre(){
            this.order_by = 'nombre';console.log('mode_order',this.mode_order)

            if(this.mode_order == 'desc')
                this.mode_order = 'asc'
            else
                this.mode_order = 'desc'

            this.listarSolicitudDocumento(1,this.buscar, this.criterio);
        },
        orderByApellidoPaterno(){
            this.order_by = 'apellido_paterno';console.log('mode_order',this.mode_order)

            if(this.mode_order == 'desc')
                this.mode_order = 'asc'
            else
                this.mode_order = 'desc'

            this.listarSolicitudDocumento(1,this.buscar, this.criterio);
        },
        reiniciar(){
            this.buscar = '';
            this.mode_order = 'desc';
            this.order_by = 'id';

            this.listarSolicitudDocumento(1,this.buscar, this.criterio);
            this.$forceUpdate();
            
        },
        cambiarTipoDocumento(newvalue){
            let me = this;
            if(newvalue == 'constancia_primera_matricula'){
                me.lock['_fecha_primera_matricula'] = false;
                me.lock['ciclo'] = true;
                me.lock['periodo'] = true;

            }else if(newvalue == 'constancia_matricula'){
                me.lock['_fecha_primera_matricula'] = true;
                me.lock['ciclo'] = false;
                me.lock['periodo'] = false;
            }

            me.editable._fecha_primera_matricula = '';
            if(me.$refs.cmp_ciclo)
                me.$refs.cmp_ciclo.reiniciar();
            if(me.$refs.cmp_periodo)
                me.$refs.cmp_periodo.reiniciar();

        },
        setValue(periodo){
            if(periodo){
                if(periodo.romano) this.editable.periodo = periodo.romano;
            }
        }
    },
    watch: {
        'editable.tipo': function(newvalue, oldvalue) {
            if (newvalue) {console.log('tipo:',newvalue)

                this.cambiarTipoDocumento(newvalue)
                this.$forceUpdate();
            }
        },
    }
}
</script>
<style>
    .orderLink:hover{
        color: inherit;
        text-decoration: inherit;
    }

    .orderLink{
        color: inherit;
        text-decoration: inherit;
    }
</style>