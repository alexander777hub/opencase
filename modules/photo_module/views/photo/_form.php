<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */
/* @var $form yii\widgets\ActiveForm */
$userform = null;
if(!$model->isNewRecord){
    $userform = $model->getUserform()->one();
}
//->fileInput(['multiple' => false, 'accept' => 'image/*', 'value' => $model->getProfilePictureFile()]
?>

<?php if(!$model->isNewRecord && $userform->avatar_id != $model->id):  ?>
<p>
    <?= Html::a(Yii::t('app', 'Назначить аватаром'), ['photo/assign-avatar', 'id' => intval($model->id)  ], ['class' => 'btn btn-success']) ?>
</p>
<?php endif;   ?>
<div class="photo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'type')->dropDownList(\app\models\Photo::getType()); ?>

    <?= $form->field($model, '_file')->fileInput(['multiple' => false, 'accept' => 'image/*', 'value' => $model->getProfilePictureFile()]);
?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php if (!$model->isNewRecord):   ?>
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src=<?= $model->link ? Yii::$app->urlManager->createAbsoluteUrl(['/']) . 'uploads/photo/' . $model->link : null   ?> alt="Card image cap">
    </div>


<?php   endif; ?>


