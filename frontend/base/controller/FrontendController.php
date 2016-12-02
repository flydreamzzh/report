<?php
namespace frontend\base\controller;

use Yii;
use common\base\controller\BaseController;

/**
 * 
 * @author Administrator
 *
 */
class FrontendController extends BaseController
{
    public $layout = 'main';
    
    /**
     * 获取post请求过来的数据
     * @return mixed|array|null
     */
    public function post()
    {
        $post = Yii::$app->request->post();
        $RawBody = json_decode(Yii::$app->request->getRawBody(),true);
        $request = $post?$post:$RawBody;
        return $request;
    }
}
