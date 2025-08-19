(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[76],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/VehiculoSelect.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/VehiculoSelect.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************/
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
      array_vehiculos: [],
      seleccionado: this.value,
      loading: false,
      lugar: "",
      option: {},
      seleccion: 0,
      inputId: 0
    };
  },
  mounted: function mounted() {
    if (this.value) {
      console.log("buscar");
      this.buscar(this.value);
    }
  },
  methods: {
    buscar: function buscar(val) {
      var url = '/vehiculo/select?buscar=' + val,
          me = this;
      axios.get(url).then(function (response) {
        console.log(response.data);
        me.array_vehiculos = response.data;

        if (me.array_vehiculos.length == 1) {
          me.lugar = me.array_vehiculos[0];
        }
      })["catch"](function (error) {
        console.log(error);
      });
    },
    getDatosVehiculo: function getDatosVehiculo(val1) {
      if (val1) {
        this.loading = false;
        this.seleccionado = val1.id;
        this.option = val1;
        this.$emit("input", this.seleccionado);
        this.$emit("setArticulo", val1);
      } else {
        this.lugar = "";
        this.array_vehiculos = [];
        this.$emit("input");
      }
    },
    selectVehiculo: function selectVehiculo(search) {
      var me = this;
      if (!search) return;
      var url = '/vehiculo/select?buscar=' + search;
      axios.get(url).then(function (response) {
        me.array_vehiculos = response.data;
      })["catch"](function (error) {
        console.log(error);
      });
    },
    reiniciar: function reiniciar() {
      this.lugar = "";
      this.array_vehiculos = [];
      this.$forceUpdate();
    }
  },
  watch: {
    lugar: function lugar(newvalue, oldvalue) {
      console.log('lugar', newvalue);

      if (newvalue) {// this.$emit('input',newvalue);
      }
    },
    value: function value(newvalue, oldvalue) {
      console.log('value', newvalue);

      if (newvalue) {
        this.buscar(newvalue);
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/VehiculoSelect.vue?vue&type=template&id=53ed45fa&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/VehiculoSelect.vue?vue&type=template&id=53ed45fa& ***!
  \*****************************************************************************************************************************************************************************************************************************/
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
    [
      _c(
        "v-select",
        {
          attrs: {
            label: "data",
            options: _vm.array_vehiculos,
            placeholder: "Buscar Vehiculo...",
            clearable: true,
            disabled: _vm.disabled
          },
          on: { search: _vm.selectVehiculo, input: _vm.getDatosVehiculo },
          scopedSlots: _vm._u([
            {
              key: "option",
              fn: function(ref) {
                var data = ref.data
                var numero_placa = ref.numero_placa
                var marca = ref.marca
                return [
                  _c("em", [
                    _vm._v(
                      _vm._s(data) +
                        " " +
                        _vm._s(numero_placa) +
                        " " +
                        _vm._s(marca)
                    )
                  ])
                ]
              }
            },
            {
              key: "selected-option",
              fn: function(option) {
                return [_vm._v(_vm._s(option.numero_placa))]
              }
            }
          ]),
          model: {
            value: _vm.lugar,
            callback: function($$v) {
              _vm.lugar = $$v
            },
            expression: "lugar"
          }
        },
        [
          _c("span", { attrs: { slot: "no-options" }, slot: "no-options" }, [
            _vm._v("No se encontraron resultados.")
          ])
        ]
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/referencias/VehiculoSelect.vue":
/*!****************************************************************!*\
  !*** ./resources/js/components/referencias/VehiculoSelect.vue ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _VehiculoSelect_vue_vue_type_template_id_53ed45fa___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VehiculoSelect.vue?vue&type=template&id=53ed45fa& */ "./resources/js/components/referencias/VehiculoSelect.vue?vue&type=template&id=53ed45fa&");
/* harmony import */ var _VehiculoSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./VehiculoSelect.vue?vue&type=script&lang=js& */ "./resources/js/components/referencias/VehiculoSelect.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _VehiculoSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _VehiculoSelect_vue_vue_type_template_id_53ed45fa___WEBPACK_IMPORTED_MODULE_0__["render"],
  _VehiculoSelect_vue_vue_type_template_id_53ed45fa___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/referencias/VehiculoSelect.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/referencias/VehiculoSelect.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/referencias/VehiculoSelect.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VehiculoSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./VehiculoSelect.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/VehiculoSelect.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VehiculoSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/referencias/VehiculoSelect.vue?vue&type=template&id=53ed45fa&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/components/referencias/VehiculoSelect.vue?vue&type=template&id=53ed45fa& ***!
  \***********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VehiculoSelect_vue_vue_type_template_id_53ed45fa___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./VehiculoSelect.vue?vue&type=template&id=53ed45fa& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/VehiculoSelect.vue?vue&type=template&id=53ed45fa&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VehiculoSelect_vue_vue_type_template_id_53ed45fa___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VehiculoSelect_vue_vue_type_template_id_53ed45fa___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);