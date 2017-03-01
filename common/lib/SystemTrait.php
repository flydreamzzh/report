<?php
namespace common\lib;

use Yii;

/**
 * 系统基础操作方法
 * @author Administrator
 *        
 */
trait SystemTrait
{
    /**
     * 获取前端提交的post数据
     * @param string|array $index
     * @return mixed|array
     */
    public static function sysPost($index = null)
    {
        $post = Yii::$app->request->post();
        $RawBody = json_decode(Yii::$app->request->getRawBody(), true);
        $request = $post ? $post : $RawBody;
        if (! $index == null) {
            if (! is_array($index)) {
                if (isset($request[$index]))
                    return $request[$index];
            } else {
                $values = array_values($index);
                $data = $request;
                foreach ($values as $value) {
                    if (isset($data[$value])) {
                        $data = $data[$value];
                    } else {
                        echo self::sysOut('信息丢失', false);
                        exit();
                    }
                }
                return $data;
            }
            echo self::sysOut('信息丢失', false);
            exit();
        } else {
            return $request;
        }
    }
    
    /**
     * 获取前端提交的get数据
     * @return mixed|array
     */
    public static function sysGet()
    {
        $get = Yii::$app->request->get();
        return $get;
    }
    
    /**
     * 系统数据输出
     * @param string|array $message 输出信息
     * @param boolean $flag True：处理正确时输出； False：处理失败时输出
     * @param string $toJson 是否输出json数据（默认是）
     */
    public static function sysOut($message, $flag = true, $toJson = true)
    {
        $data = [$flag, $message];
        return $toJson ? json_encode($data, true) : $data;
    }
}