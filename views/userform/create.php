<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userform */

$this->title = Yii::t('app', 'Создать анкету');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Анкеты'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userform-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
