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

.factory('configService', function(){
  return {
    url: 'http://localhost:34435/api/'
  };
})

.factory('navigationService', function($location){
  return {
    go: function(path) {
      $location.path(path);
      return;
    }
  };
})

.factory('loginService', function($http, configService){
  var userInfo = {};
  return {
    login: function(user, password) {
      var data = 'nome=' + user + '&senha=' + password + '';
      $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
      return $http.post(configService.url + 'login/', data).then(function(user) {
        userInfo = user.data;
        return user;
      });
    },
    isLogged: function() {
      return userInfo && userInfo.logado > 0 ? true : false;
    }
  };
})

.controller('loginCtrl', function($scope, navigationService, loginService){
  if (loginService.isLogged()) { navigationService.go('/main'); };
  angular.extend($scope, {
    navigationService: navigationService,
    login: function(user,password) {
      loginService.login(user,password).then(function(user){
        if (user && user.data.logado > 0) {
          navigationService.go('/main');
        } else {
          $scope.errorMsg = "ERRO: Verifique seu usuário ou senha";
        };
      })
    }
  });
})

.controller('mainCtrl', function($scope, $http, navigationService, loginService, configService){
  if (!loginService.isLogged()) { navigationService.go('/'); };
  angular.extend($scope, {
    navigationService: navigationService
  });

  $http.get(configService.url + 'jogos/').then(function(info) {
    $scope.jogos = info.data;
    console.log(info.data);
  });

})

.controller('jogoCtrl', function($scope, navigationService, loginService){
  if (!loginService.isLogged()) { navigationService.go('/'); };
  angular.extend($scope, {
    navigationService: navigationService
  });
})

;
