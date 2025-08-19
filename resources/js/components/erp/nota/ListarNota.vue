<template>
        <main class="main" style='height:500px;max-height:500px;'>
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Ventas</li>
                <li class="breadcrumb-item"><a href="#">Notas</a></li>
                <li class="breadcrumb-item active">Listado</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Notas Credito / Debito
                        <button type="button" @click="crear()" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha Inicio</label>
                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                        <date-picker-2 v-model="fecha_inicio" lang="es" type="date" format="DD-MM-YYYY"></date-picker-2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha Fin</label>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <!-- <input type="text" class="form-control" id="fecha_fin" name="fecha_fin"> -->
                                                <date-picker-2 v-model="fecha_fin" lang="es" type="date" format="DD-MM-YYYY"></date-picker-2>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <button type="submit" class="btn btn-primary form-control" @click="listarNota(1,buscar, criterio)"><i class="fa fa-search"></i>Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <div style='overflow-x:auto;white-space:nowrap;'>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Comprobante</th>
                                    <th>Impuesto</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="show.arrayNota"><th colspan="7" class="text-center text-dark" v-text="'Vacio'"></th></tr>
                                <tr v-for="nota in arrayNota" :key="nota.id">
                                    <td>
                                        <button type="button" @click="ver(nota)" class="btn btn-info btn-sm" title="Detalles">
                                          <i class="icon-list"></i>
                                        </button>
                                        <button type="button" @click="descargarComprobante(nota)" class="btn btn-warning btn-sm" title="Detalles" target="_blank">
                                          <i class="icon-doc"></i>
                                        </button>
                                        <!-- <template v-if="verificarMostrarBotonCancelar(nota)">
                                            <button type="button" class="btn btn-danger btn-sm" @click="cancelar(nota.id)" title="Cancelar">
                                            <i class="icon-close"></i>
                                            </button>
                                        </template>
                                        <button type="button" v-if="verificarMostrarBotonCorreo(nota)" @click="enviarCorreo(nota)" class="btn btn-success btn-sm" title="Enviar Correo">
                                          <i class="icon-envelope"></i>
                                        </button> -->
                                    </td>
                                    <td v-text="nota.fecha_hora"></td>
                                    <td v-text="nota.razon_social"></td>
                                    <td v-text="formatComprobante(nota)"></td>
                                    <td v-text="nota.impuesto"></td>
                                    <td v-text="nota.total_venta"></td>
                                    <td>
                                        <div v-if="nota.estado=='aceptado'">
                                            <span class="badge badge-success">Aceptado</span>
                                        </div>
                                        <div v-else-if="nota.estado=='construido'">
                                            <span class="badge badge-info">Pendiente Envio</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Rechazado</span>
                                        </div>
                                    </td>
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
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->

            <!-- Nuevo -->
            <v-formulario-nota 
                v-if="nuevo._estado=='creando'" 
                v-model="nuevo"
                ref="cmp_crear_nota"
                :var_config="var_config"
                @guardado="listarNota(1, '', 'nombre')"
            ></v-formulario-nota>

            <!-- Editar -->
            <!-- <v-formulario-nota 
                v-if="editable._estado=='editando'" 
                v-model="editable"
                ref="cmp_crear_nota"
                :var_config="var_config"
                @guardado="listarNota(1, '', 'nombre')"
            ></v-formulario-nota> -->

            <!-- Ver -->
            <v-ver-nota 
                v-if="ver_editable._estado=='viendo'" 
                v-model="ver_editable"
                ref="cmp_ver_nota"
                :var_config="var_config"
            ></v-ver-nota>

            <!-- Cancelar -->
            <!-- <v-cancelar-nota 
                v-if="cancelar_editable._estado=='cancelando'"
                v-model="cancelar_editable"
                ref="cmp_cancelar_nota"
                :var_config="var_config"
                @guardado="listarNota(1, '', 'nombre')"
            ></v-cancelar-nota> -->

            <!--Fin del modal-->
        </main>
</template>

<script>

const FormularioNota = () => import("@/components/erp/nota/FormularioNota");
const VerNota = () => import("@/components/erp/nota/VerNota");

