<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecreationZone */

$this->title = Yii::t('app', 'Создать Место отдыха');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Места отдыха'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recreation-zone-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
