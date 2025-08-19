<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Configuracion</li>
                <li class="breadcrumb-item"><a href="#">PeriodoAcademico</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Periodos Academicos
                        <button type="button" @click="crear()" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="periodos_academicos.nombre">Nombre</option>
                                      <option value="periodos_academicos.descripcion">Descripción</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarPeriodoAcademico(1,buscar, criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarPeriodoAcademico(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>PeriodoAcademico</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayPeriodoAcademico"><th colspan="8" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="periodo_academico in arrayPeriodoAcademico" :key="periodo_academico.id">
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" data-toggle="dropdown">
                                                <img src="images/options.svg" style="width: 30px; height: auto;"/>
                                            </a>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#" @click="editar(periodo_academico)" v-if="!periodo_academico.activo"><img src="images/editar.svg" style="width: 20px; height: 20px;"/>   Editar</a>
                                                <a class="dropdown-item" href="#" @click="ver(periodo_academico)"><img src="images/ver.svg" style="width: 20px; height: 20px;"/>   Ver</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td v-text="periodo_academico.nombre"></td>
                                    <td v-text="periodo_academico.fecha_inicio"></td>
                                    <td v-text="periodo_academico.fecha_fin"></td>
                                    <td>
                                        <div v-if="periodo_academico.estado=='Activo'">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="periodo_academico.estado=='Finalizado'">
                                            <span class="badge badge-danger">Finalizado</span>
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
            <v-formulario-periodo_academico 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_periodo_academico"
                :var_config="var_config"
                @guardado="listarPeriodoAcademico(1, '', 'nombre')"
            ></v-formulario-periodo_academico>

            <!-- Editar -->
            <v-formulario-periodo_academico 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_periodo_academico"
                :var_config="var_config"
                @guardado="listarPeriodoAcademico(1, '', 'nombre')"
            ></v-formulario-periodo_academico>

            <!-- Ver -->
            <v-ver-periodo_academico 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_periodo_academico"
                :var_config="var_config"
            ></v-ver-periodo_academico>
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioPeriodoAcademico = () => import("@/components/erp/periodo_academico/FormularioPeriodoAcademico");
const VerPeriodoAcademico = () => import("@/components/erp/periodo_academico/VerPeriodoAcademico");

export default {
    components: {
        "v-formulario-periodo_academico": FormularioPeriodoAcademico,
        "v-ver-periodo_academico": VerPeriodoAcademico,
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
            arrayPeriodoAcademico: [],
            pagination: {
                'total' : 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0,
                'to' : 0,
            },
            offset: 3,
            criterio: 'periodos_academicos.nombre',
            buscar: '',
            per_page: 10
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
        this.listarPeriodoAcademico(1, this.buscar, this.criterio);
    },
    methods: {
        listarPeriodoAcademico(page, buscar, criterio){
            let me = this;
            var url = '/periodo_academico?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.get(url).then(function (response){
                var respuesta = response.data;
                me.arrayPeriodoAcademico = respuesta.periodos_academicos.data;
                me.pagination = respuesta.pagination;

                if(me.arrayPeriodoAcademico.length==0) me.show['arrayPeriodoAcademico'] = true;
                else me.show['arrayPeriodoAcademico'] = false;
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
            me.listarPeriodoAcademico(page, buscar, criterio);
        },
        desactivarPeriodoAcademico(id){
            swal({
            title: 'Esta seguro de desactivar esta periodo_academico?',
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

                axios.put('/periodo_academico/desactivar',{
                    id: id,
                }).then(function (response){
                    me.listarPeriodoAcademico(1, '', 'nombre');
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
        activarPeriodoAcademico(id){
            swal({
            title: 'Esta seguro de activar esta periodo_academico?',
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

                axios.put('/periodo_academico/activar',{
                    id: id,
                }).then(function (response){
                    me.listarPeriodoAcademico(1, '', 'nombre');
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
                title: 'Registrar PeriodoAcademico',
                tipo_accion: 'registrar'
            };
            
        },
        editar(periodo_academico){
            this.editable = Object.assign({
                _estado: 'editando',
            },periodo_academico);
            this.var_config = {
                title: 'Actualizar PeriodoAcademico',
                tipo_accion: 'actualizar'
            };
        },
        ver(periodo_academico){
            this.ver_editable = Object.assign({
                _estado: 'viendo',
            },periodo_academico);
            this.var_config = {
                title: 'PeriodoAcademico',
                tipo_accion: 'ver'
            };
        },
        importar(){
            this.importar_editable = {
                _estado: 'creando',
            };
            this.var_config = {
                title: 'Importar Persona',
                tipo_accion: 'importar'
            };
            
        },
        abrirPrecios(periodo_academico){
            this.precio_editable = {
                _estado: 'abriendo',
                periodo_academico_id: periodo_academico.id,
                nombre_periodo_academico: periodo_academico.nombre,
                precio_actual: periodo_academico.precio_actual
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
        descargarArticulos(periodo_academico){
            axios({
                url:'/periodo_academico/reporte/articulos',
                method: 'POST',
                data: {
                    periodo_academico_id: periodo_academico.id,
                },
                responseType: 'blob',
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = "ARTICULOS PERIODO-"+periodo_academico.periodo_academico+".xlsx";
    
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
    }
}
</script>