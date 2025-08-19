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
                        {{editable}}
                        <!-- {{arrayPermiso}} -->
                        <!-- {{activados}}<br><br><br><br>
                        {{desactivados}} -->
                        <div class="row" v-for="(item, key) in arrayPermiso" :key="key">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-group">
                                    <label><dt>{{item.modulo.charAt(0).toUpperCase() + item.modulo.slice(1)}} :</dt></label>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="row">
                                    <div
                                        class="col-lg-3 col-md-3 col-sm-3 col-xs-12"
                                        v-for="(item2, key2) in item.permisos" :key="key2">
                                        <label>{{item2.regla}}: </label>
                                        <input type="checkbox" v-model="item2.value" @change="cambiarValorItem(item2)">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarRole()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarRole()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>

// const CategoriaSelect = () => import("@/components/referencias/CategoriaSelect");

export default {
    components: {
        // "categoria-select": CategoriaSelect,
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
            arrayPermiso: [],
            rolPermisos: [],
            activados: [],
            desactivados: []
        };
    },
    mounted() {

        this.rolPermisos = this.editable.permisos;
        this.listarPermiso();

        if(!this.editable.id){
            //Nuevo
        }else{
            //Editar
        }
        this.$forceUpdate();
    },
    methods: {
        listarPermiso(){
            let me = this;
            var url = '/permiso/listar_permiso';
            axios.get(url).then(function (response){
                let respuesta = response.data;

                me.formatearPermisos(respuesta.permisos);
            })
            .catch(function (error){
                console.log(error);
            });
        },
        registrarRole(){
            let me = this;
            this.btn['registrar'] = true;

            axios.post('/permiso/registrar',this.editable).then(function (response){
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
        actualizarRole(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.put('/permiso/actualizar',{
                rol: this.editable.name,
                activados: this.activados,
                desactivados: this.desactivados
            }).then(function (response){
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
        formatearPermisos(permisos_full){
            // console.log(permisos_full)
            let permisos;
            let value = false;
            let permiso_existe;

            for (const key in permisos_full) {
                permisos = [];

                permisos_full[key].forEach(element => {

                    permiso_existe = this.rolPermisos.find(e => e.name_permission == element.name);
                
                    if(permiso_existe)
                        value = true;
                    else
                        value = false;

                    
                    permisos.push({
                        id: element.id,
                        name: element.name,
                        regla: element.regla,
                        value: value
                    });
                });
                
                this.arrayPermiso.push({
                    modulo: key,
                    permisos: permisos
                });
            }
        },
        cambiarValorItem(objeto){
            let indice;
            
            if(objeto.value){                
                indice = this.desactivados.findIndex(element => element.name == objeto.name);

                if(indice >=0){
                    this.desactivados.splice(indice,1);
                }else{
                    this.activados.push(objeto);
                }
            }else{
                indice = this.activados.findIndex(element => element.name == objeto.name);

                if(indice >=0){
                    this.activados.splice(indice,1);
                }else{                    
                    this.desactivados.push(objeto);
                }
            }
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