<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Userform;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Анкеты');
$this->params['breadcrumbs'][] = $this->title;
\app\assets\JQAsset::register($this);
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/comment.js?t=' . time());

?>

<div class="userform-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Создать анкету'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{summary}{items}',
        'options' => [
            'class' => 'table-responsive',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',

            ],

            'id',
            'first_name',
            'soname',
            'vk_link',

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
                'template' => '{view} {update} {delete} {myButton} {link}',
                'buttons' => [
                    'link' => function ($url,$model,$key) {

                        return Html::a('<i class="fa fa-fw fa-user"></i> Добавить ссылку', Url::toRoute(['/link/set-link', 'id'=> $model->id] ));

                    },
                'myButton' => function($url, $model, $key) {     // render your custom button
                    return Html::button('Добавить коммент', ['type'=>'button',
                                                      'class' => 'btn ml-3 mb-3 btn-primary show-comment',
                                                      'data-toggle' => 'modal',
                                                      'data-target'=> '#exampleModal',
                                                      'data-id' => $model->id,
                    ]);
                }
            ],


                'urlCreator' => function ($action, Userform $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],


        ],
    ]); ?>

    <?php
    echo \yii\bootstrap4\LinkPager::widget([
        'pagination' => $dataProvider->getPagination(),
    ]);
    ?>


</div>
<!--<button  type="button"   class="btn ml-3 mb-3 btn-primary js-show-upload-icon" data-toggle="modal" data-target="#exampleModal">
    Добавить фото
</button> !-->
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

