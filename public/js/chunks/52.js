webpackJsonp([52],{

/***/ 2288:
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
var COLORS = ['info', 'warning', 'error', 'success'];
var ICONS = {
  info: 'mdi-information',
  warning: 'mdi-alert',
  error: 'mdi-alert-circle',
  success: 'mdi-check-circle'
};
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      interval: null,
      denseItems: [{
        id: 1,
        color: 'info',
        icon: ICONS['info']
      }],
      nonce: 2
    };
  },
  beforeDestroy: function beforeDestroy() {
    this.stop();
  },
  methods: {
    addEvent: function addEvent() {
      var _this$genAlert = this.genAlert(),
          color = _this$genAlert.color,
          icon = _this$genAlert.icon;

      var previousColor = this.denseItems[0].color;

      while (previousColor === color) {
        color = this.genColor();
      }

      this.denseItems.unshift({
        id: this.nonce++,
        color: color,
        icon: icon
      });

      if (this.nonce > 6) {
        this.denseItems.pop();
      }
    },
    genAlert: function genAlert() {
      var color = this.genColor();
      return {
        color: color,
        icon: this.genIcon(color)
      };
    },
    genColor: function genColor() {
      return COLORS[Math.floor(Math.random() * 3)];
    },
    genIcon: function genIcon(color) {
      return ICONS[color];
    },
    start: function start() {
      this.interval = setInterval(this.addEvent, 3000);
    },
    stop: function stop() {
      clearInterval(this.interval);
      this.interval = null;
    }
  }
});

/***/ }),

/***/ 2289:
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
                        "Dense timelines position all content to the right. In this example, "
                      ),
                      _c("code", [_vm._v("v-alert")]),
                      _vm._v(
                        " replaces the card to provide a different design."
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-card",
                    { staticClass: "mx-auto", attrs: { "max-width": "600" } },
                    [
                      _c(
                        "v-card-title",
                        { staticClass: "blue-grey white--text" },
                        [
                          _c("span", { staticClass: "title" }, [
                            _vm._v("Logs")
                          ]),
                          _vm._v(" "),
                          _c("v-spacer"),
                          _vm._v(" "),
                          _c(
                            "v-btn",
                            {
                              attrs: {
                                outline: _vm.interval == null,
                                color:
                                  _vm.interval == null ? "white" : "primary",
                                depressed: ""
                              },
                              on: {
                                click: function($event) {
                                  _vm.interval == null
                                    ? _vm.start()
                                    : _vm.stop()
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                        Realtime Logging\n                     "
                              )
                            ]
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "v-card-text",
                        { staticClass: "py-0" },
                        [
                          _c(
                            "v-timeline",
                            { attrs: { dense: "" } },
                            [
                              _c(
                                "v-slide-x-reverse-transition",
                                { attrs: { group: "", "hide-on-leave": "" } },
                                _vm._l(_vm.denseItems, function(item) {
                                  return _c(
                                    "v-timeline-item",
                                    {
                                      key: item.id,
                                      attrs: {
                                        color: item.color,
                                        small: "",
                                        "fill-dot": ""
                                      }
                                    },
                                    [
                                      _c(
                                        "v-alert",
                                        {
                                          attrs: {
                                            value: true,
                                            color: item.color,
                                            icon: item.icon
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "\n                                 Lorem ipsum dolor sit amet, no nam oblique veritus. Commune scaevola imperdiet nec ut, sed euismod convenire principes at. Est et nobis iisque percipit, an vim zril disputando voluptatibus, vix an salutandi sententiae.\n                              "
                                          )
                                        ]
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
    require("vue-hot-reload-api")      .rerender("data-v-6bdfe3f9", module.exports)
  }
}

/***/ }),

/***/ 248:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(2288)
/* template */
var __vue_template__ = __webpack_require__(2289)
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
Component.options.__file = "resources/js/views/timelines/DenseAlert.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6bdfe3f9", Component.options)
  } else {
    hotAPI.reload("data-v-6bdfe3f9", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});