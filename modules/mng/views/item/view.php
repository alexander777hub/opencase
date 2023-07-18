<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Item $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'internal_name',
            'icon',
            'icon_large',
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Цвет',
                'attribute' => 'scin_type',
                'format'=>'html',
                'value' => function ($model) {
                    return \app\models\Item::getScins()[$model->scin_type] ? \app\models\Item::getScins()[$model->scin_type] : null;
                },
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
        ],
    ]) ?>

</div>
