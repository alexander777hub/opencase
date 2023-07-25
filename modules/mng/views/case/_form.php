<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\mng\models\Opening $model */
/** @var yii\widgets\ActiveForm $form */
\app\assets\JQAsset::register($this);

\kartik\select2\Select2Asset::register($this);
$i = $model->users;

?>
<script type="text/javascript">
    $(document).ready(function(){

        //  $( ".inner" ).append( "<p>Test</p>" );
        var divs = $(".card-body");
        console.log(divs, "DIVS");
        var avatar = "<?= $model && $model->avatar_id ? \app\modules\mng\models\Opening::getAvatarUrl($model->avatar_id) : "/uploads/profile/default.png"  ?>";
        $("#icon").attr("src", avatar);
        $(".card-body").each(function (i) {
            var id = $(this).next().find('img').attr('id');
            var rem = $(this).find('.rem');
            rem.remove();
            var userform_id =  "<?= strval($model->id) ?>";
            console.log(userform_id,"UFID");
            var href = '/mng/case/assign-avatar?photo_id=' + id;
            $(this).append("<a href=" + href +
                " class='btn btn-danger avatar'>Назначить аватаром</a>" );
            var href = '/mng/case/remove-photo?photo_id=' + id;
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

<div class="opening-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php  if(!$model->isNewRecord): ?>
            <?= $form->field($model, 'photo')->widget(\alexander777hub\crop\Widget::className(), [
                'uploadUrl' => \yii\helpers\Url::toRoute('/photo/upload'),
                'parent_table' => 'Opening',
                'photo_field' => 'photo',
                'items' => $model->getPhotos(),
                'obj_id_field' => 'photo_id',
                'noPhotoImage' => '/uploads/photo/default.png',
                'width' => 300,
                'height' => 400,
            ])->label("Фото") ?>


    <?php  endif; ?>

  
    <?= $form->field($model, 'price')->input('numerical')->label(Yii::t('app', 'Price')) ?>
    <?php if(!empty($categories = \app\modules\mng\models\OpeningCategory::getFullList())): ?>
    <?= $form->field($model, 'category_id')->dropdownList(!$model->category_id ?$categories : \app\modules\mng\models\OpeningCategory::getFilteredCategoryList($model->category_id) )->label(Yii::t('app', 'Изменить категорию')) ?>
    <?php endif; ?>
    <?php if($model->category_id): ?>
        <?= $form->field($model, 'category')->textInput(['readOnly'=> true])->label(Yii::t('app', 'Категория')) ?>
    <?php endif; ?>
    <?=
    $form->field($model, 'item_ids')->widget(\kartik\select2\Select2::classname(), [
        'model' => $model,
        'name' => 'item_ids',
        'attribute' => 'item_ids',
        'data' => \app\models\Item::getFullListSelect2(),
        'language' => 'en',
        'options' => ['multiple' => true, 'placeholder' => 'Предметы'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    ?>
    <?=
    $form->field($model, 'user_ids')->widget(\kartik\select2\Select2::classname(), [
        'model' => $model,
        'name' => 'user_ids',
        'attribute' => 'user_ids',
        'data' => \app\models\Profile::getFullListSelect2($model->id),
        'language' => 'en',
        'options' => ['multiple' => false, 'placeholder' => 'Юзеры'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

