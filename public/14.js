(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[14],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var cropperjs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! cropperjs */ "./node_modules/cropperjs/dist/cropper.js");
/* harmony import */ var cropperjs__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(cropperjs__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var cropperjs_dist_cropper_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! cropperjs/dist/cropper.css */ "./node_modules/cropperjs/dist/cropper.css");
/* harmony import */ var cropperjs_dist_cropper_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(cropperjs_dist_cropper_css__WEBPACK_IMPORTED_MODULE_1__);
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
        tipo_documento: 'codigo',
        credencial_validado: 'no_validado'
      }, this.value),
      errors: [],
      btn: {
        registrar: false,
        actualizar: false
      },
      lock: {},
      text: {},
      cropInstance: null,
      croppedImage: null,
      imagen_oficial_recortada: null,
      urlImage: "/storage/imagen_prueba.jpg"
    };
  },
  mounted: function mounted() {
    var me = this;
    this.initCropper();
    console.log(this.editable);
    this.$nextTick(function () {
      if (me.editable.new_document) me.cropperInstance.replace(me.editable.new_document);
    });

    if (!this.editable.id) {
      //Nuevo
      me.editable._foto_validado = false;
      me.text._foto_validado = "NO";
      me.editable._duplicado = false;
      me.text._duplicado = "NO";
      this.lock['escuela_profesional'] = true;
      this.lock['dni'] = true;
      this.lock['codigo_estudiante'] = true;
      this.lock['apellido_paterno'] = true;
      this.lock['apellido_materno'] = true;
      this.lock['nombres'] = true;
      this.lock['sexo'] = true;
    } else {//Editar
    }

    me.$forceUpdate();
  },
  methods: {
    registrarImagen: function registrarImagen() {
      var me = this;
      this.btn['registrar'] = true; // if(me.editable._foto_validado) me.editable.foto_validado = 1;
      // else me.editable.foto_validado = 0;
      // if(me.editable._duplicado) me.editable.duplicado = 1;
      // else me.editable.duplicado = 0;

      if (!this.imagen_oficial_recortada) {
        swal('Advertencia', 'Recorte la imagen', 'warning');
        this.btn['registrar'] = false;
        return;
      }

      me.$emit('guardado', this.imagen_oficial_recortada);
      me.cerrarModal();
      swal('Recortado', 'La imagen se ha recortado con exito', 'success'); // axios.post('/inscrito/registrar',this.editable).then(function (response){
      // })
      // .catch(error => {
      //     me.btn['registrar'] = false;
      //     if(error.request.status){
      //         if(error.request.status == 419){
      //             location.reload();
      //         }
      //     }
      //     if(error.request.response){
      //         let response = JSON.parse(error.request.response);
      //         console.log(response);
      //         me.errors = response.errors;
      //     }
      // });
    },
    actualizarArticulo: function actualizarArticulo() {
      var me = this;
      this.btn['actualizar'] = true;
      axios.put('/inscrito/actualizar', this.editable).then(function (response) {
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
      var imgtag = document.getElementById("image");
      fileReader.readAsDataURL(e.target.files[0]);

      fileReader.onload = function (e) {
        _this.editable.name_document = propiedades.name;
        _this.editable.new_document = e.target.result;
        imgtag.src = e.target.result;
      }; // reader.onload = function(event) {
      //     imgtag.src = event.target.result;
      // };

    },
    setEsperando: function setEsperando() {
      this.btn['registrar'] = true;
    },
    setBusqueda: function setBusqueda(e) {
      console.log('setBusqueda', e);
      this.btn['registrar'] = false;

      if (_typeof(e) === 'object') {
        if (e.escuela_profesional) this.editable.escuela_profesional = e.escuela_profesional;
        if (e.numero_documento) this.editable.dni = e.numero_documento;
        if (e.codigo_estudiante) this.editable.codigo_estudiante = e.codigo_estudiante;
        if (e.apellido_paterno) this.editable.apellido_paterno = e.apellido_paterno;
        if (e.apellido_materno) this.editable.apellido_materno = e.apellido_materno;
        if (e.nombres) this.editable.nombres = e.nombres;
        if (e.sexo) this.editable.sexo = e.sexo;
        if (e.estudiante_id) this.editable.estudiante_id = e.estudiante_id;
      } else {
        alert("El alumno no ha sido matriculado. Puede volver a realizar la busqueda");
      }

      this.$forceUpdate();
    },
    changeTipo: function changeTipo(e) {
      if (e.target.checked) this.text._foto_validado = 'SI';else this.text._foto_validado = 'NO';
      this.$forceUpdate();
    },
    changeDuplicado: function changeDuplicado(e) {
      if (e.target.checked) this.text._foto_duplicado = 'SI';else this.text._foto_duplicado = 'NO';
      this.$forceUpdate();
    },
    initCropper: function initCropper() {
      this.cropperInstance = new cropperjs__WEBPACK_IMPORTED_MODULE_0___default.a(this.$refs.image, {
        aspectRatio: 5 / 6,
        // Change this for different aspect ratios
        viewMode: 2,
        // Ensure the image stays within the crop box
        guides: true,
        // Show guide lines
        autoCropArea: 0.9,
        // Crop the entire image by default
        movable: false,
        // Allow moving the image
        zoomable: true,
        // Enable zoom
        rotatable: true,
        // Allow rotation
        scalable: true // Allow scaling

      });
    },
    cropImage: function cropImage() {
      var me = this;

      if (this.cropperInstance) {
        var croppedCanvas = this.cropperInstance.getCroppedCanvas();
        this.croppedImage = croppedCanvas.toDataURL("image/png"); // Convert to base64
        // Base64 de ejemplo (pon tu base64 real aquí)

        var base64 = this.croppedImage; // ← aquí va tu base64 original
        // Llamar a la función

        this.resizeBase64Img(base64, 240, 288, function (resizedBase64) {
          document.getElementById('output').src = resizedBase64; // console.log('Base64 redimensionado:', resizedBase64);

          me.imagen_oficial_recortada = resizedBase64;
        });
      }
    },
    resizeBase64Img: function resizeBase64Img(base64, maxWidth, maxHeight, callback) {
      var img = new Image();

      img.onload = function () {
        var width = img.width;
        var height = img.height; // Mantener proporción

        if (width > height) {
          if (width > maxWidth) {
            height = Math.round(height * (maxWidth / width));
            width = maxWidth;
          }
        } else {
          if (height > maxHeight) {
            console.log(width + " " + maxHeight + " " + height);
            width = Math.round(width * (maxHeight / height));
            height = maxHeight;
          }
        } // Redimensionar en el canvas


        var canvas = document.getElementById('canvas');
        var ctx = canvas.getContext('2d');
        canvas.width = width;
        canvas.height = height;
        ctx.drawImage(img, 0, 0, width, height); // Obtener el nuevo base64

        var resizedBase64 = canvas.toDataURL('image/jpeg', 1);
        callback(resizedBase64);
      };

      img.src = base64;
    },
    destroyCropper: function destroyCropper() {
      if (this.cropperInstance) {
        this.cropperInstance.destroy();
        this.cropperInstance = null;
      }
    },
    beforeDestroy: function beforeDestroy() {
      this.destroyCropper();
    }
  },
  watch: {// "editable.new_document": function(newvalue, oldvalue) {
    //     if (newvalue) {console.log("Ingresando al value")
    //         // this.obtenerIngresosSalidas();
    //         // this.obtenerVentasUtilidades();
    //     }
    //     this.$forceUpdate();
    // },
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.modal-content{\n    width: 100% !important;\n    position: absolute !important;\n}\n.mostrar{\n    display: list-item !important;\n    opacity: 1 !important;\n    position: absolute !important;\n    background-color: #3c29297a !important;\n}\n.div-error{\n    display: flex;\n    justify-content: center;\n}\n.text-error{\n    color: red !important;\n    font-weight: bold;\n}\n@media (max-height: 500px) {\n.modal-xl {\n        max-width: 1140px;}\n}\n.hide-container{\n    display: none;\n}\n.show-container{\n    display: flex;\n    width: calc(100% + 10px);\n    height: calc(100% - 66px);\n    /* border: 1px solid black; */\n    position: absolute;\n    z-index: 100;\n    margin: 66.8px 0 0 -1px;\n    background: rgba(162, 153, 153, .5);\n}\n.loader {\n    border: 10px solid #f3f3f3;\n    border-radius: 50%;\n    border-top: 10px solid #3498db;\n    width: 50px;\n    height: 50px;\n    -webkit-animation: spin 2s linear infinite; /* Safari */\n    animation: spin 2s linear infinite;\n    top: calc(50%);\n    left: 50%;\n    position: absolute;\n    margin: -25px 0 0 -25px;\n    z-index: 100;\n}\n\n/* Safari */\n@-webkit-keyframes spin {\n0% { -webkit-transform: rotate(0deg);\n}\n100% { -webkit-transform: rotate(360deg);\n}\n}\n@keyframes spin {\n0% { transform: rotate(0deg);\n}\n100% { transform: rotate(360deg);\n}\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioRecortarImagen.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=template&id=fe468fd0&":
/*!****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=template&id=fe468fd0& ***!
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
                      _vm._s(_vm.imagen_oficial_recortada) +
                      "\n                    "
                  ),
                  _c("div", { staticClass: "row" }, [
                    _c(
                      "div",
                      {
                        staticClass: "col-lg-12 col-md-12 col-sm-12 col-xs-12"
                      },
                      [
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            {
                              staticClass:
                                "col-lg-4 col-md-4 col-sm-4 col-xs-12"
                            },
                            [
                              _c("div", [
                                _c("h5", [_vm._v("Imagen Original:")]),
                                _vm._v(" "),
                                _c("img", {
                                  ref: "image",
                                  staticStyle: {},
                                  attrs: {
                                    width: "500",
                                    height: "400",
                                    src: _vm.urlImage,
                                    alt: "Cropper Image"
                                  }
                                }),
                                _vm._v(" "),
                                _c(
                                  "button",
                                  {
                                    attrs: { type: "button" },
                                    on: { click: _vm.cropImage }
                                  },
                                  [_vm._v("Recortar Imagen")]
                                )
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "col-lg-4 col-md-4 col-sm-4 col-xs-12"
                            },
                            [
                              _vm.croppedImage
                                ? _c("div", [
                                    _c("h5", [_vm._v("Imagen Recortada:")]),
                                    _vm._v(" "),
                                    _c("img", {
                                      attrs: {
                                        width: "240",
                                        height: "288",
                                        src: _vm.croppedImage,
                                        alt: "Cropped Preview"
                                      }
                                    })
                                  ])
                                : _vm._e()
                            ]
                          ),
                          _vm._v(" "),
                          _vm._m(0)
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
                        return _vm.registrarImagen()
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
    return _c("div", { staticClass: "col-lg-4 col-md-4 col-sm-4 col-xs-12" }, [
      _c("h5", [_vm._v("Imagen Redimensionada:")]),
      _vm._v(" "),
      _c("canvas", {
        staticStyle: { display: "none" },
        attrs: { id: "canvas" }
      }),
      _vm._v(" "),
      _c("img", { attrs: { id: "output" } })
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue":
/*!***************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _FormularioRecortarImagen_vue_vue_type_template_id_fe468fd0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./FormularioRecortarImagen.vue?vue&type=template&id=fe468fd0& */ "./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=template&id=fe468fd0&");
/* harmony import */ var _FormularioRecortarImagen_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./FormularioRecortarImagen.vue?vue&type=script&lang=js& */ "./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _FormularioRecortarImagen_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./FormularioRecortarImagen.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _FormularioRecortarImagen_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _FormularioRecortarImagen_vue_vue_type_template_id_fe468fd0___WEBPACK_IMPORTED_MODULE_0__["render"],
  _FormularioRecortarImagen_vue_vue_type_template_id_fe468fd0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/erp/inscrito/FormularioRecortarImagen.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioRecortarImagen_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioRecortarImagen.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioRecortarImagen_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=style&index=0&lang=css&":
/*!************************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=style&index=0&lang=css& ***!
  \************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioRecortarImagen_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioRecortarImagen.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioRecortarImagen_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioRecortarImagen_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioRecortarImagen_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioRecortarImagen_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=template&id=fe468fd0&":
/*!**********************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=template&id=fe468fd0& ***!
  \**********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioRecortarImagen_vue_vue_type_template_id_fe468fd0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioRecortarImagen.vue?vue&type=template&id=fe468fd0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue?vue&type=template&id=fe468fd0&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioRecortarImagen_vue_vue_type_template_id_fe468fd0___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioRecortarImagen_vue_vue_type_template_id_fe468fd0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);