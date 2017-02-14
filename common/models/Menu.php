<?php

namespace common\models;

use Yii;
use common\lib\TreeTrait;

/**
 * This is the model class for table "Menu".
 *
 * @property string $menu_id
 * @property string $menu_name
 * @property string $menu_url
 * @property string $menu_icon
 * @property integer $is_allow_children
 * @property string $parent
 * @property integer $grade
 * @property integer $lft
 * @property integer $rgt
 * @property integer $ver
 */
class Menu extends \yii\db\ActiveRecord
{
    use TreeTrait;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'menu_name', 'menu_url'], 'required'],
            [['is_allow_children', 'grade', 'lft', 'rgt', 'ver'], 'integer'],
            [['menu_id', 'parent'], 'string', 'max' => 40],
            [['menu_name'], 'string', 'max' => 45],
            [['menu_url'], 'string', 'max' => 1000],
            [['menu_icon'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => Yii::t('app', '节点主键'),
            'menu_name' => Yii::t('app', '节点名称'),
            'menu_url' => Yii::t('app', '节点相对路径'),
            'menu_icon' => Yii::t('app', '节点图标样式'),
            'is_allow_children' => Yii::t('app', '是否允许有子节点'),
            'parent' => Yii::t('app', '父级'),
            'grade' => Yii::t('app', '层级'),
            'lft' => Yii::t('app', '左值'),
            'rgt' => Yii::t('app', '右值'),
            'ver' => Yii::t('app', '版本'),
        ];
    }

    public function setLeftAndRightColumn()
    {
        return ["lft", "rgt"];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MenuQuery(get_called_class());
    }
}
