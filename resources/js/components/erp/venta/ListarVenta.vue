<template>
        <main class="main" style='height:500px;max-height:500px;'>
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Ventas</li>
                <li class="breadcrumb-item"><a href="#">Venta</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Ventas
                        <button type="button" @click="crear()" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
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

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha Fin</label>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <!-- <input type="text" class="form-control" id="fecha_fin" name="fecha_fin"> -->
                                                <date-picker-2 v-model="fecha_fin" lang="es" type="date" format="DD-MM-YYYY"></date-picker-2>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <button type="submit" class="btn btn-primary form-control" @click="listarVenta(1,buscar, criterio)"><i class="fa fa-search"></i>Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Accion</th>
                                    <th>PDF</th>
                                    <th>Sunat</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Tipo</th>
                                    <th>Comprobante</th>
                                    <th>Impuesto</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayVenta"><th colspan="7" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="venta in arrayVenta" :key="venta.id">
                                    <td >
                                        <div class="btn-group">
                                            <!-- <button type="button" class="btn btn-default">Action</button> -->
                                            <a href="#" data-toggle="dropdown">
                                                <img src="images/options.svg" style="width: 30px; height: 30px;"></img>
                                            </a>
                                            <!-- <button type="button" class="btn btn-success dropdown-toggle icon-list" data-toggle="dropdown"> -->
                                            <!-- <span class="sr-only">Toggle Dropdown</span> -->
                                            <!-- </button> -->
                                            <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#"><img src="images/xml.svg" style="width: 20px; height: 20px;"></img>   Verificacion Estado</a>
                                            <a class="dropdown-item" href="#"><img src="images/xml.svg" style="width: 20px; height: 20px;"></img>   Enviar Correo</a>
                                            <a class="dropdown-item" href="#"><img src="images/xml.svg" style="width: 20px; height: 20px;"></img>   Anular Comprobante</a>
                                            <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a> -->
                                            </div>
                                        </div>
                                        <!-- <button type="button" @click="ver(venta)" class="btn btn-info btn-sm" title="Detalles">
                                          <i class="icon-list"></i>
                                        </button>
                                        <button type="button" @click="descargarComprobante(venta)" class="btn btn-warning btn-sm" title="Detalles" target="_blank">
                                          <i class="icon-doc"></i>
                                        </button>
                                        <template v-if="verificarMostrarBotonCancelar(venta)">
                                            <button type="button" class="btn btn-danger btn-sm" @click="cancelar(venta.id)" title="Cancelar">
                                            <i class="icon-close"></i>
                                            </button>
                                        </template>
                                        <button type="button" v-if="verificarMostrarBotonCorreo(venta)" @click="enviarCorreo(venta)" class="btn btn-success btn-sm" title="Enviar Correo">
                                          <i class="icon-envelope"></i>
                                        </button> -->
                                        
                                    </td>
                                    <!-- <td>
                                        <a href="#" @click="descargarXml(venta)">
                                          <img src="images/xml.svg" style="width: 30px; height: 30px;"></img>
                                        </a>
                                    </td> -->
                                    <td>
                                        <img src="images/pdf.svg" style="width: 30px; height: 30px;"></img>
                                        <img src="images/ticket.svg" style="width: 30px; height: 30px;"></img>
                                    </td>
                                    <td>
                                        <div v-if="venta.estado=='aceptado'">
                                            <!-- <span class="badge badge-success">Aceptado</span> -->
                                            <img title="Aceptado" src="images/aceptado.svg" style="width: 30px; height: 30px;"></img>
                                        </div>
                                        <div v-else-if="venta.estado=='pendiente_anulacion' || venta.estado=='pendiente_anulacion_con_ticket'">
                                            <!-- <span class="badge badge-info">Pendiente Anulacion</span> -->
                                            <img title="Pendiente Anulacion" src="images/pendiente_anulacion.svg" style="width: 30px; height: 30px;"></img>
                                        </div>
                                        <div v-else-if="venta.estado=='anulado_aceptado'">
                                            <img title="Anulado" src="images/anulado.svg" style="width: 30px; height: 30px;"></img>
                                            <!-- <span class="badge badge-success">Anulado Aceptado</span> -->
                                        </div>
                                        <div v-else-if="venta.estado=='construido' || venta.estado=='construido_con_ticket'">
                                            <!-- <span class="badge badge-info">Pendiente Envio</span> -->
                                            <img title="Pendiente Envio" src="images/pendiente_envio.svg" style="width: 30px; height: 30px;"></img>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Rechazado</span>
                                        </div>
                                    </td>
                                    <td v-text="venta.fecha_hora"></td>
                                    <td v-text="venta.nombre_cliente"></td>
                                    <td v-if="venta.tipo_comprobante=='01'" v-text="'Factura'"></td> <td v-if="venta.tipo_comprobante=='03'" v-text="'Boleta'"></td>
                                    <td v-text="formatComprobante(venta)"></td>
                                    <td v-text="venta.impuesto"></td>
                                    <td v-text="venta.total_venta"></td>
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
            <v-formulario-venta 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_venta"
                :var_config="var_config"
                @guardado="listarVenta(1, '', 'nombre')"
            ></v-formulario-venta>

            <!-- Editar -->
            <v-formulario-venta 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_venta"
                :var_config="var_config"
                @guardado="listarVenta(1, '', 'nombre')"
            ></v-formulario-venta>

            <!-- Ver -->
            <v-ver-venta 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_venta"
                :var_config="var_config"
            ></v-ver-venta>

            <!-- Cancelar -->
            <v-cancelar-venta 
                v-if="cancelar_editable._estado=='cancelando'"
                v-model="cancelar_editable"
                ref="cmp_cancelar_venta"
                :var_config="var_config"
                @guardado="listarVenta(1, '', 'nombre')"
            ></v-cancelar-venta>

            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioVenta = () => import("@/components/erp/venta/FormularioVenta");
