<?php

namespace backend\modules\log\controllers;

use yii\web\Controller;
use backend\modules\log\controllers\base\BaseController;

/**
 * Log controller for the `log` module
 */
class LogController extends BaseController
{
    /**
     * 
     * {@inheritDoc}
     * @see \yii\base\Controller::actions()
     */
    public function actions()
    {
        return [
            'table' => [
                'class' => '\backend\modules\log\controllers\actions\Table'
            ]
        ];
    }
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
