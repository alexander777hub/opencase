<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\SettingsForm $model
 */

$this->title = Yii::t('user', 'Мои рефералы');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php Pjax::begin() ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel'  => false,
                    'layout'       => "{items}\n{pager}",
                    'columns' => [
                        [
                            'attribute' => 'user_id',
                            'headerOptions' => ['style' => 'width:90px;'], # 90px is sufficient for 5-digit user ids
                        ],
                        'name',
                        [
                            'attribute' => 'user.username',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a($model->user->username, ['/user/profile/show', 'id' => $model->user_id]);
                            }
                        ],
                        'public_email:email',
                    ],
                ]); ?>

                <?php Pjax::end() ?>
            </div>
        </div>
