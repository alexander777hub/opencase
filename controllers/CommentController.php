<?php


namespace app\controllers;

use app\models\Profile;
use Yii;
use yii\web\BadRequestHttpException;
use app\models\Comment;

/**
 * Class CommentController
 * @package app\controllers
 */
class CommentController extends \yii\web\Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }
    public function actionAdd()
    {
        if (\Yii::$app->request->isAjax || \Yii::$app->request->isPost) {
            //var_dump($_POST);

            $data = Yii::$app->request->getBodyParam("data");

          if(isset($data['comment']) && $data['comment'] != false ){
              $comment = new Comment();
              $comment->text =  $data['comment'];
              $comment->userform_id = $data['userform_id'];
              $comment->user_id = Yii::$app->user->id;
              $comment->user_name = Profile::findOne($comment->user_id)->name ? Profile::findOne($comment->user_id)->name : 'Не задано';
              if($comment->validate() && $comment->save()){
                  return [
                      "error" => 0,
                      "success" => "Коммент добавлен",
                      'user_id' => $comment->user_id,
                      'userform_id' => $comment->userform_id,
                      'text' => nl2br($comment->text),
                      'id' => $comment->id,
                      'username' => $comment->user_name,
                      'created_at' => explode(' ', date("Y-m-d H:i:s"))[0]
                  ];
              } else {
                  return [
                      "error" => $comment->getErrors(),
                  ];
              }
          } else {
                return [
                    "error" => 'Введите сообщение',
                ];
          }


        }
    }

}