<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\select2\Select2;
use app\models\Profile;

/**
 * @var yii\web\View $this
 * @var app\models\User $user
 * @var app\models\Profile $profile
 */

Yii::$app->assetManager->bundles['yii\bootstrap4\BootstrapAsset'] = [
    'sourcePath' => null,
    'css' => [],
    'js' => [],
];
?>

<?php $this->beginContent('@dektrium/user/views/admin/update.php', ['user' => $user]) ?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-9',
        ],
    ],
]); ?>


<?php /*echo $form->field($profile, 'photo')->widget(budyaga\cropper\Widget::className(), [
    'uploadUrl' => \yii\helpers\Url::toRoute('/user/settings/uploadPhoto'),
    'width' => '300',
    'height' => '400',
    'aspectRatio' => 0.75,
    'cropAreaWidth' => '400',
    'cropAreaHeight' => '500',
])*/ ?>

<?= $form->field($profile, 'birthday')->widget(\yii\jui\DatePicker::className(),[
    'language' => 'en-Gb',
    'dateFormat' => 'yyyy-MM-dd',
    'clientOptions' => [
        'defaultDate' => '1990-01-01',
        'changeMonth'=> true,
        'changeYear'=> true,
        'yearRange' => "-90:-18",
    ],
    'options' => ['class' => 'form-control',]
]) ?>



<?= $form->field($profile, 'sex')->dropDownList(\app\models\Profile::getSexList()) ?>

<?= $form->field($profile, 'name') ?>

<?= $form->field($profile, 'city_id')->dropdownList(Profile::$city_list) ?>

<?= $form->field($profile, 'vk_link') ?>

<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?= Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?>
        <br>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
