/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************************!*\
  !*** ./resources/js/order-app/modules/Order.js ***!
  \*************************************************/
angular.module('OrderModule', []).controller('OrderController', function OrderHistoryController($scope, $http, OrderFactory) {
  _getOrders();
  function _getOrders() {
    OrderFactory.GetOrders().then(function (response) {
      console.log(response);
    });
  }
});
/******/ })()
;