/**
 * Created by Administrator on 2016/12/2.
 */
define(['app'],function(app){
    app.factory('share',function(){
        var param = {
            leftColl : true,
            navColl : true
        };
        var factory = {};
        factory.get = function(name) {
            return param[name];
        }
        factory.set = function(name,value) {
            param[name] = value;
        }
        return factory;
    });
})