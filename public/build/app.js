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
/* harmony import */ var _vote__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_vote__WEBPACK_IMPORTED_MODULE_1__);
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)
 // Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
//import $ from 'jquery';



/***/ }),

/***/ "./assets/js/vote.js":
/*!***************************!*\
  !*** ./assets/js/vote.js ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! core-js/modules/es.array.find */ "./node_modules/core-js/modules/es.array.find.js");

$(function () {
  $('[data-id=voteBlock]').each(function () {
    var $container = $(this);
    $container.on('click', '[data-id=voteButton]', function (e) {
      e.preventDefault();
      var href = $(this).data('href');
      $.ajax({
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FwcC5jc3MiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvdm90ZS5qcyJdLCJuYW1lcyI6WyIkIiwiZWFjaCIsIiRjb250YWluZXIiLCJvbiIsImUiLCJwcmV2ZW50RGVmYXVsdCIsImhyZWYiLCJkYXRhIiwiYWpheCIsInVybCIsIm1ldGhvZCIsInRoZW4iLCIkdm90ZUNvdW50IiwiZmluZCIsInJlbW92ZUNsYXNzIiwidm90ZXMiLCJhZGRDbGFzcyIsInRleHQiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUFBLHVDOzs7Ozs7Ozs7Ozs7QUNBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7Ozs7OztBQU9BO0NBR0E7QUFDQTs7Ozs7Ozs7Ozs7Ozs7O0FDWEFBLENBQUMsQ0FBQyxZQUFZO0FBRVZBLEdBQUMsQ0FBQyxxQkFBRCxDQUFELENBQXlCQyxJQUF6QixDQUE4QixZQUFZO0FBQ3RDLFFBQU1DLFVBQVUsR0FBR0YsQ0FBQyxDQUFDLElBQUQsQ0FBcEI7QUFFQUUsY0FBVSxDQUFDQyxFQUFYLENBQWMsT0FBZCxFQUF1QixzQkFBdkIsRUFBK0MsVUFBVUMsQ0FBVixFQUFhO0FBQ3hEQSxPQUFDLENBQUNDLGNBQUY7QUFFQSxVQUFNQyxJQUFJLEdBQUdOLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU8sSUFBUixDQUFhLE1BQWIsQ0FBYjtBQUVBUCxPQUFDLENBQUNRLElBQUYsQ0FBTztBQUNIQyxXQUFHLEVBQUVILElBREY7QUFFSEksY0FBTSxFQUFFO0FBRkwsT0FBUCxFQUdHQyxJQUhILENBR1EsVUFBVUosSUFBVixFQUFnQjtBQUNwQixZQUFNSyxVQUFVLEdBQUdWLFVBQVUsQ0FBQ1csSUFBWCxDQUFnQixxQkFBaEIsQ0FBbkI7QUFFQUQsa0JBQVUsQ0FBQ0UsV0FBWCxDQUF1QiwwQkFBdkI7O0FBQ0EsWUFBSVAsSUFBSSxDQUFDUSxLQUFMLEdBQWEsQ0FBakIsRUFBb0I7QUFDaEJILG9CQUFVLENBQUNJLFFBQVgsQ0FBb0IsY0FBcEI7QUFDSCxTQUZELE1BRU8sSUFBR1QsSUFBSSxDQUFDUSxLQUFMLEdBQWEsQ0FBaEIsRUFBbUI7QUFDdEJILG9CQUFVLENBQUNJLFFBQVgsQ0FBb0IsYUFBcEI7QUFDSDs7QUFFREosa0JBQVUsQ0FBQ0ssSUFBWCxDQUFnQlYsSUFBSSxDQUFDUSxLQUFyQjtBQUNILE9BZEQ7QUFlSCxLQXBCRDtBQXFCSCxHQXhCRDtBQTBCSCxDQTVCQSxDQUFELEMiLCJmaWxlIjoiYXBwLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIiwiLypcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcbiAqXG4gKiBXZSByZWNvbW1lbmQgaW5jbHVkaW5nIHRoZSBidWlsdCB2ZXJzaW9uIG9mIHRoaXMgSmF2YVNjcmlwdCBmaWxlXG4gKiAoYW5kIGl0cyBDU1MgZmlsZSkgaW4geW91ciBiYXNlIGxheW91dCAoYmFzZS5odG1sLnR3aWcpLlxuICovXG5cbi8vIGFueSBDU1MgeW91IGltcG9ydCB3aWxsIG91dHB1dCBpbnRvIGEgc2luZ2xlIGNzcyBmaWxlIChhcHAuY3NzIGluIHRoaXMgY2FzZSlcbmltcG9ydCAnLi4vY3NzL2FwcC5jc3MnO1xuXG4vLyBOZWVkIGpRdWVyeT8gSW5zdGFsbCBpdCB3aXRoIFwieWFybiBhZGQganF1ZXJ5XCIsIHRoZW4gdW5jb21tZW50IHRvIGltcG9ydCBpdC5cbi8vaW1wb3J0ICQgZnJvbSAnanF1ZXJ5JztcblxuaW1wb3J0ICcuL3ZvdGUnOyIsIiQoZnVuY3Rpb24gKCkge1xuXG4gICAgJCgnW2RhdGEtaWQ9dm90ZUJsb2NrXScpLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICBjb25zdCAkY29udGFpbmVyID0gJCh0aGlzKTtcblxuICAgICAgICAkY29udGFpbmVyLm9uKCdjbGljaycsICdbZGF0YS1pZD12b3RlQnV0dG9uXScsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAgICAgICAgIGNvbnN0IGhyZWYgPSAkKHRoaXMpLmRhdGEoJ2hyZWYnKTtcblxuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICB1cmw6IGhyZWYsXG4gICAgICAgICAgICAgICAgbWV0aG9kOiAnUE9TVCdcbiAgICAgICAgICAgIH0pLnRoZW4oZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgICAgICBjb25zdCAkdm90ZUNvdW50ID0gJGNvbnRhaW5lci5maW5kKCdbZGF0YS1pZD12b3RlQ291bnRdJyk7XG5cbiAgICAgICAgICAgICAgICAkdm90ZUNvdW50LnJlbW92ZUNsYXNzKCd0ZXh0LXN1Y2Nlc3MgdGV4dC1kYW5nZXInKTtcbiAgICAgICAgICAgICAgICBpZiAoZGF0YS52b3RlcyA+IDApIHtcbiAgICAgICAgICAgICAgICAgICAgJHZvdGVDb3VudC5hZGRDbGFzcygndGV4dC1zdWNjZXNzJyk7XG4gICAgICAgICAgICAgICAgfSBlbHNlIGlmKGRhdGEudm90ZXMgPCAwKSB7XG4gICAgICAgICAgICAgICAgICAgICR2b3RlQ291bnQuYWRkQ2xhc3MoJ3RleHQtZGFuZ2VyJyk7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgJHZvdGVDb3VudC50ZXh0KGRhdGEudm90ZXMpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgIH0pO1xuICAgIH0pO1xuXG59KTtcbiJdLCJzb3VyY2VSb290IjoiIn0=