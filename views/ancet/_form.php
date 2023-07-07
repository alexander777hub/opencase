<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Profile;
use app\models\Userform;

/* @var $this yii\web\View */
/* @var $model app\models\Userform */
/* @var $form yii\widgets\ActiveForm */
\app\assets\JQAsset::register($this);
?>
<script type="text/javascript">
    $(document).ready(function(){

        //  $( ".inner" ).append( "<p>Test</p>" );
        var divs = $(".card-body");
        console.log(divs, "DIVS");
        var avatar = "<?= $model && $model->avatar_id ? Userform::getAvatarUrl($model->avatar_id) : "/uploads/profile/default.png"  ?>";
        $("#icon").attr("src", avatar);
        $(".card-body").each(function (i) {
            var id = $(this).next().find('img').attr('id');
            var rem = $(this).find('.rem');
            rem.remove();
            var href = 'assign-avatar?photo_id=' + id;
            $(this).append("<a href=" + href +
                " class='btn btn-danger avatar'>Назначить аватаром</a>" );
            var href = 'remove-photo?photo_id=' + id;
            $(this).append("<a href=" + href +
                " class='btn btn-danger ml-2'>Удалить</a>" );

        });
        if($('.avatar')){
            $('.avatar').on("click", function(e){
                // e.preventDefault();
                var id =  $(this).attr("data-id");

                /*var data = {

                };


                console.log(data, "DATa");
                $.ajax({
                    type: "POST",
                    url: '/mng/userform/assign-avatar',
                    ContentType: 'application/json',
                    data: {'data': data},
                    success    : function (data) {
                        alert("Аватар назначен");

                    },
                });*/

            });

        }
    })

</script>

<div class="userform-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    if ($model->sex) { ?>
        <div class="form-group field-profile-bio">
            <label class="col-lg-3 control-label">Пол</label>
            <div class="col-lg-9">
                <?= Html::textInput('sex_readonly', $model->sexname,
                    ['readonly' => 'readonly', 'class' => 'form-control']) ?>
            </div>
            <div class="col-sm-offset-3 col-lg-9"><div class="help-block"></div>
            </div>
        </div>
    <?php } else {
        echo $form->field($model, 'sex')->dropDownList(\app\models\Profile::getSexList());
    }
    ?>

    <?= $form->field($model, 'photo')->widget(\alexander777hub\crop\Widget::className(), [
        'uploadUrl' => \yii\helpers\Url::toRoute('/photo/upload'),
        'parent_table' => 'Userform',
        'photo_field' => 'photo',
        'items' => $model->getPhotos(),
        'obj_id_field' => 'photo_id',
        'noPhotoImage' => '/uploads/photo/default.png',
        'width' => 300,
        'height' => 400,
    ])->label("Фото") ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'soname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'second_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'was_born')->widget(etsoft\widgets\YearSelectbox::classname(), [
        'yearStart' => 0,
        'yearEnd' => -62,
    ]); ?>

    <?= $form->field($model, 'height')->textInput() ?>
    <?= $form->field($model, 'weight')->textInput() ?>
    <?= $form->field($model, 'city_id')->dropdownList(Profile::$city_list) ?>

    <?= $form->field($model, 'about_me')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'target')->checkboxList( \app\models\Userform::getTargets(),
        ['separator' => '<br>']) ?>
    <?= $form->field($model, 'about_partner')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'find_zone')->dropdownList(\app\models\Userform::getFindZone()) ?>
    <?= $form->field($model, 'ready_to_relocate')->dropdownList(\app\models\Userform::getRelocateStatus()) ?>
    <?= $form->field($model, 'phone')->textInput() ?>
    <?= $form->field($model, 'vk_link')->textInput() ?>




    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


