<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Ad;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Свидания');
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a(Yii::t('app', 'Пригласить на свидание'), ['ad/create'], ['class' => 'btn btn-success']) ?>
</p>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        //'id',
       // 'username',
        //'link',

        [
            'class' => yii\grid\DataColumn::className(),
            'label' =>'Название свидания',
            'attribute' => 'title',
            'format'=>'html',
            'value' => function ($model) {
                return $model->title ? Html::a($model->title, ['ad/view', 'id' => $model->id]) : 'Не задано';
            },
            //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
        ],
       // 'updated_at',
        //'status',
        //'type',
        // 'description',
        //'sex',
        //'age',
        //'user_id',
        [
            'class' => ActionColumn::className(),


            'template' => '{view} {update} {delete} {link}',

            'buttons' => [
                ['view' => function ( $url,$model) {

                    return Html::a(

                        '<span class="glyphicon glyphicon-user"></span>',

                        '/ad/view');

                },
                'link' => function ($url,$model,$key) {

                    return Html::a('Action', '/ad/view');

                },

                    ],

            ],

            'urlCreator' => function ($action, Ad $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ],
]); ?>
