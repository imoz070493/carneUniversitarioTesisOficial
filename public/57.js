(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[57],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      btn: {
        registrar: false
      },
      showPopup: false
    };
  },
  mounted: function mounted() {
    // if (this.value) {
    //   console.log("buscar");
    //   this.buscar(this.value);
    // }
    // this.buscar();
    var me = this;
    me.show['_new_document'] = true;
    me.show['_new_document_voucher'] = true;
    me.text._usar_foto_anterior = "NO";
    me.editable.fecha_inicio_tramite = now();
    me.$forceUpdate();
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
    },
    registrarSolicitud: function registrarSolicitud() {
      var me = this;
      this.btn['registrar'] = true; // if(me.editable._foto_validado) me.editable.foto_validado = 1;
      // else me.editable.foto_validado = 0;
      // if(me.editable._duplicado) me.editable.duplicado = 1;
      // else me.editable.duplicado = 0;

      if (me.editable._usar_foto_anterior) me.editable.usar_foto_anterior = 1;else me.editable.usar_foto_anterior = 0;
      axios.post('/inscrito_estudiante/registrar', this.editable).then(function (response) {
        console.log("Registrado correctamente");
        me.$emit('guardado'); // me.cerrarModal();

        swal('Registrado', 'El tramite ha sido registrado con exito', 'success');
      })["catch"](function (error) {
        me.btn['registrar'] = false;

        if (error.request.status) {
          if (error.request.status == 419) {
            location.reload();
          }
        }

        if (error.request.response) {
          var response = JSON.parse(error.request.response);
          console.log(response);
          me.errors = response.errors;
        }
      });
    },
    changeTipoFotoAnterior: function changeTipoFotoAnterior(e) {
      if (e.target.checked) {
        this.text._usar_foto_anterior = 'SI';
      } else this.text._usar_foto_anterior = 'NO';

      this.$forceUpdate();
    },
    imageStudentChanged: function imageStudentChanged(e) {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var is_valid, propiedades, fileReader, imgtag;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return _this.validarImagen(e);

              case 2:
                is_valid = _context.sent;
                console.log("is_valid", is_valid);

                if (is_valid) {
                  _context.next = 6;
                  break;
                }

                return _context.abrupt("return");

              case 6:
                console.log("charging image");
                propiedades = e.target.files[0];
                fileReader = new FileReader();
                imgtag = document.getElementById("student_image");
                fileReader.readAsDataURL(e.target.files[0]);

                fileReader.onload = function (e) {
                  _this.editable.name_document = propiedades.name;
                  _this.editable.new_document = e.target.result;
                  imgtag.src = e.target.result; // this.loadImage(e.target.result);
                  // this.cropperInstance.replace(e.target.result);
                  // this.$nextTick(() => {
                  //     this.initCropper(); // Initialize Cropper after image loads
                  // });
                };

              case 12:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    imageVoucherChanged: function imageVoucherChanged(e) {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var is_valid, propiedades, fileReader, imgtag;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _context2.next = 2;
                return _this2.validarImagen(e);

              case 2:
                is_valid = _context2.sent;
                console.log("is_valid", is_valid);

                if (is_valid) {
                  _context2.next = 6;
                  break;
                }

                return _context2.abrupt("return");

              case 6:
                console.log("charging image");
                propiedades = e.target.files[0];
                fileReader = new FileReader();
                imgtag = document.getElementById("voucher_image");
                fileReader.readAsDataURL(e.target.files[0]);

                fileReader.onload = function (e) {
                  _this2.editable.name_document = propiedades.name;
                  _this2.editable.new_document_voucher = e.target.result;
                  imgtag.src = e.target.result; // this.loadImage(e.target.result);
                  // this.cropperInstance.replace(e.target.result);
                  // this.$nextTick(() => {
                  //     this.initCropper(); // Initialize Cropper after image loads
                  // });
                };

              case 12:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    validarImagen: function validarImagen(event) {
      var _this3 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        var file, validExtensions, fileExtension, maxSize, esValida;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                file = event.target.files[0]; // Obtener el archivo

                if (file) {
                  _context3.next = 3;
                  break;
                }

                return _context3.abrupt("return", false);

              case 3:
                // 1 Validar la extensión del archivo
                validExtensions = ["jpg", "jpeg", "png", "gif", "webp"];
                fileExtension = file.name.split('.').pop().toLowerCase();

                if (validExtensions.includes(fileExtension)) {
                  _context3.next = 9;
                  break;
                }

                alert("Formato de archivo no permitido");
                event.target.value = ""; // Resetear input

                return _context3.abrupt("return", false);

              case 9:
                if (file.type.startsWith("image/")) {
                  _context3.next = 13;
                  break;
                }

                alert("El archivo seleccionado no es una imagen válida");
                event.target.value = "";
                return _context3.abrupt("return", false);

              case 13:
                // 3 Validar el tamaño de la imagen (por ejemplo, máximo 5MB)
                maxSize = 5 * 1024 * 1024; // 5MB

                if (!(file.size > maxSize)) {
                  _context3.next = 18;
                  break;
                }

                alert("El archivo es demasiado grande. Máximo permitido: 5MB");
                event.target.value = "";
                return _context3.abrupt("return", false);

              case 18:
                _context3.next = 20;
                return _this3.cargaImagen(event);

              case 20:
                esValida = _context3.sent;
                console.log("Resultado de la validación:", esValida);
                return _context3.abrupt("return", esValida);

              case 23:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3);
      }))();
    },
    cargaImagen: function cargaImagen(event) {
      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                return _context4.abrupt("return", new Promise(function (resolve) {
                  var file = event.target.files[0];
                  var img = new Image();
                  img.src = URL.createObjectURL(file);

                  img.onload = function () {
                    console.log("Imagen válida. Dimensiones:", img.width, "x", img.height);
                    resolve(true); // Resolver con `true` si la imagen es válida
                  };

                  img.onerror = function () {
                    alert("El archivo no es una imagen válida o está corrupto"); // event.target.value = "";

                    resolve(false); // Resolver con `false` si la imagen es inválida
                  };
                }));

              case 1:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4);
      }))();
    },
    togglePopup: function togglePopup() {
      this.showPopup = !this.showPopup;
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

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=style&index=0&id=252a8a04&scoped=true&lang=css&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=style&index=0&id=252a8a04&scoped=true&lang=css& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.hide-options[data-v-252a8a04] {\r\n  display: none;\r\n  overflow: hidden;\r\n  transition: max-height 0.2s ease-out;\n}\n.show-options[data-v-252a8a04] {\r\n  display: flex;\r\n  /* padding: 0 18px; */\r\n  background-color: white;\r\n  /* max-height: 0; */\r\n  overflow: hidden;\r\n  margin: -10px 0 0 -10px;\r\n  transition: max-height 0.2s ease-out;\n}\n.text-error[data-v-252a8a04]{\r\n    color: red !important;\r\n    font-weight: bold;\n}\n.cropper-container[data-v-252a8a04] {\r\n  width: 350px;   /* Ajusta el tamaño del contenedor */\r\n  height: 500px;  /* Ajusta la altura del recorte */\r\n  overflow: hidden;\r\n  border: 1px solid #ddd;\n}\n.cropper-image[data-v-252a8a04] {\r\n  max-width: 100%;\r\n  max-height: 100%;\r\n  display: block;\n}\r\n\r\n/* CSS para el popup de la imagen */\n.popup[data-v-252a8a04] {\r\n  position: absolute;\r\n  background-color: white;\r\n  border: 1px solid #ccc;\r\n  padding: 10px;\r\n  z-index: 100;\r\n  width: 300px;\r\n  top: 30px;\r\n  left: 0;\r\n  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);\n}\n.close-btn[data-v-252a8a04] {\r\n  float: right;\r\n  background: none;\r\n  border: none;\r\n  font-size: 16px;\r\n  cursor: pointer;\n}\n.info-image[data-v-252a8a04] {\r\n  width: 100%;\r\n  height: auto;\r\n  margin-top: 5px;\n}\n.hide-container[data-v-252a8a04]{\r\n    display: none;\n}\n.show-container[data-v-252a8a04]{\r\n    display: flex;\r\n    width: calc(100% + 10px);\r\n    height: calc(100% - 66px);\r\n    /* border: 1px solid black; */\r\n    position: absolute;\r\n    z-index: 100;\r\n    margin: 66.8px 0 0 -1px;\r\n    background: rgba(162, 153, 153, .5);\n}\n.loader[data-v-252a8a04] {\r\n    border: 10px solid #f3f3f3;\r\n    border-radius: 50%;\r\n    border-top: 10px solid #3498db;\r\n    width: 50px;\r\n    height: 50px;\r\n    -webkit-animation: spin-data-v-252a8a04 2s linear infinite; /* Safari */\r\n    animation: spin-data-v-252a8a04 2s linear infinite;\r\n    top: calc(50%);\r\n    left: 50%;\r\n    position: absolute;\r\n    margin: -25px 0 0 -25px;\r\n    z-index: 100;\n}\r\n\r\n/* Safari */\n@-webkit-keyframes spin-data-v-252a8a04 {\n0% { -webkit-transform: rotate(0deg);\n}\n100% { -webkit-transform: rotate(360deg);\n}\n}\n@keyframes spin-data-v-252a8a04 {\n0% { transform: rotate(0deg);\n}\n100% { transform: rotate(360deg);\n}\n}\r\n\r\n/*.cr-boundary::before,\r\n.cr-boundary::after {\r\n    content: \"\";\r\n    position: absolute;\r\n    width: 100%;\r\n    height: 1px;\r\n    background: rgba(255, 255, 255, 0.6);\r\n    border-top: 1px dashed white;\r\n}\r\n\r\n.cr-boundary::before {\r\n    top: 33.33%;\r\n}\r\n\r\n.cr-boundary::after {\r\n    top: 66.66%;\r\n}\r\n\r\n.cr-viewport::before,\r\n.cr-viewport::after {\r\n    content: \"\";\r\n    position: absolute;\r\n    height: 100%;\r\n    width: 1px;\r\n    background: rgba(255, 255, 255, 0.6);\r\n    border-left: 1px dashed white;\r\n}\r\n\r\n.cr-viewport::before {\r\n    left: 33.33%;\r\n}\r\n\r\n.cr-viewport::after {\r\n    left: 66.66%;\r\n}*/\r\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=style&index=0&id=252a8a04&scoped=true&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=style&index=0&id=252a8a04&scoped=true&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=style&index=0&id=252a8a04&scoped=true&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=style&index=0&id=252a8a04&scoped=true&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=template&id=252a8a04&scoped=true&":
/*!*******************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=template&id=252a8a04&scoped=true& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************/
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
        class: {
          "show-container": _vm.btn.registrar,
          "hide-container": !_vm.btn.registrar
        }
      },
      [_c("div", { staticClass: "loader" })]
    ),
    _vm._v(" "),
    _c(
      "form",
      {
        staticClass: "form-horizontal",
        attrs: { action: "", method: "post", enctype: "multipart/form-data" }
      },
      [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(0),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c(
                  "div",
                  {
                    staticClass:
                      "col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group mb-3"
                  },
                  [
                    _c("span", { staticClass: "input-group-append" }, [
                      _c(
                        "button",
                        {
                          staticClass: "btn btn-info btn-flat",
                          attrs: { type: "button" },
                          on: {
                            click: function($event) {
                              return _vm.togglePopup()
                            }
                          }
                        },
                        [_c("i", { staticClass: "fa fa-info" })]
                      )
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.editable.numero_recibo,
                          expression: "editable.numero_recibo"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        type: "text",
                        placeholder: "Ejm: V001-4154",
                        disabled: _vm.lock.numero_recibo
                      },
                      domProps: { value: _vm.editable.numero_recibo },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.editable,
                            "numero_recibo",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ]
                )
              ]),
              _vm._v(" "),
              _vm.errors.numero_recibo
                ? _c("span", { staticClass: "text-error" }, [
                    _vm._v(_vm._s(_vm.errors.numero_recibo))
                  ])
                : _vm._e()
            ])
          ]),
          _vm._v(" "),
          _vm.showPopup
            ? _c("div", { staticClass: "popup" }, [
                _c(
                  "button",
                  { staticClass: "close-btn", on: { click: _vm.togglePopup } },
                  [_vm._v("✖")]
                ),
                _vm._v(" "),
                _c("img", {
                  staticClass: "info-image",
                  attrs: {
                    src: "/images/ubicacion_numero_recibo.jpg",
                    alt: "Guía de ubicación"
                  }
                })
              ])
            : _vm._e(),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.editable.correo_personal,
                    expression: "editable.correo_personal"
                  }
                ],
                staticClass: "form-control",
                attrs: {
                  type: "text",
                  placeholder: "correo@gmail.com...",
                  disabled: _vm.lock.correo_personal
                },
                domProps: { value: _vm.editable.correo_personal },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(
                      _vm.editable,
                      "correo_personal",
                      $event.target.value
                    )
                  }
                }
              }),
              _vm._v(" "),
              _vm.errors.correo_personal
                ? _c("span", { staticClass: "text-error" }, [
                    _vm._v(_vm._s(_vm.errors.correo_personal))
                  ])
                : _vm._e()
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(2),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.editable.telefono1,
                    expression: "editable.telefono1"
                  }
                ],
                staticClass: "form-control",
                attrs: {
                  type: "text",
                  placeholder: "Telefono...",
                  disabled: _vm.lock.telefono1
                },
                domProps: { value: _vm.editable.telefono1 },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.editable, "telefono1", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.errors.telefono1
                ? _c("span", { staticClass: "text-error" }, [
                    _vm._v(_vm._s(_vm.errors.telefono1))
                  ])
                : _vm._e()
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(3),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.editable.telefono2,
                    expression: "editable.telefono2"
                  }
                ],
                staticClass: "form-control",
                attrs: {
                  type: "text",
                  placeholder: "Telefono...",
                  disabled: _vm.lock.telefono2
                },
                domProps: { value: _vm.editable.telefono2 },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.editable, "telefono2", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _vm.errors.telefono2
                ? _c("span", { staticClass: "text-error" }, [
                    _vm._v(_vm._s(_vm.errors.telefono2))
                  ])
                : _vm._e()
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(4),
              _vm._v(" "),
              _vm.editable.estado_tramite == "no_inscrito"
                ? _c("label", { staticClass: "col-form-label" }, [
                    _c("span", { staticClass: "badge badge-secondary" }, [
                      _vm._v("Pendiente")
                    ])
                  ])
                : _vm._e()
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-3 col-md-3 col-sm-3 col-xs-12" }, [
            _c("div", { staticClass: "form-group" }, [
              _vm._m(5),
              _vm._v(" "),
              _vm.editable.tipo_tramite == "nuevo"
                ? _c("label", { staticClass: "col-form-label" }, [
                    _c("span", { staticClass: "badge badge-secondary" }, [
                      _vm._v("Nuevo")
                    ])
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.editable.tipo_tramite == "duplicado"
                ? _c("label", { staticClass: "col-form-label" }, [
                    _c("span", { staticClass: "badge badge-success" }, [
                      _vm._v("Duplicado")
                    ])
                  ])
                : _vm._e()
            ])
          ]),
          _vm._v(" "),
          _vm.editable.foto_anterior
            ? _c(
                "div",
                { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                [
                  _c("div", { staticClass: "form-group" }, [
                    _vm._m(6),
                    _vm._v(" "),
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
                              value: _vm.editable._usar_foto_anterior,
                              expression: "editable._usar_foto_anterior"
                            }
                          ],
                          staticClass: "custom-control-input",
                          attrs: {
                            type: "checkbox",
                            id: "customSwitch4",
                            disabled: _vm.lock._usar_foto_anterior
                          },
                          domProps: {
                            checked: Array.isArray(
                              _vm.editable._usar_foto_anterior
                            )
                              ? _vm._i(_vm.editable._usar_foto_anterior, null) >
                                -1
                              : _vm.editable._usar_foto_anterior
                          },
                          on: {
                            change: [
                              function($event) {
                                var $$a = _vm.editable._usar_foto_anterior,
                                  $$el = $event.target,
                                  $$c = $$el.checked ? true : false
                                if (Array.isArray($$a)) {
                                  var $$v = null,
                                    $$i = _vm._i($$a, $$v)
                                  if ($$el.checked) {
                                    $$i < 0 &&
                                      _vm.$set(
                                        _vm.editable,
                                        "_usar_foto_anterior",
                                        $$a.concat([$$v])
                                      )
                                  } else {
                                    $$i > -1 &&
                                      _vm.$set(
                                        _vm.editable,
                                        "_usar_foto_anterior",
                                        $$a
                                          .slice(0, $$i)
                                          .concat($$a.slice($$i + 1))
                                      )
                                  }
                                } else {
                                  _vm.$set(
                                    _vm.editable,
                                    "_usar_foto_anterior",
                                    $$c
                                  )
                                }
                              },
                              function($event) {
                                return _vm.changeTipoFotoAnterior($event)
                              }
                            ]
                          }
                        }),
                        _vm._v(" "),
                        _c("label", {
                          staticClass: "custom-control-label",
                          staticStyle: { width: "70px" },
                          attrs: { for: "customSwitch4" },
                          domProps: {
                            innerHTML: _vm._s(_vm.text._usar_foto_anterior)
                          }
                        })
                      ]
                    )
                  ])
                ]
              )
            : _vm._e()
        ]),
        _vm._v(" "),
        _c("hr"),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" }, [
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-lg-12 col-md-12 col-sm-12 col-xs-12" },
                [
                  _c("div", { staticClass: "form-group" }, [
                    _vm._m(7),
                    _vm._v(" "),
                    _vm.show._new_document
                      ? _c("input", {
                          staticClass: "form-control",
                          attrs: {
                            type: "file",
                            accept: ".jpeg, .jpg, .png",
                            disabled: _vm.lock._new_document
                          },
                          on: { change: _vm.imageStudentChanged }
                        })
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.errors.new_document
                      ? _c("span", { staticClass: "text-error" }, [
                          _vm._v(_vm._s(_vm.errors.new_document))
                        ])
                      : _vm._e()
                  ])
                ]
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-lg-12 col-md-12 col-sm-12 col-xs-12" },
                [
                  _c("div", { staticClass: "form-group" }, [
                    _vm.text._usar_foto_anterior == "NO"
                      ? _c("img", {
                          attrs: {
                            id: "student_image",
                            width: "240",
                            height: "288"
                          }
                        })
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.text._usar_foto_anterior == "SI"
                      ? _c("img", {
                          attrs: {
                            id: "image",
                            width: "240",
                            height: "288",
                            src: "/storage/" + _vm.editable.foto_anterior
                          }
                        })
                      : _vm._e()
                  ])
                ]
              )
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" }, [
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-lg-12 col-md-12 col-sm-12 col-xs-12" },
                [
                  _c("div", { staticClass: "form-group" }, [
                    _vm._m(8),
                    _vm._v(" "),
                    _vm.show._new_document_voucher
                      ? _c("input", {
                          staticClass: "form-control",
                          attrs: { type: "file", accept: ".jpeg, .jpg, .png" },
                          on: { change: _vm.imageVoucherChanged }
                        })
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.errors.new_document_voucher
                      ? _c("span", { staticClass: "text-error" }, [
                          _vm._v(_vm._s(_vm.errors.new_document_voucher))
                        ])
                      : _vm._e()
                  ])
                ]
              ),
              _vm._v(" "),
              _vm._m(9)
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" }),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" }, [
            _c("div", { staticClass: "form-group pull-right" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-primary",
                  attrs: { type: "button", disabled: _vm.btn.registrar },
                  on: {
                    click: function($event) {
                      return _vm.registrarSolicitud()
                    }
                  }
                },
                [_vm._v("Guardar")]
              )
            ])
          ])
        ])
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("N° Recibo: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Correo Personal: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Telefono 1: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Telefono 2: ")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Estado Trámite: ")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Tipo Solicitud: ")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _c("dt", [
        _vm._v("¿Desea utilizar la foto de la convocatoria anterior?: *")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Foto: ")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Voucher de Pago: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "col-lg-12 col-md-12 col-sm-12 col-xs-12" },
      [
        _c("div", { staticClass: "form-group" }, [
          _c("img", {
            attrs: { id: "voucher_image", width: "240", height: "288" }
          })
        ])
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_template_id_252a8a04_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=template&id=252a8a04&scoped=true& */ "./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=template&id=252a8a04&scoped=true&");
/* harmony import */ var _DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=script&lang=js& */ "./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_style_index_0_id_252a8a04_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=style&index=0&id=252a8a04&scoped=true&lang=css& */ "./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=style&index=0&id=252a8a04&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_template_id_252a8a04_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_template_id_252a8a04_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "252a8a04",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************!*\
  !*** ./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=style&index=0&id=252a8a04&scoped=true&lang=css&":
/*!***************************************************************************************************************************************************!*\
  !*** ./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=style&index=0&id=252a8a04&scoped=true&lang=css& ***!
  \***************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_style_index_0_id_252a8a04_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=style&index=0&id=252a8a04&scoped=true&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=style&index=0&id=252a8a04&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_style_index_0_id_252a8a04_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_style_index_0_id_252a8a04_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_style_index_0_id_252a8a04_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_style_index_0_id_252a8a04_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=template&id=252a8a04&scoped=true&":
/*!*************************************************************************************************************************************!*\
  !*** ./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=template&id=252a8a04&scoped=true& ***!
  \*************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_template_id_252a8a04_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=template&id=252a8a04&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/referencias/DashboardEstudianteMatriculadoNoInscrito.vue?vue&type=template&id=252a8a04&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_template_id_252a8a04_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardEstudianteMatriculadoNoInscrito_vue_vue_type_template_id_252a8a04_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);