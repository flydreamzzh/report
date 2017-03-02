/**
 * Created by Administrator on 2017/1/21.
 */
define(['app','share'],function(app,share){
    app.directive("listButton", function() {
        return {
            restrict : "AE",
            templateUrl : "js/scripts/directive/listButton/listButton.html",
            controller : "listButtonCtrl",
        };
    });
    app.controller("listButtonCtrl",["$scope","$state","$http","$location",'share',function($scope,$state,$http,$location,share) {
        //$http({
        //    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        //    method: 'POST',
        //    url: '/menu/button',
        //    async: false,
        //    data: {
        //
        //    }
        //}).success(function(data){
        //
        //});
        var path =  $location.path().replace(/\//g, ".");
        var state = path.substring(1,path.length);
        if ($state.get(state)) {
            console.log('fds')
        }
    }]);
});