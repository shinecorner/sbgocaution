webpackJsonp([51],{

/***/ 2283:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  data: function data() {
    return {
      items: [{
        color: 'red lighten-2',
        icon: 'mdi-star'
      }, {
        color: 'purple darken-1',
        icon: 'mdi-book-variant'
      }, {
        color: 'green lighten-1',
        icon: 'mdi-airballoon'
      }, {
        color: 'indigo',
        icon: 'mdi-buffer'
      }]
    };
  }
});

/***/ }),

/***/ 2284:
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
                      _vm._v("Conditionally use icons within the "),
                      _c("code", [_vm._v("v-timeline-item")]),
                      _vm._v(" 's dot to provide additional context.")
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-timeline",
                    { attrs: { "align-top": "" } },
                    _vm._l(_vm.items, function(item, i) {
                      return _c(
                        "v-timeline-item",
                        {
                          key: i,
                          staticClass: "white--text ",
                          attrs: {
                            color: item.color,
                            icon: item.icon,
                            "fill-dot": ""
                          }
                        },
                        [
                          _c(
                            "v-card",
                            { attrs: { color: item.color } },
                            [
                              _c(
                                "v-card-title",
                                { staticClass: "title white--text" },
                                [_vm._v("Lorem Ipsum Dolor")]
                              ),
                              _vm._v(" "),
                              _c(
                                "v-card-text",
                                { staticClass: "white text--primary" },
                                [
                                  _c("p", [
                                    _vm._v(
                                      "Lorem ipsum dolor sit amet, no nam oblique veritus. Commune scaevola imperdiet nec ut, sed euismod convenire principes at. Est et nobis iisque percipit, an vim zril disputando voluptatibus, vix an salutandi sententiae."
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c(
                                    "v-btn",
                                    {
                                      staticClass: "mx-0",
                                      attrs: { color: item.color, outline: "" }
                                    },
                                    [
                                      _vm._v(
                                        "\n                              Button\n                           "
                                      )
                                    ]
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
    require("vue-hot-reload-api")      .rerender("data-v-20bf48df", module.exports)
  }
}

/***/ }),

/***/ 245:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(2283)
/* template */
var __vue_template__ = __webpack_require__(2284)
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
Component.options.__file = "resources/js/views/timelines/IconDots.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-20bf48df", Component.options)
  } else {
    hotAPI.reload("data-v-20bf48df", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});