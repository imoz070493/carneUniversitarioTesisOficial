<template>
    <div class="modal fade mostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

        <div class="modal-dialog modal-primary modal-xl">
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
                <div class="modal-body" style='max-height:550px;overflow-y:auto;overflow-x:hidden;'>
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <!-- {{editable}} -->
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Carta: *</dt></label>
                                    <input 
                                        type="text" 
                                        v-model="editable.carta" 
                                        class="form-control" 
                                        placeholder="Carta N°..."
                                        :disabled="disabled.carta"
                                    >
                                    <span class="text-error" v-if="errors.carta">{{errors.numero_documento}}</span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label><dt>Facultad: *</dt></label>
                                    <select class="form-control col-md-12" v-model="editable.facultad" :disabled="disabled.facultad">
                                        <option value="Ciencias">Ciencias</option>
                                        <option value="Ingenieria">Ingenieria</option>
                                    </select>
                                    <span class="text-error" v-if="errors.facultad">{{errors.facultad}}</span>
                                </div>
                            </div>
                        </div>

                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Codigo</th>
                                    <th>Apellido y Nombres</th>
                                    <th>Escuela Profesional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayInscrito"><th colspan="8" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="(inscrito,index) in arrayInscrito" :key="inscrito.id">
                                    <td v-text="(index+1)"></td>
                                    <td v-text="inscrito.codigo"></td>
                                    <td>{{inscrito.nombre_estudiante}}</td>
                                    <td v-if="inscrito.escuela_profesional == 'ADMINISTRACIÓN DE EMPRESAS'">EPAE</td>
                                    <td v-if="inscrito.escuela_profesional == 'EDUCACIÓN PRIMARIA INTERCULTURAL'">EPEPI</td>
                                    <td v-if="inscrito.escuela_profesional == 'CONTABILIDAD'">EPC</td>
                                    <td v-if="inscrito.escuela_profesional == 'INGENIERÍA AGROINDUSTRIAL'">EPIA</td>
                                    <td v-if="inscrito.escuela_profesional == 'INGENIERÍA AMBIENTAL'">EPIAM</td>
                                    <td v-if="inscrito.escuela_profesional == 'INGENIERÍA DE SISTEMAS'">EPIS</td>
                                </tr>
                            </tbody>
                        </table>
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

const MatriculadoBusqueda = () => import("@/components/referencias/MatriculadoBusqueda");

export default {
    components: {
        "matriculado-busqueda": MatriculadoBusqueda,
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
                tipo_documento: 'codigo',
            },this.value),
            errors: [],
            btn: {
                registrar: false,
                actualizar: false,
            },
            lock: {},
            text: {},
            arrayInscrito: [],
            show: {},
            disabled: {}
        };
    },
    mounted() {
        let me = this;
        if(!this.editable.id){
            //Nuevo
        }else{
            //Editar

            me.disabled.facultad = true;
            
            me.editable.fecha_envio_facultad = now();
        }

        this.listarDetalleEnvio(1, this.buscar, this.criterio);
        this.$forceUpdate();
    },
    methods: {
        listarDetalleEnvio(page, buscar, criterio){
            let me = this;
            // var url = '/detalle_envio?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.post('/detalle_envio',{
                page: page,
                buscar: buscar,
                criterio: criterio,
                per_page: this.per_page,
                documento_envio_id: this.editable.id
            }).then(function (response){console.log(response)
            
                var respuesta = response.data;
                me.arrayInscrito = respuesta.detalles_envios;
                me.pagination = respuesta.pagination;

                if(me.arrayInscrito.length==0) me.show['arrayInscrito'] = true;
                else me.show['arrayInscrito'] = false;
            })
            .catch(function (error){
                console.log(error);
if(error.request.status){
                    if(error.request.status == 419){
                        location.reload();
                    }
                }
            });

        },
        registrarArticulo(){
            let me = this;
            this.btn['registrar'] = true;

            if(me.editable._foto_validado) me.editable.foto_validado = 1;
            else me.editable.foto_validado = 0;

            if(me.editable._duplicado) me.editable.duplicado = 1;
            else me.editable.duplicado = 0;

            axios.post('/documento_envio/enviar',this.editable).then(function (response){
                me.$emit('guardado');
                me.cerrarModal();

                swal(
                    'Enviado',
                    'El documento fue enviado a facultad con exito',
                    'success'
                )
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

            if(me.editable._foto_validado) me.editable.foto_validado = 1;
            else me.editable.foto_validado = 0;

            // Validando la fotografia adjuntada
            if(!me.editable.new_document){
                me.errors.new_document = 'Adjunte la fotografia.';
                me.btn['actualizar'] = false;
                return;
            }else{
                delete me.errors.new_document;
            }

            // Validando la validacion verdadera
            if(!me.editable._foto_validado){
                me.errors._foto_validado = 'Marque la opcion validar.';
                me.btn['actualizar'] = false;
                return;
            }else{
                delete me.errors.new_document;
            }

            axios.put('/inscrito/actualizar',this.editable).then(function (response){
                me.$emit('guardado');
                me.cerrarModal();

                swal(
                    'Actualizado',
                    'El tramite ha sido actualizado con exito',
                    'success'
                )
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
            var imgtag = document.getElementById("image");

            fileReader.readAsDataURL(e.target.files[0]);
            fileReader.onload = e => {
                this.editable.name_document = propiedades.name;
                this.editable.new_document = e.target.result;
                imgtag.src = e.target.result;
            };

            // reader.onload = function(event) {
            //     imgtag.src = event.target.result;
            // };
        },
        setEsperando(){
            this.btn['registrar'] = true;
        },
        setBusqueda(e){console.log('setBusqueda',e)
            this.btn['registrar'] = false;

            if(typeof e === 'object'){

                if(e.escuela_profesional) this.editable.escuela_profesional = e.escuela_profesional;
                if(e.numero_documento) this.editable.dni = e.numero_documento;
                if(e.codigo_estudiante) this.editable.codigo_estudiante = e.codigo_estudiante;
                if(e.apellido_paterno) this.editable.apellido_paterno = e.apellido_paterno;
                if(e.apellido_materno) this.editable.apellido_materno = e.apellido_materno;
                if(e.nombres) this.editable.nombres = e.nombres;
                if(e.sexo) this.editable.sexo = e.sexo;
                
            }else{
                alert("El alumno no ha sido matriculado. Puede volver a realizar la busqueda");
            }

            this.$forceUpdate();
        },
        changeTipo(e){
            if(e.target.checked) this.text._foto_validado = 'SI';
            else this.text._foto_validado = 'NO';
            this.$forceUpdate();
        },
        changeDuplicado(e){
            if(e.target.checked) this.text._foto_duplicado = 'SI';
            else this.text._foto_duplicado = 'NO';
            this.$forceUpdate();
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