<?php
namespace common\lib;

use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * 建立带左右值的无限归类树
 * class company{
 *      use TreeTrait;
 *      public function setLeftAndRightColumn()
 *      {
 *          return ["lft", "rgt"];
 *      }
 *      public function setGradeColumn()
 *      {
 *          return "grade";
 *      }
 *      public function preCondition()
 *      {
 *          return ['<','grade',3];
 *      }
 * }
 *
 * @author Administrator
 *        
 */
trait TreeTrait
{
    /**
     * 左值字段名
     * 
     * @var string
     */
    private $left;

    /**
     * 右值字段名
     * 
     * @var string
     */
    private $right;

    /**
     * 等级字段名
     * 
     * @var string
     */
    private $grade;
    
    /**
     * 前置查询条件
     *
     * @var string
     */
    private $preCondition = [];
    
    /**
     * 默认数据表最小左值
     * @var number 
     */
    private $minLeft = 0;

    /**
     * 初始化类数据库字段信息
     * @throws Exception
     */
    public function __construct()
    {
        $lr = $this->setLeftAndRightColumn();
        $grade = $this->setGradeColumn();
        $preCondition = $this->preCondition();
        if (is_array($lr) && count($lr) == 2) {
            $this->left = min($lr);
            $this->right = max($lr);
            if (is_string($grade) && ! is_numeric($grade)) {
                $this->grade = $grade;
            } else {
                throw new Exception("无限分类树等级字段名称配置失败");
            }
        } else {
            throw new Exception("无限分类树左右值字段名称配置失败");
        }
        if (is_array($preCondition)) {
            $this->preCondition = $preCondition;
        }
    }

    /**
     * example：
     * return ["lft", "rgt"];
     * 设置数据表左右值字段名
     * 
     * @return array
     */
    abstract public function setLeftAndRightColumn();

    /**
     * example：
     * return "grade";
     * 设置数据表等级字段名
     * 
     * @return string
     */
    abstract public function setGradeColumn();
    
    /**
     * example：Yii2 AR模型的查询条件格式
     * return ['<','grade',3];
     * 无限分类树数据表前置查询条件
     * @return array
     */
    public function preCondition()
    {
        return [];
    }
    
    /**
     * Example：
     * return [0,10];
     * 获取当前对象的左右值数组
     * @return array
     * @throws Exception
     */
    public function tree_getLeftAndRight($model = NULL)
    {
        if (! $model) {
            if (! $this->isNewRecord) {
                $left = $this->{$this->left};
                $right = $this->{$this->right};
            } else {
                throw new Exception("查询对象必须在已存在");  
            }
        } else {
            if (! $model->isNewRecord) {
                $left = $model->{$this->left};
                $right = $model->{$this->right};
            } else {
                throw new Exception("查询对象必须在已存在");  
            }
        }
        if (is_numeric($left) && is_numeric($right) && $left != $right) {
            return [$left, $right];
        } else {
            throw new Exception("当前对象左右值数据异常");
        }
    }
    
    /**
     * Example：
     * return [0,100];
     * 获取当前数据表的最小左值和最大右值
     * @return array|null 
     * @throws Exception
     */
    public function tree_getMinLeftAndMaxRight()
    {
        $left = (new Query())->where($this->preCondition())->from($this->tableName())->min($this->left);
        $right = (new Query())->where($this->preCondition())->from($this->tableName())->max($this->right);
        if(is_numeric($left) && is_numeric($right)) {
            return [(int)$left, (int)$right];
        } else {
            return null;
        }
    }

