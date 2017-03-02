<?php

namespace backend\controllers\actions;

use common\base\controllers\BaseAction;
use common\base\model\TreeModel;

/**
 * 分类树操作
 * @author Administrator
 * 
 */
class TreeOperate extends BaseAction
{
    /**
     * AR模型
     * @var TreeModel $model
     */
    public $model;
    
    /**
     * 操作类型
     * @var string $operate
     */
    public $operate;
    
    /**
     * 
     * {@inheritDoc}
     * @see \common\base\controllers\BaseAction::run()
     */
    public function run()
    {
        switch ($this->operate)
        {
            case 'up' :
                return $this->up();
                break;
            case 'down' :
//                 call_user_func_array('down');
                break;
            case 'add' :
//                 call_user_func_array('add');
                break;
            default:
                return ;
        }
    }
    
    public function up()
    {
        if ($this->model) {
            $post = self::sysPost();
            /**@var TreeModel $class*/
            $class = new $this->model();
            $model = $class->findOne([$post['ID']]);
            return $model->tree_moveUp();
        }
        return false;
    }
    
}
