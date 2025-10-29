(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[41],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
var FormularioInscrito = function FormularioInscrito() {
  return __webpack_require__.e(/*! import() */ 13).then(__webpack_require__.bind(null, /*! @/components/erp/inscrito/FormularioInscrito */ "./resources/js/components/erp/inscrito/FormularioInscrito.vue"));
};

var FormularioEditarInscrito = function FormularioEditarInscrito() {
  return __webpack_require__.e(/*! import() */ 12).then(__webpack_require__.bind(null, /*! @/components/erp/inscrito/FormularioEditarInscrito */ "./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue"));
};

var FormularioAnularInscrito = function FormularioAnularInscrito() {
  return __webpack_require__.e(/*! import() */ 11).then(__webpack_require__.bind(null, /*! @/components/erp/inscrito/FormularioAnularInscrito */ "./resources/js/components/erp/inscrito/FormularioAnularInscrito.vue"));
};

var VerInscrito = function VerInscrito() {
  return __webpack_require__.e(/*! import() */ 16).then(__webpack_require__.bind(null, /*! @/components/erp/inscrito/VerInscrito */ "./resources/js/components/erp/inscrito/VerInscrito.vue"));
};

var ConvocatoriaSelect = function ConvocatoriaSelect() {
  return __webpack_require__.e(/*! import() */ 75).then(__webpack_require__.bind(null, /*! @/components/referencias/ConvocatoriaSelect */ "./resources/js/components/referencias/ConvocatoriaSelect.vue"));
};

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    "v-formulario-inscrito": FormularioInscrito,
    "v-formulario-editar-inscrito": FormularioEditarInscrito,
    "v-formulario-anular-inscrito": FormularioAnularInscrito,
    "v-ver-inscrito": VerInscrito,
    "convocatoria-select": ConvocatoriaSelect
  },
  data: function data() {
    return {
      nuevo: {},
      editable: {},
      precio_editable: {},
      ver_editable: {},
      show: {},
      var_config: {},
      arrayInscrito: [],
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
      mode_order: 'desc',
      filtros: {}
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
    this.listarInscrito(1, this.buscar, this.criterio);
  },
  methods: {
    listarInscrito: function listarInscrito(page, buscar, criterio) {
      var me = this; // var url = '/inscrito?page='+page+'&buscar='+buscar+'&criterio='+criterio+'&per_page='+this.per_page;

      axios.post('/inscrito/historico', {
        page: page,
        buscar: buscar,
        criterio: criterio,
        per_page: this.per_page,
        order_by: this.order_by,
        mode_order: this.mode_order,
        convocatoria_id: this.filtros.convocatoria_id
      }).then(function (response) {
        var respuesta = response.data;
        me.arrayInscrito = respuesta.inscritos.data;
        me.pagination = respuesta.pagination;
        if (me.arrayInscrito.length == 0) me.show['arrayInscrito'] = true;else me.show['arrayInscrito'] = false;
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

      me.listarInscrito(page, buscar, criterio);
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
            me.listarInscrito(1, '', 'nombre');
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
            me.listarInscrito(1, '', 'nombre');
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
        title: 'Registrar Inscrito',
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
        title: 'Validar Fotografia',
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

        me.listarInscrito(1, me.buscar, me.criterio);
        me.$forceUpdate();
      })["catch"](function (error) {
        console.log(error);
      });
    },
    ver: function ver(inscrito) {
      this.ver_editable = Object.assign({
        _estado: 'viendo'
      }, inscrito);
      this.var_config = {
        title: 'Ver Inscrito',
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
        url: '/inscrito/reporte/inscritos/historico',
        method: 'POST',
        data: {
          // venta_id: this.value.venta_id,
          order_by: this.order_by,
          mode_order: this.mode_order,
          convocatoria_id: this.filtros.convocatoria_id
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
        url: '/inscrito/reporte/inscritos_oficial/historico',
        method: 'POST',
        data: {
          // venta_id: this.value.venta_id,
          order_by: this.order_by,
          mode_order: this.mode_order,
          convocatoria_id: this.filtros.convocatoria_id
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
        url: '/inscrito/reporte/inscritos_anulado/historico',
        method: 'POST',
        data: {
          // venta_id: this.value.venta_id,
          order_by: this.order_by,
          mode_order: this.mode_order,
          convocatoria_id: this.filtros.convocatoria_id
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
      this.listarInscrito(1, this.buscar, this.criterio);
    },
    orderByApellidoPaterno: function orderByApellidoPaterno() {
      this.order_by = 'apellido_paterno';
      console.log('mode_order', this.mode_order);
      if (this.mode_order == 'desc') this.mode_order = 'asc';else this.mode_order = 'desc';
      this.listarInscrito(1, this.buscar, this.criterio);
    },
    reiniciar: function reiniciar() {
      this.buscar = '';
      this.mode_order = 'desc';
      this.order_by = 'id';
      this.listarInscrito(1, this.buscar, this.criterio);
      this.$forceUpdate();
    }
  },
  watch: {
    'filtros.convocatoria_id': function filtrosConvocatoria_id(newvalue, oldvalue) {
      if (newvalue) {
        this.listarInscrito(1, this.buscar, this.criterio);
        this.$forceUpdate();
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.orderLink:hover{\n    color: inherit;\n    text-decoration: inherit;\n}\n.orderLink{\n    color: inherit;\n    text-decoration: inherit;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=style&index=0&lang=css&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=style&index=0&lang=css& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarInscritoHistorico.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=template&id=30dc2ee9&":
/*!***************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=template&id=30dc2ee9& ***!
  \***************************************************************************************************************************************************************************************************************************************/
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
                            return _vm.descargarInscritosOficial()
                          }
                        }
                      },
                      [_vm._v(" Xlsx Oficial")]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-success",
                        attrs: { type: "button" },
                        on: {
                          click: function($event) {
                            return _vm.descargarInscritos()
                          }
                        }
                      },
                      [_vm._v(" Xlsx")]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-success",
                        attrs: { type: "button" },
                        on: {
                          click: function($event) {
                            return _vm.descargarInscritosAnulado()
                          }
                        }
                      },
                      [_vm._v(" Xlsx Anulado")]
                    )
                  ])
                ]
              )
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" },
                [
                  _c(
                    "div",
                    { staticClass: "form-group" },
                    [
                      _vm._m(2),
                      _vm._v(" "),
                      _c("convocatoria-select", {
                        model: {
                          value: _vm.filtros.convocatoria_id,
                          callback: function($$v) {
                            _vm.$set(_vm.filtros, "convocatoria_id", $$v)
                          },
                          expression: "filtros.convocatoria_id"
                        }
                      })
                    ],
                    1
                  )
                ]
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                [
                  _c("div", { staticClass: "form-group" }, [
                    _vm._m(3),
                    _vm._v(" "),
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
                            return _vm.listarInscrito(
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
                              return _vm.listarInscrito(
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
                ]
              )
            ]),
            _vm._v(" "),
            _c(
              "div",
              {
                staticStyle: { "overflow-x": "auto", "white-space": "nowrap" }
              },
              [
                _c("table", { staticClass: "table table-hover text-nowrap" }, [
                  _c("thead", [
                    _c("tr", [
                      _c("th", [_vm._v("Opciones")]),
                      _vm._v(" "),
                      _c("th", [
                        _c(
                          "a",
                          {
                            staticClass: "orderLink",
                            attrs: { href: "#" },
                            on: {
                              click: function($event) {
                                return _vm.orderByApellidoPaterno()
                              }
                            }
                          },
                          [
                            _c("i", {
                              class: {
                                "fa fa-sort-up":
                                  _vm.mode_order == "asc" &&
                                  _vm.order_by == "nombre"
                                    ? true
                                    : false,
                                "fa fa-sort-down":
                                  _vm.mode_order == "desc" &&
                                  _vm.order_by == "nombre"
                                    ? true
                                    : false
                              }
                            }),
                            _vm._v("Apellidos y Nombres")
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _c("th", [_vm._v("Codigo")]),
                      _vm._v(" "),
                      _c("th", [_vm._v("Nro Documento")]),
                      _vm._v(" "),
                      _c("th", [_vm._v("Escuela Profesional")]),
                      _vm._v(" "),
                      _c("th", [_vm._v("Sexo")]),
                      _vm._v(" "),
                      _c("th", [_vm._v("Fecha Tramite")]),
                      _vm._v(" "),
                      _c("th", [_vm._v("¿Duplicado?")]),
                      _vm._v(" "),
                      _c("th", [_vm._v("Convocatoria")])
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "tbody",
                    [
                      _vm.show.arrayInscrito
                        ? _c("tr", [
                            _c("th", {
                              staticClass: "text-center text-dark",
                              attrs: { colspan: "8" },
                              domProps: { textContent: _vm._s("Vacio") }
                            })
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm._l(_vm.arrayInscrito, function(inscrito) {
                        return _c("tr", { key: inscrito.id }, [
                          _c("td", [
                            _c("div", {}, [
                              _vm._m(4, true),
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
                                          return _vm.editar(inscrito)
                                        }
                                      }
                                    },
                                    [
                                      _c("img", {
                                        staticStyle: {
                                          width: "20px",
                                          height: "20px"
                                        },
                                        attrs: { src: "images/editar.svg" }
                                      }),
                                      _vm._v("   Validar Fotografia")
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "a",
                                    {
                                      staticClass: "dropdown-item",
                                      attrs: { href: "#" },
                                      on: {
                                        click: function($event) {
                                          return _vm.validarCredencial(inscrito)
                                        }
                                      }
                                    },
                                    [
                                      _c("img", {
                                        staticStyle: {
                                          width: "20px",
                                          height: "20px"
                                        },
                                        attrs: { src: "images/xml.svg" }
                                      }),
                                      _vm._v("   Validar Credencial")
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "a",
                                    {
                                      staticClass: "dropdown-item",
                                      attrs: { href: "#" },
                                      on: {
                                        click: function($event) {
                                          return _vm.ver(inscrito)
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
                                      _vm._v("   Ver")
                                    ]
                                  ),
                                  _vm._v(" "),
                                  inscrito.estado == "inactivo"
                                    ? _c(
                                        "a",
                                        {
                                          staticClass: "dropdown-item",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              return _vm.activarInscrito(
                                                inscrito.id
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
                                            attrs: { src: "images/activar.svg" }
                                          }),
                                          _vm._v("   Activar")
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  inscrito.estado == "activo"
                                    ? _c(
                                        "a",
                                        {
                                          staticClass: "dropdown-item",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              return _vm.desactivarInscrito(
                                                inscrito.id
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
                                            attrs: {
                                              src: "images/desactivar.svg"
                                            }
                                          }),
                                          _vm._v("   Desactivar")
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  inscrito.estado == "activo"
                                    ? _c(
                                        "a",
                                        {
                                          staticClass: "dropdown-item",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              return _vm.abrirPrecios(inscrito)
                                            }
                                          }
                                        },
                                        [
                                          _c("img", {
                                            staticStyle: {
                                              width: "20px",
                                              height: "20px"
                                            },
                                            attrs: { src: "images/money.svg" }
                                          }),
                                          _vm._v("   Precios")
                                        ]
                                      )
                                    : _vm._e()
                                ]
                              )
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", [
                            _vm._v(
                              _vm._s(inscrito.apellido_paterno) +
                                " " +
                                _vm._s(inscrito.apellido_materno) +
                                " " +
                                _vm._s(inscrito.nombres)
                            )
                          ]),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(inscrito.codigo_estudiante)
                            }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: { textContent: _vm._s(inscrito.dni) }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(inscrito.escuela_profesional)
                            }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: { textContent: _vm._s(inscrito.sexo) }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(
                                inscrito.created_at
                                  .substr(0, 10)
                                  .split("-")
                                  .reverse()
                                  .join("-")
                              )
                            }
                          }),
                          _vm._v(" "),
                          _c("td", [
                            inscrito.duplicado == "1"
                              ? _c("div", [
                                  _c(
                                    "span",
                                    { staticClass: "badge badge-success" },
                                    [_vm._v("SI")]
                                  )
                                ])
                              : _c("div", [
                                  _c("span", { staticClass: "badge" })
                                ])
                          ]),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(inscrito.nombre_convocatoria)
                            }
                          })
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
        ? _c("v-formulario-inscrito", {
            ref: "cmp_crear_inscrito",
            attrs: { var_config: _vm.var_config },
            on: {
              guardado: function($event) {
                return _vm.listarInscrito(1, "", "nombre")
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
                return _vm.listarInscrito(1, "", "nombre")
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
                return _vm.listarInscrito(1, "", "nombre")
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
        ? _c("v-ver-inscrito", {
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
      _c("li", { staticClass: "breadcrumb-item" }, [_vm._v("Tramite Carne")]),
      _vm._v(" "),
      _c("li", { staticClass: "breadcrumb-item" }, [
        _c("a", { attrs: { href: "#" } }, [_vm._v("Inscrito")])
      ]),
      _vm._v(" "),
      _c("li", { staticClass: "breadcrumb-item active" }, [
        _vm._v("Historico Listado")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" }, [
      _c("i", { staticClass: "fa fa-align-justify" }),
      _vm._v(" Inscritos\n                        ")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Convocatoria: ")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Busqueda General: ")])])
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
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue":
/*!**************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ListarInscritoHistorico_vue_vue_type_template_id_30dc2ee9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ListarInscritoHistorico.vue?vue&type=template&id=30dc2ee9& */ "./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=template&id=30dc2ee9&");
/* harmony import */ var _ListarInscritoHistorico_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ListarInscritoHistorico.vue?vue&type=script&lang=js& */ "./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _ListarInscritoHistorico_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ListarInscritoHistorico.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _ListarInscritoHistorico_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ListarInscritoHistorico_vue_vue_type_template_id_30dc2ee9___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ListarInscritoHistorico_vue_vue_type_template_id_30dc2ee9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/erp/inscrito/ListarInscritoHistorico.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarInscritoHistorico_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarInscritoHistorico.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarInscritoHistorico_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarInscritoHistorico_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarInscritoHistorico.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarInscritoHistorico_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarInscritoHistorico_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarInscritoHistorico_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarInscritoHistorico_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=template&id=30dc2ee9&":
/*!*********************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=template&id=30dc2ee9& ***!
  \*********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarInscritoHistorico_vue_vue_type_template_id_30dc2ee9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarInscritoHistorico.vue?vue&type=template&id=30dc2ee9& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/ListarInscritoHistorico.vue?vue&type=template&id=30dc2ee9&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarInscritoHistorico_vue_vue_type_template_id_30dc2ee9___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarInscritoHistorico_vue_vue_type_template_id_30dc2ee9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);