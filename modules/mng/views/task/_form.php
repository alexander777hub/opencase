<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\mng\models\Task $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php    if(!$model->isNewRecord): ?>
    <?= $form->field($model, 'created_at')->textInput(["readOnly"=>true ]) ?>
    <?php    endif; ?>
    <?= $form->field($model, 'frequency')->input('integer') ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
