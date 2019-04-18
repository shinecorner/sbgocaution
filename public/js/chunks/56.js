webpackJsonp([56],{

/***/ 2286:
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
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      years: [{
        color: 'cyan',
        year: '1960'
      }, {
        color: 'green',
        year: '1970'
      }, {
        color: 'pink',
        year: '1980'
      }, {
        color: 'amber',
        year: '1990'
      }, {
        color: 'orange',
        year: '2000'
      }]
    };
  }
});

/***/ }),

/***/ 2287:
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
                      _vm._v(
                        "The opposite slot provides an additional layer of customization within your timelines."
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-timeline",
                    _vm._l(_vm.years, function(year, i) {
                      return _c(
                        "v-timeline-item",
                        { key: i, attrs: { color: year.color, small: "" } },
                        [
                          _c("span", {
                            class:
                              "headline font-weight-bold " +
                              year.color +
                              "--text",
                            attrs: { slot: "opposite" },
                            domProps: { textContent: _vm._s(year.year) },
                            slot: "opposite"
                          }),
                          _vm._v(" "),
                          _c("div", { staticClass: "py-3" }, [
                            _c(
                              "h2",
                              {
                                class:
                                  "headline font-weight-light mb-3 " +
                                  year.color +
                                  "--text"
                              },
                              [_vm._v("Lorem ipsum")]
                            ),
                            _vm._v(" "),
                            _c("div", [
                              _vm._v(
                                "\n                           Lorem ipsum dolor sit amet, no nam oblique veritus. Commune scaevola imperdiet nec ut, sed euismod convenire principes at. Est et nobis iisque percipit, an vim zril disputando voluptatibus, vix an salutandi sententiae.\n                        "
                              )
                            ])
                          ])
                        ]
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
    require("vue-hot-reload-api")      .rerender("data-v-0fcf6f01", module.exports)
  }
}

/***/ }),

/***/ 247:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(2286)
/* template */
var __vue_template__ = __webpack_require__(2287)
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
Component.options.__file = "resources/js/views/timelines/OppositeSlot.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0fcf6f01", Component.options)
  } else {
    hotAPI.reload("data-v-0fcf6f01", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});