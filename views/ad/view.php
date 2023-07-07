<?php

use app\models\Profile;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Ad */

$this->title = $model->id;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$userform = \app\models\Userform::find()->where(['user_id'=> $model->user_id])->one();
$model->sex_name = $userform && $userform->sex && \app\models\Profile::$sex_list[$userform->sex] && $userform->sex != 0 ? \app\models\Profile::$sex_list[$userform->sex] : 'Не задано';
$model->age = $userform && $userform->was_born ? \app\models\Userform::getAge($userform->was_born) : "Не задано";
$model->username = $userform && $userform->first_name ? $userform->first_name  : "Не задано";
$model->city_name = $model && $model->city_id && isset(\app\models\Profile::$city_list[$model->city_id]) ? \app\models\Profile::$city_list[$model->city_id] : "Не задано";

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
           // 'updated_at',
           // 'status_name',
           [
               'class' => yii\grid\DataColumn::className(),
               'label' =>'Тип',
               'attribute' => 'type_name',
               'format'=>'html',
               'value' => function ($model) {
                   return $model->type_name;
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
           'title',
            //'type',
            'description',
           [
               'attribute' => 'note',
               'visible' => Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR) || Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) ||   Yii::$app->user->can(Profile::ROLE_MANAGER)
           ],
            //'sex_name',
           // 'age',
        ],
    ]) ?>

</div>
