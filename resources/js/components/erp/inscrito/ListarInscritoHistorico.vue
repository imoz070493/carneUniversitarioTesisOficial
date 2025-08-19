<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Tramite Carne</li>
                <li class="breadcrumb-item"><a href="#">Inscrito</a></li>
                <li class="breadcrumb-item active">Historico Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <i class="fa fa-align-justify"></i> Inscritos
                                <!-- <button type="button" @click="crear()" class="btn btn-secondary">
                                    <i class="icon-plus"></i>&nbsp;Nuevo
                                </button> -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="pull-right">
                                    <button type="button" @click="descargarInscritosOficial()" class="btn btn-success"> Xlsx Oficial</button>
                                    <button type="button" @click="descargarInscritos()" class="btn btn-success"> Xlsx</button>
                                    <button type="button" @click="descargarInscritosAnulado()" class="btn btn-success"> Xlsx Anulado</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Convocatoria: </dt></label>
                                    <convocatoria-select 
                                        v-model="filtros.convocatoria_id"
                                    ></convocatoria-select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Busqueda General: </dt></label>
                                    <div class="input-group">
                                        <input type="text" v-model="buscar" @keyup.enter="listarInscrito(1,buscar, criterio)" class="form-control" placeholder="Nombre, Codigo, Categoria">
                                        <button type="submit" @click="listarInscrito(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                        <button type="submit" class="btn btn-danger" @click="reiniciar()"><i class="fa fa-repeat"></i>     Reiniciar</button>
                                    </div>
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
                                    <th>Convocatoria</th>
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
                                                <a class="dropdown-item" href="#" @click="ver(inscrito)"><img src="images/ver.svg" style="width: 20px; height: 20px;"/>   Ver</a>
                                                <!-- <a class="dropdown-item" href="#" @click="anular(inscrito)"><img src="images/desactivar.svg" style="width: 20px; height: 20px;"/>   Anular</a> -->
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
                                    <td v-text="inscrito.nombre_convocatoria"></td>
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
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioInscrito = () => import("@/components/erp/inscrito/FormularioInscrito");
const FormularioEditarInscrito = () => import("@/components/erp/inscrito/FormularioEditarInscrito");
const FormularioAnularInscrito = () => import("@/components/erp/inscrito/FormularioAnularInscrito");
const VerInscrito = () => import("@/components/erp/inscrito/VerInscrito");
const ConvocatoriaSelect = () => import("@/components/referencias/ConvocatoriaSelect");

export default {
    components: {
        "v-formulario-inscrito": FormularioInscrito,
        "v-formulario-editar-inscrito": FormularioEditarInscrito,
        "v-formulario-anular-inscrito": FormularioAnularInscrito,
        "v-ver-inscrito": VerInscrito,
        "convocatoria-select": ConvocatoriaSelect,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            precio_editable: {},
            ver_editable: {},
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
            filtros: {}
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
        this.listarInscrito(1, this.buscar, this.criterio);
    },
    methods: {
        listarInscrito(page, buscar, criterio){
            let me = this;
            // var url = '/inscrito?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.post('/inscrito/historico',{
                page: page,
                buscar: buscar,
                criterio: criterio,
                per_page: this.per_page,
                order_by: this.order_by,
                mode_order: this.mode_order,
                convocatoria_id: this.filtros.convocatoria_id
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
        crear(){
            this.nuevo = {
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
                url:'/inscrito/reporte/inscritos/historico',
                method: 'POST',
                data: {
                    // venta_id: this.value.venta_id,
                    order_by: this.order_by,
                    mode_order: this.mode_order,
                    convocatoria_id: this.filtros.convocatoria_id
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
                url:'/inscrito/reporte/inscritos_oficial/historico',
                method: 'POST',
                data: {
                    // venta_id: this.value.venta_id,
                    order_by: this.order_by,
                    mode_order: this.mode_order,
                    convocatoria_id: this.filtros.convocatoria_id
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
                url:'/inscrito/reporte/inscritos_anulado/historico',
                method: 'POST',
                data: {
                    // venta_id: this.value.venta_id,
                    order_by: this.order_by,
                    mode_order: this.mode_order,
                    convocatoria_id: this.filtros.convocatoria_id
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

            this.listarInscrito(1,this.buscar, this.criterio);
            this.$forceUpdate();
            
        }
    },
    watch: {
        'filtros.convocatoria_id': function(newvalue, oldvalue) {
            if (newvalue) {
                this.listarInscrito(1,this.buscar, this.criterio);
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