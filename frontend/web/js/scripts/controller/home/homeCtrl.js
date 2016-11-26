define(['app','css!../../../../css/home/home'],function (app) {
    app.controller('homeCtrl', ['$scope', function($scope) {
    	$scope.modal = {
    			"title": "Title",
    			"content": "Hello Modal <br/>This is a multiline message!"
    	};
    }]);
});