const VerVenta = () => import("@/components/erp/venta/VerVenta");
const CancelarVenta = () => import("@/components/erp/venta/CancelarVenta");

export default {
    components: {
        "v-formulario-venta": FormularioVenta,
        "v-ver-venta": VerVenta,
        "v-cancelar-venta": CancelarVenta,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            ver_editable: {},
            cancelar_editable: {},
            show: {},
            var_config: {},
            arrayVenta: [],
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

        this.listarVenta(1, this.buscar, this.criterio);
    },
    methods: {
        listarVenta(page, buscar, criterio){
            let me = this;
            // var url = '/venta?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page+'&fecha_inicio='+this.fecha_inicio+'&fecha_fin='+this.fecha_fin;
            axios.post('/venta',{
                'page': page,
                'buscar': buscar,
                'criterio': criterio,
                'per_page': this.per_page,
                'fecha_inicio': this.fecha_inicio,
                'fecha_fin': this.fecha_fin,
            }).then(function (response){
                var respuesta = response.data;
                me.arrayVenta = respuesta.ventas.data;
                me.pagination = respuesta.pagination;

                if(me.arrayVenta.length==0) me.show['arrayVenta'] = true;
                else me.show['arrayVenta'] = false;
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
            me.listarVenta(page, buscar, criterio);
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
            return String(e.serie_comprobante + '-' + e.num_comprobante).toUpperCase();
        },
        descargarComprobante(venta){
            let obj_venta = venta;
            axios({
                url:'/venta/comprobante',
                method: 'POST',
                responseType: 'blob',
                data: {
                    tipo_comprobante: obj_venta.tipo_comprobante,
                    serie_comprobante: obj_venta.serie_comprobante,
                    num_comprobante: obj_venta.num_comprobante
                }
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
    
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
        descargarXml(venta){
            let obj_venta = venta;
            axios({
                url:'/venta/comprobante/xml',
                method: 'POST',
                responseType: 'blob',
                data: {
                    tipo_comprobante: obj_venta.tipo_comprobante,
                    serie_comprobante: obj_venta.serie_comprobante,
                    num_comprobante: obj_venta.num_comprobante
                }
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    let filename = this.formatComprobante(obj_venta)+".zip";
    
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
        enviarCorreo(venta){
            let me = this;
            axios.post('/venta/enviar',{
                id: venta.id,
                tipo_comprobante: venta.tipo_comprobante,
                serie_comprobante: venta.serie_comprobante,
                num_comprobante: venta.num_comprobante
            }).then(function (response){
                console.log(response.data);
            })
            .catch(function (error){
                console.log(error);
            });
        },
        verificarMostrarBotonCorreo(venta){
            let fecha_inicio = String(venta.fecha_hora).split(' ')[0].replace(/-/g,'/');
            fecha_inicio = new Date(fecha_inicio).getTime();
            let fecha_fin = new Date().getTime();
            let diff = fecha_fin - fecha_inicio;
            let dias = diff/(1000*60*60*24);

            if(dias <= 7)
                return true;
            else
                return false;
        },
        verificarMostrarBotonCancelar(venta){
            let fecha_inicio = String(venta.fecha_hora).split(' ')[0].replace(/-/g,'/');
            fecha_inicio = new Date(fecha_inicio).getTime();
            let fecha_fin = new Date().getTime();
            let diff = fecha_fin - fecha_inicio;
            let dias = diff/(1000*60*60*24);

            if(venta.estado == 'aceptado' && dias <= 7)
                return true;
            else
                return false;
        }
    }
}
</script>
