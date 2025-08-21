<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <li class="breadcrumb-item">Tramite Carne</li>
                        <li class="breadcrumb-item"><a href="#">Inscrito</a></li>
                        <li class="breadcrumb-item">Listado</li>
                        <li class="breadcrumb-item active"><strong>Convocatoria Actual: {{pagination.convocatoria_actual}}</strong></li>
                        <li class="breadcrumb-item active"><strong>Periodo Actual: {{pagination.periodo_actual}}</strong></li>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="pull-right">
                            <button type="button" @click="descargarInscritosOficialNuevoDuplicado('nuevo')" class="btn btn-success"> Xlsx Nuevos</button>
                            <button type="button" @click="descargarInscritosOficialPhotoNuevoDuplicado('nuevo')" class="btn btn-success"> Xlsx N. Img</button>
                            <button type="button" @click="descargarInscritosOficialNuevoDuplicado('duplicado')" class="btn btn-success"> Xlsx Duplicados</button>
                            <button type="button" @click="descargarInscritosOficialPhotoNuevoDuplicado('duplicado')" class="btn btn-success"> Xlsx N. Img</button>
                            <button type="button" @click="descargarPhotos('nuevo')" class="btn btn-danger"> Zip Nuevos</button>
                            <button type="button" @click="descargarPhotos('duplicado')" class="btn btn-danger"> Zip Duplicados</button>
                        </div>
                    </div>
                </div>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <i class="fa fa-align-justify"></i> Inscritos: {{pagination.total}}
                                <button :disabled="!pagination.convocatoria_actual || !pagination.periodo_actual" type="button" @click="crear()" class="btn btn-secondary">
                                    <i class="icon-plus"></i>&nbsp;Nuevo
                                </button>
                                <button type="button" @click="cortar_crear()" class="btn btn-secondary">
                                    <i class="icon-plus"></i>&nbsp;Cortar
                                </button>
                                <i class="fa fa-bar-chart"></i> Oficial: {{pagination.oficial}}
                                <i class="fa fa-bar-chart"></i> Nuevos: {{pagination.nuevo}}
                                <i class="fa fa-bar-chart"></i> Duplicados: {{pagination.duplicado}}
                                <i class="fa fa-align-justify"></i> Anulados: {{pagination.anulado}}
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="pull-right">
                                    <button type="button" @click="abrirValidador()" class="btn btn-secondary"><i class="icon-plus"></i>&nbsp;Validar V.</button>
                                    <button type="button" @click="descargarInscritosOficial()" class="btn btn-success"> Xlsx Oficial</button>
                                    <button type="button" @click="descargarInscritos()" class="btn btn-success"> Xlsx</button>
                                    <button type="button" @click="descargarInscritosAnulado()" class="btn btn-success"> Xlsx Anulado</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Busqueda General:</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="buscar" 
                                        @keyup.enter="listarInscrito(1,buscar, criterio)"
                                        class="form-control" 
                                        placeholder="Nombre, Codigo, Categoria"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Foto Validado:</dt></label><br>
                                    <foto-validado-select 
                                        v-model="filtros.foto_validado"
                                    ></foto-validado-select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Credencial Validado:</dt></label><br>
                                    <credencial-validado-select 
                                        v-model="filtros.credencial_validado"
                                    ></credencial-validado-select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Pago Validado:</dt></label><br>
                                    <pago-validado-select 
                                        v-model="filtros.voucher_validado"
                                    ></pago-validado-select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label>&nbsp;</label><br>
                                    <button type="submit" @click="listarInscrito(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                    <button type="submit" class="btn btn-danger" @click="reiniciar()"><i class="fa fa-repeat"></i>     Reiniciar</button>
                                </div>
                            </div>
                        </div>
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th><a href="#" class="orderLink" @click="orderByApellidoPaterno()"><i v-bind:class="{'fa fa-sort-up': (mode_order=='asc' &&  order_by=='nombre')?true:false,'fa fa-sort-down': (mode_order=='desc' && order_by=='nombre')?true:false,}"></i>Apellidos y Nombres</a></th>
                                    <th>Codigo</th>
                                    <th>Nro Documento</th>
                                    <th>Escuela Profesional</th>
                                    <th>Sexo</th>
                                    <th>Fecha Tramite</th>
                                    <th>¿Duplicado?</th>
                                    <th>¿Foto Validado?</th>
                                    <th>¿Credenciales Validado?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayInscrito"><th colspan="8" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="inscrito in arrayInscrito" :key="inscrito.id">
                                    <td>
                                        <div class="">
                                            <a href="#" data-toggle="dropdown">
                                                <img src="images/options.svg" style="width: 30px; height: auto;"/>
                                            </a>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#" @click="editar(inscrito)"><img src="images/editar.svg" style="width: 20px; height: 20px;"/>   Validar Fotografia</a>
                                                <a class="dropdown-item" href="#" @click="validarCredencial(inscrito)"><img src="images/xml.svg" style="width: 20px; height: 20px;"/>   Validar Credencial</a>
                                                <a class="dropdown-item" href="#" @click="validarVoucher(inscrito)"><img src="images/editar.svg" style="width: 20px; height: 20px;"/>   Validar Voucher</a>
                                                <a class="dropdown-item" href="#" @click="ver(inscrito)"><img src="images/ver.svg" style="width: 20px; height: 20px;"/>   Ver</a>
                                                <a class="dropdown-item" href="#" @click="anular(inscrito)"><img src="images/desactivar.svg" style="width: 20px; height: 20px;"/>   Anular</a>
                                                <a class="dropdown-item" href="#" @click="invalidarFotografia(inscrito)" v-if="inscrito.foto_validado=='1'"><img src="images/editar.svg" style="width: 20px; height: 20px;"/>   Invalidar Fotografia</a>
                                                <a class="dropdown-item" href="#" @click="activarInscrito(inscrito.id)" v-if="inscrito.estado=='inactivo'"><img src="images/activar.svg" style="width: 20px; height: 20px;"/>   Activar</a>
                                                <a class="dropdown-item" href="#" @click="desactivarInscrito(inscrito.id)" v-if="inscrito.estado=='activo'"><img src="images/desactivar.svg" style="width: 20px; height: 20px;"/>   Desactivar</a>
                                                <a class="dropdown-item" href="#" @click="abrirPrecios(inscrito)" v-if="inscrito.estado=='activo'"><img src="images/money.svg" style="width: 20px; height: 20px;"/>   Precios</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{inscrito.apellido_paterno}} {{inscrito.apellido_materno}} {{inscrito.nombres}}</td>
                                    <td v-text="inscrito.codigo_estudiante"></td>
                                    <td v-text="inscrito.dni"></td>
                                    <td v-text="inscrito.escuela_profesional"></td>
                                    <td v-text="inscrito.sexo"></td>
                                    <td v-text="inscrito.created_at.substr(0,10).split('-').reverse().join('-')"></td>
                                    <td>
                                        <div v-if="inscrito.duplicado=='1'">
                                            <span class="badge badge-success">SI</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div v-if="inscrito.foto_validado=='1'">
                                            <span class="badge badge-success">Validado</span>
                                        </div>
                                        <div v-else-if="inscrito.foto_validado=='0'">
                                            <span class="badge badge-danger">NO</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div v-if="inscrito.credencial_validado=='validado'">
                                            <span class="badge badge-success">Validado</span>
                                        </div>
                                        <div v-else-if="inscrito.credencial_validado=='no_validado'">
                                            <span class="badge badge-danger">No Validado</span>
                                        </div>
                                        <div v-else-if="inscrito.credencial_validado=='no_encontrado'">
                                            <span class="badge badge-warning">No Encontrado</span>
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
            <v-formulario-inscrito 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_inscrito"
                :var_config="var_config"
                @guardado="listarInscrito(1, '', 'nombre')"
            ></v-formulario-inscrito>

            <!-- Editar -->
            <v-formulario-editar-inscrito 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_inscrito"
                :var_config="var_config"
                @guardado="listarInscrito(1, '', 'nombre')"
            ></v-formulario-editar-inscrito>

            <!-- Validar Voucher -->
            <v-formulario-validar-voucher 
                v-if="editable._estado=='validando_voucher'" 
                v-model="editable"
                ref="cmp_validar_voucher"
                :var_config="var_config"
                @guardado="listarInscrito(1, '', 'nombre')"
            ></v-formulario-validar-voucher>

            <!-- Anular -->
            <v-formulario-anular-inscrito 
                v-if="editable._estado=='anulando'" 
                v-model="editable"
                ref="cmp_anular_inscrito"
                :var_config="var_config"
                @guardado="listarInscrito(1, '', 'nombre')"
            ></v-formulario-anular-inscrito>

            <!-- Ver -->
            <v-ver-inscrito 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_inscrito"
                :var_config="var_config"
            ></v-ver-inscrito>

            <!-- Cortar Imagen -->
            <v-formulario-cortar-inscrito 
                v-if="cortar_nuevo._estado=='creando'" 
                v-model="cortar_nuevo"
                ref="cmp_crear_inscrito"
                :var_config="var_config"
                @guardado="listarInscrito(1, '', 'nombre')"
            ></v-formulario-cortar-inscrito>

            <!-- Importar Data -->
            <v-formulario-validar-pago 
                v-if="abrir_validador._estado=='creando'" 
                v-model="abrir_validador"
                ref="cmp_importar_pagos"
                :var_config="var_config"
                @guardado="listarMatricula(1, '', 'nombre')"
            ></v-formulario-validar-pago>
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioInscrito = () => import("@/components/erp/inscrito/FormularioInscrito");
const FormularioCortarInscrito = () => import("@/components/erp/inscrito/FormularioInscritoCortarImagen");
const FormularioEditarInscrito = () => import("@/components/erp/inscrito/FormularioEditarInscrito");
const FormularioValidarVoucher = () => import("@/components/erp/inscrito/FormularioValidarVoucher");
const FormularioAnularInscrito = () => import("@/components/erp/inscrito/FormularioAnularInscrito");
const VerInscrito = () => import("@/components/erp/inscrito/VerInscrito");

