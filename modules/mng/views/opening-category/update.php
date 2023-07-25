<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\mng\models\OpeningCategory $model */

$this->title = 'Update Opening Category: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Opening Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="opening-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
