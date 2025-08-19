(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[34],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
var MatriculadoBusqueda = function MatriculadoBusqueda() {
  return __webpack_require__.e(/*! import() */ 0).then(__webpack_require__.bind(null, /*! @/components/referencias/MatriculadoBusqueda */ "./resources/js/components/referencias/MatriculadoBusqueda.vue"));
};

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    "matriculado-busqueda": MatriculadoBusqueda
  },
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
      editable: Object.assign({
        tipo_documento: 'codigo'
      }, this.value),
      errors: [],
      btn: {
        registrar: false,
        actualizar: false
      },
      lock: {},
      text: {},
      var_config1: {},
      recortar_nuevo: {},
      validacion_nuevo: {}
    };
  },
  mounted: function mounted() {
    var me = this;

    if (!this.editable.id) {
      //Nuevo
      me.editable._voucher_validado = false;
      me.text._voucher_validado = "NO";
      me.editable._duplicado = false;
      me.text._duplicado = "NO";
      this.lock['escuela_profesional'] = true;
      this.lock['dni'] = true;
      this.lock['codigo_estudiante'] = true;
      this.lock['apellido_paterno'] = true;
      this.lock['apellido_materno'] = true;
      this.lock['nombres'] = true;
      this.lock['sexo'] = true;
    } else {
      //Editar
      // Duplicado
      if (me.editable.duplicado == '1') {
        me.editable._duplicado = true;
        me.text._duplicado = 'SI';
      }

      if (me.editable.duplicado == '0') {
        me.editable._duplicado = false;
        me.text._duplicado = 'NO';
      } // Foto Validado


      if (me.editable.voucher_validado == '1') {
        me.lock['_voucher_validado'] = true;
        me.lock['new_document'] = true;
        me.editable._voucher_validado = true;
        me.text._voucher_validado = 'SI';
      }

      if (me.editable.voucher_validado == '0') {
        me.lock['_voucher_validado'] = false;
        me.lock['new_document'] = false;
        me.editable._voucher_validado = false;
        me.text._voucher_validado = 'NO';
      }

      this.lock['_duplicado'] = true;
      this.lock['numero_documento'] = true;
      this.lock['escuela_profesional'] = true;
      this.lock['dni'] = true;
      this.lock['codigo_estudiante'] = true;
      this.lock['apellido_paterno'] = true;
      this.lock['apellido_materno'] = true;
      this.lock['nombres'] = true;
      this.lock['sexo'] = true;
      this.lock['numero_recibo'] = true;
    }

    this.editable.fecha_inicio_edicion = now();
    this.$forceUpdate();
  },
  methods: {
    registrarArticulo: function registrarArticulo() {
      var me = this;
      this.btn['registrar'] = true;
      if (me.editable._voucher_validado) me.editable.voucher_validado = 1;else me.editable.voucher_validado = 0;
      if (me.editable._duplicado) me.editable.duplicado = 1;else me.editable.duplicado = 0;
      axios.post('/inscrito/registrar', this.editable).then(function (response) {
        me.$emit('guardado');
        me.cerrarModal();
        swal('Registrado', 'El tramite ha sido registrado con exito', 'success');
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
    actualizarArticulo: function actualizarArticulo() {
      console.log("actualizarArticulo");
      var me = this;
      this.btn['actualizar'] = true;
      if (me.editable._voucher_validado) me.editable.voucher_validado = 1;else me.editable.voucher_validado = 0; // Validando la validacion verdadera

      if (!me.editable._voucher_validado) {
        me.errors._voucher_validado = 'Marque la opcion validar.';
        me.btn['actualizar'] = false;
        return;
      } else {
        delete me.errors.new_document;
      }

      this.editable.fecha_fin_edicion = now();
      axios.put('/inscrito/validar_voucher', {
        id: this.editable.id,
        voucher_validado: this.editable.voucher_validado,
        observacion: this.editable.observacion
      }).then(function (response) {
        me.$emit('guardado');
        me.cerrarModal();
        swal('Actualizado', 'El voucher ha sido validado con exito', 'success');
      })["catch"](function (error) {
        me.btn['actualizar'] = false;

        if (error.request.response) {
          var response = JSON.parse(error.request.response);
          console.log(response);
          me.errors = response.errors;
        }
      });
    },
    cerrarModal: function cerrarModal() {
      this.$emit('input', {});
    },
    changeTipo: function changeTipo(e) {
      if (e.target.checked) this.text._voucher_validado = 'SI';else this.text._voucher_validado = 'NO';
      this.$forceUpdate();
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.modal-content{\n    width: 100% !important;\n    position: absolute !important;\n}\n.mostrar{\n    display: list-item !important;\n    opacity: 1 !important;\n    position: absolute !important;\n    background-color: #3c29297a !important;\n}\n.div-error{\n    display: flex;\n    justify-content: center;\n}\n.text-error{\n    color: red !important;\n    font-weight: bold;\n}\n@media (max-height: 500px) {\n.modal-xl {\n        max-width: 1140px;}\n}\n.hide-container{\n    display: none;\n}\n.show-container{\n    display: flex;\n    width: calc(100% + 10px);\n    height: calc(100% - 66px);\n    /* border: 1px solid black; */\n    position: absolute;\n    z-index: 100;\n    margin: 66.8px 0 0 -1px;\n    background: rgba(162, 153, 153, .5);\n}\n.loader {\n    border: 10px solid #f3f3f3;\n    border-radius: 50%;\n    border-top: 10px solid #3498db;\n    width: 50px;\n    height: 50px;\n    -webkit-animation: spin 2s linear infinite; /* Safari */\n    animation: spin 2s linear infinite;\n    top: calc(50%);\n    left: 50%;\n    position: absolute;\n    margin: -25px 0 0 -25px;\n    z-index: 100;\n}\n\n/* Safari */\n@-webkit-keyframes spin {\n0% { -webkit-transform: rotate(0deg);\n}\n100% { -webkit-transform: rotate(360deg);\n}\n}\n@keyframes spin {\n0% { transform: rotate(0deg);\n}\n100% { transform: rotate(360deg);\n}\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioValidarVoucher.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=template&id=39523974&":
/*!****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=template&id=39523974& ***!
  \****************************************************************************************************************************************************************************************************************************************/
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
      _c("div", { staticClass: "modal-dialog modal-primary modal-xl" }, [
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
              [_c("span", { attrs: { "aria-hidden": "true" } }, [_vm._v("×")])]
            )
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "modal-body",
              staticStyle: {
                "max-height": "550px",
                "overflow-y": "auto",
                "overflow-x": "hidden"
              }
            },
            [
              _c(
                "form",
                {
                  staticClass: "form-horizontal",
                  attrs: {
                    action: "",
                    method: "post",
                    enctype: "multipart/form-data"
                  }
                },
                [
                  _vm._v(
                    "\n                    " +
                      _vm._s(_vm.editable) +
                      "\n                    "
                  ),
                  _c("div", { staticClass: "row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-4 col-md-4 col-sm-4 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(0),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.escuela_profesional,
                                expression: "editable.escuela_profesional"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Escuela Profesional...",
                              disabled: _vm.lock.escuela_profesional
                            },
                            domProps: {
                              value: _vm.editable.escuela_profesional
                            },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "escuela_profesional",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.escuela_profesional
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.escuela_profesional))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4 col-md-4 col-sm-4 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(1),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.codigo_estudiante,
                                expression: "editable.codigo_estudiante"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Codigo Estudiante...",
                              disabled: _vm.lock.codigo_estudiante
                            },
                            domProps: { value: _vm.editable.codigo_estudiante },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "codigo_estudiante",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.codigo_estudiante
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.codigo_estudiante))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-4 col-md-4 col-sm-4 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(2),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.dni,
                                expression: "editable.dni"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "N° DNI...",
                              disabled: _vm.lock.dni
                            },
                            domProps: { value: _vm.editable.dni },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "dni",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.dni
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.dni))
                              ])
                            : _vm._e()
                        ])
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(3),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.apellido_paterno,
                                expression: "editable.apellido_paterno"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Apellido Paterno...",
                              disabled: _vm.lock.apellido_paterno
                            },
                            domProps: { value: _vm.editable.apellido_paterno },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "apellido_paterno",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.apellido_paterno
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.apellido_paterno))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(4),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.apellido_materno,
                                expression: "editable.apellido_materno"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Apellido Materno...",
                              disabled: _vm.lock.apellido_materno
                            },
                            domProps: { value: _vm.editable.apellido_materno },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "apellido_materno",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.apellido_materno
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.apellido_materno))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(5),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.nombres,
                                expression: "editable.nombres"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Nombres...",
                              disabled: _vm.lock.nombres
                            },
                            domProps: { value: _vm.editable.nombres },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "nombres",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.nombres
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.nombres))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(6),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.numero_recibo,
                                expression: "editable.numero_recibo"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "N° Recibo...",
                              disabled: _vm.lock.numero_recibo
                            },
                            domProps: { value: _vm.editable.numero_recibo },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "numero_recibo",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.numero_recibo
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.numero_recibo))
                              ])
                            : _vm._e()
                        ])
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                      [
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            {
                              staticClass:
                                "col-lg-6 col-md-6 col-sm-6 col-xs-12"
                            },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _vm._m(7),
                                _c("br"),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "custom-control custom-switch custom-switch-off-danger custom-switch-on-success"
                                  },
                                  [
                                    _c("input", {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.editable._voucher_validado,
                                          expression:
                                            "editable._voucher_validado"
                                        }
                                      ],
                                      staticClass: "custom-control-input",
                                      attrs: {
                                        type: "checkbox",
                                        id: "customSwitch6",
                                        disabled: _vm.lock._voucher_validado
                                      },
                                      domProps: {
                                        checked: Array.isArray(
                                          _vm.editable._voucher_validado
                                        )
                                          ? _vm._i(
                                              _vm.editable._voucher_validado,
                                              null
                                            ) > -1
                                          : _vm.editable._voucher_validado
                                      },
                                      on: {
                                        change: [
                                          function($event) {
                                            var $$a =
                                                _vm.editable._voucher_validado,
                                              $$el = $event.target,
                                              $$c = $$el.checked ? true : false
                                            if (Array.isArray($$a)) {
                                              var $$v = null,
                                                $$i = _vm._i($$a, $$v)
                                              if ($$el.checked) {
                                                $$i < 0 &&
                                                  _vm.$set(
                                                    _vm.editable,
                                                    "_voucher_validado",
                                                    $$a.concat([$$v])
                                                  )
                                              } else {
                                                $$i > -1 &&
                                                  _vm.$set(
                                                    _vm.editable,
                                                    "_voucher_validado",
                                                    $$a
                                                      .slice(0, $$i)
                                                      .concat(
                                                        $$a.slice($$i + 1)
                                                      )
                                                  )
                                              }
                                            } else {
                                              _vm.$set(
                                                _vm.editable,
                                                "_voucher_validado",
                                                $$c
                                              )
                                            }
                                          },
                                          function($event) {
                                            return _vm.changeTipo($event)
                                          }
                                        ]
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c("label", {
                                      staticClass: "custom-control-label",
                                      staticStyle: { width: "70px" },
                                      attrs: { for: "customSwitch6" },
                                      domProps: {
                                        innerHTML: _vm._s(
                                          _vm.text._voucher_validado
                                        )
                                      }
                                    }),
                                    _vm._v(" "),
                                    _vm.errors._voucher_validado
                                      ? _c(
                                          "span",
                                          { staticClass: "text-error" },
                                          [
                                            _vm._v(
                                              _vm._s(
                                                _vm.errors._voucher_validado
                                              )
                                            )
                                          ]
                                        )
                                      : _vm._e()
                                  ]
                                )
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            {
                              staticClass:
                                "col-lg-6 col-md-6 col-sm-6 col-xs-12"
                            },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _vm._m(8),
                                _vm._v(" "),
                                _c("textarea", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.editable.observacion,
                                      expression: "editable.observacion"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: {
                                    type: "text",
                                    placeholder: "Observacion..."
                                  },
                                  domProps: { value: _vm.editable.observacion },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.editable,
                                        "observacion",
                                        $event.target.value
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _vm.errors.observacion
                                  ? _c("span", { staticClass: "text-error" }, [
                                      _vm._v(_vm._s(_vm.errors.observacion))
                                    ])
                                  : _vm._e()
                              ])
                            ]
                          )
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                      [
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            {
                              staticClass:
                                "col-lg-12 col-md-12 col-sm-12 col-xs-12"
                            },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _c("img", {
                                  attrs: {
                                    id: "image",
                                    width: "240",
                                    src:
                                      "/storage/" +
                                      _vm.editable.folder +
                                      "/4_vouchers/" +
                                      _vm.editable.foto
                                  }
                                })
                              ])
                            ]
                          )
                        ])
                      ]
                    )
                  ])
                ]
              )
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "modal-footer" }, [
            _c(
              "button",
              {
                staticClass: "btn btn-secondary",
                attrs: { type: "button" },
                on: {
                  click: function($event) {
                    return _vm.cerrarModal()
                  }
                }
              },
              [_vm._v("Cerrar")]
            ),
            _vm._v(" "),
            _vm.var_config.tipo_accion == "registrar"
              ? _c(
                  "button",
                  {
                    staticClass: "btn btn-primary",
                    attrs: { type: "button", disabled: _vm.btn.registrar },
                    on: {
                      click: function($event) {
                        return _vm.registrarArticulo()
                      }
                    }
                  },
                  [_vm._v("Guardar")]
                )
              : _vm._e(),
            _vm._v(" "),
            _vm.var_config.tipo_accion == "actualizar"
              ? _c(
                  "button",
                  {
                    staticClass: "btn btn-primary",
                    attrs: { type: "button", disabled: _vm.btn.actualizar },
                    on: {
                      click: function($event) {
                        return _vm.actualizarArticulo()
                      }
                    }
                  },
                  [_vm._v("Actualizar")]
                )
              : _vm._e()
          ])
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Escuela Profesional: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Codigo de Estudiante: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("DNI: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Apellido Paterno: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Apellido Materno: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Nombres: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("N° Recibo: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("¿Validado?: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Observacion:")])])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue":
/*!***************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _FormularioValidarVoucher_vue_vue_type_template_id_39523974___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./FormularioValidarVoucher.vue?vue&type=template&id=39523974& */ "./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=template&id=39523974&");
/* harmony import */ var _FormularioValidarVoucher_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./FormularioValidarVoucher.vue?vue&type=script&lang=js& */ "./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _FormularioValidarVoucher_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./FormularioValidarVoucher.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _FormularioValidarVoucher_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _FormularioValidarVoucher_vue_vue_type_template_id_39523974___WEBPACK_IMPORTED_MODULE_0__["render"],
  _FormularioValidarVoucher_vue_vue_type_template_id_39523974___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/erp/inscrito/FormularioValidarVoucher.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidarVoucher_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioValidarVoucher.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidarVoucher_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=style&index=0&lang=css&":
/*!************************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=style&index=0&lang=css& ***!
  \************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidarVoucher_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioValidarVoucher.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidarVoucher_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidarVoucher_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidarVoucher_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidarVoucher_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=template&id=39523974&":
/*!**********************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=template&id=39523974& ***!
  \**********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidarVoucher_vue_vue_type_template_id_39523974___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioValidarVoucher.vue?vue&type=template&id=39523974& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioValidarVoucher.vue?vue&type=template&id=39523974&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidarVoucher_vue_vue_type_template_id_39523974___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioValidarVoucher_vue_vue_type_template_id_39523974___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);