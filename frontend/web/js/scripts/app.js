define(function (require, exports, module) {
    var angular = require('angular');
    var asyncLoader = require('angular-async-loader');
    require('angular-ui-router');
    require('angular-strap-tpl');
    require('angular-animate');
    require('angular-sanitize');
    require('mobile-angular-ui');
    require('ui-bootstrap');

    var app = angular.module('app', [
        'ui.router',
        'ngAnimate',
        'mgcrea.ngStrap',
        'ngSanitize',
        "mobile-angular-ui",
        "mobile-angular-ui.gestures",
        'ui.bootstrap',
    ]);
    asyncLoader.configure(app);
    module.exports = app;
});
