<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecreationZone */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recreation-zone-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->isNewRecord):  ?>
        <?= $form->field($model, 'type')->textInput()->dropDownList(\app\models\RecreationZone::getZoneList()) ?>

    <?php else: ?>
        <?= $form->field($model, 'type_name')->textInput(['readOnly'=>true]) ?>
    <?php endif; ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_id')->textInput()->dropDownList(\app\models\Profile::getCityList()) ?>


    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vk_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
