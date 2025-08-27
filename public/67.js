(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[67],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/perfil/ListarPerfil.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/perfil/ListarPerfil.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


var FormularioPerfil = function FormularioPerfil() {
  return __webpack_require__.e(/*! import() */ 44).then(__webpack_require__.bind(null, /*! @/components/erp/perfil/FormularioPerfil */ "./resources/js/components/erp/perfil/FormularioPerfil.vue"));
};

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    "v-formulario-perfil": FormularioPerfil
  },
  data: function data() {
    return {
      nuevo: {},
      editable: {
        _tipo: false
      },
      show: {},
      var_config: {},
      arrayPerfil: [],
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
      errors: [],
      text: {},
      btn: {}
    };
  },
  computed: _objectSpread({
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
  }, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapState"])(['app_mode'])),
  mounted: function mounted() {
    console.log('Component mounted.');
    this.listarPerfil(1, this.buscar, this.criterio);
  },
  methods: _objectSpread(_objectSpread({}, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapMutations"])(['aumentar', 'disminuir', 'setAppMode'])), {}, {
    setterAppMode: function setterAppMode(mode) {
      this.setAppMode(mode);
    },
    listarPerfil: function listarPerfil(page, buscar, criterio) {
      var me = this;
      var url = '/perfil?page=' + page + '&buscar=' + buscar + '&criterio=' + criterio + '&per_page=' + this.per_page;
      axios.get(url).then(function (response) {
        var respuesta = response.data.perfiles; // console.log(respuesta);

        me.editable = respuesta[0];

        if (me.editable.tipo == 'production') {
          me.editable._tipo = true;
          me.text._tipo = 'Produccion';
        }

        if (me.editable.tipo == 'beta') {
          me.editable._tipo = false;
          me.text._tipo = 'Prueba';
        } // me.pagination = respuesta.pagination;
        // if(me.arrayPerfil.length==0) me.show['arrayPerfil'] = true;
        // else me.show['arrayPerfil'] = false;

      })["catch"](function (error) {
        console.log(error);
      });
    },
    actualizarPerfil: function actualizarPerfil() {
      var _this = this;

      var me = this;
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
      }).then(function (result) {
        if (result.value) {
          if (me.editable._tipo) me.editable.tipo = 'production';else me.editable.tipo = 'beta';
          axios.put('/perfil/actualizar', _this.editable).then(function (response) {
            me.btn['actualizar'] = false;
            var mode = '';
            if (me.editable._tipo) mode = 'Produccion';else mode = 'Prueba';
            me.setterAppMode(mode);
            me.$forceUpdate();
            swal('Actualizado', 'El registro ha sido actualizado con exito', 'success');
          })["catch"](function (error) {
            me.btn['actualizar'] = false;

            if (error.request.response) {
              var response = JSON.parse(error.request.response);
              console.log(response);
              me.errors = response.errors;
            }
          });
        } else if (
        /* Read more about handling dismissals below */
        result.dismiss === swal.DismissReason.cancel) {
          me.btn['actualizar'] = false;
          me.$forceUpdate();
        }
      });
    },
    cambiarPagina: function cambiarPagina(page, buscar, criterio) {
      var me = this; // Actualiza la pagina actual

      me.pagination.current_page = page; // Envia la peticion para visualizar la data de esta pagina

      me.listarPerfil(page, buscar, criterio);
    },
    desactivarPerfil: function desactivarPerfil(id) {
      var _this2 = this;

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
      }).then(function (result) {
        if (result.value) {
          var me = _this2;
          axios.put('/perfil/desactivar', {
            id: id
          }).then(function (response) {
            me.listarPerfil(1, '', 'nombre');
            swal('Desactivado', 'El registro ha sido desactivado con exito', 'success');
          })["catch"](function (error) {
            console.log(error);
          });
        } else if (
        /* Read more about handling dismissals below */
        result.dismiss === swal.DismissReason.cancel) {}
      });
    },
    activarPerfil: function activarPerfil(id) {
      var _this3 = this;

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
      }).then(function (result) {
        if (result.value) {
          var me = _this3;
          axios.put('/perfil/activar', {
            id: id
          }).then(function (response) {
            me.listarPerfil(1, '', 'nombre');
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
        title: 'Registrar Perfil',
        tipo_accion: 'registrar'
      };
    },
    editar: function editar(perfil) {
      this.editable = Object.assign({
        _estado: 'editando'
      }, perfil);
      this.var_config = {
        title: 'Actualizar Perfil: ' + String(perfil.tipo).charAt(0).toUpperCase() + String(perfil.tipo).substring(1),
        tipo_accion: 'actualizar'
      };
    },
    imageChanged: function imageChanged() {},
    change: function change() {},
    changeTipo: function changeTipo(e) {
      if (e.target.checked) this.text._tipo = 'Produccion';else this.text._tipo = 'Prueba';
      this.$forceUpdate();
    }
  }),
  watch: {
    'editable._tipo': function editable_tipo(n, o) {
      console.log(n); // if(newvalue){
      //     console.log(newvalue);
      // }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/perfil/ListarPerfil.vue?vue&type=template&id=d8fa1152&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/perfil/ListarPerfil.vue?vue&type=template&id=d8fa1152& ***!
  \**************************************************************************************************************************************************************************************************************************/
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
  return _c("main", { staticClass: "main" }, [
    _vm._m(0),
    _vm._v(" "),
    _c("div", { staticClass: "container-fluid" }, [
      _c("div", { staticClass: "card" }, [
        _vm._m(1),
        _vm._v(" "),
        _c("div", { staticClass: "card-body" }, [
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
                _c("div", {
                  staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12"
                }),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                  [
                    _c("div", { staticClass: "form-group pull-right" }, [
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
                                value: _vm.editable._tipo,
                                expression: "editable._tipo"
                              }
                            ],
                            staticClass: "custom-control-input",
                            attrs: { type: "checkbox", id: "customSwitch3" },
                            domProps: {
                              checked: Array.isArray(_vm.editable._tipo)
                                ? _vm._i(_vm.editable._tipo, null) > -1
                                : _vm.editable._tipo
                            },
                            on: {
                              change: [
                                function($event) {
                                  var $$a = _vm.editable._tipo,
                                    $$el = $event.target,
                                    $$c = $$el.checked ? true : false
                                  if (Array.isArray($$a)) {
                                    var $$v = null,
                                      $$i = _vm._i($$a, $$v)
                                    if ($$el.checked) {
                                      $$i < 0 &&
                                        _vm.$set(
                                          _vm.editable,
                                          "_tipo",
                                          $$a.concat([$$v])
                                        )
                                    } else {
                                      $$i > -1 &&
                                        _vm.$set(
                                          _vm.editable,
                                          "_tipo",
                                          $$a
                                            .slice(0, $$i)
                                            .concat($$a.slice($$i + 1))
                                        )
                                    }
                                  } else {
                                    _vm.$set(_vm.editable, "_tipo", $$c)
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
                            attrs: { for: "customSwitch3" },
                            domProps: { innerHTML: _vm._s(_vm.text._tipo) }
                          })
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
                    _c("div", { staticClass: "form-group" }, [
                      _vm._m(2),
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
                        attrs: { type: "text", placeholder: "Razon Social..." },
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
                      _vm._m(3),
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
                      _vm._m(4),
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
                            _vm.$set(_vm.editable, "ruc", $event.target.value)
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
                      _vm._m(5),
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
                        attrs: { type: "text", placeholder: "Direccion..." },
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
                      _vm._m(6),
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
                        attrs: { type: "text", placeholder: "Departamento..." },
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
                      _vm._m(7),
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
                        attrs: { type: "text", placeholder: "Provincia..." },
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
                      _vm._m(8),
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
                      _vm._m(9),
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
                        attrs: { type: "text", placeholder: "Cod. Pais..." },
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
                      _vm._m(10),
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
                      _vm._m(11),
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
                      _vm._m(12),
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
                        attrs: { type: "text", placeholder: "Usuario SOL..." },
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
                      _vm._m(13),
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
                        attrs: { type: "text", placeholder: "Clave SOL..." },
                        domProps: { value: _vm.editable.clave },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.editable, "clave", $event.target.value)
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
                      _vm._m(14),
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
                            _vm.$set(_vm.editable, "firma", $event.target.value)
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
                      _vm._m(15),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.editable.correo,
                            expression: "editable.correo"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: { type: "text", placeholder: "Correo..." },
                        domProps: { value: _vm.editable.correo },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.editable,
                              "correo",
                              $event.target.value
                            )
                          }
                        }
                      }),
                      _vm._v(" "),
                      _vm.errors.correo
                        ? _c("span", { staticClass: "text-error" }, [
                            _vm._v(_vm._s(_vm.errors.correo))
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
                      _vm._m(16),
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
                        staticClass: "col-lg-12 col-md-12 col-sm-12 col-xs-12"
                      },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(17),
                          _vm._v(" "),
                          _vm.editable.imagen
                            ? _c("img", {
                                staticClass: "form-control",
                                attrs: { src: "/images/" + _vm.editable.imagen }
                              })
                            : _vm._e()
                        ])
                      ]
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              _c("hr"),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", {
                  staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12"
                }),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                  [
                    _c("div", { staticClass: "form-group pull-right" }, [
                      _c(
                        "button",
                        {
                          staticClass: "btn btn-primary",
                          attrs: {
                            type: "button",
                            disabled: _vm.btn.actualizar
                          },
                          on: {
                            click: function($event) {
                              return _vm.actualizarPerfil()
                            }
                          }
                        },
                        [_vm._v("Guardar")]
                      )
                    ])
                  ]
                )
              ])
            ]
          )
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("ol", { staticClass: "breadcrumb" }, [
      _c("li", { staticClass: "breadcrumb-item" }, [_vm._v("Configuracion")]),
      _vm._v(" "),
      _c("li", { staticClass: "breadcrumb-item" }, [
        _c("a", { attrs: { href: "#" } }, [_vm._v("Perfil")])
      ]),
      _vm._v(" "),
      _c("li", { staticClass: "breadcrumb-item active" }, [_vm._v("Listado")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-header" }, [
      _c("i", { staticClass: "fa fa-align-justify" }),
      _vm._v(" Perfiles\n                ")
    ])
  },
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

/***/ "./resources/js/components/erp/perfil/ListarPerfil.vue":
/*!*************************************************************!*\
  !*** ./resources/js/components/erp/perfil/ListarPerfil.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ListarPerfil_vue_vue_type_template_id_d8fa1152___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ListarPerfil.vue?vue&type=template&id=d8fa1152& */ "./resources/js/components/erp/perfil/ListarPerfil.vue?vue&type=template&id=d8fa1152&");
/* harmony import */ var _ListarPerfil_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ListarPerfil.vue?vue&type=script&lang=js& */ "./resources/js/components/erp/perfil/ListarPerfil.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ListarPerfil_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ListarPerfil_vue_vue_type_template_id_d8fa1152___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ListarPerfil_vue_vue_type_template_id_d8fa1152___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/erp/perfil/ListarPerfil.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/erp/perfil/ListarPerfil.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/erp/perfil/ListarPerfil.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarPerfil_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarPerfil.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/perfil/ListarPerfil.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarPerfil_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/erp/perfil/ListarPerfil.vue?vue&type=template&id=d8fa1152&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/erp/perfil/ListarPerfil.vue?vue&type=template&id=d8fa1152& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarPerfil_vue_vue_type_template_id_d8fa1152___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarPerfil.vue?vue&type=template&id=d8fa1152& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/perfil/ListarPerfil.vue?vue&type=template&id=d8fa1152&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarPerfil_vue_vue_type_template_id_d8fa1152___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarPerfil_vue_vue_type_template_id_d8fa1152___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);