<?php


namespace app\models;

/**
 * interface Executor
 * @package app\models
 */
interface Executor
{
    public function save(UsersItem $item);
    public function getAll();
}