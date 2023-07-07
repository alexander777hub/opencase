<?php


namespace app\models;

/**
 * Class RedisItem
 * @property int|mixed|null    $id
 * @property mixed|string|null $second_name
 * @property mixed|string|null $soname
 * @property mixed|string|null $first_name
 * @property mixed|string|null $email
 * @property mixed|string|null $phone
 * @package app\models
 */
class RedisItem extends \yii\redis\ActiveRecord
{
    /**
     * @var mixed|string|null
     */

    public function rules()
    {
        return [
            [['first_name', 'second_name', 'soname'], 'unique', 'targetAttribute' => ['first_name', 'second_name', 'soname']],
        ];
    }

    public static function primaryKey()
    {
        return ['id'];
    }


    public function attributes()
    {
        return ['id', 'first_name', 'second_name', 'soname', 'email', 'phone'];
    }

}