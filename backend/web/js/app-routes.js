define(['app'],function (app) {
    app.config(
        [
            '$controllerProvider', '$compileProvider', '$filterProvider', '$provide', '$locationProvider', '$urlRouterProvider', '$stateProvider', '$httpProvider',
            function ($controllerProvider, $compileProvider, $filterProvider, $provide, $locationProvider, $urlRouterProvider, $stateProvider, $httpProvider) {
                app.controller = $controllerProvider.register;
                app.directive = $compileProvider.directive;
                app.filter = $filterProvider.register;
                app.factory = $provide.factory;
                app.service = $provide.service;
                app.constant = $provide.constant;
                app.value = $provide.value;
                $urlRouterProvider.deferIntercept(false);
                $locationProvider.html5Mode({enabled: false});
                $urlRouterProviderRef = $urlRouterProvider;
                $stateProviderRef = $stateProvider;
            }
        ]);
    app.run(['$state', '$stateParams','$urlRouter', '$rootScope','$http', function ($state, $stateParams, $urlRouter, $rootScope,$http) {
        $rootScope.$state = $state;
        $rootScope.$stateParams = $stateParams;
        $stateProviderRef
            .state('login', {
                url: '/login',
                templateUrl: 'view/login/login.html',
                controllerUrl: 'scripts/controller/login/loginCtrl',
                //controller: 'loginCtrl',
            }).state('layout', {
                abstract: true,
                url: '/layout',
                templateUrl: 'view/main/layout/layout.html',
                controllerUrl: 'scripts/controller/layout/layoutCtrl',
                controller: 'layoutCtrl',
            });
        $http({
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            method: 'POST',
            url: '/menu/statemenu',
            async: false,
        }).success(function(data,header,config,status){
            angular.forEach(data,function(value, key){
                $stateProviderRef
                    .state(value.state, {
                        url: value.menu_url,
                        templateUrl: value.templateUrl,
                        controllerUrl: value.controllerUrl,
                        controller: value.controller,
                })
            });
            $urlRouter.sync();
            $urlRouter.listen();
            $urlRouterProviderRef.otherwise('/layout/home');
        });
    }]);


});
