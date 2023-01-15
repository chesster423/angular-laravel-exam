angular.module('OrderModule', [])
.controller('OrderController', function OrderHistoryController($scope, $http, OrderService, AuthService) {

	$scope.orders = [];
	$scope.order_details = [];
	$scope.is_loading = false;

	_getOrders();
	
	function _getOrders() {

		$scope.is_loading = true;

		OrderService.GetOrders().then(function(response) {

			if (response.success) {
				$scope.orders = response.data;
			}

			$scope.is_loading = false;
		})
	}

	
	$scope.viewDetails = function(order_id, index) {

		OrderService.GetOrderDetails(order_id).then(function(response) {

			if (response.success) {
				$scope.orders[ index ].order_details = response.data;

				$scope.order_details = $scope.orders[ index ].order_details;

				if(!$scope.$$phase) {
				  $scope.$apply();
				}
				
			}

			$scope.is_loading = false;

		})

	}
})