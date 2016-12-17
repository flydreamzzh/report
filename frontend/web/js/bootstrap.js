require.config({
    baseUrl: 'js',
    paths: {
        'angular': 'lib/angular/angular.min',
        'angular-animate': 'lib/angular-animate/angular-animate.min',
        'angular-ui-router': 'lib/angular-ui-router/release/angular-ui-router.min',
        'angular-async-loader': 'lib/angular-async-loader/angular-async-loader.min',
        'angular-ui-mask': 'lib/angular-ui-mask/dist/mask.min',
        'ng-tags-input': 'lib/ng-tags-input/build/ng-tags-input.min',
        'ng-file-upload': 'lib/ng-file-upload/dist/ng-file-upload-all.min',
        'angular-strap': 'lib/angular-strap/dist/angular-strap.min',
        'angular-strap-tpl': 'lib/angular-strap/dist/angular-strap.tpl.min',
        'angular-sanitize': 'lib/angular-sanitize/angular-sanitize.min',
        'app': 'scripts/app',
        /**********************   Service  **************************/
        'post':'scripts/service/postService',
    },
    shim: {
        'angular': {exports: 'angular'},
        'angular-animate': ['angular'],
        'angular-ui-router': ['angular'],
        'angular-strap': ['angular'],
        'angular-strap-tpl': ['angular','angular-strap'],
        'app': ['angular'],
    },
    map: {
        '*': {
            'css': 'lib/require-css/css.min'
        }
    },
    deps: [
            'css!../css/angular-motion/dist/angular-motion.min.css',
            'css!../css/bootstrap-additions-master/dist/bootstrap-additions.min.css',
            'css!../css/app.css'
       ]
});

require(['angular','./app-routes'], function (angular) {
    angular.element(document).ready(function () {
        angular.bootstrap(document, ['app']);
        angular.element(document).find('html').addClass('ng-app');
    });
});

