<template>
        <main class="main" style='height:500px;max-height:500px;'>
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Reportes</li>
                <li class="breadcrumb-item"><a href="#">Compra</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Reporte Compras
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
                                            <button type="submit" class="btn btn-primary form-control" @click="listarReporteCompra(1,buscar, criterio)">Buscar</button>
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
                                    <th>Proveedor</th>
                                    <th>N° Documento</th>
                                    <th>Tipo Comprobante</th>
                                    <th>Comprobante</th>
                                    <th>Impuesto</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayCompra"><th colspan="7" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="compra in arrayCompra" :key="compra.id">
                                    <td v-text="compra.fecha_hora"></td>
                                    <td v-text="compra.nombre_proveedor"></td>
                                    <td v-text="compra.num_documento"></td>
                                    <td v-text="formatTipoComprobante(compra)"></td>
                                    <td v-text="formatComprobante(compra)"></td>
                                    <td v-text="compra.impuesto"></td>
                                    <td v-text="compra.total_compra"></td>
                                    <td>
                                        <div v-if="compra.estado=='activo'">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else-if="compra.estado=='inactivo'">
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
            arrayCompra: [],
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

        this.listarReporteCompra(1, this.buscar, this.criterio);
    },
    methods: {
        listarReporteCompra(page, buscar, criterio){
            let me = this;
            // var url = '/compra?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page+'&fecha_inicio='+this.fecha_inicio+'&fecha_fin='+this.fecha_fin;
            axios.post('/ingreso/reporte',{
                'page': page,
                'buscar': buscar,
                'criterio': criterio,
                'per_page': this.per_page,
                'fecha_inicio': this.fecha_inicio,
                'fecha_fin': this.fecha_fin,
            }).then(function (response){
                var respuesta = response.data;
                me.arrayCompra = respuesta.ingresos.data;
                me.pagination = respuesta.pagination;

                if(me.arrayCompra.length==0) me.show['arrayCompra'] = true;
                else me.show['arrayCompra'] = false;
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
            me.listarReporteCompra(page, buscar, criterio);
        },
        crear(){
            this.nuevo = {
                _estado: 'creando',
                fecha_hora: new Date()
            };
            this.var_config = {
                title: 'Registrar Compra',
                tipo_accion: 'registrar'
            };
            
        },
        editar(compra){
            this.editable = Object.assign({
                _estado: 'editando',
            },compra);
            this.var_config = {
                title: 'Actualizar Compra',
                tipo_accion: 'actualizar'
            };
        },
        ver(compra){
            this.ver_editable = Object.assign({
                _estado: 'viendo',
            },compra);
            this.var_config = {
                title: 'Ver Compra',
            };
        },
        cancelar(id){
            this.cancelar_editable = {
                id: id,
                _estado: 'cancelando',
            };
            this.var_config = {
                title: 'Cancelar Compra',
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
                url:'/ingreso/reporte/exportar',
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
                    // let filename = "FACTURA"+this.formatComprobante(obj_compra)+".pdf";
                    let filename = "REPORTE COMPRA.xlsx";
    
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
        enviarCorreo(compra){
            let me = this;
            axios.post('/compra/enviar',{
                id: compra.id,
                tipo_comprobante: compra.tipo_comprobante,
                serie_comprobante: compra.serie_comprobante,
                num_comprobante: compra.num_comprobante
            }).then(function (response){
                console.log(response.data);
            })
            .catch(function (error){
                console.log(error);
            });
        },
        verificarMostrarBotonCorreo(compra){
            let fecha_inicio = String(compra.fecha_hora).split(' ')[0].replace(/-/g,'/');
            fecha_inicio = new Date(fecha_inicio).getTime();
            let fecha_fin = new Date().getTime();
            let diff = fecha_fin - fecha_inicio;
            let dias = diff/(1000*60*60*24);

            if(dias <= 7)
                return true;
            else
                return false;
        },
        verificarMostrarBotonCancelar(compra){
            let fecha_inicio = String(compra.fecha_hora).split(' ')[0].replace(/-/g,'/');
            fecha_inicio = new Date(fecha_inicio).getTime();
            let fecha_fin = new Date().getTime();
            let diff = fecha_fin - fecha_inicio;
            let dias = diff/(1000*60*60*24);

            if(compra.estado == 'aceptado' && dias <= 7)
                return true;
            else
                return false;
        }
    }
}
</script>
