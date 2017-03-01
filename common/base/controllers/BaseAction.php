<?php
namespace common\base\controllers;

use yii\web\Controller;
use common\lib\SystemTrait;
use yii\base\Action;

/**
 * Base controller
 */
class BaseAction extends Action
{
    use SystemTrait;
    /**
     * 
     * {@inheritDoc}
     * @see \yii\base\Component::behaviors()
     */
    public function behaviors()
    {
        return [
            'logging' => [
                'class' => '\common\behavior\LoggingBehavior'
            ],
        ];
    }
}
