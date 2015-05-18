angular.module('uchallenge', ['ionic'])

.run(function($ionicPlatform) {

  $ionicPlatform.ready(function() {
    if(window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });

})

.factory('navigationService', function($location){
  return {
    go: function(path) {
      $location.path(path);
      return;
    }
  };
})

.factory('loginService', function($http){
  var url = 'http://localhost:34435/api/';
  var userInfo = {};
  return {
    login: function(user, password) {
      var data = 'nome=' + user + '&senha=' + password + '';
      $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
      return $http.post(url + 'login/', data).then(function(user) {
        userInfo = user.data;
        return user;
      });
    },
    isLogged: function() {
      return userInfo && userInfo.logado > 0 ? true : false;
    }
  };
})

.config(function($stateProvider, $urlRouterProvider) {

  $stateProvider
    
    .state('login', {
      url: '/login',
      templateUrl: 'templates/login.html',
      controller: 'loginCtrl'
    })
    
    .state('main', {
      url: '/main',
      templateUrl: 'templates/main.html',
      controller: 'mainCtrl'
    })
    
    .state('jogo', {
      url: '/jogo',
      templateUrl: 'templates/jogo.html',
      controller: 'jogoCtrl'
    })
    
    ;

  $urlRouterProvider.otherwise('/login');
})

.controller('loginCtrl', function($scope, navigationService){
  angular.extend($scope, {
    navigationService: navigationService
  });
})

.controller('mainCtrl', function($scope, navigationService){
  angular.extend($scope, {
    navigationService: navigationService
  });
})

.controller('jogoCtrl', function($scope, navigationService){
  angular.extend($scope, {
    navigationService: navigationService
  });
})

;
