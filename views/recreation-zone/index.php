<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\RecreationZone;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RecreationZoneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Места отдыха');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recreation-zone-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить Место отдыха'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'type',
            'description',
            'title',
            'phones',
            //'adress',
            //'city_id',
            //'site',
            //'vk_link',
            //'comment',
            //'photo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RecreationZone $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
