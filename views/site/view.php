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
                generate(1);

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
                        $('.raffle-roller-container').css('margin-left', '-3000px');
                        setTimeout(function() {
                            $('.raffle-roller-container').css('margin-left', '-6620px');
                        }, 5000);

                    },

                    success: function (response) {
                        console.log(response, "RESPONSE");
                        $('.raffle-roller-container').stop();
                        goRoll(response.market_hash_name, response.icon_url, response.is_cheap);

                        $("#append-credit").empty();
                        $("#append-credit").text(response.credit);
                        console.log($("#close"), "CLOSE");
                        $("#close").on("click", function(){
                            $("#winner-modal").remove();
                        })
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
            $("#generate").on("click", function(){
                generate(1);
            });

        function generate(ng) {
            $('.raffle-roller-container').css({
                transition: "sdf",
                "margin-left": "0px"
            }, 10).html('');
            let len = 0;
            while (len < 101){
                $.each(img_object, function(key,val) {
                    var element = '<div data-name="' + key +'" id="CardNumber'+len+'" class="item class_red_item" style="background-image:url('+val+');"></div>';
                    console.log(key, val);
                    $(element).appendTo('.raffle-roller-container');
                    len++;
                });
            }
        }
        function goRoll(skin, skinimg, is_cheap) {
            if(is_cheap == 1){
                let rand_expensive = '<?=  $rand_expensive  ?>';
                var html = '<div id="CardNumber77" class="item class_red_item" style="background-image:url('+rand_expensive+');"></div>';
                $("#CardNumber77").css("background-image", "url(" + rand_expensive + ")");
            }

            $('.raffle-roller-container').css({
                transition: "all 8s cubic-bezier(.08,.6,0,1)"
            });
            $('#CardNumber78').css({
                "background-image": "url("+skinimg+")"
            });
            setTimeout(function() {
                $('#CardNumber78').addClass('winning-item');
                $('#rolled').html(skin);
                $('#win-item').remove();

                $('#win').prepend('<div id="win-item"><p>Ваш выигрыш</p><br></div>');
                var win_element = "<div class='item class_red_item' style='background-image: url("+skinimg+")'></div>";
                $(win_element).appendTo('.inventory');
            }, 8500);
            $('.raffle-roller-container').css('margin-left', '-6620px')
        }
        function randomInt(min, max) {
            return Math.floor(Math.random() * (max - min)) + min;
        }

    })

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
        background: #14202b;
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
    <div class="raffle-roller">
        <div class="raffle-roller-holder">
            <div class="raffle-roller-container" style="margin-left: 0px;">
            </div>
        </div>
    </div>
    <center><span  id="win" style="font-size: 25px;"> <span style="
    color: green;" id="rolled"></span>
<br>

    <br>
    <div class="inventory"></div>




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







