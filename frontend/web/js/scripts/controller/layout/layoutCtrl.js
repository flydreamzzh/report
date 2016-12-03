/**
 * Created by Administrator on 2016/12/3.
 */
define(['app'],function(app){
    app.controller('layoutCtrl',function($scope){
        angular.element(document).find('html').removeClass('ng-app');
        angular.element(document).find('#layout').addClass('ng-app');
    });
})