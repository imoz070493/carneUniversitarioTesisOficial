(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[4],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/UnidadMedidaSelect.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/UnidadMedidaSelect.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    value: {
      type: 0
    },
    disabled: {
      type: Boolean,
      "default": false
    }
  },
  data: function data() {
    return {
      array_unidades_medidas: [],
      unidad_medida_id: this.value
    };
  },
  mounted: function mounted() {
    // if (this.value) {
    //   console.log("buscar");
    //   this.buscar(this.value);
    // }
    this.buscar();
  },
  methods: {
    buscar: function buscar() {
      var me = this;
      axios.get('/unidad_medida/select').then(function (response) {
        me.array_unidades_medidas = response.data;
      })["catch"](function (error) {
        console.log(error);
      });
    }
  },
  watch: {
    unidad_medida_id: function unidad_medida_id(newvalue, oldvalue) {
      if (newvalue) {
        this.$emit('input', newvalue);
      }
    },
    value: function value(newvalue, oldvalue) {
      if (newvalue) {
        this.unidad_medida_id = newvalue;
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/UnidadMedidaSelect.vue?vue&type=template&id=4185c1e6&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/UnidadMedidaSelect.vue?vue&type=template&id=4185c1e6& ***!
  \*********************************************************************************************************************************************************************************************************************************/
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
    "select",
    {
      directives: [
        {
          name: "model",
          rawName: "v-model",
          value: _vm.unidad_medida_id,
          expression: "unidad_medida_id"
        }
      ],
      staticClass: "form-control",
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
          _vm.unidad_medida_id = $event.target.multiple
            ? $$selectedVal
            : $$selectedVal[0]
        }
      }
    },
    _vm._l(_vm.array_unidades_medidas, function(unidad_medidad) {
      return _c("option", {
        key: unidad_medidad.id,
        domProps: {
          value: unidad_medidad.id,
          textContent: _vm._s(unidad_medidad.titulo)
        }
      })
    }),
    0
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/referencias/UnidadMedidaSelect.vue":
/*!********************************************************************!*\
  !*** ./resources/js/components/referencias/UnidadMedidaSelect.vue ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _UnidadMedidaSelect_vue_vue_type_template_id_4185c1e6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./UnidadMedidaSelect.vue?vue&type=template&id=4185c1e6& */ "./resources/js/components/referencias/UnidadMedidaSelect.vue?vue&type=template&id=4185c1e6&");
/* harmony import */ var _UnidadMedidaSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./UnidadMedidaSelect.vue?vue&type=script&lang=js& */ "./resources/js/components/referencias/UnidadMedidaSelect.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _UnidadMedidaSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _UnidadMedidaSelect_vue_vue_type_template_id_4185c1e6___WEBPACK_IMPORTED_MODULE_0__["render"],
  _UnidadMedidaSelect_vue_vue_type_template_id_4185c1e6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/referencias/UnidadMedidaSelect.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/referencias/UnidadMedidaSelect.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/components/referencias/UnidadMedidaSelect.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UnidadMedidaSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./UnidadMedidaSelect.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/UnidadMedidaSelect.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UnidadMedidaSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/referencias/UnidadMedidaSelect.vue?vue&type=template&id=4185c1e6&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/components/referencias/UnidadMedidaSelect.vue?vue&type=template&id=4185c1e6& ***!
  \***************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UnidadMedidaSelect_vue_vue_type_template_id_4185c1e6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./UnidadMedidaSelect.vue?vue&type=template&id=4185c1e6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/UnidadMedidaSelect.vue?vue&type=template&id=4185c1e6&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UnidadMedidaSelect_vue_vue_type_template_id_4185c1e6___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UnidadMedidaSelect_vue_vue_type_template_id_4185c1e6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);