    /**
     * 将当前对象（不论新旧）设置为顶级节点
     * 
     * @return boolean
     */
    public function tree_setTopNode()
    {
        $mlr = $this->tree_getMinLeftAndMaxRight();
        $right = ! $mlr ? $this->minLeft : max($mlr) + 1;
        if ($this->isNewRecord) {
            $this->{$this->left} = $right;
            $this->{$this->right} = $right + 1;
            if ($this->save()) {
                return true;
            }
        } else {
            if ($this->tree_isTopNode())
                return true;
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $lr = $this->tree_getLeftAndRight();
                $dif = $mlr[1] - $lr[0] + 1;
                $models = $this->find()
                    ->where(['>=', $this->left, min($lr)])
                    ->andWhere(['<=', $this->right, max($lr)])
                    ->andWhere($this->preCondition)
                    ->asArray()
                    ->all();
                $len = $this->updateAllCounters([$this->left => ($this->left + $dif), $this->right => ($this->right + $dif)], [$this->primaryKey()[0] => $models]);
                $transaction->commit();
                return $len;
            } catch (Exception $e) {
                $transaction->rollBack();
                return false;
            }
        }
    }
    
    /**
     * 为当前节点添加子节点
     * @param ActiveRecord $model
     * @return ActiveRecord | boolean
     */
    public function tree_addChild($model)
    {
        if ($model->isNewRecord) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $lr = $this->tree_getLeftAndRight();
                $mlr = $this->tree_getMinLeftAndMaxRight();
                $lefts = $this->updateAllCounters([$this->left => ($this->left + 2)], ['>', $this->left, max($lr)]);
                $rights = $this->updateAllCounters([$this->right => ($this->right + 2)], ['>=', $this->right, max($lr)]);
                if($lefts || $rights) {
                    $model->{$this->left} = max($lr);
                    $model->{$this->right} = max($lr) + 1;
                    if ($model->save()) {
                        $transaction->commit();
                        return $model;
                    }
                }
                $transaction->rollBack();
                return false;
            } catch (Exception $e) {
                $transaction->rollBack();
                return $e;
            }
        }
        return false;
    }
    
    /**
     * 移除当前节点以及其子节点
     * @return integer 返回受影响的行数
     */
    public function tree_remove()
    {
        $lr = $this->tree_getLeftAndRight();
        $models = $this->find()
            ->where(['>=', $this->left, min($lr)])
            ->andWhere(['<=', $this->right, max($lr)])
            ->andWhere($this->preCondition)
            ->asArray()
            ->all();
        $len = $this->deleteAll([$this->primaryKey()[0] => $models]);
        return $len;
    }
    
    /**
     * 移除当前节点的所有子节点点
     * @return integer 返回受影响的行数
     */
    public function tree_removeChildren()
    {
        $lr = $this->tree_getLeftAndRight();
        $models = $this->find()
            ->where(['>', $this->left, min($lr)])
            ->andWhere(['<', $this->right, max($lr)])
            ->andWhere($this->preCondition)
            ->asArray()
            ->all();
        $len = $this->deleteAll([$this->primaryKey()[0] => $models]);
        return $len;
    }
    
    /**
     * 将当前节点移动的某节点下
     * @param ActiveRecord $parent 父节点
     * @return boolean
     */
    public function tree_moveNode($parent)
    {
        if ($this->tree_isBeInclude($parent))
            return false;
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $lr = $this->tree_getLeftAndRight();
            $plr = $this->tree_getLeftAndRight($parent);
            $dif = max($lr) - min($lr) + 1; //当前对象的 右值 - 左值
            $pdif = min($lr) - max($plr); //当前对象的 左值 - 准父类的 右值
            /** @var array $models 要移动更新的行主键 */
            $models = $this->find()->select(['id'=>$this->primaryKey()[0]])
                ->where(['>=', $this->left, min($lr)])
                ->andWhere(['<=', $this->right, max($lr)])
                ->andWhere($this->preCondition)
                ->asArray()->all();
            $ids = ((new ArrayHelper())->getColumn($models,'id'));
            /** @var array $leftmodels 要更新左值的行主键（未去除要移动的行主键）*/
            $leftmodels = $this->find()->select(['id'=>$this->primaryKey()[0]])
                ->where(['>', $this->left, max($plr)])
                ->andWhere($this->preCondition)
                ->asArray()->all();
            $leftIds = ((new ArrayHelper())->getColumn($leftmodels,'id'));
            /** @var array $rightmodels 要更新右值的行主键（未去除要移动的行主键）*/
            $rightmodels = $this->find()->select(['id'=>$this->primaryKey()[0]])
                ->where(['>=', $this->right, max($plr)])
                ->andWhere($this->preCondition)
                ->asArray()->all();
            $rightIds = ((new ArrayHelper())->getColumn($rightmodels,'id'));
            
            $updatelefts = $this->updateAllCounters([$this->left => ($this->left + $dif)], [$this->primaryKey()[0] => array_diff($leftIds, $ids)]);
            $updaterights = $this->updateAllCounters([$this->right => ($this->right + $dif)], [$this->primaryKey()[0] => array_diff($rightIds, $ids)]);
            $updatemodels = $this->updateAllCounters([$this->left => ($this->left - $pdif), $this->right => ($this->right - $pdif)], [$this->primaryKey()[0] => $ids]);
            if($updatelefts == count(array_diff($leftIds, $ids)) && $updaterights == count(array_diff($rightIds, $ids)) && $updatemodels == count($ids)) {
                $transaction->commit();
                return true;
            }
            $transaction->rollBack();
            return false;
        } catch (Exception $e) {
            $transaction->rollBack();
            return false;
        }
        
    }
    
    public function tree_moveUp()
    {
    
    }
    
    public function tree_moveDown()
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

    /**
     * 判断当前对象是否     包含      某个对象
     * @param ActiveRecord $model
     * @return boolean
     */
    public function tree_isInclude($model)
    {
        $lr = $this->tree_getLeftAndRight();
        $clr = $this->tree_getLeftAndRight($model);
        if (min($lr) < min($clr) && max($lr) > max($clr)) {
            return true;
        }
        return false;
    }
    
    /**
     * 判断当前对象是否     被包含      某个对象
     * @param ActiveRecord $parentModel
     * @return boolean
     */
    public function tree_isBeInclude($parentModel)
    {
        $lr = $this->tree_getLeftAndRight();
        $plr = $this->tree_getLeftAndRight($parentModel);
        if (min($lr) > min($plr) && max($lr) < max($plr)) {
            return true;
        }
        return false;
    }
    
    /**
     *  判断当前节点是否顶级节点
     * @return boolean 
     */
    public function tree_isTopNode()
    {
        $lr = $this->tree_getLeftAndRight();
        $len = (new Query())->where(['<', $this->left, min($lr)])
            ->andWhere(['>', $this->right, max($lr)])
            ->andWhere($this->preCondition)
            ->from($this->tableName())
            ->count(1);
        return ! $len ? true : false;
    }
    
    /**
     * 当前节点的子节点数
     * @return integer 返回子节点数
     */
    public function tree_num_children()
    {
        $lr = $this->tree_getLeftAndRight();
        $len = (new Query())->where(['>', $this->left, min($lr)])
            ->andWhere(['<', $this->right, max($lr)])
            ->andWhere($this->preCondition)
            ->from($this->tableName())
            ->count(1);
        return $len;
    }
    
    /**
     * 判断当前节点是否最后一个节点
     * @return boolean
     */
    public function tree_isLastNode()
    {
        return $this->tree_num_children() ? true : false;
    }
    
}