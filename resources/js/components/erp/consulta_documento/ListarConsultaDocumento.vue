<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Documentos</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Documentos
                        <!-- <button type="button" @click="crear()" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha Inicio</label>
                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                        <!-- <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio"> -->
                                        <date-picker-2 v-model="fecha_inicio" lang="es" type="date" format="DD-MM-YYYY"></date-picker-2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha Fin</label>
                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                        <!-- <input type="text" class="form-control" id="fecha_fin" name="fecha_fin"> -->
                                        <date-picker-2 v-model="fecha_fin" lang="es" type="date" format="DD-MM-YYYY"></date-picker-2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label>Busqueda General</label>
                                    <div class="input-group">
                                        <input type="text" v-model="buscar" @keyup.enter="listarConsultaDocumento(1,buscar, criterio)" class="form-control" placeholder="N° Documento">
                                        <button type="submit" @click="listarConsultaDocumento(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>    
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Tipo</th>
                                    <th>N° Documento</th>
                                    <th>Origen</th>
                                    <th>Fecha Consulta</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayConsultaDocumento"><th colspan="8" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="consulta_documento in arrayConsultaDocumento" :key="consulta_documento.id">
                                    <td>
                                        <a @click="ver(consulta_documento)" href="#" title="Ver"><img src="images/ver.svg" style="width: 20px;"/></a>
                                    </td>
                                    <td v-if="consulta_documento.type=='1'" v-text="'DNI'"></td>
                                    <td v-else-if="consulta_documento.type=='3'" v-text="'RUC'"></td>
                                    <td v-text="consulta_documento.num_document"></td>
                                    <td v-text="consulta_documento.origen"></td>
                                    <td v-text="consulta_documento.created_at.substr(0,10).split('-').reverse().join('-')+' '+consulta_documento.created_at.substr(11,8)"></td>
                                    <td>
                                        <span v-if="consulta_documento.estado=='exito'" class="badge badge-success">Exitoso</span>
                                        <span v-if="consulta_documento.estado=='fallido'" class="badge badge-danger">Fallido</span>
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
                ref="cmp_crear_consulta_documento"
                :var_config="var_config"
                @guardado="listarConsultaDocumento(1, '', 'nombre')"
            ></v-formulario-persona-dni>

            <!-- Editar -->
            <v-formulario-persona-dni 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_consulta_documento"
                :var_config="var_config"
                @guardado="listarConsultaDocumento(1, '', 'nombre')"
            ></v-formulario-persona-dni>

            <!-- Ver -->
            <v-ver-persona-dni 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_consulta_documento"
                :var_config="var_config"
            ></v-ver-persona-dni>
            
            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioConsultaDocumento = () => import("@/components/erp/consulta_documento/FormularioConsultaDocumento");
const VerConsultaDocumento = () => import("@/components/erp/consulta_documento/VerConsultaDocumento");

export default {
    components: {
        "v-formulario-persona-dni": FormularioConsultaDocumento,
        "v-ver-persona-dni": VerConsultaDocumento,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            ver_editable: {},
            editable_anulacion: {},
            show: {},
            var_config: {},
            arrayConsultaDocumento: [],
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
            per_page: 10,
            fecha_inicio: new Date(new Date().getFullYear(), new Date().getMonth(),1),
            fecha_fin: new Date(new Date().getFullYear(), new Date().getMonth() + 1,0),
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
        this.listarConsultaDocumento(1, this.buscar, this.criterio);
    },
    methods: {
        listarConsultaDocumento(page, buscar, criterio){
            let me = this;
            // var url = '/consulta_documento?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page+'&fecha_inicio='+this.fecha_inicio+'&fecha_fin='+this.fecha_fin;
            axios.post('consulta_documento',{
                'page': page,
                'buscar': buscar,
                'criterio': criterio,
                'per_page': this.per_page,
                'fecha_inicio': this.fecha_inicio,
                'fecha_fin': this.fecha_fin,
            }).then(function (response){
                var respuesta = response.data;
                me.arrayConsultaDocumento = respuesta.consultas_documentos.data;
                me.pagination = respuesta.pagination;

                if(me.arrayConsultaDocumento.length==0) me.show['arrayConsultaDocumento'] = true;
                else me.show['arrayConsultaDocumento'] = false;
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
            me.listarConsultaDocumento(page, buscar, criterio);
        },
        desactivarConsultaDocumento(id){
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

                axios.put('/consulta_documento/desactivar',{
                    id: id,
                }).then(function (response){
                    me.listarConsultaDocumento(1, '', 'nombre');
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
        activarConsultaDocumento(id){
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

                axios.put('/consulta_documento/activar',{
                    id: id,
                }).then(function (response){
                    me.listarConsultaDocumento(1, '', 'nombre');
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
                title: 'Registrar Consulta Documento',
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
                title: 'Actualizar Consulta Documento',
                tipo_accion: 'actualizar'
            };
        },
        ver(vehiculo){
            this.ver_editable = Object.assign({
                _estado: 'viendo',
            },vehiculo);
            this.var_config = {
                title: 'Ver Consulta Documento',
            };
        },
    }
}
</script>