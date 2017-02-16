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
        'mobile-angular-ui':'lib/mobile-angular-ui-1.2.0/dist/js/mobile-angular-ui.min',
        'mobile-angular-ui-core':'lib/mobile-angular-ui-1.2.0/dist/js/mobile-angular-ui.core.min',
        'mobile-angular-ui-gestures':'lib/mobile-angular-ui-1.2.0/dist/js/mobile-angular-ui.gestures.min',
        'mobile-angular-ui.components':'lib/mobile-angular-ui-1.2.0/dist/js/mobile-angular-ui.components.min',
        'ui-bootstrap':'lib/ui-bootstrap/ui-bootstrap-tpls-2.3.1.min',
        'handsontable':'lib/handsontable/dist/defineHandsontable',
        'handsontable-full':'lib/handsontable/dist/handsontable.full.min',
        'ngHandsontable':'lib/ngHandsontable/dist/ngHandsontable.min',
        'app': 'scripts/app',
        /**********************   Service  **************************/
        'post':'scripts/service/postFactory',
        'share':'scripts/service/shareFactory',
        'style':'scripts/service/styleFactory',
        /**********************  directive **************************/
        'listMenu':'scripts/directive/listMenu/listMenu',
    },
    shim: {
        'angular': {exports: 'angular'},
        'angular-animate': ['angular'],
        'angular-ui-router': ['angular'],
        'angular-strap': ['angular'],
        'angular-sanitize': ['angular'],
        'angular-strap-tpl': ['angular','angular-strap'],
        'mobile-angular-ui':['angular','mobile-angular-ui-core','mobile-angular-ui-gestures','mobile-angular-ui.components'],
        'app': ['angular'],
        'ngHandsontable':['handsontable','handsontable-full','css!../../../js/lib/handsontable/dist/handsontable.full.min.css']
    },
    map: {
        '*': {
            'css': 'lib/require-css/css.min'
        }
    },
    deps: [
            'css!../css/angular-motion/dist/angular-motion.min.css',
            'css!../css/bootstrap-additions-master/dist/bootstrap-additions.min.css',
            'css!../../../js/lib/mobile-angular-ui-1.2.0/dist/css/mobile-angular-ui-hover.min.css',
            'css!../../../js/lib/mobile-angular-ui-1.2.0/dist/css/mobile-angular-ui-base.min.css',
            'css!../../../js/lib/mobile-angular-ui-1.2.0/dist/css/mobile-angular-ui-desktop.min.css',
            'css!../css/app.css'
       ]
});

require(['angular','./app-routes'], function (angular) {
    angular.element(document).ready(function () {
        angular.bootstrap(document, ['app']);
        angular.element(document).find('html').addClass('ng-app');
    });
});

