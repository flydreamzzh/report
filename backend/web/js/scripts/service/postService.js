/**
 * Created by Administrator on 2016/12/2.
 */
define(['app'],function(app){
    app.factory('postService',['$http',function($http){
        var doRequest = function(url,data) {
            return $http({
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                method: 'POST',
                url: url,
                data:data
            });
        }
        return {
            post: function(url,data) {
                return doRequest(url,data);
            }
        };
    }]);
})