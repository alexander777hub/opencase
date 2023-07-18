<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Item $model */
/** @var yii\widgets\ActiveForm $form */
\app\assets\JQAsset::register($this);

?>

<script type="text/javascript">
    $(document).ready(function(){

        //  $( ".inner" ).append( "<p>Test</p>" );
        var divs = $(".card-body");
        console.log(divs, "DIVS");
        var avatar = "<?= $model && $model->icon ? $model->icon : "/uploads/profile/default.png"  ?>";
        $("#icon").attr("src", avatar);
        $(".card-body").each(function (i) {
            var id = $(this).next().find('img').attr('id');
            var rem = $(this).find('.rem');
            rem.remove();
            var userform_id =  "<?= strval($model->id) ?>";
            console.log(userform_id,"UFID");


            var href = '/mng/item/remove-photo?photo_id=' + id;
            $(this).append("<a href=" + href +
                " class='btn btn-danger ml-2'>Удалить</a>" );


        });
        if($('.avatar')){
            $('.avatar').on("click", function(e){
                // e.preventDefault();
                var id =  $(this).attr("data-id");


            });

        }
    })

</script>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'internal_name')->textInput() ?>


    <?= $form->field($model, 'icon')->textInput(['maxlength' => true, 'readonly' => 'readonly']) ?>
    <?= $form->field($model, 'profile_id')->dropdownList(\app\models\Profile::getFullList()) ?>
    <?= $form->field($model, 'icon_large')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'scin_type')->dropdownList(\app\models\Item::getScins()) ?>
    <?php  if(!$model->isNewRecord): ?>
    <?= $form->field($model, 'photo')->widget(\alexander777hub\crop\Widget::className(), [
        'uploadUrl' => \yii\helpers\Url::toRoute('/photo/upload'),
        'parent_table' => 'Item',
        'photo_field' => 'photo',
        'items' => $model->getPhotos(),
        'obj_id_field' => 'photo_id',
        'noPhotoImage' => '/uploads/photo/default.png',
        'width' => 300,
        'height' => 400,
    ])->label("Фото") ?>

    <?php  endif; ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
