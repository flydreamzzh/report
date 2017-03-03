<?php
namespace backend\controllers;

use yii\filters\VerbFilter;
use backend\controllers\base\BackendController;
use common\models\Menu;
use common\models\Button;

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
//         var_dump((new Query())->where(['>','lft', 5])->createCommand()->execute());exit();
        var_dump(((new Menu())->tree_where([['>','lft', 5],'lft'=>10])->tree_list()));exit();
        var_dump((new Button())->find()->menuButtons('s'));exit();
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
