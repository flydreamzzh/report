<?php
namespace common\behavior;

use common\base\controllers\BaseController;
use yii\base\Behavior;

/**
 * 记录日志
 * @author Administrator
 *
 */
class LoggingBehavior extends Behavior
{
    
    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            BaseController::EVENT_AFTER_ACTION => 'saveLog'
        ];
    }
    
    
    /**
     * 
     * {@inheritDoc}
     * @see \yii\base\Controller::afterAction()
     */
    public function saveLog(){
        
    }
}

