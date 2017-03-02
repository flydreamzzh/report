<?php
namespace common\base\controllers;

use common\lib\SystemTrait;
use yii\base\Action;

/**
 * 
 * @author Administrator
 * @method string run
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
