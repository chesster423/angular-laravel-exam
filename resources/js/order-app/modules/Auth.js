angular.module('AuthModule', [])
.controller('AuthController', function AuthController($scope, $http, $storage, $window, AuthService) {

	$scope.auth = {};

	$scope.login = function() {

		AuthService.Authenticate(angular.copy($scope.auth)).then(function(response) {
			if (response.success) {

				$storage.set('access_token', response.data.token);
				$storage.set('user_data', response.data);

				$window.location.href = "/orders";

			}else{
				alert(response.msg);
			}
		});
	}

})