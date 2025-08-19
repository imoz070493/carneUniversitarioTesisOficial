(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[15],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  components: {},
  props: {
    value: {
      type: Object,
      "default": {}
    },
    var_config: {
      type: Object,
      "default": {}
    }
  },
  data: function data() {
    return {
      nuevo: {},
      editable: Object.assign({}, this.value),
      show: {},
      btn: {},
      ocultar_btn: {},
      array_errores: [],
      pagination: {
        'total': 0,
        'current_page': 0,
        'per_page': 0,
        'last_page': 0,
        'from': 0,
        'to': 0
      },
      offset: 3,
      criterio: 'nombre',
      buscar: '',
      per_page: 10,
      resultado: null,
      validado: false
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
    this.array_errores = this.value.data;
    this.validarImagenBackend();
    this.$forceUpdate();
  },
  methods: {
    validarImagenBackend: function validarImagenBackend() {
      var me = this;
      me.btn['registrar'] = true;
      var _editable = {
        new_document: this.editable.new_document
      };
      axios.post('/inscrito/validar_imagen', _editable).then(function (response) {
        me.btn['registrar'] = false;
        console.log(response.data);
        me.resultado = response.data.resultados;
        me.validado = response.data.validado;
      })["catch"](function (error) {
        me.btn['registrar'] = false;

        if (error.request.status) {
          if (error.request.status == 419) {
            location.reload();
          }
        }

        if (error.request.response) {
          var response = JSON.parse(error.request.response);
          console.log(response);
          me.errors = response.errors;
        }
      });
    },
    cambiarPagina: function cambiarPagina(page, buscar, criterio) {
      var me = this; // Actualiza la pagina actual

      me.pagination.current_page = page; // Envia la peticion para visualizar la data de esta pagina

      me.listarIngresoEgreso(page, buscar, criterio);
    },
    cerrarModal: function cerrarModal() {
      this.$emit('input', {});
      this.$emit('cerrarModal', this.validado);
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.modal-content{\n    width: 100% !important;\n    position: absolute !important;\n}\n.mostrar{\n    display: list-item !important;\n    opacity: 1 !important;\n    position: absolute !important;\n    background-color: #3c29297a !important;\n}\n.div-error{\n    display: flex;\n    justify-content: center;\n}\n.text-error{\n    color: red !important;\n    font-weight: bold;\n}\n@media (max-height: 500px) {\n.modal-xl {\n        max-width: 1140px;}\n}\n.hide-container{\n    display: none;\n}\n.show-container{\n    display: flex;\n    width: calc(100% + 10px);\n    height: calc(100% - 66px);\n    /* border: 1px solid black; */\n    position: absolute;\n    z-index: 100;\n    margin: 66.8px 0 0 -1px;\n    background: rgba(162, 153, 153, .5);\n}\n.loader {\n    border: 10px solid #f3f3f3;\n    border-radius: 50%;\n    border-top: 10px solid #3498db;\n    width: 50px;\n    height: 50px;\n    -webkit-animation: spin 2s linear infinite; /* Safari */\n    animation: spin 2s linear infinite;\n    top: calc(50%);\n    left: 50%;\n    position: absolute;\n    margin: -25px 0 0 -25px;\n    z-index: 100;\n}\n\n/* Safari */\n@-webkit-keyframes spin {\n0% { -webkit-transform: rotate(0deg);\n}\n100% { -webkit-transform: rotate(360deg);\n}\n}\n@keyframes spin {\n0% { transform: rotate(0deg);\n}\n100% { transform: rotate(360deg);\n}\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioValidacion.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=template&id=ff58d846&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=template&id=ff58d846& ***!
  \************************************************************************************************************************************************************************************************************************************/
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
    "div",
    {
      staticClass: "modal fade mostrar",
      staticStyle: { display: "none" },
      attrs: {
        tabindex: "-1",
        role: "dialog",
        "aria-labelledby": "myModalLabel",
        "aria-hidden": "true"
      }
    },
    [
      _c(
        "div",
        {
          staticClass: "modal-dialog modal-primary modal-lg",
          attrs: { role: "document" }
        },
        [
          _c("div", { staticClass: "modal-content" }, [
            _c(
              "div",
              {
                class: {
                  "show-container": _vm.btn.registrar,
                  "hide-container": !_vm.btn.registrar
                }
              },
              [_c("div", { staticClass: "loader" })]
            ),
            _vm._v(" "),
            _c("div", { staticClass: "modal-header" }, [
              _c("h4", {
                staticClass: "modal-title",
                domProps: { textContent: _vm._s(_vm.var_config.title) }
              }),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "close",
                  attrs: { type: "button", "aria-label": "Close" },
                  on: {
                    click: function($event) {
                      return _vm.cerrarModal()
                    }
                  }
                },
                [
                  _c("span", { attrs: { "aria-hidden": "true" } }, [
                    _vm._v("×")
                  ])
                ]
              )
            ]),
            _vm._v(" "),
            _c(
              "div",
              {
                staticClass: "modal-body",
                staticStyle: {
                  "max-height": "450px",
                  "overflow-y": "auto",
                  "overflow-x": "hidden"
                }
              },
              [
                _c("div", { staticClass: "card" }, [
                  _c("div", { staticClass: "card-body" }, [
                    _c("dt", [_vm._v("Estado de Imagen:")]),
                    _vm._v(" "),
                    _vm.validado == true
                      ? _c("div", [
                          _c("span", { staticClass: "badge badge-success" }, [
                            _vm._v("Validado")
                          ])
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.validado == false
                      ? _c("div", [
                          _c("span", { staticClass: "badge badge-danger" }, [
                            _vm._v("Con Observaciones")
                          ])
                        ])
                      : _vm._e(),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticStyle: {
                          "overflow-x": "auto",
                          "white-space": "nowrap"
                        }
                      },
                      [
                        _c(
                          "table",
                          { staticClass: "table table-hover text-nowrap" },
                          [
                            _vm._m(0),
                            _vm._v(" "),
                            _vm.resultado
                              ? _c("tbody", [
                                  _c("tr", [
                                    _c("td", {
                                      domProps: { textContent: _vm._s("1") }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s("Tamaño")
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s(
                                          parseFloat(
                                            _vm.resultado.tamanio.valor
                                          ).toFixed(2) + " Kb"
                                        )
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm.resultado.tamanio.resultado ==
                                    "validado"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-success"
                                            },
                                            [_vm._v("Validado")]
                                          )
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.resultado.tamanio.resultado ==
                                    "invalido"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-danger"
                                            },
                                            [_vm._v("Invalido")]
                                          )
                                        ])
                                      : _vm._e()
                                  ]),
                                  _vm._v(" "),
                                  _c("tr", [
                                    _c("td", {
                                      domProps: { textContent: _vm._s("2") }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s("Dimension Alto")
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s(
                                          _vm.resultado.dimension_alto.valor
                                        )
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm.resultado.dimension_alto.resultado ==
                                    "validado"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-success"
                                            },
                                            [_vm._v("Validado")]
                                          )
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.resultado.dimension_alto.resultado ==
                                    "invalido"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-danger"
                                            },
                                            [_vm._v("Invalido")]
                                          )
                                        ])
                                      : _vm._e()
                                  ]),
                                  _vm._v(" "),
                                  _c("tr", [
                                    _c("td", {
                                      domProps: { textContent: _vm._s("3") }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s("Dimension Ancho")
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s(
                                          _vm.resultado.dimension_ancho.valor
                                        )
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm.resultado.dimension_ancho.resultado ==
                                    "validado"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-success"
                                            },
                                            [_vm._v("Validado")]
                                          )
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.resultado.dimension_ancho.resultado ==
                                    "invalido"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-danger"
                                            },
                                            [_vm._v("Invalido")]
                                          )
                                        ])
                                      : _vm._e()
                                  ]),
                                  _vm._v(" "),
                                  _c("tr", [
                                    _c("td", {
                                      domProps: { textContent: _vm._s("4") }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s("R. Horizontal Dpi")
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s(
                                          _vm.resultado.horizontal_dpi.valor
                                        )
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm.resultado.horizontal_dpi.resultado ==
                                    "validado"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-success"
                                            },
                                            [_vm._v("Validado")]
                                          )
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.resultado.horizontal_dpi.resultado ==
                                    "invalido"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-danger"
                                            },
                                            [_vm._v("Invalido")]
                                          )
                                        ])
                                      : _vm._e()
                                  ]),
                                  _vm._v(" "),
                                  _c("tr", [
                                    _c("td", {
                                      domProps: { textContent: _vm._s("5") }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s("R. Vertical Dpi")
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s(
                                          _vm.resultado.vertical_dpi.valor
                                        )
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm.resultado.vertical_dpi.resultado ==
                                    "validado"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-success"
                                            },
                                            [_vm._v("Validado")]
                                          )
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.resultado.vertical_dpi.resultado ==
                                    "invalido"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-danger"
                                            },
                                            [_vm._v("Invalido")]
                                          )
                                        ])
                                      : _vm._e()
                                  ]),
                                  _vm._v(" "),
                                  _c("tr", [
                                    _c("td", {
                                      domProps: { textContent: _vm._s("6") }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s("Ojo Izquierdo X")
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s(
                                          _vm.resultado.left_eye_x.valor
                                        )
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm.resultado.left_eye_x.resultado ==
                                    "validado"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-success"
                                            },
                                            [_vm._v("Validado")]
                                          )
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.resultado.left_eye_x.resultado ==
                                    "invalido"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-danger"
                                            },
                                            [_vm._v("Invalido")]
                                          )
                                        ])
                                      : _vm._e()
                                  ]),
                                  _vm._v(" "),
                                  _c("tr", [
                                    _c("td", {
                                      domProps: { textContent: _vm._s("7") }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s("Ojo Izquierdo Y")
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s(
                                          _vm.resultado.left_eye_y.valor
                                        )
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm.resultado.left_eye_y.resultado ==
                                    "validado"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-success"
                                            },
                                            [_vm._v("Validado")]
                                          )
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.resultado.left_eye_y.resultado ==
                                    "invalido"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-danger"
                                            },
                                            [_vm._v("Invalido")]
                                          )
                                        ])
                                      : _vm._e()
                                  ]),
                                  _vm._v(" "),
                                  _c("tr", [
                                    _c("td", {
                                      domProps: { textContent: _vm._s("8") }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s("Ojo Derecho X")
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s(
                                          _vm.resultado.right_eye_x.valor
                                        )
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm.resultado.right_eye_x.resultado ==
                                    "validado"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-success"
                                            },
                                            [_vm._v("Validado")]
                                          )
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.resultado.right_eye_x.resultado ==
                                    "invalido"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-danger"
                                            },
                                            [_vm._v("Invalido")]
                                          )
                                        ])
                                      : _vm._e()
                                  ]),
                                  _vm._v(" "),
                                  _c("tr", [
                                    _c("td", {
                                      domProps: { textContent: _vm._s("9") }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s("Ojo Derecho Y")
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s(
                                          _vm.resultado.right_eye_y.valor
                                        )
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm.resultado.right_eye_y.resultado ==
                                    "validado"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-success"
                                            },
                                            [_vm._v("Validado")]
                                          )
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.resultado.right_eye_y.resultado ==
                                    "invalido"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-danger"
                                            },
                                            [_vm._v("Invalido")]
                                          )
                                        ])
                                      : _vm._e()
                                  ]),
                                  _vm._v(" "),
                                  _c("tr", [
                                    _c("td", {
                                      domProps: { textContent: _vm._s("10") }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s("Boca x")
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s(
                                          _vm.resultado.mouth_center_x.valor
                                        )
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm.resultado.mouth_center_x.resultado ==
                                    "validado"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-success"
                                            },
                                            [_vm._v("Validado")]
                                          )
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.resultado.mouth_center_x.resultado ==
                                    "invalido"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-danger"
                                            },
                                            [_vm._v("Invalido")]
                                          )
                                        ])
                                      : _vm._e()
                                  ]),
                                  _vm._v(" "),
                                  _c("tr", [
                                    _c("td", {
                                      domProps: { textContent: _vm._s("11") }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s("Boca Y")
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("td", {
                                      domProps: {
                                        textContent: _vm._s(
                                          _vm.resultado.mouth_center_y.valor
                                        )
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm.resultado.mouth_center_y.resultado ==
                                    "validado"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-success"
                                            },
                                            [_vm._v("Validado")]
                                          )
                                        ])
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.resultado.mouth_center_y.resultado ==
                                    "invalido"
                                      ? _c("td", [
                                          _c(
                                            "span",
                                            {
                                              staticClass: "badge badge-danger"
                                            },
                                            [_vm._v("Invalido")]
                                          )
                                        ])
                                      : _vm._e()
                                  ])
                                ])
                              : _vm._e()
                          ]
                        )
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
              ]
            ),
            _vm._v(" "),
            _c("div", { staticClass: "modal-footer" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-secondary",
                  attrs: { type: "button", disabled: _vm.btn.cancelar },
                  on: {
                    click: function($event) {
                      return _vm.cerrarModal()
                    }
                  }
                },
                [_vm._v("Cerrar")]
              )
            ])
          ])
        ]
      )
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", [_vm._v("N°")]),
        _vm._v(" "),
        _c("th", [_vm._v("Especificación")]),
        _vm._v(" "),
        _c("th", [_vm._v("Resultado")]),
        _vm._v(" "),
        _c("th", [_vm._v("Estado")])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioValidacion.vue":
