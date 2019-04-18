webpackJsonp([85],{

/***/ 1551:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(1815)
/* template */
var __vue_template__ = __webpack_require__(1816)
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
Component.options.__file = "resources/js/views/contacts/ContactList.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-e68794fe", Component.options)
  } else {
    hotAPI.reload("data-v-e68794fe", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 1560:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios__ = __webpack_require__(330);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_axios__);

/* harmony default export */ __webpack_exports__["a"] = (__WEBPACK_IMPORTED_MODULE_0_axios___default.a.create({
  baseURL: Object({"MIX_PUSHER_APP_KEY":"","MIX_PUSHER_APP_CLUSTER":"mt1","NODE_ENV":"development"}).APP_URL,
  headers: {
    'Authorization': 'Bearer ' + localStorage.getItem('accessToken')
  }
}));

/***/ }),

/***/ 1815:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_Api__ = __webpack_require__(1560);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      loader: true,
      search: "",
      selected: [],
      headers: [{
        text: this.$t('message.crm.CONTACT_ID'),
        value: "id",
        sortable: false
      }, {
        text: this.$t('message.crm.NAME'),
        value: "vorname",
        sortable: false
      }, {
        text: this.$t('message.crm.ADDRESS'),
        value: "address",
        sortable: false
      }],
      items: []
    };
  },
  mounted: function mounted() {
    this.getTablesData();
  },
  methods: {
    getTablesData: function getTablesData() {
      var _this = this;

      __WEBPACK_IMPORTED_MODULE_0_Api__["a" /* default */].get("api/contacts").then(function (response) {
        console.log(response.data.data);
        _this.loader = false;
        _this.items = response.data.data;
      })["catch"](function (error) {
        console.log(error);
      });
    }
  }
});

/***/ }),

