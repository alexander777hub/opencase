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


\app\assets\AppAsset::register($this);

?>

<!DOCTYPE html>
<html>

    <!-- Mirrored from forcedrop.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Jul 2023 15:31:40 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
    <head>
        <link rel="stylesheet" type="text/css" class="__meteor-css__" href="/css/drop.css?meteor_css_resource=true">
        <link rel="stylesheet" href="/css/fonts.googleapis.com/css19c1.css?family=Exo+2:400,400i,500,500i,700,700i,800&amp;subset=cyrillic">
        <link rel="stylesheet" href="/css/widget.css" class="jv-css">
        <meta property="vk:title" content="UpDrop - кейсы CS:GO, новые кейсы CS:GO!">
        <meta property="vk:description" content="UpDrop - Открывай честные кейсы CS:GO! Миллионы игроков, честное открытие, моментальный вывод скинов в Steam! Заходи!">
        <meta property="og:title" content="UpDrop - кейсы CS:GO, новые кейсы CS:GO!">
        <meta property="og:description" content="UpDrop - Открывай честные кейсы CS:GO! Миллионы игроков, честное открытие, моментальный вывод скинов в Steam! Заходи!">
    </head>
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
                                            <a href="/user/4666219" class="user-picture__img user-picture__img_without-rank">
                                                <img src=<?=  \app\models\User::getUser(Yii::$app->user->getId())->getProfile()->photo ?> alt="Аватар">

                                            </a>

                                        </div>
                                    </div>
                                    <div class="userbar-block__user-stat">
                                        <div class="user-stat">
                                            <div class="user-stat__balance refill">
                                                <div class="user-stat__nums">
                                                    <span class="price"><?=  \app\models\User::getUser(Yii::$app->user->getId())->getProfile()->credit ? \app\models\User::getUser(Yii::$app->user->getId())->getProfile()->credit : '0.00' ?></span>
                                                </div>
                                                <div class="user-stat__refill"></div>
                                            </div>
                                           <!-- <a href="/faq" class="user-stat__bonuses">

                                                <span class="price price-bonus">0.00</span>

                                            </a> !-->

                                            <div class="user-stat__name-and-signout">
                                                <a href="/user/4666219" class="user-stat__name"> <?= \app\models\User::getUser(Yii::$app->user->getId())->getProfile()->getName()  ?></a>
                                                <?= Html::a(' ', ['/site/logout'], ['data' => ['method' => 'post'], 'class'=> 'user-stat__signout quit']) ?>

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

                                    <a href="/contract" class="nav-site__link">
                                        <span class="nav-site__link-inner nav-site__link-inner_contracts">Contracts</span>
                                    </a>



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
                    <div class="topbar">
                        <div class="topbar__hometop">
                            <div class="hometop">
                                <div class="hometop__section hometop__section_quicklinks">
                                    <div class="nav-categories js-nav-categories">
                                        <div class="nav-categories__btn">Fast links</div>
                                        <div class="nav-categories__links">
                                            <div class="nav-categories__links-list">
                                                <a data-anchor="#rarity-cases" class="nav-categories__link">Cases by rarity</a>

                                                <a data-anchor="#free-cases" class="nav-categories__link">Free cases</a>


                                                <a data-anchor="#bonus-cases" class="nav-categories__link">Bonus cases</a>




                                                <a data-anchor="#users-cases" class="nav-categories__link">New cases of users</a>


                                                <a data-anchor="#pop-users-cases" class="nav-categories__link">Popular cases of users</a>





                                                <a data-anchor="#limited-cases" class="nav-categories__link">Limited edition</a>


                                                <a data-anchor="#custom-cases" class="nav-categories__link">Custom cases</a>


                                                <a data-anchor="#youtubers-cases" class="nav-categories__link">Bloggers' cases</a>


                                                <a data-anchor="#battles-cases" class="nav-categories__link">Battles</a>


                                                <a data-anchor="#weapon-cases" class="nav-categories__link">Weapon cases</a>


                                                <a data-anchor="#classic-cases" class="nav-categories__link">Classic cases</a>


                                                <a data-anchor="#collections-cases" class="nav-categories__link">Collections</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="hometop__section hometop__section_promocode">
                                    <div class="new-promocode">
                                        <div class="new-promocode__label">

                                            Bonus amount <strong>35 %</strong>

                                        </div>
                                        <div class="new-promocode__value" action="copy" data-value="1882332C-734A-498B-8684">1882332C-734A-498B-8684</div>
                                    </div>
                                </div>


                                <div class="hometop__section hometop__section_bonus">
                                    <a href="https://gleam.io/D4vm9/giveaway-of-purple-skins-by-forcedropgg" class="new-bonus" target="_blank" rel="noreferrer noopener">
                                        <div class="new-bonus__title-and-counter">
                                            <div class="new-bonus__title">GLEAM</div>
                                        </div>
                                        <div class="new-bonus__text">Giveaway of purple CS:GO skins</div>
                                        <div class="new-bonus__img" style="background-image: url(/public/img/gleam.png);"></div>
                                    </a>
                                </div>



                                <a href="/refill_prizes" class="hometop__section hometop__section_refill">

                                    <div class="new-refill-prize-widget covert">
                                        <div class="new-refill-prize-widget__text-and-name">
                                            <div class="new-refill-prize-widget__text">Top up your balance on <strong class="price price-USD">8.09</strong></div>
                                            <div class="new-refill-prize-widget__text">and get a chance to win</div>
                                            <div class="new-refill-prize-widget__name">M4A4 | Desert-Strike</div>
                                        </div>
                                        <div class="new-refill-prize-widget__img">
                                            <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz52YOLkDzRyTRDLFaFQT-E15gXTBCI24dJuGoSzp71UcF-6vYSTYbYtY4saH5TRD6WFZQz46kpshfddKcCLoyLn3i73ejBdZpZKYDI/100fx74f/image.png" alt="">
                                        </div>
                                    </div>

                                </a>


                            </div>
                        </div>
                        <div class="topbar__filters">
                            <div class="topbar__search">
                                <div class="cases-search">
                                    <div class="cases-search__selector">
                                        <div class="cases-search__selector-item" title="Search by case name" data-key="type" action="filters">
                                            <input type="radio" id="casesRadio" name="typeSearch" class="cases-search__selector-item-radio">
                                            <label for="casesRadio" class="cases-search__selector-item-label icon icon_cases-new"></label>
                                        </div>
                                        <div class="cases-search__selector-item" title="Search by item name" data-key="type" data-value="items" action="filters">
                                            <input type="radio" id="skinsRadio" name="typeSearch" class="cases-search__selector-item-radio">
                                            <label for="skinsRadio" class="cases-search__selector-item-label icon icon_skins-new"></label>
                                        </div>
                                    </div>
                                    <div class="cases-search__field">
                                        <input type="text" name="search" placeholder="Quick search" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="topbar__price">
                                <div class="price-filters price-filters_in-topbar">
                                    <div class="price-filters__filter" data-key="available" action="filters"><span>Available</span></div>

                                    <div class="price-filters__filter" data-key="prices" data-value="0-1" action="filters"><span class="price price-USD">0-1</span></div>

                                    <div class="price-filters__filter" data-key="prices" data-value="1-5" action="filters"><span class="price price-USD">1-5</span></div>

                                    <div class="price-filters__filter" data-key="prices" data-value="5-15" action="filters"><span class="price price-USD">5-15</span></div>

                                    <div class="price-filters__filter" data-key="prices" data-value="15+" action="filters"><span class="price price-USD">15+</span></div>

                                </div>
                            </div>
                            <div class="topbar__btns">

                                <div class="topbar__btn topbar__btn_fav" action="filters" data-key="favorite">
                                    <div class="topbar__btn-fav btn btn_color-primary btn_size-fill btn_transparent btn_with-icon btn_no-padding btn_fav">
                                        <div class="btn__content">
                                            <div class="btn__icon icon icon_fav"></div>
                                            <div class="btn__label topbar__btn-fav-label">Favorites</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="home decorated-page">
                        <!-- <div class="no-items no-items_home icon icon_drops">
					<div class="no-items__title">{{_ "CASES_NOT_FOUND"}}</div>
					<div class="no-items__btn">
						<div class="btn btn_style-outline btn_color-primary btn_uppercase" action="clearFilters">
							<span class="btn__content">
								<span class="btn__label">{{_ "reset_filters"}}</span>
							</span>
						</div>
					</div>
				</div> -->


                        <div class="home__series">
                            <div class="cases-section cases-section_categories cases-section_cases">
                                <div class="cases-section__cases" id="rarity-cases">
                                    <div class="cases">

                                        <div class="cases__item">
                                            <a href="/case/milspec" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/1new_milspec.png" class="case__img">
                                                </div>



                                                <div class="case__name">Mil-Spec Grade</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.398</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.265</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/restricted" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/1new_restricted.png" class="case__img">
                                                </div>



                                                <div class="case__name">Restricted</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.13</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/classified" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/1new_classified.png" class="case__img">
                                                </div>



                                                <div class="case__name">Classified</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.38</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/covert" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/1new_covert.png" class="case__img">
                                                </div>



                                                <div class="case__name">Covert</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">10.6</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/rare" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/1new_rare.png" class="case__img">
                                                </div>



                                                <div class="case__name">Knife</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">251.63</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="home__series">
                            <div class="cases-section cases-section_cases cases-section_other-cases">
                                <div class="cases-section__title" id="free-cases">
                                    <div class="new-title new-title_with-icon new-title_icon-free">
                                        <div class="new-title__text">Free cases</div>
                                    </div>
                                </div>
                                <div class="cases-section__cases">
                                    <div class="cases">

                                        <div class="cases__item">
                                            <a href="/case/freecase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/free_case_lvl1_512x396.png" class="case__img">
                                                </div>



                                                <div class="case__name">Free №1</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/freecase2" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/free_case_lvl2_512x396.png" class="case__img">
                                                </div>



                                                <div class="case__name">Free №2</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/freecase3" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/free_case_lvl3_512x396.png" class="case__img">
                                                </div>



                                                <div class="case__name">Free №3</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/freecase4" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/free_case_lvl4_512x396.png" class="case__img">
                                                </div>



                                                <div class="case__name">Free №4</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/freecase5" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/free_case_lvl5_512x396.png" class="case__img">
                                                </div>



                                                <div class="case__name">Free №5</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="home__series">
                            <div class="cases-section cases-section_farm">
                                <div class="cases-section__title" id="farm-cases">
                                    <div class="new-title new-title_with-icon new-title_icon-farm">
                                        <div class="new-title__text">Farm cases</div>
                                    </div>
                                </div>
                                <div class="cases-section__cases">
                                    <div class="cases">

                                        <div class="cases__item">
                                            <a href="/case/farmm4a4" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/FARMM4A4CASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Farm M4A4</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/farmak47" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/FARMAK-47CASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Farm AK-47</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.8</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.106</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/farmawp" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/FARMAWPCASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Farm AWP</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.73</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.133</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/farmcovert" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/FARMCOVERTCASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Farm Covert</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.199</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/farmknife" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/FARMKNIFECASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Farm Knife</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">5.3</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">2.65</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="home__series">
                            <div class="cases-section cases-section_bonuses">
                                <div class="cases-section__title" id="bonus-cases">
                                    <div class="new-title new-title_with-icon new-title_icon-bonus">
                                        <div class="new-title__text">Bonus cases</div>
                                    </div>
                                </div>
                                <div class="cases-section__cases">
                                    <div class="cases">

                                        <div class="cases__item">
                                            <a href="/case/ezcase" class="case case_bonus">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/EZCASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">EZ</div>


                                                <div class="case__price case__price_bonus">
                                                    <span class="price price-bonus">1.06</span>
                                                </div>


                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/glhfcase" class="case case_bonus">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/GLHFCASEE.png" class="case__img">
                                                </div>



                                                <div class="case__name">GLHF</div>


                                                <div class="case__price case__price_bonus">
                                                    <span class="price price-bonus">1.99</span>
                                                </div>


                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/headshotcase" class="case case_bonus">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/HEADSHOTCASEE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Headshot</div>


                                                <div class="case__price case__price_bonus">
                                                    <span class="price price-bonus">2.65</span>
                                                </div>


                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/ggwpcase" class="case case_bonus">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/GGWPCASEE.png" class="case__img">
                                                </div>



                                                <div class="case__name">GGWP</div>


                                                <div class="case__price case__price_bonus">
                                                    <span class="price price-bonus">3.98</span>
                                                </div>


                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/noscopecase" class="case case_bonus">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/NOSCOPECASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">No scope</div>


                                                <div class="case__price case__price_bonus">
                                                    <span class="price price-bonus">4.64</span>
                                                </div>


                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="home__user-cases">
                            <div class="cases-section__title" id="mine-cases">
                                <div class="new-title new-title_with-icon new-title_icon-user">
                                    <div class="new-title__text">Personal cases</div>
                                </div> 

                        <div class="home__series">
                            <div class="cases-section cases-section_limited">
                                <div class="cases-section__title" id="limited-cases">
                                    <div class="new-title new-title_with-icon new-title_icon-limited">
                                        <div class="new-title__text">Limited edition</div>
                                    </div>
                                </div>
                                <div class="cases-section__cases">
                                    <div class="cases">

                                        <div class="cases__item">
                                            <a href="/case/summer" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">29536</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">30000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/summerrrrr.png" class="case__img">
                                                </div>



                                                <div class="case__name">Summer</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.18</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/7years" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">31966</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">35000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/Case-FD_7years.png" class="case__img">
                                                </div>



                                                <div class="case__name">7 years Forcedrop</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">2.06</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/mdust2" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">22731</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">30000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/dust2case.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Dust 2</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.73</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/mMirage" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">3472</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">36000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/miragecase.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Mirage</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">2.39</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/mCobblestone" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">17633</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">55000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/cbblest.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Cobblestone</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.64</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/mInferno" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">11547</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">26000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/infcase.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Inferno</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">2.19</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/mOverpass" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">7256</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">46000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/overpascase.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Overpass</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/mTrain" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">23659</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">30000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/traincase.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Train</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.2</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/mNuke" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">33433</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">35000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/nukecase.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Nuke</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.464</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/valve" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">4466</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">38000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/valffq.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Valve</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.57</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/boombl4" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">15195</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">35000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/boom4.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Boombl4</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">3.32</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">2.26</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/SimpleDimple" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">20809</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">50000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/simple.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Simple Dimple</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.79</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.06</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/popit" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">23098</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">40000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/popit.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Pop It</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.2</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.67</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/vaccine" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">15298</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">36000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/vaccine.png" class="case__img">
                                                </div>



                                                <div class="case__name">Vaccine</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.93</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/coronavirus" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">34089</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">35000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/COR.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Сovid-19</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">2.26</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.46</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/youtube" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">2265</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">35000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/ytcase121.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">YouTube</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.59</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.93</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/twitch" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">6830</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">45000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/twitwwe.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Twitch</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">2.64</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.2</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/TikTok" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">1451</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">35000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/TikTok.png" class="case__img">
                                                </div>



                                                <div class="case__name">Tik Tok</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.32</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/telegram" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">10512</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">37000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/telegram.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Telegram</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.8</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.67</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/twitter" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">42244</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">45000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/twitter.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Twitter</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">2.26</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.93</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/VAC" class="case item-limited">

                                                <div class="case__limit">
                                                    <div class="case__limit-inner">
                                                        <div class="case__limit-left">340497</div>
                                                        <div class="case__limit-separator">/</div>
                                                        <div class="case__limit-reserve">350000</div>
                                                    </div>
                                                </div>

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/VAC.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Vac Ban</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.398</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.239</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="home__series">
                            <div class="cases-section cases-section_cases cases-section_custom-cases">
                                <div class="cases-section__title" id="custom-cases">
                                    <div class="new-title new-title_with-icon new-title_icon-custom">
                                        <div class="new-title__text">Custom cases</div>
                                    </div>
                                </div>
                                <div class="cases-section__cases">
                                    <div class="cases">

                                        <div class="cases__item">
                                            <a href="/case/source2" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/sourcecasee.png" class="case__img">
                                                </div>



                                                <div class="case__name">Source 2</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">9.28</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/hole" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/hole.png" class="case__img">
                                                </div>



                                                <div class="case__name">Hole</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.027</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/homeless" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/homeless22.png" class="case__img">
                                                </div>



                                                <div class="case__name">Homeless</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.048</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.031</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/nerdcase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/zadrot.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Nerd</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.046</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.036</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/camouflage" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/camocase.png" class="case__img">
                                                </div>



                                                <div class="case__name">Camouflage</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.073</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/water" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/FD_water.png" class="case__img">
                                                </div>



                                                <div class="case__name">Water</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.106</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/graffiti" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/graff.png" class="case__img">
                                                </div>



                                                <div class="case__name">Graffiti</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.053</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/sticker" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/Nakleiki.png" class="case__img">
                                                </div>



                                                <div class="case__name">Stickers</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.186</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.146</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/chickencase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/chickencase.png" class="case__img">
                                                </div>



                                                <div class="case__name">Chicken</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.385</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.265</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/ninjadefuse" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/ninkde22.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Ninja defuse</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.18</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/jackpotcase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/jackpotcase.png" class="case__img">
                                                </div>



                                                <div class="case__name">Jackpot</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.67</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.385</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/CS16" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/CS16.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Counter-Strike 1.6</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.358</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/CSGO" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/CSGOb.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Counter-Strike: Global Offensive</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.53</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/C4" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/bobmbcsfd.png" class="case__img">
                                                </div>



                                                <div class="case__name">C4</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.99</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/FORCEDROP" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/FORCEDROPCASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">FORCEDROP</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">7.95</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">4.91</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/ACE" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/ACEcase.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">ACE</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">6.63</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/eSports" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/CYBERSPORTCASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Cyber Sport</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">6.36</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/championcase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/CHAMPIONCASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Champion</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">23.18</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/Gabe" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/GABENCASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Gaben</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">31.78</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">19.87</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/rich" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/RICHBOYCASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Rich boy</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">39.72</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/VIP" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/VIPCASE.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">VIP</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">105.95</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">66.22</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/printstream" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/1PrintStream.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Print stream</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.45</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/MechaIndustries" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/mecha.png" class="case__img">
                                                </div>



                                                <div class="case__name">Mecha Industries</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">7.95</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">4.38</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/safarimesh" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/safarimreere.png" class="case__img">
                                                </div>



                                                <div class="case__name">Safari Mesh</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">5.3</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/damascussteel" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/DAMASCU.png" class="case__img">
                                                </div>



                                                <div class="case__name">Damascus Steel</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.99</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.398</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/engraving" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/grav.png" class="case__img">
                                                </div>



                                                <div class="case__name">Engraving</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/Imperial" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/emperial.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Imperial</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">11.26</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">3.32</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/NeoNoir" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/neo.png" class="case__img">
                                                </div>



                                                <div class="case__name">Neo-Noir</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">5.96</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">2.65</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/neon" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/neon.png" class="case__img">
                                                </div>



                                                <div class="case__name">Neon</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.93</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/WastelandRebel" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/rebel.png" class="case__img">
                                                </div>



                                                <div class="case__name">Wasteland Rebel</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.97</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/fade" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/Gradient.png" class="case__img">
                                                </div>



                                                <div class="case__name">Fade</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">2.39</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/HyperBeast" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/hyperbeast1.png" class="case__img">
                                                </div>



                                                <div class="case__name">Hyper Beast</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">2.65</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.79</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/Asiimov" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/asimov.png" class="case__img">
                                                </div>



                                                <div class="case__name">Asiimov</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">3.98</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.99</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/ultraviolet" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/ulta.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Ultraviolet</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">6.03</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/HARDENEDCASE" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/HARDENEDCASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Hardened</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">59.6</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">19.87</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/agents" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/Agents.png" class="case__img">
                                                </div>



                                                <div class="case__name">Agents</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">5.24</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/glovecase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/glcases.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Gloves</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">189.39</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/abandoned" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/abandoned2.png" class="case__img">
                                                </div>



                                                <div class="case__name">Abandoned</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.332</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/scorched" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/scor.png" class="case__img">
                                                </div>



                                                <div class="case__name">Scorched Battle</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.67</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/fire" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/fireee.png" class="case__img">
                                                </div>



                                                <div class="case__name">Fire</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.385</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/SNOWCASE" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/SNOWCASE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Snow</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.06</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.54</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/COWBOYCASE" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/COWBOYCASE.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Cowboy</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.93</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.398</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/yellowcase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/Case-FD_Yellow.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Yellow</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/green" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/Case-FD_Green.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Green</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">2.39</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.06</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/rage" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/Case-FD_Red.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Red</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.99</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/BLACKCASE" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/Case-FD_Black.png" class="case__img">
                                                </div>



                                                <div class="case__name">Black</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.99</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.305</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/silver" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/FD_Silver.png" class="case__img">
                                                </div>



                                                <div class="case__name">Silver</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.67</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/goldcase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/goldd.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Gold</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">3.32</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">2.51</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/ecocase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/ecocase.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Eco Round</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">2.19</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.4</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/farmround" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/farmcase.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Farm Round</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.59</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.2</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/forcebuycase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/forcebuy.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Force Buy</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.8</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/buycase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/buycase.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Buy Round</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">3.78</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/DragonFire" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/DragonFire.png" class="case__img">
                                                </div>



                                                <div class="case__name">SSG or AWP?</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.93</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.332</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/FW" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/Case-FD_Fire-and-Water.png" class="case__img">
                                                </div>



                                                <div class="case__name">Fire &amp; Water</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">4.64</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.67</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="home__series">
                            <div class="cases-section cases-section_youtubers">
                                <div class="cases-section__title" id="youtubers-cases">
                                    <div class="new-title new-title_with-icon new-title_icon-bloggers">
                                        <div class="new-title__text">Bloggers' cases</div>
                                    </div>
                                </div>
                                <div class="cases-section__cases">
                                    <div class="cases">

                                        <div class="cases__item">
                                            <a href="/case/airscape" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/airsmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Airscape</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">2.65</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/milsiq" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/milsiqsmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Milsiq</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">2.65</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/lavieoubourse" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/laviesmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Lavieoubourse</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">2.65</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/rachelr" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/rachelrsmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">RachelR</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">3.32</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/predator" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/predatorsmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Predator</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">3.32</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/vnsof" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/vnssmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">VNS_OF</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">3.32</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/ivanlogan" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/ivanlogansmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Logan</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">3.98</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/Сoffi" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/coffismall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Coffi</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">3.98</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/pokanoname" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/pokasmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Pokanoname</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.64</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/QRUSH" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/qrushsmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">QRUSH</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.64</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/buster" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/bustersmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Buster</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.64</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/skywhywalker" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/skysmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Skywhywalker</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.64</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/evelone" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/evelonesmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Evelone</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.64</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/JOSKIY" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/joskiysmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Joskiy</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.64</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/fry" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/frysmall.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Fry</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.64</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="home__series">
                            <div class="cases-section cases-section_battle">
                                <div class="cases-section__title" id="battles-cases">
                                    <div class="new-title new-title_with-icon new-title_icon-battles">
                                        <div class="new-title__text">Battles</div>
                                    </div>
                                </div>
                                <div class="cases-section__cases">
                                    <div class="cases">

                                        <div class="cases__item">
                                            <div class="case-special case-special_waiting">
                                                <div class="case-special__img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/hole.png">
                                                </div>
                                                <div class="case-special__title">Hole</div>
                                                <div class="case-special__price price price-RUB">
                                                    0.027

                                                    <button class="case-special__label-join" action="joinLiveBattle">
                                                        <div class="case-special__btn case-special__btn_label"><span class="icon icon_thunder"></span>Join</div>
                                                    </button>

                                                </div>
                                                <div class="case-special__btns">
                                                    <button class="case-special__btn case-special__btn_second" action="createBattle">
                                                        <span class="icon icon_battle"></span>Create battle
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cases__item">
                                            <div class="case-special case-special_waiting">
                                                <div class="case-special__img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseak-47.png">
                                                </div>
                                                <div class="case-special__title">AK-47</div>
                                                <div class="case-special__price price price-RUB">
                                                    0.67

                                                    <button class="case-special__label-join" action="joinLiveBattle">
                                                        <div class="case-special__btn case-special__btn_label"><span class="icon icon_thunder"></span>Join</div>
                                                    </button>

                                                </div>
                                                <div class="case-special__btns">
                                                    <button class="case-special__btn case-special__btn_second" action="createBattle">
                                                        <span class="icon icon_battle"></span>Create battle
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cases__item">
                                            <div class="case-special">
                                                <div class="case-special__img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/graff.png">
                                                </div>
                                                <div class="case-special__title">Graffiti</div>
                                                <div class="case-special__price price price-RUB">
                                                    0.053

                                                </div>
                                                <div class="case-special__btns">
                                                    <button class="case-special__btn case-special__btn_second" action="createBattle">
                                                        <span class="icon icon_battle"></span>Create battle
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cases__item">
                                            <div class="case-special">
                                                <div class="case-special__img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/camocase.png">
                                                </div>
                                                <div class="case-special__title">Camouflage</div>
                                                <div class="case-special__price price price-RUB">
                                                    0.073

                                                </div>
                                                <div class="case-special__btns">
                                                    <button class="case-special__btn case-special__btn_second" action="createBattle">
                                                        <span class="icon icon_battle"></span>Create battle
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cases__item">
                                            <div class="case-special">
                                                <div class="case-special__img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12lake.png">
                                                </div>
                                                <div class="case-special__title">Lake</div>
                                                <div class="case-special__price price price-RUB">
                                                    0.08

                                                </div>
                                                <div class="case-special__btns">
                                                    <button class="case-special__btn case-special__btn_second" action="createBattle">
                                                        <span class="icon icon_battle"></span>Create battle
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cases__item">
                                            <div class="case-special">
                                                <div class="case-special__img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeeTEC-9.png">
                                                </div>
                                                <div class="case-special__title">Tеc-9</div>
                                                <div class="case-special__price price price-RUB">
                                                    0.08

                                                </div>
                                                <div class="case-special__btns">
                                                    <button class="case-special__btn case-special__btn_second" action="createBattle">
                                                        <span class="icon icon_battle"></span>Create battle
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/battles" class="create-battle-case">
                                                <div class="create-battle-case__content">
                                                    <div class="create-battle-case__icon"></div>
                                                    <div class="create-battle-case__text">All battles</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="home__series">
                            <div class="cases-section cases-section_weapon-cases">
                                <div class="cases-section__title" id="weapon-cases">
                                    <div class="new-title new-title_with-icon new-title_icon-weapon">
                                        <div class="new-title__text">Weapon cases</div>
                                    </div>
                                </div>
                                <div class="cases-section__cases">
                                    <div class="cases">

                                        <div class="cases__item">
                                            <a href="/case/usp" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeUSP-S.png" class="case__img">
                                                </div>



                                                <div class="case__name">USР-S</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.51</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/glock" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseGLOCK.png" class="case__img">
                                                </div>



                                                <div class="case__name">Glоck-18</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.305</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/deagle" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseDESERTEAGLE.png" class="case__img">
                                                </div>



                                                <div class="case__name">Desеrt Eаgle</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.371</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/fn" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseFIVE-SEVEN.png" class="case__img">
                                                </div>



                                                <div class="case__name">Fivе-sevеN</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.146</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/tec9" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeeTEC-9.png" class="case__img">
                                                </div>



                                                <div class="case__name">Tеc-9</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.08</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/P2000" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeP2000.png" class="case__img">
                                                </div>



                                                <div class="case__name">Р2000</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.332</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.265</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/P250" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeP250.png" class="case__img">
                                                </div>



                                                <div class="case__name">Р250</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.12</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/CZ75" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseCZ75-AUTO.png" class="case__img">
                                                </div>



                                                <div class="case__name">СZ75-АUTO</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.398</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.265</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/DualBerettas" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseDUALBERETTAS.png" class="case__img">
                                                </div>



                                                <div class="case__name">Dual Berettas</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/R8" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeR8REVOLVER.png" class="case__img">
                                                </div>



                                                <div class="case__name">Rеvоlver R8</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.12</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/MAC10" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeeMAC-10.png" class="case__img">
                                                </div>



                                                <div class="case__name">MAC-10</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.118</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/MP9" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeMP9.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">МP9</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/MP5SD" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeMP5.png" class="case__img">
                                                </div>



                                                <div class="case__name">МP5-SD</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.133</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/MP7" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeMP7.png" class="case__img">
                                                </div>



                                                <div class="case__name">МP7</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.106</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/UMP45" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeeUMP-45.png" class="case__img">
                                                </div>



                                                <div class="case__name">UМP-45</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/Bizon" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/casePP-BIZON.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">PP-Bizon</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.146</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/p90" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeP90.png" class="case__img">
                                                </div>



                                                <div class="case__name">Р90</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.133</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/GalilAR" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseGALILAR.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">GАLIL AR</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.226</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.118</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/FAMAS" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseFAMAS.png" class="case__img">
                                                </div>



                                                <div class="case__name">FАMAS</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.186</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/SG553" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeeSG553.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">SG 553</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.265</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.12</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/aug" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseAUG.png" class="case__img">
                                                </div>



                                                <div class="case__name">АUG</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.106</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/ak47" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseak-47.png" class="case__img">
                                                </div>



                                                <div class="case__name">AK-47</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.67</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/m4a1s" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeM4A1-S.png" class="case__img">
                                                </div>



                                                <div class="case__name">М4А1-S</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">3.32</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/m4a4" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeM4A4.png" class="case__img">
                                                </div>



                                                <div class="case__name">М4А4</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.67</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.398</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/SSG08" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeSSG08.png" class="case__img">
                                                </div>



                                                <div class="case__name">SSG 08</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.106</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/awp" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseawpp.png" class="case__img">
                                                </div>



                                                <div class="case__name">АWP</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/SCAR20" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeeSCAR-20.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">SCАR-20</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.106</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/G3SG1" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseG3SG1.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">G3SG1</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.12</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/MAG7" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeMAG-7.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">MАG-7</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.12</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/Sawedoff" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeSawed-Off.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Sаwеd-off</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/Nova" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeeNova.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Novа</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.08</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/XM1014" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeXM1014.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">XМ1014</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.106</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/negev" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeNegev.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Nеgеv</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.199</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.12</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/M249" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeM249.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">М249</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.265</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="home__series">
                            <div class="cases-section cases-section_cases cases-section_other-cases">
                                <div class="cases-section__title" id="classic-cases">
                                    <div class="new-title new-title_with-icon new-title_icon-standard">
                                        <div class="new-title__text">Classic cases</div>
                                    </div>
                                </div>
                                <div class="cases-section__cases">
                                    <div class="cases">

                                        <div class="cases__item">
                                            <a href="/case/revolution" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeRevolution.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Revolution</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.199</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/recoil" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/recoilcasee.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Recoil</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.71</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.226</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/brokenfang" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/BrokenFangcase.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Broken Fang</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.87</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/fracture" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseFracture.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Fracture</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.265</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/DreamsNightmares" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseDreamsNightmares.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Dreams &amp; Nightmares</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.59</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.265</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/snakebite" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeeSnakebite.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Snakebite</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">2.65</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/OperationRiptideCase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeRiptide.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Riptide</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.59</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.73</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/Prisma2" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseePrisma2.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Prisma 2</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.265</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/ShatteredWeb" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeShatteredWeb.png" class="case__img">
                                                </div>



                                                <div class="case__name">Shattered Web</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.59</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/CS20" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeCS20.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">CS20</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.332</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/prisma" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseePrisma.png" class="case__img">
                                                </div>



                                                <div class="case__name">Prisma</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.67</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/dangerzonecase" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseDangerZone.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Danger Zone</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.265</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/horizon" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeHorizon.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Horizon</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.398</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/clutch" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseClutch.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Clutch</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.332</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/hydra" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeHydra.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Hydra</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">7.88</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/spectrum" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeeSpectrum.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Spectrum</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.398</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/spectrum2" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeSpectrum2.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Spectrum 2</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.332</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/glove" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/glovecasee.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Glove</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.73</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/shadow" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeShadow.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Shadow</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/revolver" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeRevolver.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Revolver</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.398</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/wildfire" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeeWildfire.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Wildfire</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.92</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/gamma2" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseGamma2.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Gamma 2</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.332</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/gamma" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseGamma.png" class="case__img">
                                                </div>



                                                <div class="case__name">Gamma</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.398</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/chroma3" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseChroma3.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Chroma 3</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.332</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/winter_offensive" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeWinterOffensive.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Winter Offensive</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">2.65</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.99</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/breakout" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/Breakoutcasee.png" class="case__img">
                                                </div>



                                                <div class="case__name">Breakout</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.358</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/chroma" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeChroma.png" class="case__img">
                                                </div>



                                                <div class="case__name">Chroma</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.73</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/chroma2" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseChroma2.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Chroma 2</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.398</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/falchion" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseFalchion.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Falchion</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.6</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/huntsman" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeHuntsman.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Huntsman</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">3.17</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/phoenix" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseePhoenix.png" class="case__img">
                                                </div>



                                                <div class="case__name">Phoenix</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">1.99</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.6</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/vanguard" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeeVanguard.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Vanguard</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.66</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/esports_summer_2014" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeSports2014Summer.png" class="case__img">
                                                </div>



                                                <div class="case__name">eSports 2014 Summer</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">3.98</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">3.32</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/esports_2013" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeSports2013.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">eSports 2013</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">4.11</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.53</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/esports_winter_2013" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseeSports2013Winter.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">eSports 2013 Winter</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">2.64</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.06</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/bravo" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/bravocasee.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Bravo</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">17.88</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">9.94</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/weapon" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseCSGOWeapon1.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">CS:GO Weapon</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">31.79</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">4.64</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/weapon_2" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseCSGOWeapon2.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">CS:GO Weapon 2</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">4.38</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.2</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/weapon_3" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/caseCSGOWeapon3.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">CS:GO Weapon 3</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">3.32</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">2.39</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="home__series">
                            <div class="cases-section cases-section_collections">
                                <div class="cases-section__title" id="collections-cases">
                                    <div class="new-title new-title_with-icon new-title_icon-collections">
                                        <div class="new-title__text">Collections</div>
                                    </div>
                                </div>
                                <div class="cases-section__cases">
                                    <div class="cases">

                                        <div class="cases__item">
                                            <a href="/case/Anubis" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/anubis.png" class="case__img">
                                                </div>



                                                <div class="case__name">Anubis</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.146</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/2021Dust2Collection" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/dust20211.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Dust 2 2021</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.67</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.332</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/mirage2021" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/mirage20211.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Mirage 2021</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.252</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.146</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/2021TrainCollection" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/train20211.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Train 2021</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.17</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/2021VertigoCollection" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/vertigo2021.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Vertigo 2021</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.6</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/2018InfernoCollection" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12inferno.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Inferno 2018</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.199</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/2018NukeCollection" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12nuke.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Nuke 2018</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.398</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.199</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/controlcollection" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/control1.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Control</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.93</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.265</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/havoccollection" class="case" style="opacity: 0.6;">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12havoc.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Havoc</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.8</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.377</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/ancientcollection" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/anicent.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Ancient</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.65</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/alpha" class="case" style="opacity: 0.6;">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12alpha.png" class="case__img">
                                                </div>



                                                <div class="case__name">Alpha</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">3.25</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/cobblestone" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12cobble.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Cobblestone</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">3.18</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/cache" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12cache.png" class="case__img">
                                                </div>



                                                <div class="case__name">Cache</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">3.12</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/baggage" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12baggage.png" class="case__img">
                                                </div>



                                                <div class="case__name">Baggage</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.8</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/bank" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12bank.png" class="case__img">
                                                </div>



                                                <div class="case__name">Bank</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.146</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/dust_2" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12dust2.png" class="case__img">
                                                </div>



                                                <div class="case__name">Dust 2</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.332</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/gods_and_monsters" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/gods-of-monster1.png" class="case__img">
                                                </div>



                                                <div class="case__name">Gods and Monsters</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">9.28</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.59</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/chop_shop" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12chop-shop.png" class="case__img">
                                                </div>



                                                <div class="case__name">Chop Shop</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">2.85</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/mirage" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12mirage.png" class="case__img">
                                                </div>



                                                <div class="case__name">Mirage</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">6.89</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.87</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/norse" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/norse1.png" class="case__img">
                                                </div>



                                                <div class="case__name">Norse</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">7.29</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.06</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/nuke" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/nuke-2.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Nuke</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">13.25</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">6.63</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/office" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12office.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Office</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.24</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/overpass" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/overpass1.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Overpass</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.332</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/rising_sun" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/1rising-sun.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Rising Sun</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">2.26</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/thecanalscollection" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/canals1.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">The Canals</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">2.85</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/thestmarccollection" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12st-marc.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">St. Marc</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">4.97</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/train" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12train.png" class="case__img">
                                                </div>



                                                <div class="case__name">Train</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">0.08</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/vertigo" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/vertigo-old.png" class="case__img">
                                                </div>



                                                <div class="case__name">Vertigo</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">7.95</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">4.84</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/safehouse" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12safehouse.png" class="case__img">
                                                </div>



                                                <div class="case__name">Safehouse</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.252</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.106</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/militia" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/milita1.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Militia</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.2</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/lake" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12lake.png" class="case__img">
                                                </div>



                                                <div class="case__name">Lake</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.106</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.08</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/italy" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12italy.png" class="case__img">
                                                </div>



                                                <div class="case__name">Itаly</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">0.12</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.093</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/inferno" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/inferno-old.png" class="case__img">
                                                </div>



                                                <div class="case__name">Inferno</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">2.65</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.8</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/dust" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12dust.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Dust</div>



                                                <div class="case__price">
                                                    <div class="case__current-price">
                                                        <span class="price price-USD">1.33</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/aztec" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/12aztec.png" class="case__img">
                                                </div>



                                                <div class="case__name">Aztec</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">2.12</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">0.8</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                        <div class="cases__item">
                                            <a href="/case/assault" class="case">

                                                <div class="case__wrapper-img">
                                                    <img src="https://images.steamcdn.io/forcedrop/cases/assault1.png" class="case__img">
                                                </div>


                                                <div class="case__plus-bonus">
                                                    <span class="icon icon_bonus"></span>
                                                </div>


                                                <div class="case__name">Assault</div>



                                                <div class="case__price case__price_old">
                                                    <div class="case__old-price">
                                                        <span class="price price-USD">15.9</span>
                                                    </div>
                                                    <div class="case__new-price">
                                                        <span class="price price-USD">1.2</span>
                                                    </div>
                                                </div>



                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="home__advantages">
                            <div class="about">
                                <div class="about__inner">
                                    <div class="about__logo"></div>
                                    <div class="about__items">
                                        <div class="about__item about__item_legendary">
                                            <div class="about__item-title">Legendary</div>
                                            <div class="about__item-text">We are the market leader and have been working for you since 2016</div>
                                        </div>
                                        <div class="about__item about__item_honest">
                                            <div class="about__item-title">Honest</div>
                                            <div class="about__item-text">High chances to win the skin you like, millions of our users have seen it</div>
                                        </div>
                                        <div class="about__item about__item_unique">
                                            <div class="about__item-title">Unique</div>
                                            <div class="about__item-text">We are constantly working on the functionality of the site to meet the requirements of our users</div>
                                        </div>
                                        <div class="about__item about__item_responsive">
                                            <div class="about__item-title">Responsive</div>
                                            <div class="about__item-text">We always listen to the opinion of our users and are ready to help solve any problem</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
    </body>
</html>
