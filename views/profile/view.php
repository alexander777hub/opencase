<?php

use \app\models\User;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Profile $model */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);


$user_js_id = !(Yii::$app->user->isGuest) ? (Yii::$app->user->id) : null;

$best_drop = null;
$best_drop_price = null;
$best_drop_case_name = null;
$best_photo = null;
$best_drop_name = null;
$favorite_case = null;
if(!Yii::$app->user->isGuest){
    $best_drop = User::getUser(Yii::$app->user->getId())->getProfile()->getBestDrop($dataProvider);
    $best_drop_price = $best_drop && isset($best_drop['price']) ? round($best_drop['price'], 2) : '';
    $best_drop_case_name = $best_drop && isset($best_drop['case_id']) ? \app\modules\mng\models\Opening::getCaseName($best_drop['case_id']) : '';

    $best_photo = $best_drop ? User::getUser(Yii::$app->user->getId())->getProfile()->getBestDropPhoto($best_drop) : '';

    $best_drop_name =  $best_drop ? User::getUser(Yii::$app->user->getId())->getProfile()->getBestDropName($best_drop) : '';


    $favorite_case = User::getUser(Yii::$app->user->getId())->getProfile()->getFavoritCase();

    $favorite_case_name = User::getUser(Yii::$app->user->getId())->getProfile()->getFavoritCaseName($favorite_case);

    $favorite_case_count = User::getUser(Yii::$app->user->getId())->getProfile()->getFavoritCaseCountOpen($favorite_case);

    $favorite_case_photo =  User::getUser(Yii::$app->user->getId())->getProfile()->getFavoritCasePhoto($favorite_case);

    $countCases = User::getUser(Yii::$app->user->getId())->getProfile()->getCountCases();
    $countContracts = User::getUser(Yii::$app->user->getId())->getProfile()->getCountContracts();
    $countUpgrades = User::getUser(Yii::$app->user->getId())->getProfile()->getCountUpgrades();
    $countSuccessUpgrades = User::getUser(Yii::$app->user->getId())->getProfile()->getCountSuccessUpgrades();

}

