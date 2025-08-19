<template>
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Configuracion</li>
                <li class="breadcrumb-item"><a href="#">Perfil</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Perfiles
                        <!-- <button type="button" @click="crear()" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button> -->
                    </div>
                    <div class="card-body">
                            <!-- <button @click="aumentar">+</button>
                            <button @click="ddisminuir(2)">-</button>
                            <button @click="obtenerCursos">Obtener Cursos</button>
                            <h1>numero {{ numero }}</h1> -->

                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <!-- {{editable}} -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group pull-right">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" v-model="editable._tipo" class="custom-control-input" id="customSwitch3" @change="changeTipo($event)">
                                            <label style="width:70px;" class="custom-control-label" for="customSwitch3" v-html="text._tipo"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Razon Social: *</dt></label>
                                        <input type="text" v-model="editable.razon_social" class="form-control" placeholder="Razon Social...">
                                        <span class="text-error" v-if="errors.razon_social">{{errors.razon_social}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Nombre Comercial: *</dt></label>
                                        <input type="text" v-model="editable.nombre_comercial" class="form-control" placeholder="Nombre Comercial...">
                                        <span class="text-error" v-if="errors.nombre_comercial">{{errors.nombre_comercial}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>RUC: *</dt></label>
                                        <input type="text" v-model="editable.ruc" class="form-control" placeholder="RUC...">
                                        <span class="text-error" v-if="errors.ruc">{{errors.ruc}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Direccion: *</dt></label>
                                        <input type="text" v-model="editable.direccion" class="form-control" placeholder="Direccion...">
                                        <span class="text-error" v-if="errors.direccion">{{errors.direccion}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Departamento: *</dt></label>
                                        <input type="text" v-model="editable.departamento" class="form-control" placeholder="Departamento...">
                                        <span class="text-error" v-if="errors.departamento">{{errors.departamento}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Provincia: *</dt></label>
                                        <input type="text" v-model="editable.provincia" class="form-control" placeholder="Provincia...">
                                        <span class="text-error" v-if="errors.provincia">{{errors.provincia}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Distrito: *</dt></label>
                                        <input type="text" v-model="editable.distrito" class="form-control" placeholder="Distrito...">
                                        <span class="text-error" v-if="errors.distrito">{{errors.distrito}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>COD. PAIS: *</dt></label>
                                        <input type="text" v-model="editable.cod_pais" class="form-control" placeholder="Cod. Pais...">
                                        <span class="text-error" v-if="errors.cod_pais">{{errors.cod_pais}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Ubigeo: *</dt></label>
                                        <input type="text" v-model="editable.ubigeo" class="form-control" placeholder="Ubigeo...">
                                        <span class="text-error" v-if="errors.ubigeo">{{errors.ubigeo}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Telefono: *</dt></label>
                                        <input type="text" v-model="editable.telefono" class="form-control" placeholder="Telefono...">
                                        <span class="text-error" v-if="errors.telefono">{{errors.telefono}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Usuario SOL: *</dt></label>
                                        <input type="text" v-model="editable.usuario" class="form-control" placeholder="Usuario SOL...">
                                        <span class="text-error" v-if="errors.usuario">{{errors.usuario}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Clave SOL: *</dt></label>
                                        <input type="text" v-model="editable.clave" class="form-control" placeholder="Clave SOL...">
                                        <span class="text-error" v-if="errors.clave">{{errors.clave}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Contraseña Cert.: *</dt></label>
                                        <input type="text" v-model="editable.firma" class="form-control" placeholder="Contraseña Cert...">
                                        <span class="text-error" v-if="errors.firma">{{errors.firma}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Correo: </dt></label>
                                        <input type="text" v-model="editable.correo" class="form-control" placeholder="Correo...">
                                        <span class="text-error" v-if="errors.correo">{{errors.correo}}</span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Logotipo: *</dt></label>
                                        <input type="file" @change="imageChanged" class="form-control" accept="jpeg, jpe, png">
                                        <span class="text-error" v-if="errors.otro_imagen">{{errors.otro_imagen}}</span>
                                    </div>
                                </div>
                            </div>

                            <div v-if="editable.id" class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label><dt>Logotipo: *</dt></label>
                                        <img v-if="editable.imagen" class="form-control" v-bind:src="'/images/'+editable.imagen"/>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group pull-right">
                                        <button type="button" class="btn btn-primary" :disabled="btn.actualizar"  @click="actualizarPerfil()">Guardar</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
                
            </div>
        </main>
</template>

<script>
import { mapState, mapMutations } from 'vuex'

const FormularioPerfil = () => import("@/components/erp/perfil/FormularioPerfil");

export default {
    components: {
        "v-formulario-perfil": FormularioPerfil,
    },
    data(){
        return {
            nuevo: {},
            editable: {
                _tipo: false
            },
            show: {},
            var_config: {},
            arrayPerfil: [],
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
            errors: [],
            text: {},
            btn: {}
        }
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
        },
        ...mapState(['app_mode'])
    },
    mounted() {
        console.log('Component mounted.')
        this.listarPerfil(1, this.buscar, this.criterio);
    },
    methods: {
        ...mapMutations(['aumentar','disminuir','setAppMode']),
        setterAppMode(mode){
            this.setAppMode(mode);
        },
        listarPerfil(page, buscar, criterio){
            let me = this;
            var url = '/perfil?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;
            axios.get(url).then(function (response){
                let respuesta = response.data.perfiles;
                // console.log(respuesta);
                me.editable = respuesta[0];
                if(me.editable.tipo=='production') {
                    me.editable._tipo = true;
                    me.text._tipo = 'Produccion';
                }
                if(me.editable.tipo=='beta') {
                    me.editable._tipo = false;
                    me.text._tipo = 'Prueba';
                }

                // me.pagination = respuesta.pagination;

                // if(me.arrayPerfil.length==0) me.show['arrayPerfil'] = true;
                // else me.show['arrayPerfil'] = false;
            })
            .catch(function (error){
                console.log(error);
            });
        },
        actualizarPerfil(){
            let me = this;
            this.btn['actualizar'] = true;
            this.$forceUpdate();

            swal({
            title: 'Esta seguro de actualizar los datos?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
            if (result.value) {

                if(me.editable._tipo) me.editable.tipo = 'production';
                else me.editable.tipo = 'beta';
                
                axios.put('/perfil/actualizar',this.editable).then(function (response){
                    me.btn['actualizar'] = false;

                    let mode='';
                    if(me.editable._tipo) mode = 'Produccion';
                    else mode = 'Prueba';

                    me.setterAppMode(mode);
                    me.$forceUpdate();

                    swal(
                    'Actualizado',
                    'El registro ha sido actualizado con exito',
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
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === swal.DismissReason.cancel
            ) {
                me.btn['actualizar'] = false;
                me.$forceUpdate();
            }
            })
        },
        cambiarPagina(page, buscar, criterio){
            let me = this;
            // Actualiza la pagina actual
            me.pagination.current_page = page;
            // Envia la peticion para visualizar la data de esta pagina
            me.listarPerfil(page, buscar, criterio);
        },
        desactivarPerfil(id){
            swal({
            title: 'Esta seguro de desactivar esta perfil?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                let me = this;

                axios.put('/perfil/desactivar',{
                    id: id,
                }).then(function (response){
                    me.listarPerfil(1, '', 'nombre');
                    swal(
                    'Desactivado',
                    'El registro ha sido desactivado con exito',
                    'success'
                    )
                })
                .catch(function (error){
                    console.log(error);
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === swal.DismissReason.cancel
            ) {

            }
            })
        },
        activarPerfil(id){
            swal({
            title: 'Esta seguro de activar esta perfil?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                let me = this;

                axios.put('/perfil/activar',{
                    id: id,
                }).then(function (response){
                    me.listarPerfil(1, '', 'nombre');
                    swal(
                    'Activado',
                    'El registro ha sido activado con exito',
                    'success'
                    )
                })
                .catch(function (error){
                    console.log(error);
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === swal.DismissReason.cancel
            ) {

            }
            })
        },
        crear(){
            this.nuevo = {
                _estado: 'creando',
            };
            this.var_config = {
                title: 'Registrar Perfil',
                tipo_accion: 'registrar'
            };
        },
        editar(perfil){
            this.editable = Object.assign({
                _estado: 'editando',
            },perfil);
            
            this.var_config = {
                title: 'Actualizar Perfil: '+String(perfil.tipo).charAt(0).toUpperCase() + String(perfil.tipo).substring(1),
                tipo_accion: 'actualizar'
            };
        },
        imageChanged(){

        },
        change(){

        },
        changeTipo(e){
            if(e.target.checked) this.text._tipo = 'Produccion';
            else this.text._tipo = 'Prueba';
            this.$forceUpdate();
        }
    },
    watch:{
        'editable._tipo': function(n, o){
            
            console.log(n);
            // if(newvalue){
            //     console.log(newvalue);
            // }
        }
    }
}
</script>