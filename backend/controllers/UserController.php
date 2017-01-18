<?php
namespace backend\controllers;

use yii\filters\VerbFilter;
use backend\controllers\base\BackendController;

/**
 * 用户信息管理
 * @author Administrator
 *
 */
class UserController extends BackendController
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
    
}
