<?php

namespace backend\controllers\actions;

use yii\db\ActiveRecord;
use common\base\controllers\BaseAction;

/**
 * 查找当前模型的一行实例数据
 * @author Administrator
 * 
 */
class ARInfo extends BaseAction
{
    /**
     * AR模型
     * @var ActiveRecord $model
     */
    public $model;
    
    /**
     * Example:
     * 1) 'id'
     * 2)  ['data', 'id'] 数据中的data数据，data数据中id值
     * 前端请求数据中的主键位置(key)
     * @var string|array $value
     */
    public $index;
    
    /**
     * 执行方法
     */
    public function run()
    {
        if($this->model) {
            $value = self::sysPost($this->index);
            /**@var ActiveRecord $model*/
            $model = new $this->model();
            $data = $model->find()->where([$model->primaryKey()[0] => $value])->asArray()->one();
            return self::sysOut($data);
        }
        return self::sysOut("获取信息失败", false);
    }
}
