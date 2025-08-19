require('./bootstrap');

window.$ = window.jQuery = require('jquery');
// window.Chart = require('chart.js');

window.Vue = require('vue');
import Vuex from 'vuex'

import Axios from 'axios';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

Vue.component('v-select', vSelect)

import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
import Vue from 'vue';
Vue.component('date-picker', DatePicker);

Vue.component('dashboard', require('./components/Dashboard.vue').default);
Vue.component('dashboard-estudiante', require('./components/DashboardEstudiante.vue').default);
Vue.component('persona-dni', require('./components/PersonaDni.vue').default);
Vue.component('empresa', require('./components/Empresa.vue').default);

Vue.component('inscrito', require('./components/Inscrito.vue').default);
Vue.component('inscrito-historico', require('./components/InscritoHistorico.vue').default);
Vue.component('matricula', require('./components/Matricula.vue').default);
Vue.component('carga-matricula', require('./components/CargaMatricula.vue').default);
Vue.component('convocatoria', require('./components/Convocatoria.vue').default);
Vue.component('periodo-academico', require('./components/PeriodoAcademico.vue').default);

Vue.component('consulta-documento', require('./components/ConsultaDocumento.vue').default);
Vue.component('consulta-cpe', require('./components/ConsultaCpe.vue').default);

Vue.component('documento-enviado', require('./components/DocumentoEnviado.vue').default);
Vue.component('documento-recibido', require('./components/DocumentoRecibido.vue').default);
Vue.component('solicitud-documento', require('./components/SolicitudDocumento.vue').default);
Vue.component('generar-documento', require('./components/GenerarDocumento.vue').default);
// Vue.component('ingreso-vehiculo', require('./components/IngresoVehiculo.vue').default);
// Vue.component('vehiculo', require('./components/Vehiculo.vue').default);
// Vue.component('conductor', require('./components/Conductor.vue').default);

// Vue.component('categoria', require('./components/Categoria.vue').default);
// Vue.component('marca', require('./components/Marca.vue').default);
// Vue.component('articulo', require('./components/Articulo.vue').default);
// Vue.component('proveedor', require('./components/Proveedor.vue').default);
// Vue.component('ingreso', require('./components/Ingreso.vue').default);
Vue.component('cliente', require('./components/Cliente.vue').default);
// Vue.component('venta', require('./components/Venta.vue').default);
// Vue.component('nota', require('./components/Nota.vue').default);
Vue.component('role', require('./components/Role.vue').default);
Vue.component('permiso', require('./components/Permiso.vue').default);
Vue.component('usuario', require('./components/Usuario.vue').default);
Vue.component('cliente-web-service', require('./components/ClienteWebService.vue').default);
// Vue.component('resumen-boleta', require('./components/ResumenBoleta.vue').default);
// Vue.component('resumen-baja', require('./components/ResumenBaja.vue').default);
// Vue.component('reporte-venta', require('./components/ReporteVenta.vue').default);
// Vue.component('reporte-compra', require('./components/ReporteCompra.vue').default);
Vue.component('perfil', require('./components/Perfil.vue').default);
Vue.component('notification', require('./components/Notification.vue').default);

Vue.component('date-picker-2', require('./components/referencias/DatePicker2.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const store = new Vuex.Store({
    state: {
        numero: 10,
        app_mode: '',
        vuex_menu: 100,
        permisos: [],
        restriccion_stock: 0
    },
    mutations: {
        aumentar(state){
            state.numero ++;
        },
        disminuir(state, n){
            state.numero -= n;
        },
        setAppMode(state, mode){
            state.app_mode = mode;
        },
        setVuexMenu(state, menu){
            state.vuex_menu = menu;
        },
        setPermisos(state, permisos){
            state.permisos = permisos;
        },
        setRestriccionStock(state, restriccion_stock){
            state.restriccion_stock = restriccion_stock;
        },
    },
});

import { mapState, mapMutations } from 'vuex'

const app = new Vue({
    el: '#app',
    store: store,
    data:{
        menu:"",
        notifications: [],
        tipo: 'Produccion'
    },
    created(){
        let me = this;
        var userId = $('meta[name="userId"]').attr('content');

        if(userId){
            Axios.get('perfil/obtener').then(function(response){
                // console.log(response.data);
                if(response.data.perfil){
                    let tipo = '';
                    if(response.data.perfil.tipo=='production') tipo = 'Produccion';
                    else if(response.data.perfil.tipo=='beta') tipo = 'Prueba';

                    // Establecer el tipo
                    me.setterAppMode(tipo);
                    me.setRestriccionStock(response.data.perfil.restringir_stock);

                    //Establecer el perfil Dashboard

                    //Tipo Dashboard
                    if(response.data.permisos[0]=="super_admin") me.setMenu(0);
                    if(response.data.permisos[0]=="dashboard_estudiante_listar") me.setMenu(-18);
                    // console.log("Validando permisos....");

                    if(response.data.permisos){
                        me.setPermisos(response.data.permisos);
                    }
                }
            }).catch(function(error){
                console.log(error);
            });
        }
    },
    mounted(){
        // this.getConfig();
    },
    methods:{
        ...mapMutations(['aumentar','disminuir','setAppMode','setVuexMenu','setPermisos','setRestriccionStock',]),
        getConfig(){
            let me = this;
            var userId = $('meta[name="userId"]').attr('content');

            if(userId){
                Axios.get('perfil/obtener').then(function(response){
                    // console.log(response.data);
                    if(response.data.perfil){
                        let tipo = '';
                        if(response.data.perfil.tipo=='production') tipo = 'Produccion';
                        else if(response.data.perfil.tipo=='beta') tipo = 'Prueba';
                        me.setterAppMode(tipo);
                    }
                }).catch(function(error){
                    console.log(error);
                });
            }
        },
        setterAppMode(mode){
            this.setAppMode(mode);
        },
        setMenu(menu){
            this.setVuexMenu(menu);
        }
    }
});