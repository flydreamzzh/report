<?php
namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use backend\controllers\base\BackendController;

/**
 * Site controller
 */
class SiteController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(),[
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
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
