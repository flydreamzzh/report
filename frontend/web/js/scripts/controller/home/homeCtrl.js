define(['app','css!../../../../css/home/home'],function (app) {
    app.controller('homeCtrl', function($scope) {
    	$scope.user = {username:'',userpass:''};
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
			if(!$scope.user.userpass) {
				$scope.matchpass = 0;
			} else {
				$scope.matchpass = 1;
			}
		}
    });
});