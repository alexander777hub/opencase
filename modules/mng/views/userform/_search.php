<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserformSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userform-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'second_name') ?>

    <?= $form->field($model, 'soname') ?>

    <?= $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'was_born') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'target') ?>

    <?php // echo $form->field($model, 'about_me') ?>

    <?php // echo $form->field($model, 'about_partner') ?>

    <?php // echo $form->field($model, 'find_zone') ?>

    <?php // echo $form->field($model, 'ready_to_relocate') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'avatar_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
