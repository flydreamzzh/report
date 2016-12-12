/**
 * Created by Administrator on 2016/12/3.
 */
define(['app','css!../../../../css/main/layout/layout'],function(app){
    app.controller('layoutCtrl',function($scope){

    });

    app.controller('userLoginCtrl',function($scope){
        $scope.ngShow = function(){
            $scope.myCheck = true;
            $scope.myCheck = true;
            angular.element('.userLoginBg').addClass('bdfade');
        }
        $scope.ngHide = function(){
            $scope.myCheck = false;
            angular.element('.userLoginBg').removeClass('bdfade');
        }
    });
})