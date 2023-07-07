<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\Profile;
use app\models\Userform;
AppAsset::register($this);

$ancet_id = null;

if(!Yii::$app->user->isGuest){
    $ancet = Userform::find()->where(['user_id'=> Yii::$app->user->id])->one();
    if($ancet){
        $ancet_id = $ancet->id;
    }


}
//var_dump(\Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR));
//var_dump(\Yii::$app->user->can(Profile::ROLE_MANAGER));

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>

    <?php /*

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <?php if(Yii::$app->user->isGuest): ?>
                    <li class="nav-item">
                        <a class="nav-link" href=<?= \yii\helpers\Url::to(" /user/security/login") ?>>Sign In</a>
                    </li>

                <?php else: ?>
                    <li class="nav-item active">
                        <a class="nav-link" href=<?= \yii\helpers\Url::to("/ad/index") ?>> To Ads <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href=<?= \yii\helpers\Url::to("/cabinet/index") ?>> To My Ads <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= \yii\helpers\Url::to(['user/security/logout'])?>" data-method="post"> Logout <span class="sr-only">(current)</span></a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href=<?= \yii\helpers\Url::to("/user/registration/register") ?>>Sign Up</a>
                </li>
            </ul>
            <span class="navbar-text">
    </span>
        </div>
    </nav>
 */

    NavBar::begin([
        'brandLabel' => 'Свидание',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-dark bg-dark',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav mr-auto'], 'items' => [
            //['label' => 'Мои свидания', 'url' => ['/cabinet/index'],  'visible' => !\Yii::$app->user->isGuest],
            //['label' => 'Контакты', 'url' => ['/site/contact']],
            // '<li style="padding-top: 8px">'.LanguageDropdown::widget().'</li>',
            ['label' => 'Войти', 'url' => ['/user/security/login'], 'visible' => Yii::$app->user->isGuest],
            ['label' => 'Зарегистрироваться', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest],
            [
                'label' => (!Yii::$app->user->isGuest) ? 'Личный кабинет ' .Yii::$app->user->identity->username : 'Гость',
                'template' => '<a href="{url}" ><i class="ti-user"></i> {label} <i class="fa fa-angle-down"></i></a>',
                'items' => [
                    ['label' => Yii::t('app','Профиль'), 'url' => '/user/settings/profile'],
                    ['label' => 'Мои свидания', 'url' => ['/cabinet/index'],  'visible' => !\Yii::$app->user->isGuest],
                    // ['label' => Yii::t('app','Настройки'), 'url' => '/user/settings/account'],
                    ['label' => 'Анкета', 'url' =>  '/ancet/view?id=' . $ancet_id],
                    //                    ['label' => Yii::t('app','Социальные сети'), 'url' => '/user/settings/networks'],
                    //                    ['label' => Yii::t('app', 'Мои записи'), 'url' => ['/cabinet'], 'visible' => !\Yii::$app->user->isGuest],
                    //                    ['label' => Yii::t('app', 'Мои фотографии'), 'url' => ['/cabinet/photo'], 'visible' => !\Yii::$app->user->isGuest],
                    //['label' => Yii::t('app','Управление пользователями'), 'url' => '/user/admin', 'visible' => \Yii::$app->user->can('administrator')],
                    // ['label' => 'Анкеты', 'url' => ['/userform/index']], 'visible' => \Yii::$app->user->can([\app\models\Profile::])],
                    //  ['label' => 'Анкеты', 'url' => '/userform/index', 'visible' => \Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR) || \Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) ||   \Yii::$app->user->can(Profile::ROLE_MANAGER)],

                    //                    ['label' => Yii::t('app', 'Управление блогом'), 'url' => ['/blog/article'], 'visible' => \Yii::$app->user->can('administrator')],

                ],
                'visible' => !Yii::$app->user->isGuest,
            ],
            ['label' => 'Кабинет менеджера', 'url' => ['/mng'], 'visible' =>  \Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR) || \Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) ||   \Yii::$app->user->can(Profile::ROLE_MANAGER)],
            [
                'label' => 'Администрирование',
                'template' => '<a href="{url}" ><i class="ti-user"></i> {label} <i class="fa fa-angle-down"></i></a>',
                'items' => [
                    ['label' => 'Демо ссылки', 'url' => ['/link/index'],  'visible' => \Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR) || \Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) ||   \Yii::$app->user->can(Profile::ROLE_MANAGER)],
                    ['label' => 'Модерация объявлений', 'url' => ['/admin'],  'visible' => \Yii::$app->user->can('administrator')],
                    ['label' => Yii::t('app','Управление пользователями'), 'url' => '/user/admin', 'visible' => \Yii::$app->user->can('administrator')],
                    // ['label' => 'Список заведений', 'url' => ['recreation-zone/index'],  'visible' => \Yii::$app->user->can('administrator')],
                    //                    ['label' => Yii::t('app','Социальные сети'), 'url' => '/user/settings/networks'],
                    //                    ['label' => Yii::t('app', 'Мои записи'), 'url' => ['/cabinet'], 'visible' => !\Yii::$app->user->isGuest],
                    //                    ['label' => Yii::t('app', 'Мои фотографии'), 'url' => ['/cabinet/photo'], 'visible' => !\Yii::$app->user->isGuest],
                    //['label' => Yii::t('app','Управление пользователями'), 'url' => '/user/admin', 'visible' => \Yii::$app->user->can('administrator')],
                    // ['label' => 'Анкеты', 'url' => ['/userform/index']], 'visible' => \Yii::$app->user->can([\app\models\Profile::])],
                    //  ['label' => 'Анкеты', 'url' => '/userform/index', 'visible' => \Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR) || \Yii::$app->user->can(Profile::ROLE_MAIN_MANAGER) ||   \Yii::$app->user->can(Profile::ROLE_MANAGER)],

                    //                    ['label' => Yii::t('app', 'Управление блогом'), 'url' => ['/blog/article'], 'visible' => \Yii::$app->user->can('administrator')],

                ],
                'visible' =>   \Yii::$app->user->can(Profile::ROLE_ADMINISTRATOR),
            ],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
            ['label' => Yii::t('app', 'Выйти'), 'url' => ['/site/logout'],
             'visible' => !\Yii::$app->user->isGuest,
             'linkOptions' => [
                 'data' => ['method' => 'post']
             ],
             //                        'template' => '<a href="{url}" data-method="post" data-params="'.Yii::$app->request->csrfParam.'='.Yii::$app->request->getCsrfToken().'"><i class="ti-lock"></i> {label}</a>',
             'template' => '<a href="{url}" data-method="post"><i class="ti-lock"></i> {label}</a>',
            ]
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; Свидание </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

