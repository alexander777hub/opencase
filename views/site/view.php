<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Profile;
use app\models\Ad;
use app\models\Userform;

/* @var $this yii\web\View */
/* @var $model \app\modules\mng\models\Opening */


$user = null;

if(!Yii::$app->user->isGuest){
    $user = Profile::find()->where(['user_id'=> Yii::$app->user->id])->one();
} else {
    $img_array = '';
    $rand_expensive = '';
}
?>


<script
        src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script>
<script type="text/javascript">



    $(document).ready(function(){
        let img_array = '<?= $img_array    ?>';
        let img_object = JSON.parse(img_array);
        let case_price = '<?= $model->price   ?>';
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
            $("#open").on("click", function(){

                if($(this).hasClass('noclick')){
                    return;
                }
                reset();
                generate();
               /* $(".case-page__btns").empty();
                var html = '<div class="case-page__btn">' +
                    '<button class="btn btn_size-big btn_word-wrap btn_color-success btn_uppercase btn_type-fullwidth refill">' +
                    '<div class="btn__content">' +
                    '<div class="btn__label">Попробовать еще </div>' +
                    '</div>' +
                    '</button>' +
                    '</div>' +
                    '<div class="case-page__btn">' +
                    '<button class="btn btn_size-big btn_word-wrap btn_color-primary btn_uppercase btn_type-fullwidth">' +
                        '<div class="btn__content">' +
                            '<div class="btn__label">Не хватает <i class="price price-RUB">78.46</i></div>' +
                        '</div>' +
                    '</button>' +
                '</div>';
                $(".case-page__btns").html(html); */

                var case_id = "<?= $model ?  $model->id : null ?>";
                console.log("OPEN", case_id);

                $.ajax({
                    url: "/mng/case/open",

                    type: "post",
                    data:  {
                        case_id : case_id,
                    },
                    beforeSend: function() {
                        $('.raffle-roller-container').css({
                            transition: "all 8s cubic-bezier(.08,.6,0,1)"
                        });
                        $('.raffle-roller-container').animate({marginLeft: "-=1000px"}, 10000);
                    },

                    success: function (response) {
                        console.log(response, "RESPONSE");
                        $('.raffle-roller-container').stop();
                        goRoll(response.market_hash_name, response.icon_url, response.is_cheap, response.price);
                    //  $('#rolled').html(response.market_hash_name);
                        //$('#win-item').remove();

                        $("#append-credit").empty();
                        $("#append-credit").text(response.credit);

                        if(response.credit < case_price){
                            $("#open-inner").empty();
                            $("#open-inner").html('<div class="btn__label"><a href="/payment/index">Пополнить баланс</a></div>');
                            $("#open").addClass('noclick');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });

        function generate() {
            let len = 0;
            while (len < 101){
                $.each(img_object, function(key,val) {
                    var jsClass = '';
                    switch (key){
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
                    var element = '<div data-name="' + key +'" id="CardNumber'+len+'" class="item'
                        + ' ' + jsClass+'" style="background-image:url('+val+');"></div>';

                    $(element).appendTo('.raffle-roller-container');
                    len++;
                });
            }
        }
        function reset(){
            var html = '<div class="raffle-roller">' +
                '<div class="raffle-roller-holder">' +
                '<div class="raffle-roller-container" style="margin-left: 0px;">' +
                '</div>' +
                '</div>' +
                '</div>';

            $(".case-page__roulette").empty();
            $(".case-page__roulette").html(html);
        }
    function goRoll(skin, skinimg, is_cheap, price) {

             if(is_cheap == 1){
                 let rand_expensive = '<?=  $rand_expensive  ?>';
                console.log(rand_expensive, "RAND");
                 var html = '<div id="CardNumber77" class="item" style="background-image:url('+rand_expensive+');"></div>';
                 $("#CardNumber77").css("background-image", "url(" + rand_expensive + ")");
                 //background-color: #bf161c;
                 $("#CardNumber77").css("background-color", "#bf161c");
             }

             $('.raffle-roller-container').css({
                 transition: "all 8s cubic-bezier(.08,.6,0,1)"
             });
             $('#CardNumber78').css({
                 "background-image": "url("+skinimg+")"
             });

             $('.raffle-roller-container').animate({marginLeft: "-=6590px"}, 3000, function(){

             });

        setTimeout(function() {
            $('#rolled').html('<p>' + skin +'</p><br>Цена: ' + price + 'Р');
            $('#CardNumber78').addClass('winning-item');
        }, 10000);
    }
    });

</script>
<style>
    @import url('https://fonts.googleapis.com/css?family=Arvo');
    .raffle-roller {
        height: 100px;
        position: relative;
        margin: 60px auto 30px auto;
        width: 900px;
    }
    .raffle-roller-holder {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        height: 100px;
        width: 100%;
    }
    .raffle-roller-holder {
        overflow: hidden;
        border-radius: 2px;
        border: 1px solid #3c3759;
    }
    .raffle-roller-holder {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        height: 100px;
        width: 100%;
    }
    .raffle-roller-container {
        width: 9999999999999999999px;
        max-width: 999999999999999999px;
        height: 100px;
        background: #191726;
        margin-left: 0;
        transition: all 8s cubic-bezier(.08,.6,0,1);
    }
    .raffle-roller-holder:before {
        content: "";
        position: absolute;
        border: none;
        z-index: 12222225;
        width: 5px;
        height: 100%;
        left: 50%;
        background: #d16266;
    }
    .item {
        display: inline-block;
        float: left;
        margin: 4px 0px 0.5px 5px;
        width: 85px;
        height: 88px;
        float: left;
        border: 1px solid #70677c;


        background-size: 100%;
        background-repeat: no-repeat;
        background-position: center;
    }
    .class_red_item {
        border-bottom: 4px solid #EB4B4B;
    }
    img {
        border: 0;
        vertical-align: middle;
    }
    .winning-item {
        border: 2px solid #66b233;
        position: relative;
        top: -1px;
        border-bottom: 4px solid #66b233;
    }
    .inventory {
        margin: 0 auto;
        width: 960px;
        max-width: 953px;
        padding: 10px 15px 6px;
        height: auto;
        border: 2px solid #1c3344;
        background: #0e1a23;
    }
    .inventory > .item {
        float: none;
        cursor: pointer;
        margin: 4px 2px 0.5px 2px;
    }
    .inventory > .item:hover {
        background-size: 90%;
        background-color: #182a38;
    }
    .inventory > .item:active {
        height: 83px;
        width: 80px;
        position: relative;
        top: -2px;
        border: 2px solid #356d27;
        border-bottom: 4px solid #356d27;
    }
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

</style>

<style>

    #modal-winner {
        display: block;
    }
    .modal-open .modal {
        overflow-x: hidden;
        overflow-y: auto;
    }
    .fade.show {
        opacity: 1;
    }
    .modal {
        z-index: 1072;
    }

    .modal-dialog {
        background-color: white;


        margin: 20%;
        margin-bottom: 20%;
        margin-top: 10%;
        margin-bottom: 20px;
        height: auto;
    }

    .modal {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1050;
        display: none;
        overflow: hidden;
        outline: 0;
    }
    .fade {
        opacity: 0;
        transition: opacity .15s linear;
    }

    .modal-footer {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
        padding: 6rem;
        border-top: 1px solid #e9ecef;
    }

    .modal-body {
        position: relative;
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1rem;
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
<div id="append">

</div>



<div class="case-page">

    <div class="case-page__title">
        <div class="new-title new-title_bigger">
            <div class="new-title__text"><?= $model->name   ?></div>
        </div>
    </div>

    <div class="case-page__fav">
        <div class="case-page-fav btn btn_size-fill btn_transparent btn_with-icon btn_no-padding">
            <div class="btn__content" action="switchFavorite">
                <div class="case-page-fav__icon btn__icon icon icon_fav"></div>
                <div class="case-page-fav__label btn__label">

                </div>
            </div>
        </div>
    </div>
    <center><span  id="win" style="font-size: 25px;"> <span style="
    color: green;" id="rolled"></span></span></center>
<br>

    <div class="case-page__roulette">
        <div class="roulette roulette_awaiting">
            <div class="roulette__pre-pre-frame">
                <div class="roulette__pre-frame">
                    <div class="roulette__frame">
                        <div class="roulette__case">
                            <img src=<?= $model && $model->avatar_id ? \app\modules\mng\models\Opening::getOriginal($model->avatar_id)  : "https://images.steamcdn.io/forcedrop/cases/summerrrrr.png"  ?> alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="case-page__actions">
        <div class="buttons-incase">

            <div class="farmcase-picker">

                <div class="farmcase-picker__btn farmcase-amount active" data-farmamount="1"><span>x1</span></div>

                <div class="farmcase-picker__btn farmcase-amount" data-farmamount="2"><span>x2</span></div>

                <div class="farmcase-picker__btn farmcase-amount" data-farmamount="3"><span>x3</span></div>

                <div class="farmcase-picker__btn farmcase-amount" data-farmamount="4"><span>x4</span></div>

                <div class="farmcase-picker__btn farmcase-amount" data-farmamount="5"><span>x5</span></div>

                <div class="farmcase-picker__btn farmcase-amount" data-farmamount="6"><span>x6</span></div>

                <div class="farmcase-picker__btn farmcase-amount" data-farmamount="7"><span>x7</span></div>

                <div class="farmcase-picker__btn farmcase-amount" data-farmamount="8"><span>x8</span></div>

                <div class="farmcase-picker__btn farmcase-amount" data-farmamount="9"><span>x9</span></div>

                <div class="farmcase-picker__btn farmcase-amount" data-farmamount="10"><span>x10</span></div>

            </div>


            <div class="case-page__btns">
                <?php if($user && $user->credit >= $model->price): ?>
                <div class="case-page__btn">
                    <button id="open" class="btn btn_size-big btn_word-wrap btn_color-success btn_uppercase btn_type-fullwidth refill">
                        <div id="open-inner" class="btn__content">
                            <div class="btn__label">Открыть</div>
                        </div>
                    </button>
                </div>
                <?php else: ?>
                    <div class="case-page__btns">
                        <div class="case-page__btn">
                            <?php  if(!Yii::$app->user->isGuest): ?>
                            <button class="btn btn_size-big btn_word-wrap btn_color-success btn_uppercase btn_type-fullwidth refill">

                                    <div class="btn__content">

                                        <div class="btn__label"><a href="/payment/index">Пополнить баланс</a></div>

                                    </div>

                            </button>
                            <?php  endif; ?>
                        </div>


                    </div>
                <?php endif; ?>
                <!--  <div class="case-page__btn">
                      <button class="btn btn_size-big btn_word-wrap btn_color-success btn_uppercase btn_type-fullwidth" disabled="">
                          <div class="btn__content">
                              <div class="btn__label">Не хватает <i class="price price-RUB">87.39</i></div>
                          </div>
                      </button>
                  </div>
                  <div class="case-page__btn">
                      <button class="btn btn_size-big btn_word-wrap btn_color-success btn_uppercase btn_type-fullwidth refill">
                          <div class="btn__content">
                              <div class="btn__label">Пополнение баланса</div>
                          </div>
                      </button>
                  </div>  !-->


        </div>
        </div>

        <div class="case-page__info">
            <!--<div class="info-section info-section_light">
                <div class="info-section__top">
                    <div class="info-section__icon info-section__icon_limit"></div>
                    <div class="info-section__title">Ограниченная серия — 32150 / 35000!</div>
                    <div class="info-section__text">Кейс станет недоступен, как только закончится лимит!</div>
                </div>
            </div> !-->
        </div>


    </div>


    <div class="case-page__items">
        <div class="case-items">
            <div class="case-items__title">
                <div class="new-title new-title_bigger">
                    <div class="new-title__text">Содержимое кейса</div>
                </div>
            </div>
            <div class="case-items__items">

                    <?php echo \yii\widgets\ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_caseItem',
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

        </div>
    </div>
</div>







