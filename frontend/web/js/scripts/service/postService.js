/**
 * Created by Administrator on 2016/12/2.
 */
define(['app'],function(app){
    app.factory('postService',['$http',function($http){
        var doRequest = function(url) {
            return $http({
                method: 'POST',
                url: url,
            });
        }
        return {
            post: function(url) {
                return doRequest(url);
            }
        };
    }]);
})