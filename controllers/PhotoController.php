<?php


namespace app\controllers;

use app\models\File;
use Yii;
use yii\helpers\Json;
use app\models\Profile;

/**
 * Class PhotoController
 * @package app\controllers
 */
class PhotoController extends \yii\web\Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }



    public function actionDestroy(){
        $p = Json::decode(Yii::$app->request->getRawBody());
        $filepath = $p['file'];
        $file = new File();
        if($filepath && !$file->wasSaved($filepath)){
            unlink(Yii::getAlias('@webroot') . $filepath);
        }

        exit;

    }
    public function actionUpload()
    {
        if (\Yii::$app->request->isAjax || \Yii::$app->request->isPost) {
            $file = new File();
            if (isset($_FILES['file'])) {
                $result       = $file->uploadPhotoAdv($_FILES, $_POST);
                $path_to_save = $result['path_to_save'];
                $filename_ext = $result['filename_ext'];
                $type         = $result['type'];
                $is_new_photo = $result['is_new_photo'];

                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $link_for_cropper            = explode('web',$path_to_save . $filename_ext)[1];

                return [
                    'result'       => 'success',
                    'id'           => 0,
                    'file_full'    =>  $link_for_cropper,
                    'file_prev'    => $link_for_cropper,
                    'type'         => $type,
                    'is_new_photo' => $is_new_photo,
                ];
            }
        }
    }
    public function actionCrop()
    {
        if (\Yii::$app->request->isAjax || \Yii::$app->request->isPost) {
            if (isset($_FILES['file'])){
                $result = File::cropPhotoAdv($_FILES, $_POST);
                $path_to_save = $result['path_to_save'];
                $filename = $result['filename'];
                $file = $result['file'];
                $type = $result['type'];
                $is_new_photo = $result['is_new_photo'];
                $file = '/' . explode('/web/',$path_to_save . $filename)[1];
                $profile = Profile::find()->where(['user_id'=>$result['ppc_file']['bind_obj_id']])->one();
                $profile->photo = $file;
                $profile->save(false);
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

                return [
                    'result' => 'success',
                    'file' => $file,
                    'is_new_photo' => $is_new_photo,
                    'type'    => $type,
                    'ppc_file' => $result['ppc_file']
                ];
            }
        }
    }


    public function actionDelete()
    {
        if (\Yii::$app->request->isAjax || \Yii::$app->request->isPost) {
            $post = $_POST;
            $filepath = File::getDirectory($post['type'], $post['obj_id']);
            $f = Yii::getAlias('@webroot') . $post['file'];
            if (file_exists(Yii::getAlias('@webroot') . $post['file'])){
                unlink(Yii::getAlias('@webroot') . $post['file']);
                }
            $profile = Profile::find()->where(['user_id'=> $post['obj_id']])->one();
             $profile->photo = null;
             $profile->save(false);

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'status' => 'success',
                'code' => 301,
            ];
        }


    }
}