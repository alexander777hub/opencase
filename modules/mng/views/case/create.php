<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\mng\models\Opening $model */

$this->title = 'Create Opening';
$this->params['breadcrumbs'][] = ['label' => 'Openings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opening-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
