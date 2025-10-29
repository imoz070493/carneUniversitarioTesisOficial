(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[62],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/cliente/ListarCliente.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/cliente/ListarCliente.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
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
var FormularioCliente = function FormularioCliente() {
  return __webpack_require__.e(/*! import() */ 10).then(__webpack_require__.bind(null, /*! @/components/erp/cliente/FormularioCliente */ "./resources/js/components/erp/cliente/FormularioCliente.vue"));
};

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    "v-formulario-cliente": FormularioCliente
  },
  data: function data() {
    return {
      nuevo: {},
      editable: {},
      show: {},
      var_config: {},
      arrayCliente: [],
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
      per_page: 10
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
    this.listarCliente(1, this.buscar, this.criterio);
  },
  methods: {
    listarCliente: function listarCliente(page, buscar, criterio) {
      var me = this;
      var url = '/cliente?page=' + page + '&buscar=' + buscar + '&criterio=' + criterio + '&per_page=' + this.per_page;
      axios.get(url).then(function (response) {
        var respuesta = response.data;
        me.arrayCliente = respuesta.clientes.data;
        me.pagination = respuesta.pagination;
        if (me.arrayCliente.length == 0) me.show['arrayCliente'] = true;else me.show['arrayCliente'] = false;
      })["catch"](function (error) {
        console.log(error);
      });
    },
    cambiarPagina: function cambiarPagina(page, buscar, criterio) {
      var me = this; // Actualiza la pagina actual

      me.pagination.current_page = page; // Envia la peticion para visualizar la data de esta pagina

      me.listarCliente(page, buscar, criterio);
    },
    desactivarCliente: function desactivarCliente(id) {
      var _this = this;

      swal({
        title: 'Esta seguro de desactivar esta cliente?',
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
          axios.put('/cliente/desactivar', {
            id: id
          }).then(function (response) {
            me.listarCliente(1, '', 'nombre');
            swal('Desactivado', 'El registro ha sido desactivado con exito', 'success');
          })["catch"](function (error) {
            console.log(error);
          });
        } else if (
        /* Read more about handling dismissals below */
        result.dismiss === swal.DismissReason.cancel) {}
      });
    },
    activarCliente: function activarCliente(id) {
      var _this2 = this;

      swal({
        title: 'Esta seguro de activar esta cliente?',
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
          axios.put('/cliente/activar', {
            id: id
          }).then(function (response) {
            me.listarCliente(1, '', 'nombre');
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
        title: 'Registrar Cliente',
        tipo_accion: 'registrar'
      };
    },
    editar: function editar(cliente) {
      this.editable = Object.assign({
        _estado: 'editando'
      }, cliente);
      this.var_config = {
        title: 'Actualizar Cliente',
        tipo_accion: 'actualizar'
      };
    },
    toUpperCase: function toUpperCase(e) {
      return e.toUpperCase();
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/cliente/ListarCliente.vue?vue&type=template&id=f34cfc62&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/cliente/ListarCliente.vue?vue&type=template&id=f34cfc62& ***!
  \****************************************************************************************************************************************************************************************************************************/
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
            _c("i", { staticClass: "fa fa-align-justify" }),
            _vm._v(" Clientes\n                "),
            _c(
              "button",
              {
                staticClass: "btn btn-secondary",
                attrs: { type: "button" },
                on: {
                  click: function($event) {
                    return _vm.crear()
                  }
                }
              },
              [
                _c("i", { staticClass: "icon-plus" }),
                _vm._v(" Nuevo\n                ")
              ]
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-md-6" }, [
                _c("div", { staticClass: "input-group" }, [
                  _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.criterio,
                          expression: "criterio"
                        }
                      ],
                      staticClass: "form-control col-md-3",
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.criterio = $event.target.multiple
                            ? $$selectedVal
                            : $$selectedVal[0]
                        }
                      }
                    },
                    [
                      _c("option", { attrs: { value: "nombre" } }, [
                        _vm._v("Nombre")
                      ]),
                      _vm._v(" "),
                      _c("option", { attrs: { value: "descripcion" } }, [
                        _vm._v("Descripción")
                      ])
                    ]
                  ),
                  _vm._v(" "),
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
                    attrs: { type: "text", placeholder: "Texto a buscar" },
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
                        return _vm.listarCliente(1, _vm.buscar, _vm.criterio)
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
                          return _vm.listarCliente(1, _vm.buscar, _vm.criterio)
                        }
                      }
                    },
                    [
                      _c("i", { staticClass: "fa fa-search" }),
                      _vm._v(" Buscar")
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
                _c(
                  "table",
                  {
                    staticClass: "table table-bordered table-striped table-sm"
                  },
                  [
                    _vm._m(1),
                    _vm._v(" "),
                    _c(
                      "tbody",
                      [
                        _vm.show.arrayCliente
                          ? _c("tr", [
                              _c("th", {
                                staticClass: "text-center text-dark",
                                attrs: { colspan: "7" },
                                domProps: { textContent: _vm._s("Vacio") }
                              })
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        _vm._l(_vm.arrayCliente, function(cliente) {
                          return _c("tr", { key: cliente.id }, [
                            _c(
                              "td",
                              [
                                _c(
                                  "button",
                                  {
                                    staticClass: "btn btn-warning btn-sm",
                                    attrs: { type: "button" },
                                    on: {
                                      click: function($event) {
                                        return _vm.editar(cliente)
                                      }
                                    }
                                  },
                                  [_c("i", { staticClass: "icon-pencil" })]
                                ),
                                _vm._v("  \n                                "),
                                cliente.estado == "activo"
                                  ? [
                                      _c(
                                        "button",
                                        {
                                          staticClass: "btn btn-danger btn-sm",
                                          attrs: { type: "button" },
                                          on: {
                                            click: function($event) {
                                              return _vm.desactivarCliente(
                                                cliente.id
                                              )
                                            }
                                          }
                                        },
                                        [_c("i", { staticClass: "icon-trash" })]
                                      )
                                    ]
                                  : cliente.estado == "inactivo"
                                  ? [
                                      _c(
                                        "button",
                                        {
                                          staticClass: "btn btn-info btn-sm",
                                          attrs: { type: "button" },
                                          on: {
                                            click: function($event) {
                                              return _vm.activarCliente(
                                                cliente.id
                                              )
                                            }
                                          }
                                        },
                                        [_c("i", { staticClass: "icon-check" })]
                                      )
                                    ]
                                  : _vm._e()
                              ],
                              2
                            ),
                            _vm._v(" "),
                            cliente.tipo_documento == "ruc"
                              ? _c("td", {
                                  domProps: {
                                    textContent: _vm._s(cliente.razon_social)
                                  }
                                })
                              : cliente.tipo_documento == "dni"
                              ? _c("td", {
                                  domProps: {
                                    textContent: _vm._s(cliente.nombre)
                                  }
                                })
                              : _vm._e(),
                            _vm._v(" "),
                            _c("td", {
                              domProps: {
                                textContent: _vm._s(
                                  _vm.toUpperCase(cliente.tipo_documento)
                                )
                              }
                            }),
                            _vm._v(" "),
                            _c("td", {
                              domProps: {
                                textContent: _vm._s(cliente.num_documento)
                              }
                            }),
                            _vm._v(" "),
                            _c("td", {
                              domProps: {
                                textContent: _vm._s(cliente.telefono)
                              }
                            }),
                            _vm._v(" "),
                            _c("td", {
                              domProps: { textContent: _vm._s(cliente.email) }
                            }),
                            _vm._v(" "),
                            _c("td", [
                              cliente.estado == "activo"
                                ? _c("div", [
                                    _c(
                                      "span",
                                      { staticClass: "badge badge-success" },
                                      [_vm._v("Activo")]
                                    )
                                  ])
                                : cliente.estado == "inactivo"
                                ? _c("div", [
                                    _c(
                                      "span",
                                      { staticClass: "badge badge-danger" },
                                      [_vm._v("Desactivado")]
                                    )
                                  ])
                                : _vm._e()
                            ])
                          ])
                        })
                      ],
                      2
                    )
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
      ]),
      _vm._v(" "),
      _vm.nuevo._estado == "creando"
        ? _c("v-formulario-cliente", {
            ref: "cmp_crear_cliente",
            attrs: { var_config: _vm.var_config },
            on: {
              guardado: function($event) {
                return _vm.listarCliente(1, "", "nombre")
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
        ? _c("v-formulario-cliente", {
            ref: "cmp_crear_cliente",
            attrs: { var_config: _vm.var_config },
            on: {
              guardado: function($event) {
                return _vm.listarCliente(1, "", "nombre")
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
      _c("li", { staticClass: "breadcrumb-item" }, [_vm._v("Ventas")]),
      _vm._v(" "),
      _c("li", { staticClass: "breadcrumb-item" }, [
        _c("a", { attrs: { href: "#" } }, [_vm._v("Cliente")])
      ]),
      _vm._v(" "),
      _c("li", { staticClass: "breadcrumb-item active" }, [_vm._v("Listado")])
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
        _c("th", [_vm._v("Nombre o Razón Social")]),
        _vm._v(" "),
        _c("th", [_vm._v("Tipo Doc.")]),
        _vm._v(" "),
        _c("th", [_vm._v("N° Documento")]),
        _vm._v(" "),
        _c("th", [_vm._v("Telefono")]),
        _vm._v(" "),
        _c("th", [_vm._v("Email")]),
        _vm._v(" "),
        _c("th", [_vm._v("Estado")])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/erp/cliente/ListarCliente.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/erp/cliente/ListarCliente.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ListarCliente_vue_vue_type_template_id_f34cfc62___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ListarCliente.vue?vue&type=template&id=f34cfc62& */ "./resources/js/components/erp/cliente/ListarCliente.vue?vue&type=template&id=f34cfc62&");
/* harmony import */ var _ListarCliente_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ListarCliente.vue?vue&type=script&lang=js& */ "./resources/js/components/erp/cliente/ListarCliente.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ListarCliente_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ListarCliente_vue_vue_type_template_id_f34cfc62___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ListarCliente_vue_vue_type_template_id_f34cfc62___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/erp/cliente/ListarCliente.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/erp/cliente/ListarCliente.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/erp/cliente/ListarCliente.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarCliente_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarCliente.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/cliente/ListarCliente.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarCliente_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/erp/cliente/ListarCliente.vue?vue&type=template&id=f34cfc62&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/erp/cliente/ListarCliente.vue?vue&type=template&id=f34cfc62& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarCliente_vue_vue_type_template_id_f34cfc62___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarCliente.vue?vue&type=template&id=f34cfc62& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/cliente/ListarCliente.vue?vue&type=template&id=f34cfc62&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarCliente_vue_vue_type_template_id_f34cfc62___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarCliente_vue_vue_type_template_id_f34cfc62___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);