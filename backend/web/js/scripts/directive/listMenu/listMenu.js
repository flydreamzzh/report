/**
 * Created by Administrator on 2017/1/21.
 */
define(['app','style'],function(app,style){
    app.directive("listMenu", function() {
        return {
            restrict : "AE",
            templateUrl : "js/scripts/directive/listMenu/listMenu.html",
            controller : "listMenuCtrl",
        };
    });
    app.controller("listMenuCtrl",["$scope","$state","$http",'style',function($scope,$state,$http,style) {
        $http({
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            method: 'POST',
            url: '/menu/menu',
            async: false,
        }).success(function(data){
            $scope.tree = data;
        });
        $scope.goState = function(state, is_end){
            if(is_end && state)
                $state.go(state);
            style.remove('.body_right');//自行配置
        }
    }]);
});