<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Profile;
use app\models\Userform;

/* @var $this yii\web\View */
/* @var $model app\models\Userform */
/* @var $form yii\widgets\ActiveForm */

?>
<?php if(!$model->isNewRecord ):   ?>


    <p>
        <?= Html::a(Yii::t('app', 'Добавить/Редактировать фото'), ['/photo_module/photo/index?id=' . $model->id  ], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif;   ?>
<?php if(!$model->isNewRecord && !$model->getPhotos()->all()):   ?>

    <div class="alert alert-warning" role="alert">
        Вы не добавили ни одного фото!
    </div>
<?php endif;   ?>

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

    <?= $form->field($model, 'about_partner')->textarea(['rows' => 6]) ?>




    <?= $form->field($model, 'partner_sex')->dropDownList(\app\models\Profile::$sex_list)->label("Пол партнера"); ?>

    <?= $form->field($model, 'meeting_purpose')->checkboxList( \app\models\Userform::getMeetingTargets(),
        ['separator' => '<br>'])->label("Цель встречи") ?>

    <?= $form->field($model, 'partner_age_min')->dropDownList(Userform::getAgeRange())->label("Минимальный возраст партнера"); ?>
    <?= $form->field($model, 'partner_age_max')->dropDownList(Userform::getAgeRange())->label("Максимальный возраст партнера"); ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



