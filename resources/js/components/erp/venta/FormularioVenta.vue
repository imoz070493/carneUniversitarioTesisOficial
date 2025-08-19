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
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>T. Comprobante: *</dt></label>
                                    <tipo-comprobante-select v-model="editable.tipo_comprobante"></tipo-comprobante-select>
                                    <span class="text-error" v-if="errors.tipo_comprobante_">{{errors.tipo_comprobante_}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Serie Comprobante: *</dt></label>
                                    <input 
                                        type="text"
                                        v-model="editable.serie_comprobante"
                                        class="form-control"
                                        placeholder="Serie Comprobante..."
                                        :disabled="lock.serie_comprobante">
                                    <span class="text-error" v-if="errors.serie_comprobante">{{errors.serie_comprobante}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Comprobante: *</dt></label>
                                    <input
                                        type="text"
                                        v-model="editable.num_comprobante"
                                        class="form-control"
                                        placeholder="N° Comprobante..."
                                        :disabled="lock.num_comprobante">
                                    <span class="text-error" v-if="errors.num_comprobante">{{errors.num_comprobante}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Moneda: *</dt></label>
                                    <moneda-select v-model="editable.moneda"></moneda-select>
                                    <span class="text-error" v-if="errors.moneda">{{errors.moneda}}</span>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha: *</dt></label>
                                    <date-picker-2 
                                        v-model="editable.fecha_hora"
                                        lang="es"
                                        type="date"
                                        format="DD-MM-YYYY"
                                        :disabled="lock.fecha_hora"
                                    ></date-picker-2>
                                    <span class="text-error" v-if="errors.fecha_hora">{{errors.fecha_hora}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Cliente: *</dt></label>
                                    <cliente-select
                                        v-model="editable.cliente_id"
                                        :tipo_comprobante="editable.tipo_comprobante"
                                        :disabled="lock.cliente_id"
                                        ref="cmp_cliente"
                                    ></cliente-select>
                                    <span class="text-error" v-if="errors.cliente_id">{{errors.cliente_id}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Articulo: </dt></label>
                                    <articulo-select 
                                        v-model="editable.articulo_id" 
                                        ref="cmp_articulo"
                                        @setArticulo="setArticulo($event)"></articulo-select>
                                    <span class="text-error" v-if="errors_detalles.articulo_id">{{errors_detalles.articulo_id}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Cantidad: </dt></label>
                                    <input type="number" v-model="editable.cantidad" class="form-control" placeholder="Cantidad...">
                                    <span class="text-error" v-if="errors_detalles.cantidad">{{errors_detalles.cantidad}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Precio Venta: </dt></label>
                                    <input
                                        type="number"
                                        v-model="editable.precio_venta"
                                        :disabled="lock.precio_venta"
                                        class="form-control"
                                        placeholder="P. Venta...">
                                    <span class="text-error" v-if="errors_detalles.precio_venta">{{errors_detalles.precio_venta}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Descuento: </dt></label>
                                    <input
                                        type="number"
                                        v-model="editable.descuento"
                                        :disabled="lock.descuento"
                                        class="form-control"
                                        placeholder="Descuento...">
                                    <span class="text-error" v-if="errors_detalles.descuento">{{errors_detalles.descuento}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Stock: </dt></label>
                                    <input 
                                        type="number"
                                        v-model="editable.stock_actual"
                                        :disabled="lock.stock_actual"
                                        class="form-control"
                                        placeholder="Stock...">
                                    <span class="text-error" v-if="errors_detalles.stock_actual">{{errors_detalles.stock_actual}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <button @click="agregarItem()" type="button" class="btn btn-success form-control">Agregar</button>
                                    <span class="text-error" v-if="errors_detalles.item">{{errors_detalles.item}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <span class="text-error" v-if="errors.array_detalles_ventas" v-html="formatError(errors.array_detalles_ventas)"></span>
                                </div>
                            </div>
                        </div>

                        <div style='overflow-x:auto;white-space:nowrap;'>
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
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
                                        <td>
                                            <template>
                                                <button type="button" class="btn btn-danger btn-sm" @click="eliminarItem(inde)">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </template>
                                        </td>
                                        <td v-text="detalle_venta.nombre_articulo"></td>
                                        <td>
                                            <input type="number" v-model="detalle_venta.cantidad" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" v-model="detalle_venta.precio_venta" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" v-model="detalle_venta.descuento" disabled="true" class="form-control">
                                        </td>
                                        <td v-text="producto(detalle_venta.cantidad, detalle_venta.precio_venta)"></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"><dt>Total</dt></td>
                                        <td v-text="total_articulos"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" :disabled="btn.cancelar" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarVenta()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarVenta()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>

const MonedaSelect = () => import("@/components/referencias/MonedaSelect");

const ClienteSelect = () => import("@/components/referencias/ClienteSelect");
const TipoComprobanteSelect = () => import("@/components/referencias/TipoComprobanteSelect");
const ArticuloVentaSelect = () => import("@/components/referencias/ArticuloVentaSelect");

export default {
    components: {
        "moneda-select": MonedaSelect,
        "cliente-select": ClienteSelect,
        "tipo-comprobante-select": TipoComprobanteSelect,
        "articulo-select": ArticuloVentaSelect,
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
            return total;
        },
    },
    mounted() {
        if(!this.editable.id){
            //Nuevo
            this.editable.estado = 'activo';
            this.editable.moneda = 'soles';
            this.editable.fecha_hora = this.now();

            this.lock['fecha_hora'] = true;
            this.lock['serie_comprobante'] = true;
            this.lock['num_comprobante'] = true;
            this.lock['cliente_id'] = true;

            this.lock['precio_venta'] = true;
            this.lock['descuento'] = true;
            this.lock['stock_actual'] = true;
        }else{
            //Editar
        }
        this.$forceUpdate();
    },
    methods: {
        registrarVenta(){
            let me = this;
            this.btn['registrar'] = true;
            this.btn['cancelar'] = true;

            this.editable.total_venta = this.total_articulos;
            this.editable.array_detalles_ventas = this.array_detalles_ventas;

            axios.post('/venta/registrar',this.editable).then(function (response){
                swal(
                'Construido y Enviado',
                response.data.msj_sunat,
                'success'
                )

                me.$emit('guardado');
                me.cerrarModal();
            })
            .catch(error => {
                me.btn['registrar'] = false;
                me.btn['cancelar'] = false;

                let response = JSON.parse(error.request.response);
                console.log(response);

                if(response.cod_error){
                    swal(
                    'Error',
                    response.cod_error+' '+response.message,
                    'error'
                    )
                    me.$emit('guardado');
                    me.cerrarModal();
                }
                
                if(error.request.response){
                    let response = JSON.parse(error.request.response);
                    console.log(response);
                    if(response.errors)
                        me.errors = response.errors;
                }
            });
        },
        actualizarVenta(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.put('/venta/actualizar',this.editable).then(function (response){
                me.$emit('guardado');
                me.cerrarModal();
            })
            .catch(error => {
                me.btn['actualizar'] = false;

                if(error.request.response){
                    let response = JSON.parse(error.request.response);
                    console.log(response);
                    me.errors = response.errors;
                }
            });
        },
        cerrarModal(){
            this.$emit('input',{});
        },
        setArticulo(e){
            // console.log(e);
            this.editable.nombre_articulo = e.nombre_articulo;
            this.editable.stock_actual = e.stock_actual;
            this.editable.precio_venta = e.precio_venta;
        },
        agregarItem(){
            // Validacion 1: Que no se ingresen campos vacios
            //Articulo
            if(!this.editable.articulo_id){
                this.errors_detalles['articulo_id'] = "[Seleccione el articulo]";
            }else{
                delete this.errors_detalles.articulo_id;
            }

            //Cantidad
            if(!this.editable.cantidad){
                this.errors_detalles['cantidad'] = "[Ingrese la cantidad]";
            }else if(this.editable.cantidad > this.editable.stock_actual){
                this.errors_detalles['cantidad'] = "[Stock no disponible]";
            }else{
                delete this.errors_detalles.cantidad;
            }

            //Precio Venta
            if(!this.editable.precio_venta){
                this.errors_detalles['precio_venta'] = "[Ingrese el precio venta]";
            }else{
                delete this.errors_detalles.precio_venta;
            }

            // Validacion 2: Que no se repitan los items

            if(this.itemRepetido(this.editable.articulo_id)){
                this.errors_detalles['item'] = "[Este articulo ya existe en la lista]";
            }else{
                delete this.errors_detalles.item;
            }

            if(Object.keys(this.errors_detalles).length !== 0){
                console.log(this.errors_detalles)
                this.$forceUpdate();
                return;
            }

            let item = {
                nombre_articulo: this.editable.nombre_articulo,
                articulo_id: this.editable.articulo_id,
                stock_actual: this.editable.stock_actual,
                cantidad: this.editable.cantidad,
                precio_venta: this.editable.precio_venta,
                descuento: this.editable.descuento,
                subtotal: this.editable.cantidad * this.editable.precio_venta,
            };

            this.array_detalles_ventas.push(item);
            this.limpiarCamposItem();
        },
        eliminarItem(index){
            this.array_detalles_ventas.splice(index,1);
            this.$forceUpdate();
        },
        itemRepetido(articulo_id){
            let respuesta = false;
            for (let i = 0; i < this.array_detalles_ventas.length; i++) {
                if(this.array_detalles_ventas[i].articulo_id == articulo_id){
                    respuesta = true;
                    break;
                }
            }
            return respuesta;
        },
        formatError(e){
            // console.log(e);
            let text = String(e).replace(/\[/g, '');
            return text;
        },
        limpiarCamposItem(){
            this.$refs.cmp_articulo.reiniciar();
            this.editable.nombre_articulo = '';
            this.editable.articulo_id = '';
            this.editable.stock_actual = '';
            this.editable.cantidad = '';
            this.editable.precio_venta = '';
            this.editable.descuento = '';
        },
        producto(cantidad,precio_venta){
            return cantidad*precio_venta;
        },
        now(time=false){
            let date = '';
            date = new Date().toLocaleDateString().split('/').reverse().join('-');

            if(time){
                date += ' ' + new Date().toLocaleTimeString();
            }

            return date;
        },
        obtenerComprobante(tipo_comprobante){
            let me = this;
            var url = '/venta/obtener_cor_comprobante?tp='+tipo_comprobante;
            axios.get(url).then(function (response){
                console.log(response.data.data);
                if(response.data.data){
                    me.editable.serie_comprobante = response.data.data.serie;
                    me.editable.num_comprobante = response.data.data.num_comprobante;
                }
                // var respuesta = response.data;
                me.$forceUpdate();
            })
            .catch(function (error){
                console.log(error);
            });
        },
    },
    watch: {
        "editable.tipo_comprobante": function(newvalue, oldvalue) {
            if (newvalue && newvalue!='0') {
                this.lock['cliente_id'] = false;
                this.obtenerComprobante(newvalue);
            }else if(newvalue=='0'){
                this.lock['cliente_id'] = true;
                this.editable.cliente_id = null;
            }
            this.$refs.cmp_cliente.reiniciar();
            this.$forceUpdate();
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