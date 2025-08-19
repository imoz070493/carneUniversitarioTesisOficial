<template>
    <div class="modal fade mostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

        <div class="modal-dialog modal-primary modal-lg">
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
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Convocatoria: </dt></label>
                                    <span v-if="editable.nombre">{{editable.nombre}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Inicio: </dt></label>
                                    <span v-if="editable.fecha_inicio">{{editable.fecha_inicio}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Fin: </dt></label>
                                    <span v-if="editable.fecha_fin">{{editable.fecha_fin}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div v-if="!editable.activo" class="form-group">
                                    <label><dt>Estado: </dt></label>
                                    <span class="badge badge-success">Activo</span>
                                </div>
                                <div v-else class="form-group">
                                    <label><dt>Estado: </dt></label>
                                    <span class="badge badge-danger">Finalizado</span>
                                </div>
                            </div>
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

const CategoriaSelect = () => import("@/components/referencias/CategoriaSelect");
const MarcaSelect = () => import("@/components/referencias/MarcaSelect");
const UnidadMedidaSelect = () => import("@/components/referencias/UnidadMedidaSelect");

export default {
    components: {
        "categoria-select": CategoriaSelect,
        "marca-select": MarcaSelect,
        "unidad-medida-select": UnidadMedidaSelect,
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
            errors: [],
            btn: {
                registrar: false,
                actualizar: false,
            },
            lock: {}
        };
    },
    mounted() {
        if(!this.editable.id){
            //Nuevo
            
        }else{
            //Editar
        }
        this.$forceUpdate();
    },
    methods: {
        cerrarModal(){
            this.$emit('input',{});
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