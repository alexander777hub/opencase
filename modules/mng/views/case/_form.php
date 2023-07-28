<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\mng\models\Opening $model */
/** @var yii\bootstrap4\ActiveForm $form */




use kartik\select2\Select2;

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




    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group field-color_2 required">
                <label class="control-label">Название</label>
                <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false); ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group field-color_2 required">
                <label class="control-label"> Цена</label>
                <?= $form->field($model, 'price')->input('numerical', ['readOnly'=> !$model->isNewRecord])->label(false); ?>
            </div>
        </div>
        <?php  if(!$model->isNewRecord): ?>
        <div class="col-sm-6">
            <div class="form-group field-color_2 required">
                <label class="control-label">Фото</label>

                    <div class="row">
                        <?= $form->field($model, 'photo')->widget(\alexander777hub\crop\Widget::className(), [
                            'uploadUrl' => \yii\helpers\Url::toRoute('/photo/upload'),
                            'parent_table' => 'Opening',
                            'photo_field' => 'photo',
                            'items' => $model->getPhotos(),
                            'obj_id_field' => 'photo_id',
                            'noPhotoImage' => '/uploads/photo/default.png',
                            'width' => 300,
                            'height' => 400,
                        ])->label(false) ?>

                    </div>


            </div>
        </div>
        <?php  endif; ?>
        <?php if(!empty($categories = \app\modules\mng\models\OpeningCategory::getFullList())): ?>
        <div class="col-sm-6">
            <div class="form-group field-color_2 required">
                <label class="control-label">Назначить категорию</label>
                        <?= $form->field($model, 'category_id')->dropdownList(!$model->category_id ?$categories : \app\modules\mng\models\OpeningCategory::getFilteredCategoryList($model->category_id) )->label(false) ?>
            </div>
        </div>
        <?php endif; ?>
        <?php if($model->category_id): ?>
            <div class="col-sm-6">
                <div class="form-group field-color_2 required">
                    <label class="control-label">Категория</label>
                    <?= $form->field($model, 'category')->textInput(['readOnly'=> true])->label(false) ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-sm-6">
            <div class="form-group field-color_2 required">
                <label class="control-label">Предметы</label>
                <span class="select2-selection select2-selection--single">
                <?=
                    $form->field($model, 'item_ids')->widget(Select2::classname(),[
                        'model' => $model,
                        'name' => 'item_ids',
                        'attribute' => 'item_ids',
                        'bsVersion' => '4.x',
                        'theme' => Select2::THEME_BOOTSTRAP,
                        'data' => \app\models\Item::getFullListSelect2(),
                        'language' => 'en',
                        'options' => [
                            'multiple' => true,
                            'placeholder' => 'Предметы',
                          //  'class' => 'select2-selection__rendered',
                        ],
                    ])->label(false);
                 ?>
                </span>
            </div>
        </div>
        <?php if(!$model->isNewRecord): ?>
        <div class="col-sm-6">
            <div class="form-group field-color_2 required">
                <label class="control-label">Юзеры</label>
                <span class="select2-selection select2-selection--single">
                     <?=
                     $form->field($model, 'user_ids')->widget(Select2::classname(), [
                         'model' => $model,
                         'name' => 'user_ids',
                         'attribute' => 'user_ids',
                         'bsVersion' => '4.x',
                         'theme' => Select2::THEME_BOOTSTRAP,
                         'data' => \app\models\Profile::getFullListSelect2($model->id),
                         'language' => 'en',
                         'options' => ['multiple' => true, 'placeholder' => 'Юзеры'],
                         'pluginOptions' => [
                             'allowClear' => true
                         ],
                     ])->label(false);

                     ?>

                </span>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



