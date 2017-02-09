<?php
namespace common\lib;

use yii\base\Object;
use yii\base\Exception;

/**
 * 建立带左右值的无限归类树
 * class company{
 *      use Tree;
 *      public function setLeftAndRight()
 *      {
 *          return ["lft", "rgt"];
 *      }
 *      public function setGrade()
 *      {
 *          return "grade";
 *      }
 * }
 *
 * @author Administrator
 *        
 */
trait Tree
{

    /**
     * 左值
     * 
     * @var string
     */
    private $left;

    /**
     * 右值
     * 
     * @var string
     */
    private $right;

    /**
     * 等级
     * 
     * @var string
     */
    private $grade;

    /**
     *
     * {@inheritdoc}
     *
     * @see \yii\base\Object::init()
     */
    public function init()
    {
        $lr = $this->setLeftAndRight();
        $grade = $this->setGrade();
        if (is_array($lr) && count($lr) == 2) {
            $this->left = current($lr);
            $this->right = end($lr);
            if (is_string($grade) && ! is_numeric($grade)) {
                $this->grade = $grade;
            } else {
                throw new Exception("无限分类树等级字段名称配置失败");
            }
        } else {
            throw new Exception("无限分类树左右值字段名称配置失败");
        }
    }

    /**
     * example：
     * return ["lft", "rgt"];
     * 设置数据表左右值字段名
     * 
     * @return array
     */
    abstract public function setLeftAndRight();

    /**
     * example：
     * return "grade";
     * 设置数据表等级字段名
     * 
     * @return string
     */
    abstract public function setGrade();
    
    public function tree_add()
    {
        
    }
    
    public function tree_move()
    {
    
    }
    
    public function tree_up()
    {
    
    }
    
    public function tree_down()
    {
    
    }
    
    public function tree_parent()
    {
    
    }
    
    public function tree_directlyChildren()
    {
    
    }
    
    public function tree_children()
    {
    
    }
    
    public function tree_horMove()
    {
    
    }
    
    public function tree_list()
    {
    
    }
    
}