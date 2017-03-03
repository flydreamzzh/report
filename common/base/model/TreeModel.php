<?php
namespace common\base\model;

use common\lib\TreeTrait;

/**
 * 基础树类
 * @author Administrator
 * @method array setLeftAndRightColumn 树左右字段名
 * @method array preCondition 树查询前提条件
 */
abstract class TreeModel extends BaseModel
{
    use TreeTrait;
    
}