const FotoValidadoSelect = () => import("@/components/referencias/FotoValidadoSelect");
const PagoValidadoSelect = () => import("@/components/referencias/PagoValidadoSelect");
const CredencialValidadoSelect = () => import("@/components/referencias/CredencialValidadoSelect");
const FormularioValidarPago = () => import("@/components/erp/inscrito/FormularioValidarPago");

export default {
    components: {
        "v-formulario-inscrito": FormularioInscrito,
        "v-formulario-cortar-inscrito": FormularioCortarInscrito,
        "v-formulario-editar-inscrito": FormularioEditarInscrito,
        "v-formulario-validar-voucher": FormularioValidarVoucher,
        "v-formulario-anular-inscrito": FormularioAnularInscrito,
        "v-ver-inscrito": VerInscrito,

        "foto-validado-select": FotoValidadoSelect,
        "pago-validado-select": PagoValidadoSelect,
        "credencial-validado-select": CredencialValidadoSelect,
        "v-formulario-validar-pago": FormularioValidarPago,
    },
    data(){
        return {
            nuevo: {},
            cortar_nuevo: {},
            editable: {},
            precio_editable: {},
            ver_editable: {},
            abrir_validador: {},
            show: {},
            var_config: {},
            arrayInscrito: [],
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
            filtros: {
                foto_validado: '',
                credencial_validado: '',
                voucher_validado: '',
            }
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
        this.filtros.foto_validado = 'todos';
        this.filtros.credencial_validado = 'todos';
        this.filtros.voucher_validado = 'todos';
        this.listarInscrito(1, this.buscar, this.criterio);
    },
    methods: {
        listarInscrito(page, buscar, criterio){
            let me = this;
            // var url = '/inscrito?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.post('/inscrito',{
                page: page,
                buscar: buscar,
                criterio: criterio,
                per_page: this.per_page,
                order_by: this.order_by,
                mode_order: this.mode_order,
                // periodo: '202301'
                filtros: this.filtros
            }).then(function (response){
            
                var respuesta = response.data;
                me.arrayInscrito = respuesta.inscritos.data;
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
        cambiarPagina(page, buscar, criterio){
            let me = this;
            // Actualiza la pagina actual
            me.pagination.current_page = page;
            // Envia la peticion para visualizar la data de esta pagina
            me.listarInscrito(page, buscar, criterio);
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
                    me.listarInscrito(1, '', 'nombre');
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
                    me.listarInscrito(1, '', 'nombre');
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
        abrirValidador(){
            this.abrir_validador = {
                _estado: 'creando',
            };
            this.var_config = {
                title: 'Validar Pagos',
                tipo_accion: 'importar'
            };
            
        },
        crear(){
            this.nuevo = {
                _estado: 'creando',
            };
            this.var_config = {
                title: 'Registrar Inscrito',
                tipo_accion: 'registrar'
            };
            
        },
        cortar_crear(){
            this.cortar_nuevo = {
                _estado: 'creando',
            };
            this.var_config = {
                title: 'Registrar Inscrito',
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
                title: 'Validar Fotografia',
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


                me.listarInscrito(1,me.buscar, me.criterio);
                me.$forceUpdate();
            })
            .catch(function (error){
                console.log(error);
            });
        },
        validarVoucher(inscrito){

            if(inscrito.voucher_validado=='1'){
                swal(
                    'Validado',
                    'El voucher ha sido validado.',
                    'success'
                )
                return;
            }

            this.editable = Object.assign({
                _estado: 'validando_voucher',
            },inscrito);
            this.var_config = {
                title: 'Validar Voucher',
                tipo_accion: 'actualizar'
            };
        },
        invalidarFotografia(inscrito){
            swal({
            title: 'Esta seguro de invalidar la fotografia este estudiante?',
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

                axios.post('/inscrito/invalidar_fotografia',{
                    id: inscrito.id,
                }).then(function (response){
                    me.listarInscrito(1, '', 'nombre');
                    swal(
                        'Desactivado',
                        'La fotografia ha sido invalidado con exito',
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
                title: 'Ver Inscrito',
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
        descargarInscritosOficialNuevoDuplicado(tipo_tramite){
            axios({
                url:'/inscrito/reporte/inscritos_oficial/nuevo_duplicado',
                method: 'POST',
                data: {
                    // venta_id: this.value.venta_id,
                    order_by: this.order_by,
                    mode_order: this.mode_order,
                    tipo_tramite: tipo_tramite,
                },
                responseType: 'blob',
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = tipo_tramite=='nuevo'?"Inscritos Oficial Nuevo.xlsx":"Inscritos Oficial Duplicado.xlsx";
    
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
        descargarInscritosOficialPhotoNuevoDuplicado(tipo_tramite){
            axios({
                url:'/inscrito/reporte/inscritos_oficial/photo/nuevo_duplicado',
                method: 'POST',
                data: {
                    // venta_id: this.value.venta_id,
                    order_by: this.order_by,
                    mode_order: this.mode_order,
                    tipo_tramite: tipo_tramite,
                },
                responseType: 'blob',
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = tipo_tramite=='nuevo'?"Inscritos Oficial Photo Nuevo.xlsx":"Inscritos Oficial Photo Duplicado.xlsx";
    
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
        descargarPhotos(tipo_tramite){
            axios({
                url:'/inscrito/descargar/nuevo',
                method: 'POST',
                data: {
                    // venta_id: this.value.venta_id,
                    order_by: this.order_by,
                    mode_order: this.mode_order,
                    tipo_tramite: tipo_tramite,
                },
                responseType: 'blob',
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = tipo_tramite=='nuevo'?"Nuevos.zip":'Duplicados.zip';
    
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

            this.listarInscrito(1,this.buscar, this.criterio);
        },
        orderByApellidoPaterno(){
            this.order_by = 'apellido_paterno';console.log('mode_order',this.mode_order)

            if(this.mode_order == 'desc')
                this.mode_order = 'asc'
            else
                this.mode_order = 'desc'

            this.listarInscrito(1,this.buscar, this.criterio);
        },
        reiniciar(){
            this.buscar = '';
            this.mode_order = 'desc';
            this.order_by = 'id';
            this.filtros.foto_validado = 'todos';
            this.filtros.credencial_validado = 'todos';

            this.listarInscrito(1,this.buscar, this.criterio);
            this.$forceUpdate();
            
        }
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