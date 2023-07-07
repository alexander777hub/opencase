<?php

namespace app\modules\mng\controllers;

use alexander777hub\crop\models\PhotoEntity;
use app\controllers\ManagerController;
use app\models\Ad;
use app\models\AdSearch;
use app\models\Comment;
use app\models\CommentSearch;
use app\models\Profile;
use app\models\User;
use app\models\Userform;
use app\models\UserformManager;
use app\models\UserformSearch;
use dektrium\user\traits\EventTrait;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Json;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use Yii;
use yii\web\Response;

/**
 * UserformController implements the CRUD actions for Userform model.
 */
class UserformController extends ManagerController
{
    use EventTrait;

    /**
     * Event is triggered before creating new user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_CREATE = 'beforeCreate';

    /**
     * Event is triggered after creating new user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_CREATE = 'afterCreate';

    /**
     * Event is triggered before updating existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_UPDATE = 'beforeUpdate';

    /**
     * Event is triggered after updating existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_UPDATE = 'afterUpdate';

    /**
     * Event is triggered before impersonating as another user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_IMPERSONATE = 'beforeImpersonate';

    /**
     * Event is triggered after impersonating as another user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_IMPERSONATE = 'afterImpersonate';

    /**
     * Event is triggered before updating existing user's profile.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_PROFILE_UPDATE = 'beforeProfileUpdate';

    /**
     * Event is triggered after updating existing user's profile.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_PROFILE_UPDATE = 'afterProfileUpdate';

    /**
     * Event is triggered before confirming existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_CONFIRM = 'beforeConfirm';

    /**
     * Event is triggered after confirming existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_CONFIRM = 'afterConfirm';

    /**
     * Event is triggered before deleting existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_DELETE = 'beforeDelete';

    /**
     * Event is triggered after deleting existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_DELETE = 'afterDelete';

    /**
     * Event is triggered before blocking existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_BLOCK = 'beforeBlock';

    /**
     * Event is triggered after blocking existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_BLOCK = 'afterBlock';

    /**
     * Event is triggered before unblocking existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_BEFORE_UNBLOCK = 'beforeUnblock';

    /**
     * Event is triggered after unblocking existing user.
     * Triggered with \dektrium\user\events\UserEvent.
     */
    const EVENT_AFTER_UNBLOCK = 'afterUnblock';

    /**
     * Name of the session key in which the original user id is saved
     * when using the impersonate user function.
     * Used inside actionSwitch().
     */
    const ORIGINAL_USER_SESSION_KEY = 'original_user';

    /** @var Finder */
    protected $finder;


