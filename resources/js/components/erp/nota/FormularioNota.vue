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
                        <!-- {{array_detalles_notas}} -->

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>T. Comprobante: *</dt></label>
                                    <tipo-comprobante-nota-select v-model="editable.tipo_comprobante"></tipo-comprobante-nota-select>
                                    <span class="text-error" v-if="errors.tipo_comprobante_">{{errors.tipo_comprobante_}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Doc. Modifica: *</dt></label>
                                    <div class="row"> 
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                            <input 
                                                type="text"
                                                v-model="editable.num_documento_modifica"
                                                class="form-control"
                                                placeholder="N° Doc. Modifica..."
                                                :disabled="lock.num_documento_modifica">
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                            <button @click="verComprobantes()" type="button" class="btn btn-info form-control"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <span class="text-error" v-if="errors.serie_comprobante">{{errors.serie_comprobante}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Serie: *</dt></label>
                                    <input
                                        type="text"
                                        v-model="editable.serie_comprobante"
                                        class="form-control"
                                        placeholder="Serie..."
                                        :disabled="lock.serie_comprobante">
                                    <span class="text-error" v-if="errors.serie_comprobante">{{errors.serie_comprobante}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>N° Comprobante: *</dt></label>
                                    <input
                                        type="text"
                                        v-model="editable.num_comprobante"
                                        class="form-control"
                                        placeholder="N° Doc Modifica..."
                                        :disabled="lock.num_comprobante">
                                    <span class="text-error" v-if="errors.num_comprobante">{{errors.num_comprobante}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Motivo: *</dt></label>
                                    <motivo-nota-select 
                                        v-model="editable.motivo"
                                        :tipo_comprobante="editable.tipo_comprobante"
                                        @setMotivo="setMotivo"
                                    ></motivo-nota-select>
                                    <span class="text-error" v-if="errors.motivo">{{errors.motivo}}</span>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
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

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Cliente: *</dt></label>
                                    <input
                                        type="text"
                                        v-model="editable.nombre_cliente"
                                        class="form-control"
                                        placeholder="Cliente..."
                                        :disabled="lock.nombre_cliente">
                                    <span class="text-error" v-if="errors.nombre_cliente">{{errors.nombre_cliente}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <span class="text-error" v-if="errors.array_detalles_notas" v-html="formatError(errors.array_detalles_notas)"></span>
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
                                    <tr v-for="(detalle_venta,index) in array_detalles_notas" :key="index">
                                        <td>
                                            <!-- <template>
                                                <button type="button" class="btn btn-danger btn-sm" @click="eliminarItem(inde)">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </template> -->
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
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarVenta()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarVenta()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

        <!-- Nuevo -->
        <v-formulario-comprobante
            v-if="comprobante_editable._estado=='abriendo'" 
            v-model="comprobante_editable"
            ref="cmp_crear_nota"
            :var_config_comprobante="var_config_comprobante"
            @obtenerDetalle="obtenerDetalle"
        ></v-formulario-comprobante>
    </div>
</template>
<script>

const MonedaSelect = () => import("@/components/referencias/MonedaSelect");
const TipoComprobanteNotaSelect = () => import("@/components/referencias/TipoComprobanteNotaSelect");
const MotivoNotaSelect = () => import("@/components/referencias/MotivoNotaSelect");

const FormularioComprobante = () => import("@/components/erp/nota/FormularioComprobante");

export default {
    components: {
        "moneda-select": MonedaSelect,
        "tipo-comprobante-nota-select": TipoComprobanteNotaSelect,
        "motivo-nota-select": MotivoNotaSelect,

        "v-formulario-comprobante": FormularioComprobante,
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
            comprobante_editable: {},
            var_config_comprobante: {},
            lock: {},
            show: {},
            errors: [],
            errors_detalles: [],
            btn: {
                registrar: false,
                actualizar: false,
            },
            array_detalles_notas: []
        };
    },
    computed:{
        total_articulos: function(){
            let total = 0;
            if(this.array_detalles_notas.length==0)
                return total;
            
            for (let i = 0; i < this.array_detalles_notas.length; i++) {
                total = total + (this.array_detalles_notas[i].cantidad*this.array_detalles_notas[i].precio_venta);
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
            this.lock['num_documento_modifica'] = true;
            this.lock['serie_comprobante'] = true;
            this.lock['num_comprobante'] = true;
            this.lock['nombre_cliente'] = true;
        }else{
            //Editar
        }
        this.$forceUpdate();
    },
    methods: {
        registrarVenta(){
            let me = this;
            this.btn['registrar'] = true;

            this.editable.total_venta = this.total_articulos;
            this.editable.array_detalles_notas = this.array_detalles_notas;

            axios.post('/nota/registrar',this.editable).then(function (response){
                me.$emit('guardado');
                me.cerrarModal();
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
        actualizarVenta(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.put('/nota/actualizar',this.editable).then(function (response){
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

            this.array_detalles_notas.push(item);
            this.limpiarCamposItem();
        },
        eliminarItem(index){
            this.array_detalles_notas.splice(index,1);
            this.$forceUpdate();
        },
        itemRepetido(articulo_id){
            let respuesta = false;
            for (let i = 0; i < this.array_detalles_notas.length; i++) {
                if(this.array_detalles_notas[i].articulo_id == articulo_id){
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
            var url = '/nota/obtener_cor_comprobante?tp='+tipo_comprobante;
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
        verComprobantes(){
            if(this.editable.tipo_comprobante=='0'){
                alert('Seleccione el tipo de comprobante');
                return;
            }

            this.comprobante_editable = {
                _estado: 'abriendo',
            };
            this.var_config_comprobante = {
                title: 'Listar de Comprobantes',
            };
        },
        obtenerDetalle(e){
            console.log('obtener detalle',e)
            this.array_detalles_notas = e.detalle_venta;
            this.editable.nombre_cliente = e.venta.razon_social;
            this.editable.tipodoc = e.venta.tipo_comprobante;
            this.editable.modifica = e.venta.serie_comprobante+e.venta.num_comprobante;
            this.editable.venta_id = e.venta.id;
            this.editable.cliente_id = e.venta.cliente_id;
            this.editable.docmodifica_tipo = e.venta.tipo_comprobante;
            this.editable.smodifica = e.venta.serie_comprobante;
            this.editable.nmodifica = e.venta.num_comprobante;
            this.editable.num_documento_modifica = e.venta.serie_comprobante + '-' + e.venta.num_comprobante;
        },
        setMotivo(e){
            console.log(e);
            this.editable.motivod = e.nombre;
            this.$forceUpdate();
        }
    },
    watch: {
        "editable.tipo_comprobante": function(newvalue, oldvalue) {
            if (newvalue && newvalue!='0') {
                this.obtenerComprobante(newvalue);
            }else if(newvalue=='0'){
                
            }
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