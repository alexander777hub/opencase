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
\app\assets\JQAsset::register($this);
$script = <<< JS
   $(document).ready(function(){
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
   
JS;
$this->registerJs($script);
/*$best_drop = User::getUser(Yii::$app->user->getId())->getProfile()->getBestDrop($dataProvider);
$best_drop_price = $best_drop && isset($best_drop['price']) ? $best_drop['price'] : '';
$best_drop_case_name = $best_drop && isset($best_drop['case_id']) ? \app\modules\mng\models\Opening::getCaseName($best_drop['case_id']) : '';

$best_photo = $best_drop ? User::getUser(Yii::$app->user->getId())->getProfile()->getBestDropPhoto($best_drop) : '';

$best_drop_name =  $best_drop ? User::getUser(Yii::$app->user->getId())->getProfile()->getBestDropName($best_drop) : ''; */

?>
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
                            <div class="user-balance-block__title">Баланс</div>
                            <div class="user-balance-block__numbers">
                                <div class="user-balance-block__fiat"><span class="price price-RUB"><?= User::getUser(Yii::$app->user->getId())->getProfile()->credit ? User::getUser(Yii::$app->user->getId())->getProfile()->credit : '0.00' ?></span></div>
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
                <?php if(\app\models\User::getUser(Yii::$app->user->getId())->getProfile()->getFavoritCase()):   ?>
                <div class="profile__favorite-case">
                    <div class="profile__sub-title profile__favorite-case-title">Любимый кейс</div>

                    <a style="margin-top: 0px;" href="#" class="profile__favorite-case-item">
                        <img src=<?= \app\models\User::getUser(Yii::$app->user->getId())->getProfile()->getFavoritCasePhoto()   ?> class="case-image">
                    </a>
                    <div class="profile__favorite-case-label-value">
                        <div class="profile__favorite-case-value"> <?= \app\models\User::getUser(Yii::$app->user->getId())->getProfile()->getFavoritCase()   ?></div>
                        <div class="profile__favorite-case-label">Количество открытий: 1</div>
                    </div>
                </div>
                   <!--Лучший дроп тут  !-->
                <?php  endif;  ?>

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

                          <?php     if($dataProvider && $dataProvider->getModels()): ?>
                          <div class="items-block__grid">
                              <div class="grid">
                                  <div class="grid__items">
                                      <?php echo \yii\widgets\ListView::widget([
                                          'dataProvider' => $dataProvider,
                                          'itemView' => '_item',
                                          'layout' => "{items}",
                                          'itemOptions' => ['class' => 'grid__item'],
                                          'options' => [
                                              'style' => 'display: grid;
                                              grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
                                              grid-auto-flow: row;
                                               grid-column-gap: 10px;
                                                grid-row-gap: 10px
                                        
                                              ',
                                          ],
                                          'viewParams'=>['profile'=>$model],
                                          'pager' => [
                                              'firstPageLabel' => 'first',
                                              'lastPageLabel' => 'last',
                                              'nextPageLabel' => 'next',
                                              'prevPageLabel' => 'previous',
                                              'maxButtonCount' => 3,
                                          ],

                                      ]); ?>






                                  </div>
                              </div>
                          </div>

                          <?php     else: ?>

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

                          <?php     endif; ?>
                      </div>
                  </div>





              </div>
          </div>
    </div>

