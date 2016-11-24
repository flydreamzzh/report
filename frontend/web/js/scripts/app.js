define(function (require, exports, module) {
    var angular = require('angular');
    var asyncLoader = require('angular-async-loader');
    require('angular-ui-router');
    require('angular-strap-tpl');
    
    var app = angular.module('app', ['ui.router','mgcrea.ngStrap']);
    asyncLoader.configure(app);
    module.exports = app;
});
