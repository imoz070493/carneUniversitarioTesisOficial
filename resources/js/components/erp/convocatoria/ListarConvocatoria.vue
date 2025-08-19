<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Configuracion</li>
                <li class="breadcrumb-item"><a href="#">Convocatoria</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Convocatorias
                        <button type="button" @click="crear()" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="convocatorias.nombre">Nombre</option>
                                      <option value="convocatorias.descripcion">Descripción</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarConvocatoria(1,buscar, criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarConvocatoria(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Convocatoria</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayConvocatoria"><th colspan="8" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="convocatoria in arrayConvocatoria" :key="convocatoria.id">
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" data-toggle="dropdown">
                                                <img src="images/options.svg" style="width: 30px; height: auto;"/>
                                            </a>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#" @click="editar(convocatoria)" v-if="!convocatoria.activo"><img src="images/editar.svg" style="width: 20px; height: 20px;"/>   Editar</a>
                                                <a class="dropdown-item" href="#" @click="ver(convocatoria)"><img src="images/ver.svg" style="width: 20px; height: 20px;"/>   Ver</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td v-text="convocatoria.nombre"></td>
                                    <td v-text="convocatoria.fecha_inicio"></td>
                                    <td v-text="convocatoria.fecha_fin"></td>
                                    <td>
                                        <div v-if="!convocatoria.activo">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else>
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
            <v-formulario-convocatoria 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_convocatoria"
                :var_config="var_config"
                @guardado="listarConvocatoria(1, '', 'nombre')"
            ></v-formulario-convocatoria>

            <!-- Editar -->
            <v-formulario-convocatoria 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_convocatoria"
                :var_config="var_config"
                @guardado="listarConvocatoria(1, '', 'nombre')"
            ></v-formulario-convocatoria>

            <!-- Ver -->
            <v-ver-convocatoria 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_convocatoria"
                :var_config="var_config"
            ></v-ver-convocatoria>
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioConvocatoria = () => import("@/components/erp/convocatoria/FormularioConvocatoria");
const VerConvocatoria = () => import("@/components/erp/convocatoria/VerConvocatoria");

export default {
    components: {
        "v-formulario-convocatoria": FormularioConvocatoria,
        "v-ver-convocatoria": VerConvocatoria,
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
            arrayConvocatoria: [],
            pagination: {
                'total' : 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0,
                'to' : 0,
            },
            offset: 3,
            criterio: 'convocatorias.nombre',
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
        this.listarConvocatoria(1, this.buscar, this.criterio);
    },
    methods: {
        listarConvocatoria(page, buscar, criterio){
            let me = this;
            var url = '/convocatoria?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.get(url).then(function (response){
                var respuesta = response.data;
                me.arrayConvocatoria = respuesta.convocatorias.data;
                me.pagination = respuesta.pagination;

                if(me.arrayConvocatoria.length==0) me.show['arrayConvocatoria'] = true;
                else me.show['arrayConvocatoria'] = false;
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
            me.listarConvocatoria(page, buscar, criterio);
        },
        desactivarConvocatoria(id){
            swal({
            title: 'Esta seguro de desactivar esta convocatoria?',
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

                axios.put('/convocatoria/desactivar',{
                    id: id,
                }).then(function (response){
                    me.listarConvocatoria(1, '', 'nombre');
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
        activarConvocatoria(id){
            swal({
            title: 'Esta seguro de activar esta convocatoria?',
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

                axios.put('/convocatoria/activar',{
                    id: id,
                }).then(function (response){
                    me.listarConvocatoria(1, '', 'nombre');
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
                title: 'Registrar Convocatoria',
                tipo_accion: 'registrar'
            };
            
        },
        editar(convocatoria){
            this.editable = Object.assign({
                _estado: 'editando',
            },convocatoria);
            this.var_config = {
                title: 'Actualizar Convocatoria',
                tipo_accion: 'actualizar'
            };
        },
        ver(convocatoria){
            this.ver_editable = Object.assign({
                _estado: 'viendo',
            },convocatoria);
            this.var_config = {
                title: 'Convocatoria',
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
        abrirPrecios(convocatoria){
            this.precio_editable = {
                _estado: 'abriendo',
                convocatoria_id: convocatoria.id,
                nombre_convocatoria: convocatoria.nombre,
                precio_actual: convocatoria.precio_actual
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
        descargarArticulos(convocatoria){
            axios({
                url:'/convocatoria/reporte/articulos',
                method: 'POST',
                data: {
                    convocatoria_id: convocatoria.id,
                },
                responseType: 'blob',
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = "ARTICULOS PERIODO-"+convocatoria.convocatoria+".xlsx";
    
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