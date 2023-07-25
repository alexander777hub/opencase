<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\mng\models\OpeningCategory $model */

$this->title = 'Create Opening Category';
$this->params['breadcrumbs'][] = ['label' => 'Opening Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opening-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
