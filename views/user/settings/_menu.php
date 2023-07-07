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
use dektrium\user\widgets\UserMenu;
use yii\widgets\Menu;

/**
 * @var dektrium\user\models\User $user
 */

$user = Yii::$app->user->identity;
?>
<div class="card">
    <?= Html::img($user->profile->getAvatarUrl(24), [
        'class' => 'card-img-top',
        'alt' => $user->username,
    ]) ?>
    <div class="card-body">
        <div class="card-title">
            <h3>
                <?= Html::img($user->profile->getAvatarUrl(24), [
                    'class' => 'img-rounded',
                    'alt' => $user->username,
                ]) ?>
                <?= $user->username ?>
            </h3>
        </div>
        <div class="card-text">
            <?= Menu::widget([
                'options' => [
                    'class' => 'nav',
                ],
                'item-options' => [
                    'class' => 'nav-item',
                ],
                'items' => [
                    ['label' => Yii::t('user', 'Profile'), 'url' => ['/user/settings/profile']],
                    ['label' => Yii::t('user', 'Account'), 'url' => ['/user/settings/account']],
                    [
                        'label' => Yii::t('user', 'Networks'),
                        'url' => ['/user/settings/networks'],
                        'visible' => count(Yii::$app->authClientCollection->clients) > 0
                    ],
                    [
                        'label' => 'Мои рефералы',
                        'url' => ['/user/settings/referrals'],
                        'visible' => Yii::$app->user->can('manager')
                    ],
                    [
                        'label' => 'Мое резюме',
                        'url' => ['/resume/personal'],
                    ],
                    [
                        'label' => 'Мои записи',
                        'url' => ['/blog/post/user'],
                        'visible' => Yii::$app->user->can('manager')
                    ],
                    [
                        'label' => 'Добавить запись',
                        'url' => ['/blog/post/create'],
                        'visible' => Yii::$app->user->can('manager')
                    ],
                    [
                        'label' => 'Мои тикеты',
                        'url' => ['/ticket/ticket/index'],
                    ],
                    [
                        'label' => 'Открыть тикет',
                        'url' => ['/ticket/ticket/open'],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
