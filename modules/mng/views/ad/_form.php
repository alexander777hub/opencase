<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ad;

/* @var $this yii\web\View */
/* @var $model app\models\Ad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ad-form">


    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->isNewRecord):  ?>
        <?= $form->field($model, 'type')->textInput()->dropDownList(Ad::getTypeList()) ?>
    <?php else: ?>
        <?= $form->field($model, 'type')->textInput(['readOnly'=>true]) ?>
    <?php endif; ?>


    <?= $form->field($model, 'city_id')->textInput()->dropDownList(\app\models\Profile::getCityList())->label('Город') ?>



    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'description')->textarea() ?>
    <?php if(Yii::$app->user->can(\app\models\Profile::ROLE_ADMINISTRATOR)):   ?>
        <?= $form->field($model, 'note')->textarea() ?>
    <?php elseif (Yii::$app->user->can(\app\models\Profile::ROLE_USER) && !$model->isNewRecord): ?>
        <?= $form->field($model, 'note')->textarea(['readOnly'=>true]) ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
