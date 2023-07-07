<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Photo;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Фото');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="photo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col">
            <p>
                <?= Html::a(Yii::t('app', 'Добавить фото'), ['create', 'id' => intval($_GET['id'])  ], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="col">
            <?php if (Yii::$app->user->can(\app\models\Profile::ROLE_ADMINISTRATOR) ||Yii::$app->user->can(\app\models\Profile::ROLE_MANAGER ) ||Yii::$app->user->can(\app\models\Profile::ROLE_MAIN_MANAGER )):?>
            <p>
                <?= Html::a(Yii::t('app', 'Назад к анкете'), ['/userform/view', 'id' => intval($_GET['id'])  ], ['class' => 'btn btn-success']) ?>
            </p>
            <?php else:  ?>
                <?= Html::a(Yii::t('app', 'Назад к анкете'), ['/ancet/view', 'id' => intval($_GET['id'])  ], ['class' => 'btn btn-success']) ?>
            <?php endif;  ?>

        </div>
    </div>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'userform_id',
            'type',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Photo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'userform_id' =>intval($_GET['id']) ]);
                 }
            ],
        ],
    ]); ?>


</div>
