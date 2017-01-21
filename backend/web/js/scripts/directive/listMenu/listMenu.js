/**
 * Created by Administrator on 2017/1/21.
 */
define(['app'],function(app){
    app.directive("listMenu", function() {
        return {
            restrict : "AE",
            templateUrl : "js/scripts/directive/listMenu/listMenu.html",
            controller : function($scope) {
                console.log('ss');
            }
        };
    });
});