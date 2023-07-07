<?php


namespace app\models;

use yii\data\ActiveDataProvider;

/**
 * Class DbExecutor
 * @package app\models
 */
class DbExecutor implements Executor
{

    public function save(UsersItem $item)
    {
        if ($item->save()) {
            return [
                'status' => 'ok',
            ];

        } else {
            return $item->getErrors();
        }
    }

    public function getAll()
    {
        $dataProvider = new ActiveDataProvider([
            'query'      => UsersItem::find(),
            'pagination' => [
                'defaultPageSize' => 1000,
            ]
        ]);

        return $dataProvider->getModels();
    }
}