(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[65],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/persona_dni/ListarPersonaDni.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/persona_dni/ListarPersonaDni.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************/
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
var FormularioPersonaDni = function FormularioPersonaDni() {
  return __webpack_require__.e(/*! import() */ 45).then(__webpack_require__.bind(null, /*! @/components/erp/persona_dni/FormularioPersonaDni */ "./resources/js/components/erp/persona_dni/FormularioPersonaDni.vue"));
};

var VerPersonaDni = function VerPersonaDni() {
  return __webpack_require__.e(/*! import() */ 46).then(__webpack_require__.bind(null, /*! @/components/erp/persona_dni/VerPersonaDni */ "./resources/js/components/erp/persona_dni/VerPersonaDni.vue"));
};

var FormularioImportarPersonaDni = function FormularioImportarPersonaDni() {
  return __webpack_require__.e(/*! import() */ 44).then(__webpack_require__.bind(null, /*! @/components/erp/persona_dni/FormularioImportarPersonaDni */ "./resources/js/components/erp/persona_dni/FormularioImportarPersonaDni.vue"));
};

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    "v-formulario-persona-dni": FormularioPersonaDni,
    "v-ver-persona-dni": VerPersonaDni,
    "v-formulario-importar-persona-dni": FormularioImportarPersonaDni
  },
  data: function data() {
    return {
      nuevo: {},
      editable: {},
      ver_editable: {},
      editable_anulacion: {},
      importar_editable: {},
      show: {},
      var_config: {},
      arrayPersonaDni: [],
      pagination: {
        'total': 0,
        'current_page': 0,
        'per_page': 0,
        'last_page': 0,
        'from': 0,
        'to': 0
      },
      offset: 3,
      criterio: 'todos',
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
    this.listarPersonaDni(1, this.buscar, this.criterio);
  },
  methods: {
    listarPersonaDni: function listarPersonaDni(page, buscar, criterio) {
      var me = this;
      var url = '/persona_dni?page=' + page + '&buscar=' + buscar + '&criterio=' + criterio + '&per_page=' + this.per_page;
      axios.get(url).then(function (response) {
        var respuesta = response.data;
        me.arrayPersonaDni = respuesta.personas_dnis.data;
        me.pagination = respuesta.pagination;
        if (me.arrayPersonaDni.length == 0) me.show['arrayPersonaDni'] = true;else me.show['arrayPersonaDni'] = false;
      })["catch"](function (error) {
        console.log(error);
      });
    },
    cambiarPagina: function cambiarPagina(page, buscar, criterio) {
      var me = this; // Actualiza la pagina actual

      me.pagination.current_page = page; // Envia la peticion para visualizar la data de esta pagina

      me.listarPersonaDni(page, buscar, criterio);
    },
    desactivarPersonaDni: function desactivarPersonaDni(id) {
      var _this = this;

      swal({
        title: 'Esta seguro de desactivar este ingreso de vehiculo?',
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
          axios.put('/persona_dni/desactivar', {
            id: id
          }).then(function (response) {
            me.listarPersonaDni(1, '', 'nombre');
            swal('Desactivado', 'El registro ha sido desactivado con exito', 'success');
          })["catch"](function (error) {
            console.log(error);
          });
        } else if (
        /* Read more about handling dismissals below */
        result.dismiss === swal.DismissReason.cancel) {}
      });
    },
    activarPersonaDni: function activarPersonaDni(id) {
      var _this2 = this;

      swal({
        title: 'Esta seguro de activar este ingreso de vehiculo?',
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
          axios.put('/persona_dni/activar', {
            id: id
          }).then(function (response) {
            me.listarPersonaDni(1, '', 'nombre');
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
        title: 'Registrar Persona',
        tipo_accion: 'registrar'
      };
    },
    editar: function editar(vehiculo) {
      if (vehiculo.anulado) {
        swal('Error', 'El ingreso ha sido anulado por lo tanto no puede ser editado', 'warning');
        return;
      }

      this.editable = Object.assign({
        _estado: 'editando'
      }, vehiculo);
      this.var_config = {
        title: 'Actualizar Persona',
        tipo_accion: 'actualizar'
      };
    },
    ver: function ver(vehiculo) {
      this.ver_editable = Object.assign({
        _estado: 'viendo'
      }, vehiculo);
      this.var_config = {
        title: 'Ver Persona'
      };
    },
    importar: function importar() {
      this.importar_editable = {
        _estado: 'creando'
      };
      this.var_config = {
        title: 'Importar Persona',
        tipo_accion: 'importar'
      };
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/persona_dni/ListarPersonaDni.vue?vue&type=template&id=6249533c&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/persona_dni/ListarPersonaDni.vue?vue&type=template&id=6249533c& ***!
  \***********************************************************************************************************************************************************************************************************************************/
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
            _vm._v(" Personas\n                "),
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
            ),
            _vm._v(" "),
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
              [
                _c("i", { staticClass: "icon-plus" }),
                _vm._v(" Importar\n                ")
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
                      _c("option", { attrs: { value: "todos" } }, [
                        _vm._v("Todos")
                      ]),
                      _vm._v(" "),
                      _c("option", { attrs: { value: "apellidoPaterno" } }, [
                        _vm._v("Apellido Paterno")
                      ]),
                      _vm._v(" "),
                      _c("option", { attrs: { value: "apellidoMaterno" } }, [
                        _vm._v("Apellido Materno")
                      ]),
                      _vm._v(" "),
                      _c("option", { attrs: { value: "nombres" } }, [
                        _vm._v("Nombres")
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
                        return _vm.listarPersonaDni(1, _vm.buscar, _vm.criterio)
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
                          return _vm.listarPersonaDni(
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
                  _vm._m(1),
                  _vm._v(" "),
                  _c(
                    "tbody",
                    [
                      _vm.show.arrayPersonaDni
                        ? _c("tr", [
                            _c("th", {
                              staticClass: "text-center text-dark",
                              attrs: { colspan: "8" },
                              domProps: { textContent: _vm._s("Vacio") }
                            })
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm._l(_vm.arrayPersonaDni, function(persona_dni) {
                        return _c("tr", { key: persona_dni.id }, [
                          _c("td", [
                            _c("div", { staticClass: "btn-group" }, [
                              _vm._m(2, true),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "dropdown-menu",
                                  staticStyle: {
                                    "overflow-y": "auto",
                                    height: "150px"
                                  },
                                  attrs: { role: "menu" }
                                },
                                [
                                  _c(
                                    "a",
                                    {
                                      staticClass: "dropdown-item disabled",
                                      attrs: { href: "#", disabled: "" },
                                      on: {
                                        click: function($event) {
                                          return _vm.editar(persona_dni)
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
                                      _vm._v("   Editar")
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
                                          return _vm.ver(persona_dni)
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
                                  )
                                ]
                              )
                            ])
                          ]),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(persona_dni.nombres)
                            }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(persona_dni.apellidoPaterno)
                            }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(persona_dni.apellidoMaterno)
                            }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: { textContent: _vm._s(persona_dni.dni) }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(persona_dni.codVerifica)
                            }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(persona_dni.origen)
                            }
                          }),
                          _vm._v(" "),
                          _c("td", {
                            domProps: {
                              textContent: _vm._s(
                                persona_dni.created_at
                                  .substr(0, 10)
                                  .split("-")
                                  .reverse()
                                  .join("-")
                              )
                            }
                          }),
                          _vm._v(" "),
                          _vm._m(3, true)
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
        ? _c("v-formulario-persona-dni", {
            ref: "cmp_crear_persona_dni",
            attrs: { var_config: _vm.var_config },
            on: {
              cerrado: function($event) {
                return _vm.listarPersonaDni(1, "", "nombre")
              },
              guardado: function($event) {
                return _vm.listarPersonaDni(1, "", "nombre")
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
        ? _c("v-formulario-persona-dni", {
            ref: "cmp_crear_persona_dni",
            attrs: { var_config: _vm.var_config },
            on: {
              guardado: function($event) {
                return _vm.listarPersonaDni(1, "", "nombre")
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
        ? _c("v-ver-persona-dni", {
            ref: "cmp_ver_persona_dni",
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
      _vm.importar_editable._estado == "creando"
        ? _c("v-formulario-importar-persona-dni", {
            ref: "cmp_importar_persona_dni",
            attrs: { var_config: _vm.var_config },
            on: {
              guardado: function($event) {
                return _vm.listarPersonaDni(1, "", "nombre")
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
      _c("li", { staticClass: "breadcrumb-item" }, [
        _c("a", { attrs: { href: "#" } }, [_vm._v("Personas")])
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
        _c("th"),
        _vm._v(" "),
        _c("th", [_vm._v("Nombres")]),
        _vm._v(" "),
        _c("th", [_vm._v("Apellido Paterno")]),
        _vm._v(" "),
        _c("th", [_vm._v("Apellido Materno")]),
        _vm._v(" "),
        _c("th", [_vm._v("Dni")]),
        _vm._v(" "),
        _c("th", [_vm._v("Cod. Verifica")]),
        _vm._v(" "),
        _c("th", [_vm._v("Origen")]),
        _vm._v(" "),
        _c("th", [_vm._v("Fecha de Creacion")]),
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
        staticStyle: { width: "30px", height: "30px" },
        attrs: { src: "images/options.svg" }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("td", [
      _c("span", { staticClass: "badge badge-success" }, [_vm._v("Activo")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/erp/persona_dni/ListarPersonaDni.vue":
/*!**********************************************************************!*\
  !*** ./resources/js/components/erp/persona_dni/ListarPersonaDni.vue ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ListarPersonaDni_vue_vue_type_template_id_6249533c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ListarPersonaDni.vue?vue&type=template&id=6249533c& */ "./resources/js/components/erp/persona_dni/ListarPersonaDni.vue?vue&type=template&id=6249533c&");
/* harmony import */ var _ListarPersonaDni_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ListarPersonaDni.vue?vue&type=script&lang=js& */ "./resources/js/components/erp/persona_dni/ListarPersonaDni.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ListarPersonaDni_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ListarPersonaDni_vue_vue_type_template_id_6249533c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ListarPersonaDni_vue_vue_type_template_id_6249533c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/erp/persona_dni/ListarPersonaDni.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/erp/persona_dni/ListarPersonaDni.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/components/erp/persona_dni/ListarPersonaDni.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarPersonaDni_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarPersonaDni.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/persona_dni/ListarPersonaDni.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarPersonaDni_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/erp/persona_dni/ListarPersonaDni.vue?vue&type=template&id=6249533c&":
/*!*****************************************************************************************************!*\
  !*** ./resources/js/components/erp/persona_dni/ListarPersonaDni.vue?vue&type=template&id=6249533c& ***!
  \*****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarPersonaDni_vue_vue_type_template_id_6249533c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListarPersonaDni.vue?vue&type=template&id=6249533c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/persona_dni/ListarPersonaDni.vue?vue&type=template&id=6249533c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarPersonaDni_vue_vue_type_template_id_6249533c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListarPersonaDni_vue_vue_type_template_id_6249533c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);