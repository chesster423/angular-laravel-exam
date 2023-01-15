angular.module('trial-app', ['OrderModule', 'AuthModule'])
.service("APIService", ["$http", "$q", "$storage", "TokenService", function($http, $q, $storage, TokenService) {
    return {
        MakeRequest : function(url, method, data = {}) {

            var d = $q.defer();

            var headers = {};

            async function exec(){
                await generateToken();
            }

            function generateToken() {

                return new Promise(resolve => {

                    TokenService.RefreshToken().then(function(response){

                        console.log('the token');
                        console.log(response.data.original.access_token);

                        $storage.set('access_token', response.data.original.access_token);

                        var token = $storage.get('access_token');

                        console.log(token);

                        headers = {
                           'Authorization' : 'Bearer ' + token
                        }
                            
                    });

                    resolve(headers); 

                })
 
            }

            if (url != 'api/auth/login') {
                exec();

                console.log('here');
                console.log(headers);
            }


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