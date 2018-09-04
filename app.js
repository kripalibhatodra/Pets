

// Declare app level module which depends on views, and components
angular.module('myApp', [
  'ngRoute',
  'myApp.sell',
  'myApp.login',
  'myApp.signup',
  'myApp.version',
    'myApp.mypets'
]).
config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
  $locationProvider.hashPrefix('!');


}]);
