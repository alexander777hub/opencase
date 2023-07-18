<?php


use app\models\User;

?>


<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= /*Yii::$app->user->identity ? Yii::$app->user->identity->profile->photo :*/ '' ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $name = User::getUser(Yii::$app->user->getId())->getProfile() ? User::getUser(Yii::$app->user->getId())->getProfile()->getName() : User::getUser(Yii::$app->user->getId())->username; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Управление', 'options' => ['class' => 'header']],
                    ['label' => 'Кейсы', 'icon' => 'user-o', 'url' => ['/mng/case/index'], 'visible' =>  Yii::$app->user->can('administrator')],
                    ['label' => 'Предметы', 'icon' => 'user-o', 'url' => ['/mng/item/index'], 'visible' =>  Yii::$app->user->can('administrator')],
                    [
                        'label' => 'Системные шаблоны',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Шаблоны', 'icon' => 'book', 'url' => ['/billing/template'], 'visible' => Yii::$app->user->can('administrator')],
                            ['label' => 'Чанки шаблонов', 'icon' => 'book', 'url' => ['/billing/template-chunk'], 'visible' => Yii::$app->user->can('administrator')],
                            ['label' => 'Блоки шаблонов', 'icon' => 'book', 'url' => ['/billing/template-block'], 'visible' => Yii::$app->user->can('administrator')],
                            ['label' => 'Позиции чанков в блоках', 'icon' => 'book', 'url' => ['/billing/template-block-position'], 'visible' => Yii::$app->user->can('administrator')],
                        ],
                        'visible' => Yii::$app->user->can('administrator')
                    ],
                    ['label' => 'Страницы', 'icon' => 'navicon', 'url' => ['/pages/manager/index'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Категории', 'icon' => 'bars', 'url' => ['/blog/category'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Тэги', 'icon' => 'navicon', 'url' => ['/blog/tag/'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Статьи', 'icon' => 'navicon', 'url' => ['/blog/article'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Комментарии', 'icon' => 'navicon', 'url' => ['/comment/manage/index'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Блоки шаблонов', 'icon' => 'user-o', 'url' => ['/billing/template-block'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Сайты знакомств', 'icon' => 'user-o', 'url' => ['/admin/dating/index'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Секции', 'icon' => 'user-o', 'url' => ['/admin/section/index'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Фотографии', 'icon' => 'user-o', 'url' => ['/photo/index'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Группы ВК', 'icon' => 'user-o', 'url' => ['/vk-group'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Группы знакомств ВК', 'icon' => 'user-o', 'url' => ['/dating-vk'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Анкеты ВК', 'icon' => 'user-o', 'url' => ['/ancet'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Анкеты агенства', 'icon' => 'user-o', 'url' => ['/agency-ancet'], 'visible' => Yii::$app->user->can('administrator')],
                    ['label' => 'Заявки', 'icon' => 'user-o', 'url' => ['/order'], 'visible' => Yii::$app->user->can('administrator')],
                    [
                        'label' => 'Телеграм боты',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Телеграм боты', 'icon' => 'book', 'url' => ['/telegram/telegram-bot'], 'visible' => Yii::$app->user->can('administrator')],
                            ['label' => 'Телеграм каналы', 'icon' => 'book', 'url' => ['/telegram/telegram-channel'], 'visible' => Yii::$app->user->can('administrator')],
                            ['label' => 'Страницы', 'icon' => 'book', 'url' => ['/telegram/telegram-page'], 'visible' => Yii::$app->user->can('administrator')],
//                            ['label' => 'Меню', 'icon' => 'book', 'url' => ['/telegram/telegram-menu'], 'visible' => Yii::$app->user->can('administrator')],
                            ['label' => 'Формы', 'icon' => 'book', 'url' => ['/telegram/telegram-form'], 'visible' => Yii::$app->user->can('administrator')],
                            ['label' => 'Поля форм', 'icon' => 'book', 'url' => ['/telegram/telegram-form-field'], 'visible' => Yii::$app->user->can('administrator')],
                            ['label' => 'Результаты', 'icon' => 'book', 'url' => ['/telegram/telegram-result'], 'visible' => Yii::$app->user->can('administrator')],
                        ],
                        'visible' => Yii::$app->user->can('administrator')
                    ],
                    ['label' => 'Пользователи', 'icon' => 'book', 'url' => ['/user/admin/index'], 'visible' => Yii::$app->user->can('administrator')],
                    [
                        'label' => 'Клиенты',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Мужчины', 'icon' => 'book', 'url' => ['/admin/client'], 'visible' => Yii::$app->user->can('administrator')],
                            ['label' => 'Заказы', 'icon' => 'book', 'url' => ['/client-order/admin'], 'visible' => Yii::$app->user->can('administrator')],
                        ],
                        'visible' => Yii::$app->user->can('administrator')
                    ],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'В биллинг', 'icon' => 'user-o', 'url' => ['/billing/default/index'], 'visible' => Yii::$app->user->can('administrator')],
                ],

/*                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],*/
            ]
        ) ?>

    </section>

</aside>
