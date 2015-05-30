angular.module('uchallenge', ['ionic', 'ui.utils', 'ui.map'])

.run(function($ionicPlatform) {

    $ionicPlatform.ready(function() {
        if (window.cordova && window.cordova.plugins.Keyboard) {
            cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
        }
        if (window.StatusBar) {
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
        url: '/jogo/:id',
        templateUrl: 'templates/jogo.html',
        controller: 'jogoCtrl'
    })

    .state('quiz', {
        url: '/quiz/:id',
        templateUrl: 'templates/quiz.html',
        controller: 'quizCtrl'
    })

    .state('problema', {
        url: '/problema/:id',
        templateUrl: 'templates/problema.html',
        controller: 'problemaCtrl'
    })

    .state('conteudo', {
        url: '/conteudo/:id',
        templateUrl: 'templates/conteudo.html',
        controller: 'conteudoCtrl'
    })

    .state('mapa', {
        url: '/mapa/:id',
        templateUrl: 'templates/mapa.html',
        controller: 'mapaCtrl'
    })

    ;

    $urlRouterProvider.otherwise('/main');
})

.factory('configService', function() {
    return {
        url: 'http://uchallenge.com.br/api/'
    };
})

.factory('navigationService', function($location) {
    return {
        go: function(path) {
            $location.path(path);
            return;
        }
    };
})

.factory('loginService', function($http, configService) {
    var userInfo = {};
    return {
        login: function(user, password) {
            var data = 'nome=' + user + '&senha=' + password + '';
            $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
            return $http.post(configService.url + 'login/', data).then(function(user) {
                userInfo = user.data;
                window.localStorage.setItem('login', JSON.stringify(userInfo));
                return user;
            });
        },
        isLogged: function() {
            userInfo = JSON.parse(window.localStorage.getItem('login')) || {};
            return userInfo && userInfo.logado > 0 ? true : false;
        }
    };
})

.controller('loginCtrl', function($scope, navigationService, loginService) {
    if (loginService.isLogged()) {
        navigationService.go('/main');
    };
    angular.extend($scope, {
        navigationService: navigationService,
        login: function(user, password) {
            loginService.login(user, password).then(function(user) {
                if (user && user.data.logado > 0) {
                    navigationService.go('/main');
                } else {
                    $scope.errorMsg = "ERRO: Verifique seu usuário ou senha";
                };
            })
        }
    });
})

.controller('mainCtrl', function($scope, $http, navigationService, loginService, configService) {
    if (!loginService.isLogged()) {
        navigationService.go('/login');
    };
    angular.extend($scope, {
        navigationService: navigationService
    });

    $http.get(configService.url + 'jogos/').then(function(info) {
        $scope.jogos = info.data;
        console.log(info.data);
    });

})

.controller('jogoCtrl', function($scope, $stateParams, navigationService, loginService) {
    if (!loginService.isLogged()) {
        navigationService.go('/');
    };
    angular.extend($scope, {
        navigationService: navigationService,
        idJogo: $stateParams.id
    });
})

.controller('quizCtrl', function($scope, $http, $stateParams, navigationService, loginService, configService) {
    if (!loginService.isLogged()) {
        navigationService.go('/');
    };
    angular.extend($scope, {
        navigationService: navigationService,
        idJogo: $stateParams.id
    });

    $http.get(configService.url + 'quiz/').then(function(info) {
        $scope.jogos = info.data;
        console.log(info.data);
    });

})

.controller('problemaCtrl', function($scope, $stateParams, navigationService, loginService) {
    if (!loginService.isLogged()) {
        navigationService.go('/');
    };
    angular.extend($scope, {
        navigationService: navigationService,
        idJogo: $stateParams.id
    });
})

.controller('conteudoCtrl', function($scope, $stateParams, navigationService, loginService) {
    if (!loginService.isLogged()) {
        navigationService.go('/');
    };
    angular.extend($scope, {
        navigationService: navigationService,
        idJogo: $stateParams.id
    });
})

.controller('mapaCtrl', function($scope, $http, $stateParams, navigationService, loginService, configService) {
    if (!loginService.isLogged()) {
        navigationService.go('/');
    };
    angular.extend($scope, {
        navigationService: navigationService,
        idJogo: $stateParams.id,
        myMarkers: []
    });

    $scope.google = {
        mapOptions: {
            center: new google.maps.LatLng(0, 0),
            zoom: 1,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
    };

    var jogo = {};

    $http.get(configService.url + 'jogoambiente/' + $stateParams.id).then(function(info) {
        jogo = info.data;
        $scope.google.map.panTo(new google.maps.LatLng(jogo.lat, jogo.lng));
        $scope.google.map.setZoom(parseInt(jogo.zoom));
    });

    $scope.loadMarkers = function() {
        if ($scope.myMarkers.length < 1) {
            jogo.desafios.map(function(d) {
                $scope.myMarkers.push(new google.maps.Marker({
                    position: new google.maps.LatLng(d.lat, d.lng),
                    map: $scope.google.map,
                    title: d.nome
                }));
            });
        };
    };

})

;

function onDeviceReady() {
    angular.bootstrap(document, ['uchallenge']);
};

function onGoogleReady() {
    //document.addEventListener("deviceready", onDeviceReady, false);
    onDeviceReady();
}
