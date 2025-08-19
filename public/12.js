(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[12],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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

var FormularioRecortarImagen = function FormularioRecortarImagen() {
  return __webpack_require__.e(/*! import() */ 14).then(__webpack_require__.bind(null, /*! @/components/erp/inscrito/FormularioRecortarImagen */ "./resources/js/components/erp/inscrito/FormularioRecortarImagen.vue"));
};

var FormularioValidacion = function FormularioValidacion() {
  return __webpack_require__.e(/*! import() */ 15).then(__webpack_require__.bind(null, /*! @/components/erp/inscrito/FormularioValidacion */ "./resources/js/components/erp/inscrito/FormularioValidacion.vue"));
};

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    "matriculado-busqueda": MatriculadoBusqueda,
    "v-formulario-recortar-imagen": FormularioRecortarImagen,
    "v-formulario-validacion": FormularioValidacion
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
        tipo_documento: 'codigo'
      }, this.value),
      errors: [],
      btn: {
        registrar: false,
        actualizar: false
      },
      lock: {},
      text: {},
      var_config1: {},
      recortar_nuevo: {},
      validacion_nuevo: {}
    };
  },
  mounted: function mounted() {
    var me = this;

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
    } else {
      //Editar
      // Duplicado
      if (me.editable.duplicado == '1') {
        me.editable._duplicado = true;
        me.text._duplicado = 'SI';
      }

      if (me.editable.duplicado == '0') {
        me.editable._duplicado = false;
        me.text._duplicado = 'NO';
      } // Foto Validado


      if (me.editable.foto_validado == '1') {
        me.lock['_foto_validado'] = true;
        me.lock['new_document'] = true;
        me.editable._foto_validado = true;
        me.text._foto_validado = 'SI';
      }

      if (me.editable.foto_validado == '0') {
        me.lock['_foto_validado'] = false;
        me.lock['new_document'] = false;
        me.editable._foto_validado = false;
        me.text._foto_validado = 'NO';
      }

      this.lock['_duplicado'] = true;
      this.lock['numero_documento'] = true;
      this.lock['escuela_profesional'] = true;
      this.lock['dni'] = true;
      this.lock['codigo_estudiante'] = true;
      this.lock['apellido_paterno'] = true;
      this.lock['apellido_materno'] = true;
      this.lock['nombres'] = true;
      this.lock['sexo'] = true;
    }

    this.editable.fecha_inicio_edicion = now();
    this.obtenerBase64ImagenVersion2(); // this.$nextTick(() => {
    //     this.obtenerBase64Imagen(); // Initialize Cropper after image loads
    // });

    this.$forceUpdate();
  },
  methods: {
    registrarArticulo: function registrarArticulo() {
      var me = this;
      this.btn['registrar'] = true;
      if (me.editable._foto_validado) me.editable.foto_validado = 1;else me.editable.foto_validado = 0;
      if (me.editable._duplicado) me.editable.duplicado = 1;else me.editable.duplicado = 0;
      axios.post('/inscrito/registrar', this.editable).then(function (response) {
        me.$emit('guardado');
        me.cerrarModal();
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
    actualizarArticulo: function actualizarArticulo() {
      var me = this;
      this.btn['actualizar'] = true;
      if (me.editable._foto_validado) me.editable.foto_validado = 1;else me.editable.foto_validado = 0; // Validando la fotografia adjuntada

      if (!me.editable.new_document) {
        me.errors.new_document = 'Adjunte la fotografia.';
        me.btn['actualizar'] = false;
        return;
      } else {
        delete me.errors.new_document;
      } // Validando la validacion verdadera


      if (!me.editable._foto_validado) {
        me.errors._foto_validado = 'Marque la opcion validar.';
        me.btn['actualizar'] = false;
        return;
      } else {
        delete me.errors.new_document;
      }

      this.editable.fecha_fin_edicion = now();
      axios.put('/inscrito/actualizar', this.editable).then(function (response) {
        me.$emit('guardado');
        me.cerrarModal();
        swal('Actualizado', 'El tramite ha sido actualizado con exito', 'success');
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
    obtenerBase64Imagen: function obtenerBase64Imagen() {
      var me = this;
      var img = document.getElementById('image_sin_validar'); // Esperamos a que la imagen cargue

      img.onload = function () {
        // Creamos un canvas
        var canvas = document.createElement('canvas'); // canvas.width = img.width;
        // canvas.height = img.height;

        canvas.width = img.naturalWidth;
        canvas.height = img.naturalHeight; // Dibujamos la imagen en el canvas

        var ctx = canvas.getContext('2d');
        ctx.drawImage(img, 0, 0); // Obtenemos el base64

        var base64String = canvas.toDataURL('image/jpeg'); // o 'image/png' según el formato

        console.log(base64String); // Aquí ves el resultado en la consola

        me.editable.new_document = base64String;
      };

      this.$forceUpdate();
    },
    obtenerBase64ImagenVersion2: function obtenerBase64ImagenVersion2() {
      var me = this;
      var _editable = {
        foto: this.editable.foto
      };
      axios({
        url: '/inscrito/obtener_foto',
        method: 'POST',
        responseType: 'blob',
        data: _editable
      }).then(function (response) {
        me.btn['registrar'] = false;

        if (response.data && response.data.size) {
          console.log(response.data); // Crea un Blob a partir de response.data

          var blob = new Blob([response.data], {
            type: 'image/jpeg'
          }); // Ahora crea un archivo con nombre

          var file = new File([blob], 'nombre_personalizado.jpg', {
            type: 'image/jpeg'
          }); // var fileURL = window.URL.createObjectURL(new Blob([response.data]));
          // Crear una URL temporal para mostrar la imagen

          var fileURL = URL.createObjectURL(file);
          document.getElementById('image_sin_validar').src = fileURL; // Ahora obtener el base64

          var reader = new FileReader();

          reader.onload = function (event) {
            var base64Data = event.target.result; // console.log('Base64:', base64Data);

            me.editable.new_document = base64Data;
          };

          reader.readAsDataURL(file); // swal(
          //     'Corregido',
          //     'Correccion de dpi exitosa!',
          //     'success'
          // )
        }

        me.$forceUpdate();
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
    recortar_imagen: function recortar_imagen() {
      var me = this;

      if (!me.editable.new_document) {
        swal('Advertencia', 'Debe adjuntar una imagen', 'warning');
        return;
      }

      this.recortar_nuevo = {
        _estado: 'creando',
        new_document: me.editable.new_document
      };
      this.var_config1 = {
        title: 'Recortar Imagen',
        tipo_accion: 'registrar'
      };
    },
    reemplazarImagen: function reemplazarImagen(e) {
      // console.log(e);
      var imgtag = document.getElementById("image");
      imgtag.src = e;
      this.editable.new_document = e;
      this.$forceUpdate();
    },
    cambiarDpi: function cambiarDpi() {
      var me = this; //   me.btn['registrar'] = true;

      if (!me.editable.new_document) {
        swal('Advertencia', 'Debe adjuntar una imagen', 'warning');
        return;
      }

      var _editable = {
        new_document: this.editable.new_document
      };
      axios({
        url: '/inscrito/cambiar_dpi',
        method: 'POST',
        responseType: 'blob',
        data: _editable
      }).then(function (response) {
        me.btn['registrar'] = false;

        if (response.data && response.data.size) {
          console.log(response.data); // Crea un Blob a partir de response.data

          var blob = new Blob([response.data], {
            type: 'image/jpeg'
          }); // Ahora crea un archivo con nombre

          var file = new File([blob], 'nombre_personalizado.jpg', {
            type: 'image/jpeg'
          }); // var fileURL = window.URL.createObjectURL(new Blob([response.data]));
          // Crear una URL temporal para mostrar la imagen

          var fileURL = URL.createObjectURL(file);
          document.getElementById('image').src = fileURL; // Ahora obtener el base64

          var reader = new FileReader();

          reader.onload = function (event) {
            var base64Data = event.target.result; // console.log('Base64:', base64Data);

            me.editable.new_document = base64Data;
          };

          reader.readAsDataURL(file);
          swal('Corregido', 'Correccion de dpi exitosa!', 'success');
        }

        me.$forceUpdate();
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
    validarImagenBackend: function validarImagenBackend() {
      var me = this;

      if (!me.editable.new_document) {
        swal('Advertencia', 'Debe adjuntar una imagen', 'warning');
        return;
      }

      this.validacion_nuevo = {
        _estado: 'creando',
        new_document: me.editable.new_document
      };
      this.var_config1 = {
        title: 'Resultado de Validacion',
        tipo_accion: 'registrar'
      };
    },
    cerrarModalFormularioValidacion: function cerrarModalFormularioValidacion(e) {
      if (e) {
        this.editable._foto_validado = true;
        this.text._foto_validado = "SI";
      } else {
        this.editable._foto_validado = false;
        this.text._foto_validado = "NO";
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.modal-content{\n    width: 100% !important;\n    position: absolute !important;\n}\n.mostrar{\n    display: list-item !important;\n    opacity: 1 !important;\n    position: absolute !important;\n    background-color: #3c29297a !important;\n}\n.div-error{\n    display: flex;\n    justify-content: center;\n}\n.text-error{\n    color: red !important;\n    font-weight: bold;\n}\n@media (max-height: 500px) {\n.modal-xl {\n        max-width: 1140px;}\n}\n.hide-container{\n    display: none;\n}\n.show-container{\n    display: flex;\n    width: calc(100% + 10px);\n    height: calc(100% - 66px);\n    /* border: 1px solid black; */\n    position: absolute;\n    z-index: 100;\n    margin: 66.8px 0 0 -1px;\n    background: rgba(162, 153, 153, .5);\n}\n.loader {\n    border: 10px solid #f3f3f3;\n    border-radius: 50%;\n    border-top: 10px solid #3498db;\n    width: 50px;\n    height: 50px;\n    -webkit-animation: spin 2s linear infinite; /* Safari */\n    animation: spin 2s linear infinite;\n    top: calc(50%);\n    left: 50%;\n    position: absolute;\n    margin: -25px 0 0 -25px;\n    z-index: 100;\n}\n\n/* Safari */\n@-webkit-keyframes spin {\n0% { -webkit-transform: rotate(0deg);\n}\n100% { -webkit-transform: rotate(360deg);\n}\n}\n@keyframes spin {\n0% { transform: rotate(0deg);\n}\n100% { transform: rotate(360deg);\n}\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioEditarInscrito.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=template&id=094b5bb5&":
/*!****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=template&id=094b5bb5& ***!
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
                      _vm._s(_vm.editable) +
                      "\n                    "
                  ),
                  _c("div", { staticClass: "row" }, [
                    _c(
                      "div",
                      { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                      [
                        _c("div", { staticClass: "form-group" }, [
                          _vm._m(0),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.numero_documento,
                                expression: "editable.numero_documento"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "N° Documento...",
                              disabled: _vm.lock.numero_documento
                            },
                            domProps: { value: _vm.editable.numero_documento },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "numero_documento",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.numero_documento
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.numero_documento))
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
                          _vm._m(1),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.escuela_profesional,
                                expression: "editable.escuela_profesional"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Escuela Profesional...",
                              disabled: _vm.lock.escuela_profesional
                            },
                            domProps: {
                              value: _vm.editable.escuela_profesional
                            },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "escuela_profesional",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.escuela_profesional
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.escuela_profesional))
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
                          _vm._m(2),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.codigo_estudiante,
                                expression: "editable.codigo_estudiante"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Codigo Estudiante...",
                              disabled: _vm.lock.codigo_estudiante
                            },
                            domProps: { value: _vm.editable.codigo_estudiante },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "codigo_estudiante",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.codigo_estudiante
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.codigo_estudiante))
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
                          _vm._m(3),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.dni,
                                expression: "editable.dni"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "N° DNI...",
                              disabled: _vm.lock.dni
                            },
                            domProps: { value: _vm.editable.dni },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "dni",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.dni
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.dni))
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
                                value: _vm.editable.nombres,
                                expression: "editable.nombres"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Nombres...",
                              disabled: _vm.lock.nombres
                            },
                            domProps: { value: _vm.editable.nombres },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "nombres",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.nombres
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.nombres))
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
                          _vm._m(5),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.apellido_paterno,
                                expression: "editable.apellido_paterno"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Apellido Paterno...",
                              disabled: _vm.lock.apellido_paterno
                            },
                            domProps: { value: _vm.editable.apellido_paterno },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "apellido_paterno",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.apellido_paterno
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.apellido_paterno))
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
                          _vm._m(6),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.editable.apellido_materno,
                                expression: "editable.apellido_materno"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              type: "text",
                              placeholder: "Apellido Materno...",
                              disabled: _vm.lock.apellido_materno
                            },
                            domProps: { value: _vm.editable.apellido_materno },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.editable,
                                  "apellido_materno",
                                  $event.target.value
                                )
                              }
                            }
                          }),
                          _vm._v(" "),
                          _vm.errors.apellido_materno
                            ? _c("span", { staticClass: "text-error" }, [
                                _vm._v(_vm._s(_vm.errors.apellido_materno))
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
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            {
                              staticClass:
                                "col-lg-6 col-md-6 col-sm-6 col-xs-12"
                            },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _vm._m(7),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.editable.sexo,
                                      expression: "editable.sexo"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: {
                                    type: "text",
                                    placeholder: "Sexo...",
                                    disabled: _vm.lock.sexo
                                  },
                                  domProps: { value: _vm.editable.sexo },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.editable,
                                        "sexo",
                                        $event.target.value
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _vm.errors.sexo
                                  ? _c("span", { staticClass: "text-error" }, [
                                      _vm._v(_vm._s(_vm.errors.sexo))
                                    ])
                                  : _vm._e()
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "col-lg-6 col-md-6 col-sm-6 col-xs-12"
                            },
                            [
                              _c(
                                "div",
                                { staticClass: "form-group pull-right" },
                                [
                                  _vm._m(8),
                                  _c("br"),
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
                                            value: _vm.editable._duplicado,
                                            expression: "editable._duplicado"
                                          }
                                        ],
                                        staticClass: "custom-control-input",
                                        attrs: {
                                          type: "checkbox",
                                          id: "customSwitch5",
                                          disabled: _vm.lock._duplicado
                                        },
                                        domProps: {
                                          checked: Array.isArray(
                                            _vm.editable._duplicado
                                          )
                                            ? _vm._i(
                                                _vm.editable._duplicado,
                                                null
                                              ) > -1
                                            : _vm.editable._duplicado
                                        },
                                        on: {
                                          change: [
                                            function($event) {
                                              var $$a = _vm.editable._duplicado,
                                                $$el = $event.target,
                                                $$c = $$el.checked
                                                  ? true
                                                  : false
                                              if (Array.isArray($$a)) {
                                                var $$v = null,
                                                  $$i = _vm._i($$a, $$v)
                                                if ($$el.checked) {
                                                  $$i < 0 &&
                                                    _vm.$set(
                                                      _vm.editable,
                                                      "_duplicado",
                                                      $$a.concat([$$v])
                                                    )
                                                } else {
                                                  $$i > -1 &&
                                                    _vm.$set(
                                                      _vm.editable,
                                                      "_duplicado",
                                                      $$a
                                                        .slice(0, $$i)
                                                        .concat(
                                                          $$a.slice($$i + 1)
                                                        )
                                                    )
                                                }
                                              } else {
                                                _vm.$set(
                                                  _vm.editable,
                                                  "_duplicado",
                                                  $$c
                                                )
                                              }
                                            },
                                            function($event) {
                                              return _vm.changeDuplicado($event)
                                            }
                                          ]
                                        }
                                      }),
                                      _vm._v(" "),
                                      _c("label", {
                                        staticClass: "custom-control-label",
                                        staticStyle: { width: "70px" },
                                        attrs: { for: "customSwitch5" },
                                        domProps: {
                                          innerHTML: _vm._s(_vm.text._duplicado)
                                        }
                                      })
                                    ]
                                  )
                                ]
                              )
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            {
                              staticClass:
                                "col-lg-6 col-md-6 col-sm-6 col-xs-12"
                            },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _vm._m(9),
                                _vm._v(" "),
                                _c("input", {
                                  staticClass: "form-control",
                                  attrs: {
                                    type: "file",
                                    accept: "jpeg, jpe, png",
                                    disabled: _vm.lock.new_document
                                  },
                                  on: { change: _vm.imageChanged }
                                }),
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
                            {
                              staticClass:
                                "col-lg-6 col-md-6 col-sm-6 col-xs-12"
                            },
                            [
                              _c(
                                "div",
                                { staticClass: "form-group pull-right" },
                                [
                                  _vm._m(10),
                                  _c("br"),
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
                                            value: _vm.editable._foto_validado,
                                            expression:
                                              "editable._foto_validado"
                                          }
                                        ],
                                        staticClass: "custom-control-input",
                                        attrs: {
                                          type: "checkbox",
                                          id: "customSwitch6",
                                          disabled: _vm.lock._foto_validado
                                        },
                                        domProps: {
                                          checked: Array.isArray(
                                            _vm.editable._foto_validado
                                          )
                                            ? _vm._i(
                                                _vm.editable._foto_validado,
                                                null
                                              ) > -1
                                            : _vm.editable._foto_validado
                                        },
                                        on: {
                                          change: [
                                            function($event) {
                                              var $$a =
                                                  _vm.editable._foto_validado,
                                                $$el = $event.target,
                                                $$c = $$el.checked
                                                  ? true
                                                  : false
                                              if (Array.isArray($$a)) {
                                                var $$v = null,
                                                  $$i = _vm._i($$a, $$v)
                                                if ($$el.checked) {
                                                  $$i < 0 &&
                                                    _vm.$set(
                                                      _vm.editable,
                                                      "_foto_validado",
                                                      $$a.concat([$$v])
                                                    )
                                                } else {
                                                  $$i > -1 &&
                                                    _vm.$set(
                                                      _vm.editable,
                                                      "_foto_validado",
                                                      $$a
                                                        .slice(0, $$i)
                                                        .concat(
                                                          $$a.slice($$i + 1)
                                                        )
                                                    )
                                                }
                                              } else {
                                                _vm.$set(
                                                  _vm.editable,
                                                  "_foto_validado",
                                                  $$c
                                                )
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
                                        attrs: { for: "customSwitch6" },
                                        domProps: {
                                          innerHTML: _vm._s(
                                            _vm.text._foto_validado
                                          )
                                        }
                                      }),
                                      _vm._v(" "),
                                      _vm.errors._foto_validado
                                        ? _c(
                                            "span",
                                            { staticClass: "text-error" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.errors._foto_validado
                                                )
                                              )
                                            ]
                                          )
                                        : _vm._e()
                                    ]
                                  )
                                ]
                              )
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            {
                              staticClass:
                                "col-lg-12 col-md-12 col-sm-12 col-xs-12"
                            },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _vm._m(11),
                                _vm._v(" "),
                                _c("textarea", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.editable.observacion,
                                      expression: "editable.observacion"
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: {
                                    type: "text",
                                    placeholder: "Observacion..."
                                  },
                                  domProps: { value: _vm.editable.observacion },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.editable,
                                        "observacion",
                                        $event.target.value
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _vm.errors.observacion
                                  ? _c("span", { staticClass: "text-error" }, [
                                      _vm._v(_vm._s(_vm.errors.observacion))
                                    ])
                                  : _vm._e()
                              ])
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12"
                          },
                          [
                            _c("div", { staticClass: "form-group" }, [
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
                                      return _vm.validarImagenBackend()
                                    }
                                  }
                                },
                                [_vm._v("Validar")]
                              ),
                              _vm._v(" "),
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
                                      return _vm.recortar_imagen()
                                    }
                                  }
                                },
                                [_vm._v("Recortar")]
                              ),
                              _vm._v(" "),
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
                                      return _vm.cambiarDpi()
                                    }
                                  }
                                },
                                [_vm._v("DPI")]
                              )
                            ])
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      { staticClass: "col-lg-6 col-md-6 col-sm-6 col-xs-12" },
                      [
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            {
                              staticClass:
                                "col-lg-12 col-md-12 col-sm-12 col-xs-12"
                            },
                            [
                              _c("div", { staticClass: "form-group" }, [
                                _c("img", {
                                  attrs: {
                                    id: "image",
                                    width: "240",
                                    height: "288",
                                    src:
                                      "/storage/" +
                                      _vm.editable.folder +
                                      "/1_validado/" +
                                      _vm.editable.foto
                                  }
                                }),
                                _vm._v(" "),
                                _c("img", {
                                  attrs: {
                                    id: "image_sin_validar",
                                    width: "240",
                                    height: "288",
                                    src:
                                      "/storage/" +
                                      _vm.editable.folder +
                                      "/2_sin_validar/" +
                                      _vm.editable.foto
                                  }
                                })
                              ])
                            ]
                          )
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
                        return _vm.registrarArticulo()
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
      ]),
      _vm._v(" "),
      _vm.recortar_nuevo._estado == "creando"
        ? _c("v-formulario-recortar-imagen", {
            ref: "cmp_recortar_imagen",
            attrs: { var_config: _vm.var_config1 },
            on: { guardado: _vm.reemplazarImagen },
            model: {
              value: _vm.recortar_nuevo,
              callback: function($$v) {
                _vm.recortar_nuevo = $$v
              },
              expression: "recortar_nuevo"
            }
          })
        : _vm._e(),
      _vm._v(" "),
      _vm.validacion_nuevo._estado == "creando"
        ? _c("v-formulario-validacion", {
            ref: "cmp_validacion_imagen",
            attrs: { var_config: _vm.var_config },
            on: {
              guardado: _vm.reemplazarImagen,
              cerrarModal: _vm.cerrarModalFormularioValidacion
            },
            model: {
              value: _vm.validacion_nuevo,
              callback: function($$v) {
                _vm.validacion_nuevo = $$v
              },
              expression: "validacion_nuevo"
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
    return _c("label", [_c("dt", [_vm._v("Codigo: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Escuela Profesional: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Codigo de Estudiante: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("DNI: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Nombres: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Apellido Paterno: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Apellido Materno: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Sexo: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("¿Duplicado?: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Imagen *:")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("¿Validado?: *")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [_c("dt", [_vm._v("Observacion:")])])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue":
/*!***************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _FormularioEditarInscrito_vue_vue_type_template_id_094b5bb5___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./FormularioEditarInscrito.vue?vue&type=template&id=094b5bb5& */ "./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=template&id=094b5bb5&");
/* harmony import */ var _FormularioEditarInscrito_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./FormularioEditarInscrito.vue?vue&type=script&lang=js& */ "./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _FormularioEditarInscrito_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./FormularioEditarInscrito.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _FormularioEditarInscrito_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _FormularioEditarInscrito_vue_vue_type_template_id_094b5bb5___WEBPACK_IMPORTED_MODULE_0__["render"],
  _FormularioEditarInscrito_vue_vue_type_template_id_094b5bb5___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/erp/inscrito/FormularioEditarInscrito.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioEditarInscrito_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioEditarInscrito.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioEditarInscrito_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=style&index=0&lang=css&":
/*!************************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=style&index=0&lang=css& ***!
  \************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioEditarInscrito_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioEditarInscrito.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioEditarInscrito_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioEditarInscrito_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioEditarInscrito_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioEditarInscrito_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=template&id=094b5bb5&":
/*!**********************************************************************************************************!*\
  !*** ./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=template&id=094b5bb5& ***!
  \**********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioEditarInscrito_vue_vue_type_template_id_094b5bb5___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./FormularioEditarInscrito.vue?vue&type=template&id=094b5bb5& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/erp/inscrito/FormularioEditarInscrito.vue?vue&type=template&id=094b5bb5&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioEditarInscrito_vue_vue_type_template_id_094b5bb5___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FormularioEditarInscrito_vue_vue_type_template_id_094b5bb5___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);