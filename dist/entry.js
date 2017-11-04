/*! chen */
webpackJsonp([0],[
/* 0 */,
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(2);
module.exports = __webpack_require__(4);


/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/***/ }),
/* 3 */,
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {

__webpack_require__(5);

__webpack_require__(6);

/* 弹出层 */
function Dialog(settings) {
    this.defaulstSettings = {
        width: 500,
        height: 400,
        title: "弹出层",
        content: ""
    };
    $.extend(this.defaulstSettings, settings);
    this.$container = $('<div class="dialog-container"></div>');
    this.$mask = $('<div class="dialog-mask"></div>');
    this.$box = $('<div class="dialog-box"></div>');
    this.$title = $('<div class="dialog-title"></div>');
    this.$item = $('<div class="dialog-title-item"></div>');
    this.$close = $('<div class="dialog-title-close">[X]</div>');
    this.$content = $('<div class="dialog-content"></div>');
}
Dialog.prototype.open = function () {
    this.$container.append(this.$mask).append(this.$box).appendTo(document.body);
    this.$box.append(this.$title).append(this.$content);
    this.$title.append(this.$item).append(this.$close);
    this.$box.css({
        width: this.defaulstSettings.width,
        height: this.defaulstSettings.height
    });
    this.$item.html(this.defaulstSettings.title);
    if (this.defaulstSettings.content.indexOf(".html") != -1) {
        $(this.$content).load(this.defaulstSettings.content);
    } else {
        $(this.$content).html(this.defaulstSettings.content);
    }
    this.$close.on("click", function () {
        // this.$container.remove();
        this.close();
    }.bind(this));
};
Dialog.prototype.close = function () {
    this.$container.remove();
};
$("#btn").on("click", function () {
    var settings = {
        width: 300,
        height: 200,
        title: "选座信息",
        content: "login.html"
    };
    var dialog = new Dialog(settings);
    dialog.open();
});
/*  */
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(0)))

/***/ }),
/* 5 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 6 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
],[1]);