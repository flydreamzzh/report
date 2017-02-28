/**
 * Created by Administrator on 2016/12/3.
 */
define(['app', 'angular-tree',,'ngVerify',"css!../../../../css/main/menu/menu"],function(app){
    app.useModule('treeControl');
    app.useModule('ngVerify');
    app.controller('menuCtrl',["$scope","$timeout","$http","ngVerify",function($scope,$timeout,$http,ngVerify){
        $http({
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            method: 'POST',
            url: '/menu/menu',
            async: false,
        }).success(function(data) {
            $scope.dataForTheTree = data;
            $scope.comparator = false;
        });
        $scope.treeOptions = {
            nodeChildren: "tree_children",
            dirSelectable: true,
            injectClasses: {
                ul: "a1",
                li: "a2",
                liSelected: "a7",
                iExpanded: "a3",
                iCollapsed: "a4",
                iLeaf: "a5",
                label: "a6",
                labelSelected: "a8"
            }
        };
        $scope.showToggle = function(node, expanded, $parentNode, $index, $first, $middle, $last, $odd, $even) {
            console.log(node, expanded, $parentNode, $index, $first, $middle, $last, $odd, $even)
        };
        $scope.openMenu = function(){
            window.a = $timeout(function(){
                angular.element(".menu-message").addClass("menu-show");
            },2000)
        }
        $scope.cancelOpenMenu = function(){
            $timeout.cancel(window.a)
        }
        $scope.showSelected = function(node, selected, $parentNode, $index, $first, $middle, $last, $odd, $even) {
            $scope.menu = {
                menu_name:"fsdfsd",
                menu_url:"fsdfsd",
                state:"fsdfsd",
                abstract:false,
                templateUrl:"fsdfsd",
                controllerUrl:"fsdfsd",
                views:"fsdfsd",
            }
            console.log($scope.menu);
        };
    }]);
})