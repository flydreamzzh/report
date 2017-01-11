/**
 * Created by Administrator on 2016/12/2.
 */
define(['app','share'],function(app,share){
    app.factory('style',function(share){
        /**
         * 共享判断资源
         * @type {{.body_right: string}}
         */
        var relevant = {
            '.body_right':'leftColl',
            '.navbar-collapse':'navColl',
            '.userInfo':'showFun',
        }
        /**
         * 节点对应相关样式
         * @type {{.body_right: string}}
         */
        var stable = {
            '.body_right':'body_right_collapse',
            '.sky_main_head .navbar-collapse':'in',
            '.userInfo':'showFun',
        };
        var factory = {};
        factory.add = function(name) {
            angular.element(name).addClass(stable[name]);
            share.set(relevant[name], false);
        }
        factory.remove = function(name) {
            angular.element(name).removeClass(stable[name]);
            share.set(relevant[name], true);
        }
        factory.toggle = function(name) {
            var flag = share.get(relevant[name]);
            if(flag) {
                angular.element(name).addClass(stable[name]);
            } else {
                angular.element(name).removeClass(stable[name]);
            }
            share.set(relevant[name], ! flag);
        }
        return factory;
    });
})