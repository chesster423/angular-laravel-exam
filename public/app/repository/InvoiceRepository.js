(function(){
    "use strict";

    angular.module('InvoiceRepository', [])
        .constant('BASE_INVOICE_REPO', {
            'API_URL': '/api/v1/',
        })
        .factory('InvoiceRepository', InvoiceRepository)

    function InvoiceRepository(BASE_INVOICE_REPO, $http) {

        let api_url = BASE_INVOICE_REPO.API_URL + 'invoices';
        let repo = {};

        repo.get = function(params){
            return $http.get(api_url, {params});
        }

        repo.show = function(id){
            return $http.get(api_url + '/' + id);
        }

        return repo;
    }
})();
