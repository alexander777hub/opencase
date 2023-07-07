<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model_userform app\models\Userform */

$this->title = $model_userform->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Анкеты'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
\app\assets\JQAsset::register($this);
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/comment.js');
?>
<style>



    .addtxt{
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: center;
        font-size: 13px;
        background-color: #e5e8ed;
        font-weight: 500;
    }
    .form-control: focus{
        color: #000;
    }
    .second{
        background-color: white;
        border-radius: 4px;
        box-shadow: 10px 10px 5px #aaaaaa;
    }
    .text1{
        font-size: 13px;
        font-weight: 500;
        color: #56575b;
    }
    .text2{
        font-size: 13px;
        font-weight: 500;
        margin-left: 6px;
        color: #56575b;
    }
    .text3{
        font-size: 13px;
        font-weight: 500;
        margin-right: 4px;
        color: #828386;
    }
    .text3o{
        color: #00a5f4;

    }
    .text4{
        font-size: 13px;
        font-weight: 500;
        color: #828386;
    }
    .text4i{
        color: #00a5f4;
    }
    .text4o{
        color: white;
    }
    .thumbup{
        font-size: 13px;
        font-weight: 500;
        margin-right: 5px;
    }
    .thumbupo{
        color: #17a2b8;
    }
</style>
<div class="userform-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Обновить'), ['update', 'id' => $model_userform->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model_userform->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src=<?= \app\models\Photo::getAvatarUrl($model_userform->avatar_id)  ?> alt="Card image cap">
    </div>

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
                'label' =>'Цель',
                'attribute' => 'target_name',
                'format'=>'html',
                /*'value' => function ($model) {
                    return $model->getProfileAttribute('name') ? $model->getProfileAttribute('name') : 'Не задано';
                },*/
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Цель встречи',
                'attribute' => 'target_meeting_purpose_name',
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
                'label' =>'Пол партнера',
                'attribute' => 'partner_sex_name',
                'format'=>'html',
                /*'value' => function ($model) {
                    return $model->getProfileAttribute('name') ? $model->getProfileAttribute('name') : 'Не задано';
                },*/
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
            [
                'class' => yii\grid\DataColumn::className(),
                'label' =>'Возраст парнера',
                'attribute' => 'partner_age_name',
                'format'=>'html',
                /*'value' => function ($model) {
                    return $model->getProfileAttribute('name') ? $model->getProfileAttribute('name') : 'Не задано';
                },*/
                //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
            ],
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
            'comment:ntext',
            // 'avatar_id',
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

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn',

        ],

        [
            'class' => yii\grid\DataColumn::className(),
            'label' =>'Пользователь',
            'attribute' => 'user_name',
            'format'=>'html',
            //  'filter' => yii\helpers\ArrayHelper::map(app\models\Customobj::find()->all(), 'Id', 'Key')
        ],
        'text',

        //'was_born',
        //'height',
        //'weight',
        //'city_id',
        //'target',
        //'about_me:ntext',
        //'about_partner:ntext',
        //'find_zone',
        //'ready_to_relocate',
        //'comment:ntext',
        //'avatar_id',
        [
            'class' => ActionColumn::className(),
            'template' => ' {delete}',
            'buttons' => [
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::button('Press me!', ['type'=>'button',
                                                      'class' => 'btn ml-3 mb-3 btn-primary show-comment',
                                                      'data-toggle' => 'modal',
                                                      'data-target'=> '#exampleModal',
                                                      'data-id' => $model->id,
                    ]);
                }
            ],


            'urlCreator' => function ($action, \app\models\Comment $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],


    ],
]); ?>



