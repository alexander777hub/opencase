<?php

use app\modules\mng\models\Opening;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\mng\models\OpeningSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Кейсы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opening-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать кейс', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
           // 'avatar_id',
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Ссылка на фото',
                'attribute' => 'avatar_id',
                'format'=>'html',
                'value' => function ($model) {
                    return $model->avatar_id ? Html::a(Opening::getOriginal($model->avatar_id), [Url::to(Opening::getOriginal($model->avatar_id))]) : 'Не задано';
                },
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Цена',
                'attribute' => 'price',
                'format'=>'html',
                'value' => function ($model) {
                    return $model->price ? $model->price : 'Не задано';
                },
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Opening $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
