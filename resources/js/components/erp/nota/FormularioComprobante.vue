<template>
    <div class="modal fade mostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

        <div class="modal-dialog modal-primary modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="var_config_comprobante.title"></h4>
                    <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style='max-height:450px;overflow-y:auto;overflow-x:hidden;'>
                    <!-- {{arrayComprobantes}} -->
                    <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Comprobante</th>
                                    <th>Impuesto</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayComprobantes"><th colspan="7" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="venta in arrayComprobantes" :key="venta.id">
                                    <td>
                                        <button type="button" @click="obtenerDetalleVenta(venta)" class="btn btn-info btn-sm" title="Obtener Detalle">
                                          <i class="icon-plus"></i>
                                        </button>
                                    </td>
                                    <td v-text="venta.fecha_hora"></td>
                                    <td v-text="venta.razon_social"></td>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>

export default {
    components: {
    },
    props: {
        value: {
            type: Object,
            default: {}
        },
        var_config_comprobante: {
            type: Object,
            default: {}
        },
    },
    data() {
        return {
            editable: Object.assign({
                tipo_comprobante: '0'
            },this.value),
            lock: {},
            show: {},
            errors: [],
            errors_detalles: [],
            btn: {
                registrar: false,
                actualizar: false,
            },
            pagination: {
                'total' : 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0,
                'to' : 0,
            },
            array_detalles_notas: [],
            arrayComprobantes: [],
            offset: 3,
            criterio: 'nombre',
            buscar: '',
            per_page: 5,
        };
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

        this.listarComprobante(1, this.buscar, this.criterio);
    },
    methods: {
        listarComprobante(page, buscar, criterio){
            let me = this;
            axios.post('/nota/comprobantes',{
                'page': page,
                'buscar': buscar,
                'criterio': criterio,
                'per_page': this.per_page,
                // 'fecha_inicio': this.fecha_inicio,
                // 'fecha_fin': this.fecha_fin,
            }).then(function (response){
                var respuesta = response.data;
                // console.log('respuesta',respuesta)
                me.arrayComprobantes = respuesta.comprobantes.data;
                me.pagination = respuesta.pagination;

                if(me.arrayComprobantes.length==0) me.show['arrayNota'] = true;
                else me.show['arrayNota'] = false;
            })
            .catch(function (error){
                console.log(error);
            });
        },
        obtenerDetalleVenta(venta){
            let me = this;
            let url = '/detalle_venta/obtener?id='+venta.id
            axios.get(url).then(function (response){
                let respuesta = response.data;
                // console.log('respuesta',respuesta)

                return respuesta;
            }).then(respuesta => {
                me.$emit('obtenerDetalle',{
                    venta: venta,
                    detalle_venta: respuesta
                });
                me.$emit('input',{});
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
            me.listarComprobante(page, buscar, criterio);
        },
        cerrarModal(){
            this.$emit('input',{});
        },
        formatComprobante(e){
            return String(e.serie_comprobante + '-' + e.num_comprobante).toUpperCase();
        },
    }
};
</script>
<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
    @media (max-height: 500px) {
        .modal-xl {
            max-width: 1140px;} }
</style>