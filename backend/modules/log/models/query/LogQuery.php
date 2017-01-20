<?php

namespace backend\modules\log\models\query;

/**
 * This is the ActiveQuery class for [[\backend\modules\log\models\Log]].
 *
 * @see \backend\modules\log\models\Log
 */
class LogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \backend\modules\log\models\Log[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\modules\log\models\Log|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
