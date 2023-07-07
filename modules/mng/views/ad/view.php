<?php

use app\models\Profile;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ad */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Свидания'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="ad-view">

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
           // 'id',
            //'created_at',
            'updated_at',
           // 'status_name',
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Статус',
                'attribute' => 'status_name',
                'format'=>'html',
                /*'value' => function ($model) {
                    return $model->getProfileAttribute('name') ? $model->getProfileAttribute('name') : 'Не задано';
                },*/
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
            //'type',
            'description',
            'sex_name',
            'age',
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Пользователь',
                'attribute' => 'user_id',
                'format'=>'html',
                'value' => function ($model) {
                    return $model->getProfileAttribute('name') ? $model->getProfileAttribute('name') : 'Не задано';
                },
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Город',
                'attribute' => 'city_name',
                'format'=>'html',
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
        ],
    ]) ?>

</div>
