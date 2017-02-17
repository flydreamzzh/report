<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Menu]].
 *
 * @see \common\models\Menu
 */
class MenuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Menu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Menu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * 为angularJs提供节点路由信息
     * @return array
     */
    public function stateMenu()
    {
        $menu = new \common\models\Menu();
        $menus = $menu->find()->where(['is_end' => true])->andWhere($menu->preCondition())->asArray()->all();
        return $menus;
    }
    
    public function menus()
    {
        $menu = new \common\models\Menu();
        $menus = $menu->tree_list();
        $data = $menu->tree_array($menus);
        return $data;
    }
}
