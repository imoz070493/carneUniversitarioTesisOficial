<template>
        <main class="main" style='height:500px;max-height:500px;'>
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Facturacion Electronica</li>
                <li class="breadcrumb-item"><a href="#">Resumen Boleta</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Resumen Boleta
                        <!-- <button type="button" @click="crear()" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha Comprobante</label>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <date-picker-2 v-model="fecha_documento" lang="es" type="date" format="DD-MM-YYYY"></date-picker-2>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <button type="submit" class="btn btn-primary form-control" @click="registrarResumenBoleta()"><i class="fa fa-search"></i>Enviar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Codigo Hash</th>
                                    <th>N° Resumen</th>
                                    <th>Fecha Documento</th>
                                    <th>Fecha Envio</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayResumenBoleta"><th colspan="7" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="resumen_boleta in arrayResumenBoleta" :key="resumen_boleta.id">
                                    <td>
                                        <button type="button" v-if="resumen_boleta.estado=='aceptado'" class="btn btn-success btn-sm">
                                          <i class="icon-check"></i>
                                        </button>
                                        <button type="button" @click="reenviar(resumen_boleta)" class="btn btn-warning btn-sm" title="Reenviar">
                                          <i class="icon-refresh"></i>
                                        </button>
                                    </td>
                                    <td v-text="resumen_boleta.hash"></td>
                                    <td v-text="formatComprobante(resumen_boleta)"></td>
                                    <td v-text="resumen_boleta.fecha_documento"></td>
                                    <td v-text="resumen_boleta.fecha"></td>
                                    <td>
                                        <div v-if="resumen_boleta.estado=='aceptado'">
                                            <span class="badge badge-success">Aceptado</span>
                                        </div>
                                        <div v-else-if="resumen_boleta.estado=='con_ticket'">
                                            <span class="badge badge-warning">Con Ticket</span>
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
            <!-- <v-formulario-resumen-boleta 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_venta"
                :var_config="var_config"
                @guardado="listarResumenBoleta(1, '', 'nombre')"
            ></v-formulario-resumen-boleta> -->

            <!-- Editar -->
            <!-- <v-formulario-resumen-boleta 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_venta"
                :var_config="var_config"
                @guardado="listarResumenBoleta(1, '', 'nombre')"
            ></v-formulario-resumen-boleta> -->

            <!-- Ver -->
            <!-- <v-ver-resumen-boleta 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_venta"
                :var_config="var_config"
            ></v-ver-resumen-boleta> -->

            <!-- Cancelar -->
            <!-- <v-cancelar-resumen-boleta 
                v-if="cancelar_editable._estado=='cancelando'"
                v-model="cancelar_editable"
                ref="cmp_cancelar_venta"
                :var_config="var_config"
                @guardado="listarResumenBoleta(1, '', 'nombre')"
            ></v-cancelar-resumen-boleta> -->

            <!--Fin del modal-->
        </main>
</template>

<script>

// const FormularioResumenBoleta = () => import("@/components/erp/resumen_boleta/FormularioResumenBoleta");
// const VerResumenBoleta = () => import("@/components/erp/resumen_boleta/VerResumenBoleta");
// const CancelarResumenBoleta = () => import("@/components/erp/resumen_boleta/CancelarResumenBoleta");

export default {
    components: {
        // "v-formulario-resumen-boleta": FormularioVenta,
        // "v-ver-resumen-boleta": VerVenta,
        // "v-cancelar-resumen-boleta": CancelarVenta,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            ver_editable: {},
            cancelar_editable: {},
            show: {},
            var_config: {},
            arrayResumenBoleta: [],
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
            per_page: 10,
            fecha_documento: null,
            btn: {},
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

        this.fecha_documento = this.now();

        this.listarResumenBoleta(1, this.buscar, this.criterio);
    },
    methods: {
        listarResumenBoleta(page, buscar, criterio){
            let me = this;
            axios.post('/resumen_boleta',{
                'page': page,
                'buscar': buscar,
                'criterio': criterio,
                'per_page': this.per_page,
            }).then(function (response){
                var respuesta = response.data;
                me.arrayResumenBoleta = respuesta.resumenes_boletas.data;
                me.pagination = respuesta.pagination;

                if(me.arrayResumenBoleta.length==0) me.show['arrayResumenBoleta'] = true;
                else me.show['arrayResumenBoleta'] = false;
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
            me.listarResumenBoleta(page, buscar, criterio);
        },
        registrarResumenBoleta(){
            let me = this;
            this.btn['registrar'] = true;

            axios.post('/resumen_boleta/registrar',{
                fecha_documento: this.fecha_documento
            }).then(function (response){
                // this.listarResumenBoleta(1, this.buscar, this.criterio);
                
                me.btn['registrar'] = false;
            })
            .catch(error => {
                me.btn['registrar'] = false;

                if(error.request.response){
                    let response = JSON.parse(error.request.response);
                    console.log(response);
                    if(response.errors)
                        me.errors = response.errors;
                }
            });
        },
        crear(){
            this.nuevo = {
                _estado: 'creando',
                fecha_hora: new Date()
            };
            this.var_config = {
                title: 'Registrar Venta',
                tipo_accion: 'registrar'
            };
            
        },
        editar(venta){
            this.editable = Object.assign({
                _estado: 'editando',
            },venta);
            this.var_config = {
                title: 'Actualizar Venta',
                tipo_accion: 'actualizar'
            };
        },
        ver(venta){
            this.ver_editable = Object.assign({
                _estado: 'viendo',
            },venta);
            this.var_config = {
                title: 'Ver Venta',
            };
        },
        cancelar(id){
            this.cancelar_editable = {
                id: id,
                _estado: 'cancelando',
            };
            this.var_config = {
                title: 'Cancelar Venta',
            };
        },
        formatComprobante(e){
            return String(e.serie + '-' + e.numero).toUpperCase();
        },
        now(time=false){
            let date = '';
            date = new Date().toLocaleDateString().split('/').reverse().join('-');

            if(time){
                date += ' ' + new Date().toLocaleTimeString();
            }

            return date;
        },
    }
}
</script>
