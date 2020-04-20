(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var modal_video__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! modal-video */ "./node_modules/modal-video/lib/index.js");
/* harmony import */ var modal_video__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(modal_video__WEBPACK_IMPORTED_MODULE_0__);
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
  name: 'main-header-play-trailer-icon',
  props: {
    videoId: {}
  },
  mounted: function mounted() {
    this.openVideo();
  },
  methods: {
    openVideo: function openVideo() {
      new modal_video__WEBPACK_IMPORTED_MODULE_0___default.a('.play', {
        channel: 'youtube'
      });
    }
  },
  computed: {
    getId: function getId() {
      var newval = null;

      if (this.videoId.match(/(\?|&)v=([^&#]+)/)) {
        newval = this.videoId.match(/(\?|&)v=([^&#]+)/);
        return newval.pop();
      } else if (this.videoId.match(/(\.be\/)+([^\/]+)/)) {
        newval = this.videoId.match(/(\.be\/)+([^\/]+)/);
        return newval.pop();
      } else if (this.videoId.match(/(\embed\/)+([^\/]+)/)) {
        newval = this.videoId.match(/(\embed\/)+([^\/]+)/);
        return newval.pop().replace('?rel=0', '');
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=style&index=0&lang=scss&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=style&index=0&lang=scss& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "@-webkit-keyframes modal-video {\nfrom {\n    opacity: 0;\n}\nto {\n    opacity: 1;\n}\n}\n@keyframes modal-video {\nfrom {\n    opacity: 0;\n}\nto {\n    opacity: 1;\n}\n}\n@-webkit-keyframes modal-video-inner {\nfrom {\n    transform: translate(0, 100px);\n}\nto {\n    transform: translate(0, 0);\n}\n}\n@keyframes modal-video-inner {\nfrom {\n    transform: translate(0, 100px);\n}\nto {\n    transform: translate(0, 0);\n}\n}\n.modal-video {\n  position: fixed;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n  background-color: rgba(0, 0, 0, 0.5);\n  z-index: 1000000;\n  cursor: pointer;\n  opacity: 1;\n  -webkit-animation-timing-function: ease-out;\n          animation-timing-function: ease-out;\n  -webkit-animation-duration: 0.3s;\n          animation-duration: 0.3s;\n  -webkit-animation-name: modal-video;\n          animation-name: modal-video;\n  transition: opacity 0.3s ease-out;\n}\n.modal-video-close {\n  opacity: 0;\n}\n.modal-video-close .modal-video-movie-wrap {\n  transform: translate(0, 100px);\n}\n.modal-video-body {\n  max-width: 940px;\n  width: 100%;\n  height: 100%;\n  margin: 0 auto;\n  display: table;\n}\n.modal-video-inner {\n  display: table-cell;\n  vertical-align: middle;\n  width: 100%;\n  height: 100%;\n}\n.modal-video-movie-wrap {\n  width: 100%;\n  height: 0;\n  position: relative;\n  padding-bottom: 56.25%;\n  background-color: #333;\n  -webkit-animation-timing-function: ease-out;\n          animation-timing-function: ease-out;\n  -webkit-animation-duration: 0.3s;\n          animation-duration: 0.3s;\n  -webkit-animation-name: modal-video-inner;\n          animation-name: modal-video-inner;\n  transform: translate(0, 0);\n  transition: transform 0.3s ease-out;\n}\n.modal-video-movie-wrap iframe {\n  position: absolute;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n}\n.modal-video-close-btn {\n  position: absolute;\n  z-index: 2;\n  top: -35px;\n  right: -35px;\n  display: inline-block;\n  width: 35px;\n  height: 35px;\n  overflow: hidden;\n  border: none;\n  background: transparent;\n}\n.modal-video-close-btn:before {\n  transform: rotate(45deg);\n}\n.modal-video-close-btn:after {\n  transform: rotate(-45deg);\n}\n.modal-video-close-btn:before, .modal-video-close-btn:after {\n  content: \"\";\n  position: absolute;\n  height: 2px;\n  width: 100%;\n  top: 50%;\n  left: 0;\n  margin-top: -1px;\n  background: #fff;\n  border-radius: 5px;\n  margin-top: -6px;\n}\n.circle {\n  stroke: #00BCD4;\n  stroke-dasharray: 650;\n  stroke-dashoffset: 650;\n  -webkit-transition: all 0.9s ease-in-out;\n  opacity: 0.6;\n  fill: rgba(0, 0, 0, 0.6);\n  fill-rule: nonzero;\n  z-index: 5;\n}\n.play {\n  -webkit-transition: all 0.9s ease;\n}\n.play svg {\n  height: 100px;\n  width: 100px;\n}\n.play .triangle {\n  -webkit-transition: all 0.7s ease-in-out;\n  stroke-dasharray: 240;\n  stroke-dashoffset: 480;\n  stroke: #fafafa;\n  transform: translateY(0);\n}\n.play:hover .triangle {\n  stroke-dashoffset: 0;\n  opacity: 1;\n  stroke: #00BCD4;\n  z-index: 10;\n}\n.play:hover .circle {\n  stroke-dashoffset: 0;\n  opacity: 1;\n}", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=style&index=0&lang=scss&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=style&index=0&lang=scss& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../node_modules/css-loader!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--8-2!../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../node_modules/vue-loader/lib??vue-loader-options!./MainHeaderPlayTrailerIcon.vue?vue&type=style&index=0&lang=scss& */ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=style&index=0&lang=scss&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=template&id=19260117&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=template&id=19260117& ***!
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
    "button",
    {
      staticClass: "play flex flex-col items-center",
      attrs: { "data-video-id": _vm.getId }
    },
    [
      _c(
        "svg",
        {
          attrs: {
            x: "0px",
            y: "0px",
            viewBox: "0 0 213.7 213.7",
            "enable-background": "new 0 0 213.7 213.7",
            "xml:space": "preserve"
          }
        },
        [
          _c("circle", {
            staticClass: "circle",
            attrs: {
              fill: "none",
              "stroke-width": "7",
              "stroke-linecap": "round",
              "stroke-linejoin": "round",
              "stroke-miterlimit": "10",
              cx: "106.8",
              cy: "106.8",
              r: "103.3"
            }
          }),
          _vm._v(" "),
          _c("polygon", {
            staticClass: "triangle",
            attrs: {
              fill: "none",
              "stroke-width": "7",
              "stroke-linecap": "round",
              "stroke-linejoin": "round",
              "stroke-miterlimit": "10",
              points: "73.5,62.5 148.5,105.8 73.5,149.1"
            }
          })
        ]
      ),
      _vm._v(" "),
      _c("h1", { staticClass: "text-white text-3xl font-semibold mt-4" }, [
        _vm._v("شاهد الفيديو الترويجي")
      ])
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/MainHeaderPlayTrailerIcon.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/MainHeaderPlayTrailerIcon.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _MainHeaderPlayTrailerIcon_vue_vue_type_template_id_19260117___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./MainHeaderPlayTrailerIcon.vue?vue&type=template&id=19260117& */ "./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=template&id=19260117&");
/* harmony import */ var _MainHeaderPlayTrailerIcon_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./MainHeaderPlayTrailerIcon.vue?vue&type=script&lang=js& */ "./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _MainHeaderPlayTrailerIcon_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./MainHeaderPlayTrailerIcon.vue?vue&type=style&index=0&lang=scss& */ "./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=style&index=0&lang=scss&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _MainHeaderPlayTrailerIcon_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _MainHeaderPlayTrailerIcon_vue_vue_type_template_id_19260117___WEBPACK_IMPORTED_MODULE_0__["render"],
  _MainHeaderPlayTrailerIcon_vue_vue_type_template_id_19260117___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/MainHeaderPlayTrailerIcon.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeaderPlayTrailerIcon_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./MainHeaderPlayTrailerIcon.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeaderPlayTrailerIcon_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=style&index=0&lang=scss&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=style&index=0&lang=scss& ***!
  \*************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeaderPlayTrailerIcon_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader!../../../node_modules/css-loader!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--8-2!../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../node_modules/vue-loader/lib??vue-loader-options!./MainHeaderPlayTrailerIcon.vue?vue&type=style&index=0&lang=scss& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=style&index=0&lang=scss&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeaderPlayTrailerIcon_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeaderPlayTrailerIcon_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeaderPlayTrailerIcon_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeaderPlayTrailerIcon_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeaderPlayTrailerIcon_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=template&id=19260117&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=template&id=19260117& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeaderPlayTrailerIcon_vue_vue_type_template_id_19260117___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./MainHeaderPlayTrailerIcon.vue?vue&type=template&id=19260117& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/MainHeaderPlayTrailerIcon.vue?vue&type=template&id=19260117&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeaderPlayTrailerIcon_vue_vue_type_template_id_19260117___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_MainHeaderPlayTrailerIcon_vue_vue_type_template_id_19260117___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);