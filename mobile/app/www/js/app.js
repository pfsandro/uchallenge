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
