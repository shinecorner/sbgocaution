webpackJsonp([59],{

/***/ 184:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(2195)
/* template */
var __vue_template__ = __webpack_require__(2196)
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
Component.options.__file = "resources/js/views/timelines/Advanced.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1459c91e", Component.options)
  } else {
    hotAPI.reload("data-v-1459c91e", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 2195:
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      nonce: 0,
      events: [],
      input: null
    };
  },
  computed: {
    timeline: function timeline() {
      return this.events.slice().reverse();
    }
  },
  methods: {
    comment: function comment() {
      var time = new Date().toTimeString();
      this.events.push({
        id: this.nonce++,
        text: this.input,
        time: time.replace(/:\d{2}\sGMT-\d{4}\s\((.*)\)/, function (match, contents, offset) {
          return " ".concat(contents.split(' ').map(function (v) {
            return v.charAt(0);
          }).join(''));
        })
      });
      this.input = null;
    }
  }
});

/***/ }),

/***/ 2196:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "hover-wrapper advanced-timeline-wrapper" },
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
                        "Modular components allow you to create highly customized solutions that just work."
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-timeline",
                    { attrs: { dense: "", clipped: "" } },
                    [
                      _c(
                        "v-timeline-item",
                        {
                          staticClass: "white--text mb-5",
                          attrs: { "fill-dot": "", color: "orange", large: "" }
                        },
                        [
                          _c(
                            "span",
                            { attrs: { slot: "icon" }, slot: "icon" },
                            [_vm._v("JL")]
                          ),
                          _vm._v(" "),
                          _c(
                            "v-text-field",
                            {
                              attrs: {
                                "hide-details": "",
                                flat: "",
                                label: "Leave a comment...",
                                solo: ""
                              },
                              on: {
                                keydown: function($event) {
                                  if (
                                    !$event.type.indexOf("key") &&
                                    _vm._k(
                                      $event.keyCode,
                                      "enter",
                                      13,
                                      $event.key,
                                      "Enter"
                                    )
                                  ) {
                                    return null
                                  }
                                  return _vm.comment($event)
                                }
                              },
                              model: {
                                value: _vm.input,
                                callback: function($$v) {
                                  _vm.input = $$v
                                },
                                expression: "input"
                              }
                            },
                            [
                              _c(
                                "template",
                                { slot: "append" },
                                [
                                  _c(
                                    "v-btn",
                                    {
                                      staticClass: "mx-0",
                                      attrs: { depressed: "" },
                                      on: { click: _vm.comment }
                                    },
                                    [
                                      _vm._v(
                                        "\n                           Post\n                        "
                                      )
                                    ]
                                  )
                                ],
                                1
                              )
                            ],
                            2
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-slide-x-transition",
                        { attrs: { group: "" } },
                        _vm._l(_vm.timeline, function(event) {
                          return _c(
                            "v-timeline-item",
                            {
                              key: event.id,
                              staticClass: "mb-3",
                              attrs: { color: "pink", small: "" }
                            },
                            [
                              _c(
                                "v-layout",
                                { attrs: { "justify-space-between": "" } },
                                [
                                  _c("v-flex", {
                                    attrs: { xs7: "" },
                                    domProps: {
                                      textContent: _vm._s(event.text)
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c("v-flex", {
                                    attrs: { xs5: "", "text-xs-right": "" },
                                    domProps: {
                                      textContent: _vm._s(event.time)
                                    }
                                  })
                                ],
                                1
                              )
                            ],
                            1
                          )
                        }),
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-timeline-item",
                        { staticClass: "mb-4", attrs: { "hide-dot": "" } },
                        [_c("span", [_vm._v("TODAY")])]
                      ),
                      _vm._v(" "),
                      _c(
                        "v-timeline-item",
                        {
                          staticClass: "mb-3",
                          attrs: {
                            color: "grey",
                            "icon-color": "grey lighten-2",
                            small: ""
                          }
                        },
                        [
                          _c(
                            "v-layout",
                            { attrs: { "justify-space-between": "" } },
                            [
                              _c("v-flex", { attrs: { xs7: "" } }, [
                                _vm._v("This order was archived.")
                              ]),
                              _vm._v(" "),
                              _c(
                                "v-flex",
                                { attrs: { xs5: "", "text-xs-right": "" } },
                                [_vm._v("15:26 EDT")]
                              )
                            ],
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-timeline-item",
                        { staticClass: "mb-3", attrs: { small: "" } },
                        [
                          _c(
                            "v-layout",
                            { attrs: { "justify-space-between": "" } },
                            [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "d-flex justify-center align-center flex-fix"
                                },
                                [
                                  _c(
                                    "v-chip",
                                    {
                                      staticClass: "white--text ml-0",
                                      attrs: {
                                        color: "purple",
                                        label: "",
                                        small: ""
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                           APP\n                        "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("span", { staticClass: "flex-gap" }, [
                                    _vm._v(
                                      " Digital Downloads fulfilled 1 item."
                                    )
                                  ])
                                ],
                                1
                              ),
                              _vm._v(" "),
                              _c(
                                "v-flex",
                                { attrs: { xs5: "", "text-xs-right": "" } },
                                [_vm._v("15:25 EDT")]
                              )
                            ],
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-timeline-item",
                        {
                          staticClass: "mb-3",
                          attrs: { color: "grey", small: "" }
                        },
                        [
                          _c(
                            "v-layout",
                            { attrs: { "justify-space-between": "" } },
                            [
                              _c("v-flex", { attrs: { xs7: "" } }, [
                                _vm._v(
                                  "\n                        Order confirmation email was sent to John Leider (john@vuetifyjs.com).\n                     "
                                )
                              ]),
                              _vm._v(" "),
                              _c(
                                "v-flex",
                                { attrs: { xs5: "", "text-xs-right": "" } },
                                [_vm._v("15:25 EDT")]
                              )
                            ],
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-timeline-item",
                        { staticClass: "mb-3", attrs: { "hide-dot": "" } },
                        [
                          _c(
                            "v-btn",
                            { staticClass: "mx-0", attrs: { color: "white" } },
                            [
                              _vm._v(
                                "\n                     Resend Email\n                  "
                              )
                            ]
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-timeline-item",
                        {
                          staticClass: "mb-3",
                          attrs: { color: "grey", small: "" }
                        },
                        [
                          _c(
                            "v-layout",
                            { attrs: { "justify-space-between": "" } },
                            [
                              _c("v-flex", { attrs: { xs7: "" } }, [
                                _vm._v(
                                  "\n                        A $15.00 USD payment was processed on PayPal Express Checkout\n                     "
                                )
                              ]),
                              _vm._v(" "),
                              _c(
                                "v-flex",
                                { attrs: { xs5: "", "text-xs-right": "" } },
                                [_vm._v("15:25 EDT")]
                              )
                            ],
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-timeline-item",
                        { attrs: { color: "grey", small: "" } },
                        [
                          _c(
                            "v-layout",
                            { attrs: { "justify-space-between": "" } },
                            [
                              _c("v-flex", { attrs: { xs7: "" } }, [
                                _vm._v(
                                  "\n                        John Leider placed this order on Online Store (checkout #1937432132572).\n                     "
                                )
                              ]),
                              _vm._v(" "),
                              _c(
                                "v-flex",
                                { attrs: { xs5: "", "text-xs-right": "" } },
                                [_vm._v("15:25 EDT")]
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
    require("vue-hot-reload-api")      .rerender("data-v-1459c91e", module.exports)
  }
}

/***/ })

});