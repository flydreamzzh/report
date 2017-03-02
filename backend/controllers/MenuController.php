<?php
namespace backend\controllers;

use Yii;
use backend\controllers\base\BackendController;
use common\models\Menu;

/**
 * Menu controller
 */
class MenuController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'message' => [
                'class' => '\backend\controllers\actions\ARInfo',
                'model' => Menu::className(),
                'index' => 'menu_id'
            ],
            'up' => [
                'class' => '\backend\controllers\actions\TreeOperate',
                'model' => Menu::className(),
                'operate' => 'up'
            ],
            
        ];
    }

    /**
     * 为angularJs提供节点路由信息
     */
    public function actionStatemenu()
    {
        return json_encode((new Menu())->find()->stateMenu());
    }
    
    /**
     * 获取节点树信息
     */
    public function actionMenu()
    {
        return json_encode((new Menu())->find()->menus());
    }
    
}