/***/ 1816:
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
      _c("app-section-loader", { attrs: { status: _vm.loader } }),
      _vm._v(" "),
      _c(
        "v-container",
        { attrs: { fluid: "", "grid-list-xl": "", "py-0": "" } },
        [
          _c(
            "v-layout",
            { attrs: { row: "", wrap: "" } },
            [
              _c(
                "app-card",
                {
                  attrs: {
                    heading: _vm.$t("message.crm.CONTACTS"),
                    fullBlock: true,
                    colClasses: "xl12 lg12 md12 sm12 xs12"
                  }
                },
                [
                  _c("v-data-table", {
                    attrs: {
                      headers: _vm.headers,
                      items: _vm.items,
                      search: _vm.search,
                      "item-key": "id",
                      "select-all": ""
                    },
                    scopedSlots: _vm._u([
                      {
                        key: "headerCell",
                        fn: function(props) {
                          return [
                            _c("v-tooltip", { attrs: { bottom: "" } }, [
                              _c(
                                "span",
                                {
                                  attrs: { slot: "activator" },
                                  slot: "activator"
                                },
                                [
                                  _vm._v(
                                    "\n\t\t\t\t\t\t\t\t" +
                                      _vm._s(props.header.text) +
                                      "\n\t\t\t\t\t\t\t"
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("span", [
                                _vm._v(
                                  "\n\t\t\t\t\t\t\t\t" +
                                    _vm._s(props.header.text) +
                                    "\n\t\t\t\t\t\t\t"
                                )
                              ])
                            ])
                          ]
                        }
                      },
                      {
                        key: "items",
                        fn: function(props) {
                          return [
                            _c(
                              "td",
                              { attrs: { width: "5%" } },
                              [
                                _c("v-checkbox", {
                                  attrs: {
                                    color: "primary",
                                    "hide-details": ""
                                  },
                                  model: {
                                    value: props.selected,
                                    callback: function($$v) {
                                      _vm.$set(props, "selected", $$v)
                                    },
                                    expression: "props.selected"
                                  }
                                })
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              [
                                _vm._v(
                                  "\n                                                    " +
                                    _vm._s(props.item.contact_formate) +
                                    "\n                                                    "
                                ),
                                _c("br"),
                                _vm._v(" "),
                                props.item.is_duplicate
                                  ? _c("v-tooltip", { attrs: { top: "" } }, [
                                      _c("i", {
                                        staticClass:
                                          "ti-layout-accordion-merged",
                                        attrs: { slot: "activator" },
                                        slot: "activator"
                                      }),
                                      _vm._v(" "),
                                      _c("span", [
                                        _vm._v(_vm._s(props.item.is_duplicate))
                                      ])
                                    ])
                                  : _vm._e(),
                                _vm._v(" "),
                                props.item.rc_quote
                                  ? _c("v-tooltip", { attrs: { top: "" } }, [
                                      _c("i", {
                                        staticClass: "ti-check",
                                        attrs: { slot: "activator" },
                                        slot: "activator"
                                      }),
                                      _vm._v(" "),
                                      _c("span", [
                                        _vm._v(
                                          _vm._s(
                                            _vm.$t(
                                              "message.crm.RC_QUOTE_TOOLTIP"
                                            )
                                          )
                                        )
                                      ])
                                    ])
                                  : _vm._e(),
                                _vm._v(" "),
                                props.item.lead_source
                                  ? _c("v-tooltip", { attrs: { top: "" } }, [
                                      _c("i", {
                                        staticClass: "ti-headphone",
                                        attrs: { slot: "activator" },
                                        slot: "activator"
                                      }),
                                      _vm._v(" "),
                                      _c("span", [
                                        _vm._v(
                                          _vm._s(
                                            _vm.$t(
                                              "message.crm.CALL_LEAD_SOURCE_TOOLTIP"
                                            )
                                          )
                                        )
                                      ])
                                    ])
                                  : _vm._e(),
                                _vm._v(" "),
                                props.item.Send_Offer_By == "post"
                                  ? _c("v-tooltip", { attrs: { top: "" } }, [
                                      _c("i", {
                                        staticClass: "ti-headphone",
                                        attrs: { slot: "activator" },
                                        slot: "activator"
                                      }),
                                      _vm._v(" "),
                                      _c("span", [
                                        _vm._v(
                                          _vm._s(
                                            _vm.$t(
                                              "message.crm.CALL_LEAD_SOURCE_TOOLTIP"
                                            )
                                          )
                                        )
                                      ])
                                    ])
                                  : _vm._e(),
                                _vm._v(" "),
                                props.item.language
                                  ? _c("v-tooltip", { attrs: { top: "" } }, [
                                      _c("img", {
                                        staticClass: "img-responsive",
                                        attrs: {
                                          slot: "activator",
                                          src:
                                            "/static/flag-icons/" +
                                            props.item.language +
                                            ".png"
                                        },
                                        slot: "activator"
                                      }),
                                      _vm._v(" "),
                                      _c("span", [
                                        _vm._v(_vm._s(props.item.language))
                                      ])
                                    ])
                                  : _vm._e()
                              ],
                              1
                            ),
                            _vm._v(" "),
                            _c("td", [
                              _vm._v(
                                "\n                                                    " +
                                  _vm._s(props.item.nachname) +
                                  " " +
                                  _vm._s(props.item.vorname) +
                                  "                                                    \n                                                "
                              )
                            ]),
                            _vm._v(" "),
                            _c("td", [
                              _c(
                                "span",
                                { staticClass: "grey--text fs-12 fw-normal" },
                                [_vm._v(_vm._s(props.item.address))]
                              ),
                              _vm._v(" "),
                              _c("br"),
                              _vm._v(
                                "\n                                                    " +
                                  _vm._s(props.item.plz) +
                                  " " +
                                  _vm._s(props.item.ort) +
                                  "                                                    \n                                                "
                              )
                            ])
                          ]
                        }
                      }
                    ]),
                    model: {
                      value: _vm.selected,
                      callback: function($$v) {
                        _vm.selected = $$v
                      },
                      expression: "selected"
                    }
                  })
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
    require("vue-hot-reload-api")      .rerender("data-v-e68794fe", module.exports)
  }
}

/***/ })

});