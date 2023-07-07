<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Profile;
use app\models\Ad;
use app\models\Userform;

/* @var $this yii\web\View */
/* @var $model app\models\Ad */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Свидания'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$userform = \app\models\Userform::find()->where(["user_id" => $model->user_id])->one();


/*var_dump($model->user_id);
if($userform){
    var_dump($userform->user_id);
} */
if ($userform && !$userform->avatar_id ){
    $src = "/uploads/profile/default.png";
} else {
    if(!$userform){
        $src =  "/uploads/profile/default.png";

    } else {

        $src =  Userform::getAvatarUrl($userform->avatar_id);

    }

}
$model->city_name = $userform && $userform->city_id && isset(\app\models\Profile::$city_list[$userform->city_id]) ? \app\models\Profile::$city_list[$userform->city_id] : "Не задано";

$model->username = $userform && $userform->first_name ? $userform->first_name  : "Не задано";

$sex =$userform && \app\models\Profile::$sex_list[$userform->sex] && $userform->sex != 0 ? \app\models\Profile::$sex_list[$userform->sex] : 'Не задано';
//$model->description = trim(htmlentities(strip_tags($model->description), ENT_QUOTES, 'UTF-8'));
$model->type_name = $model->type && isset(Ad::getTypeList()[$model->type]) ? Ad::getTypeList()[$model->type] : "Не задано";
?>

<div class="ad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src=<?= $src  ?> alt="Card image cap">
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Пользователь',
                'attribute' => 'username',
                'format'=>'html',
                'value' => function ($model) {
                    return $model->username;
                },
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Город',
                'attribute' => 'city_name',
                'format'=>'html',
                'value' => function ($model) {
                    return $model->city_name;
                },
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
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
                'label' =>'Название',
                'attribute' => 'title',
                'format'=>'html',
                'value' => function ($model) {
                    return $model->title;
                },
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
            //'created_at',
           // 'updated_at',
            //'type',
            'description',
           /* [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Примечание',
                'attribute' => 'note',
                'format'=>'html',
                'visible' => !Yii::$app->user->isGuest ? true : false

                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ], */
         /*   [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Пол',
                'attribute' => 'sex_name',
                'format'=>'html',

                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],*/
           // 'age',
        ],
    ]) ?>

</div>
