<?php


namespace app\controllers;

use app\models\Ad;
use app\models\AdSearch;
use app\models\CommentSearch;
use app\models\Profile;
use app\models\Userform;
use app\models\UserformAncetSearch;
use app\models\UserformManager;
use app\models\UserformSearch;
use app\modules\mng\models\Bank;
use Yii;
use yii\data\ActiveDataFilter;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

/**
 * Class TestController
 * @package app\controllers
 */
class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/user/register']);
        }
        $searchModel = new UserformAncetSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['or',
                                       ['target'=> Json::encode([Userform::USERFORM_TARGET_BRAK])],
                                       ['target'=> Json::encode([Userform::USERFORM_TARGET_OTNOSHENIYA])],
                                        ['target'=> Json::encode([Userform::USERFORM_TARGET_SVIDANIE])],
                                        ['target' => Json::encode([Userform::USERFORM_TARGET_BRAK,Userform::USERFORM_TARGET_OTNOSHENIYA,Userform::USERFORM_TARGET_SVIDANIE ])]
        ]);

        //$m = $dataProvider->getModels();

        $q = $dataProvider->query->createCommand()->getRawSql();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id)
    {
        if($id){
           // \yii\helpers\Url::remember();
            $model_userform = Userform::findOne($id);
            $model_userform = UserformManager::getOne($model_userform);

            return $this->render('view', [
                'model_userform' => $model_userform,
                //'comments' => $comments,
                // 'dataProvider' => $dataProvider,

            ]);

        } else {
            throw new NotFoundHttpException("Not found");
        }

    }

    public function actionBank()
    {
        $amount = 133000.00;
        $bank = new Bank();
        $bank->add($amount);
        var_dump($bank->account);
        var_dump($bank->profit);
        exit;
    }

}