?>
<script
        src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $(document).on({
            ajaxStart: function(){
                $("body").addClass("loading");
            },
            ajaxStop: function(){
                $("body").removeClass("loading");
            }
        });
        var items = $('.js_class');

        items.each(function() {
            var rarity = $(this).data('rarity');
            var jsClass = '';
            switch (rarity){
                case 'Rarity_Common_Weapon':
                    jsClass = 'rarity_common_weapon';
                    break;
                case 'Rarity_Mythical':
                    jsClass = 'rarity_mythical';
                    break;
                case 'Rarity_Legendary':
                    jsClass = 'rarity_legendary';
                    break;
                case 'Rarity_Ancient':
                    jsClass = 'rarity_ancient';
                    break;
                case 'Rarity_Ancient_Weapon':
                    jsClass = 'rarity_ancient_weapon';
                    break;
                case 'Rarity_Rare_Weapon':
                    jsClass = 'rarity_rare_weapon';
                    break;
                case 'Special_Gold':
                    jsClass = 'rarity_special_gold';
                    break;
                default:
                    break;

            }

            var parent = $( this ).closest(".items-incase__item");
            parent.addClass(jsClass);

        });
        console.log(items, "ITEMS");
        console.log( $(".tomarket"), 'EL');
        $("#close-sell").on("click", function(){
            $("#sell").css("display", "none");
        });
        $("#close-sell-all").on("click", function(){
            $("#popup-sell-all").css("display", "none");
        });
        $(".tomarket").on("click", function (e) {
            let item_id = $(this).find(".data-price").data('id');
            let oi_id = $(this).find(".data-price").data('oi');
            console.log($(this).closest(".items-incase__item"), "PARENT");
            let parent = $(this).closest(".item__btns");

            $.ajax({
                url: "/rest-api/market",
                type: "post",
                data:  {
                    item_id: item_id,
                    user_id:  '<?= $user_js_id  ?>',
                    oi_id: oi_id,
                    market_hash_name : $(this).find(".data-price").data('name'),
                },
                success: function (response) {
                    console.log(response, "RESPONSE");
                    console.log($(this).find(".data-price"), "TARG");
                    let price = response && response.price ? response.price :  $(this).find(".data-price").data('price');
                    $(".default-popup__title").empty();
                    $("#confirm-sell").remove();
                    $("#sell").css("display", "block");
                    if(response.error){
                        $("#append-sell-text").text(response.error);
                        return;
                    }
                    $("#append-sell-text").text("Заказ на вывод скина сформирован");
                    console.log($(this), "THIS");
                    parent.empty();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        });
        $("#sell-all").on("click", function(){
            $("#popup-sell-all").css("display", 'block');

            $("#confirm-sell-all").on("click", function(){
                data = {
                    user_id: '<?= $user_js_id  ?>',
                };

                $.ajax({
                    url: "/rest-api/sell-all",

                    type: "post",

                    data: data,

                    success: function (response) {
                        console.log(response, "RESPONSE");
                        window.location.reload();

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

            })


        });

        $(".tosell").on("click", function (e) {

            let item_id = $(this).find(".data-price").data('id');
            let oi_id = $(this).find(".data-price").data('oi');
            console.log($(this).closest(".items-incase__item"), "PARENT");
            let parent = $(this).closest(".item__btns");
            let price_div = parent.find(".price-RUB");
            console.log($(this).find(".data-price"), "TARG");
            let price = $(this).find(".data-price").data('price');
            $("#sell").css("display", "block");
            $("#append-sell-text").text("Вы действительно хотите продать этот предмет за " +  price);
            console.log($(this), "THIS");
            data = {
                item_id: item_id,
                user_id: '<?= $user_js_id  ?>',
                price: price,
                oi_id: oi_id

            };



            $("#confirm-sell").on("click", function(){

                $.ajax({
                    url: "/rest-api/sell",

                    type: "post",

                    data: data,


                    success: function (response) {
                        console.log(response, "RESPONSE");

                        $("#sell").css("display", "none");
                        parent.empty();
                        $("#append-credit").empty();
                        $("#append-credit").text(response.profile_credit);
                        $("#balance-left").empty();
                        $("#balance-left").text(response.profile_credit);

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });

        });
        $('#trade-save').on('click', function(){

            $('#trade-form').submit();
        });
        $(".profile__tradelink").on("click", function(){
            $("#trade").show();
        });



        $("#trade-close").on('click', function(){
            $("#trade").hide();
        })
    });

</script>
<style>
    .pagination {
        display: -webkit-box;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
    }
    .bd-example {
        position: relative;
        padding: 1rem;
        margin: 1rem -15px 0;
        border: solid #f7f7f9;
        border-width: 0.2rem 0 0;
    }

    .page-link:not(:disabled):not(.disabled) {
        cursor: pointer;
    }
    a:-webkit-any-link {
        text-decoration: none;
    }
    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .overlay{
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(255,255,255,0.8) url("/uploads/img/loader.gif") center no-repeat;
    }
    /* Turn off scrollbar when body element has the loading class */
    body.loading{
        overflow: hidden;
    }
    /* Make spinner image visible when body element has the loading class */
    body.loading .overlay{
        display: block;
    }

</style>
<div id="trade" style="display: none">

    <div  class="profile__tradelink-popup">
        <div class="new-popup" action="popupOutsideTradeUrl">
            <div class="new-popup__box" id="popupTradeUrl">
                <div class="new-popup__close">
                    <div class="btn btn_transparent btn_type-square" action="closeTradeUrlPopup">
                        <div id="trade-close" class="btn__content">
                            <div class="btn__icon icon icon_close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#00ff00" class="bi bi-file-x" viewBox="0 0 30 30">
                                    <path d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708z"/>
                                    <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-popup__content">
                    <div class="tradelink-popup">
                        <div class="tradelink-popup__title">Ссылка на обмен</div>
                        <div class="tradelink-popup__section">
                            <div class="tradelink-popup__text">Найти ссылку можно <a target="_blank" rel="noreferrer noopener" href="https://steamcommunity.com/id/me/tradeoffers/privacy#trade_offer_access_url">на сайте Steam</a></div>
                            <div class="tradelink-popup__form">
                                <?php $form = ActiveForm::begin(
                                        [
                                            'action' => ['/profile/trade'],
                                            'id' => 'trade-form', 'method' => 'post',
                                            'options' => [

                                                'style' => "width:100%",

                                ]]); ?>
                                <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $model->user_id])->label(false); ?>
                                <?= $form->field($model, 'trade_link')->textInput(['maxlength' => true, 'style' => 'width: 100%',  'class'=>"tradelink-popup__input",'placeholder'=>"Введите ссылку на обмен" ]) ?>

                                <div style="margin-top: 20px;" class="tradelink-popup__btn">
                                    <div class="btn btn_fullwidth btn_color-success btn_uppercase">

                                          <?=  \yii\helpers\Html::button('Сохранить', ['type'=>'submit',
                                              'class' => 'btn btn-primary',
                                              'id'=> 'trade-save',
                                              'style' => 'background-color: #7ed321;'


                                            ]) ?>

                                    </div>
                                </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                        <div class="tradelink-popup__section">
                            <div class="tradelink-popup__section-title">Остерегайтесь мошенников!</div>
                            <div class="tradelink-popup__text">
                                которые добавляются к вам в Steam под видом администраторов/модераторов/помощников ForceDrop.
                                Мы никогда не будем добавляться к вам в друзья в Steam и предлагать продать ваши предметы по двойной цене, давать ссылки на скачивание чего-либо (скорее всего вредоносные программы и/или стиллеры) и т.д..
                            </div>
                        </div>
                        <div class="tradelink-popup__section">
                            <div class="tradelink-popup__info-blocks">
                                <div class="tradelink-popup__info-block tradelink-popup__info-block_answers">
                                    <div class="tradelink-popup__info-block-content">
                                        Ответы на все ваши вопросы есть на специальной страничке:
                                        <a href="/faq">FAQ</a>.
                                        Если проблема не решена, вы можете обратиться в нашу тех. поддержку.
                                    </div>
                                </div>
                                <div class="tradelink-popup__info-block tradelink-popup__info-block_robber">
                                    <div class="tradelink-popup__info-block-content">
                                        ЗАПОМНИТЕ!
                                        Очень важно!
                                        У вас украдут предметы, если не быть внимательными!
                                        ОФИЦИАЛЬНЫЕ КОНТАКТЫ
                                        <a target="_blank" rel="noreferrer noopener" href="#">в группе Вконтакте</a>
                                        (блок 'Контакты').
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
                    <a href="#" class="profile__avatar" target="_blank" rel="noreferrer noopener">
							<span class="profile__img">
								<img src=<?=  \app\models\User::getUser(Yii::$app->user->getId())->getProfile()->photo_full ? \app\models\User::getUser(Yii::$app->user->getId())->getProfile()->photo_full : '/uploads/profile/default.png' ?> alt="">
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
                            <div class="user-balance-block__title">Баланс </div>
                            <div class="user-balance-block__numbers">
                                <div class="user-balance-block__fiat"><span id="balance-left" class="price price-RUB"><?= User::getUser(Yii::$app->user->getId())->getProfile()->credit ? User::getUser(Yii::$app->user->getId())->getProfile()->credit : '0.00' ?></span></div>
                                <div class="user-balance-block__coins">

                                    <span class="price price-bonus">0.00</span>

                                </div>
                            </div>
                            <div class="user-balance-block__btn refill">
                                <div class="btn btn_color-success btn_uppercase">
                                    <div class="btn__content">
                                        <div class="btn__label"><a href="/payment/index">Пополнить</a></div>
                                    </div>
                                </div>
                            </div>
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

                    <!--    <div class="profile__streamer-mode-horizontal">
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
                        </div> !-->
                    <?php if ($model->trade_link): ?>
                        <div class="profile__tradelink" action="showTradeUrlPopup">
                            <div class="tradelink-plugin tradelink-plugin_set">
                                <div class="tradelink-plugin__content">
                                    <div class="tradelink-plugin__label">Ссылка на обмен</div>
                                    <div class="tradelink-plugin__value">Установлена</div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="profile__tradelink" action="showTradeUrlPopup">
                            <div class="tradelink-plugin">
                                <div class="tradelink-plugin__content">
                                    <div class="tradelink-plugin__label">Ссылка на обмен</div>
                                    <div class="tradelink-plugin__value">Введите ссылку на обмен</div>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>
                <?php if($favorite_case):   ?>
                <div class="profile__favorite-case">
                    <div class="profile__sub-title profile__favorite-case-title">Любимый кейс</div>

                    <a style="margin-top: 0px;" href="#" class="profile__favorite-case-item">
                        <img src=<?= $favorite_case_photo   ?> class="case-image">
                    </a>
                    <div class="profile__favorite-case-label-value">
                        <div class="profile__favorite-case-value"> <?= $favorite_case_name   ?></div>
                        <div class="profile__favorite-case-label">Количество открытий: <?= $favorite_case_count   ?></div>
                    </div>
                </div>

                   <!--Лучший дроп тут  !-->
                <?php  endif;  ?>
                <?php if($best_drop):  ?>
                    <div class="profile__favorite-case">
                        <div class="profile__sub-title profile__favorite-case-title">Лучший дроп</div>
                        <div class="item__content">
                            <a href="#" class="profile__favorite-case-item">
                                <img src=<?= $best_photo   ?> class="case-image">
                                <!--   <div class="item__type">P250</div> !-->
                                <div class="item__name"><?= $best_drop_name   ?></div>
                            </a>

                            <div class="item__price"><span class="price price-RUB"><?= $best_drop_price  ?></span></div>
                            <div class="profile__favorite-case-label"> Кейс <?= $best_drop_case_name  ?></div>
                            <div class="item__icons">
                                <div class="item__icon status selled">
                                    <span class="tooltip tooltip_center tooltip_extramin">Продано</span>
                                </div>
                            </div>
                            <div class="item__btns">


                            </div>


                        </div>
                    </div>

                <?php endif;   ?>

                <div class="profile__stats">
                    <div class="profile__sub-title">Статистика</div>
                    <div class="profile__stat-items">
                        <div class="profile__stat-item">
                            <div class="user-stat-item">
                                <div class="user-stat-item__label">Кейсы</div>
                                <div class="user-stat-item__value">
                                    <div class="user-stat-item__value-text"> <?= $countCases   ?></div>
                                    <div class="user-stat-item__value-icon icon icon_drops"></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile__stat-item">
                            <div class="user-stat-item">
                                <div class="user-stat-item__label">Контракты</div>
                                <div class="user-stat-item__value">
                                    <div class="user-stat-item__value-text"><?= $countContracts   ?></div>
                                    <div class="user-stat-item__value-icon icon icon_contracts"></div>
                                </div>
                            </div>
                        </div>
                   <!--     <div class="profile__stat-item">
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
                        </div> !-->
                        <div class="profile__stat-item">
                            <div class="user-stat-item">
                                <div class="user-stat-item__label">Апгрейды</div>
                                <div class="user-stat-item__value">
                                    <div class="user-stat-item__value-text"><span><?= $countSuccessUpgrades   ?></span>/<span class="user-stat-item__wins"> <?= $countUpgrades   ?></span></div>
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
          <div class="user-page__items">
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
                                          <div id="sell-all">
                                              <div class="items-topbar__section items-topbar__section_btn">
                                                  <button  class="btn btn_color-success btn_uppercase btn_fullwidth">
                                                      <div  class="btn__content">
                                                          <div class="btn__label">Продать все</div>
                                                      </div>
                                                  </button>
                                              </div>

                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="case-page__items">
                              <div class="case-items">
                                  <div class="case-items__items">
                                      <?php echo \yii\widgets\ListView::widget([
                                          'dataProvider' => $dataProvider,
                                          'itemView' => '_item',
                                          'itemOptions' => [
                                              'class' => 'items-incase__item',

                                          ],
                                          //    'options' => ['class' => 'cases'],
                                          'layout' => "<div><div class='items-incase'>{items}</div><br><div></div></div>"


                                      ]); ?>
                                  </div>


                                  <div class="row mt-5">
                                      <div class="col text-center ml-auto">
                                          <?php
                                          echo \yii\bootstrap4\LinkPager::widget([
                                              'pagination' => $dataProvider->getPagination(),
                                              'options' => [
                                                  'class' => 'ml-auto',
                                              ],
                                          ]);
                                          ?>
                                      </div>
                                  </div>
                                  <!--        <div class="case-items__items">
                                              <div class="items-incase">

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=AUG%20%7C%20%D0%AF%D0%BD%D1%82%D0%B0%D1%80%D0%BD%D1%8B%D0%B9%20%D1%88%D0%BA%D0%B2%D0%B0%D0%BB" target="_blank" rel="noreferrer noopener" class="skin skin_in-case milspec">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot6-iFA957PLddgJW4864q4-ZlvnzNoTdn2xZ_Isk2euUpI2l2gaw-Es5Mmr6cdDDd1BoMw2E81O7xO-71pG4vcjIziFgpGB8siZU0y43/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot6-iFA957PLddgJW4864q4-ZlvnzNoTdn2xZ_Isk2euUpI2l2gaw-Es5Mmr6cdDDd1BoMw2E81O7xO-71pG4vcjIziFgpGB8siZU0y43/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">AUG</div>
                                                                  <div class="skin__name">Янтарный шквал</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=CZ75-Auto%20%7C%20%D0%9D%D0%B0%D1%81%D1%82%D0%BE%D1%8F%D1%89%D0%B8%D0%B9%20%D0%B7%D0%BC%D0%B5%D0%B5%D1%8F%D0%B4" target="_blank" rel="noreferrer noopener" class="skin skin_in-case milspec">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpotaDyfgZf0Ob3cicVueOhnImZm-D9Pb_ummJW4NE_0r-XpdWi3wTj_0VqZmygJ4OVIFQ5M1jY_QC2ku65hMC97pjMnXJi7D5iuyjMo85cwA/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpotaDyfgZf0Ob3cicVueOhnImZm-D9Pb_ummJW4NE_0r-XpdWi3wTj_0VqZmygJ4OVIFQ5M1jY_QC2ku65hMC97pjMnXJi7D5iuyjMo85cwA/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">CZ75-Auto</div>
                                                                  <div class="skin__name">Настоящий змееяд</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=MAG-7%20%7C%20%D0%91%D0%B5%D1%81%D1%81%D0%BE%D0%BD%D0%BD%D0%B8%D1%86%D0%B0" target="_blank" rel="noreferrer noopener" class="skin skin_in-case milspec">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou7uifDhjxszFcDoV09W4h4-Gmf71DLfYkWNFppV1076Q846k31e1-xE-Yj2lI9TEJ1I4MFmDqwC3wey8gJDvvciYzCB9-n51Xge7f1M/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou7uifDhjxszFcDoV09W4h4-Gmf71DLfYkWNFppV1076Q846k31e1-xE-Yj2lI9TEJ1I4MFmDqwC3wey8gJDvvciYzCB9-n51Xge7f1M/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">MAG-7</div>
                                                                  <div class="skin__name">Бессонница</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=MP9%20%7C%20%D0%A1%D0%BA%D1%80%D0%BE%D0%BC%D0%BD%D0%B0%D1%8F%20%D1%83%D0%B3%D1%80%D0%BE%D0%B7%D0%B0" target="_blank" rel="noreferrer noopener" class="skin skin_in-case milspec">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6r8FABz7P7YKAJB49C5mpnbxsj4OrzZgiVXsMEo3bCTpN-kigPs_UNuZjj6IobBJlNqMFqFrwO5xrjmgsW5ucjK1zI97d1xtbMt/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6r8FABz7P7YKAJB49C5mpnbxsj4OrzZgiVXsMEo3bCTpN-kigPs_UNuZjj6IobBJlNqMFqFrwO5xrjmgsW5ucjK1zI97d1xtbMt/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">MP9</div>
                                                                  <div class="skin__name">Скромная угроза</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=CZ75-Auto%20%7C%20%D0%A2%D0%B8%D0%B3%D1%80" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz54LrTgMQhkZzvBVvVfEeEz8w3-Nio37M52WZmw8-kFfAXu5ovEM7l-NI1FGcWDCPeOYQH5vE441aZYeZTcpSvt2im4JC5UDEMd6wFp/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz54LrTgMQhkZzvBVvVfEeEz8w3-Nio37M52WZmw8-kFfAXu5ovEM7l-NI1FGcWDCPeOYQH5vE441aZYeZTcpSvt2im4JC5UDEMd6wFp/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">CZ75-Auto</div>
                                                                  <div class="skin__name">Тигр</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=Desert%20Eagle%20%7C%20%D0%A0%D0%B5%D0%BB%D1%8C%D1%81%D0%BE%D1%82%D1%80%D0%BE%D0%BD" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposr-kLAtl7PTbTjlH7du6kb-Oj_jLP7LWnn8fsMd1ibCS89333AGxrRE9YmH0I4KdcgA7NQ2GrFi4xru6057qvsvLnWwj5HcdQQ8Quw/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposr-kLAtl7PTbTjlH7du6kb-Oj_jLP7LWnn8fsMd1ibCS89333AGxrRE9YmH0I4KdcgA7NQ2GrFi4xru6057qvsvLnWwj5HcdQQ8Quw/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">Desert Eagle</div>
                                                                  <div class="skin__name">Рельсотрон</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=Desert%20Eagle%20%7C%20%D0%9D%D0%B0%D0%B3%D0%B0" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz5_MeKyPDJYcxX9BaVfW_k_ywbtDiYN5cJnXcK7ueNXeQnrsITOO7IrN9oeTMmDWvKDYV30609r1KVfLZ3d8iu6iyTpPzwUG028QhzObxo/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz5_MeKyPDJYcxX9BaVfW_k_ywbtDiYN5cJnXcK7ueNXeQnrsITOO7IrN9oeTMmDWvKDYV30609r1KVfLZ3d8iu6iyTpPzwUG028QhzObxo/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">Desert Eagle</div>
                                                                  <div class="skin__name">Нага</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=Glock-18%20%7C%20%D0%9A%D1%80%D0%BE%D0%BB%D0%B8%D0%BA%20%D0%B2%20%D1%82%D0%B5%D0%BD%D0%B8" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79eJmY-EmcjmMrnTn39u5Mx2gv2PrNyj21bt_EdpYWzzIIKTIQA7Zl7T-ATswO2-g5W-ucvMyCZiuiF052GdwUIQKFtn2Q/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79eJmY-EmcjmMrnTn39u5Mx2gv2PrNyj21bt_EdpYWzzIIKTIQA7Zl7T-ATswO2-g5W-ucvMyCZiuiF052GdwUIQKFtn2Q/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">Glock-18</div>
                                                                  <div class="skin__name">Кролик в тени</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=M4A4%20%7C%20%D0%9B%D0%B8%D0%BA%D0%BE%D1%80%D0%B8%D1%81%20%D0%BB%D1%83%D1%87%D0%B8%D1%81%D1%82%D1%8B%D0%B9" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhnwMzFJQJE4NOhkZKYqPv9NLPF2DIIvZYp3L2Sp9r0jADt_hZvYTv7IYPEIQI7NVHW-Ve5k-_rjMTptZ3XiSw0JZF91_c/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhnwMzFJQJE4NOhkZKYqPv9NLPF2DIIvZYp3L2Sp9r0jADt_hZvYTv7IYPEIQI7NVHW-Ve5k-_rjMTptZ3XiSw0JZF91_c/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">M4A4</div>
                                                                  <div class="skin__name">Ликорис лучистый</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=MAC-10%20%7C%20%D0%96%D0%B0%D1%80" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz52NeDkYAhkZzvPAKMPDMoo8QzkBjMN5cJnXcK7ue0DKg7p4NHAMLh9OYoaF8SEUqCHNQ_-60tph_JVLZCOoCu-iCXpOzgUG028bvFxRZc/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz52NeDkYAhkZzvPAKMPDMoo8QzkBjMN5cJnXcK7ue0DKg7p4NHAMLh9OYoaF8SEUqCHNQ_-60tph_JVLZCOoCu-iCXpOzgUG028bvFxRZc/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">MAC-10</div>
                                                                  <div class="skin__name">Жар</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=MAG-7%20%7C%20%D0%96%D0%B0%D1%80" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz52NeTiDzRyTQnDBvdhTvA-_Af4Nio37M52WZnhrulQLF7qsNHPNLN-NNseGcTVCPaAM1ipuUg-iaUOfpXY9Hy-1S7hJC5UDBPIkqli/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz52NeTiDzRyTQnDBvdhTvA-_Af4Nio37M52WZnhrulQLF7qsNHPNLN-NNseGcTVCPaAM1ipuUg-iaUOfpXY9Hy-1S7hJC5UDBPIkqli/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">MAG-7</div>
                                                                  <div class="skin__name">Жар</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=P250%20%7C%20Inferno" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopujwezhnwMzYI2gS09W4koWZmfjLP7LWnn8fsJxz3rqU9oqhigWxqhFkMmClcdKdJAFvMFnZ-FO2l7vmgZS97pmcm2wj5HddTEfd5A/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopujwezhnwMzYI2gS09W4koWZmfjLP7LWnn8fsJxz3rqU9oqhigWxqhFkMmClcdKdJAFvMFnZ-FO2l7vmgZS97pmcm2wj5HddTEfd5A/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">P250</div>
                                                                  <div class="skin__name">Inferno</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=P90%20%7C%20Chopper" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopuP1FABz7OORIQJE-dC6q5SDhfjgJ7fUqWZU7Mxkh6fEpoml2Fbj-RFuY2_xLITBewVrZ1DTrgXtw7vnjJC-tJibySA3syQk-z-DyMine1-Q/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopuP1FABz7OORIQJE-dC6q5SDhfjgJ7fUqWZU7Mxkh6fEpoml2Fbj-RFuY2_xLITBewVrZ1DTrgXtw7vnjJC-tJibySA3syQk-z-DyMine1-Q/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">P90</div>
                                                                  <div class="skin__name">Chopper</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=P90%20%7C%20%D0%9F%D1%80%D0%BE%D1%80%D1%8B%D0%B2%20%D0%B2%20%D0%B2%D0%B5%D0%BD%D1%82%D0%B8%D0%BB%D1%8F%D1%86%D0%B8%D1%8E" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopuP1FABz7OORIQJW7dKxmIWPqPv9NLPF2G8A65Nz27jF9tqt3wKy-hA6Zm31Jo6UJlA2M1CGqwK4yb_vhpG5vZXXiSw0VqRdspI/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopuP1FABz7OORIQJW7dKxmIWPqPv9NLPF2G8A65Nz27jF9tqt3wKy-hA6Zm31Jo6UJlA2M1CGqwK4yb_vhpG5vZXXiSw0VqRdspI/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">P90</div>
                                                                  <div class="skin__name">Прорыв в вентиляцию</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=%D0%9F%D0%9F-19%20%D0%91%D0%B8%D0%B7%D0%BE%D0%BD%20%7C%20%D0%9E%D1%81%D0%B8%D1%80%D0%B8%D1%81" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz55Pfm6PghkZzvACLpRUrg15wH-ADQN5cJnXcK7ub4CLAvs54LHZrMtONlOF8bTC6DSZQj67B5u0qgPfsGAoCPs2C68PWwUG028RBKyq3A/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz55Pfm6PghkZzvACLpRUrg15wH-ADQN5cJnXcK7ub4CLAvs54LHZrMtONlOF8bTC6DSZQj67B5u0qgPfsGAoCPs2C68PWwUG028RBKyq3A/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">ПП-19 Бизон</div>
                                                                  <div class="skin__name">Осирис</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=UMP-45%20%7C%20%D0%97%D0%BE%D0%BB%D0%BE%D1%82%D0%BE%D0%B9%20%D0%B2%D0%B8%D1%81%D0%BC%D1%83%D1%82" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo7e1f1Jf1OD3ZDBS09u5mIS0lf7nPq7FnlRd4cJ5nqfCpdXziQG2-0VtZD3yd4KddAE9ZgvZqATswue5gp_u6c7KyHRhu3Rx-z-DyJ76r1UD/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo7e1f1Jf1OD3ZDBS09u5mIS0lf7nPq7FnlRd4cJ5nqfCpdXziQG2-0VtZD3yd4KddAE9ZgvZqATswue5gp_u6c7KyHRhu3Rx-z-DyJ76r1UD/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">UMP-45</div>
                                                                  <div class="skin__name">Золотой висмут</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=XM1014%20%7C%20Teclu%20Burner" target="_blank" rel="noreferrer noopener" class="skin skin_in-case restricted">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgporrf0e1Y07PLZTiVPvYznwL-DmOPLIbTVqWZU7Mxkh6eVotvw21ax_0E-ZzzxcdXGcVU3YFrSqwO4k-vs0ZLu7c-amntiuiNw-z-DyNcUxGfK/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgporrf0e1Y07PLZTiVPvYznwL-DmOPLIbTVqWZU7Mxkh6eVotvw21ax_0E-ZzzxcdXGcVU3YFrSqwO4k-vs0ZLu7c-amntiuiNw-z-DyNcUxGfK/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">XM1014</div>
                                                                  <div class="skin__name">Teclu Burner</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=AWP%20%7C%20%D0%9A%D0%BE%D1%80%D1%82%D0%B8%D1%81%D0%B5%D0%B9%D1%80%D0%B0" target="_blank" rel="noreferrer noopener" class="skin skin_in-case classified">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz56I_OKMyJYdAXUBKxfY_Qt5DfhDCM7_cotA4Lhr7lSLQ_tt4GVYrl4MY1IGJOGX_fTYF-p6E1u0qJVL5GB8S-9jDOpZDknDIyvzQ/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz56I_OKMyJYdAXUBKxfY_Qt5DfhDCM7_cotA4Lhr7lSLQ_tt4GVYrl4MY1IGJOGX_fTYF-p6E1u0qJVL5GB8S-9jDOpZDknDIyvzQ/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">AWP</div>
                                                                  <div class="skin__name">Кортисейра</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=AWP%20%7C%20Duality" target="_blank" rel="noreferrer noopener" class="skin skin_in-case classified">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FABz7PLfYQJO5dG0m7-Ymfb_NoTdn2xZ_Isn2rCZoY_w2VHhqEI9ZzigJYbAegU6ZVyB8wO5lOm5gp7o6JTBm3M2pGB8sn-9jb_y/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FABz7PLfYQJO5dG0m7-Ymfb_NoTdn2xZ_Isn2rCZoY_w2VHhqEI9ZzigJYbAegU6ZVyB8wO5lOm5gp7o6JTBm3M2pGB8sn-9jb_y/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">AWP</div>
                                                                  <div class="skin__name">Duality</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=FAMAS%20%7C%20%D0%94%D0%B6%D0%B8%D0%BD%D0%BD" target="_blank" rel="noreferrer noopener" class="skin skin_in-case classified">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz59Ne60IwhmYzvEAK1fT8ow_QbiNio37M52WZnmo71ScQXrtNfEYuIrNY0ZS8TWXKeEZ1qo70k60aQLKZSLpiK53STvJC5UDDELs8ER/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz59Ne60IwhmYzvEAK1fT8ow_QbiNio37M52WZnmo71ScQXrtNfEYuIrNY0ZS8TWXKeEZ1qo70k60aQLKZSLpiK53STvJC5UDDELs8ER/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">FAMAS</div>
                                                                  <div class="skin__name">Джинн</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=FAMAS%20%7C%20%D0%93%D0%BB%D0%B0%D0%B7%20%D0%90%D1%84%D0%B8%D0%BD%D1%8B" target="_blank" rel="noreferrer noopener" class="skin skin_in-case classified">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLuoKhRf0Ob3dzxP7c-Jm5eHqPjmMrXWk1Rd4cJ5nqeW9o6miQzir0BqYGj0IYWVewA6N1zQrle4k-nqgJG0tcmcziEysihz-z-DyOcjvJ-R/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLuoKhRf0Ob3dzxP7c-Jm5eHqPjmMrXWk1Rd4cJ5nqeW9o6miQzir0BqYGj0IYWVewA6N1zQrle4k-nqgJG0tcmcziEysihz-z-DyOcjvJ-R/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">FAMAS</div>
                                                                  <div class="skin__name">Глаз Афины</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=FAMAS%20%7C%20Mecha%20Industries" target="_blank" rel="noreferrer noopener" class="skin skin_in-case classified">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLuoKhRf1OD3dzxP7c-JmYWIn_bLPr7Vn35cppNzi-rCp47z2Afh-0RtZWilJ4bHcFNtaA7W-1O9le290MK778_PnCZ9-n51_SX8Af0/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposLuoKhRf1OD3dzxP7c-JmYWIn_bLPr7Vn35cppNzi-rCp47z2Afh-0RtZWilJ4bHcFNtaA7W-1O9le290MK778_PnCZ9-n51_SX8Af0/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">FAMAS</div>
                                                                  <div class="skin__name">Mecha Industries</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=M4A1-S%20%7C%20%D0%90%D1%82%D0%BE%D0%BC%D0%BD%D1%8B%D0%B9%20%D1%81%D0%BF%D0%BB%D0%B0%D0%B2" target="_blank" rel="noreferrer noopener" class="skin skin_in-case classified">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz52YOLkDyRufgHMAqVMY_Q3ywW4CHZ_-_hiWNu57oQJO12x49epbuV4aZ0RAcLWX6OGZA2puB1pgqUMLpWBoC671XngOD1ZCEG_rmMAkbDWvORp1mcIAy_njWgGDWs/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz52YOLkDyRufgHMAqVMY_Q3ywW4CHZ_-_hiWNu57oQJO12x49epbuV4aZ0RAcLWX6OGZA2puB1pgqUMLpWBoC671XngOD1ZCEG_rmMAkbDWvORp1mcIAy_njWgGDWs/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">M4A1-S</div>
                                                                  <div class="skin__name">Атомный сплав</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=MP9%20%7C%20%D0%9F%D0%B8%D1%89%D0%B5%D0%B2%D0%B0%D1%8F%20%D1%86%D0%B5%D0%BF%D1%8C" target="_blank" rel="noreferrer noopener" class="skin skin_in-case classified">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6r8FAR17P7YKAJE49Oyq4ODlv76DLfYkWNFppAp07zHoY_20ALg-EtrMm_ydYWSegU6ZljQ-Vbrx7u7hJ-5v8vOnSR9-n51oTWxmVM/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6r8FAR17P7YKAJE49Oyq4ODlv76DLfYkWNFppAp07zHoY_20ALg-EtrMm_ydYWSegU6ZljQ-Vbrx7u7hJ-5v8vOnSR9-n51oTWxmVM/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">MP9</div>
                                                                  <div class="skin__name">Пищевая цепь</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=Nova%20%7C%20%D0%90%D0%BD%D1%82%D0%B8%D0%BA%D0%B2%D0%B0%D1%80%D0%B8%D0%B0%D1%82" target="_blank" rel="noreferrer noopener" class="skin skin_in-case classified">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz51O_W0DzRyTQrNF6FhXfsu_Rn5DBg_7cNqQdr4rupWfFq6t9bFNeZ4ZNlIHMSEXfLXZV2v7U1t0aFeLpLYoH-53iy9OHBKBURi3EYcOg/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz51O_W0DzRyTQrNF6FhXfsu_Rn5DBg_7cNqQdr4rupWfFq6t9bFNeZ4ZNlIHMSEXfLXZV2v7U1t0aFeLpLYoH-53iy9OHBKBURi3EYcOg/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">Nova</div>
                                                                  <div class="skin__name">Антиквариат</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=%D0%A0%D0%B5%D0%B2%D0%BE%D0%BB%D1%8C%D0%B2%D0%B5%D1%80%20R8%20%7C%20%D0%9E%D1%82%D0%B1%D0%BE%D0%B9%D0%BD%D1%8B%D0%B9%20%D1%87%D0%B5%D1%80%D0%B5%D0%BF" target="_blank" rel="noreferrer noopener" class="skin skin_in-case classified">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopL-zJAt21uH3cih9_tmgm4ydkuXLPKvBhG5C-8pjteTE8YXghRrhrxBqam2iIYScIVVqMwqBrFe4xLvmgsC4u53OynBi63ImsC7UyhLjn1gSOZuhpeTj/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpopL-zJAt21uH3cih9_tmgm4ydkuXLPKvBhG5C-8pjteTE8YXghRrhrxBqam2iIYScIVVqMwqBrFe4xLvmgsC4u53OynBi63ImsC7UyhLjn1gSOZuhpeTj/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">Револьвер R8</div>
                                                                  <div class="skin__name">Отбойный череп</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=M4A4%20%7C%20%D0%9A%D0%BE%D0%B0%D0%BB%D0%B8%D1%86%D0%B8%D1%8F" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhnwMzFJTwW09-5lYyCg_77PYTdn2xZ_Isi27rF9N-k3g22rUBuMG3xI4WXd1NsMl-G-gDvlO--hZS7vsjKwHsypGB8solFJZ13/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhnwMzFJTwW09-5lYyCg_77PYTdn2xZ_Isi27rF9N-k3g22rUBuMG3xI4WXd1NsMl-G-gDvlO--hZS7vsjKwHsypGB8solFJZ13/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">M4A4</div>
                                                                  <div class="skin__name">Коалиция</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=AK-47%20%7C%20%D0%9A%D1%80%D0%BE%D0%B2%D0%B0%D0%B2%D1%8B%D0%B9%20%D1%81%D0%BF%D0%BE%D1%80%D1%82" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhnwMzJemkV0966m4-PhOf7Ia_um25V4dB8xO3Hpdn22lWxqUc9Zmr0J9XBIw89M1GGqFC8ybzvgMLvvJ6azSE1viM8pSGK5KY2J5A/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhnwMzJemkV0966m4-PhOf7Ia_um25V4dB8xO3Hpdn22lWxqUc9Zmr0J9XBIw89M1GGqFC8ybzvgMLvvJ6azSE1viM8pSGK5KY2J5A/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">AK-47</div>
                                                                  <div class="skin__name">Кровавый спорт</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=AK-47%20%7C%20%D0%9B%D0%B5%D0%B3%D0%B8%D0%BE%D0%BD%20%D0%90%D0%BD%D1%83%D0%B1%D0%B8%D1%81%D0%B0" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhjxszJemkV0924gYKChMj4OrzZgiUGv5wo3uuY8dr02lLn-0FsMGmgIdfEelU3Ml-G_VG9xOm7gZC87suf1zI97aiJAbeK/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhjxszJemkV0924gYKChMj4OrzZgiUGv5wo3uuY8dr02lLn-0FsMGmgIdfEelU3Ml-G_VG9xOm7gZC87suf1zI97aiJAbeK/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">AK-47</div>
                                                                  <div class="skin__name">Легион Анубиса</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=AK-47%20%7C%20%D0%98%D0%BC%D0%BF%D0%B5%D1%80%D0%B0%D1%82%D1%80%D0%B8%D1%86%D0%B0" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhnwMzJemkV09m7hJKOhOTLP7LWnn8f7p0gjrnDpdvxi1Xn80JqYGygLI_DdQJsMgyC_AO4xb_p0ce66ZXImmwj5Hei5N5mVw/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhnwMzJemkV09m7hJKOhOTLP7LWnn8f7p0gjrnDpdvxi1Xn80JqYGygLI_DdQJsMgyC_AO4xb_p0ce66ZXImmwj5Hei5N5mVw/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">AK-47</div>
                                                                  <div class="skin__name">Императрица</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=AWP%20%7C%20Wildfire" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FAR17PLfYQJV5dCykomZksj4OrzZgiUHucAi3OuQp4n33AG1-EpkYG-gcNSQIFdqM12B_1K4xu3og564tJvI1zI97WDk_mfS/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FAR17PLfYQJV5dCykomZksj4OrzZgiUHucAi3OuQp4n33AG1-EpkYG-gcNSQIFdqM12B_1K4xu3og564tJvI1zI97WDk_mfS/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">AWP</div>
                                                                  <div class="skin__name">Wildfire</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=Desert%20Eagle%20%7C%20%D0%9A%D0%BE%D0%B4%20%D0%BA%D1%80%D0%B0%D1%81%D0%BD%D1%8B%D0%B9" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposr-kLAtl7PTbTjlH7du6kb-KkPDmNqjCmXlu5Mx2gv2PoN3zjlbs_BVsYDimJNKWIQI4ZgzU_lC8l-28h5K6vJvOznZr7yYjsWGdwULr5DlSTQ/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposr-kLAtl7PTbTjlH7du6kb-KkPDmNqjCmXlu5Mx2gv2PoN3zjlbs_BVsYDimJNKWIQI4ZgzU_lC8l-28h5K6vJvOznZr7yYjsWGdwULr5DlSTQ/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">Desert Eagle</div>
                                                                  <div class="skin__name">Код красный</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=Glock-18%20%7C%20%D0%9A%D0%BE%D1%80%D0%BE%D0%BB%D0%B5%D0%B2%D0%B0%20%D0%BF%D1%83%D0%BB%D1%8C" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79fnzL-cluX5MrLVk2Vu5Mx2gv2P8dWsiQKyrxFoMGj3Io_BcwA6YFDSq1a6lLq91J7o6Z3MzHVhvHFz4GGdwUK867nN7w/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbaqKAxf0Ob3djFN79fnzL-cluX5MrLVk2Vu5Mx2gv2P8dWsiQKyrxFoMGj3Io_BcwA6YFDSq1a6lLq91J7o6Z3MzHVhvHFz4GGdwUK867nN7w/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">Glock-18</div>
                                                                  <div class="skin__name">Королева пуль</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=M4A1-S%20%7C%20Chantico%27s%20Fire" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhz2v_Nfz5H_uO1gb-Gw_alIITCmX5d_MR6j_v--InxgUG55RFtYTqiLY-UdVJrMF6DrAS3xe26gMDtv8jKmCNiv3EktH3enhO21xFSLrs4RMuJRwY/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhz2v_Nfz5H_uO1gb-Gw_alIITCmX5d_MR6j_v--InxgUG55RFtYTqiLY-UdVJrMF6DrAS3xe26gMDtv8jKmCNiv3EktH3enhO21xFSLrs4RMuJRwY/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">M4A1-S</div>
                                                                  <div class="skin__name">Chantico's Fire</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=M4A4%20%7C%20Royal%20Paladin" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhnwMzFJTwW0865jYGHqOTlJrLDk1Rc7cF4n-SP8dSm2gHk-UtoZGv7I9DBcVM5ZV_XqFe_lervhsS76sjIyCBhviYg52GdwUI8s6PzHQ/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhnwMzFJTwW0865jYGHqOTlJrLDk1Rc7cF4n-SP8dSm2gHk-UtoZGv7I9DBcVM5ZV_XqFe_lervhsS76sjIyCBhviYg52GdwUI8s6PzHQ/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">M4A4</div>
                                                                  <div class="skin__name">Royal Paladin</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=M4A4%20%7C%20%D0%A2%D0%B5%D0%BC%D1%83%D0%BA%D0%B0%D1%83" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhjxszFJTwW08izmZWAluLLP7LWnn8f6ZEgj-uZpY-i2Fe2qRY5Zj37INOQcVQ7MgzRrwDvwO7mgJLvtZ7BnWwj5Hel2Lkmow/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhjxszFJTwW08izmZWAluLLP7LWnn8f6ZEgj-uZpY-i2Fe2qRY5Zj37INOQcVQ7MgzRrwDvwO7mgJLvtZ7BnWwj5Hel2Lkmow/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">M4A4</div>
                                                                  <div class="skin__name">Темукау</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=MP7%20%7C%20Bloodsport" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6ryFABz7P7YJgJA4NO5kJObmOXgDLfYkWNFpsRz3-qSpdis2AW3rhFvYWn3LISSdgRsYVzR8lC7lOm9gMO_786bwHd9-n51Z2R5ZH4/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou6ryFABz7P7YJgJA4NO5kJObmOXgDLfYkWNFpsRz3-qSpdis2AW3rhFvYWn3LISSdgRsYVzR8lC7lOm9gMO_786bwHd9-n51Z2R5ZH4/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">MP7</div>
                                                                  <div class="skin__name">Bloodsport</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=%D0%9F%D0%9F-19%20%D0%91%D0%B8%D0%B7%D0%BE%D0%BD%20%7C%20Judgement%20of%20Anubis" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpotLO_JAlf0Ob3czRY49KJl5WZhPLLPr7Vn35cpp0gjL_D8IimiwW2qEFkYj2hcNWScVVvYw2FrFK2wOy908K6uJjLnSN9-n51hHwx8BM/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpotLO_JAlf0Ob3czRY49KJl5WZhPLLPr7Vn35cpp0gjL_D8IimiwW2qEFkYj2hcNWScVVvYw2FrFK2wOy908K6uJjLnSN9-n51hHwx8BM/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">ПП-19 Бизон</div>
                                                                  <div class="skin__name">Judgement of Anubis</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=Sawed-Off%20%7C%20%D0%9A%D1%80%D0%B0%D0%BA%D0%B5%D0%BD" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz5oNfSwNDhhdDvBFJ9NXeI_8AfqDxg969NsRMK754QLLFi28d_YYLQkMYxJHseDU6LVYg-u6k9u0qcMfZKPpny92yntaGcIX0bp_2lXnPjH5OVxmQ2QIw/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz5oNfSwNDhhdDvBFJ9NXeI_8AfqDxg969NsRMK754QLLFi28d_YYLQkMYxJHseDU6LVYg-u6k9u0qcMfZKPpny92yntaGcIX0bp_2lXnPjH5OVxmQ2QIw/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">Sawed-Off</div>
                                                                  <div class="skin__name">Кракен</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=USP-S%20%7C%20%D0%A3%D0%B1%D0%B8%D0%B9%D1%81%D1%82%D0%B2%D0%BE%20%D0%BF%D0%BE%D0%B4%D1%82%D0%B2%D0%B5%D1%80%D0%B6%D0%B4%D0%B5%D0%BD%D0%BE" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09-jq5WYh8j_OrfdqWhe5sN4mOTE8bP4jVC9vh5yYGr7IoWVdABrYQ3Y-1m8xezp0ZTtvpjNmHpguCAhtnndzRW10x9KOvsv26KUE4Zjjg/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09-jq5WYh8j_OrfdqWhe5sN4mOTE8bP4jVC9vh5yYGr7IoWVdABrYQ3Y-1m8xezp0ZTtvpjNmHpguCAhtnndzRW10x9KOvsv26KUE4Zjjg/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">USP-S</div>
                                                                  <div class="skin__name">Убийство подтверждено</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=USP-S%20%7C%20The%20Traitor" target="_blank" rel="noreferrer noopener" class="skin skin_in-case covert">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09ulq5WYh-TLO7rfkW5V5cR_teXI8oThxlXk-ktlYz-ncdSdcQU7ZVvXrge5kLjpg5K97ZqbzSRl7yJ0tiyMnBGpwUYbVyFdYQE/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09ulq5WYh-TLO7rfkW5V5cR_teXI8oThxlXk-ktlYz-ncdSdcQU7ZVvXrge5kLjpg5K97ZqbzSRl7yJ0tiyMnBGpwUYbVyFdYQE/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">USP-S</div>
                                                                  <div class="skin__name">The Traitor</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=%E2%98%85%20%D0%A8%D1%82%D1%8B%D0%BA-%D0%BD%D0%BE%D0%B6%20%7C%20%D0%97%D1%83%D0%B1%20%D1%82%D0%B8%D0%B3%D1%80%D0%B0" target="_blank" rel="noreferrer noopener" class="skin skin_in-case rare">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpotLu8JAllx8zJfwJW5duzhr-Ehfb6NL7ummJW4NE_3bGR84qmiQHsr0NtMm7wcILBdVI5ZF2BrgPqkr_rg5K0v8nIyiQy7D5iuyj6nUSP2A/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpotLu8JAllx8zJfwJW5duzhr-Ehfb6NL7ummJW4NE_3bGR84qmiQHsr0NtMm7wcILBdVI5ZF2BrgPqkr_rg5K0v8nIyiQy7D5iuyj6nUSP2A/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">★ Штык-нож</div>
                                                                  <div class="skin__name">Зуб тигра</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=%E2%98%85%20%D0%A4%D0%B0%D0%BB%D1%8C%D1%88%D0%B8%D0%BE%D0%BD%20%7C%20%D0%97%D1%83%D0%B1%20%D1%82%D0%B8%D0%B3%D1%80%D0%B0" target="_blank" rel="noreferrer noopener" class="skin skin_in-case rare">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpovbSsLQJf1fLEcjVL49KJlY60g_7zNqnumXlQ5sJ0teXI8oThxlfg_UQ_NmGlI4WdJlI3MwuF8gLqxr-5gJK6vZ2fwHNrvHRzsSvemRepwUYbfQ7bq_U/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpovbSsLQJf1fLEcjVL49KJlY60g_7zNqnumXlQ5sJ0teXI8oThxlfg_UQ_NmGlI4WdJlI3MwuF8gLqxr-5gJK6vZ2fwHNrvHRzsSvemRepwUYbfQ7bq_U/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">★ Фальшион</div>
                                                                  <div class="skin__name">Зуб тигра</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                                  <div class="items-incase__item">
                                                      <a href="https://market.csgo.com/?search=%E2%98%85%20%D0%A1%D0%BF%D0%BE%D1%80%D1%82%D0%B8%D0%B2%D0%BD%D1%8B%D0%B5%20%D0%BF%D0%B5%D1%80%D1%87%D0%B0%D1%82%D0%BA%D0%B8%20%7C%20%D0%9E%D0%BC%D0%B5%D0%B3%D0%B0" target="_blank" rel="noreferrer noopener" class="skin skin_in-case rare">
                                                          <div class="skin__content">
                                                              <img src="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DAQ1JmMR1osbaqPQJz7ODYfi9W9eO0mIGInMjjNrnTn2VW19x0huXO4rP5gVO8v11pN26hJYaUJ1Q5aV_VqVW_kri5gJ7pvMuYySFjsnEm7CnanBW00x1McKUx0jX7Ty6x/140fx105f/image.png" srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DAQ1JmMR1osbaqPQJz7ODYfi9W9eO0mIGInMjjNrnTn2VW19x0huXO4rP5gVO8v11pN26hJYaUJ1Q5aV_VqVW_kri5gJ7pvMuYySFjsnEm7CnanBW00x1McKUx0jX7Ty6x/260fx194f/image.png 2x" class="skin__img">
                                                              <div class="skin__info">
                                                                  <div class="skin__type">★ Спортивные перчатки</div>
                                                                  <div class="skin__name">Омега</div>
                                                              </div>
                                                          </div>
                                                      </a>
                                                  </div>

                                              </div>
                                          </div> !-->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
    </div>

