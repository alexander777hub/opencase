<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */

$this->title = Yii::t('app', 'Обновить фото: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Фото'), 'url' => ['index', 'id' => intval($_GET['userform_id'])]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>
<div class="photo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
