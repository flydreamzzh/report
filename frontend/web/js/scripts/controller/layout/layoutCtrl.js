/**
 * Created by Administrator on 2016/12/3.
 */
define(['app','css!../../../../css/main/layout/layout'],function(app){
    app.controller('layoutCtrl',function($scope){
        $scope.coll = false;
        $scope.toggle = function() {
            $scope.coll = !$scope.coll;
        };
        $scope.swiped = function(direction) {
            alert('Swiped ' + direction);
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
    //app.config(function($asideProvider) {
    //    angular.extend($asideProvider.defaults, {
    //        container: 'body',
    //        html: true
    //    });
    //})
})