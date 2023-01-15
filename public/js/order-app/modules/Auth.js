/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!************************************************!*\
  !*** ./resources/js/order-app/modules/Auth.js ***!
  \************************************************/
angular.module('AuthModule', []).controller('AuthController', function AuthController($scope, $http, $storage, $window, AuthService) {
  $storage.remove('access_token');
  $scope.auth = {};
  $scope.login = function () {
    AuthService.Authenticate(angular.copy($scope.auth)).then(function (response) {
      if (response.success) {
        $storage.set('access_token', response.data.token);
        $storage.set('user_data', response.data);
        $window.location.href = "/orders";
      } else {
        alert(response.msg);
      }
    });
  };
});
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*************************************************!*\
  !*** ./resources/js/order-app/modules/Order.js ***!
  \*************************************************/
angular.module('OrderModule', []).controller('OrderController', function OrderHistoryController($scope, $http, OrderService, AuthService) {
  $scope.orders = [];
  $scope.order_details = [];
  $scope.is_loading = false;
  _getOrders();
  function _getOrders() {
    $scope.is_loading = true;
    OrderService.GetOrders().then(function (response) {
      if (response.success) {
        $scope.orders = response.data;
      }
      $scope.is_loading = false;
    });
  }
  $scope.viewDetails = function (order_id, index) {
    OrderService.GetOrderDetails(order_id).then(function (response) {
      if (response.success) {
        $scope.orders[index].order_details = response.data;
        $scope.order_details = $scope.orders[index].order_details;
        if (!$scope.$$phase) {
          $scope.$apply();
        }
      }
      $scope.is_loading = false;
    });
  };
});
})();

/******/ })()
;