/**
 * Created by Administrator on 2016/12/3.
 */
define(['app','share','style','listMenu','css!../../../../css/main/layout/layout'],function(app,share,style){
    app.controller('layoutCtrl',function($scope,share,style){
        $scope.navColl = true;
        $scope.toggle = function() {
            style.toggle('.body_right');
        };
        $scope.navClose = function() {
            style.remove('.body_right');
            $scope.navColl = true;
        }
    });
    app.controller('leftNavCtrl',function($scope,share,style){
        angular.element('.left_nav a').on('click',function(){
            style.remove('.body_right');
        });
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