<?php

use \app\models\User;

/** @var yii\web\View $this */
/** @var app\models\Profile $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-page decorated-page">
    <div class="user-page__title">
        <div class="new-title new-title_bigger">
            <div class="new-title__text">Профиль пользователя</div>
        </div>
    </div>
    <div class="user-page__main">
        <div class="profile">
            <div class="profile__name-and-id">
                <div class="profile__name"><?= $model->getName()   ?></div>
                <div class="profile__id icon icon_copy-new" action="copy" data-value="4666219">ID:  <?= $model->user_id   ?></div>
            </div>
            <div class="profile__avatar-and-streamer-mode">
                <a href="https://steamcommunity.com/profiles/76561199524928583" class="profile__avatar" target="_blank" rel="noreferrer noopener">
							<span class="profile__img">
								<img src=<?=  \app\models\User::getUser(Yii::$app->user->getId())->getProfile()->photo ?> alt="">
							</span>
                </a>

                <!-- {{#if isMyProfile}}
                    <div class="profile__streamer-mode">
                        <div class="streamer-mode">
                            <div class="streamer-mode__title">{{_ "STREAMER_MODE"}}</div>
                            <div class="streamer-mode__switcher">
                                <label class="switch switch_shadow switch_default switch_no-icons">
                                    <input type="checkbox" class="js-switch-streamermode" {{isChecked isStreamerMode true}}>
                                    <span class="switch__left-text">Off</span>
                                    <span class="switch__switch-circle"></span>
                                    <span class="switch__right-text">On</span>
                                </label>
                            </div>
                            <div class="streamer-mode__subtitle">{{_ "STREAMER_MODE_DESCRIPTION"}}</div>
                        </div>
                    </div>
                {{/if}} -->
            </div>
            <div class="profile__main">

                <div class="profile__balance">
                    <div class="user-balance-block">
                        <div class="user-balance-block__title">Баланс</div>
                        <div class="user-balance-block__numbers">
                            <div class="user-balance-block__fiat"><span class="price price-RUB"><?= User::getUser(Yii::$app->user->getId())->getProfile()->credit ? User::getUser(Yii::$app->user->getId())->getProfile()->credit : '0.00' ?></span></div>
                            <div class="user-balance-block__coins">

                                <span class="price price-bonus">0.00</span>

                            </div>
                        </div>
                        <!--<div class="user-balance-block__btn refill">
                            <div class="btn btn_color-success btn_uppercase">
                                <div class="btn__content">
                                    <div class="btn__label">Пополнить</div>
                                </div>
                            </div>
                        </div> !-->
                    </div>
                </div>

                <!-- <div class="profile__rank">
                    <div class="rank-section">
                        <div class="rank-section__top">
                            <div class="rank-section__rank">
                                <img class="rank-section__rank-img" src="/public/img/ranks/rank{{getRank.rank}}.png" />
                                <div class="rank-section__rank-name">{{getRank.name}}</div>
                            </div>
                            <div class="rank-section__rank">
                                <span class="rank-section__curr-rank">{{getRank.rank}}</span>
                                <span class="rank-section__max-rank">/{{ranks.length}}</span>
                                <div class="icon-tooltip">
                                    <div class="tooltip tooltip_center tooltip_mini">
                                        {{#if $eq getRank.rank ranks.length}}
                                            <span>{{_ "RANK_SYSTEM_3"}}</span>
                                        {{else}}
                                            <span>{{_ "RANK_SYSTEM_4"}}: <strong>{{getNextRank.name}}</strong></span>
                                        {{/if}}
                                        <span>{{_ "RANK_SYSTEM_5"}}: <strong>{{rankCount}}</strong></span>
                                        <div class="list__btn">
                                            <a href="{{pathFor 'ranks'}}" class="btn btn_style-outline btn_color-primary btn_uppercase">
                                                <div class="btn__content">
                                                    <div class="btn__label">{{_ "RANK_SYSTEM_6"}}</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rank-section__bottom">
                            <div class="rank-progressbar">
                                <div class="rank-progressbar__progress" style="width: {{getRankPercent}}%"></div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="profile__streamer-mode-horizontal">
                    <div class="streamer-mode">
                        <div class="streamer-mode__title-and-subtitle">
                            <div class="streamer-mode__title">Режим стримера</div>
                            <div class="streamer-mode__subtitle">Режим стримера прячет никнеймы и аватары других пользователей</div>
                        </div>
                        <div class="streamer-mode__switcher">
                            <label class="switch switch_shadow switch_default switch_no-icons">
                                <input type="checkbox" class="js-switch-streamermode">
                                <span class="switch__left-text">Off</span>
                                <span class="switch__switch-circle"></span>
                                <span class="switch__right-text">On</span>
                            </label>
                        </div>
                    </div>
                </div>


                <div class="profile__tradelink" action="showTradeUrlPopup">
                    <div class="tradelink-plugin">
                        <div class="tradelink-plugin__content">
                            <div class="tradelink-plugin__label">Ссылка на обмен</div>
                            <div class="tradelink-plugin__value">Введите ссылку на обмен</div>
                        </div>
                    </div>
                </div>

            </div>





            <div class="profile__stats">
                <div class="profile__sub-title">Статистика</div>
                <div class="profile__stat-items">
                    <div class="profile__stat-item">
                        <div class="user-stat-item">
                            <div class="user-stat-item__label">Кейсы</div>
                            <div class="user-stat-item__value">
                                <div class="user-stat-item__value-text">0</div>
                                <div class="user-stat-item__value-icon icon icon_drops"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__stat-item">
                        <div class="user-stat-item">
                            <div class="user-stat-item__label">Контракты</div>
                            <div class="user-stat-item__value">
                                <div class="user-stat-item__value-text">0</div>
                                <div class="user-stat-item__value-icon icon icon_contracts"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__stat-item">
                        <div class="user-stat-item">
                            <div class="user-stat-item__label">Карточки</div>
                            <div class="user-stat-item__value">
                                <div class="user-stat-item__value-text">0</div>
                                <div class="user-stat-item__value-icon icon icon_cards"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__stat-item">
                        <div class="user-stat-item">
                            <div class="user-stat-item__label">Сражения</div>
                            <div class="user-stat-item__value">
                                <div class="user-stat-item__value-text"><span>0</span>/<span class="user-stat-item__wins">0</span></div>
                                <div class="user-stat-item__value-icon icon icon_battles"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__stat-item">
                        <div class="user-stat-item">
                            <div class="user-stat-item__label">Апгрейды</div>
                            <div class="user-stat-item__value">
                                <div class="user-stat-item__value-text"><span>0</span>/<span class="user-stat-item__wins">0</span></div>
                                <div class="user-stat-item__value-icon icon icon_upgrades"></div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="profile__stat-item">
                        <div class="user-stat-item">
                            <div class="user-stat-item__label">На сайте</div>
                            <div class="user-stat-item__value">
                                <div class="user-stat-item__value-text">5 дней</div>
                                <div class="user-stat-item__value-icon icon icon_time"></div>
                            </div>
                        </div>
                    </div> !-->
                </div>
            </div>

        </div>
    </div>
  <!--  <div class="user-page__items">
        <div class="user-page-items">
            <div class="user-page-items__title">
                <div class="new-title new-title_bigger">
                    <div class="new-title__text">Предметы</div>
                </div>
            </div>
            <div class="user-page-items__tabs">
                <div class="new-tabs">
                    <div class="new-tabs__tab new-tabs__tab_drops selectblock active" data-selectblock="drops">Дропы</div>
                    <div class="new-tabs__tab new-tabs__tab_contracts selectblock" data-selectblock="contracts">Контракты</div>
                    <div class="new-tabs__tab new-tabs__tab_battles selectblock" data-selectblock="battles">Сражения</div>
                    <div class="new-tabs__tab new-tabs__tab_upgrades selectblock" data-selectblock="upgrades">Апгрейды</div>
                    <div class="new-tabs__tab new-tabs__tab_wheeldrops selectblock" data-selectblock="wheeldrops">Ежедневный бонус</div>
                </div>
            </div>

            <div class="user-page-items__content" id="drops">
                <div class="items-block">

                    <div class="items-block__topbar">
                        <div class="items-topbar">
                            <div class="items-topbar__content">
                                <div class="items-topbar__sections">
                                    <div class="items-topbar__section items-topbar__section_price-filters">
                                        <div class="price-filters">

                                            <div style="user-select: none;" class="price-filters__filter" data-filter="0-9"><span class="price price-RUB">0-9</span></div>

                                            <div style="user-select: none;" class="price-filters__filter" data-filter="10-49"><span class="price price-RUB">10-49</span></div>

                                            <div style="user-select: none;" class="price-filters__filter" data-filter="50-99"><span class="price price-RUB">50-99</span></div>

                                            <div style="user-select: none;" class="price-filters__filter" data-filter="100-999"><span class="price price-RUB">100-999</span></div>

                                            <div style="user-select: none;" class="price-filters__filter" data-filter="1000+"><span class="price price-RUB">1000+</span></div>

                                        </div>
                                    </div>
                                    <div class="items-topbar__section items-topbar__section_search">
                                        <label class="search">
                                            <input class="search__input" type="text" placeholder="Быстрый поиск" action="searchDrops">
                                            <button class="search__btn" action="clearSearch"></button>
                                        </label>
                                    </div>
                                </div>
                                <div class="items-topbar__sections">
                                    <div class="items-topbar__section items-topbar__section_switch">
                                        <label class="switch switch_shadow switch_default switch_no-icons">
                                            <input type="checkbox" class="drops-filters_available" id="0">
                                            <span class="switch__switch-circle"></span>
                                            <span class="switch__right-text">Доступные</span>
                                        </label>
                                    </div>
                                    <div class="items-topbar__section items-topbar__section_btn">
                                        <button class="btn btn_color-success btn_uppercase btn_fullwidth" action="sellItems">
                                            <div class="btn__content">
                                                <div class="btn__label">Продать все</div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="items-block__no-items">
                        <div class="no-items icon icon_drops">

                            <div class="no-items__title">Пока предметов нет</div>
                            <div class="no-items__text">Открывай кейсы - получай топовый дроп!</div>

                            <div class="no-items__btn">
                                <a href="/" class="btn btn_style-outline btn_color-primary btn_uppercase">
																<span class="btn__content">
																	<span class="btn__label">Откройте кейс</span>
																</span>
                                </a>
                            </div>


                        </div>
                    </div>


                </div>
            </div>





        </div>
    </div> !-->
</div>