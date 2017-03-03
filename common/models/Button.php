<?php

namespace common\models;

use Yii;
use common\base\model\TreeModel;

/**
 * This is the model class for table "Button".
 *
 * @property string $button_id
 * @property string $button_code
 * @property string $button_name
 * @property string $menu_id
 * @property string $class
 * @property string $type
 * @property string $icon_class
 * @property string $action
 * @property string $action_url
 * @property string $disabled
 * @property string $remark
 * @property integer $lft
 * @property integer $rgt
 * @property integer $dr
 * @property integer $ver
 *
 * @property Menu $menu
 */
class Button extends TreeModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Button';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['button_id', 'button_code', 'button_name', 'menu_id', 'icon_class'], 'required'],
            [['type'], 'string'],
            [['lft', 'rgt', 'dr', 'ver'], 'integer'],
            [['button_id', 'menu_id', 'class'], 'string', 'max' => 40],
            [['button_code', 'button_name', 'icon_class', 'remark'], 'string', 'max' => 45],
            [['action', 'disabled'], 'string', 'max' => 255],
            [['action_url'], 'string', 'max' => 100],
            [['button_code'], 'unique'],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['menu_id' => 'menu_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'button_id' => Yii::t('app', '按钮主键'),
            'button_code' => Yii::t('app', '按钮编码'),
            'button_name' => Yii::t('app', '按钮名称'),
            'menu_id' => Yii::t('app', '按钮隶属节点'),
            'class' => Yii::t('app', 'Class'),
            'type' => Yii::t('app', '类型'),
            'icon_class' => Yii::t('app', '按钮图标URL'),
            'action' => Yii::t('app', '按钮调用函数'),
            'action_url' => Yii::t('app', '请求路由'),
            'disabled' => Yii::t('app', '按钮约束条件'),
            'remark' => Yii::t('app', '备注'),
            'lft' => Yii::t('app', 'Lft'),
            'rgt' => Yii::t('app', 'Rgt'),
            'dr' => Yii::t('app', '删除标志'),
            'ver' => Yii::t('app', '版本'),
        ];
    }
    
    /**
     * 设置左右值字段名称
     * @return string[]
     */
    public function setLeftAndRightColumn()
    {
        return ["lft", "rgt"];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['menu_id' => 'menu_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ButtonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ButtonQuery(get_called_class());
    }
}
