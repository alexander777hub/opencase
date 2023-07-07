<?php


namespace app\models;

/**
 * Class Manager
 * @package app\models
 */
abstract class Manager
{
    abstract public function getAll($params);

    abstract public static function getOne($model);

}