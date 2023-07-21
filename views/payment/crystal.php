<?php

use yii\bootstrap4\ActiveForm;


/**
 * @var yii\web\View $this
 * @var  \app\models\PayokOrder $model
 *
 */


?>


<div class="refill-page__content">
    <div class="refill-page__sections">
        <div class="refill-page__section">
            <div class="refill-page-methods">

                <div class="refill-page-methods__country">
                    <div class="refill-page-methods__country-label">Показаны все методы оплаты для:</div>
                    <div class="refill-page-methods__country-selector">
                        <div class="country-selector">
                            <div class="lng-switcher lng-switcher_country js-country-dropdown">

                                <img class="lng-switcher__flag" src="/public/img/flags/countries/ru.svg?v=9">

                                <div class="lng-switcher__all">
                                    <div class="lng-switcher__inner">
                                        <div class="lng-switcher__item" action="showAllPayMethods">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/other.svg?v=9">
                                            Все методы оплаты
                                        </div>

                                        <div class="lng-switcher__item" seo-country="ar" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/ar.svg?v=9">
                                            Argentina
                                        </div>

                                        <div class="lng-switcher__item" seo-country="am" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/am.svg?v=9">
                                            Armenia
                                        </div>

                                        <div class="lng-switcher__item" seo-country="at" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/at.svg?v=9">
                                            Austria
                                        </div>

                                        <div class="lng-switcher__item" seo-country="az" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/az.svg?v=9">
                                            Azerbaijan
                                        </div>

                                        <div class="lng-switcher__item" seo-country="by" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/by.svg?v=9">
                                            Belarus
                                        </div>

                                        <div class="lng-switcher__item" seo-country="be" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/be.svg?v=9">
                                            Belgium
                                        </div>

                                        <div class="lng-switcher__item" seo-country="br" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/br.svg?v=9">
                                            Brazil
                                        </div>

                                        <div class="lng-switcher__item" seo-country="bg" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/bg.svg?v=9">
                                            Bulgaria
                                        </div>

                                        <div class="lng-switcher__item" seo-country="cl" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/cl.svg?v=9">
                                            Chile
                                        </div>

                                        <div class="lng-switcher__item" seo-country="cn" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/cn.svg?v=9">
                                            China
                                        </div>

                                        <div class="lng-switcher__item" seo-country="co" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/co.svg?v=9">
                                            Colombia
                                        </div>

                                        <div class="lng-switcher__item" seo-country="hr" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/hr.svg?v=9">
                                            Croatia
                                        </div>

                                        <div class="lng-switcher__item" seo-country="cy" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/cy.svg?v=9">
                                            Cyprus
                                        </div>

                                        <div class="lng-switcher__item" seo-country="cz" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/cz.svg?v=9">
                                            Czech Republic
                                        </div>

                                        <div class="lng-switcher__item" seo-country="dk" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/dk.svg?v=9">
                                            Denmark
                                        </div>

                                        <div class="lng-switcher__item" seo-country="ec" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/ec.svg?v=9">
                                            Ecuador
                                        </div>

                                        <div class="lng-switcher__item" seo-country="eg" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/eg.svg?v=9">
                                            Egypt
                                        </div>

                                        <div class="lng-switcher__item" seo-country="ee" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/ee.svg?v=9">
                                            Estonia
                                        </div>

                                        <div class="lng-switcher__item" seo-country="fi" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/fi.svg?v=9">
                                            Finland
                                        </div>

                                        <div class="lng-switcher__item" seo-country="fr" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/fr.svg?v=9">
                                            France
                                        </div>

                                        <div class="lng-switcher__item" seo-country="de" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/de.svg?v=9">
                                            Germany
                                        </div>

                                        <div class="lng-switcher__item" seo-country="hu" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/hu.svg?v=9">
                                            Hungary
                                        </div>

                                        <div class="lng-switcher__item" seo-country="id" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/id.svg?v=9">
                                            Indonesia
                                        </div>

                                        <div class="lng-switcher__item" seo-country="ie" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/ie.svg?v=9">
                                            Ireland
                                        </div>

                                        <div class="lng-switcher__item" seo-country="it" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/it.svg?v=9">
                                            Italy
                                        </div>

                                        <div class="lng-switcher__item" seo-country="jp" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/jp.svg?v=9">
                                            Japan
                                        </div>

                                        <div class="lng-switcher__item" seo-country="kz" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/kz.svg?v=9">
                                            Kazakhstan
                                        </div>

                                        <div class="lng-switcher__item" seo-country="kw" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/kw.svg?v=9">
                                            Kuwait
                                        </div>

                                        <div class="lng-switcher__item" seo-country="kg" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/kg.svg?v=9">
                                            Kyrgyzstan
                                        </div>

                                        <div class="lng-switcher__item" seo-country="lv" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/lv.svg?v=9">
                                            Latvia
                                        </div>

                                        <div class="lng-switcher__item" seo-country="lt" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/lt.svg?v=9">
                                            Lithuania
                                        </div>

                                        <div class="lng-switcher__item" seo-country="my" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/my.svg?v=9">
                                            Malaysia
                                        </div>

                                        <div class="lng-switcher__item" seo-country="mt" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/mt.svg?v=9">
                                            Malta
                                        </div>

                                        <div class="lng-switcher__item" seo-country="mx" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/mx.svg?v=9">
                                            Mexico
                                        </div>

                                        <div class="lng-switcher__item" seo-country="md" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/md.svg?v=9">
                                            Moldova
                                        </div>

                                        <div class="lng-switcher__item" seo-country="nl" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/nl.svg?v=9">
                                            Netherlands
                                        </div>

                                        <div class="lng-switcher__item" seo-country="no" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/no.svg?v=9">
                                            Norway
                                        </div>

                                        <div class="lng-switcher__item" seo-country="pe" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/pe.svg?v=9">
                                            Peru
                                        </div>

                                        <div class="lng-switcher__item" seo-country="ph" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/ph.svg?v=9">
                                            Philippines
                                        </div>

                                        <div class="lng-switcher__item" seo-country="pl" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/pl.svg?v=9">
                                            Poland
                                        </div>

                                        <div class="lng-switcher__item" seo-country="pt" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/pt.svg?v=9">
                                            Portugal
                                        </div>

                                        <div class="lng-switcher__item" seo-country="ro" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/ro.svg?v=9">
                                            Romania
                                        </div>

                                        <div class="lng-switcher__item" seo-country="ru" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/ru.svg?v=9">
                                            Russian Federation
                                        </div>

                                        <div class="lng-switcher__item" seo-country="sa" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/sa.svg?v=9">
                                            Saudi Arabia
                                        </div>

                                        <div class="lng-switcher__item" seo-country="sk" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/sk.svg?v=9">
                                            Slovakia
                                        </div>

                                        <div class="lng-switcher__item" seo-country="si" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/si.svg?v=9">
                                            Slovenia
                                        </div>

                                        <div class="lng-switcher__item" seo-country="es" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/es.svg?v=9">
                                            Spain
                                        </div>

                                        <div class="lng-switcher__item" seo-country="se" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/se.svg?v=9">
                                            Sweden
                                        </div>

                                        <div class="lng-switcher__item" seo-country="ch" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/ch.svg?v=9">
                                            Switzerland
                                        </div>

                                        <div class="lng-switcher__item" seo-country="tj" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/tj.svg?v=9">
                                            Tajikistan
                                        </div>

                                        <div class="lng-switcher__item" seo-country="th" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/th.svg?v=9">
                                            Thailand
                                        </div>

                                        <div class="lng-switcher__item" seo-country="tr" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/tr.svg?v=9">
                                            Turkey
                                        </div>

                                        <div class="lng-switcher__item" seo-country="ua" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/ua.svg?v=9">
                                            Ukraine
                                        </div>

                                        <div class="lng-switcher__item" seo-country="ae" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/ae.svg?v=9">
                                            United Arab Emirates
                                        </div>

                                        <div class="lng-switcher__item" seo-country="gb" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/gb.svg?v=9">
                                            United Kingdom
                                        </div>

                                        <div class="lng-switcher__item" seo-country="us" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/us.svg?v=9">
                                            United States
                                        </div>

                                        <div class="lng-switcher__item" seo-country="uy" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/uy.svg?v=9">
                                            Uruguay
                                        </div>

                                        <div class="lng-switcher__item" seo-country="uz" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/uz.svg?v=9">
                                            Uzbekistan
                                        </div>

                                        <div class="lng-switcher__item" seo-country="vn" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/vn.svg?v=9">
                                            Vietnam
                                        </div>

                                        <div class="lng-switcher__item" seo-country="other" action="changeUserCountry">
                                            <img class="lng-switcher__flag" src="/public/img/flags/countries/other.svg?v=9">
                                            Other
                                        </div>

                                    </div>
                                </div>
                                <div class="lng-switcher__country">























































































                                    Russian Federation





































                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="refill-page-methods__items">
                    <div class="payment-systems">


                        <div class="payment-systems__payment" seo-paymethod="card">
                            <img src="https://payok.io/files/image/logo_black.svg" alt="">
                        </div>

                        <div class="payment-systems__payment active" seo-paymethod="card">
                            <a  href="/payment/crystal">
                                <img src="/uploads/payment/crystal.png" alt="">
                            </a>

                        </div>

                        <div class="payment-systems__payment" seo-paymethod="qiwi" action="choosePayMethod">
                            <img src="https://images.steamcdn.io/shared/pay_methods/qiwi.svg" alt="">
                        </div>




                        <!--        <div class="payment-systems__payment" seo-paymethod="sberbank" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/sberbank.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="qiwi" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/qiwi.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="yandex" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/yandex.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="skinpay" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/skinpay_new.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="skinsback" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/skinsback_new.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="googlepay" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/googlepay.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="applepay" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/applepay.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="skinify" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/skinify_new.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="paypal" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/paypal.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="ethereum" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/ethereum.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="bitcoin" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/bitcoin.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="tron" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/tron.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="tether_trc20" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/tether_trc20_v3.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="tether" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/tether_erc20_v3.svg" alt="">
                                </div>



                                <div class="payment-systems__payment" seo-paymethod="g2acard" action="choosePayMethod">
                                    <img src="https://images.steamcdn.io/shared/pay_methods/g2a_card_v2.svg" alt="">
                                </div> !-->


                    </div>
                </div>
                <!--  <form name="refill" method="POST" class="payments-form" action="https://pay.gmpays.com/api/terminal/create">
                      <input type="hidden" name="project" value="7">
                      <input type="hidden" name="user" value="1564662855">
                      <input type="hidden" name="add_steam_id" value="76561199524928583">
                      <input type="hidden" name="comment" value="Adding funds to account balance №4666219 (https://forcedrop.gg/)">
                      <input type="hidden" name="currency" value="RUB">
                      <input type="hidden" name="language" value="ru">
                      <input type="hidden" name="success_url" value="https://forcedrop.app/">
                      <input type="hidden" name="fail_url" value="https://forcedrop.app/">
                      <input type="hidden" name="terminal_allow_methods[]" value="">
                      <input type="hidden" name="amount" value="">
                      <input type="hidden" name="project_invoice" value="">
                      <input type="hidden" name="signature" value="">
                  </form> !-->



                <div class="refill-page-methods__info">
                    <p>Для пополнения баланса вы будете перемещены на сайт платёжной системы.</p>
                    <p>Баланс пополняется моментально, но, если этого не произошло в течение часа, напишите нам на почту <a target="_blank" rel="noreferrer noopener" href="#" class="link">supp.updrop23@gmail.com</a>, указав подробные данные платежа.</p>
                </div>
            </div>
        </div>
        <div class="refill-page__section">
            <?php  $form = ActiveForm::begin([
                'id' => 'payok-form',
                'method' => 'post',
                'options' => ['class' => 'refill-page__section'],
                'enableAjaxValidation' => false,
                //   'enableClientValidation' => true,
                'validateOnBlur' => true,
                'validateOnType' => true,
                'validateOnChange' => true,
                'fieldConfig' => [
                    'template' => "{beginWrapper}\n{input}\n{label}\n{hint}\n{error}\n{endWrapper}",
                    'options' => [
                        'class' => 'form-wrap form-wrap-icon',
                    ],
                    'inputOptions' => [
                        'class' => 'form-input'
                    ],
                    'labelOptions' => [
                        'class' => 'form-label'
                    ],
                ]
            ]) ?>
            <?= $form->errorSummary($model) ?>
            <div class="refill-page-form">

                <div class="refill-page-form__method">
                    <div class="refill-page-method">
                        <div class="refill-page-method__info">
                            <div class="refill-page-method__label">Выбранный метод оплаты</div>
                            <div class="refill-page-method__value">CARD</div>
                        </div>
                        <div class="refill-page-method__img">
                            <img src="https://images.steamcdn.io/shared/pay_methods/card_v2.svg">
                        </div>
                    </div>
                </div>



                <div class="refill-page-form__alert">
                    <div class="alert alert_min icon icon_alert">
                        <div class="alert__content">Минимальная сумма: <b>25 RUB</b></div>
                    </div>
                </div>



                <div class="refill-page-form__field">
                    <div class="refill-page-form__label">Введите сумму (RUB)</div>
                    <div class="refill-page-form__input refill-page-form__input_sum">
                        <?= $form->field($model, 'amount',[
                            'template' => "{beginWrapper}\n{input}\n{label}\n{hint}\n{error}\n<div class=\"icon form-icon mdi mdi-account-outline\"></div>{endWrapper}"
                        ])->input('numerical'); ?>
                    </div>
                </div>


                <div class="refill-page-form__field">
                    <div class="refill-page-form__label">Оставь свой email и получай "секретный бонус" каждую неделю</div>
                    <div class="refill-page-form__input refill-page-form__input_mail">
                        <?= $form->field($model, 'email',[
                            'template' => "{beginWrapper}\n{input}\n{label}\n{hint}\n{error}\n<div class=\"icon form-icon mdi mdi-account-outline\"></div>{endWrapper}"
                        ])->textInput(); ?>
                    </div>
                </div>


                <!--    <div class="refill-page-form__sum">
                        <div class="refill-page-form__sum-label">Вы получите на баланс</div>
                        <div class="refill-page-form__sum-value price price-RUB">0</div>
                    </div> !-->


                <div class="refill-page-form__checkbox">
                    <div class="checkbox checkbox_terms">
                        <input name="terms" type="checkbox" id="terms_refill">
                        <label for="terms_refill">
                            <span class="checkbox__square"></span>
                            <span class="checkbox__text">
												Я принимаю условия <a href="/agreement" target="_blank" rel="noreferrer noopener" class="link">Пользовательского Соглашения</a>
											</span>
                        </label>
                    </div>
                </div>
                <div class="refill-page-form__btn">
                    <?=  \yii\helpers\Html::button('Пополнить баланс', ['type'=>'submit',
                        'class' => 'btn btn_color-success btn_size-big btn_type-fullwidth btn_uppercase',
                        'id'=> 'trade-save',
                        // 'style' => 'background-color: #7ed321;'


                    ]) ?>
                    <!--       <button class="btn btn_color-success btn_size-big btn_type-fullwidth btn_uppercase" action="refill" disabled="true">
                                               <span class="btn__content">
                                                   <span class="btn__label">Пополнить баланс</span>


                                               </span>
                           </button> !-->
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>

