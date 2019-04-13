webpackJsonp([39],{

/***/ 146:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(2049)
/* template */
var __vue_template__ = __webpack_require__(2050)
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
Component.options.__file = "resources/js/views/ui-elements/Tabs.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3abece88", Component.options)
  } else {
    hotAPI.reload("data-v-3abece88", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 2049:
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      tabIcons: [{
        icon: "phone",
        text: "Recents"
      }, {
        icon: "favorite",
        text: "Favorites"
      }, {
        icon: "account_box",
        text: "nearby"
      }],
      model: 'tab-2',
      tabs: null,
      active: null,
      items: ["Item One", "Item Five", "Item Seventeen"],
      text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
    };
  },
  methods: {
    next: function next() {
      var active = parseInt(this.active);
      this.active = active < 2 ? active + 1 : 0;
    }
  }
});

/***/ }),

/***/ 2050:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("page-title-bar"),
      _vm._v(" "),
      _c(
        "v-container",
        { attrs: { fluid: "", "grid-list-xl": "", "pt-0": "" } },
        [
          _c(
            "v-layout",
            { attrs: { row: "", wrap: "" } },
            [
              _c(
                "app-card",
                {
                  attrs: {
                    heading: _vm.$t("message.usage"),
                    colClasses: "xs12 md12"
                  }
                },
                [
                  _c("div", { staticClass: "mb-3" }, [
                    _c("p", { staticClass: "mb-0" }, [
                      _vm._v("The "),
                      _c("code", [_vm._v("v-tabs")]),
                      _vm._v(
                        " component is used for hiding content behind a selectable item. This can also be used as a pseudo-navigation for a page, where the tabs are links and the tab-items are the content."
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-tabs",
                    {
                      attrs: {
                        color: "cyan",
                        dark: "",
                        "slider-color": "yellow"
                      },
                      model: {
                        value: _vm.active,
                        callback: function($$v) {
                          _vm.active = $$v
                        },
                        expression: "active"
                      }
                    },
                    [
                      _vm._l(_vm.items, function(item) {
                        return _c(
                          "v-tab",
                          { key: item, attrs: { ripple: "" } },
                          [
                            _vm._v(
                              "\n\t\t\t\t\t\t" + _vm._s(item) + "\n\n\t\t\t\t\t"
                            )
                          ]
                        )
                      }),
                      _vm._v(" "),
                      _vm._l(_vm.items, function(item) {
                        return _c(
                          "v-tab-item",
                          { key: item },
                          [
                            _c(
                              "v-card",
                              { attrs: { flat: "" } },
                              [_c("v-card-text", [_vm._v(_vm._s(_vm.text))])],
                              1
                            )
                          ],
                          1
                        )
                      })
                    ],
                    2
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "text-xs-center mt-3" },
                    [
                      _c("v-btn", { on: { click: _vm.next } }, [
                        _vm._v("next tab")
                      ])
                    ],
                    1
                  )
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "v-layout",
            { attrs: { row: "", wrap: "" } },
            [
              _c(
                "app-card",
                {
                  attrs: {
                    heading: _vm.$t("message.fixedTabs"),
                    colClasses: "xs12 md12"
                  }
                },
                [
                  _c("div", { staticClass: "mb-3" }, [
                    _c("p", { staticClass: "mb-0" }, [
                      _vm._v(
                        "The fixed-tabs prop sets a higher minimum width and applies a new maximum width to "
                      ),
                      _c("code", [_vm._v("v-tabs-items")]),
                      _vm._v(
                        ". On desktop screens, the tab items will be centered within the "
                      ),
                      _c("code", [_vm._v("v-tabs")]),
                      _vm._v(" component and switch to evenly fill on mobile.")
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-tabs",
                    { attrs: { "fixed-tabs": "" } },
                    _vm._l(_vm.items, function(item) {
                      return _c("v-tab", { key: item }, [
                        _vm._v("\n\t\t\t\t\t\t" + _vm._s(item) + "\n\t\t\t\t\t")
                      ])
                    }),
                    1
                  )
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "v-layout",
            [
              _c(
                "app-card",
                {
                  attrs: {
                    heading: _vm.$t("message.rightAlignedTabs"),
                    colClasses: "xs12 md12"
                  }
                },
                [
                  _c("div", { staticClass: "mb-3" }, [
                    _c("p", { staticClass: "mb-0" }, [
                      _vm._v("The right prop aligns the tabs to the right.")
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-tabs",
                    { attrs: { right: "" } },
                    _vm._l(_vm.items, function(item) {
                      return _c("v-tab", { key: item }, [
                        _vm._v("\n\t\t\t\t\t\t" + _vm._s(item) + "\n\t\t\t\t\t")
                      ])
                    }),
                    1
                  )
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "v-layout",
            [
              _c(
                "app-card",
                {
                  attrs: {
                    heading: _vm.$t("message.content"),
                    colClasses: "xs12 md12"
                  }
                },
                [
                  _c("div", { staticClass: "mb-3" }, [
                    _c("p", { staticClass: "mb-0" }, [
                      _vm._v(
                        "Tabs are not the only thing you can put inside the "
                      ),
                      _c("code", [_vm._v("v-tabs")]),
                      _vm._v(
                        " component. In this example we've also added a toolbar."
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-toolbar",
                    { attrs: { color: "cyan", dark: "", tabs: "" } },
                    [
                      _c("v-toolbar-side-icon"),
                      _vm._v(" "),
                      _c("v-toolbar-title", [_vm._v("Page title")]),
                      _vm._v(" "),
                      _c("v-spacer"),
                      _vm._v(" "),
                      _c(
                        "v-btn",
                        { attrs: { icon: "" } },
                        [_c("v-icon", [_vm._v("search")])],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-btn",
                        { attrs: { icon: "" } },
                        [_c("v-icon", [_vm._v("more_vert")])],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-tabs",
                        {
                          attrs: {
                            slot: "extension",
                            centered: "",
                            color: "cyan",
                            "slider-color": "yellow"
                          },
                          slot: "extension",
                          model: {
                            value: _vm.model,
                            callback: function($$v) {
                              _vm.model = $$v
                            },
                            expression: "model"
                          }
                        },
                        _vm._l(3, function(i) {
                          return _c(
                            "v-tab",
                            { key: i, attrs: { href: "#tab-" + i } },
                            [
                              _vm._v(
                                "\n\t\t\t\t\t\tItem " +
                                  _vm._s(i) +
                                  "\n\t\t\t\t\t"
                              )
                            ]
                          )
                        }),
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "v-tabs-items",
                    {
                      model: {
                        value: _vm.model,
                        callback: function($$v) {
                          _vm.model = $$v
                        },
                        expression: "model"
                      }
                    },
                    _vm._l(3, function(i) {
                      return _c(
                        "v-tab-item",
                        { key: i, attrs: { value: "tab-" + i } },
                        [
                          _c(
                            "v-card",
                            { attrs: { flat: "" } },
                            [
                              _c("v-card-text", {
                                domProps: { textContent: _vm._s(_vm.text) }
                              })
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
          ),
          _vm._v(" "),
          _c(
            "v-layout",
            [
              _c(
                "app-card",
                {
                  attrs: {
                    heading: _vm.$t("message.withSearch"),
                    colClasses: "xs12 md12"
                  }
                },
                [
                  _c("div", { staticClass: "mb-3" }, [
                    _c("p", { staticClass: "mb-0" }, [
                      _vm._v(
                        "Here is another example of additional content inside the "
                      ),
                      _c("code", [_vm._v("v-tabs component")]),
                      _vm._v(".")
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-toolbar",
                    { attrs: { color: "purple", dark: "", tabs: "" } },
                    [
                      _c("v-text-field", {
                        staticClass: "mx-3",
                        attrs: {
                          "append-icon": "mic",
                          flat: "",
                          label: "Search",
                          "prepend-inner-icon": "search",
                          "solo-inverted": ""
                        }
                      }),
                      _vm._v(" "),
                      _c(
                        "v-tabs",
                        {
                          attrs: {
                            slot: "extension",
                            centered: "",
                            color: "transparent",
                            "slider-color": "white"
                          },
                          slot: "extension",
                          model: {
                            value: _vm.tabs,
                            callback: function($$v) {
                              _vm.tabs = $$v
                            },
                            expression: "tabs"
                          }
                        },
                        _vm._l(_vm.items, function(item) {
                          return _c("v-tab", { key: item }, [
                            _vm._v(
                              "\n\t\t          " +
                                _vm._s(item) +
                                "\n\t\t        "
                            )
                          ])
                        }),
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "v-tabs-items",
                    {
                      model: {
                        value: _vm.tabs,
                        callback: function($$v) {
                          _vm.tabs = $$v
                        },
                        expression: "tabs"
                      }
                    },
                    _vm._l(_vm.items, function(item) {
                      return _c(
                        "v-tab-item",
                        { key: item },
                        [
                          _c(
                            "v-card",
                            [
                              _c("v-card-text", [
                                _vm._v(
                                  "\n\t\t            " +
                                    _vm._s(_vm.text) +
                                    "\n\t\t          "
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
          ),
          _vm._v(" "),
          _c(
            "v-layout",
            [
              _c(
                "app-card",
                {
                  attrs: {
                    heading: _vm.$t("message.iconsAndText"),
                    colClasses: "xs12 md12"
                  }
                },
                [
                  _c("div", { staticClass: "mb-3" }, [
                    _c("p", { staticClass: "mb-0" }, [
                      _vm._v(
                        "By using the icons-and-text prop you can add icons to each tab item."
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-tabs",
                    {
                      attrs: {
                        centered: "",
                        color: "cyan",
                        dark: "",
                        "icons-and-text": ""
                      }
                    },
                    [
                      _c("v-tabs-slider", { attrs: { color: "yellow" } }),
                      _vm._v(" "),
                      _vm._l(_vm.tabIcons, function(icon, index) {
                        return _c(
                          "v-tab",
                          { key: index, attrs: { href: "#tab-" + index } },
                          [
                            _vm._v(
                              "\n\t\t\t      " +
                                _vm._s(icon.text) +
                                "\n\t\t\t      "
                            ),
                            _c("v-icon", [_vm._v(_vm._s(icon.icon))])
                          ],
                          1
                        )
                      }),
                      _vm._v(" "),
                      _vm._l(_vm.tabIcons, function(icon, index) {
                        return _c(
                          "v-tab-item",
                          { key: index, attrs: { value: "tab-" + index } },
                          [
                            _c(
                              "v-card",
                              { attrs: { flat: "" } },
                              [_c("v-card-text", [_vm._v(_vm._s(_vm.text))])],
                              1
                            )
                          ],
                          1
                        )
                      })
                    ],
                    2
                  )
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "v-layout",
            [
              _c(
                "app-card",
                {
                  attrs: {
                    heading: _vm.$t("message.grow"),
                    colClasses: "xs12 md12"
                  }
                },
                [
                  _c("div", { staticClass: "mb-3" }, [
                    _c("p", { staticClass: "mb-0" }, [
                      _vm._v(
                        "The grow prop will make the tab items take up all available space."
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-toolbar",
                    { attrs: { color: "cyan", dark: "", tabs: "" } },
                    [
                      _c("v-toolbar-side-icon"),
                      _vm._v(" "),
                      _c("v-toolbar-title", [_vm._v("Page title")]),
                      _vm._v(" "),
                      _c("v-spacer"),
                      _vm._v(" "),
                      _c(
                        "v-btn",
                        { attrs: { icon: "" } },
                        [_c("v-icon", [_vm._v("search")])],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-btn",
                        { attrs: { icon: "" } },
                        [_c("v-icon", [_vm._v("more_vert")])],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-tabs",
                        {
                          attrs: { slot: "extension", color: "cyan", grow: "" },
                          slot: "extension",
                          model: {
                            value: _vm.tabs,
                            callback: function($$v) {
                              _vm.tabs = $$v
                            },
                            expression: "tabs"
                          }
                        },
                        [
                          _c("v-tabs-slider", { attrs: { color: "yellow" } }),
                          _vm._v(" "),
                          _vm._l(_vm.items, function(item) {
                            return _c("v-tab", { key: item }, [
                              _vm._v(
                                "\n\t\t          " +
                                  _vm._s(item) +
                                  "\n\t\t        "
                              )
                            ])
                          })
                        ],
                        2
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "v-tabs-items",
                    {
                      model: {
                        value: _vm.tabs,
                        callback: function($$v) {
                          _vm.tabs = $$v
                        },
                        expression: "tabs"
                      }
                    },
                    _vm._l(_vm.items, function(item) {
                      return _c(
                        "v-tab-item",
                        { key: item },
                        [
                          _c(
                            "v-card",
                            { attrs: { flat: "" } },
                            [_c("v-card-text", [_vm._v(_vm._s(_vm.text))])],
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
          ),
          _vm._v(" "),
          _c(
            "v-layout",
            [
              _c(
                "app-card",
                {
                  attrs: {
                    heading: _vm.$t("message.pagination"),
                    colClasses: "xs12 md12"
                  }
                },
                [
                  _c("div", { staticClass: "mb-3" }, [
                    _c("p", { staticClass: "mb-0" }, [
                      _vm._v(
                        "You can use a menu to hold additional tabs, swapping them out on the fly."
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-tabs",
                    { attrs: { dark: "", color: "cyan", "show-arrows": "" } },
                    [
                      _c("v-tabs-slider", { attrs: { color: "yellow" } }),
                      _vm._v(" "),
                      _vm._l(12, function(i) {
                        return _c(
                          "v-tab",
                          { key: i, attrs: { href: "#tab-" + i } },
                          [
                            _vm._v(
                              "\n\t\t\t      Item " + _vm._s(i) + "\n\t\t\t    "
                            )
                          ]
                        )
                      }),
                      _vm._v(" "),
                      _c(
                        "v-tabs-items",
                        _vm._l(12, function(i) {
                          return _c(
                            "v-tab-item",
                            { key: i, attrs: { value: "tab-" + i } },
                            [
                              _c(
                                "v-card",
                                { attrs: { flat: "" } },
                                [_c("v-card-text", [_vm._v(_vm._s(_vm.text))])],
                                1
                              )
                            ],
                            1
                          )
                        }),
                        1
                      )
                    ],
                    2
                  )
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "v-layout",
            [
              _c(
                "app-card",
                {
                  attrs: {
                    heading: _vm.$t("message.customIcons"),
                    colClasses: "xs12 md12"
                  }
                },
                [
                  _c("div", { staticClass: "mb-3" }, [
                    _c("p", { staticClass: "mb-0" }, [
                      _vm._v(
                        "You can use a menu to hold additional tabs, swapping them out on the fly."
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-tabs",
                    {
                      attrs: {
                        color: "cyan",
                        dark: "",
                        "next-icon": "mdi-arrow-right-bold-box-outline",
                        "prev-icon": "mdi-arrow-left-bold-box-outline",
                        "show-arrows": ""
                      }
                    },
                    [
                      _c("v-tabs-slider", { attrs: { color: "yellow" } }),
                      _vm._v(" "),
                      _vm._l(12, function(i) {
                        return _c(
                          "v-tab",
                          { key: i, attrs: { href: "#tab-" + i } },
                          [
                            _vm._v(
                              "\n\t\t\t      Item " + _vm._s(i) + "\n\t\t\t    "
                            )
                          ]
                        )
                      }),
                      _vm._v(" "),
                      _c(
                        "v-tabs-items",
                        _vm._l(30, function(i) {
                          return _c(
                            "v-tab-item",
                            { key: i, attrs: { value: "tab-" + i } },
                            [
                              _c(
                                "v-card",
                                { attrs: { flat: "" } },
                                [_c("v-card-text", [_vm._v(_vm._s(_vm.text))])],
                                1
                              )
                            ],
                            1
                          )
                        }),
                        1
                      )
                    ],
                    2
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
    require("vue-hot-reload-api")      .rerender("data-v-3abece88", module.exports)
  }
}

/***/ })

});