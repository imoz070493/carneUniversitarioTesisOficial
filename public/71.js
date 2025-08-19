(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[71],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/EstudianteSelect.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/EstudianteSelect.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************/
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
      array_estudiantes: [],
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
    buscar: function buscar(val) {// listarPersonaId(val).then(data => {
      //   this.array_estudiantes = data;
      //   if (data.length == 1) {
      //     this.seleccionado = data[0].id;
      //     this.lugar = data[0];
      //   }
      //   // loading(false)
      // });
    },
    getDatosEstudiante: function getDatosEstudiante(val1) {
      if (val1) {
        this.loading = false;
        this.seleccionado = val1.id;
        this.option = val1;
        this.$emit("input", this.seleccionado);
        this.$emit("setEstudiante", val1);
      } else {
        this.lugar = "";
        this.array_estudiantes = [];
        this.$emit("input");
      }
    },
    selectEstudiante: function selectEstudiante(search) {
      var me = this;
      if (!search) return;
      var url = '/estudiante/select?buscar=' + search;
      axios.get(url).then(function (response) {
        me.array_estudiantes = response.data;
      })["catch"](function (error) {
        console.log(error);
      });
    },
    reiniciar: function reiniciar() {
      this.lugar = "";
      this.array_estudiantes = [];
      this.$forceUpdate();
    }
  },
  watch: {
    /*
    input: function(newvalue, oldvalue) {
      connsole.log("limpiando");
      if (!newvalue) {
        this.lugar = null;
        this.seleccionado = {};
        this.$forceUpdate();
      }
    }
    */
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/EstudianteSelect.vue?vue&type=template&id=06a5dc32&":
/*!*******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/EstudianteSelect.vue?vue&type=template&id=06a5dc32& ***!
  \*******************************************************************************************************************************************************************************************************************************/
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
            options: _vm.array_estudiantes,
            placeholder: "Buscar Estudiante...",
            clearable: true,
            disabled: _vm.disabled
          },
          on: { search: _vm.selectEstudiante, input: _vm.getDatosEstudiante },
          scopedSlots: _vm._u([
            {
              key: "option",
              fn: function(ref) {
                var data = ref.data
                var codigo_estudiante = ref.codigo_estudiante
                var apellido_paterno = ref.apellido_paterno
                var apellido_materno = ref.apellido_materno
                var nombres = ref.nombres
                return [_c("em", [_vm._v(_vm._s(data))])]
              }
            },
            {
              key: "selected-option",
              fn: function(option) {
                return [_vm._v(_vm._s(option.data))]
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

/***/ "./resources/js/components/referencias/EstudianteSelect.vue":
/*!******************************************************************!*\
  !*** ./resources/js/components/referencias/EstudianteSelect.vue ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _EstudianteSelect_vue_vue_type_template_id_06a5dc32___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./EstudianteSelect.vue?vue&type=template&id=06a5dc32& */ "./resources/js/components/referencias/EstudianteSelect.vue?vue&type=template&id=06a5dc32&");
/* harmony import */ var _EstudianteSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./EstudianteSelect.vue?vue&type=script&lang=js& */ "./resources/js/components/referencias/EstudianteSelect.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _EstudianteSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _EstudianteSelect_vue_vue_type_template_id_06a5dc32___WEBPACK_IMPORTED_MODULE_0__["render"],
  _EstudianteSelect_vue_vue_type_template_id_06a5dc32___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/referencias/EstudianteSelect.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/referencias/EstudianteSelect.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/referencias/EstudianteSelect.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_EstudianteSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./EstudianteSelect.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/EstudianteSelect.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_EstudianteSelect_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/referencias/EstudianteSelect.vue?vue&type=template&id=06a5dc32&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/components/referencias/EstudianteSelect.vue?vue&type=template&id=06a5dc32& ***!
  \*************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_EstudianteSelect_vue_vue_type_template_id_06a5dc32___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./EstudianteSelect.vue?vue&type=template&id=06a5dc32& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/EstudianteSelect.vue?vue&type=template&id=06a5dc32&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_EstudianteSelect_vue_vue_type_template_id_06a5dc32___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_EstudianteSelect_vue_vue_type_template_id_06a5dc32___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);