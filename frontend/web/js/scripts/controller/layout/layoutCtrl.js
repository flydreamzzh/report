/**
 * Created by Administrator on 2016/12/3.
 */
define(['app','css!../../../../css/main/layout/layout'],function(app){
    app.controller('layoutCtrl',function($scope){
        $scope.aa = true;
        $scope.coll = false;
        $scope.toggle = function() {
            $scope.coll = !$scope.coll;
        };
        $scope.closeLeft = function(direction) {
            if(direction=='LEFT') {
                $scope.coll = true;
            }else {
                $scope.coll = false;
            }
        };
    });
    app.controller('userLoginCtrl',function($scope){
        $scope.ngShow = function() {
            $scope.bgshow = true;
        };
        $scope.ngHide = function() {
            $scope.bgshow = false;
        };

    });
})