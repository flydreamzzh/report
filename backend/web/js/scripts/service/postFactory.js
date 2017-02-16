/**
 * Created by Administrator on 2016/12/2.
 */
define(['app'],function(app){
    app.factory('post',['$http',function($http){
        var doRequest = function(url,data) {
            return $http({
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                method: 'POST',
                url: url,
                data:data
            });
        }
        return {
            load: function(url,data) {
                return doRequest(url,data);
            }
        };
    }]);
})