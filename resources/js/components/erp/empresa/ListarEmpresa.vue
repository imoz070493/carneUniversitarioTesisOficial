<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Empresas</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Empresas
                        <button type="button" @click="crear()" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                        <option value="todos">Todos</option>
                                        <option value="nombreComercial">Nombre Comercial</option>
                                        <option value="razonSocial">Razon Social</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarEmpresa(1,buscar, criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarEmpresa(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Ruc</th>
                                    <th>Razon Social</th>
                                    <th>Nombre Comercial</th>
                                    <th>Direccion</th>
                                    <th>Origen</th>
                                    <th>Fecha de Creacion</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayEmpresa"><th colspan="8" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="empresa in arrayEmpresa" :key="empresa.id">
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" data-toggle="dropdown">
                                                <img src="images/options.svg" style="width: 30px; height: 30px;"/>
                                            </a>
                                            <div class="dropdown-menu" role="menu" style="overflow-y:auto; height:150px;">
                                                <a class="dropdown-item disabled" href="#" @click="editar(empresa)" disabled><img src="images/editar.svg" style="width: 20px; height: 20px;"/>   Editar</a>
                                                <a @click="ver(empresa)" class="dropdown-item" href="#"><img src="images/ver.svg" style="width: 20px; height: 20px;"/>   Ver</a>
                                            </div>
                                        </div>                                        
                                    </td>
                                    <td v-text="empresa.ruc"></td>
                                    <td v-text="empresa.razonSocial"></td>
                                    <td v-text="empresa.nombreComercial"></td>
                                    <td v-text="empresa.direccion"></td>
                                    <td v-text="empresa.origen"></td>
                                    <td v-text="empresa.created_at.substr(0,10).split('-').reverse().join('-')"></td>
                                    <td>
                                        <span class="badge badge-success">Activo</span>
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
            <v-formulario-persona-dni 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_empresa"
                :var_config="var_config"
                @guardado="listarEmpresa(1, '', 'nombre')"
            ></v-formulario-persona-dni>

            <!-- Editar -->
            <v-formulario-persona-dni 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_empresa"
                :var_config="var_config"
                @guardado="listarEmpresa(1, '', 'nombre')"
            ></v-formulario-persona-dni>

            <!-- Ver -->
            <v-ver-persona-dni 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_empresa"
                :var_config="var_config"
            ></v-ver-persona-dni>
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioEmpresa = () => import("@/components/erp/empresa/FormularioEmpresa");
const VerEmpresa = () => import("@/components/erp/empresa/VerEmpresa");

export default {
    components: {
        "v-formulario-persona-dni": FormularioEmpresa,
        "v-ver-persona-dni": VerEmpresa,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            ver_editable: {},
            editable_anulacion: {},
            show: {},
            var_config: {},
            arrayEmpresa: [],
            pagination: {
                'total' : 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0,
                'to' : 0,
            },
            offset: 3,
            criterio: 'todos',
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
        this.listarEmpresa(1, this.buscar, this.criterio);
    },
    methods: {
        listarEmpresa(page, buscar, criterio){
            let me = this;
            var url = '/empresa?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.get(url).then(function (response){
                var respuesta = response.data;
                me.arrayEmpresa = respuesta.empresas.data;
                me.pagination = respuesta.pagination;

                if(me.arrayEmpresa.length==0) me.show['arrayEmpresa'] = true;
                else me.show['arrayEmpresa'] = false;
            })
            .catch(function (error){
                console.log(error);
            });
        },
        cambiarPagina(page, buscar, criterio){
            let me = this;
            // Actualiza la pagina actual
            me.pagination.current_page = page;
            // Envia la peticion para visualizar la data de esta pagina
            me.listarEmpresa(page, buscar, criterio);
        },
        desactivarEmpresa(id){
            swal({
            title: 'Esta seguro de desactivar este ingreso de vehiculo?',
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

                axios.put('/empresa/desactivar',{
                    id: id,
                }).then(function (response){
                    me.listarEmpresa(1, '', 'nombre');
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
        activarEmpresa(id){
            swal({
            title: 'Esta seguro de activar este ingreso de vehiculo?',
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

                axios.put('/empresa/activar',{
                    id: id,
                }).then(function (response){
                    me.listarEmpresa(1, '', 'nombre');
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
                title: 'Registrar Empresa',
                tipo_accion: 'registrar'
            };
            
        },
        editar(vehiculo){
            if(vehiculo.anulado){
                swal(
                    'Error',
                    'El ingreso ha sido anulado por lo tanto no puede ser editado',
                    'warning'
                )
                return;
            }

            this.editable = Object.assign({
                _estado: 'editando',
            },vehiculo);
            this.var_config = {
                title: 'Actualizar Empresa',
                tipo_accion: 'actualizar'
            };
        },
        ver(vehiculo){
            this.ver_editable = Object.assign({
                _estado: 'viendo',
            },vehiculo);
            this.var_config = {
                title: 'Ver Empresa',
            };
        },
    }
}
</script>