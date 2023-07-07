<?php


namespace app\controllers;

use app\models\Influencer;
use yii\rest\Controller;
use yii\web\MethodNotAllowedHttpException;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * Class UpdateController
 * @package app\controllers
 */
class UpdateController extends Controller

{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }
    public function actionUpdateRecords(){
        if (Yii::$app->request->getMethod() == 'POST'){
            $token = Yii::$app->request->getHeaders()->get("token");
            if (!$token == getenv("APP_RUSLAN_TOKEN")){
                throw new NotFoundHttpException("User not found");
            }
            $data = json_decode(Yii::$app->request->getRawBody(), true);
            $res = [];
            if(!empty($data)){
                foreach($data as $item){
                    if(Influencer::find()->where(['id' => intval($item['id'])])
                        ->one()) {
                        $model        = Influencer::find()->where(['id' => intval($item['id'])])->one();
                        $new          = new Influencer();
                        $new->user_id = $model->user_id;
                        $model->delete();
                        try {
                            if(!$new->load($item) || !$new->save()){
                                $res[$new->id]  = $model->getErrors();
                            }
                        } catch (\Exception $e)
                        {
                            $res[$item['id']]['error'] = $e->getMessage();

                        }
                    }
                }
                if (empty($res)){
                    $res['status'] = 'ok';
                }
                return $res;
            }
        } else {
            throw new MethodNotAllowedHttpException("Method not Allowed");
        }

    }

}