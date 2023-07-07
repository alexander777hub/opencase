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
    <?php if(!Yii::$app->user->isGuest):   ?>
    <p>

        <?= Html::a(Yii::t('app', 'Пригласить на свидание'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php  endif;  ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        //'id',
        // 'updated_at',
        //'status',
        //'type',
        //'username',
        //'link',
        'title',
        'description',
        'age',
       // 'user_id',
        // 'template' => null,
        [
            'class'          => ActionColumn::className(),
            'visibleButtons' => [
                'view'   => false,
                'update' => false,
                'delete' => false,
            ],
            'urlCreator'     => function ($action, Ad $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ],
]); ?>


