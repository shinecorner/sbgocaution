webpackJsonp([75],{

/***/ 2281:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "hover-wrapper" },
    [
      _c("page-title-bar"),
      _vm._v(" "),
      _c(
        "v-container",
        { attrs: { "grid-list-xl": "", "pt-0": "" } },
        [
          _c(
            "v-layout",
            { attrs: { row: "", wrap: "" } },
            [
              _c(
                "app-card",
                { attrs: { colClasses: "xl12 lg12 md12 sm12 xs12" } },
                [
                  _c("div", { staticClass: "mb-4" }, [
                    _c("p", [
                      _vm._v("The "),
                      _c("code", [_vm._v("v-timeline")]),
                      _vm._v(
                        " is useful for stylistically displaying chronological information."
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-timeline",
                    _vm._l(4, function(n) {
                      return _c(
                        "v-timeline-item",
                        {
                          key: n,
                          attrs: { color: "red lighten-2", large: "" }
                        },
                        [
                          _c(
                            "span",
                            { attrs: { slot: "opposite" }, slot: "opposite" },
                            [_vm._v("Tus eu perfecto")]
                          ),
                          _vm._v(" "),
                          _c(
                            "v-card",
                            { staticClass: "elevation-2" },
                            [
                              _c("v-card-title", { staticClass: "headline" }, [
                                _vm._v("Lorem ipsum")
                              ]),
                              _vm._v(" "),
                              _c("v-card-text", [
                                _vm._v(
                                  "\n                           Lorem ipsum dolor sit amet, no nam oblique veritus. Commune scaevola imperdiet nec ut, sed euismod convenire principes at. Est et nobis iisque percipit, an vim zril disputando voluptatibus, vix an salutandi sententiae.\n                        "
                                )
                              ])
                            ],
                            1
                          )
                        ],
                        1
                      )
                    }),
                    1
                  )
                ],
                1
              )
            ],
            1
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-46f07a56", module.exports)
  }
}

/***/ }),

/***/ 243:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = null
/* template */
var __vue_template__ = __webpack_require__(2281)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/views/timelines/Usage.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-46f07a56", Component.options)
  } else {
    hotAPI.reload("data-v-46f07a56", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});