/*!***********************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioValidacion.vue ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _FormularioValidacion_vue_vue_type_template_id_ff58d846___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./FormularioValidacion.vue?vue&type=template&id=ff58d846& */ "./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=template&id=ff58d846&");
/* harmony import */ var _FormularioValidacion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./FormularioValidacion.vue?vue&type=script&lang=js& */ "./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _FormularioValidacion_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./FormularioValidacion.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _FormularioValidacion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _FormularioValidacion_vue_vue_type_template_id_ff58d846___WEBPACK_IMPORTED_MODULE_0__["render"],
  _FormularioValidacion_vue_vue_type_template_id_ff58d846___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/erp/inscrito/FormularioValidacion.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=script&lang=js&":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidacion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioValidacion.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidacion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=style&index=0&lang=css&":
/*!********************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=style&index=0&lang=css& ***!
  \********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidacion_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioValidacion.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidacion_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidacion_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidacion_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidacion_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=template&id=ff58d846&":
/*!******************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=template&id=ff58d846& ***!
  \******************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidacion_vue_vue_type_template_id_ff58d846___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioValidacion.vue?vue&type=template&id=ff58d846& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidacion.vue?vue&type=template&id=ff58d846&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidacion_vue_vue_type_template_id_ff58d846___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidacion_vue_vue_type_template_id_ff58d846___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);