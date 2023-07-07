<?php


namespace app\models;

/**
 * Class RedisExecutor
 * @package app\models
 */
class RedisExecutor implements Executor
{

    public function save(UsersItem $item)
    {
        $redis_item = new RedisItem();

        $redis_item->id          = intval(round(microtime(true)));
        $redis_item->first_name  = $item->first_name;
        $redis_item->second_name = $item->second_name;
        $redis_item->soname      = $item->soname;
        $redis_item->email       = $item->email;
        $redis_item->phone       = $item->phone;
        if ($redis_item->save()) {
            return [
                'status' => 'ok',
            ];
        } else {
            return $redis_item->getErrors();
        }

    }
    public function getAll()
    {
        return RedisItem::find()->asArray()->all();
    }
}