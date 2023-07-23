<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\Profile;
use app\models\Userform;
use app\models\User;


\app\assets\AppAsset::register($this);


if(!Yii::$app->user->isGuest){
    $user_id =  User::getUser(Yii::$app->user->getId())->getProfile() ?  User::getUser(Yii::$app->user->getId())->getProfile()->user_id : Yii::$app->user->getId();
    $photo = User::getUser(Yii::$app->user->getId())->getProfile() && User::getUser(Yii::$app->user->getId())->getProfile()->photo ? User::getUser(Yii::$app->user->getId())->getProfile()->photo : '/uploads/photo/default.png';
    $credit = \app\models\User::getUser(Yii::$app->user->getId())->getProfile() ? \app\models\User::getUser(Yii::$app->user->getId())->getProfile()->credit : '0.00';
    $name = User::getUser(Yii::$app->user->getId())->getProfile() ? User::getUser(Yii::$app->user->getId())->getProfile()->getName() : User::getUser(Yii::$app->user->getId())->username;
    if(!User::getUser(Yii::$app->user->getId())->getProfile()->getName() && !User::getUser(Yii::$app->user->getId())->username){
        $name = 'Не задано';
    }
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>

    <!-- Mirrored from forcedrop.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Jul 2023 15:31:40 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
    <head>
        <link rel="stylesheet" type="text/css" href="/css/drop.css">
        <link rel="stylesheet" href="/css/fonts.googleapis.com/css19c1.css?family=Exo+2:400,400i,500,500i,700,700i,800&amp;subset=cyrillic">
        <link rel="stylesheet" href="/css/widget.css" class="jv-css">
        <meta property="vk:title" content="UpDrop - кейсы CS:GO, новые кейсы CS:GO!">
        <meta property="vk:description" content="UpDrop - Открывай честные кейсы CS:GO! Миллионы игроков, честное открытие, моментальный вывод скинов в Steam! Заходи!">
        <meta property="og:title" content="UpDrop - кейсы CS:GO, новые кейсы CS:GO!">
        <meta property="og:description" content="UpDrop - Открывай честные кейсы CS:GO! Миллионы игроков, честное открытие, моментальный вывод скинов в Steam! Заходи!">
    </head>
    <?php $this->beginBody() ?>
    <body>
        <div class="layout">
            <div class="layout__header">
                <div class="header-top">
                    <div class="header-top__nav-control js-nav-icon">
                        <div class="bars js-nav-bars"></div>
                    </div>
                    <div class="header-top__nav js-dropdown-nav">
                        <div class="header-top__nav-links">
                            <div class="nav-site nav-site_top">

                                <a href="/referral" class="nav-site__link">
                                    <div class="nav-site__link-inner">Referral program</div>
                                </a>

                                <a href="/prizes" class="nav-site__link">
                                    <div class="nav-site__link-inner">Prizes</div>
                                </a>
                                <a href="/refill_prizes" class="nav-site__link">
                                    <div class="nav-site__link-inner">Top-up prizes</div>
                                </a>
                                <a href="/dailybonus" class="nav-site__link">
                                    <div class="nav-site__link-inner">Daily bonus</div>
                                </a>
                                <a href="/bonus" class="nav-site__link">
                                    <div class="nav-site__link-inner">Bonus system</div>
                                </a>
                                <a href="/top" class="nav-site__link">
                                    <div class="nav-site__link-inner">Top Users</div>
                                </a>
                                <a href="/trades" class="nav-site__link">
                                    <div class="nav-site__link-inner">Live trades</div>
                                </a>

                                <a href="/faq" class="nav-site__link">
                                    <div class="nav-site__link-inner">FAQ</div>
                                </a>

                            </div>
                        </div>
                        <div class="header-top__nav-socials">
                            <div class="socials-links">



                            </div>
                        </div>
                    </div>
                    <div class="header-top__site-settings">
                        <div class="site-settings">

               <!--             <div class="site-settings__item">
                                <div class="sound-btn sound-btn_off">
                                    <div class="sound-btn__click-area" action="sound"></div>
                                    <div class="sound-btn__control">
                                        <span class="irs js-irs-0"><span class="irs"><span class="irs-line" tabindex="-1"><span class="irs-line-left"></span><span class="irs-line-mid"></span><span class="irs-line-right"></span></span><span class="irs-min" style="display: none;">0</span><span class="irs-max" style="display: none;">1</span><span class="irs-from" style="visibility: hidden; display: none;">0</span><span class="irs-to" style="visibility: hidden; display: none;">0</span><span class="irs-single" style="display: none; left: 0%;">0</span></span><span class="irs-grid"></span><span class="irs-bar" style="left: 7.95455%; width: 0%;"></span><span class="irs-bar-edge"></span><span class="irs-shadow shadow-single" style="display: none;"></span><span class="irs-slider single" style="left: 0%;"></span></span><input id="rangeslider-volume" type="text" name="rangeslider-volume" class="irs-hidden-input" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="site-settings__item">
                                <div class="lng-switcher">

                                    <img class="lng-switcher__flag" src="/public/img/flags/lngs/en.svg?v=6">

                                    <div class="lng-switcher__all">

                                        <div class="lng-switcher__item" action="changeLng">
                                            <img class="lng-switcher__flag" src="/public/img/flags/lngs/en.svg?v=6">
                                            English
                                        </div>

                                        <div class="lng-switcher__item" action="changeLng">
                                            <img class="lng-switcher__flag" src="/public/img/flags/lngs/ru.svg?v=6">
                                            Русский
                                        </div>

                                        <div class="lng-switcher__item" action="changeLng">
                                            <img class="lng-switcher__flag" src="/public/img/flags/lngs/de.svg?v=6">
                                            German
                                        </div>

                                        <div class="lng-switcher__item" action="changeLng">
                                            <img class="lng-switcher__flag" src="/public/img/flags/lngs/fr.svg?v=6">
                                            French
                                        </div>

                                        <div class="lng-switcher__item" action="changeLng">
                                            <img class="lng-switcher__flag" src="/public/img/flags/lngs/es.svg?v=6">
                                            Spanish
                                        </div>

                                        <div class="lng-switcher__item" action="changeLng">
                                            <img class="lng-switcher__flag" src="/public/img/flags/lngs/it.svg?v=6">
                                            Italian
                                        </div>

                                        <div class="lng-switcher__item" action="changeLng">
                                            <img class="lng-switcher__flag" src="/public/img/flags/lngs/pl.svg?v=6">
                                            Polish
                                        </div>

                                        <div class="lng-switcher__item" action="changeLng">
                                            <img class="lng-switcher__flag" src="/public/img/flags/lngs/pt.svg?v=6">
                                            Portuguese
                                        </div>

                                        <div class="lng-switcher__item" action="changeLng">
                                            <img class="lng-switcher__flag" src="/public/img/flags/lngs/tr.svg?v=6">
                                            Turkish
                                        </div>

                                        <div class="lng-switcher__item" action="changeLng">
                                            <img class="lng-switcher__flag" src="/public/img/flags/lngs/zh.svg?v=6">
                                            Chinese
                                        </div>

                                    </div>
                                </div>
                            </div> !-->
                        </div>
                    </div>
                    <!-- {{#if config 'allowPremSells'}}
			<a href="{{pathFor 'premium'}}" class="header-top__premium-link">
				{{_ "PREM_PREMIUM"}}
			</a>
		{{/if}} -->
                    <div class="header-top__socials">
                        <div class="socials-links">


                        </div>
                    </div>
                </div>
                <div class="drophistory js-drophistory">
                    <div class="drophistory__sort-drophistory">
                        <div class="sort-drophistory">
                            <div class="sort-drophistory__item sort-drophistory__item_all js-toggle-live-drop active" title="All drop"></div>
                            <div class="sort-drophistory__item sort-drophistory__item_best js-toggle-live-drop" title="Best drop"></div>
                        </div>
                    </div>



                    <div class="drophistory__items all-drop">
                        <div class="drophistory__items-inner drophistory__items-inner_top">



                            <a href="/user/1474561" class="item-history covert js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhjxszJemkV0924lZKIn-7LPr7Vn35cppwl3OyVp9Txi1Gy_0Y9MDjyd4fGJFVsZFGG-gC5xLvo1pfouJ3Bzyd9-n51-K95osI/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Neon Revolution</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4630070" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09ulq5WYh8jiPLfFl2xU18h0juDU-MKljgLjqRVuaj-gLIKUdQdtMgvS-VK_wrvpgZ7quM_Im3Qw6Cdz4CzZgVXp1o7eGVz_/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Lead Conduit</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79eJh46KlPz1J6_QlWBu5Mx2gv2PpNigjAzi-ERtZz-hJNDBdFA5Z16FrFO2l-3php_vvMifnSc3vyAj7WGdwUICHCF80A/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Snack Attack</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history covert js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79eJg4GYg_L4MrXVqXlU6sB9teTE8YXghRrhr0U-NTulddSSdFVqN1HW_QPrl-u7gp61vpicmiE1uSkk4CvamkHjn1gSOWfdS3KX/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Wasteland Rebel</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4664368" class="item-history covert history-contract js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhz2v_Nfz5H_uO1gb-Gw_alIITBhGJf_NZlmOzA-LP5gVO8v11lajzwIIbGcFNrNVjQqFS6lLu5gJW-vMudz3E2uiArsyyIy0Cx0kkZcKUx0mwdWFWI/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Printstream</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4486842" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopuP1FABz7OORIQJM6dOngYWOmcj4OrzZgiVX6Zdw0rjHrY-i0QTiqUFqa2qhIdPHdlQ7Z1qFrgW8xOzm1MK-78vJ1zI97QqYYWES/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Neoqueen</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4630070" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09-jq5WYh8j3KqnUjlRc7cF4n-SPrYrx2wKxqRY9ZGCgdYSScFJtZAnQ-VDryLjqgJG0uJybz3BgvXQm4mGdwUKgJSXXOg/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Cyrex</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4486842" class="item-history restricted history-limited js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6ryFBRw7P7YJgJL4cy_hoW0mvLwOq7c2D1VvpYki73HotT0iVDg_hFrZj_1LY-RegU3YVnT-Vnowe_rjZ_v6pXXiSw0kXssCIY/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Impire</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79eJmY-EmcjmMrnTn39u5Mx2gv2PrNyj21bt_EdpYWzzIIKTIQA7Zl7T-ATswO2-g5W-ucvMyCZiuiF052GdwUIQKFtn2Q/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Umbral Rabbit</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopujwezhh0szedC9W5du5k4WEqPnxPLXummJW4NE_j7jEotum2FLkr0VrYm-iJ4GXIVJvZQrZ_VLoxu-80cTuu8zJznYw7j5iuyj2TLhXTw/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Digital Architect</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>



                            <a href="/user/4486842" class="item-history classified history-limited js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou7uifDhnwMzFcDoV09ajh5SClPLLP7LWnn8f7sZ1ib6S9I6i3w21qUNlYDymI9KcclI3YAvRr1Ltwujm18TvtMnPzGwj5Hdb1VS4mQ/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Justice</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4664368" class="item-history covert js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLOzLhRlxfbGTj5X09q_goWYkuHxPYTZj3tU-sd0i_rVyoHwjF2hpl0_a2rxdoGVJw85aVnT-Fjqyb3ogJW0upzNz3VnuidzsyqImUCyhRFJcKUx0ub_ZSDE/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Hyper Beast</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4492400" class="item-history covert history-upgrade js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhz2v_Nfz5H_uO1gb-Gw_alIITCmX5d_MR6j_v--InxgUG55RFtYTqiLY-UdVJrMF6DrAS3xe26gMDtv8jKmCNiv3EktH3enhO21xFSLrs4RMuJRwY/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Chantico's Fire</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79eJkZmOlPj6J7rSglRd4cJ5nqfH99us0Ayw-hdvN2ClcoeQe1A2YAzTqVHqyL_t0Mfv7pTOzydhsiQg-z-DyG7C7dXc/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Vogue</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FABz7PLfYQJG6d2inL-HnvD8J_WAz2lV7cAh3uyX9Nz33FXnqUs6a2rxctKdJ1c_aQ6Fq1DrxOvn05Tpot2XnvIeBIAw/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Mortis</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2823549" class="item-history covert js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopujwezhjxszYI2gS09-vloWZlOX7MITdn2xZ_Isi07_F8N3x3Qfj8kQ6a2H0IdKXdgRqYA2C-VLqxLznhMLv6Z-bm3o2pGB8sr9Yt3dq/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">See Ya Later</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2823549" class="item-history covert js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopujwezhjxszYI2gS09-vloWZlOX7MITdn2xZ_Isi07_F8N3x3Qfj8kQ6a2H0IdKXdgRqYA2C-VLqxLznhMLv6Z-bm3o2pGB8sr9Yt3dq/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">See Ya Later</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2823549" class="item-history covert js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6ryFABz7P7YJgJA4NO5kJObmOXgDLfYkWNFpsRz3-qSpdis2AW3rhFvYWn3LISSdgRsYVzR8lC7lOm9gMO_786bwHd9-n51Z2R5ZH4/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Bloodsport</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2546833" class="item-history common history-contract js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLuoKhRfwOP3ejNN-M-Jloyeksj4OrzZgiUA6ZNw2OqX84ms2AXt8xJsZmr3JYbBcQA6NQzU8lW6wLzqhMDuvczO1zI97WIGA556/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Night Borre</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4664368" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposr-kLAtl7PTbTjlH7du6kb-GkvT8MoTdn2xZ_It02rHCpIrx0APk8hVqMWr1LI-QdFU6YAvW8gO_xr3ugMDqup7Mz3FmpGB8st6VkheS/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Mecha Industries</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history restricted history-bonus js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposr-kLAtl7PDdTjlH7duJgJKCkPDxIYTVn3hS4dV9g-fEyoD8j1yg5Uo4a2_yIY-Rd1A-ZlGF-Qe5lL_ngcW5u5-fnXFnviAqsyqImRazgEtSLrs4TwNGAQs/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Trigger Discipline</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4630070" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09ulq5WYh8jiPLfFl2xU18h0juDU-MKljgLjqRVuaj-gLIKUdQdtMgvS-VK_wrvpgZ7quM_Im3Qw6Cdz4CzZgVXp1o7eGVz_/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Lead Conduit</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6ryFAR17P7YJgJB4N2lh4mNnvLwDLfYkWNF18lwmO7Eu96m2Va1_UJrZmigJo-SdAQ7aQqG81fswrru0cS57cjPnCExuiNw7HrD30vgmi9Wyhc/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Special Delivery</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4486842" class="item-history classified history-limited js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz59PfWwIzJxdwr9ALFhCaIF8g3tHS83-tRcWdKy_q4LZ168tIqVN-QpYdEYGsGEX_LVZV_8vho51qJUL5SK83_tiHnvOG4IW0D1ujVToCw2k7Y/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Fowl Play</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo7e1f1Jf0Ob3ZDBSuImJhJKCmvb4ILrTk3lu5cB1g_zMu46jjAGy80c_ajqgd9OTdFRoZl_V_VG5xr_r1pO9vMvNyidhs3Rztn7D30vgvDNIovc/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Primal Saber</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4664368" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopb3wflFf0Ob3YjoXuY-JhoWKlOP7IYTdn2xZ_ItwjLzCpdvx2gHm80Jla2_3JdfBJAU8Mg7T_li2kL_o0ZS0vp6byXZrpGB8ssEpFT3m/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Colony IV</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6ryFAR17P7YJgJB4N2lh4mNnvLwDLfYkWNF18lwmO7Eu96m2Va1_UJrZmigJo-SdAQ7aQqG81fswrru0cS57cjPnCExuiNw7HrD30vgmi9Wyhc/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Special Delivery</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79eJh46KlPz1J6_QlWBu5Mx2gv2PpNigjAzi-ERtZz-hJNDBdFA5Z16FrFO2l-3php_vvMifnSc3vyAj7WGdwUICHCF80A/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Snack Attack</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FABz7PLfYQJG6d2inL-HnvD8J_WAz2lV7cAh3uyX9Nz33FXnqUs6a2rxctKdJ1c_aQ6Fq1DrxOvn05Tpot2XnvIeBIAw/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Mortis</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FABz7PLfYQJG6d2inL-HnvD8J_WAz2lV7cAh3uyX9Nz33FXnqUs6a2rxctKdJ1c_aQ6Fq1DrxOvn05Tpot2XnvIeBIAw/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Mortis</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>
                        </div>
                        <div class="drophistory__items-inner drophistory__items-inner_bottom">



                            <a href="/user/4650791" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXQ9QVcJY8gulRPQV6CF7b9mMrFXxNwcFNT4r_wclM01_XLJzwTuIXuloONxqShYOLVlW4HupUi2LnD99ykxkS6rKZXLL7r/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Evil Geniuses</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4189951" class="item-history restricted history-limited js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbupIgthwczPYgJF7dC_mIGZqP76ML7fk3lQ_MpjteTE8YXghRrt-EZsMW_yIo-XIFNsYwuC_lfqxum9jJG86s_KzCNl6HJ24njUmEO0n1gSOTnyPM8l/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Firefight</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4666038" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoor-mcjhh3szcdD4b086zkIKHluTgDLbUkmJE5Ysg27qSoNvwiwbl_xZvNTiicNCVdwQ8Yw2D81LrwOnvhZW-6Jifn3FnpGB8sinNn9Zf/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Re-Entry</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4228280" class="item-history uncommon js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09ulq5WYh-TLJ7rSgmJS6clOiejM-rP4jVC9vh5yMDihJdTGcwc5ZwuDq1bqx7rrg5Dt75mdyndjviEm5HyOzBK_hE4Zbfsv26JCHMArWQ/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Desert Tactical</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4666103" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXQ9QVcJY8gulRPQV6CF7b9mMnGQVQ6dV1WtL6gKFNi0qWQdTkS74m3zYaIwPLxN-KDwDNUu513ju2S8I_30BqkpRRHq19yMQ/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">FURIA</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4666103" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLOzLhRlxfbGTjpR09q_goWYkuHxPYTZmX9u-sp1tf_I-oDwnGu4ohQ0J3f1ItXHcVI4YlvWrFXrkO7o1JHquMibmyZguykgtnrUyRXm10sdbbM8m7XAHrBtyPY3/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Flame Test</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4666103" class="item-history common js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopamie19fwPz3fDJR_-O6nYeDg7mjZ-yExW9Qu5wkj7-W8dis2AXk-kFqamHwLNLDcA5rYArW-VC9kOzqm9bi61mW1oPB/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Blue Spruce</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/602966" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXQ9QVcJY8gulRPQV6CF7b9mMrFXxNwcFNT4r_wclM01_XLJzwTuIXuloONxqShYOLVlW4HupUi2LnD99ykxkS6rKZXLL7r/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Evil Geniuses</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/602966" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLOzLhRlxfbGTjpR09q_goWYkuHxPYTZmX9u-sp1tf_I-oDwnGu4ohQ0J3f1ItXHcVI4YlvWrFXrkO7o1JHquMibmyZguykgtnrUyRXm10sdbbM8m7XAHrBtyPY3/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Flame Test</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/602966" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXQ9QVcJY8gulRPQV6CF7b9mMrFXxNwcFNT4r_wclM01_XLJzwTuIXuloONxqShYOLVlW4HupUi2LnD99ykxkS6rKZXLL7r/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Evil Geniuses</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/602966" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLOzLhRlxfbGTjpR09q_goWYkuHxPYTZmX9u-sp1tf_I-oDwnGu4ohQ0J3f1ItXHcVI4YlvWrFXrkO7o1JHquMibmyZguykgtnrUyRXm10sdbbM8m7XAHrBtyPY3/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Flame Test</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/602966" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposem2LFZfwOP3dm5R642JmYmHnuP9MrTDl2VW7fp8j-3I4IG7jgfsqUNtYDqlJteSIVA7N1zQ-le9l7i51sTt7svOzHVluHF04yqMnAv330_agV6dCw/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Orange Crash</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/602966" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXQ9QVcJY8gulRPRUOCF7b_mMbWXhNxJwdVsuzzeQRlgfGYJTkTvN_vxYONzvT1Yr6Jx24Bu5El273Cp430xkS6rANYF2dT/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">IEM</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4666117" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpovrG1eVcwg8zAaAJSvozmxL-ElPL1PbLum25V4dB8xO2U8NT321Ln-0tlZWHwctTAIQ9oZlHXqFLryOjpg5DvuJrBmCAxvXM8pSGKQrO8-eg/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Oceanic</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4445007" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLOzLhRlxfbGTjpR09q_goWYkuHxPYTZmX9u-sp1tf_I-oDwnGu4ohQ0J3f1ItXHcVI4YlvWrFXrkO7o1JHquMibmyZguykgtnrUyRXm10sdbbM8m7XAHrBtyPY3/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Flame Test</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4445007" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXQ9QVcJY8gulRPQV6CF7b9mMrFXxNwcFNT4r_wclM01_XLJzwTuIXuloONxqShYOLVlW4HupUi2LnD99ykxkS6rKZXLL7r/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Evil Geniuses</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4665329" class="item-history common js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopL-zJAt21uH3Yi19_8yklZm0gPbgNqnummJW4NE_2u-W8dyi3FbjqEZvZ2j6cI-RdQNsYQ2C_FnrxuzugMK76pSdmiFlvD5iuyg_7O4NLw/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Canal Spray</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history covert js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhjxszJemkV0924lZKIn-7LPr7Vn35cppwl3OyVp9Txi1Gy_0Y9MDjyd4fGJFVsZFGG-gC5xLvo1pfouJ3Bzyd9-n51-K95osI/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Neon Revolution</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4652645" class="item-history milspec history-battle js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposr-kLAtl7PvRTitD_tW1lY2EqOLmMbrfqWZU7Mxkh6eUo4j2i1G1_EdoYDrxJ4PHelU3ZVGBrgC9xufvjJG8vpjMzXpgvyZ0-z-DyDrrCVR0/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Urban Rubble</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/471302" class="item-history restricted history-bonus js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79fnzL-ckvbnNrfum25V4dB8xL2UpNmg2wO3-BFrajz1dYCQdgZsNArZrFO3wLrs1p_tu8-bn3FisiU8pSGK6x7va44/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Weasel</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2874637" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhnwMzFJTwW09--m5CbkuXLNLPehX9u5Mx2gv2Pptuh0QXnrxJoamvwJ4SXcVJrZQuB-wfowee-h5bv75-YziNqviIq7WGdwULQRBs-zw/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Magnesium</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2874637" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoor-mcjhnwMzcdD4b09qjloGZqPv9NLPF2DsB7pMl2rmWrNSm3QLlrUZrMGHzLNSXcVM3Y17QrwPrkOjrhpHu75rXiSw0u_Jn4OQ/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Fubar</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4630070" class="item-history uncommon js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09ulq5WYh-TLJ7rSgmJS6clOiejM-rP4jVC9vh5yMDihJdTGcwc5ZwuDq1bqx7rrg5Dt75mdyndjviEm5HyOzBK_hE4Zbfsv26JCHMArWQ/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Desert Tactical</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4630070" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09ulq5WYh8jiPLfFl2xU18h0juDU-MKljgLjqRVuaj-gLIKUdQdtMgvS-VK_wrvpgZ7quM_Im3Qw6Cdz4CzZgVXp1o7eGVz_/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Lead Conduit</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4630070" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09-jq5WYh8jgPITZk2dd18l4jeHVu92m0QXmrRJtYGClJoaQd1A5NFvQ_lXvw-3r1MK9vZybmyAw7yUm7SnD30vg1-oeAXU/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Ticket to Hell</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2798911" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLOzLhRlxfbGTjpR09q_goWYkuHxPYTZmX9u-sp1tf_I-oDwnGu4ohQ0J3f1ItXHcVI4YlvWrFXrkO7o1JHquMibmyZguykgtnrUyRXm10sdbbM8m7XAHrBtyPY3/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Flame Test</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2798911" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXQ9QVcJY8gulRPQV6CF7b9mNvbRRMjdgIO5ez2flZj0qTKI24TuNi1x9bexqakZe2JzjIIuMMh2rHEotqgxkS6rPdFh4ZR/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">100 Thieves</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2798911" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXQ9QVcJY8gulRPQV6CF7b9mMnGQVQ6dV1WtL6gKFNi0qWQdTkS74m3zYaIwPLxN-KDwDNUu513ju2S8I_30BqkpRRHq19yMQ/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">FURIA</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4524702" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhjxszFJTwW09m6nZSOqOP1MK_YlWpd18l4jeHVu9yk3VKw80U9MmrxcoLDcgU9YAmB-wO5lb3tgJG96JXAnSA1uSgk4n7D30vgC-8AkgA/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Poly Mag</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2546833" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopL-zJAt21uH3di59_tmgm4ydkuXLJ6nUl29u5Mx2gv2Poo-milDl-ENuNW_xLIOWJwM4aFyBrwK8lenv1sC975rIzXIxuXZx5WGdwUIffS2-og/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Grip</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79eJh46KlPz1J6_QlWBu5Mx2gv2PpNigjAzi-ERtZz-hJNDBdFA5Z16FrFO2l-3php_vvMifnSc3vyAj7WGdwUICHCF80A/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Snack Attack</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history covert js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79eJg4GYg_L4MrXVqXlU6sB9teTE8YXghRrhr0U-NTulddSSdFVqN1HW_QPrl-u7gp61vpicmiE1uSkk4CvamkHjn1gSOWfdS3KX/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Wasteland Rebel</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4664368" class="item-history covert history-contract js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhz2v_Nfz5H_uO1gb-Gw_alIITBhGJf_NZlmOzA-LP5gVO8v11lajzwIIbGcFNrNVjQqFS6lLu5gJW-vMudz3E2uiArsyyIy0Cx0kkZcKUx0mwdWFWI/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Printstream</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4486842" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopuP1FABz7OORIQJM6dOngYWOmcj4OrzZgiVX6Zdw0rjHrY-i0QTiqUFqa2qhIdPHdlQ7Z1qFrgW8xOzm1MK-78vJ1zI97QqYYWES/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Neoqueen</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4630070" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09-jq5WYh8j3KqnUjlRc7cF4n-SPrYrx2wKxqRY9ZGCgdYSScFJtZAnQ-VDryLjqgJG0uJybz3BgvXQm4mGdwUKgJSXXOg/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Cyrex</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4486842" class="item-history restricted history-limited js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6ryFBRw7P7YJgJL4cy_hoW0mvLwOq7c2D1VvpYki73HotT0iVDg_hFrZj_1LY-RegU3YVnT-Vnowe_rjZ_v6pXXiSw0kXssCIY/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Impire</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79eJmY-EmcjmMrnTn39u5Mx2gv2PrNyj21bt_EdpYWzzIIKTIQA7Zl7T-ATswO2-g5W-ucvMyCZiuiF052GdwUIQKFtn2Q/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Umbral Rabbit</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopujwezhh0szedC9W5du5k4WEqPnxPLXummJW4NE_j7jEotum2FLkr0VrYm-iJ4GXIVJvZQrZ_VLoxu-80cTuu8zJznYw7j5iuyj2TLhXTw/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Digital Architect</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4486842" class="item-history classified history-limited js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou7uifDhnwMzFcDoV09ajh5SClPLLP7LWnn8f7sZ1ib6S9I6i3w21qUNlYDymI9KcclI3YAvRr1Ltwujm18TvtMnPzGwj5Hdb1VS4mQ/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Justice</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4664368" class="item-history covert js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLOzLhRlxfbGTj5X09q_goWYkuHxPYTZj3tU-sd0i_rVyoHwjF2hpl0_a2rxdoGVJw85aVnT-Fjqyb3ogJW0upzNz3VnuidzsyqImUCyhRFJcKUx0ub_ZSDE/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Hyper Beast</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4492400" class="item-history covert history-upgrade js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhz2v_Nfz5H_uO1gb-Gw_alIITCmX5d_MR6j_v--InxgUG55RFtYTqiLY-UdVJrMF6DrAS3xe26gMDtv8jKmCNiv3EktH3enhO21xFSLrs4RMuJRwY/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Chantico's Fire</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79eJkZmOlPj6J7rSglRd4cJ5nqfH99us0Ayw-hdvN2ClcoeQe1A2YAzTqVHqyL_t0Mfv7pTOzydhsiQg-z-DyG7C7dXc/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Vogue</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FABz7PLfYQJG6d2inL-HnvD8J_WAz2lV7cAh3uyX9Nz33FXnqUs6a2rxctKdJ1c_aQ6Fq1DrxOvn05Tpot2XnvIeBIAw/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Mortis</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2823549" class="item-history covert js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopujwezhjxszYI2gS09-vloWZlOX7MITdn2xZ_Isi07_F8N3x3Qfj8kQ6a2H0IdKXdgRqYA2C-VLqxLznhMLv6Z-bm3o2pGB8sr9Yt3dq/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">See Ya Later</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2823549" class="item-history covert js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopujwezhjxszYI2gS09-vloWZlOX7MITdn2xZ_Isi07_F8N3x3Qfj8kQ6a2H0IdKXdgRqYA2C-VLqxLznhMLv6Z-bm3o2pGB8sr9Yt3dq/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">See Ya Later</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2823549" class="item-history covert js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6ryFABz7P7YJgJA4NO5kJObmOXgDLfYkWNFpsRz3-qSpdis2AW3rhFvYWn3LISSdgRsYVzR8lC7lOm9gMO_786bwHd9-n51Z2R5ZH4/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Bloodsport</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/2546833" class="item-history common history-contract js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLuoKhRfwOP3ejNN-M-Jloyeksj4OrzZgiUA6ZNw2OqX84ms2AXt8xJsZmr3JYbBcQA6NQzU8lW6wLzqhMDuvczO1zI97WIGA556/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Night Borre</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4664368" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposr-kLAtl7PTbTjlH7du6kb-GkvT8MoTdn2xZ_It02rHCpIrx0APk8hVqMWr1LI-QdFU6YAvW8gO_xr3ugMDqup7Mz3FmpGB8st6VkheS/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Mecha Industries</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history restricted history-bonus js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposr-kLAtl7PDdTjlH7duJgJKCkPDxIYTVn3hS4dV9g-fEyoD8j1yg5Uo4a2_yIY-Rd1A-ZlGF-Qe5lL_ngcW5u5-fnXFnviAqsyqImRazgEtSLrs4TwNGAQs/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Trigger Discipline</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4630070" class="item-history milspec js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09ulq5WYh8jiPLfFl2xU18h0juDU-MKljgLjqRVuaj-gLIKUdQdtMgvS-VK_wrvpgZ7quM_Im3Qw6Cdz4CzZgVXp1o7eGVz_/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Lead Conduit</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6ryFAR17P7YJgJB4N2lh4mNnvLwDLfYkWNF18lwmO7Eu96m2Va1_UJrZmigJo-SdAQ7aQqG81fswrru0cS57cjPnCExuiNw7HrD30vgmi9Wyhc/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Special Delivery</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4486842" class="item-history classified history-limited js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz59PfWwIzJxdwr9ALFhCaIF8g3tHS83-tRcWdKy_q4LZ168tIqVN-QpYdEYGsGEX_LVZV_8vho51qJUL5SK83_tiHnvOG4IW0D1ujVToCw2k7Y/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Fowl Play</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo7e1f1Jf0Ob3ZDBSuImJhJKCmvb4ILrTk3lu5cB1g_zMu46jjAGy80c_ajqgd9OTdFRoZl_V_VG5xr_r1pO9vMvNyidhs3Rztn7D30vgvDNIovc/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Primal Saber</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/4664368" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopb3wflFf0Ob3YjoXuY-JhoWKlOP7IYTdn2xZ_ItwjLzCpdvx2gHm80Jla2_3JdfBJAU8Mg7T_li2kL_o0ZS0vp6byXZrpGB8ssEpFT3m/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Colony IV</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history restricted js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6ryFAR17P7YJgJB4N2lh4mNnvLwDLfYkWNF18lwmO7Eu96m2Va1_UJrZmigJo-SdAQ7aQqG81fswrru0cS57cjPnCExuiNw7HrD30vgmi9Wyhc/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Special Delivery</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79eJh46KlPz1J6_QlWBu5Mx2gv2PpNigjAzi-ERtZz-hJNDBdFA5Z16FrFO2l-3php_vvMifnSc3vyAj7WGdwUICHCF80A/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Snack Attack</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FABz7PLfYQJG6d2inL-HnvD8J_WAz2lV7cAh3uyX9Nz33FXnqUs6a2rxctKdJ1c_aQ6Fq1DrxOvn05Tpot2XnvIeBIAw/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Mortis</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>





                            <a href="/user/1474561" class="item-history classified js-drop-tooltip">
                                <div class="item-history__inner">
                                    <div class="item-history__wrapper-img">
                                        <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FABz7PLfYQJG6d2inL-HnvD8J_WAz2lV7cAh3uyX9Nz33FXnqUs6a2rxctKdJ1c_aQ6Fq1DrxOvn05Tpot2XnvIeBIAw/100fx74f/image.png" alt="Drop" class="item-history__img">
                                    </div>
                                    <div class="item-history__name">Mortis</div>
                                </div>
                                <div class="item-history__tooltip js-item-history-tooltip"></div>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="wrapper">
                    <header class="header-bottom">
                        <div class="header-bottom__logo">
                            <a class="header-logo" href="/" title="Go to the main page"></a>
                        </div>

                        <div class="header-bottom__userbar">
                            <?php if(!Yii::$app->user->isGuest): ?>
                            <div class="header-bottom__userbar">

                                <div class="userbar-block">
                                    <div class="userbar-block__user-picture">
                                        <div class="user-picture">
                                            <a href=<?= "/profile/view?user_id=" .  $user_id    ?> class="user-picture__img user-picture__img_without-rank">
                                                <img src=<?= $photo   ?> alt="Аватар">

                                            </a>

                                        </div>
                                    </div>
                                    <div class="userbar-block__user-stat">
                                        <div class="user-stat">
                                            <div class="user-stat__balance refill">
                                                <div class="user-stat__nums">
                                                    <span class="price"><?= $credit ?></span>
                                                </div>
                                                <div class="user-stat__refill"></div>
                                            </div>
                                           <!-- <a href="/faq" class="user-stat__bonuses">

                                                <span class="price price-bonus">0.00</span>

                                            </a> !-->

                                            <div class="user-stat__name-and-signout">
                                                <a href=<?= "/profile/view?user_id=" .   $user_id  ?> class="user-stat__name"> <?= $name  ?></a>
                                                <?= Html::a(' ', ['/site/logout'], ['data' => ['method' => 'get'], 'class'=> 'user-stat__signout quit']) ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php else: ?>
                            <div class="login-block">
                                <div class="login-block__btn">
                                    <?=
                                    Html::a('<button class="btn btn_color-success btn_uppercase btn_with-icon login">
                                        <div style="margin-right: 10px" class="btn__icon icon icon_steam ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                <path d="M8.98443 0C4.24831 0 0.368459 3.64556 0 8.27807L4.83213 10.2725C5.24146 9.99273 5.73641 9.82973 6.26834 9.82973C6.31635 9.82973 6.3637 9.83102 6.41041 9.83358L8.55954 6.72385V6.68021C8.55954 4.80898 10.0846 3.2862 11.9593 3.2862C13.8341 3.2862 15.3592 4.80898 15.3592 6.68021C15.3592 8.55144 13.8341 10.0749 11.9593 10.0749C11.9334 10.0749 11.9081 10.0742 11.8822 10.0736L8.81707 12.256C8.81901 12.2965 8.82031 12.3369 8.82031 12.3767C8.82031 13.782 7.67536 14.9249 6.26834 14.9249C5.03323 14.9249 3.99986 14.0445 3.76633 12.8791L0.310076 11.4526C1.38042 15.2304 4.85743 18 8.98443 18C13.9638 18 18 13.9701 18 9C18 4.0293 13.9638 0 8.98443 0ZM5.64975 13.656L4.54242 13.1991C4.73833 13.6072 5.07825 13.9486 5.52909 14.136C6.50343 14.5416 7.62697 14.0802 8.03305 13.1067C8.22961 12.6357 8.23091 12.1159 8.0363 11.6436C7.84169 11.1713 7.47388 10.803 7.00228 10.6066C6.53327 10.4121 6.03118 10.4192 5.59007 10.5854L6.73437 11.0577C7.45312 11.3567 7.79304 12.1807 7.49334 12.8981C7.19429 13.6156 6.3685 13.955 5.64975 13.656ZM14.2249 6.68028C14.2249 5.43343 13.2083 4.41825 11.9596 4.41825C10.7102 4.41825 9.69372 5.43343 9.69372 6.68028C9.69372 7.92712 10.7102 8.94167 11.9596 8.94167C13.2083 8.94167 14.2249 7.92712 14.2249 6.68028ZM10.2613 6.67643C10.2613 5.73825 11.0235 4.97782 11.9629 4.97782C12.9028 4.97782 13.665 5.73825 13.665 6.67643C13.665 7.61461 12.9028 8.37504 11.9629 8.37504C11.0235 8.37504 10.2613 7.61461 10.2613 6.67643Z" fill="white"/>
                                            </svg>
                                        </div>
                                        <div class="btn__content">
                                            <div class="btn__label">Sign in</div>
                                        </div>
                                    </button>', '/site/steam', ['data-pjax' => 0]);
                                    ?>

                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="header-bottom__nav">
                            <div class="header-bottom__nav-inner">
                                <nav class="nav-site nav-site_bottom">

                                    <a href="/site/contact" class="nav-site__link">
                                        <span class="nav-site__link-inner nav-site__link-inner_contracts">Contacts</span>
                                    </a>

                                    <?php if(Yii::$app->user->can('administrator')): ?>
                                        <a href="/user/admin" class="nav-site__link">
                                            <span class="nav-site__link-inner nav-site__link-inner_contracts">Админ панель</span>
                                        </a>

                                    <?php   endif; ?>



                                    <a href="/upgrade" class="nav-site__link">
                                        <span class="nav-site__link-inner nav-site__link-inner_upgrade">Upgrade</span>
                                    </a>


                                    <a href="/battles" class="nav-site__link">
                                        <span class="nav-site__link-inner nav-site__link-inner_battles">Battles <span> · 2</span></span>
                                    </a>


                                </nav>
                                <div id="vk_community_messages"></div>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
            <div class="layout__content js-layout-content">
                <div class="wrapper wrapper_home">

                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>


            <div class="layout__footer">
                <footer class="footer">
                    <div class="footer__inner">
                        <div class="footer__stats">
                            <div class="stats">
                                <div class="stats__main">
                                    <div class="stats-item stats-item_main">
                                        <div class="stats-item__value">708</div>
                                        <div class="stats-item__label">Online</div>
                                    </div>
                                </div>
                                <div class="stats__secondary">
                                    <div class="stats__item">
                                        <div class="stats-item">
                                            <div class="stats-item__value">4 660 325</div>
                                            <div class="stats-item__label">Users</div>
                                        </div>
                                    </div>
                                    <div class="stats__item">
                                        <div class="stats-item">
                                            <div class="stats-item__value">465 427 191</div>
                                            <div class="stats-item__label">Cases</div>
                                        </div>
                                    </div>
                                    <div class="stats__item">
                                        <div class="stats-item">
                                            <div class="stats-item__value">11 081 603</div>
                                            <div class="stats-item__label">Scratchcards</div>
                                        </div>
                                    </div>
                                    <div class="stats__item">
                                        <div class="stats-item">
                                            <div class="stats-item__value">16 888 495</div>
                                            <div class="stats-item__label">Contracts</div>
                                        </div>
                                    </div>
                                    <div class="stats__item">
                                        <div class="stats-item">
                                            <div class="stats-item__value">25 738 491</div>
                                            <div class="stats-item__label">Upgrades</div>
                                        </div>
                                    </div>
                                    <div class="stats__item">
                                        <div class="stats-item">
                                            <div class="stats-item__value">10 879 852</div>
                                            <div class="stats-item__label">Battles</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer__main">
                            <div class="footer__tagline-and-links">
                                <div class="footer__tagline">UpDrop — drop from CS:GO cases</div>
                                <div class="footer__links">
                                    <a href="/agreement" class="footer__link">Terms of Service</a>


                                    <a href="/cookies" class="footer__link">Cookie policy</a>
                                </div>
                            </div>
                            <div class="footer__partnership">
                                <div class="partnership" action="copy" data-value="up-drop.ru">
                                    <div class="partnership__inner">
                                        <div class="partnership__title">Partnership</div>
                                        <div class="partnership__mail"> up-drop.ru</div>
                                        <div class="partnership__mail-copy"><span> up-drop.ru</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer__pay-systems">
                            <div class="pay-systems">
                                <div class="pay-systems__system pay-systems__system_visa"></div>
                                <div class="pay-systems__system pay-systems__system_mastercard"></div>
                                <div class="pay-systems__system pay-systems__system_webmoney"></div>
                                <div class="pay-systems__system pay-systems__system_qiwi"></div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <div class="new-popup new-popup_default js-modal-swtalert" style="display: none">
                <div class="new-popup__box js-modal-swtalert-inside">
                    <div class="new-popup__close">
                        <button class="btn btn_transparent btn_type-square" action="closeSwtalert">
                            <div class="btn__content">
                                <div class="btn__icon icon icon_close"></div>
                            </div>
                        </button>
                    </div>
                    <div class="new-popup__content">
                        <div class="default-popup">
                            <div class="default-popup__title js-modal-swtalert-title"></div>
                            <div class="default-popup__text js-modal-swtalert-text"></div>
                            <div class="default-popup__btns">
                                <div class="default-popup__btn">
                                    <button class="btn btn_color-success btn_uppercase" action="confirmSwtalert"></button>
                                </div>
                                <div class="default-popup__btn">
                                    <button class="btn btn_color-primary btn_style-outline btn_uppercase" action="cancelSwtalert"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="take-messages">

            </div>

        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
