<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Button]].
 *
 * @see \common\models\Button
 */
class ButtonQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Button[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Button|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * 获取当前节点的所有按钮
     * @param string $menu_id 节点主键
     */
    public function menuButtons($menu_id)
    {
        $button = new \common\models\Button();
        $btns = $button->tree_where(['menu_id' => $menu_id])->tree_list();
        return $btns;
    }
}
