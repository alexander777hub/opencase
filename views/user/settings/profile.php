<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use dektrium\user\helpers\Timezone;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\web\View;
use app\models\Profile;
use kartik\file\FileInput;

// https://github.com/sabirov/yii2-bootstrap4-cropper
// https://github.com/fengyuanchen/cropperjs/blob/master/README.md#options
// https://fengyuanchen.github.io/cropperjs/
/**
 * @var yii\web\View $this
 * @var yii\bootstrap4\ActiveForm $form
 * @var app\models\Profile $model
 */

$this->title = Yii::t('user', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;


//$self = Profile::findOne(Yii::$app->user->id);
//$hase_manager = $self->manager_id;
//var_dump($hase_manager);

/*Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = [
    'sourcePath' => null,
    'js' => [],
];
Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
    'sourcePath' => null,
    'css' => [],
    'js' => [],
];*/
\app\assets\JQAsset::register($this);
$uploadPath = Yii::getAlias('@web') . '/uploads/profile/photo';
$img_url = is_null($model->photo) ? null : /*$uploadPath . DIRECTORY_SEPARATOR . */ $model->photo;
$this->registerCssFile(Yii::$app->request->baseUrl . '/cropper/cropper.min.css');
$this->registerJsFile(Yii::$app->request->baseUrl . '/cropper/cropper.min.js');

$this->registerCssFile(Yii::$app->request->baseUrl . '/cropper/photo_upload.css');
$this->registerJsFile(Yii::$app->request->baseUrl . '/cropper/upload_photo.js?t=' . time());
?>


<style>
    .modal-body {

        padding: 0rem !important;
    }
</style>
        <div class="card">
            <div class="card-header">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="card-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'profile-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                ]); ?>
                <?= $form->errorSummary($model) ?>

                     <?= $form->field($model, 'birthday')->widget(\yii\jui\DatePicker::className(),[
                    'language' => 'en-Gb',
                    'dateFormat' => 'yyyy-MM-dd',
                    'clientOptions' => [
                        'defaultDate' => '1990-01-01',
                        'changeMonth'=> true,
                        'changeYear'=> true,
                        'yearRange' => "-90:-18",
                    ],
                    'options' => ['class' => 'form-control',]
                ]) ?>

                <?= $form->field($model, 'sex')->dropDownList(\app\models\Profile::getSexList()); ?>

                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'bio')->textarea() ?>

                <?= $form->field($model, 'city_id')->dropdownList(Profile::$city_list) ?>
                <?= $form->field($model, 'vk_link') ?>
                <div class="col-xs-12 col-md-4 bg-light js-upload-item" id="new_public_photo">
                    <img style="margin-bottom: 10px;" id="icon" src=<?= $model->photo ? $model->photo : "/uploads/profile/default.png" ?> >

                    <!-- Button trigger modal -->


                </div>
                <button  type="button" data-id=<?= 0 ?> data-type=<?= \app\models\File::TYPE_ICON  ?> class="btn ml-3 mb-3 btn-primary js-show-upload-icon" data-toggle="modal" data-target="#exampleModal">
                    Добавить фото
                </button>
                <button type="button" data-id=<?= 0 ?> data-type=<?= \app\models\File::TYPE_ICON  ?> class="btn ml-3 mb-3 btn-danger delete" data-target="#exampleModal">
                    Удалить
                </button>


                <!-- Modal -->
                <div data-keyboard="false" data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img id="crop_icon" src= ''>
                            </div>
                            <div class="modal-footer">
                                <div>
                                    <input type="hidden" id="upload_user_id" value="<?= Yii::$app->user->id ?>">
                                    <input type="hidden" id="obj_id" value=<?= !$model->isNewRecord ? $model->user_id : 0 ?>>
                                    <input type="hidden" id="type">
                                    <input type="file" data-type=<?= \app\models\File::TYPE_ICON  ?>  id="btn_upload" accept="image/*" />
                                </div>
                                <div>
                                    <button type="button" id="btn-close" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                    <button type="button" class="btn btn-primary" id="btn_crop">Обрезать</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= Html::submitButton(Yii::t('user', 'Сохранить'), ['class' => 'btn btn-block btn-success']) ?>
                        <br>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
<?php
$script = <<< JS
    jQuery(document).ready(function () {
        $('#profile-country_id').change(function() {
            console.log('changed');
            $.ajax({
                      url: '/geo/get-regions',  //урл запроса
                      data: {country_id: + $(this).val()},
                      dataType: 'json',
                      success: function(data){ 
                          $('#profile-region_id option:gt(0)').remove();
                          //data.sort();
                          //console.log(data);
                          Object.keys(data).forEach(function(k){
                              $('#profile-region_id').append($("<option></option>")
                                 .attr("value", k).text(data[k]));
                          });
                    }}
             );
        });

        $('#profile-region_id').change(function() {
            console.log('changed');
            $.ajax({
                      url: '/geo/get-cities',  //урл запроса
                      data: {region_id: + $(this).val()},
                      dataType: 'json',
                      success: function(data){ 
                          $('#profile-city_id option:gt(0)').remove();
                          Object.keys(data).forEach(function(k){
                              $('#profile-city_id').append($("<option></option>")
                                 .attr("value", k).text(data[k]));
                          });
                    }}
             );
        });
    });

JS;
$this->registerJs($script);
?>