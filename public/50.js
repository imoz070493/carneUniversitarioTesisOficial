(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[50],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
var FormularioDocumentoProcesado = function FormularioDocumentoProcesado() {
  return __webpack_require__.e(/*! import() */ 6).then(__webpack_require__.bind(null, /*! @/components/erp/documento/FormularioDocumentoProcesado */ "./resources/js/components/erp/documento/FormularioDocumentoProcesado.vue"));
};

var VerDocumentoEnviadoPersonal = function VerDocumentoEnviadoPersonal() {
  return __webpack_require__.e(/*! import() */ 7).then(__webpack_require__.bind(null, /*! @/components/erp/documento/VerDocumentoEnviadoPersonal */ "./resources/js/components/erp/documento/VerDocumentoEnviadoPersonal.vue"));
};

var FormularioDocumentoEnviarFacultad = function FormularioDocumentoEnviarFacultad() {
  return __webpack_require__.e(/*! import() */ 5).then(__webpack_require__.bind(null, /*! @/components/erp/documento/FormularioDocumentoEnviarFacultad */ "./resources/js/components/erp/documento/FormularioDocumentoEnviarFacultad.vue"));
};

var FormularioImportarIngresante = function FormularioImportarIngresante() {
  return __webpack_require__.e(/*! import() */ 48).then(__webpack_require__.bind(null, /*! @/components/erp/solicitud_documento/FormularioImportarIngresante */ "./resources/js/components/erp/solicitud_documento/FormularioImportarIngresante.vue"));
};

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    "v-formulario-documento-enviado": FormularioDocumentoProcesado,
    "v-ver-documento-enviado": VerDocumentoEnviadoPersonal,
    "v-formulario-documento-enviar-facultad": FormularioDocumentoEnviarFacultad,
    "v-formulario-importar-ingresante": FormularioImportarIngresante
  },
  data: function data() {
    return {
      nuevo: {},
      editable: {},
      precio_editable: {},
      ver_editable: {},
      enviar_editable: {},
      importar_editable: {},
      show: {},
      var_config: {},
      arraySolicitud: [],
      pagination: {
        'total': 0,
        'current_page': 0,
        'per_page': 0,
        'last_page': 0,
        'from': 0,
        'to': 0
      },
      offset: 3,
      criterio: 'inscritos.nombre',
      buscar: '',
      per_page: 50,
      order_by: 'created_at',
      mode_order: 'desc'
    };
  },
  computed: {
    isActived: function isActived() {
      return this.pagination.current_page;
    },
    pagesNumber: function pagesNumber() {
      if (!this.pagination.to) {
        return [];
      }

      var from = this.pagination.current_page - this.offset;

      if (from < 1) {
        from = 1;
      }

      var to = from + this.offset * 2;

      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }

      var pagesArray = [];

      while (from <= to) {
        pagesArray.push(from);
        from++;
      }

      return pagesArray;
    }
  },
  mounted: function mounted() {
    console.log('Component mounted.');
    this.listarSolicitudDocumento(1, this.buscar, this.criterio);
  },
  methods: {
    listarSolicitudDocumento: function listarSolicitudDocumento(page, buscar, criterio) {
      var me = this; // var url = '/solicitud_documento?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;

      axios.post('/solicitud_documento', {
        page: page,
        buscar: buscar,
        criterio: criterio,
        per_page: this.per_page,
        order_by: this.order_by,
        mode_order: this.mode_order
      }).then(function (response) {
        var respuesta = response.data;
        me.arraySolicitud = respuesta.solicitudes_documentos.data;
        me.pagination = respuesta.pagination;
        if (me.arraySolicitud.length == 0) me.show['arraySolicitud'] = true;else me.show['arraySolicitud'] = false;
      })["catch"](function (error) {
        console.log(error);

        if (error.request.status) {
          if (error.request.status == 419) {
            location.reload();
          }
        }
      });
    },
    cambiarPagina: function cambiarPagina(page, buscar, criterio) {
      var me = this; // Actualiza la pagina actual

      me.pagination.current_page = page; // Envia la peticion para visualizar la data de esta pagina

      me.listarSolicitudDocumento(page, buscar, criterio);
    },
    desactivarInscrito: function desactivarInscrito(id) {
      var _this = this;

      swal({
        title: 'Esta seguro de desactivar esta inscrito?',
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
      }).then(function (result) {
        if (result.value) {
          var me = _this;
          axios.put('/inscrito/desactivar', {
            id: id
          }).then(function (response) {
            me.listarSolicitudDocumento(1, '', 'nombre');
            swal('Desactivado', 'El registro ha sido desactivado con exito', 'success');
          })["catch"](function (error) {
            console.log(error);
          });
        } else if (
        /* Read more about handling dismissals below */
        result.dismiss === swal.DismissReason.cancel) {}
      });
    },
    activarInscrito: function activarInscrito(id) {
      var _this2 = this;

      swal({
        title: 'Esta seguro de activar esta inscrito?',
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
      }).then(function (result) {
        if (result.value) {
          var me = _this2;
          axios.put('/inscrito/activar', {
            id: id
          }).then(function (response) {
            me.listarSolicitudDocumento(1, '', 'nombre');
            swal('Activado', 'El registro ha sido activado con exito', 'success');
          })["catch"](function (error) {
            console.log(error);
          });
        } else if (
        /* Read more about handling dismissals below */
        result.dismiss === swal.DismissReason.cancel) {}
      });
    },
    crear: function crear() {
      this.nuevo = {
        _estado: 'creando'
      };
      this.var_config = {
        title: 'Registrar Envio',
        tipo_accion: 'registrar'
      };
    },
    editar: function editar(inscrito) {
      if (inscrito.foto_validado == '1') {
        swal('Validado', 'La fotografia ha sido validada.', 'success');
        return;
      }

      this.editable = Object.assign({
        _estado: 'editando'
      }, inscrito);
      this.var_config = {
        title: 'Editar Envio',
        tipo_accion: 'actualizar'
      };
    },
    validarCredencial: function validarCredencial(inscrito) {
      var me = this;

      if (inscrito.credencial_validado == 'validado') {
        swal('Ya Validado!!', 'Los credenciales del estudiante matriculado ha sido validado.', 'success');
        return;
      }

      axios.post('/inscrito/validar_credencial', {
        id: inscrito.id,
        dni: inscrito.dni
      }).then(function (response) {
        //console.log(response.data.data)
        var inscrito_validado = response.data.data;

        if (inscrito_validado.dni) {
          swal('Validado', 'Los credenciales del estudiante matriculado ha sido validado.', 'success');
        } else {
          swal('No Encontrado', 'No ha sido encontrado.', 'warning');
        }

        me.listarSolicitudDocumento(1, me.buscar, me.criterio);
        me.$forceUpdate();
      })["catch"](function (error) {
        console.log(error);
      });
    },
    enviarFacultad: function enviarFacultad(inscrito) {
      this.enviar_editable = Object.assign({
        _estado: 'enviando'
      }, inscrito);
      this.var_config = {
        title: 'Enviar a Facultad',
        tipo_accion: 'registrar'
      };
    },
    recibirFacultad: function recibirFacultad(inscrito) {
      var _this3 = this;

      swal({
        title: 'Esta seguro de recibir los certificados de la carta?',
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
      }).then(function (result) {
        if (result.value) {
          var me = _this3;
          axios.post('/solicitud_documento/recibir', {
            id: inscrito.id
          }).then(function (response) {
            me.listarSolicitudDocumento(1, '', 'nombre');
            swal('¡Recibido!', 'Las actas fueron recibidas correctamente', 'success');
          })["catch"](function (error) {
            console.log(error);
          });
        } else if (
        /* Read more about handling dismissals below */
        result.dismiss === swal.DismissReason.cancel) {}
      });
    },
    ver: function ver(inscrito) {
      this.ver_editable = Object.assign({
        _estado: 'viendo'
      }, inscrito);
      this.var_config = {
        title: 'Ver Solicitudes',
        tipo_accion: 'actualizar'
      };
    },
    anular: function anular(inscrito) {
      if (inscrito.fecha_anulado) {
        swal('Anulado', 'El tramite ya ha sido anulado.', 'success');
        return;
      }

      this.editable = Object.assign({
        _estado: 'anulando'
      }, inscrito);
      this.var_config = {
        title: 'Anular Tramite',
        tipo_accion: 'actualizar'
      };
    },
    abrirPrecios: function abrirPrecios(inscrito) {
      this.precio_editable = {
        _estado: 'abriendo',
        inscrito_id: inscrito.id,
        nombre_inscrito: inscrito.nombre,
        precio_actual: inscrito.precio_actual
      };
      this.var_config = {
        title: 'Listar Precios',
        tipo_accion: 'registrar'
      };
      this.$forceUpdate();
    },
    numberFormat2: function (_numberFormat) {
      function numberFormat2(_x) {
        return _numberFormat.apply(this, arguments);
      }

      numberFormat2.toString = function () {
        return _numberFormat.toString();
      };

      return numberFormat2;
    }(function (number) {
      return numberFormat2(number);
    }),
    descargarInscritos: function descargarInscritos() {
      axios({
        url: '/inscrito/reporte/inscritos',
        method: 'POST',
        data: {
          // venta_id: this.value.venta_id,
          order_by: this.order_by,
          mode_order: this.mode_order
        },
        responseType: 'blob'
      }).then(function (response) {
        // console.log(response.data)
        // console.log(response.data.size)
        if (response.data && response.data.size) {
          // window.location.href = response;
          // this.leer()
          // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
          var filename = "Inscritos General.xlsx";
          var fileURL = window.URL.createObjectURL(new Blob([response.data]));
          var fileLink = document.createElement('a');
          fileLink.href = fileURL;

          if (!filename) {
            filename = url.substr(url.lastIndexOf('/') + 1);
          }

          fileLink.setAttribute('download', filename);
          document.body.appendChild(fileLink);
          fileLink.click();
        }
      });
    },
    descargarInscritosOficial: function descargarInscritosOficial() {
      axios({
        url: '/inscrito/reporte/inscritos_oficial',
        method: 'POST',
        data: {
          // venta_id: this.value.venta_id,
          order_by: this.order_by,
          mode_order: this.mode_order
        },
        responseType: 'blob'
      }).then(function (response) {
        // console.log(response.data)
        // console.log(response.data.size)
        if (response.data && response.data.size) {
          // window.location.href = response;
          // this.leer()
          // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
          var filename = "Inscritos Oficial.xlsx";
          var fileURL = window.URL.createObjectURL(new Blob([response.data]));
          var fileLink = document.createElement('a');
          fileLink.href = fileURL;

          if (!filename) {
            filename = url.substr(url.lastIndexOf('/') + 1);
          }

          fileLink.setAttribute('download', filename);
          document.body.appendChild(fileLink);
          fileLink.click();
        }
      });
    },
    descargarInscritosAnulado: function descargarInscritosAnulado() {
      axios({
        url: '/inscrito/reporte/inscritos_anulado',
        method: 'POST',
        data: {
          // venta_id: this.value.venta_id,
          order_by: this.order_by,
          mode_order: this.mode_order
        },
        responseType: 'blob'
      }).then(function (response) {
        // console.log(response.data)
        // console.log(response.data.size)
        if (response.data && response.data.size) {
          // window.location.href = response;
          // this.leer()
          // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
          var filename = "Inscritos Anulado.xlsx";
          var fileURL = window.URL.createObjectURL(new Blob([response.data]));
          var fileLink = document.createElement('a');
          fileLink.href = fileURL;

          if (!filename) {
            filename = url.substr(url.lastIndexOf('/') + 1);
          }

          fileLink.setAttribute('download', filename);
          document.body.appendChild(fileLink);
          fileLink.click();
        }
      });
    },
    orderByNombre: function orderByNombre() {
      this.order_by = 'nombre';
      console.log('mode_order', this.mode_order);
      if (this.mode_order == 'desc') this.mode_order = 'asc';else this.mode_order = 'desc';
      this.listarSolicitudDocumento(1, this.buscar, this.criterio);
    },
    orderByApellidoPaterno: function orderByApellidoPaterno() {
      this.order_by = 'apellido_paterno';
      console.log('mode_order', this.mode_order);
      if (this.mode_order == 'desc') this.mode_order = 'asc';else this.mode_order = 'desc';
      this.listarSolicitudDocumento(1, this.buscar, this.criterio);
    },
    reiniciar: function reiniciar() {
      this.buscar = '';
      this.mode_order = 'desc';
      this.order_by = 'id';
      this.listarSolicitudDocumento(1, this.buscar, this.criterio);
      this.$forceUpdate();
    },
    descargarConstancia: function descargarConstancia(solicitud) {
      axios({
        url: '/solicitud_documento/descargar_constancia',
        method: 'POST',
        data: {
          id: solicitud.id
        },
        responseType: 'blob'
      }).then(function (response) {
        // console.log(response.data)
        // console.log(response.data.size)
        if (response.data && response.data.size) {
          // window.location.href = response;
          // this.leer()
          // let filename = "FACTURA"+this.formatComprobante(obj_venta)+".pdf";
          var filename = "Constancia.pdf";
          if (solicitud.tipo == 'constancia_matricula') filename = "Constancia de Matricula.pdf";
          if (solicitud.tipo == 'constancia_primera_matricula') filename = "Constancia de Primera Matricula.pdf";
          var fileURL = window.URL.createObjectURL(new Blob([response.data]));
          var fileLink = document.createElement('a');
          fileLink.href = fileURL;

          if (!filename) {
            filename = url.substr(url.lastIndexOf('/') + 1);
          }

          fileLink.setAttribute('download', filename);
          document.body.appendChild(fileLink);
          fileLink.click();
        }
      });
    },
    importar: function importar() {
      this.importar_editable = {
        _estado: 'creando'
      };
      this.var_config = {
        title: 'Importar Ingresante',
        tipo_accion: 'importar'
      };
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.orderLink:hover{\n    color: inherit;\n    text-decoration: inherit;\n}\n.orderLink{\n    color: inherit;\n    text-decoration: inherit;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=style&index=0&lang=css&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=style&index=0&lang=css& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarSolicitudDocumento.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=template&id=72af99ac&":
/*!***************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=template&id=72af99ac& ***!
  \***************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "main",
    { staticClass: "main" },
    [
      _vm._m(0),
      _vm._v(" "),
      _c("div", { staticClass: "container-fluid" }, [
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-header" }, [
            _c("div", { staticClass: "row" }, [
              _vm._m(1),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                [
                  _c("div", { staticClass: "pull-right" }, [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-success",
                        attrs: { type: "button" },
                        on: {
                          click: function($event) {
                            return _vm.importar()
                          }
                        }
                      },
                      [_vm._v(" Ingresantes")]
                    )
                  ])
                ]
              )
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-md-6" }, [
                _c("div", { staticClass: "input-group" }, [
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.buscar,
                        expression: "buscar"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: "Nombre, Codigo, Categoria"
                    },
                    domProps: { value: _vm.buscar },
                    on: {
                      keyup: function($event) {
                        if (
                          !$event.type.indexOf("key") &&
                          _vm._k(
                            $event.keyCode,
                            "enter",
                            13,
                            $event.key,
                            "Enter"
                          )
                        ) {
                          return null
                        }
                        return _vm.listarSolicitudDocumento(
                          1,
                          _vm.buscar,
                          _vm.criterio
                        )
                      },
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.buscar = $event.target.value
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-primary",
                      attrs: { type: "submit" },
                      on: {
                        click: function($event) {
                          return _vm.listarSolicitudDocumento(
                            1,
                            _vm.buscar,
                            _vm.criterio
                          )
                        }
                      }
                    },
                    [
                      _c("i", { staticClass: "fa fa-search" }),
                      _vm._v(" Buscar")
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-danger",
                      attrs: { type: "submit" },
                      on: {
                        click: function($event) {
                          return _vm.reiniciar()
                        }
                      }
                    },
                    [
                      _c("i", { staticClass: "fa fa-repeat" }),
                      _vm._v("     Reiniciar")
                    ]
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c(
              "div",
              {
                staticStyle: { "overflow-x": "auto", "white-space": "nowrap" }
              },
              [
                _c("table", { staticClass: "table table-hover text-nowrap" }, [
                  _vm._m(2),
                  _vm._v(" "),
                  _c(
                    "tbody",
                    [
                      _vm.show.arraySolicitud
                        ? _c("tr", [
                            _c("th", {
                              staticClass: "text-center text-dark",
                              attrs: { colspan: "8" },
                              domProps: { textContent: _vm._s("Vacio") }
                            })
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm._l(_vm.arraySolicitud, function(inscrito) {
                        return _c("tr", { key: inscrito.id }, [
                          _c("td", [
                            _c("div", {}, [
                              _vm._m(3, true),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "dropdown-menu",
                                  attrs: { role: "menu" }
                                },
                                [
                                  _c(
                                    "a",
                                    {
                                      staticClass: "dropdown-item",
                                      attrs: { href: "#" },
                                      on: {
                                        click: function($event) {
                                          return _vm.descargarConstancia(
                                            inscrito
                                          )
                                        }
                                      }
                                    },
                                    [
                                      _c("img", {
                                        staticStyle: {
                                          width: "20px",
                                          height: "20px"
                                        },
                                        attrs: { src: "images/ver.svg" }
                                      }),
                                      _vm._v("   Descargar")
                                    ]
                                  )
                                ]
                              )
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(inscrito.codigo_estudiante)
                            }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(
                                inscrito.apellido_paterno +
                                  " " +
                                  inscrito.apellido_materno +
                                  " " +
                                  inscrito.nombres
                              )
                            }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(
                                inscrito.num_correlativo
                                  .toString()
                                  .padStart(5, "0") +
                                  "-" +
                                  inscrito.anio
                              )
                            }
                          }),
                          _vm._v(" "),
                          inscrito.tipo == "constancia_primera_matricula"
                            ? _c("td", {
                                domProps: {
                                  textContent: _vm._s(
                                    "Constancia Primera Matricula"
                                  )
                                }
                              })
                            : _vm._e(),
                          _vm._v(" "),
                          inscrito.tipo == "constancia_matricula"
                            ? _c("td", {
                                domProps: {
                                  textContent: _vm._s("Constancia  Matricula")
                                }
                              })
                            : _vm._e(),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(inscrito.fecha_procesado)
                            }
                          }),
                          _vm._v(" "),
                          _vm._m(4, true)
                        ])
                      })
                    ],
                    2
                  )
                ])
              ]
            ),
            _vm._v(" "),
            _c("nav", [
              _c(
                "ul",
                { staticClass: "pagination" },
                [
                  _vm.pagination.current_page > 1
                    ? _c("li", { staticClass: "page-item" }, [
                        _c(
                          "a",
                          {
                            staticClass: "page-link",
                            attrs: { href: "#" },
                            on: {
                              click: function($event) {
                                $event.preventDefault()
                                return _vm.cambiarPagina(
                                  _vm.pagination.current_page - 1,
                                  _vm.buscar,
                                  _vm.criterio
                                )
                              }
                            }
                          },
                          [_vm._v("Ant")]
                        )
                      ])
                    : _vm._e(),
                  _vm._v(" "),
                  _vm._l(_vm.pagesNumber, function(page) {
                    return _c(
                      "li",
                      {
                        key: page,
                        staticClass: "page-item",
                        class: [page == _vm.isActived ? "active" : ""]
                      },
                      [
                        _c("a", {
                          staticClass: "page-link",
                          attrs: { href: "#" },
                          domProps: { textContent: _vm._s(page) },
                          on: {
                            click: function($event) {
                              $event.preventDefault()
                              return _vm.cambiarPagina(
                                page,
                                _vm.buscar,
                                _vm.criterio
                              )
                            }
                          }
                        })
                      ]
                    )
                  }),
                  _vm._v(" "),
                  _vm.pagination.current_page < _vm.pagination.last_page
                    ? _c("li", { staticClass: "page-item" }, [
                        _c(
                          "a",
                          {
                            staticClass: "page-link",
                            attrs: { href: "#" },
                            on: {
                              click: function($event) {
                                $event.preventDefault()
                                return _vm.cambiarPagina(
                                  _vm.pagination.current_page + 1,
                                  _vm.buscar,
                                  _vm.criterio
                                )
                              }
                            }
                          },
                          [_vm._v("Sig")]
                        )
                      ])
                    : _vm._e()
                ],
                2
              )
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _vm.nuevo._estado == "creando"
        ? _c("v-formulario-documento-enviado", {
            ref: "cmp_crear_inscrito",
            attrs: { var_config: _vm.var_config },
            on: {
              guardado: function($event) {
                return _vm.listarSolicitudDocumento(1, "", "nombre")
              }
            },
            model: {
              value: _vm.nuevo,
              callback: function($$v) {
                _vm.nuevo = $$v
              },
              expression: "nuevo"
            }
          })
        : _vm._e(),
      _vm._v(" "),
      _vm.editable._estado == "editando"
        ? _c("v-formulario-editar-inscrito", {
            ref: "cmp_crear_inscrito",
            attrs: { var_config: _vm.var_config },
            on: {
              guardado: function($event) {
                return _vm.listarSolicitudDocumento(1, "", "nombre")
              }
            },
            model: {
              value: _vm.editable,
              callback: function($$v) {
                _vm.editable = $$v
              },
              expression: "editable"
            }
          })
        : _vm._e(),
      _vm._v(" "),
      _vm.editable._estado == "anulando"
        ? _c("v-formulario-anular-inscrito", {
            ref: "cmp_anular_inscrito",
            attrs: { var_config: _vm.var_config },
            on: {
              guardado: function($event) {
                return _vm.listarSolicitudDocumento(1, "", "nombre")
              }
            },
            model: {
              value: _vm.editable,
              callback: function($$v) {
                _vm.editable = $$v
              },
              expression: "editable"
            }
          })
        : _vm._e(),
      _vm._v(" "),
      _vm.ver_editable._estado == "viendo"
        ? _c("v-ver-documento-enviado", {
            ref: "cmp_ver_inscrito",
            attrs: { var_config: _vm.var_config },
            model: {
              value: _vm.ver_editable,
              callback: function($$v) {
                _vm.ver_editable = $$v
              },
              expression: "ver_editable"
            }
          })
        : _vm._e(),
      _vm._v(" "),
      _vm.enviar_editable._estado == "enviando"
        ? _c("v-formulario-documento-enviar-facultad", {
            ref: "cmp_ver_inscrito",
            attrs: { var_config: _vm.var_config },
            on: {
              guardado: function($event) {
                return _vm.listarSolicitudDocumento(1, "", "nombre")
              }
            },
            model: {
              value: _vm.enviar_editable,
              callback: function($$v) {
                _vm.enviar_editable = $$v
              },
              expression: "enviar_editable"
            }
          })
        : _vm._e(),
      _vm._v(" "),
      _vm.importar_editable._estado == "creando"
        ? _c("v-formulario-importar-ingresante", {
            ref: "cmp_importar_ingresante",
            attrs: { var_config: _vm.var_config },
            on: {
              guardado: function($event) {
                return _vm.listarIngresante(1, "", "nombre")
              }
            },
            model: {
              value: _vm.importar_editable,
              callback: function($$v) {
                _vm.importar_editable = $$v
              },
              expression: "importar_editable"
            }
          })
        : _vm._e()
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("ol", { staticClass: "breadcrumb" }, [
      _c("li", { staticClass: "breadcrumb-item" }, [_vm._v("Documentos")]),
      _vm._v(" "),
      _c("li", { staticClass: "breadcrumb-item" }, [
        _c("a", { attrs: { href: "#" } }, [_vm._v("Solicitudes")])
      ]),
      _vm._v(" "),
      _c("li", { staticClass: "breadcrumb-item active" }, [_vm._v("Listado")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" }, [
      _c("i", { staticClass: "fa fa-align-justify" }),
      _vm._v(" Solicitudes: \n                        ")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("Opciones")]),
        _vm._v(" "),
        _c("th", [_vm._v("Codigo")]),
        _vm._v(" "),
        _c("th", [_vm._v("Estudiante")]),
        _vm._v(" "),
        _c("th", [_vm._v("N° Documento")]),
        _vm._v(" "),
        _c("th", [_vm._v("Tipo")]),
        _vm._v(" "),
        _c("th", [_vm._v("Fecha Procesado")]),
        _vm._v(" "),
        _c("th", [_vm._v("Estado")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("a", { attrs: { href: "#", "data-toggle": "dropdown" } }, [
      _c("img", {
        staticStyle: { width: "30px", height: "auto" },
        attrs: { src: "images/options.svg" }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("td", [
      _c("div", [
        _c("span", { staticClass: "badge badge-success" }, [_vm._v("Atendido")])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ListarSolicitudDocumento_vue_vue_type_template_id_72af99ac___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ListarSolicitudDocumento.vue?vue&type=template&id=72af99ac& */ "./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=template&id=72af99ac&");
/* harmony import */ var _ListarSolicitudDocumento_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ListarSolicitudDocumento.vue?vue&type=script&lang=js& */ "./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _ListarSolicitudDocumento_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ListarSolicitudDocumento.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _ListarSolicitudDocumento_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ListarSolicitudDocumento_vue_vue_type_template_id_72af99ac___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ListarSolicitudDocumento_vue_vue_type_template_id_72af99ac___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************!*\
  !*** ./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarSolicitudDocumento_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarSolicitudDocumento.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarSolicitudDocumento_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************!*\
  !*** ./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarSolicitudDocumento_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarSolicitudDocumento.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarSolicitudDocumento_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarSolicitudDocumento_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarSolicitudDocumento_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarSolicitudDocumento_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=template&id=72af99ac&":
/*!*********************************************************************************************************************!*\
  !*** ./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=template&id=72af99ac& ***!
  \*********************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarSolicitudDocumento_vue_vue_type_template_id_72af99ac___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarSolicitudDocumento.vue?vue&type=template&id=72af99ac& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/solicitud_documento/ListarSolicitudDocumento.vue?vue&type=template&id=72af99ac&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarSolicitudDocumento_vue_vue_type_template_id_72af99ac___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarSolicitudDocumento_vue_vue_type_template_id_72af99ac___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);