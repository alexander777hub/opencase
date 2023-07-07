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
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Анкеты'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
\app\assets\JQAsset::register($this);
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/comment.js?t=' . time());


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

    <p>
        <?= Html::a(Yii::t('app', 'Обновить'), ['update', 'id' => $model_userform->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Создать свидание'), ['ad/create-ad', 'userform_id' => $model_userform->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model_userform->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="card" style="width: 18rem;">
        <img width="300" class="card-img-top" src=<?= Userform::getAvatarUrl($model_userform->avatar_id)  ?> alt="Card image cap">
    </div>
    <h2> Свидания</h2>
    <?= GridView::widget([

     'dataProvider' => $dataProvider2,

    // 'filterModel' => $searchModel,

     'columns' => [

         ['class' => 'yii\grid\SerialColumn'],
         'title',


         [

	'class' => 'yii\grid\ActionColumn',

	'template' => '{view} {update} {delete} {link}',

	'buttons' => [

		/*'update' => function ($url,$model) {

			return Html::a(

				'<span class="glyphicon glyphicon-user"></span>',

				'ad/create-ad');

		},*/

		'view' => function ($url,$model,$key) {

				return Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1.125em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M573 241C518 136 411 64 288 64S58 136 3 241a32 32 0 000 30c55 105 162 177 285 177s230-72 285-177a32 32 0 000-30zM288 400a144 144 0 11144-144 144 144 0 01-144 144zm0-240a95 95 0 00-25 4 48 48 0 01-67 67 96 96 0 1092-71z"></path></svg>', Url::toRoute(['/ad/view', 'id'=> $model->id] ));

		},
        'update' => function ($url,$model,$key) {

            return Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>', Url::toRoute(['/ad/update', 'id'=> $model->id] ));

        },
        'delete' => function ($url,$model) {

			return Html::a(


				'<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"></path></svg>',

                Url::toRoute(['/ad/delete', 'id'=> $model->id]), ['data-method' => 'post']);

		},

	],

],

     ],

 ]); ?>


    <h2> Анкета</h2>

    <?= DetailView::widget([
        'model' => $model_userform,
        'attributes' => [
           // 'id',
            'first_name',
            'second_name',
            'soname',
            'vk_link',
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
            'was_born',
            'height',
            'weight',
           [
               'class' => yii\grid\DataColumn::className(),
               'label' =>'Статус',
               'attribute' => 'city_name',
               'format'=>'html',
               'value' => function ($model) {
                   return \app\models\Userform::getAncetStatus()[$model->status] ? \app\models\Userform::getAncetStatus()[$model->status] : null;
               },
               //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
           ],
           [
               'class' => yii\grid\DataColumn::className(),
               'label' =>'Источник',
               'attribute' => 'source',
               'format'=>'html',
               'value' => function ($model) {
                   return \app\models\Userform::getSourceList()[$model->source] ? \app\models\Userform::getSourceList()[$model->source] : null;
               },
               //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
           ],
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
<button  type="button"   class="btn ml-3 mb-3 btn-primary show-comment"  data-id = <?= $model_userform->id ?> data-toggle="modal" data-target="#exampleModal">
    Добавить комментарий
</button>
<div data-keyboard="false" data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea id="text-comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <div>

                </div>
                <div>
                    <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button value="" type="button" class="btn btn-primary" id="send">Добавить коммент</button>
                </div>
            </div>
        </div>
    </div>
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
<h4 class="card-title">Комментарии</h4>
<div class="card">
    <div class="card-body">
        <?php echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView'     => '_item',
            'layout' => "{items}",
            // 'itemOptions' => ['style' => 'margin-left: 1rem; margin-bottom:1rem;'],
            'options' => ['class' => 'comment-widgets m-b-20'],
            'pager'        => [
                'firstPageLabel' => 'first',
                'lastPageLabel'  => 'last',
                'nextPageLabel'  => 'next',
                'prevPageLabel'  => 'previous',
                'maxButtonCount' => 3,
            ],
        ]); ?>

    </div>
<?php

echo \yii\bootstrap4\LinkPager::widget([
    'pagination' => $dataProvider->getPagination(),
    'options' => [
        'class' => 'ml-auto',
    ],
]);
?>


<!--<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>  !-->




