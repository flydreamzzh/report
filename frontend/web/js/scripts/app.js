define(function (require, exports, module) {
    var angular = require('angular');
    var asyncLoader = require('angular-async-loader');
    require('angular-ui-router');
    require('angular-strap-tpl');
    require('angular-animate');
    require('angular-sanitize');

    var app = angular.module('app', ['ui.router','ngAnimate','mgcrea.ngStrap','ngSanitize']);
    asyncLoader.configure(app);
    module.exports = app;
});
