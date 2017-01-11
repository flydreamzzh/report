/**
 * Created by Administrator on 2016/12/3.
 */
define(['app','style','css!../../../../css/main/user/user'],function(app,style){
    app.controller('userCtrl',function($scope,style){
        $scope.showFun = function() {
            style.toggle('.userInfo');
        }
        angular.element('.user-chose, .users, .userInfo>ul li').on('click',function(){
            style.remove('.userInfo');
        })
        angular.element('.userInfo>ul li').on('click',function(){
            alert('dd');
            style.remove('.userInfo');
        })
    });
})