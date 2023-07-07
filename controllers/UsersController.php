<?php


namespace app\controllers;

use app\models\UsersItem;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use Yii;

/**
 * Class UsersController
 * @package app\controllers
 */
class UsersController extends RestController
{

    public function actionIndex($type = 1)
    {
        $data = Yii::$app->request->getBodyParams();
        $type = intval(Yii::$app->request->get('type'));
        $model = new UsersItem();
        if (Yii::$app->request->getMethod() == 'POST') {
            if (Yii::$app->request->post()) {
                if ($model->load($data)) {
                    $result= $model->addItem($type, $model);
                    return $result;
                } else {
                    var_dump($model->getErrors());
                    exit;
                }
            }
        }
        if (Yii::$app->request->getMethod() == 'GET') {
            return $model->getItems($type);

        }
    }
}