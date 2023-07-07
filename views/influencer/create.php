<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Influencer */

$this->title = Yii::t('app', 'Create Influencer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Influencers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="influencer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
