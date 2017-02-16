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
        $model = Menu::findOne(['menu_id'=>'MENU0005']);
        $parentModel = Menu::findOne(['menu_id'=>'MENU0003']);
//         var_dump($model->tree_getMinLeftAndMaxRight());
//         $model->update();   

        $newmodel = new Menu();
        $newmodel->menu_id = "0006";
        $newmodel->menu_name = "测试1";
        $newmodel->menu_url = '0001';
        $b = (new Menu())->find()->stateMenu();
        return json_encode($b);exit();
    }
    
}
