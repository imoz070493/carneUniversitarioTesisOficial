<template>
    <div class="modal fade mostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

        <div class="modal-dialog modal-primary modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="var_config.title"></h4>
                    <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style='max-height:450px;overflow-y:auto;overflow-x:hidden;'>
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <!-- {{editable}} -->
                        <!-- <br> -->
                        <!-- {{array_detalles_ventas}} -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Cliente: *</dt></label>
                                    <span v-if="editable.nombre_cliente" v-text="editable.nombre_cliente"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>T. Comprobante: *</dt></label>
                                    <span v-if="editable.tipo_comprobante=='01'" v-text="'FACTURA'"></span>
                                    <span v-else-if="editable.tipo_comprobante=='03'" v-text="'BOLETA'"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Serie Comprobante: *</dt></label>
                                    <span v-if="editable.serie_comprobante" v-text="editable.serie_comprobante"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Comprobante: *</dt></label>
                                    <span v-if="editable.num_comprobante" v-text="editable.num_comprobante"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha: *</dt></label>
                                    <span v-if="editable.fecha_hora" v-text="editable.fecha_hora"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Estado: *</dt></label>
                                    <span v-if="editable.estado">{{String(editable.estado).toUpperCase()}}</span>
                                </div>
                            </div>
                        </div>

                        <div style='overflow-x:auto;white-space:nowrap;'>
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Articulo</th>
                                        <th>Cantidad</th>
                                        <th>Precio Venta</th>
                                        <th>Descuento</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="show.array_detalle_venta"><th colspan="7" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                    <tr v-for="(detalle_venta,index) in array_detalles_ventas" :key="index">
                                        <td v-text="detalle_venta.nombre_articulo"></td>
                                        <td v-text="detalle_venta.cantidad"></td>
                                        <td v-text="detalle_venta.precio_venta"></td>
                                        <td v-text="detalle_venta.descuento"></td>
                                        <td v-text="producto(detalle_venta.cantidad, detalle_venta.precio_venta)"></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"><dt>Total</dt></td>
                                        <td v-text="total_articulos"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </form>
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
        var_config: {
            type: Object,
            default: {}
        },
    },
    data() {
        return {
            editable: Object.assign({},this.value),
            show: {},
            array_detalles_ventas: []
        };
    },
    computed:{
        total_articulos: function(){
            let total = 0;
            if(this.array_detalles_ventas.length==0)
                return total;
            
            for (let i = 0; i < this.array_detalles_ventas.length; i++) {
                total = total + (this.array_detalles_ventas[i].cantidad*this.array_detalles_ventas[i].precio_venta);
            }
            return parseFloat(total).toFixed(2);
        },
    },
    mounted() {
        if(!this.editable.id){
            //Nuevo
        }else{
            //ver
            this.listarDetalleVenta();
        }
        this.$forceUpdate();
    },
    methods: {
        listarDetalleVenta(){
            let me = this;
            var url = '/detalle_venta/obtener?id='+this.editable.id;
            axios.get(url).then(function (response){
                // var respuesta = response.data;
                me.array_detalles_ventas = response.data;

                if(me.array_detalles_ventas.length==0) me.show['arrayVenta'] = true;
                else me.show['arrayVenta'] = false;
            })
            .catch(function (error){
                console.log(error);
            });
        },
        cerrarModal(){
            this.$emit('input',{});
        },
        producto(cantidad,precio_venta){
            return parseFloat(cantidad*precio_venta).toFixed(2);
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