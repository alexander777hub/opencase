<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = "Контакты";

/*Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = [
    'sourcePath' => null,
    'js' => [],
];*/
\app\assets\JQAsset::register($this);
?>


    <h1> Контакты</h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Your letter has been successfully sent by the site administration. Thanks!
        </div>

        <p>
        </p>

    <?php else: ?>

        <!-- Get in Touch-->
        <section class="section section-lg bg-default">
            <div class="container">
                <h3>Свяжитесь с нами</h3>
                <!-- RD Mailform-->
                <?php $form = ActiveForm::begin([
                    'id' => 'contact-form',
                    'options' => [
                        'class' => 'rd-form form-lg',
                    ],
                    'fieldConfig' => [
                        'template' => "{beginWrapper}\n{input}\n{label}\n{hint}\n{error}\n{endWrapper}",
                        'options' => [
                            'class' => 'form-wrap form-wrap-icon',
                        ],
                        'inputOptions' => [
                            'class' => 'form-input'
                        ],
                        'labelOptions' => [
                            'class' => 'form-label'
                        ],
                    ]
                ]); ?>

                <div class="row row-30">
                    <div class="col-lg-4">
                        <?= $form->field($model, 'name',[
                            'template' => "{beginWrapper}\n{input}\n{label}\n{hint}\n{error}\n<div class=\"icon form-icon mdi mdi-account-outline  text-primary\"></div>{endWrapper}"
                        ])->textInput(['class'=>'contact']); ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'email',[
                            'template' => "{beginWrapper}\n{input}\n{label}\n{hint}\n{error}\n<div class=\"icon form-icon mdi mdi-email-outline text-primary\"></div>{endWrapper}"
                        ])->textInput(['class'=>'contact']); ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($model, 'subject',[
                            'template' => "{beginWrapper}\n{input}\n{label}\n{hint}\n{error}\n<div class=\"icon form-icon mdi  mdi-label text-primary\"></div>{endWrapper}"
                        ])->textInput(['class'=>'contact']); ?>
                    </div>
                    <div class="col-12">
                        <?= $form->field($model, 'body',[
                            'template' => "{beginWrapper}\n{input}\n{label}\n{hint}\n{error}\n<div class=\"icon form-icon mdi mdi-message-outline text-primary\"></div>{endWrapper}"
                        ])->textarea(['class'=>'contact-textarea']); ?>
                    </div>
                    <div class="col-12">
                        <?php
                        echo '<div style="display: none;">';
                        echo Html::textInput('email', '');
                        echo Html::hiddenInput('validation_key', '', ['id' => 'validation_key']);
                        echo '</div>';
                        /*echo $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-4">{image}</div><div class="col-lg-5">{input}</div></div>',
                        ])*/ ?>
                        <?= $form->field($model, 'acordul_tc')
                            ->checkbox(
                                ['template' => "{beginWrapper}\n<label class=\"checkbox-inline checkbox-modern\">{input}".Yii::t('app', 'Я согласен с {link:create}Условиями соглашения{/link}',[
                                        'link:create' => '<a href="/site/agreement" target="_blank">',
                                        '/link' => '</a>'])."</label>\n{endWrapper}"]
                            )->label(false) ?>
                    </div>

                </div>
                <div class="form-wrap form-wrap-button">
                    <?= Html::submitButton('Отправить', [ 'id'=> 'cfb_2', 'class' => 'button button-lg button-primary', 'name' => 'contact-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </section>

        <?php /*
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin([
                    'id' => 'contact-form',
                ]); ?>
                <?= $form->errorSummary($model) ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?php
                    echo '<div style="display: none;">';
                    echo Html::textInput('email', '');
                    echo Html::hiddenInput('validation_key', '', ['id' => 'validation_key']);
                    echo '</div>';
                    ?>

                    <?= $form->field($model, 'acordul_tc',
                        ['options' => ['tag' => 'span'],
                            'template' => "{input}"]
                    )
                        ->checkbox(['checked' => false, 'required' => true])->label(Yii::t('app', 'Agree Contacts',[
                            'link:create' => '<a href="/agreement" target="_blank">',
                            '/link' => '</a>']));
                    ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', [ 'id'=> 'cfb_2', 'class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
 <?php */ ?>

    <?php endif; ?>

<?php
$validation_key = $this->context->validation_key;
$script = <<< JS
$('#cfb_2').click( function() {
  $('#validation_key').val('$validation_key');
  $('#contact-form').submit();
})
JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>
