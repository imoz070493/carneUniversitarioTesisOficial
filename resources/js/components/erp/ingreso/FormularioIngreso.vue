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
                        <!-- {{array_detalles_ingresos}} -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Proveedor: *</dt></label>
                                    <proveedor-select v-model="editable.proveedor_id"></proveedor-select>
                                    <span class="text-error" v-if="errors.proveedor_id">{{errors.proveedor_id}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>T. Comprobante: *</dt></label>
                                    <tipo-comprobante-select v-model="editable.tipo_comprobante"></tipo-comprobante-select>
                                    <span class="text-error" v-if="errors.tipo_comprobante">{{errors.tipo_comprobante}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Serie Comprobante: *</dt></label>
                                    <input type="text" v-model="editable.serie_comprobante" class="form-control" placeholder="Serie Comprobante...">
                                    <span class="text-error" v-if="errors.serie_comprobante">{{errors.serie_comprobante}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Comprobante: *</dt></label>
                                    <input type="text" v-model="editable.num_comprobante" class="form-control" placeholder="N° Comprobante...">
                                    <span class="text-error" v-if="errors.num_comprobante">{{errors.num_comprobante}}</span>
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
                                    <label><dt>Precio Compra: </dt></label>
                                    <input type="number" v-model="editable.precio_compra" class="form-control" placeholder="P. Compra...">
                                    <span class="text-error" v-if="errors_detalles.precio_compra">{{errors_detalles.precio_compra}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label><dt>Precio Venta: </dt></label>
                                            <input type="number" v-model="editable.precio_venta" class="form-control" placeholder="P. Venta...">
                                            <span class="text-error" v-if="errors_detalles.precio_venta">{{errors_detalles.precio_venta}}</span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <label><dt>.</dt></label>
                                            <button @click="agregarItem()" type="button" class="btn btn-success form-control">Agregar</button>
                                            <span class="text-error" v-if="errors_detalles.item">{{errors_detalles.item}}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <span class="text-error" v-if="errors.array_detalles_ingresos" v-html="formatError(errors.array_detalles_ingresos)"></span>
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
                                        <th>Precio Compra</th>
                                        <th>Precio Venta</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="show.array_detalle_ingreso"><th colspan="7" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                    <tr v-for="(detalle_ingreso,index) in array_detalles_ingresos" :key="index">
                                        <td>
                                            <template>
                                                <button type="button" class="btn btn-danger btn-sm" @click="eliminarItem(inde)">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </template>
                                        </td>
                                        <td v-text="detalle_ingreso.nombre_articulo"></td>
                                        <td>
                                            <input type="number" v-model="detalle_ingreso.cantidad" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" v-model="detalle_ingreso.precio_compra" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" v-model="detalle_ingreso.precio_venta" class="form-control">
                                        </td>
                                        <td v-text="producto(detalle_ingreso.cantidad, detalle_ingreso.precio_compra)"></td>
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
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarIngreso()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarIngreso()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>

const ProveedorSelect = () => import("@/components/referencias/ProveedorSelect");
const TipoComprobanteSelect = () => import("@/components/referencias/TipoComprobanteSelect");
const ArticuloGeneralSelect = () => import("@/components/referencias/ArticuloGeneralSelect");

export default {
    components: {
        "proveedor-select": ProveedorSelect,
        "tipo-comprobante-select": TipoComprobanteSelect,
        "articulo-select": ArticuloGeneralSelect,
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
            errors: [],
            errors_detalles: [],
            btn: {
                registrar: false,
                actualizar: false,
            },
            array_detalles_ingresos: []
        };
    },
    computed:{
        total_articulos: function(){
            let total = 0;
            if(this.array_detalles_ingresos.length==0)
                return total;
            
            for (let i = 0; i < this.array_detalles_ingresos.length; i++) {
                total = total + (this.array_detalles_ingresos[i].cantidad*this.array_detalles_ingresos[i].precio_compra);
            }
            return total;
        },
    },
    mounted() {
        if(!this.editable.id){
            //Nuevo
            this.editable.estado = 'activo';
            this.editable.tipo_comprobante = '01';
        }else{
            //Editar
        }
        this.$forceUpdate();
    },
    methods: {
        registrarIngreso(){
            let me = this;
            this.btn['registrar'] = true;

            this.editable.total_compra = this.total_articulos;
            this.editable.array_detalles_ingresos = this.array_detalles_ingresos;

            axios.post('/ingreso/registrar',this.editable).then(function (response){
                me.$emit('guardado');
                me.cerrarModal();
            })
            .catch(error => {
                me.btn['registrar'] = false;

                if(error.request.response){
                    let response = JSON.parse(error.request.response);
                    console.log(response);
                    me.errors = response.errors;
                }
            });
        },
        actualizarIngreso(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.put('/ingreso/actualizar',this.editable).then(function (response){
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
            this.editable.nombre_articulo = e.nombre_articulo;
            this.editable.stock_actual = e.stock_actual;
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
            }else{
                delete this.errors_detalles.cantidad;
            }

            //Precio Compra
            if(!this.editable.precio_compra){
                this.errors_detalles['precio_compra'] = "[Ingrese el precio compra]";
            }else{
                delete this.errors_detalles.precio_compra;
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
                this.$forceUpdate();
                return;
            }

            let item = {
                nombre_articulo: this.editable.nombre_articulo,
                articulo_id: this.editable.articulo_id,
                stock_actual: this.editable.stock_actual,
                cantidad: this.editable.cantidad,
                precio_compra: this.editable.precio_compra,
                precio_venta: this.editable.precio_venta,
                subtotal: this.editable.cantidad * this.editable.precio_compra,
            };

            this.array_detalles_ingresos.push(item);
            this.limpiarCamposItem();
        },
        eliminarItem(index){
            this.array_detalles_ingresos.splice(index,1);
            this.$forceUpdate();
        },
        itemRepetido(articulo_id){
            let respuesta = false;
            for (let i = 0; i < this.array_detalles_ingresos.length; i++) {
                if(this.array_detalles_ingresos[i].articulo_id == articulo_id){
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
            this.editable.precio_compra = '';
            this.editable.precio_venta = '';
        },
        producto(cantidad,precio_compra){
            return cantidad*precio_compra;
        }
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