    /**
     * Lists all Userform models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserformSearch();
        $manager      = new UserformManager($searchModel);
        if (Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) || Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR)) {
            $dataProvider = $manager->getAll($this->request->queryParams);

        }
        if (Yii::$app->user->can(Profile::ROLE_MANAGER)) {
            $dataProvider = $searchModel->search($this->request->queryParams);
            $dataProvider->query->andWhere(['user_id' => \Yii::$app->user->id]);
            foreach ($dataProvider->getModels() as &$model) {
                $model->city_name       = isset(Profile::$city_list[$model->city_id]) ? Profile::$city_list[$model->city_id] : null;
                $model->sexname         = isset(Profile::$sex_list[$model->sex]) ? Profile::$sex_list[$model->sex] : null;
                $model->relocate_status = isset(Userform::getRelocateStatus()[$model->ready_to_relocate]) ? Userform::getRelocateStatus()[$model->ready_to_relocate] : null;
                // $model->target_name     = isset(Userform::getTargets()[$model->target]) ? Userform::getTargets()[$model->target] : null;
                $model->find_zone_name  = isset(Userform::getFindZone()[$model->find_zone]) ? Userform::getFindZone()[$model->find_zone] : null;
                if (!empty($model->target)) {
                    $target_names = [];
                    $arr          = Json::decode($model->target);
                    if (is_int($arr)) {
                        $model->target_name = Userform::getTargets()[intval($arr)];
                    } else {
                        foreach ($arr as $item) {
                            $target_names[] = Userform::getTargets()[intval($item)];
                        }
                        $model->target_name = implode(',', $target_names);
                    }
                }

            }

        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Userform model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        \yii\helpers\Url::remember();
        $model_userform = $this->findModel($id);
        $model_userform = UserformManager::getOne($model_userform);
        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['userform_id'=> $model_userform->id]);
        $q = $dataProvider->query->createCommand()->getRawSql();

        foreach ($dataProvider->getModels() as $model_comment){
            //$model_comment->text = nl2br($model_comment->text);
            if(Profile::findOne($model_comment->user_id)){
                $model_comment->user_name = Profile::findOne($model_comment->user_id)->name ? Profile::findOne($model_comment->user_id)->name : $model_comment->user_id;
            }
        }
        $searchModel2 = new AdSearch();
        $dataProvider2 = $searchModel2->search([]);

        $dataProvider2->query->andWhere(['ad.user_id'=>  $model_userform->user_id]);



        return $this->render('view', [
            'model_userform' => $model_userform,
            //'comments' => $comments,
            'dataProvider' => $dataProvider,
            'dataProvider2' => $dataProvider2,

        ]);
    }

    /**
     * Creates a new Userform model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $user = \Yii::createObject([
            'class'    => \dektrium\user\models\User::className(),
            'scenario' => 'create',
        ]);

       $this->getUserEvent($user);

        // $this->performAjaxValidation($user);
      //  $this->trigger(self::EVENT_BEFORE_CREATE, $event);
        if ($user->load(\Yii::$app->request->post())) {

            // $event =
            if(!$user->validate()){
                foreach ($user->getErrors() as $error) {
                    Yii::$app->getSession()->setFlash('danger', $error);
                }
                return $this->refresh();
            }

            $user->create();
            $event = $this->getUserEvent($user);



            $this->trigger(self::EVENT_AFTER_CREATE, $event);
            $model = Profile::findOne($user->id);
            if($model){
                //$model->sex = 2;
                //$model->agency_id=$id;
                //echo('HERE1');
                //exit();
                if($model->save(false)){//а почему не хочет model(save)
                    $userform = new Userform();
                    $userform->first_name = $user->username;
                    $userform->user_id = $user->id;
                    $userform->manager_id = Yii::$app->user->id;
                    //echo('HERE2');exit();
                    //var_dump($model->manager_id);exit();
                    if($userform->save(false)){
                        \Yii::$app->getSession()->setFlash('success', "Анкета создана");
                    } else {
                        foreach ($userform->getErrors() as $error) {
                            Yii::$app->getSession()->setFlash('danger', $error);
                        }
                    }
                    return $this->redirect(['update', 'id' => $userform->id]);
                }

            }
            /*if($user->user_id){
                $model = new Profile();
                $model->user_id = $user->id;
                $model->save(false);
                return $this->redirect(['profile/update', 'id' => $user->id]);
            }*/



        }
        return $this->render('create_user', [
            'user' => $user,
        ]);
    }






    public function actionCreateUserform()
    {
        $model = new Userform();
        if ($this->request->isPost) {
            // $json = $this->request->post()['Userform']['target'];
            // $json =
            $model->user_id = Yii::$app->user->id;
            if ($model->load($this->request->post())) {
                //var_dump(Yii::$app->request->getBodyParams()['Userform']['target']);
                // exit;
                $model->target = json_encode(Yii::$app->request->getBodyParams()['Userform']['target'], 1);
                /*$model->meeting_purpose = json_encode( Yii::$app->request->getBodyParams()['Userform']['meeting_purpose'], 1);
                $model->partner_sex = intval(Yii::$app->request->getBodyParams()['Userform']['partner_sex']);
                $model->partner_age = intval(Yii::$app->request->getBodyParams()['Userform']['partner_age']); */
                if (!$model->save()){
                    foreach ($model->getErrors() as $error) {
                        Yii::$app->getSession()->setFlash('danger', $error);
                    }
                    return $this->refresh();
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }
    }

    /**
     * Updates an existing Userform model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        parent::actionUpdate($id);
        $model = $this->findModel($id);
        // $r = Yii::$app->request->getBodyParams()['Userform'];

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->target = json_encode(Yii::$app->request->getBodyParams()['Userform']['target'], 1);
            /* $model->meeting_purpose = json_encode( Yii::$app->request->getBodyParams()['Userform']['meeting_purpose'], 1);
             $model->partner_sex = intval(Yii::$app->request->getBodyParams()['Userform']['partner_sex']);
             $model->partner_age = intval(Yii::$app->request->getBodyParams()['Userform']['partner_age']); */
            if (!$model->save()){
                foreach ($model->getErrors() as $error) {
                    Yii::$app->getSession()->setFlash('danger', $error);
                }
                return $this->refresh();
            }
            $file = Yii::$app->request->getBodyParams()['Userform']['photo'];
            if($file != '/uploads/photo/default.png'){
                $photo = new PhotoEntity();
                $url = $photo->movePhoto($file);
                if ($url){
                    $photo_id =  Yii::$app->request->getBodyParams()['Userform']['photo_id'];
                    $old_model = PhotoEntity::findOne(intval($photo_id));
                    if($old_model){
                        $old_model->url = $url;
                        $old_model->save(false);
                    } else {
                        $photo->bind_obj_id = $model->id;
                        $photo->url = $url;
                        $photo->type = 7;
                        if(!$photo->save()){
                            foreach($photo->getErrors() as $error){
                                Yii::$app->getSession()->setFlash('danger', $error);
                            }
                        }

                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model = UserformManager::getOne($model);
        $model->target = Json::decode($model->target);
        /* $model->meeting_purpose = Json::decode($model->meeting_purpose); */
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Userform model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        parent::actionDelete($id);
        $model = $this->findModel($id);
        $photos = $model->getPhotos()->all();
        if($photos){
            foreach ($photos as $photo){
                $file = $photo->url;

                if(!empty($file) && file_exists( Yii::getAlias('@webroot') . $file)) {
                    unlink(Yii::getAlias('@webroot') . $file);
                }
                $photo->delete();
            }
        }
        $ads = Ad::find()->where(['user_id' => $model->user_id])->all();
        if($ads){
            foreach($ads as $ad){
                $ad->delete();
            }
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionRemoveComment($id, $userform_id)
    {
        $comment = Comment::findOne($id);
        $comment->delete();

        return  $this->redirect(['/userform/view', 'id'=> $userform_id]);
    }

    /**
     * Finds the Userform model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Userform the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userform::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    public function actionAssignAvatar($photo_id)
    {
        $model = PhotoEntity::findOne(intval($photo_id));
        $userform = Userform::find()->where(['id' =>$model->bind_obj_id])->one();
        $userform->avatar_id = $model->id;
        $userform->save(false);
        Yii::$app->getSession()->setFlash('success', "Аватар назначен");
        return $this->redirect(['index']);
    }
    public function actionRemovePhoto($photo_id)
    {
        $model = PhotoEntity::findOne(intval($photo_id));
        $userform = Userform::find()->where(['id' =>$model->bind_obj_id])->one();
        if($userform->avatar_id == intval($photo_id)){
            $userform->avatar_id = null;
        }
        $userform->save(false);
        $model->delete();
        Yii::$app->getSession()->setFlash('success', "Фото удалено");
        return $this->redirect(['index']);
    }

    protected function performAjaxValidation($model)
    {

        if ($model->load(\Yii::$app->request->post())) {

            \Yii::$app->response->format = Response::FORMAT_JSON;
            \Yii::$app->response->data = json_encode(ActiveForm::validate($model));
            //var_dump(\Yii::$app->response->data);
         return true;
        }

        return false;
    }

}
