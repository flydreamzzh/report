<?php
namespace backend\controllers\base;

use Yii;
use common\base\controllers\BaseController;

/**
 * 
 * @author Administrator
 *
 */
class BackendController extends BaseController
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
    
    /**
     * 输出前端数据格式JSON
     * @param array $data
     */
    public function out(array $data)
    {
        return json_encode($data,true);
    }
}
