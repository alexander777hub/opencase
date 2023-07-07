<?php

use yii\grid\ActionColumn;
use yii\helpers\Url;
use app\models\Ad;
use yii\grid\GridView;
use yii\helpers\Html;

?>
<p class="mb-3">
    <?= Html::a(Yii::t('app', 'Создать объявление'), ['create'], ['class' => 'btn btn-success']) ?>

</p>
<p class="mb-3">
    <?= Html::a(Yii::t('app', 'Создать место отдыха'), ['recreation-zone/create'], ['class' => 'btn btn-success']) ?>

</p>
<p class="mb-3">
    <?= Html::a(Yii::t('app', 'Список мест отдыха'), ['recreation-zone/index'], ['class' => 'btn btn-success']) ?>

</p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        //'id',
        // 'updated_at',
        //'status',
        //'type',
        [
            'class' => yii\grid\DataColumn::className(),
            'label' =>'Статус',
            'attribute' => 'status_name',
            'format'=>'html',
            'value' => function ($model) {
                return $model->status_name;
            },
            //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
        ],
        'username',
        'link',
        'title',
        'description',
        'age',
        // 'user_id',
        // 'template' => null,

        [
            'class'          => ActionColumn::className(),
           /* 'visibleButtons' => [
                'view'   => false,
                'update' => false,
                'delete' => false,
            ], */
            'urlCreator'     => function ($action, Ad $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ],
]); ?>
