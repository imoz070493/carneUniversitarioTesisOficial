(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/MatriculadoBusqueda.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/MatriculadoBusqueda.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    value: {
      type: 0
    },
    disabled: {
      type: Boolean,
      "default": false
    },
    tipo_documento: {
      type: String,
      "default": 'ruc'
    }
  },
  data: function data() {
    return {
      num_documento: this.value
    };
  },
  mounted: function mounted() {// if (this.value) {
    //   console.log("buscar");
    //   this.buscar(this.value);
    // }
    // this.buscar();
  },
  methods: {
    buscar: function buscar() {
      var me = this;
      var url = '/matricula/busqueda?tp=' + this.tipo_documento + '&n=' + this.num_documento;
      console.log('numero_documento', this.num_documento);

      if (!this.num_documento) {
        alert('Ingrese el numero de documento');
        return;
      }

      if (this.tipo_documento == 'dni') {
        if (this.num_documento.length != 8) {
          alert('El DNI debe contener 8 caracteres');
          return;
        }
      } else if (this.tipo_documento == 'codigo') {
        if (this.num_documento.length != 10) {
          alert('El codigo debe contener 10 caracteres');
          return;
        }
      }

      me.$emit('setEsperando');
      axios.get(url).then(function (response) {
        // console.log(response.data)
        me.$emit('setBusqueda', response.data); // me.array_tipos_documentos = response.data;
      })["catch"](function (error) {
        console.log(error);
      });
    }
  },
  watch: {
    num_documento: function num_documento(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input', newvalue);
      }
    },
    value: function value(newvalue, oldvalue) {
      if (newvalue) {
        this.num_documento = newvalue;
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/MatriculadoBusqueda.vue?vue&type=template&id=1dc148be&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/MatriculadoBusqueda.vue?vue&type=template&id=1dc148be& ***!
  \**********************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "row" }, [
    _c(
      "div",
      {
        staticClass: "col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group mb-3"
      },
      [
        _c("input", {
          directives: [
            {
              name: "model",
              rawName: "v-model",
              value: _vm.num_documento,
              expression: "num_documento"
            }
          ],
          staticClass: "form-control rounded-0",
          attrs: { type: "text", placeholder: "N° Documento..." },
          domProps: { value: _vm.num_documento },
          on: {
            keyup: function($event) {
              if (
                !$event.type.indexOf("key") &&
                _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
              ) {
                return null
              }
              return _vm.buscar()
            },
            input: function($event) {
              if ($event.target.composing) {
                return
              }
              _vm.num_documento = $event.target.value
            }
          }
        }),
        _vm._v(" "),
        _c("span", { staticClass: "input-group-append" }, [
          _c(
            "button",
            {
              staticClass: "btn btn-info btn-flat",
              attrs: { type: "button" },
              on: {
                click: function($event) {
                  return _vm.buscar()
                }
              }
            },
            [_c("i", { staticClass: "fa fa-search" })]
          )
        ])
      ]
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/referencias/MatriculadoBusqueda.vue":
/*!*********************************************************************!*\
  !*** ./resources/js/components/referencias/MatriculadoBusqueda.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _MatriculadoBusqueda_vue_vue_type_template_id_1dc148be___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MatriculadoBusqueda.vue?vue&type=template&id=1dc148be& */ "./resources/js/components/referencias/MatriculadoBusqueda.vue?vue&type=template&id=1dc148be&");
/* harmony import */ var _MatriculadoBusqueda_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./MatriculadoBusqueda.vue?vue&type=script&lang=js& */ "./resources/js/components/referencias/MatriculadoBusqueda.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _MatriculadoBusqueda_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _MatriculadoBusqueda_vue_vue_type_template_id_1dc148be___WEBPACK_IMPORTED_MODULE_0__["render"],
  _MatriculadoBusqueda_vue_vue_type_template_id_1dc148be___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/referencias/MatriculadoBusqueda.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/referencias/MatriculadoBusqueda.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/referencias/MatriculadoBusqueda.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_MatriculadoBusqueda_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./MatriculadoBusqueda.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/MatriculadoBusqueda.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_MatriculadoBusqueda_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/referencias/MatriculadoBusqueda.vue?vue&type=template&id=1dc148be&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/referencias/MatriculadoBusqueda.vue?vue&type=template&id=1dc148be& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MatriculadoBusqueda_vue_vue_type_template_id_1dc148be___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./MatriculadoBusqueda.vue?vue&type=template&id=1dc148be& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/MatriculadoBusqueda.vue?vue&type=template&id=1dc148be&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MatriculadoBusqueda_vue_vue_type_template_id_1dc148be___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MatriculadoBusqueda_vue_vue_type_template_id_1dc148be___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);