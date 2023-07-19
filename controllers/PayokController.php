<?php


namespace app\controllers;

/**
 * Class PayokController
 *
 * @package app\controllers
 */
class PayokController extends \yii\web\Controller
{

    public function actionSuccess()
    {
        var_dump('Success');
        exit;
    }

    public function actionIndex()
    {
        var_dump('Go Success');
        exit;
    }


    public function actionFailure()
    {
        var_dump('Go Failure');
        exit;
    }

}