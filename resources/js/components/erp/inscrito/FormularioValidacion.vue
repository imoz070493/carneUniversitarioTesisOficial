<template>
    <div class="modal fade mostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div v-bind:class="{'show-container': btn.registrar, 'hide-container': !btn.registrar}">
                    <div class="loader"></div>
                </div>
                <div class="modal-header">
                    <h4 class="modal-title" v-text="var_config.title"></h4>
                    <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style='max-height:450px;overflow-y:auto;overflow-x:hidden;'>
                    <div class="card">
                    <!-- <div class="card-header">
                        <i class="fa fa-align-justify"></i> Errores
                        <button type="button" @click="crear()" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div> -->
                    <div class="card-body">
                        <!-- <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarIngresoEgreso(1,buscar, criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarIngresoEgreso(1,buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div> -->
                        <!-- {{editable}} -->
                        <!-- {{validado}} -->
                        <dt>Estado de Imagen:</dt>
                        <div v-if="validado==true"><span class="badge badge-success">Validado</span></div>
                        <div v-if="validado==false"><span class="badge badge-danger">Con Observaciones</span></div>
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Especificación</th>
                                    <th>Resultado</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody v-if="resultado">
                                <tr>
                                    <td v-text="'1'"></td>
                                    <td v-text="'Tamaño'"></td>
                                    <td v-text="parseFloat(resultado.tamanio.valor).toFixed(2)+' Kb'"></td>
                                    <td v-if="resultado.tamanio.resultado=='validado'"><span class="badge badge-success">Validado</span></td>
                                    <td v-if="resultado.tamanio.resultado=='invalido'"><span class="badge badge-danger">Invalido</span></td>
                                </tr>
                                <tr>
                                    <td v-text="'2'"></td>
                                    <td v-text="'Dimension Alto'"></td>
                                    <td v-text="resultado.dimension_alto.valor"></td>
                                    <td v-if="resultado.dimension_alto.resultado=='validado'"><span class="badge badge-success">Validado</span></td>
                                    <td v-if="resultado.dimension_alto.resultado=='invalido'"><span class="badge badge-danger">Invalido</span></td>
                                </tr>
                                <tr>
                                    <td v-text="'3'"></td>
                                    <td v-text="'Dimension Ancho'"></td>
                                    <td v-text="resultado.dimension_ancho.valor"></td>
                                    <td v-if="resultado.dimension_ancho.resultado=='validado'"><span class="badge badge-success">Validado</span></td>
                                    <td v-if="resultado.dimension_ancho.resultado=='invalido'"><span class="badge badge-danger">Invalido</span></td>
                                </tr>
                                <tr>
                                    <td v-text="'4'"></td>
                                    <td v-text="'R. Horizontal Dpi'"></td>
                                    <td v-text="resultado.horizontal_dpi.valor"></td>
                                    <td v-if="resultado.horizontal_dpi.resultado=='validado'"><span class="badge badge-success">Validado</span></td>
                                    <td v-if="resultado.horizontal_dpi.resultado=='invalido'"><span class="badge badge-danger">Invalido</span></td>
                                </tr>
                                <tr>
                                    <td v-text="'5'"></td>
                                    <td v-text="'R. Vertical Dpi'"></td>
                                    <td v-text="resultado.vertical_dpi.valor"></td>
                                    <td v-if="resultado.vertical_dpi.resultado=='validado'"><span class="badge badge-success">Validado</span></td>
                                    <td v-if="resultado.vertical_dpi.resultado=='invalido'"><span class="badge badge-danger">Invalido</span></td>
                                </tr>
                                <tr>
                                    <td v-text="'6'"></td>
                                    <td v-text="'Ojo Izquierdo X'"></td>
                                    <td v-text="resultado.left_eye_x.valor"></td>
                                    <td v-if="resultado.left_eye_x.resultado=='validado'"><span class="badge badge-success">Validado</span></td>
                                    <td v-if="resultado.left_eye_x.resultado=='invalido'"><span class="badge badge-danger">Invalido</span></td>
                                </tr>
                                <tr>
                                    <td v-text="'7'"></td>
                                    <td v-text="'Ojo Izquierdo Y'"></td>
                                    <td v-text="resultado.left_eye_y.valor"></td>
                                    <td v-if="resultado.left_eye_y.resultado=='validado'"><span class="badge badge-success">Validado</span></td>
                                    <td v-if="resultado.left_eye_y.resultado=='invalido'"><span class="badge badge-danger">Invalido</span></td>
                                </tr>
                                <tr>
                                    <td v-text="'8'"></td>
                                    <td v-text="'Ojo Derecho X'"></td>
                                    <td v-text="resultado.right_eye_x.valor"></td>
                                    <td v-if="resultado.right_eye_x.resultado=='validado'"><span class="badge badge-success">Validado</span></td>
                                    <td v-if="resultado.right_eye_x.resultado=='invalido'"><span class="badge badge-danger">Invalido</span></td>
                                </tr>
                                <tr>
                                    <td v-text="'9'"></td>
                                    <td v-text="'Ojo Derecho Y'"></td>
                                    <td v-text="resultado.right_eye_y.valor"></td>
                                    <td v-if="resultado.right_eye_y.resultado=='validado'"><span class="badge badge-success">Validado</span></td>
                                    <td v-if="resultado.right_eye_y.resultado=='invalido'"><span class="badge badge-danger">Invalido</span></td>
                                </tr>
                                <tr>
                                    <td v-text="'10'"></td>
                                    <td v-text="'Boca x'"></td>
                                    <td v-text="resultado.mouth_center_x.valor"></td>
                                    <td v-if="resultado.mouth_center_x.resultado=='validado'"><span class="badge badge-success">Validado</span></td>
                                    <td v-if="resultado.mouth_center_x.resultado=='invalido'"><span class="badge badge-danger">Invalido</span></td>
                                </tr>
                                <tr>
                                    <td v-text="'11'"></td>
                                    <td v-text="'Boca Y'"></td>
                                    <td v-text="resultado.mouth_center_y.valor"></td>
                                    <td v-if="resultado.mouth_center_y.resultado=='validado'"><span class="badge badge-success">Validado</span></td>
                                    <td v-if="resultado.mouth_center_y.resultado=='invalido'"><span class="badge badge-danger">Invalido</span></td>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" :disabled="btn.cancelar" @click="cerrarModal()">Cerrar</button>
                    <!-- <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarVenta()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarVenta()">Actualizar</button> -->
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
            nuevo: {},
            editable: Object.assign({},this.value),
            show: {},
            btn: {},
            ocultar_btn: {},
            array_errores: [],
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
            resultado: null,
            validado: false
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
        this.array_errores = this.value.data;
        this.validarImagenBackend();
        this.$forceUpdate();
    },
    methods: {
        validarImagenBackend(){
            let me = this;
            me.btn['registrar'] = true;
            let _editable = {new_document: this.editable.new_document}

            axios.post('/inscrito/validar_imagen',_editable).then(function (response){
                me.btn['registrar'] = false;
                console.log(response.data);
                me.resultado = response.data.resultados
                me.validado = response.data.validado
            })
            .catch(error => {
                me.btn['registrar'] = false;

                if(error.request.status){
                    if(error.request.status == 419){
                        location.reload();
                    }
                }

                if(error.request.response){
                    let response = JSON.parse(error.request.response);
                    console.log(response);
                    me.errors = response.errors;
                }
            });
        },
        cambiarPagina(page, buscar, criterio){
            let me = this;
            // Actualiza la pagina actual
            me.pagination.current_page = page;
            // Envia la peticion para visualizar la data de esta pagina
            me.listarIngresoEgreso(page, buscar, criterio);
        },
        cerrarModal(){
            this.$emit('input',{});
            this.$emit('cerrarModal',this.validado);
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

    .hide-container{
        display: none;
    }

    .show-container{
        display: flex;
        width: calc(100% + 10px);
        height: calc(100% - 66px);
        /* border: 1px solid black; */
        position: absolute;
        z-index: 100;
        margin: 66.8px 0 0 -1px;
        background: rgba(162, 153, 153, .5);
    }

    .loader {
        border: 10px solid #f3f3f3;
        border-radius: 50%;
        border-top: 10px solid #3498db;
        width: 50px;
        height: 50px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
        top: calc(50%);
        left: 50%;
        position: absolute;
        margin: -25px 0 0 -25px;
        z-index: 100;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>