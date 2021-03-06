<?php
namespace common\base\controllers;

use yii\web\Controller;
use common\base\interfaces\ContextInterface;
use common\lib\SystemTrait;

/**
 * Base controller
 */
class BaseController extends Controller implements ContextInterface
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
