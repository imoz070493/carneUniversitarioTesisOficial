<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Conductor</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Conductores
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
                                        <option value="nombre">Nombre</option>
                                        <option value="num_documento">N° Documento</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarConductor(1,buscar, criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarConductor(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Tipo Documento</th>
                                    <th>N° Documento</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayConductor"><th colspan="8" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="conductor in arrayConductor" :key="conductor.id">
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" data-toggle="dropdown">
                                                <img src="images/options.svg" style="width: 30px; height: 30px;"/>
                                            </a>
                                            <div class="dropdown-menu" role="menu" style="overflow-y:auto; height:150px;">
                                                <a class="dropdown-item" href="#" @click="editar(conductor)"><img src="images/editar.svg" style="width: 20px; height: 20px;"/>   Editar</a>
                                                <a v-if="conductor.estado" @click="activarConductor(conductor.id)" class="dropdown-item" href="#"><img src="images/activar.svg" style="width: 20px; height: 20px;"/>   Activar</a>
                                                <a v-if="!conductor.estado" @click="desactivarConductor(conductor.id)" class="dropdown-item" href="#"><img src="images/desactivar.svg" style="width: 20px; height: 20px;"/>   Desactivar</a>
                                                <a @click="ver(conductor)" class="dropdown-item" href="#"><img src="images/ver.svg" style="width: 20px; height: 20px;"/>   Ver</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td v-text="conductor.nombre"></td>
                                    <td v-text="'DNI'"></td>
                                    <td v-text="conductor.num_documento"></td>
                                    <td v-text="conductor.telefono"></td>
                                    <td v-text="conductor.email"></td>
                                    <td>
                                        <div v-if="!conductor.estado">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="conductor.estado">
                                            <span class="badge badge-danger">Desactivado</span>
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
            <v-formulario-conductor 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_conductor"
                :var_config="var_config"
                @guardado="listarConductor(1, '', 'nombre')"
            ></v-formulario-conductor>

            <!-- Editar -->
            <v-formulario-conductor 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_conductor"
                :var_config="var_config"
                @guardado="listarConductor(1, '', 'nombre')"
            ></v-formulario-conductor>

            <!-- Ver -->
            <v-ver-conductor 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_conductor"
                :var_config="var_config"
            ></v-ver-conductor>
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioConductor = () => import("@/components/erp/conductor/FormularioConductor");
const VerConductor = () => import("@/components/erp/conductor/VerConductor");

export default {
    components: {
        "v-formulario-conductor": FormularioConductor,
        "v-ver-conductor": VerConductor,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            ver_editable: {},
            show: {},
            var_config: {},
            arrayConductor: [],
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
        this.listarConductor(1, this.buscar, this.criterio);
    },
    methods: {
        listarConductor(page, buscar, criterio){
            let me = this;
            var url = '/conductor?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.get(url).then(function (response){
                var respuesta = response.data;
                me.arrayConductor = respuesta.conductores.data;
                me.pagination = respuesta.pagination;

                if(me.arrayConductor.length==0) me.show['arrayConductor'] = true;
                else me.show['arrayConductor'] = false;
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
            me.listarConductor(page, buscar, criterio);
        },
        desactivarConductor(id){
            swal({
            title: 'Esta seguro de desactivar esta conductor?',
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

                axios.put('/conductor/desactivar',{
                    id: id,
                }).then(function (response){
                    me.listarConductor(1, '', 'nombre');
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
        activarConductor(id){
            swal({
            title: 'Esta seguro de activar esta conductor?',
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

                axios.put('/conductor/activar',{
                    id: id,
                }).then(function (response){
                    me.listarConductor(1, '', 'nombre');
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
                title: 'Registrar Conductor',
                tipo_accion: 'registrar'
            };
            
        },
        editar(conductor){
            this.editable = Object.assign({
                _estado: 'editando',
            },conductor);
            this.var_config = {
                title: 'Actualizar Conductor',
                tipo_accion: 'actualizar'
            };
        },
        ver(conductor){
            this.ver_editable = Object.assign({
                _estado: 'viendo',
            },conductor);
            this.var_config = {
                title: 'Ver Conductor',
            };
        },
    }
}
</script>