export default {
    components: {
        "v-formulario-nota": FormularioNota,
        "v-ver-nota": VerNota,
    },
    data(){
        return {
            nuevo: {},
            editable: {},
            ver_editable: {},
            cancelar_editable: {},
            show: {},
            var_config: {},
            arrayNota: [],
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
            fecha_inicio: new Date(new Date().getFullYear(), new Date().getMonth(),1),
            fecha_fin: new Date(new Date().getFullYear(), new Date().getMonth() + 1,0),
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
        }
    },
    mounted() {
        console.log('Component mounted.')

        this.listarNota(1, this.buscar, this.criterio);
    },
    methods: {
        listarNota(page, buscar, criterio){
            let me = this;
            axios.post('/nota',{
                'page': page,
                'buscar': buscar,
                'criterio': criterio,
                'per_page': this.per_page,
                'fecha_inicio': this.fecha_inicio,
                'fecha_fin': this.fecha_fin,
            }).then(function (response){
                var respuesta = response.data;
                me.arrayNota = respuesta.notas.data;
                me.pagination = respuesta.pagination;

                if(me.arrayNota.length==0) me.show['arrayNota'] = true;
                else me.show['arrayNota'] = false;
            })
            .catch(function (error){
                console.log(error);
            });
        },
        cambiarPagina(page, buscar, criterio){
            let me = this;
            // Actualiza la pagina actual
            me.pagination.current_page = page;
            // Envia la peticion para visualizar la data de esta pagina
            me.listarNota(page, buscar, criterio);
        },
        crear(){
            this.nuevo = {
                _estado: 'creando',
                fecha_hora: new Date()
            };
            this.var_config = {
                title: 'Registrar Nota',
                tipo_accion: 'registrar'
            };
            
        },
        ver(nota){
            this.ver_editable = Object.assign({
                _estado: 'viendo',
            },nota);
            this.var_config = {
                title: 'Ver Nota',
            };
        },
        formatComprobante(e){
            return String(e.serie_comprobante + '-' + e.num_comprobante).toUpperCase();
        },
        descargarComprobante(nota){
            let obj_nota = nota;
            axios({
                url:'/nota/comprobante',
                method: 'POST',
                responseType: 'blob',
                data: {
                    tipo_comprobante: obj_nota.tipo_comprobante,
                    serie_comprobante: obj_nota.serie_comprobante,
                    num_comprobante: obj_nota.num_comprobante
                }
            }).then(response => {
                // console.log(response.data)
                // console.log(response.data.size)

                if(response.data && response.data.size){
                    // window.location.href = response;
                    // this.leer()
                    let filename = "FACTURA"+this.formatComprobante(obj_nota)+".pdf";
    
                    var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                    var fileLink = document.createElement('a');
                    fileLink.href = fileURL;
                    if (!filename) {
                        filename = url.substr(url.lastIndexOf('/') + 1)
                    }
                    fileLink.setAttribute('download', filename);
                    document.body.appendChild(fileLink);
                    fileLink.click();
                }
            });
        },
        enviarCorreo(nota){
            let me = this;
            axios.post('/nota/enviar',{
                id: nota.id,
                tipo_comprobante: nota.tipo_comprobante,
                serie_comprobante: nota.serie_comprobante,
                num_comprobante: nota.num_comprobante
            }).then(function (response){
                console.log(response.data);
            })
            .catch(function (error){
                console.log(error);
            });
        },
        // verificarMostrarBotonCorreo(nota){
        //     let fecha_inicio = String(nota.fecha_hora).split(' ')[0].replace(/-/g,'/');
        //     fecha_inicio = new Date(fecha_inicio).getTime();
        //     let fecha_fin = new Date().getTime();
        //     let diff = fecha_fin - fecha_inicio;
        //     let dias = diff/(1000*60*60*24);

        //     if(dias <= 7)
        //         return true;
        //     else
        //         return false;
        // },
        // verificarMostrarBotonCancelar(nota){
        //     let fecha_inicio = String(nota.fecha_hora).split(' ')[0].replace(/-/g,'/');
        //     fecha_inicio = new Date(fecha_inicio).getTime();
        //     let fecha_fin = new Date().getTime();
        //     let diff = fecha_fin - fecha_inicio;
        //     let dias = diff/(1000*60*60*24);

        //     if(nota.estado == 'aceptado' && dias <= 7)
        //         return true;
        //     else
        //         return false;
        // }
    }
}
</script>
