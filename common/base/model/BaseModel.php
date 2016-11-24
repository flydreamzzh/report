<?php
namespace common\base\model;

use yii\db\ActiveRecord;
use common\base\interfaces\ARInterface;

abstract class BaseModel extends ActiveRecord implements ARInterface
{

}