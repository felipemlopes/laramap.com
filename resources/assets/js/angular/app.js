var app = angular.module('laramapNG', ['google.places', 'jcs-autoValidate'], ['$httpProvider', function($httpProvider) {

    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
    $httpProvider.defaults.headers.common['X-Requested-With'] = "XMLHttpRequest";
    $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=_token]').attr('content');
}]);

app.controller('RegisterController', function($scope, $http) {
    $scope.place = null;
    $scope.formModel = {};
});