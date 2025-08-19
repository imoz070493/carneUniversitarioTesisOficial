<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Compra</li>
                <li class="breadcrumb-item"><a href="#">Proveedor</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Proveedores
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
                                    <input type="text" v-model="buscar" @keyup.enter="listarProveedor(1,buscar, criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarProveedor(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
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
                                <tr v-if="show.arrayProveedor"><th colspan="7" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="proveedor in arrayProveedor" :key="proveedor.id">
                                    <td>
                                        <button type="button" @click="editar(proveedor)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        <template v-if="proveedor.estado=='activo'">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarProveedor(proveedor.id)">
                                            <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-else-if="proveedor.estado=='inactivo'">
                                            <button type="button" class="btn btn-info btn-sm" @click="activarProveedor(proveedor.id)">
                                            <i class="icon-check"></i>
                                            </button>
                                        </template>
                                    </td>

                                    <td v-if="proveedor.tipo_documento=='ruc'" v-text="proveedor.razon_social"></td>
                                    <td v-else-if="proveedor.tipo_documento=='dni'"v-text="proveedor.nombre"></td>

                                    <td v-text="toUpperCase(proveedor.tipo_documento)"></td>
                                    <td v-text="proveedor.num_documento"></td>
                                    <td v-text="proveedor.telefono"></td>
                                    <td v-text="proveedor.email"></td>
                                    <td>
                                        <div v-if="proveedor.estado=='activo'">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="proveedor.estado=='inactivo'">
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
            <v-formulario-proveedor 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_proveedor"
                :var_config="var_config"
                @guardado="listarProveedor(1, '', 'nombre')"
            ></v-formulario-proveedor>

            <!-- Editar -->
            <v-formulario-proveedor 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_proveedor"
                :var_config="var_config"
                @guardado="listarProveedor(1, '', 'nombre')"
            ></v-formulario-proveedor>
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioProveedor = () => import("@/components/erp/proveedor/FormularioProveedor");

export default {
    components: {
        "v-formulario-proveedor": FormularioProveedor,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            show: {},
            var_config: {},
            arrayProveedor: [],
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
        this.listarProveedor(1, this.buscar, this.criterio);
    },
    methods: {
        listarProveedor(page, buscar, criterio){
            let me = this;
            var url = '/proveedor?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.get(url).then(function (response){
                var respuesta = response.data;
                me.arrayProveedor = respuesta.proveedores.data;
                me.pagination = respuesta.pagination;

                if(me.arrayProveedor.length==0) me.show['arrayProveedor'] = true;
                else me.show['arrayProveedor'] = false;
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
            me.listarProveedor(page, buscar, criterio);
        },
        desactivarProveedor(id){
            swal({
            title: 'Esta seguro de desactivar esta proveedor?',
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

                axios.put('/proveedor/desactivar',{
                    id: id,
                }).then(function (response){
                    me.listarProveedor(1, '', 'nombre');
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
        activarProveedor(id){
            swal({
            title: 'Esta seguro de activar esta proveedor?',
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

                axios.put('/proveedor/activar',{
                    id: id,
                }).then(function (response){
                    me.listarProveedor(1, '', 'nombre');
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
                title: 'Registrar Proveedor',
                tipo_accion: 'registrar'
            };
            
        },
        editar(proveedor){
            this.editable = Object.assign({
                _estado: 'editando',
            },proveedor);
            this.var_config = {
                title: 'Actualizar Proveedor',
                tipo_accion: 'actualizar'
            };
        },
        toUpperCase(e){
            return e.toUpperCase();
        }
    }
}
</script>