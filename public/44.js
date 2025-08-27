(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[44],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
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
      editable: Object.assign({}, this.value),
      errors: [],
      btn: {
        registrar: false,
        actualizar: false
      }
    };
  },
  mounted: function mounted() {
    if (!this.editable.id) {
      //Nuevo
      this.editable.estado = 'activo';
    } else {
      //Editar
      if (this.editable.estado == 'activo') this.editable.estado = true;
      if (this.editable.estado == 'inactivo') this.editable.estado = false;
    }
  },
  methods: {
    registrarPerfil: function registrarPerfil() {
      var me = this;
      this.btn['registrar'] = true;
      if (this.editable.estado) this.editable.estado = 'activo';else this.editable.estado = 'inactivo';
      axios.post('/perfil/registrar', this.editable).then(function (response) {
        me.$emit('guardado');
        me.cerrarModal();
      })["catch"](function (error) {
        me.btn['registrar'] = false;

        if (error.request.response) {
          var response = JSON.parse(error.request.response);
          console.log(response);
          me.errors = response.errors;
        }
      });
    },
    actualizarPerfil: function actualizarPerfil() {
      var me = this;
      this.btn['actualizar'] = true;
      axios.put('/perfil/actualizar', this.editable).then(function (response) {
        me.$emit('guardado');
        me.cerrarModal();
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
    imageChanged: function imageChanged(e) {
      var _this = this;

      console.log(e.target.files[0]);
      var propiedades = e.target.files[0];
      var fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);

      fileReader.onload = function (e) {
        _this.editable.name_image = propiedades.name;
        _this.editable.new_imagen = e.target.result;
      };
    },
    cambiarValorItem: function cambiarValorItem(e) {
      console.log(e);
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=style&index=0&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=style&index=0&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.modal-content{\n    width: 100% !important;\n    position: absolute !important;\n}\n.mostrar{\n    display: list-item !important;\n    opacity: 1 !important;\n    position: absolute !important;\n    background-color: #3c29297a !important;\n}\n.div-error{\n    display: flex;\n    justify-content: center;\n}\n.text-error{\n    color: red !important;\n    font-weight: bold;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioPerfil.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=template&id=2277c38c&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=template&id=2277c38c& ***!
  \******************************************************************************************************************************************************************************************************************************/
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
                "max-height": "450px",
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
                  _c("div", { staticClass: "row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(0),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.razon_social,
                                expression: "editable.razon_social"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Razon Social..."
                            },
                            domProps: { value: _vm.editable.razon_social },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "razon_social",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.razon_social
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.razon_social))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(1),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.nombre_comercial,
                                expression: "editable.nombre_comercial"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Nombre Comercial..."
                            },
                            domProps: { value: _vm.editable.nombre_comercial },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "nombre_comercial",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.nombre_comercial
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.nombre_comercial))
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
                                value: _vm.editable.ruc,
                                expression: "editable.ruc"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: { type: "text", placeholder: "RUC..." },
                            domProps: { value: _vm.editable.ruc },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "ruc",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.ruc
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.ruc))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-8 col-md-8 col-sm-8 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(3),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.direccion,
                                expression: "editable.direccion"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Direccion..."
                            },
                            domProps: { value: _vm.editable.direccion },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "direccion",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.direccion
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.direccion))
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
                      { staticClass: "col-lg-4 col-md-4 col-sm-4 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(4),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.departamento,
                                expression: "editable.departamento"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Departamento..."
                            },
                            domProps: { value: _vm.editable.departamento },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "departamento",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.departamento
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.departamento))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-2 col-md-2 col-sm-2 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(5),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.provincia,
                                expression: "editable.provincia"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Provincia..."
                            },
                            domProps: { value: _vm.editable.provincia },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "provincia",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.provincia
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.provincia))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-2 col-md-2 col-sm-2 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(6),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.distrito,
                                expression: "editable.distrito"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: { type: "text", placeholder: "Distrito..." },
                            domProps: { value: _vm.editable.distrito },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "distrito",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.distrito
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.distrito))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-2 col-md-2 col-sm-2 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(7),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.cod_pais,
                                expression: "editable.cod_pais"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Cod. Pais..."
                            },
                            domProps: { value: _vm.editable.cod_pais },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "cod_pais",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.cod_pais
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.cod_pais))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-2 col-md-2 col-sm-2 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(8),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.ubigeo,
                                expression: "editable.ubigeo"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: { type: "text", placeholder: "Ubigeo..." },
                            domProps: { value: _vm.editable.ubigeo },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "ubigeo",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.ubigeo
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.ubigeo))
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
                      { staticClass: "col-lg-4 col-md-4 col-sm-4 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(9),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.telefono,
                                expression: "editable.telefono"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: { type: "text", placeholder: "Telefono..." },
                            domProps: { value: _vm.editable.telefono },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "telefono",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.telefono
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.telefono))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-2 col-md-2 col-sm-2 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(10),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.usuario,
                                expression: "editable.usuario"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Usuario SOL..."
                            },
                            domProps: { value: _vm.editable.usuario },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "usuario",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.usuario
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.usuario))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-2 col-md-2 col-sm-2 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(11),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.clave,
                                expression: "editable.clave"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Clave SOL..."
                            },
                            domProps: { value: _vm.editable.clave },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "clave",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.clave
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.clave))
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
                          _vm._m(12),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.firma,
                                expression: "editable.firma"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Contraseña Cert..."
                            },
                            domProps: { value: _vm.editable.firma },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "firma",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.firma
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.firma))
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
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(13),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.descripcion,
                                expression: "editable.descripcion"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Descripcion..."
                            },
                            domProps: { value: _vm.editable.descripcion },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "descripcion",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.descripcion
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.descripcion))
                              ])
                            : _vm._e()
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(14),
                          _c("br"),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.estado,
                                expression: "editable.estado"
                              }
                            ],
                            attrs: { type: "checkbox" },
                            domProps: {
                              checked: Array.isArray(_vm.editable.estado)
                                ? _vm._i(_vm.editable.estado, null) > -1
                                : _vm.editable.estado
                            },
                            on: {
                              change: function($event) {
                                var $$a = _vm.editable.estado,
                                  $$el = $event.target,
                                  $$c = $$el.checked ? true : false
                                if (Array.isArray($$a)) {
                                  var $$v = null,
                                    $$i = _vm._i($$a, $$v)
                                  if ($$el.checked) {
                                    $$i < 0 &&
                                      _vm.$set(
                                        _vm.editable,
                                        "estado",
                                        $$a.concat([$$v])
                                      )
                                  } else {
                                    $$i > -1 &&
                                      _vm.$set(
                                        _vm.editable,
                                        "estado",
                                        $$a
                                          .slice(0, $$i)
                                          .concat($$a.slice($$i + 1))
                                      )
                                  }
                                } else {
                                  _vm.$set(_vm.editable, "estado", $$c)
                                }
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.estado
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.estado))
                              ])
                            : _vm._e()
                        ])
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", [
                    _c(
                      "div",
                      { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(15),
                          _vm._v(" "),
                          _c("input", {
                            staticClass: "form-control",
                            attrs: { type: "file", accept: "jpeg, jpe, png" },
                            on: { change: _vm.imageChanged }
                          }),
                          _vm._v(" "),
                          _vm.errors.otro_imagen
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.otro_imagen))
                              ])
                            : _vm._e()
                        ])
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _vm.editable.id
                    ? _c("div", { staticClass: "row" }, [
                        _c(
                          "div",
                          {
                            staticClass:
                              "col-lg-12 col-md-12 col-sm-12 col-xs-12"
                          },
                          [
                            _c("div", { staticClass: "form-group" }, [
                              _vm._m(16),
                              _vm._v(" "),
                              _vm.editable.imagen
                                ? _c("img", {
                                    staticClass: "form-control",
                                    attrs: {
                                      src: "/images/" + _vm.editable.imagen
                                    }
                                  })
                                : _vm._e()
                            ])
                          ]
                        )
                      ])
                    : _vm._e()
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
                        return _vm.registrarPerfil()
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
                        return _vm.actualizarPerfil()
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
    return _c("label", [_c("dt", [_vm._v("Razon Social: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Nombre Comercial: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("RUC: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Direccion: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Departamento: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Provincia: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Distrito: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("COD. PAIS: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Ubigeo: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Telefono: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Usuario SOL: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Clave SOL: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Contraseña Cert.: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Correo: ")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Estado: ")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Logotipo: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Logotipo: *")])])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/erp/perfil/FormularioPerfil.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/components/erp/perfil/FormularioPerfil.vue ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _FormularioPerfil_vue_vue_type_template_id_2277c38c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./FormularioPerfil.vue?vue&type=template&id=2277c38c& */ "./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=template&id=2277c38c&");
/* harmony import */ var _FormularioPerfil_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./FormularioPerfil.vue?vue&type=script&lang=js& */ "./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _FormularioPerfil_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./FormularioPerfil.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _FormularioPerfil_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _FormularioPerfil_vue_vue_type_template_id_2277c38c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _FormularioPerfil_vue_vue_type_template_id_2277c38c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/erp/perfil/FormularioPerfil.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioPerfil_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioPerfil.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioPerfil_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=style&index=0&lang=css&":
/*!**************************************************************************************************!*\
  !*** ./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=style&index=0&lang=css& ***!
  \**************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioPerfil_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioPerfil.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioPerfil_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioPerfil_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioPerfil_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioPerfil_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=template&id=2277c38c&":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=template&id=2277c38c& ***!
  \************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioPerfil_vue_vue_type_template_id_2277c38c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioPerfil.vue?vue&type=template&id=2277c38c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/perfil/FormularioPerfil.vue?vue&type=template&id=2277c38c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioPerfil_vue_vue_type_template_id_2277c38c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioPerfil_vue_vue_type_template_id_2277c38c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);