<?php


namespace app\controllers;

use app\models\Profile;
use app\models\Userform;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use Yii;

/**
 * Class ManagerController
 * @package app\controllers
 */
class ManagerController extends \yii\web\Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['index','view', 'create', 'update',
                                          'delete', 'remove-comment', 'assign-avatar', 'remove-photo'], // these action are accessible
                            //only the yourRole1 and yourRole2
                            'allow' => true,
                            'roles' => [ 'administrator'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


   public function actionUpdate($id)
    {
        if (!Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) && !Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR) && Yii::$app->user->can(Profile::ROLE_MANAGER)) {
           $model = Userform::findOne($id);
            if($model->user_id != Yii::$app->user->id){
                throw new ForbiddenHttpException('Not Allowed');
            }
        }

        return true;
    }
    public function actionDelete($id)
    {
        if (!Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) && !Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR) && Yii::$app->user->can(Profile::ROLE_MANAGER)) {
            $model = Userform::findOne($id);
            if($model->user_id != Yii::$app->user->id){
                throw new ForbiddenHttpException('Not Allowed');
            }
        }

        return true;
    }
}