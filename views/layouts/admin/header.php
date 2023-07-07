<?php
use yii\helpers\Html;
use app\modules\billing\models\Domain;

/* @var $this \yii\web\View */
/* @var $content string */

$roles = \Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);

?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">Админка</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <?php
               /* $d_curr = Yii::$app->getModule('billing')->domain;
                if (empty($d_curr)) {
                    $d_curr_name = 'Выберите сайт';
                } else {
                    $d_curr_name = $d_curr['name'];
                }
                $domains = Domain::getList();
                $d_items = [];
                foreach ($domains as $id=>$name) {
                    $d_items[] = ['label' => $name, 'url' => ['/billing/domain/select-domain', 'id' => $id]];
                }

                $menuItems = [
                    ['label' => $d_curr_name, 'url' => 'javascript:void(0);',
                        'items' => $d_items,
                    ]
                ];
                echo \yii\bootstrap\Nav::widget([
                    'options' => [
                        'class' => 'navbar-nav navbar-left',
                    ],
                    'items' => $menuItems,
                ]);*/
                ?>
               <!-- Messages: style can be found in dropdown.less-->


            </ul>
        </div>
    </nav>
</header>
