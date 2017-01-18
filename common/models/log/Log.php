<?php

namespace common\models\log;

use Yii;
use common\models\User;

/**
 * This is the model class for table "log".
 *
 * @property string $log_id
 * @property integer $user_id
 * @property string $message
 * @property string $level
 * @property string $url
 * @property string $address
 * @property string $created_at
 *
 * @property User $user
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['log_id', 'user_id', 'message', 'url', 'created_at'], 'required'],
            [['user_id'], 'integer'],
            [['level'], 'string'],
            [['created_at'], 'safe'],
            [['log_id'], 'string', 'max' => 40],
            [['message'], 'string', 'max' => 1000],
            [['url'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 100],
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
            'message' => Yii::t('app', '日志信息'),
            'level' => Yii::t('app', 'FATAL:致命错误;ERROR:错误信息;WARNING:警告信息;INFO:提示信息'),
            'url' => Yii::t('app', '请求路径'),
            'address' => Yii::t('app', '主机地址'),
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
     * @return \common\models\query\log\LogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\log\LogQuery(get_called_class());
    }
}
