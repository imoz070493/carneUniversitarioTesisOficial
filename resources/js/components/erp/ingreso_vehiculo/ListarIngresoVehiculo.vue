<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Ingreso Vehiculo</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Ingresos Vehiculos
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
                                        <option value="vehiculo.numero_placa">N° Placa</option>
                                        <option value="conductor.nombre">Conductor</option>
                                        <option value="origen.nombre">Origen</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarIngresoVehiculo(1,buscar, criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarIngresoVehiculo(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>N° Placa</th>
                                    <th>Conductor</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Fecha Ingreso</th>
                                    <th>Fecha Salida</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayIngresoVehiculo"><th colspan="8" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="ingreso_vehiculo in arrayIngresoVehiculo" :key="ingreso_vehiculo.id">
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" data-toggle="dropdown">
                                                <img src="images/options.svg" style="width: 30px; height: 30px;"/>
                                            </a>
                                            <div class="dropdown-menu" role="menu" style="overflow-y:auto; height:150px;">
                                                <a class="dropdown-item" href="#" @click="editar(ingreso_vehiculo)"><img src="images/editar.svg" style="width: 20px; height: 20px;"/>   Editar</a>
                                                <a v-if="ingreso_vehiculo.estado" @click="activarIngresoVehiculo(ingreso_vehiculo.id)" class="dropdown-item" href="#"><img src="images/activar.svg" style="width: 20px; height: 20px;"/>   Activar</a>
                                                <a v-if="!ingreso_vehiculo.estado" @click="anularIngresoVehiculo(ingreso_vehiculo)" class="dropdown-item" href="#"><img src="images/desactivar.svg" style="width: 20px; height: 20px;"/>   Anular</a>
                                                <a @click="ver(ingreso_vehiculo)" class="dropdown-item" href="#"><img src="images/ver.svg" style="width: 20px; height: 20px;"/>   Ver</a>
                                                <a @click="descargarComprobante(ingreso_vehiculo)" class="dropdown-item" href="#"><img src="images/pdf.svg" style="width: 20px; height: 20px;"/>   Tarjeta Propiedad</a>
                                            </div>
                                        </div>                                        
                                    </td>
                                    <td v-text="ingreso_vehiculo.numero_placa"></td>
                                    <td v-text="ingreso_vehiculo.nombre_conductor"></td>
                                    <td v-text="ingreso_vehiculo.nombre_origen"></td>
                                    <td v-text="ingreso_vehiculo.nombre_destino"></td>
                                    <td v-text="ingreso_vehiculo.dia_ingreso"></td>
                                    <td v-text="ingreso_vehiculo.dia_salida"></td>
                                    <td v-if="!ingreso_vehiculo.anulado">
                                        <div v-if="!ingreso_vehiculo.estado">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="ingreso_vehiculo.estado">
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                    </td>
                                    <td v-else>
                                        <div>
                                            <span class="badge badge-danger">Anulado</span>
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
            <v-formulario-ingreso-vehiculo 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_ingreso_vehiculo"
                :var_config="var_config"
                @guardado="listarIngresoVehiculo(1, '', 'nombre')"
            ></v-formulario-ingreso-vehiculo>

            <!-- Editar -->
            <v-formulario-ingreso-vehiculo 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_ingreso_vehiculo"
                :var_config="var_config"
                @guardado="listarIngresoVehiculo(1, '', 'nombre')"
            ></v-formulario-ingreso-vehiculo>

            <!-- Ver -->
            <v-ver-ingreso-vehiculo 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_ingreso_vehiculo"
                :var_config="var_config"
            ></v-ver-ingreso-vehiculo>

            <!-- Anulacion -->
            <v-formulario-anulacion-ingreso-vehiculo 
                v-if="editable_anulacion._estado=='editando'" 
                v-model="editable_anulacion"
                ref="cmp_anular_ingreso_vehiculo"
                :var_config="var_config"
                @guardado="listarIngresoVehiculo(1, '', 'nombre')"
            ></v-formulario-anulacion-ingreso-vehiculo>
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioIngresoVehiculo = () => import("@/components/erp/ingreso_vehiculo/FormularioIngresoVehiculo");
const VerIngresoVehiculo = () => import("@/components/erp/ingreso_vehiculo/VerIngresoVehiculo");
const FormularioAnulacionIngresoVehiculo = () => import("@/components/erp/ingreso_vehiculo/FormularioAnulacionIngresoVehiculo");

export default {
    components: {
        "v-formulario-ingreso-vehiculo": FormularioIngresoVehiculo,
        "v-ver-ingreso-vehiculo": VerIngresoVehiculo,
        "v-formulario-anulacion-ingreso-vehiculo": FormularioAnulacionIngresoVehiculo,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            ver_editable: {},
            editable_anulacion: {},
            show: {},
            var_config: {},
            arrayIngresoVehiculo: [],
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
        this.listarIngresoVehiculo(1, this.buscar, this.criterio);
    },
    methods: {
        listarIngresoVehiculo(page, buscar, criterio){
            let me = this;
            var url = '/ingreso_vehiculo?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.get(url).then(function (response){
                var respuesta = response.data;
                me.arrayIngresoVehiculo = respuesta.ingresos_vehiculos.data;
                me.pagination = respuesta.pagination;

                if(me.arrayIngresoVehiculo.length==0) me.show['arrayIngresoVehiculo'] = true;
                else me.show['arrayIngresoVehiculo'] = false;
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
            me.listarIngresoVehiculo(page, buscar, criterio);
        },
        desactivarIngresoVehiculo(id){
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

                axios.put('/ingreso_vehiculo/desactivar',{
                    id: id,
                }).then(function (response){
                    me.listarIngresoVehiculo(1, '', 'nombre');
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
        activarIngresoVehiculo(id){
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

                axios.put('/ingreso_vehiculo/activar',{
                    id: id,
                }).then(function (response){
                    me.listarIngresoVehiculo(1, '', 'nombre');
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
                title: 'Registrar Ingreso Vehiculo',
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
                title: 'Actualizar Ingreso Vehiculo',
                tipo_accion: 'actualizar'
            };
        },
        ver(vehiculo){
            this.ver_editable = Object.assign({
                _estado: 'viendo',
            },vehiculo);
            this.var_config = {
                title: 'Ver Vehiculo',
            };
        },
        anularIngresoVehiculo(vehiculo){
            if(vehiculo.anulado){
                swal(
                    'Error',
                    'El ingreso ya ha sido anulado.',
                    'warning'
                )
                return;
            }

            this.editable_anulacion = Object.assign({
                id: vehiculo.id,
                _estado: 'editando',
            });
            this.var_config = {
                title: 'Anular Ingreso Vehiculo',
                tipo_accion: 'actualizar'
            };
        },
        descargarComprobante(vehiculo){

            if(!vehiculo.document_tarjeta_propiedad){
                swal(
                    'Error',
                    'El tarjeta de propiedad de este vehiculo no ha sido adjuntado',
                    'warning'
                )
                return;
            }
            

            let obj_vehiculo = vehiculo;
            axios({
                url:'/ingreso_vehiculo/comprobante',
                method: 'POST',
                responseType: 'blob',
                data: {
                    document_name: obj_vehiculo.document_tarjeta_propiedad,
                }
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    let names = String(obj_vehiculo.document_tarjeta_propiedad).split(';');
                    names = String(names[1]).split('.pdf');
                    let filename = names[0]+".pdf";
    
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