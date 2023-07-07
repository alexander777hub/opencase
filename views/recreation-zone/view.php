<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RecreationZone */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Места отдыха'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recreation-zone-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены что хотите удалить?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Тип',
                'attribute' => 'type_name',
                'format'=>'html',
                /*'value' => function ($model) {
                    return $model->getProfileAttribute('name') ? $model->getProfileAttribute('name') : 'Не задано';
                },*/
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
            'description',
            'title',
            'phones',
            'adress',
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Город',
                'attribute' => 'city_name',
                'format'=>'html',
                /*'value' => function ($model) {
                    return $model->getProfileAttribute('name') ? $model->getProfileAttribute('name') : 'Не задано';
                },*/
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
            'site',
            'vk_link',
            'comment',
            //'photo',
        ],
    ]) ?>

</div>
