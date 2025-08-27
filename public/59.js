(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[59],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************/
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
      editable: Object.assign({}, this.value),
      num_documento: this.value,
      lock: {},
      errors: {},
      show: {},
      text: {},
      btn: {},
      array_convocatorias: []
    };
  },
  mounted: function mounted() {
    // if (this.value) {
    //   console.log("buscar");
    //   this.buscar(this.value);
    // }
    // this.buscar();
    var me = this;
    me.listarConvocatoriasEstudiante();
    me.$forceUpdate();
  },
  methods: {
    listarConvocatoriasEstudiante: function listarConvocatoriasEstudiante() {
      var me = this;
      var url = '/matricula_estudiante/busqueda/convocatorias';
      axios.get(url).then(function (response) {
        // console.log(response.data)
        me.array_convocatorias = response.data;
        me.$forceUpdate();
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
    },
    "editable._usar_foto_anterior": function editable_usar_foto_anterior(newvalue, oldvalue) {
      if (newvalue) {
        this.lock._new_document = true;
      } else {
        this.lock._new_document = false;
      }

      this.$forceUpdate();
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=style&index=0&id=59ad74c1&scoped=true&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=style&index=0&id=59ad74c1&scoped=true&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.hide-options[data-v-59ad74c1] {\r\n  display: none;\r\n  overflow: hidden;\r\n  transition: max-height 0.2s ease-out;\n}\n.show-options[data-v-59ad74c1] {\r\n  display: flex;\r\n  /* padding: 0 18px; */\r\n  background-color: white;\r\n  /* max-height: 0; */\r\n  overflow: hidden;\r\n  margin: -10px 0 0 -10px;\r\n  transition: max-height 0.2s ease-out;\n}\n.text-error[data-v-59ad74c1]{\r\n    color: red !important;\r\n    font-weight: bold;\n}\n.cropper-container[data-v-59ad74c1] {\r\n  width: 350px;   /* Ajusta el tamaño del contenedor */\r\n  height: 500px;  /* Ajusta la altura del recorte */\r\n  overflow: hidden;\r\n  border: 1px solid #ddd;\n}\n.cropper-image[data-v-59ad74c1] {\r\n  max-width: 100%;\r\n  max-height: 100%;\r\n  display: block;\n}\r\n\r\n\r\n/*.cr-boundary::before,\r\n.cr-boundary::after {\r\n    content: \"\";\r\n    position: absolute;\r\n    width: 100%;\r\n    height: 1px;\r\n    background: rgba(255, 255, 255, 0.6);\r\n    border-top: 1px dashed white;\r\n}\r\n\r\n.cr-boundary::before {\r\n    top: 33.33%;\r\n}\r\n\r\n.cr-boundary::after {\r\n    top: 66.66%;\r\n}\r\n\r\n.cr-viewport::before,\r\n.cr-viewport::after {\r\n    content: \"\";\r\n    position: absolute;\r\n    height: 100%;\r\n    width: 1px;\r\n    background: rgba(255, 255, 255, 0.6);\r\n    border-left: 1px dashed white;\r\n}\r\n\r\n.cr-viewport::before {\r\n    left: 33.33%;\r\n}\r\n\r\n.cr-viewport::after {\r\n    left: 66.66%;\r\n}*/\r\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=style&index=0&id=59ad74c1&scoped=true&lang=css&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=style&index=0&id=59ad74c1&scoped=true&lang=css& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardEstudianteSinConvocatoria.vue?vue&type=style&index=0&id=59ad74c1&scoped=true&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=style&index=0&id=59ad74c1&scoped=true&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=template&id=59ad74c1&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=template&id=59ad74c1&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************************************************************/
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
    { staticClass: "col-lg-12 col-md-12 col-sm-12 col-xs-12" },
    _vm._l(_vm.array_convocatorias, function(convocatoria) {
      return _c("div", { key: convocatoria.id, staticClass: "row" }, [
        _c("div", { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" }, [
          _c("div", { staticClass: "form-group" }, [
            _vm._m(0, true),
            _c("br"),
            _vm._v(" "),
            _c("span", [_vm._v(_vm._s(convocatoria.nombre))])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" }, [
          _c("div", { staticClass: "form-group" }, [
            _vm._m(1, true),
            _c("br"),
            _vm._v(" "),
            _c("span", [_vm._v(_vm._s(convocatoria.fecha_registro))])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" }, [
          _c("div", { staticClass: "form-group" }, [
            _vm._m(2, true),
            _c("br"),
            _vm._v(" "),
            _c("span", [_vm._v(_vm._s(convocatoria.numero_recibo))])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" }, [
          _c("div", { staticClass: "form-group" }, [
            _vm._m(3, true),
            _c("br"),
            _vm._v(" "),
            _c("span", [_vm._v(_vm._s(convocatoria.fecha_expiracion))])
          ])
        ])
      ])
    }),
    0
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Convocatoria: ")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Fecha Registro: ")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("N° Recibo: ")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Fecha Expiración: ")])])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue":
/*!************************************************************************************!*\
  !*** ./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DashboardEstudianteSinConvocatoria_vue_vue_type_template_id_59ad74c1_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DashboardEstudianteSinConvocatoria.vue?vue&type=template&id=59ad74c1&scoped=true& */ "./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=template&id=59ad74c1&scoped=true&");
/* harmony import */ var _DashboardEstudianteSinConvocatoria_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DashboardEstudianteSinConvocatoria.vue?vue&type=script&lang=js& */ "./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _DashboardEstudianteSinConvocatoria_vue_vue_type_style_index_0_id_59ad74c1_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./DashboardEstudianteSinConvocatoria.vue?vue&type=style&index=0&id=59ad74c1&scoped=true&lang=css& */ "./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=style&index=0&id=59ad74c1&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _DashboardEstudianteSinConvocatoria_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DashboardEstudianteSinConvocatoria_vue_vue_type_template_id_59ad74c1_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DashboardEstudianteSinConvocatoria_vue_vue_type_template_id_59ad74c1_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "59ad74c1",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************!*\
  !*** ./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteSinConvocatoria_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardEstudianteSinConvocatoria.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteSinConvocatoria_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=style&index=0&id=59ad74c1&scoped=true&lang=css&":
/*!*********************************************************************************************************************************************!*\
  !*** ./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=style&index=0&id=59ad74c1&scoped=true&lang=css& ***!
  \*********************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteSinConvocatoria_vue_vue_type_style_index_0_id_59ad74c1_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardEstudianteSinConvocatoria.vue?vue&type=style&index=0&id=59ad74c1&scoped=true&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=style&index=0&id=59ad74c1&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteSinConvocatoria_vue_vue_type_style_index_0_id_59ad74c1_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteSinConvocatoria_vue_vue_type_style_index_0_id_59ad74c1_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteSinConvocatoria_vue_vue_type_style_index_0_id_59ad74c1_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteSinConvocatoria_vue_vue_type_style_index_0_id_59ad74c1_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=template&id=59ad74c1&scoped=true&":
/*!*******************************************************************************************************************************!*\
  !*** ./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=template&id=59ad74c1&scoped=true& ***!
  \*******************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteSinConvocatoria_vue_vue_type_template_id_59ad74c1_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardEstudianteSinConvocatoria.vue?vue&type=template&id=59ad74c1&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteSinConvocatoria.vue?vue&type=template&id=59ad74c1&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteSinConvocatoria_vue_vue_type_template_id_59ad74c1_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteSinConvocatoria_vue_vue_type_template_id_59ad74c1_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);