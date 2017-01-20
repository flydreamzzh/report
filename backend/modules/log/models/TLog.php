<?php

namespace backend\modules\log\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "TLog".
 *
 * @property string $log_id
 * @property integer $user_id
 * @property string $url
 * @property string $address
 * @property string $message
 * @property string $created_at
 *
 * @property User $user
 */
class TLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TLog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['log_id', 'user_id', 'url', 'created_at'], 'required'],
            [['user_id'], 'integer'],
            [['created_at'], 'safe'],
            [['log_id'], 'string', 'max' => 40],
            [['url'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 100],
            [['message'], 'string', 'max' => 1000],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'log_id' => Yii::t('app', '操作日志主键'),
            'user_id' => Yii::t('app', '用户主健'),
            'url' => Yii::t('app', '请求路径'),
            'address' => Yii::t('app', '主机地址'),
            'message' => Yii::t('app', '日志信息'),
            'created_at' => Yii::t('app', '创建时间'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return \backend\modules\log\models\query\TLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\log\models\query\TLogQuery(get_called_class());
    }
}
