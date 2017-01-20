<?php

namespace backend\modules\log\models\query;

/**
 * This is the ActiveQuery class for [[\backend\modules\log\models\TLog]].
 *
 * @see \backend\modules\log\models\TLog
 */
class TLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \backend\modules\log\models\TLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\modules\log\models\TLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
