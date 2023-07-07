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
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use app\models\Ad;
use app\models\Profile;
use app\models\Userform;
use yii\authclient\widgets\AuthChoice;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 *
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
\app\assets\JQAsset::register($this);

?>

<div class="panel-body">
    <?=

    Html::a('<button class="btn btn-primary"> Steam</button>', '/site/steam', ['data-pjax' => 0, 'target' => "_blank"]);
    ?>

</div>







