define(['app'],function (app) {
    app.run(['$state', '$stateParams', '$rootScope', function ($state, $stateParams, $rootScope) {
        $rootScope.$state = $state;
        $rootScope.$stateParams = $stateParams;
    }]);

    app.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
        $urlRouterProvider.otherwise('/layout');

        //$stateProvider
        //    .state('layout', {
        //        url: '/layout',
        //        // This will get automatically plugged into the unnamed ui-view
        //        // of the parent state template. Since this is a top level state,
        //        // its parent state template is index.html.
        //        templateUrl: 'view/main/layout/layout.html',
        //        controllerUrl: 'scripts/controller/layout/layoutCtrl',
        //        controller: 'layoutCtrl'
        //    })
        //    .state('layout.home', {
        //        views: {
        //            ////////////////////////////////////
        //            // Relative Targeting             //
        //            // Targets parent state ui-view's //
        //            ////////////////////////////////////
        //
        //            // Relatively targets the 'detail' view in this state's parent state, 'contacts'.
        //            // <div ui-view='detail'/> within contacts.html
        //            "user" : {
        //                templateUrl: 'view/main/user/user.html',
        //                controllerUrl: 'scripts/controller/user/userCtrl',
        //                controller: 'userCtrl',
        //            }
        //        },
        //
        //
        //        });


        $stateProvider
            .state('login', {
                url: '/login',
                templateUrl: 'view/login/login.html',
                controllerUrl: 'scripts/controller/login/loginCtrl',
                //controller: 'loginCtrl',
            }).state('layout', {
                //abstract: true,
                url: '/layout',
                templateUrl: 'view/main/layout/layout.html',
                controllerUrl: 'scripts/controller/layout/layoutCtrl',
                //controller: 'layoutCtrl',
            }).state('layout.home', {
                url: '/home',
                templateUrl: 'view/main/home/home.html',
                controllerUrl: 'scripts/controller/home/homeCtrl',
                //controller: 'homeCtrl',
            }).state('layout.user',{
                url: '/user',
                templateUrl: 'view/main/user/user.html',
                controllerUrl: 'scripts/controller/user/userCtrl',
                //controller: 'userCtrl',
            });
    }]);
});
