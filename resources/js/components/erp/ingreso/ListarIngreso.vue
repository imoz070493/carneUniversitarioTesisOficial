<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Compra</li>
                <li class="breadcrumb-item"><a href="#">Ingreso</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Ingresos
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
                                    <input type="text" v-model="buscar" @keyup.enter="listarIngreso(1,buscar, criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarIngreso(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Fecha</th>
                                    <th>Proveedor</th>
                                    <th>Comprobante</th>
                                    <th>Impuesto</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayIngreso"><th colspan="7" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="ingreso in arrayIngreso" :key="ingreso.id">
                                    <td>
                                        <button type="button" @click="ver(ingreso)" class="btn btn-info btn-sm" title="Detalles">
                                          <i class="icon-list"></i>
                                        </button> &nbsp;
                                        <template v-if="ingreso.estado=='activo'">
                                            <button type="button" class="btn btn-danger btn-sm" @click="cancelar(ingreso.id)" title="Cancelar">
                                            <i class="icon-close"></i>
                                            </button>
                                        </template>
                                    </td>
                                    <td v-text="ingreso.fecha_hora"></td>
                                    <td v-text="ingreso.nombre_proveedor"></td>
                                    <td v-text="formatComprobante(ingreso)"></td>
                                    <td v-text="ingreso.impuesto"></td>
                                    <td v-text="ingreso.total_compra"></td>
                                    <td>
                                        <div v-if="ingreso.estado=='activo'">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="ingreso.estado=='inactivo'">
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
            <v-formulario-ingreso 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_ingreso"
                :var_config="var_config"
                @guardado="listarIngreso(1, '', 'nombre')"
            ></v-formulario-ingreso>

            <!-- Editar -->
            <v-formulario-ingreso 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_ingreso"
                :var_config="var_config"
                @guardado="listarIngreso(1, '', 'nombre')"
            ></v-formulario-ingreso>

            <!-- Ver -->
            <v-ver-ingreso 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_ingreso"
                :var_config="var_config"
            ></v-ver-ingreso>

            <!-- Cancelar -->
            <v-cancelar-ingreso 
                v-if="cancelar_editable._estado=='cancelando'"
                v-model="cancelar_editable"
                ref="cmp_cancelar_ingreso"
                :var_config="var_config"
                @guardado="listarIngreso(1, '', 'nombre')"
            ></v-cancelar-ingreso>

            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioIngreso = () => import("@/components/erp/ingreso/FormularioIngreso");
const VerIngreso = () => import("@/components/erp/ingreso/VerIngreso");
const CancelarIngreso = () => import("@/components/erp/ingreso/CancelarIngreso");

export default {
    components: {
        "v-formulario-ingreso": FormularioIngreso,
        "v-ver-ingreso": VerIngreso,
        "v-cancelar-ingreso": CancelarIngreso,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            ver_editable: {},
            cancelar_editable: {},
            show: {},
            var_config: {},
            arrayIngreso: [],
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
        this.listarIngreso(1, this.buscar, this.criterio);
    },
    methods: {
        listarIngreso(page, buscar, criterio){
            let me = this;
            var url = '/ingreso?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.get(url).then(function (response){
                var respuesta = response.data;
                me.arrayIngreso = respuesta.ingresos.data;
                me.pagination = respuesta.pagination;

                if(me.arrayIngreso.length==0) me.show['arrayIngreso'] = true;
                else me.show['arrayIngreso'] = false;
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
            me.listarIngreso(page, buscar, criterio);
        },
        crear(){
            this.nuevo = {
                _estado: 'creando',
            };
            this.var_config = {
                title: 'Registrar Ingreso',
                tipo_accion: 'registrar'
            };
            
        },
        editar(ingreso){
            this.editable = Object.assign({
                _estado: 'editando',
            },ingreso);
            this.var_config = {
                title: 'Actualizar Ingreso',
                tipo_accion: 'actualizar'
            };
        },
        ver(ingreso){
            this.ver_editable = Object.assign({
                _estado: 'viendo',
            },ingreso);
            this.var_config = {
                title: 'Ver Ingreso',
            };
        },
        cancelar(id){
            this.cancelar_editable = {
                id: id,
                _estado: 'cancelando',
            };
            this.var_config = {
                title: 'Cancelar Ingreso',
            };
        },
        formatComprobante(e){
            return String(e.serie_comprobante + '-' + e.num_comprobante).toUpperCase();
        }
    }
}
</script>