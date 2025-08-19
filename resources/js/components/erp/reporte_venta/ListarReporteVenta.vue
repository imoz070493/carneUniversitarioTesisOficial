<template>
        <main class="main" style='height:500px;max-height:500px;'>
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Reportes</li>
                <li class="breadcrumb-item"><a href="#">Venta</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Reporte Ventas
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
                                        
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <button type="submit" class="btn btn-primary form-control" @click="listarReporteVenta(1,buscar, criterio)">Buscar</button>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <button type="submit" class="btn btn-success form-control" @click="exportarReporte()">Xls</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>N° Documento</th>
                                    <th>Tipo Comprobante</th>
                                    <th>Comprobante</th>
                                    <th>Impuesto</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayVenta"><th colspan="7" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="venta in arrayVenta" :key="venta.id">
                                    <td v-text="venta.fecha_hora"></td>
                                    <td v-text="venta.nombre_cliente"></td>
                                    <td v-text="venta.num_documento"></td>
                                    <td v-text="formatTipoComprobante(venta)"></td>
                                    <td v-text="formatComprobante(venta)"></td>
                                    <td v-text="venta.impuesto"></td>
                                    <td v-text="venta.total_venta"></td>
                                    <td>
                                        <div v-if="venta.estado=='aceptado'">
                                            <span class="badge badge-success">Aceptado</span>
                                        </div>
                                        <div v-else-if="venta.estado=='pendiente_anulacion' || venta.estado=='pendiente_anulacion_con_ticket'">
                                            <span class="badge badge-info">Pendiente Anulacion</span>
                                        </div>
                                        <div v-else-if="venta.estado=='anulado_aceptado'">
                                            <span class="badge badge-success">Anulado Aceptado</span>
                                        </div>
                                        <div v-else-if="venta.estado=='construido' || venta.estado=='construido_con_ticket'">
                                            <span class="badge badge-info">Pendiente Envio</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Rechazado</span>
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

            <!--Fin del modal-->
        </main>
</template>

<script>

export default {
    components: {
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

        this.listarReporteVenta(1, this.buscar, this.criterio);
    },
    methods: {
        listarReporteVenta(page, buscar, criterio){
            let me = this;
            // var url = '/venta?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page+'&fecha_inicio='+this.fecha_inicio+'&fecha_fin='+this.fecha_fin;
            axios.post('/venta/reporte',{
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
            me.listarReporteVenta(page, buscar, criterio);
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
        formatTipoComprobante(e){
            if(e.tipo_comprobante == '01'){
                return 'Factura';
            }else if(e.tipo_comprobante == '03'){
                return 'Boleta';
            }else if(e.tipo_comprobante == '07'){
                return 'Nota de Credito';
            }else if(e.tipo_comprobante == '08'){
                return 'Nota de Debito';
            }
        },
        formatComprobante(e){
            return String(e.serie_comprobante + '-' + e.num_comprobante).toUpperCase();
        },
        exportarReporte(){
            axios({
                url:'/venta/reporte/exportar',
                method: 'POST',
                data: {
                    fecha_inicio: this.fecha_inicio,
                    fecha_fin: this.fecha_fin,
                },
                responseType: 'blob',
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = "REPORTE VENTA.xlsx";
    
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
