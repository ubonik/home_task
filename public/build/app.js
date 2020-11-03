(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["app"],{

/***/ "./assets/css/app.css":
/*!****************************!*\
  !*** ./assets/css/app.css ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _css_app_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../css/app.css */ "./assets/css/app.css");
/* harmony import */ var _css_app_css__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_css_app_css__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _vote__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./vote */ "./assets/js/vote.js");
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)
 // Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
//import $ from 'jquery';

__webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js");



/***/ }),

/***/ "./assets/js/vote.js":
/*!***************************!*\
  !*** ./assets/js/vote.js ***!
  \***************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.find */ "./node_modules/core-js/modules/es.array.find.js");
/* harmony import */ var core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_1__);


jquery__WEBPACK_IMPORTED_MODULE_1___default()(function () {
  jquery__WEBPACK_IMPORTED_MODULE_1___default()('[data-id=voteBlock]').each(function () {
    var $container = jquery__WEBPACK_IMPORTED_MODULE_1___default()(this);
    $container.on('click', '[data-id=voteButton]', function (e) {
      e.preventDefault();
      var href = jquery__WEBPACK_IMPORTED_MODULE_1___default()(this).data('href');
      jquery__WEBPACK_IMPORTED_MODULE_1___default.a.ajax({
        url: href,
        method: 'POST'
      }).then(function (data) {
        var $voteCount = $container.find('[data-id=voteCount]');
        $voteCount.removeClass('text-success text-danger');

        if (data.votes > 0) {
          $voteCount.addClass('text-success');
        } else if (data.votes < 0) {
          $voteCount.addClass('text-danger');
        }

        $voteCount.text(data.votes);
      });
    });
  });
});

