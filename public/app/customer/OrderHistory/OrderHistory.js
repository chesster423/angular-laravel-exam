(function(){
    "use strict";

    angular.module('OrderHistory', ['ui.bootstrap', 'InvoiceRepository'])

    .config(function($interpolateProvider, $httpProvider, $provide) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })

    .constant('BASE_CUSTOMER_ORDER_HISTORY', {
        'API_URL': '/',
        'ASSETS_URL': 'app/customer/OrderHistory/templates/',
    })

    // Directives
    .directive('orderHistory', OrderHistory)

    function OrderHistory(BASE_CUSTOMER_ORDER_HISTORY) {

        return {
            restrict: 'EA',
            scope: {
                userId: '@'
            },
            controller: OrderHistoryController,
            templateUrl: BASE_CUSTOMER_ORDER_HISTORY.API_URL + BASE_CUSTOMER_ORDER_HISTORY.ASSETS_URL + 'index.html?version=1.0.0',
            link: function (scope, element, attributes) {

            }
        }
    }

    function OrderHistoryController($scope, $timeout, $filter, $uibModal, BASE_CUSTOMER_ORDER_HISTORY, $window, $sce, InvoiceRepository) {

        $scope.isOrderHistoryLoading = true;
        $timeout(function(){
            $scope.isOrderHistoryLoading = true;
            $scope.getOrderHistory();
        });

        $scope.getOrderHistory = function(){
            $scope.isOrderHistoryLoading = true;
            InvoiceRepository.get({user_id: $scope.userId}).then(function(response){
                let response_data = response.data.data.rows;
                $scope.isOrderHistoryLoading = false;
            }, function(){
                $scope.isOrderHistoryLoading = false;
            });
        }
    }
})();
