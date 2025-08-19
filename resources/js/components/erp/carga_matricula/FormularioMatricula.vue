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
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Nombre: *</dt></label>
                                    <input type="text" v-model="editable.nombre" class="form-control" placeholder="Nombre...">
                                    <span class="text-error" v-if="errors.nombre">{{errors.nombre}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Categoria: *</dt></label>
                                    <categoria-select 
                                        v-model="editable.categoria_id"
                                    ></categoria-select>
                                    <span class="text-error" v-if="errors.categoria_id">{{errors.categoria_id}}</span>
                                </div>
                            </div>

                            <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Marca: *</dt></label>
                                    <marca-select v-model="editable.marca_id"></marca-select>
                                    <span class="text-error" v-if="errors.marca_id">{{errors.marca_id}}</span>
                                </div>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Codigo: </dt></label>
                                    <input type="text" v-model="editable.codigo" class="form-control" placeholder="Codigo...">
                                    <span class="text-error" v-if="errors.codigo">{{errors.codigo}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Unidad Medida: *</dt></label>
                                    <unidad-medida-select v-model="editable.unidad_medida_id"></unidad-medida-select>
                                    <span class="text-error" v-if="errors.unidad_medida_id">{{errors.unidad_medida_id}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Descripcion: </dt></label>
                                    <input type="text" v-model="editable.descripcion" class="form-control" placeholder="Descripcion...">
                                    <span class="text-error" v-if="errors.descripcion">{{errors.descripcion}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Imagen:</dt></label>
                                    <input type="file" @change="imageChanged" class="form-control" accept="jpeg, jpe, png">
                                    <span class="text-error" v-if="errors.otro_imagen">{{errors.otro_imagen}}</span>
                                </div>
                            </div>
                        </div>

                        <div v-if="editable.id" class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Imagen:</dt></label>
                                    <img v-if="editable.imagen" class="form-control" v-bind:src="'/images/'+editable.imagen"/>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarArticulo()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarArticulo()">Actualizar</button>
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
        editable: Object.assign({
            categoria_id: '',
        },this.value),
        errors: [],
        btn: {
            registrar: false,
            actualizar: false,
        }
        };
    },
    mounted() {
        let me = this;
        if(!this.editable.id){
            //Nuevo
            this.editable.estado = 'activo';
            this.editable.unidad_medida_id = 19;
            this.editable.marca_id = 1;
            this.editable.stock = 0;
        }else{
            //Editar
        }
        me.$forceUpdate();
    },
    methods: {
        registrarArticulo(){
            let me = this;
            this.btn['registrar'] = true;

            axios.post('/articulo/registrar',this.editable).then(function (response){
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
        actualizarArticulo(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.put('/articulo/actualizar',this.editable).then(function (response){
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