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
                        {{editable}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>PeriodoAcademico: *</dt></label>
                                    <input type="text" v-model="editable.nombre" class="form-control" placeholder="PeriodoAcademico...">
                                    <span class="text-error" v-if="errors.nombre">{{errors.nombre}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Inicio: *</dt></label>
                                    <date-picker-2 
                                        v-model="editable.fecha_inicio"
                                        lang="es"
                                        type="date"
                                        format="DD-MM-YYYY"
                                        :disabled="lock.fecha_inicio"
                                    ></date-picker-2>
                                    <span class="text-error" v-if="errors.fecha_inicio">{{errors.fecha_inicio}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Fecha Fin: *</dt></label>
                                    <date-picker-2 
                                        v-model="editable.fecha_fin"
                                        lang="es"
                                        type="date"
                                        format="DD-MM-YYYY"
                                        :disabled="lock.fecha_fin"
                                    ></date-picker-2>
                                    <span class="text-error" v-if="errors.fecha_fin">{{errors.fecha_fin}}</span>
                                </div>
                            </div>
                        </div>

                    </form>
                    <br><br><br><br><br><br><br><br><br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarPeriodoAcademico()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarPeriodoAcademico()">Actualizar</button>
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
            this.editable.estado = 'inactivo';
            this.editable.fecha_inicio = now(true);
        }else{
            //Editar
        }
        this.$forceUpdate();
    },
    methods: {
        registrarPeriodoAcademico(){
            let me = this;
            this.btn['registrar'] = true;

            axios.post('/periodo_academico/registrar',this.editable).then(function (response){
                me.$emit('guardado');
                me.cerrarModal();
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
        actualizarPeriodoAcademico(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.put('/periodo_academico/actualizar',this.editable).then(function (response){
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
        imageChanged(e) {
            console.log(e.target.files[0]);
            let propiedades = e.target.files[0];

            var fileReader = new FileReader();

            fileReader.readAsDataURL(e.target.files[0]);
            fileReader.onload = e => {
                this.editable.name_image = propiedades.name;
                this.editable.new_imagen = e.target.result;
            };
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