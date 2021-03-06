<?php

namespace common\models;

use Yii;
use common\base\model\TreeModel;

/**
 * This is the model class for table "Menu".
 *
 * @property string $menu_id
 * @property string $menu_name
 * @property string $menu_url
 * @property string $menu_icon
 * @property integer $is_allow_children
 * @property string $state
 * @property string $abstract
 * @property string $templateUrl
 * @property string $controller
 * @property string $controllerUrl
 * @property string $views
 * @property string $is_end
 * @property integer $lft
 * @property integer $rgt
 * @property integer $ver
 */
class Menu extends TreeModel
{
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
            [['menu_id', 'menu_name', 'menu_url', 'state', 'lft', 'rgt'], 'required'],
            [['is_allow_children', 'lft', 'rgt', 'ver'], 'integer'],
            [['abstract', 'is_end'], 'string'],
            [['menu_id'], 'string', 'max' => 40],
            [['menu_name'], 'string', 'max' => 45],
            [['menu_url', 'state', 'templateUrl', 'controller', 'controllerUrl', 'views'], 'string', 'max' => 255],
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
            'state' => Yii::t('app', '节点路由名称'),
            'abstract' => Yii::t('app', '是否抽象节点'),
            'templateUrl' => Yii::t('app', '页面路径'),
            'controller' => Yii::t('app', '页面JS控制器名称'),
            'controllerUrl' => Yii::t('app', '页面JS控制器路径'),
            'views' => Yii::t('app', '视图展示的配置'),
            'is_end' => Yii::t('app', '是否结束'),
            'lft' => Yii::t('app', '左值'),
            'rgt' => Yii::t('app', '右值'),
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
    public function getButtons()
    {
        return $this->hasMany(Button::className(), ['menu_id' => 'menu_id']);
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
