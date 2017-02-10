<?php
namespace backend\controllers;

use yii\filters\VerbFilter;
use backend\controllers\base\BackendController;
use common\models\Menu;

/**
 * @author Administrator
 *
 */
class TestController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        $model = Menu::findOne(['menu_id'=>'MENU0009']);
        $parentModel = Menu::findOne(['menu_id'=>'MENU0006']);
//         var_dump($model->tree_getMinLeftAndMaxRight());
//         $model->updateAllCounters();   

        $newmodel = new Menu();
        $newmodel->menu_id = "0006";
        $newmodel->menu_name = "测试1";
        $newmodel->menu_url = '0001';
        $b = $model->tree_moveNode($parentModel);
        var_dump($b);exit();
    }
    
}
