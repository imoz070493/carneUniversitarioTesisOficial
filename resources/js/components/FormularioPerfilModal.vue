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
                                    <label><dt>Estudiante:</dt></label><br>
                                    <label>{{var_config.nombre_estudiante}}</label>
                                    <span class="text-error" v-if="errors.nombre_completo">{{errors.nombre_completo}}</span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Contraseña Anterior: </dt></label>
                                    <input type="password" v-model="editable.old_password" class="form-control" placeholder="Contraseña...">
                                    <span class="text-error" v-if="errors.old_password">{{errors.old_password}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Contraseña Nueva: </dt></label>
                                    <input type="password" v-model="editable.new_password" class="form-control" placeholder="Nueva Contraseña...">
                                    <span class="text-error" v-if="errors.new_password">{{errors.new_password}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Confirmar Contraseña Nueva: </dt></label>
                                    <input type="password" v-model="editable.new_password_confirmation" class="form-control" placeholder="Confirmar Contraseña...">
                                    <span class="text-error" v-if="errors.new_password_confirmation">{{errors.new_password_confirmation}}</span>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarCliente()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarCliente()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>
import { mapState, mapMutations } from 'vuex'

const TipoDocumentoSelect = () => import("@/components/referencias/TipoDocumentoSelect");
const DocumentoBusqueda = () => import("@/components/referencias/DocumentoBusqueda");

export default {
    components: {
        "tipo-documento-select": TipoDocumentoSelect,
        "documento-busqueda": DocumentoBusqueda,
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
                tipo_documento : '',
            },this.value),
            errors: [],
            btn: {
                registrar: false,
                actualizar: false,
            },
        };
    },
    computed:{
        ...mapState(['vuex_perfil_modal'])
    },
    mounted() {
        if(!this.editable.id){
            //Nuevo
            this.editable.estado = 'activo';
            this.editable.tipo_documento = 'ruc';
        }else{
            //Editar
            if(this.editable.tipo_documento == 'ruc'){
                this.editable.nombre_completo = this.editable.razon_social;
            }
            else if(this.editable.tipo_documento == 'dni'){
                this.editable.nombre_completo = this.editable.nombre;
            }
        }
        this.$forceUpdate();
    },
    methods: {
        ...mapMutations(['aumentar','disminuir','setVuexPerfilModal']),
        setterPerfilModal(mode){
            this.setVuexPerfilModal(mode);
        },
        registrarCliente(){
            let me = this;
            this.btn['registrar'] = true;

            axios.post('/cliente/registrar',this.editable).then(function (response){
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
        actualizarCliente(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.post('/perfil/actualizar_password',this.editable).then(function (response){
                swal(
                    'Activado',
                    'La contraseña ha sido actualizada con éxito',
                    'success'
                )
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
            this.setterPerfilModal('');
            // this.$emit('input',{});
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
        },
        setBusqueda(e){
            if(typeof e === 'object'){
                if(this.editable.tipo_documento == 'ruc'){
                    this.editable.nombre_completo = e.razonSocial;
                    this.editable.direccion = e.direccion;
                }
                else if(this.editable.tipo_documento == 'dni'){
                    this.editable.nombre_completo = e.apellidoPaterno+' '+e.apellidoMaterno+' '+e.nombres;
                    this.editable.direccion = '';
                }
            }else{
                alert("Puede volver a realizar la busqueda");
            }

            this.$forceUpdate();
        }
    },
    watch: {
        
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