<?php
namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use frontend\controllers\base\FrontendController;

/**
 * Site controller
 */
class SiteController extends FrontendController
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
    
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }
    
    /**
     * 
     * @return string
     */
    public function actionIndex()
    {
        return $this->renderContent(null);
    }
    
    /**
     * 用户登录
     * @return array
     */
    public function actionLogin()
    {
        $data = $this->post();
        $loginForm = new LoginForm();
        $loginForm->username = $data['username'];
        $loginForm->password = $data['password'];
        if($loginForm->login()) {
            return $this->out([true]);
        }else {
            return $this->out([false,'账号不存在或密码错误']);
        }
    }
}
