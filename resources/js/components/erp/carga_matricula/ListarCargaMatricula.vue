<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Tramite Carne</li>
                <li class="breadcrumb-item"><a href="#">Carga Matricula</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <i class="fa fa-align-justify"></i> Matriculas
                                <!-- <button type="button" @click="crear()" class="btn btn-secondary">
                                    <i class="icon-plus"></i>&nbsp;Nuevo
                                </button> -->
                                <button type="button" @click="importar()" class="btn btn-success">
                                    <i class="icon-plus"></i>&nbsp;Importar
                                </button>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="pull-right">
                                    <button type="button" @click="descargarMatriculas()" class="btn btn-success"> Xlsx</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" v-model="buscar" @keyup.enter="listarMatricula(1,buscar, criterio)" class="form-control" placeholder="Nombre, Codigo, Categoria">
                                    <button type="submit" @click="listarMatricula(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                    <button type="submit" class="btn btn-danger" @click="reiniciar()"><i class="fa fa-repeat"></i>     Reiniciar</button>
                                </div>
                            </div>
                        </div>
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Documento</th>
                                    <th>Periodo Academico</th>
                                    <th>Job</th>
                                    <th>Fecha Creacion</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayMatricula"><th colspan="8" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="matricula in arrayMatricula" :key="matricula.id">
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" data-toggle="dropdown">
                                                <img src="images/options.svg" style="width: 30px; height: auto;"/>
                                            </a>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#" @click="ver(matricula)"><img src="images/ver.svg" style="width: 20px; height: 20px;"/>   Ver</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td v-text="matricula.document"></td>
                                    <td v-text="matricula.periodo_academico"></td>
                                    <td v-text="matricula.job_id"></td>
                                    <td v-text="matricula.created_at"></td>
                                    <td>
                                        <div v-if="matricula.estado=='cargado'">
                                            <span class="badge badge-warning">Cargado</span>
                                        </div>
                                        <div v-else-if="matricula.estado=='con_error'">
                                            <span class="badge badge-danger">Con error</span>
                                        </div>
                                        <div v-else-if="matricula.estado=='completado'">
                                            <span class="badge badge-success">Completado</span>
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
            <v-formulario-matricula 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_matricula"
                :var_config="var_config"
                @guardado="listarMatricula(1, '', 'nombre')"
            ></v-formulario-matricula>

            <!-- Editar -->
            <v-formulario-matricula 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_matricula"
                :var_config="var_config"
                @guardado="listarMatricula(1, '', 'nombre')"
            ></v-formulario-matricula>

            <!-- Importar -->
            <v-formulario-importar-matricula 
                v-if="importar_editable._estado=='creando'" 
                v-model="importar_editable"
                ref="cmp_importar_persona_dni"
                :var_config="var_config"
                @guardado="listarMatricula(1, '', 'nombre')"
            ></v-formulario-importar-matricula>

            <!-- Ver -->
            <v-ver-carga-matricula 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_matricula"
                :var_config="var_config"
            ></v-ver-carga-matricula>
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioMatricula = () => import("@/components/erp/carga_matricula/FormularioMatricula");
const VerCargaMatricula = () => import("@/components/erp/carga_matricula/VerCargaMatricula");
const FormularioImportarMatricula = () => import("@/components/erp/carga_matricula/FormularioImportarMatricula");

export default {
    components: {
        "v-formulario-matricula": FormularioMatricula,
        "v-formulario-importar-matricula": FormularioImportarMatricula,
        "v-ver-carga-matricula": VerCargaMatricula,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            importar_editable: {},
            precio_editable: {},
            ver_editable: {},
            show: {},
            var_config: {},
            arrayMatricula: [],
            pagination: {
                'total' : 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0, 
                'to' : 0,
            },
            offset: 3,
            criterio: 'cargas_matriculas.nombre',
            buscar: '',
            per_page: 10,
            order_by: 'id',
            mode_order: 'desc'
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
        this.listarMatricula(1, this.buscar, this.criterio);
    },
    methods: {
        listarMatricula(page, buscar, criterio){
            let me = this;
            // var url = '/carga_matricula?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.post('/carga_matricula',{
                page: page,
                buscar: buscar,
                criterio: criterio,
                per_page: this.per_page,
                order_by: this.order_by,
                mode_order: this.mode_order
            }).then(function (response){
            
                var respuesta = response.data;
                me.arrayMatricula = respuesta.cargas_matriculas.data;
                me.pagination = respuesta.pagination;

                if(me.arrayMatricula.length==0) me.show['arrayMatricula'] = true;
                else me.show['arrayMatricula'] = false;
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
            me.listarMatricula(page, buscar, criterio);
        },
        desactivarMatricula(id){
            swal({
            title: 'Esta seguro de desactivar esta matricula?',
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

                axios.put('/carga_matricula/desactivar',{
                    id: id,
                }).then(function (response){
                    me.listarMatricula(1, '', 'nombre');
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
        activarMatricula(id){
            swal({
            title: 'Esta seguro de activar esta matricula?',
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

                axios.put('/carga_matricula/activar',{
                    id: id,
                }).then(function (response){
                    me.listarMatricula(1, '', 'nombre');
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
                title: 'Registrar Matricula',
                tipo_accion: 'registrar'
            };
            
        },
        editar(matricula){
            this.editable = Object.assign({
                _estado: 'editando',
            },matricula);
            this.var_config = {
                title: 'Actualizar Matricula',
                tipo_accion: 'actualizar'
            };
        },
        ver(matricula){
            this.ver_editable = Object.assign({
                _estado: 'viendo',
            },matricula);
            this.var_config = {
                title: 'Ver Carga Matricula',
                tipo_accion: 'actualizar'
            };
        },
        importar(){
            this.importar_editable = {
                _estado: 'creando',
            };
            this.var_config = {
                title: 'Importar Matriculas',
                tipo_accion: 'importar'
            };
            
        },
        abrirPrecios(matricula){
            this.precio_editable = {
                _estado: 'abriendo',
                matricula_id: matricula.id,
                nombre_matricula: matricula.nombre,
                precio_actual: matricula.precio_actual
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
        descargarMatriculas(){
            axios({
                url:'/carga_matricula/reporte/cargas_matriculas',
                method: 'POST',
                data: {
                    // venta_id: this.value.venta_id,
                },
                responseType: 'blob',
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = "ARTICULOS.xlsx";
    
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

            this.listarMatricula(1,this.buscar, this.criterio);
        },
        orderByApellidoPaterno(){
            this.order_by = 'apellido_paterno';console.log('mode_order',this.mode_order)

            if(this.mode_order == 'desc')
                this.mode_order = 'asc'
            else
                this.mode_order = 'desc'

            this.listarMatricula(1,this.buscar, this.criterio);
        },
        reiniciar(){
            this.buscar = '';
            this.mode_order = 'desc';
            this.order_by = 'id';

            this.listarMatricula(1,this.buscar, this.criterio);
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