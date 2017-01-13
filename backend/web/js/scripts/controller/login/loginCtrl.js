define(['app','css!../../../../css/login/login'],function (app) {
    app.controller('loginCtrl', function($scope,$http,$location) {
    	$scope.user = {username:'',password:''};
		$scope.checkuser = function(){
			if(!$scope.user.username) {
				$scope.matchuser = 0;
			} else if($scope.user.username.match(/^[a-zA-Z0-9]{5,15}$/)) {
				$scope.matchuser = 1;
			} else {
				$scope.matchuser = 2;
			}
		}
		$scope.checkpass = function(){
			if(!$scope.user.password) {
				$scope.matchpass = 0;
			} else {
				$scope.matchpass = 1;
			}
		}
		$scope.login = function(){
			$http({
				method:'post',
				url:'/site/login',
				data:$scope.user,
			}).success(function(response){
				console.log(response);
			});
		}

    });
});