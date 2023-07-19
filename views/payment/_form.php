<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PayokOrder $model */
/** @var ActiveForm $form */
?>
<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'amount') ?>
        <?= $form->field($model, 'payment') ?>
        <?= $form->field($model, 'shop') ?>
        <?= $form->field($model, 'desc') ?>
        <?= $form->field($model, 'method') ?>
        <?= $form->field($model, 'currency') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'status') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- payment-_form -->
