<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Ventas</li>
                <li class="breadcrumb-item"><a href="#">Cliente</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Clientes
                        <button type="button" @click="crear()" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarCliente(1,buscar, criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarCliente(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Nombre o Razón Social</th>
                                    <th>Tipo Doc.</th>
                                    <th>N° Documento</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayCliente"><th colspan="7" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="cliente in arrayCliente" :key="cliente.id">
                                    <td>
                                        <button type="button" @click="editar(cliente)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        <template v-if="cliente.estado=='activo'">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarCliente(cliente.id)">
                                            <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-else-if="cliente.estado=='inactivo'">
                                            <button type="button" class="btn btn-info btn-sm" @click="activarCliente(cliente.id)">
                                            <i class="icon-check"></i>
                                            </button>
                                        </template>
                                    </td>

                                    <td v-if="cliente.tipo_documento=='ruc'" v-text="cliente.razon_social"></td>
                                    <td v-else-if="cliente.tipo_documento=='dni'"v-text="cliente.nombre"></td>

                                    <td v-text="toUpperCase(cliente.tipo_documento)"></td>
                                    <td v-text="cliente.num_documento"></td>
                                    <td v-text="cliente.telefono"></td>
                                    <td v-text="cliente.email"></td>
                                    <td>
                                        <div v-if="cliente.estado=='activo'">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="cliente.estado=='inactivo'">
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
            <v-formulario-cliente 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_cliente"
                :var_config="var_config"
                @guardado="listarCliente(1, '', 'nombre')"
            ></v-formulario-cliente>

            <!-- Editar -->
            <v-formulario-cliente 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_cliente"
                :var_config="var_config"
                @guardado="listarCliente(1, '', 'nombre')"
            ></v-formulario-cliente>
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioCliente = () => import("@/components/erp/cliente/FormularioCliente");

export default {
    components: {
        "v-formulario-cliente": FormularioCliente,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            show: {},
            var_config: {},
            arrayCliente: [],
            pagination: {
                'total' : 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0,
                'to' : 0,
            },
            offset: 3,
            criterio: 'nombre',
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
        this.listarCliente(1, this.buscar, this.criterio);
    },
    methods: {
        listarCliente(page, buscar, criterio){
            let me = this;
            var url = '/cliente?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.get(url).then(function (response){
                var respuesta = response.data;
                me.arrayCliente = respuesta.clientes.data;
                me.pagination = respuesta.pagination;

                if(me.arrayCliente.length==0) me.show['arrayCliente'] = true;
                else me.show['arrayCliente'] = false;
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
            me.listarCliente(page, buscar, criterio);
        },
        desactivarCliente(id){
            swal({
            title: 'Esta seguro de desactivar esta cliente?',
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

                axios.put('/cliente/desactivar',{
                    id: id,
                }).then(function (response){
                    me.listarCliente(1, '', 'nombre');
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
        activarCliente(id){
            swal({
            title: 'Esta seguro de activar esta cliente?',
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

                axios.put('/cliente/activar',{
                    id: id,
                }).then(function (response){
                    me.listarCliente(1, '', 'nombre');
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
                title: 'Registrar Cliente',
                tipo_accion: 'registrar'
            };
            
        },
        editar(cliente){
            this.editable = Object.assign({
                _estado: 'editando',
            },cliente);
            this.var_config = {
                title: 'Actualizar Cliente',
                tipo_accion: 'actualizar'
            };
        },
        toUpperCase(e){
            return e.toUpperCase();
        }
    }
}
</script>