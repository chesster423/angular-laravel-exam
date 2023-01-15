angular.module('trial-app', ['OrderModule', 'AuthModule'])
.service("APIService", ["$http", "$q", "$storage", "TokenService", function($http, $q, $storage, TokenService) {
    return {
        MakeRequest : function(url, method, data = {}) {

            var d = $q.defer();

            var headers = {};            

            function generateToken() {

                return new Promise(resolve => {

                    TokenService.RefreshToken().then(function(response){

                        $storage.set('access_token', response.data.original.access_token);

                        var token = $storage.get('access_token');

                        headers = {
                           'Authorization' : 'Bearer ' + token
                        }

                        resolve(headers); 
                            
                    });

                })
 
            }

            function request() {

                $http({
                    method: method,
                    url: url,
                    data: data,
                    headers : headers
                }).then(function (response){
                    d.resolve(response.data);
                },function (error){
                    d.reject(error);
                });

                return d.promise;
            }

            async function exec(){

                const endpoint_exception = ['api/auth/login'];

                if (!endpoint_exception.includes(url)) {
                    await generateToken();
                }

                return request();
            }

            return exec()

        },
    }
}])
.service('OrderService', ['APIService', 'AuthService', function(APIService, AuthService) {
	return {
		GetOrders : function() {
			return APIService.MakeRequest('api/v1/orders', 'GET');
		},
        GetOrderDetails : function(order_id) {
            return APIService.MakeRequest('api/v1/orders/'+order_id, 'GET');
        }
	}
}])
.service('AuthService', ["APIService", function(APIService){
    return {
        Authenticate : function(data) {
            return APIService.MakeRequest('api/auth/login', 'POST', data);
        },
        GetUser : function(data) {
            return APIService.MakeRequest('api/v1/authenticate_user', 'GET');
        },
        Logout : function(data) {
            return APIService.MakeRequest('api/v1/logout', 'GET');
        },
    }
}])
.service('TokenService', ["$http", "$q", "$storage", function($http, $q, $storage){
    return {
        RefreshToken : function() {
            var d = $q.defer();

            var headers = {};

            var token = $storage.get('access_token');
            headers = {
               'Authorization' : 'Bearer ' + token
            }                
            
            $http({
                method: "GET",
                url: 'api/v1/refresh',
                headers : headers
            }).then(function (response){
                d.resolve(response.data);
            },function (error){
                d.reject(error);
            });

            return d.promise;
        },
    }
}])
.factory('$storage', function($window){
  return {
    get: function(key){
      var value = $window.localStorage[key];
      return value ? JSON.parse(value): null;
    },
    set: function(key, value){
      $window.localStorage[key] = JSON.stringify(value);
    },
    remove: function(key){
      $window.localStorage.removeItem(key);
    }
  }
})
.directive('userData', function($storage) {

    var data = $storage.get('user_data');

    var name = "";

    if (data) {
        name = data.user.name;
    }

    return {
        template :
            '<span>'+name+'</span>'
    };
})
.controller('NavController', function NavController($scope, $http, $window, $storage, AuthService) {

    var data = $storage.get('user_data');

    $scope.authenticated = false;

    if (data) {
        $scope.authenticated = true;
    }

    $scope.logout = function() {
        AuthService.Logout().then(function(response) {
            if (response.success) {

                $storage.remove('user_data');
                $storage.remove('access_token');
                $scope.authenticated = false;

                $window.location.href = "/";
                        
            }else{
                alert(response.msg);
            }
        });
    }
})