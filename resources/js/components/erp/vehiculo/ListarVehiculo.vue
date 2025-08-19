<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Vehiculo</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Vehiculos
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
                                        <option value="numero_placa">N° Placa</option>
                                        <option value="marca">Marca</option>
                                        <option value="modelo">Modelo</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarVehiculo(1,buscar, criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarVehiculo(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Fotocheck</th>
                                    <th>N° Placa</th>
                                    <th>Color</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Sede</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayVehiculo"><th colspan="8" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="vehiculo in arrayVehiculo" :key="vehiculo.id">
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" data-toggle="dropdown">
                                                <img src="images/options.svg" style="width: 30px; height: 30px;"/>
                                            </a>
                                            <div class="dropdown-menu" role="menu" style="overflow-y:auto; height:150px;">
                                                <a class="dropdown-item" href="#" @click="editar(vehiculo)"><img src="images/editar.svg" style="width: 20px; height: 20px;"/>   Editar</a>
                                                <a v-if="vehiculo.estado" @click="activarVehiculo(vehiculo.id)" class="dropdown-item" href="#"><img src="images/activar.svg" style="width: 20px; height: 20px;"/>   Activar</a>
                                                <a v-if="!vehiculo.estado" @click="desactivarVehiculo(vehiculo.id)" class="dropdown-item" href="#"><img src="images/desactivar.svg" style="width: 20px; height: 20px;"/>   Desactivar</a>
                                                <a @click="ver(vehiculo)" class="dropdown-item" href="#"><img src="images/ver.svg" style="width: 20px; height: 20px;"/>   Ver</a>
                                                <a @click="descargarComprobante(vehiculo)" class="dropdown-item" href="#"><img src="images/pdf.svg" style="width: 20px; height: 20px;"/>   Tarjeta Propiedad</a>
                                            </div>
                                        </div>                                        
                                    </td>
                                    <td><a href="#" @click="descargarFotocheck(vehiculo)" title="Descargar Fotocheck"><img src="images/pdf.svg" style="width: 30px; height: 30px;"/></a></td>
                                    <td v-text="vehiculo.numero_placa"></td>
                                    <td v-text="vehiculo.color"></td>
                                    <td v-text="vehiculo.marca"></td>
                                    <td v-text="vehiculo.modelo"></td>
                                    <td v-text="vehiculo.nombre_sede_registral"></td>
                                    <td>
                                        <div v-if="!vehiculo.estado">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="vehiculo.estado">
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
            <v-formulario-vehiculo 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_vehiculo"
                :var_config="var_config"
                @guardado="listarVehiculo(1, '', 'nombre')"
            ></v-formulario-vehiculo>

            <!-- Editar -->
            <v-formulario-vehiculo 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_vehiculo"
                :var_config="var_config"
                @guardado="listarVehiculo(1, '', 'nombre')"
            ></v-formulario-vehiculo>

            <!-- Ver -->
            <v-ver-vehiculo 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_vehiculo"
                :var_config="var_config"
            ></v-ver-vehiculo>
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioVehiculo = () => import("@/components/erp/vehiculo/FormularioVehiculo");
const VerVehiculo = () => import("@/components/erp/vehiculo/VerVehiculo");

export default {
    components: {
        "v-formulario-vehiculo": FormularioVehiculo,
        "v-ver-vehiculo": VerVehiculo,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            ver_editable: {},
            show: {},
            var_config: {},
            arrayVehiculo: [],
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
        this.listarVehiculo(1, this.buscar, this.criterio);
    },
    methods: {
        listarVehiculo(page, buscar, criterio){
            let me = this;
            var url = '/vehiculo?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.get(url).then(function (response){
                var respuesta = response.data;
                me.arrayVehiculo = respuesta.vehiculos.data;
                me.pagination = respuesta.pagination;

                if(me.arrayVehiculo.length==0) me.show['arrayVehiculo'] = true;
                else me.show['arrayVehiculo'] = false;
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
            me.listarVehiculo(page, buscar, criterio);
        },
        desactivarVehiculo(id){
            swal({
            title: 'Esta seguro de desactivar esta vehiculo?',
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

                axios.put('/vehiculo/desactivar',{
                    id: id,
                }).then(function (response){
                    me.listarVehiculo(1, '', 'nombre');
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
        activarVehiculo(id){
            swal({
            title: 'Esta seguro de activar esta vehiculo?',
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

                axios.put('/vehiculo/activar',{
                    id: id,
                }).then(function (response){
                    me.listarVehiculo(1, '', 'nombre');
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
                title: 'Registrar Vehiculo',
                tipo_accion: 'registrar'
            };
            
        },
        editar(vehiculo){
            this.editable = Object.assign({
                _estado: 'editando',
            },vehiculo);
            this.var_config = {
                title: 'Actualizar Vehiculo',
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
                url:'/vehiculo/comprobante',
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
        descargarFotocheck(vehiculo){
            let obj_vehiculo = vehiculo;
            axios({
                url:'/vehiculo/fotocheck',
                method: 'POST',
                responseType: 'blob',
                data: {
                    document_name: obj_vehiculo.document_fotocheck,
                }
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    let names = String(obj_vehiculo.document_fotocheck).split(';');
                    // names = String(names[1]).split('.pdf');
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