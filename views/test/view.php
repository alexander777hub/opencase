<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;
use app\models\Userform;

/* @var $this yii\web\View */
/* @var $model_userform app\models\Userform */

$this->title = $model_userform->id;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
\app\assets\JQAsset::register($this);

?>
<style>
    /*@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700); */

    body {
      /*  background-color: #D32F2F; */
      /*  font-family: 'Calibri', sans-serif !important; */
    }

    .card-no-border .card {
        border: 0px;
        border-radius: 4px;
        -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem
    }

    .comment-widgets .comment-row:hover {
        background: rgba(0, 0, 0, 0.02);
        cursor: pointer;
    }

    .comment-widgets .comment-row {
        border-bottom: 1px solid rgba(120, 130, 140, 0.13);
        padding: 15px;
    }
    .comment-text:hover{
        visibility: hidden;
    }
    .comment-text:hover{
        visibility: visible;
    }

    .label {
        padding: 3px 10px;
        line-height: 13px;
        color: #ffffff;
        font-weight: 400;
        border-radius: 4px;
        font-size: 75%;
    }

    .round img {
        border-radius: 100%;
    }

    .label-info {
        background-color: #1976d2;
    }

    .label-success {
        background-color: green;
    }

    .label-danger {
        background-color: #ef5350;
    }

    .action-icons a {
        padding-left: 7px;
        vertical-align: middle;
        color: #99abb4;
    }

    .action-icons a:hover {
        color: #1976d2;
    }

    .mt-100 {
        margin-top: 100px
    }

    .mb-100 {
        margin-bottom: 100px
    }
</style>
<div class="userform-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src=<?= Userform::getAvatarUrl($model_userform->avatar_id)  ?> alt="Card image cap">
    </div>

    <?= DetailView::widget([
        'model' => $model_userform,
        //$age = $userform && $userform->was_born ? \app\models\Userform::getAge($userform->was_born) : "Не задано";
        'attributes' => [
           // 'id',
            'first_name',

           [
               'class' => yii\grid\DataColumn::className(),
               'label' =>'Город',
               'attribute' => 'city_name',
               'format'=>'html',
               /*'value' => function ($model) {
                   return $model->getProfileAttribute('name') ? $model->getProfileAttribute('name') : 'Не задано';
               },*/
               //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
           ],
           [
               'class' => yii\grid\DataColumn::className(),
               'label' =>'Пол',
               'attribute' => 'sexname',
               'format'=>'html',
               /*'value' => function ($model) {
                   return $model->getProfileAttribute('name') ? $model->getProfileAttribute('name') : 'Не задано';
               },*/
               //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
           ],

            'height',
            'weight',
           [
               'class' => yii\grid\DataColumn::className(),
               'label' =>'Цель знакомства',
               'attribute' => 'target_name',
               'format'=>'html',
               /*'value' => function ($model) {
                   return $model->getProfileAttribute('name') ? $model->getProfileAttribute('name') : 'Не задано';
               },*/
               //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
           ],

           'about_me:ntext',
           'about_partner:ntext',

            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Ареал поиска',
                'attribute' => 'find_zone_name',
                'format'=>'html',
                /*'value' => function ($model) {
                    return $model->getProfileAttribute('name') ? $model->getProfileAttribute('name') : 'Не задано';
                },*/
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Готовность к переезду',
                'attribute' => 'relocate_status',
                'format'=>'html',
            ],
        ],
    ]) ?>

</div>


<!--<div class="container justify-content-center mt-5 border-left border-right">
    <div class=" justify-content-center pt-3 pb-2"> </div>

        <div class=" justify-content-center py-2">
            <div class="second py-2 px-2"> <span class="text1"></span>
                <div class=" justify-content-between py-1 pt-2">
                    <div><img src="https://i.imgur.com/AgAC1Is.jpg" width="18"><span class="text2"></span></div>
                </div>
            </div>
        </div>
</div> --!>

<?php



?>

<!--<div class="container justify-content-center mt-5 border-left border-right">

</div> !-->
<div class="container d-flex justify-content-center mt-100 mb-100">
    <div class="row">
        <div class="col-md-12">


        </div>
    </div>
</div>



<!--<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>  !-->