/***/ })

},[["./assets/js/app.js","runtime","vendors~app"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FwcC5jc3MiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvdm90ZS5qcyJdLCJuYW1lcyI6WyJyZXF1aXJlIiwiJCIsImVhY2giLCIkY29udGFpbmVyIiwib24iLCJlIiwicHJldmVudERlZmF1bHQiLCJocmVmIiwiZGF0YSIsImFqYXgiLCJ1cmwiLCJtZXRob2QiLCJ0aGVuIiwiJHZvdGVDb3VudCIsImZpbmQiLCJyZW1vdmVDbGFzcyIsInZvdGVzIiwiYWRkQ2xhc3MiLCJ0ZXh0Il0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7QUFBQSx1Qzs7Ozs7Ozs7Ozs7O0FDQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTs7Ozs7O0FBT0E7Q0FHQTtBQUNBOztBQUVBQSxtQkFBTyxDQUFDLGdFQUFELENBQVA7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FDYkE7QUFFQUMsNkNBQUMsQ0FBQyxZQUFZO0FBRVZBLCtDQUFDLENBQUMscUJBQUQsQ0FBRCxDQUF5QkMsSUFBekIsQ0FBOEIsWUFBWTtBQUN0QyxRQUFNQyxVQUFVLEdBQUdGLDZDQUFDLENBQUMsSUFBRCxDQUFwQjtBQUVBRSxjQUFVLENBQUNDLEVBQVgsQ0FBYyxPQUFkLEVBQXVCLHNCQUF2QixFQUErQyxVQUFVQyxDQUFWLEVBQWE7QUFDeERBLE9BQUMsQ0FBQ0MsY0FBRjtBQUVBLFVBQU1DLElBQUksR0FBR04sNkNBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU8sSUFBUixDQUFhLE1BQWIsQ0FBYjtBQUVBUCxtREFBQyxDQUFDUSxJQUFGLENBQU87QUFDSEMsV0FBRyxFQUFFSCxJQURGO0FBRUhJLGNBQU0sRUFBRTtBQUZMLE9BQVAsRUFHR0MsSUFISCxDQUdRLFVBQVVKLElBQVYsRUFBZ0I7QUFDcEIsWUFBTUssVUFBVSxHQUFHVixVQUFVLENBQUNXLElBQVgsQ0FBZ0IscUJBQWhCLENBQW5CO0FBRUFELGtCQUFVLENBQUNFLFdBQVgsQ0FBdUIsMEJBQXZCOztBQUNBLFlBQUlQLElBQUksQ0FBQ1EsS0FBTCxHQUFhLENBQWpCLEVBQW9CO0FBQ2hCSCxvQkFBVSxDQUFDSSxRQUFYLENBQW9CLGNBQXBCO0FBQ0gsU0FGRCxNQUVPLElBQUdULElBQUksQ0FBQ1EsS0FBTCxHQUFhLENBQWhCLEVBQW1CO0FBQ3RCSCxvQkFBVSxDQUFDSSxRQUFYLENBQW9CLGFBQXBCO0FBQ0g7O0FBRURKLGtCQUFVLENBQUNLLElBQVgsQ0FBZ0JWLElBQUksQ0FBQ1EsS0FBckI7QUFDSCxPQWREO0FBZUgsS0FwQkQ7QUFxQkgsR0F4QkQ7QUEwQkgsQ0E1QkEsQ0FBRCxDIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8qXG4gKiBXZWxjb21lIHRvIHlvdXIgYXBwJ3MgbWFpbiBKYXZhU2NyaXB0IGZpbGUhXG4gKlxuICogV2UgcmVjb21tZW5kIGluY2x1ZGluZyB0aGUgYnVpbHQgdmVyc2lvbiBvZiB0aGlzIEphdmFTY3JpcHQgZmlsZVxuICogKGFuZCBpdHMgQ1NTIGZpbGUpIGluIHlvdXIgYmFzZSBsYXlvdXQgKGJhc2UuaHRtbC50d2lnKS5cbiAqL1xuXG4vLyBhbnkgQ1NTIHlvdSBpbXBvcnQgd2lsbCBvdXRwdXQgaW50byBhIHNpbmdsZSBjc3MgZmlsZSAoYXBwLmNzcyBpbiB0aGlzIGNhc2UpXG5pbXBvcnQgJy4uL2Nzcy9hcHAuY3NzJztcblxuLy8gTmVlZCBqUXVlcnk/IEluc3RhbGwgaXQgd2l0aCBcInlhcm4gYWRkIGpxdWVyeVwiLCB0aGVuIHVuY29tbWVudCB0byBpbXBvcnQgaXQuXG4vL2ltcG9ydCAkIGZyb20gJ2pxdWVyeSc7XG5cbnJlcXVpcmUoJ2Jvb3RzdHJhcCcpO1xuXG5pbXBvcnQgJy4vdm90ZSc7IiwiaW1wb3J0ICQgZnJvbSAnanF1ZXJ5JztcblxuJChmdW5jdGlvbiAoKSB7XG5cbiAgICAkKCdbZGF0YS1pZD12b3RlQmxvY2tdJykuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNvbnN0ICRjb250YWluZXIgPSAkKHRoaXMpO1xuXG4gICAgICAgICRjb250YWluZXIub24oJ2NsaWNrJywgJ1tkYXRhLWlkPXZvdGVCdXR0b25dJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICAgICAgY29uc3QgaHJlZiA9ICQodGhpcykuZGF0YSgnaHJlZicpO1xuXG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHVybDogaHJlZixcbiAgICAgICAgICAgICAgICBtZXRob2Q6ICdQT1NUJ1xuICAgICAgICAgICAgfSkudGhlbihmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgIGNvbnN0ICR2b3RlQ291bnQgPSAkY29udGFpbmVyLmZpbmQoJ1tkYXRhLWlkPXZvdGVDb3VudF0nKTtcblxuICAgICAgICAgICAgICAgICR2b3RlQ291bnQucmVtb3ZlQ2xhc3MoJ3RleHQtc3VjY2VzcyB0ZXh0LWRhbmdlcicpO1xuICAgICAgICAgICAgICAgIGlmIChkYXRhLnZvdGVzID4gMCkge1xuICAgICAgICAgICAgICAgICAgICAkdm90ZUNvdW50LmFkZENsYXNzKCd0ZXh0LXN1Y2Nlc3MnKTtcbiAgICAgICAgICAgICAgICB9IGVsc2UgaWYoZGF0YS52b3RlcyA8IDApIHtcbiAgICAgICAgICAgICAgICAgICAgJHZvdGVDb3VudC5hZGRDbGFzcygndGV4dC1kYW5nZXInKTtcbiAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICAkdm90ZUNvdW50LnRleHQoZGF0YS52b3Rlcyk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG4gICAgfSk7XG5cbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==