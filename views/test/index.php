<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Ad;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserformAncetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Ad */

$this->title = Yii::t('app', 'Анкеты');
$this->params['breadcrumbs'][] = $this->title;

$city_list = \app\models\Profile::$city_list;
$s = $searchModel;


?>
<h1><?= Html::encode($this->title) ?></h1>


<div class="container">
    <?php $form = \yii\bootstrap4\ActiveForm::begin([
        'action' => Url::to(['/test/index']),
        'method' => 'get',
        'options' => ['class' => 'form-inline form-group form-group-sm col-xs-12'],
        'fieldConfig' => [
            'template' => "{input}",
        ],
    ]); ?>
    <nobr>
        <div class="row">

            <div class="col-sm-6">
                Город
                <?= $form->field($searchModel, 'city_id')->textInput()->dropdownList(\app\models\Profile::getCityList()); ?>
            </div>

            <div class="col-sm-6">
                Цель знакомства
                <?= $form->field($searchModel, 'target')->textInput()->dropdownList(\app\models\Userform::getTargetsForSelect()); ?>

        </div>


        <?= Html::submitButton(Yii::t('app', 'Найти'), ['class' => 'btn btn-warning mt-3']) ?>
    </nobr>

    <?php \yii\bootstrap4\ActiveForm::end(); ?>
</div>




<div class="sidebar-box ftco-animate">

    <?php echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => "{items}",
        'itemOptions' => ['style' => 'margin-left: 1rem; margin-bottom:1rem;'],
        'options' => ['class' => 'row'],
        'pager' => [
            'firstPageLabel' => 'first',
            'lastPageLabel' => 'last',
            'nextPageLabel' => 'next',
            'prevPageLabel' => 'previous',
            'maxButtonCount' => 3,
        ],

    ]);?>

    <div class="row mt-5">
        <div class="col text-center ml-auto">
            <?php
            echo \yii\bootstrap4\LinkPager::widget([
                'pagination' => $dataProvider->getPagination(),
                'options' => [
                    'class' => 'ml-auto',
                ],
            ]);
            ?>
        </div>
    </div>




