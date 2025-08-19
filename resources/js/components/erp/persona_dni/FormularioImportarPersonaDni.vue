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
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Excel: *</dt></label>
                                    <input type="file" @change="imageChanged" class="form-control" accept=".xlsx">
                                    <span class="text-error" v-if="errors.excel_document">{{errors.excel_document}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                Utilizar la siguiente plantilla para realizar las consultas: 
                                <a href="#" @click="descargarPlantilla()">Excel</a>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="var_config.tipo_accion=='importar'" class="btn btn-success" @click="importar()">Importar</button>
                    <button type="button" v-if="var_config.tipo_accion=='registrar'" class="btn btn-primary" :disabled="btn.registrar" @click="registrarPersonaDni()">Guardar</button>
                    <button type="button" v-if="var_config.tipo_accion=='actualizar'" class="btn btn-primary" :disabled="btn.actualizar" @click="actualizarPersonaDni()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>
<script>

const DocumentoBusqueda = () => import("@/components/referencias/DocumentoBusqueda");

export default {
    components: {
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
            tipo_documento: 'dni'
        },this.value),
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
            this.editable.origen = 'local';
        }else{
            //Editar
        }
        this.$forceUpdate();
    },
    methods: {
        registrarPersonaDni(){
            let me = this;
            this.btn['registrar'] = true;

            axios.post('/persona_dni/registrar',this.editable).then(function (response){
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
        actualizarPersonaDni(){
            let me = this;
            this.btn['actualizar'] = true;

            axios.put('/persona_dni/actualizar',this.editable).then(function (response){
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
        importar(){
            let me = this;
            this.btn['actualizar'] = true;

            // axios.put('/persona_dni/importar',this.editable).then(function (response){
            //     me.$emit('guardado');
            //     me.cerrarModal();
            // })
            axios({
                url:'/persona_dni/importar',
                method: 'POST',
                data: this.editable,
                responseType: 'blob',
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
                    let filename = "CONSULTA PERSONAS.xlsx";
    
                    var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                    var fileLink = document.createElement('a');
                    fileLink.href = fileURL;
                    if (!filename) {
                        filename = url.substr(url.lastIndexOf('/') + 1)
                    }
                    fileLink.setAttribute('download', filename);
                    document.body.appendChild(fileLink);
                    fileLink.click();

                    me.$emit('guardado');
                    me.cerrarModal();
                }
            }).catch(error => {
                me.btn['actualizar'] = false;

                const asyncExample = async () =>{
                    try {
                        const data = await error.response.data.text();
                        let response = JSON.parse(data); //200
                        if(response.errors){
                            me.errors = response.errors;
                            me.$forceUpdate();
                        }
                    }
                    catch (err) {
                        console.log(err);
                    }
                };

                const globalData = asyncExample();
            });
        },
        descargarPlantilla(){
            let me = this;
            this.btn['actualizar'] = true;

            axios({
                url:'/persona_dni/plantilla',
                method: 'POST',
                responseType: 'blob',
            }).then(response => {
                if(response.data && response.data.size){
                    let filename = "Personas.xlsx";
    
                    var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                    var fileLink = document.createElement('a');
                    fileLink.href = fileURL;
                    if (!filename) {
                        filename = url.substr(url.lastIndexOf('/') + 1)
                    }
                    fileLink.setAttribute('download', filename);
                    document.body.appendChild(fileLink);
                    fileLink.click();                }
            }).catch(error => {
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
                this.editable.name_excel = propiedades.name;
                this.editable.excel_document = e.target.result;
            };
        }
    },
    watch:{
        'editable.numero_placa': function(newval, olval){
            if(newval){
                this.editable.numero_placa = String(newval).toUpperCase();
                this.editable.placa_vigente = newval;
                this.$forceUpdate();
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