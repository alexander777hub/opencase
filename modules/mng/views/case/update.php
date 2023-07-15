<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\mng\models\Opening $model */

$this->title = 'Update Opening: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Openings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="opening-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
