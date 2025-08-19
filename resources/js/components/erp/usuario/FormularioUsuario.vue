<template>
    <div class="modal fade mostrar" tabindex="-1" usuario="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

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
                                    <input type="text" v-model="editable.name" class="form-control" placeholder="Nombre...">
                                    <span class="text-error" v-if="errors.name">{{errors.name}}</span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Email: *</dt></label>
                                    <input type="text" v-model="editable.email" class="form-control" placeholder="Email...">
                                    <span class="text-error" v-if="errors.email">{{errors.email}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Password: *</dt></label>
                                    <input type="password" v-model="editable.password" class="form-control" placeholder="Password...">
                                    <span class="text-error" v-if="errors.password">{{errors.password}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Password Confirm: *</dt></label>
                                    <input type="password" v-model="editable.password_confirmation" class="form-control" placeholder="Password Confirm...">
                                    <span class="text-error" v-if="errors.password_confirmation">{{errors.password_confirmation}}</span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Role: *</dt></label>
                                    <role-select v-model="editable.role_id"></role-select>
                                    <span class="text-error" v-if="errors.role_id">{{errors.role_id}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Estado: *</dt></label>
                                    <div class="checkbox-inline">
                                        <input type="checkbox" v-model="editable._estado_usuario">
                                    </div>
                                    <span class="text-error" v-if="errors.estado">{{errors.estado}}</span>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarUsuario()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarUsuario()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>

const RoleSelect = () => import("@/components/referencias/RoleSelect");

export default {
    components: {
        "role-select": RoleSelect,
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
        }
        };
    },
    mounted() {
        if(!this.editable.id){
            //Nuevo
            this.editable._estado_usuario = true;
        }else{
            //Editar
            if(this.editable.roles[0]){
                this.editable.role_id = this.editable.roles[0].id;
            }

            if(this.editable.estado == 'activo'){
                this.editable._estado_usuario = true;
            }else{
                this.editable._estado_usuario = false;
            }
        }
        this.$forceUpdate();
    },
    methods: {
        registrarUsuario(){
            let me = this;
            this.btn['registrar'] = true;

            if(this.editable._estado_usuario)
                this.editable.estado = 'activo';
            else
                this.editable.estado = 'inactivo';

            axios.post('/usuario/registrar',this.editable).then(function (response){
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
        actualizarUsuario(){
            let me = this;
            this.btn['actualizar'] = true;

            if(this.editable._estado_usuario)
                this.editable.estado = 'activo';
            else
                this.editable.estado = 'inactivo';

            axios.put('/usuario/actualizar',this.editable).then(function (response){
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