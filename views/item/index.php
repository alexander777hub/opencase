<?php

/** @var yii\web\View $this */

$this->registerJs('
  jQuery(document).pjax(".add-drop", "#item_list", {
      "push": true,
      "replace": false,
      "timeout": 1000,
      "scrollTo": false
  });
  ');

$this->registerJs('
  jQuery(document).pjax(".upgrade_to", "#item_list2", {
      "push": true,
      "replace": false,
      "timeout": 1000,
      "scrollTo": false
  });
  ');
$this->registerJs('
  jQuery(document).pjax(".upgrade_to", "#upgrade-right", {
      "push": true,
      "replace": false,
      "timeout": 1000,
      "scrollTo": false
  });
  ');

$session = Yii::$app->session->has('upgrade')  ? \yii\helpers\Json::encode(Yii::$app->session->get('upgrade')) : '';
$is_session = $session ? 1 : 0;

?>

<script
        src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script>
<style>
    .upgrade-item.active {
        border: 2px solid red;
    }


    .button_upgrade {
        padding: 10px 15px 12px;
        display: flex;
        justify-content: center;
        align-items: center;
        transform: skewX(-10deg);
        border-radius: 6px;
        background-color: #6dae01;
        border: 1px solid transparent;
        transition: .2s ease-in-out;
        cursor: pointer;
        color: #fff;
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
        var items = $('.data-js');

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

            var parent = $( this ).closest(".add-drop");
            parent.addClass(jsClass);


        });
        console.log(items, "ITEMS");
        console.log( $(".tomarket"), 'EL');

        $(document).on('click', '.upgrade-cell-void__btn-del', function(){
            window.location.reload();
        });
        $(document).on('click', ".upgrade_to",function(e){
            console.log("CLICK");
            let oi_id_to = $(this).find(".data-js").data('id');
            let type = $(this).find(".data-js").data('type');
            let market_hash_name = $(this).find(".data-js").data('name');
            console.log(e.target, 'TARGET');
            let parent_to = e.target.closest('.upgrade_to');
            let target = e.target;

            data = {
                oi_id_to: oi_id_to

            };
            var el = $(this).find(".data-js");

            $.ajax({
                url: "/item/set-upgrade",

                type: "post",
                data: data,
                success: function (response) {
                    if(response.chance) {
                        $(".upgrade-title").empty();
                        var chance_px = (293 / 100) * response.chance;

                        console.log(chance_px, "PX");
                        $(".upgrade-main-cell__chance-bar").css('background-color', '#6dae01');
                        $(".upgrade-main-cell__chance-bar").css('height', chance_px + 'px');
                        var html = '<div class="upgrade-title__percent">' +
                            '<span>' +   response.chance + '</span>' +
                            '<p>Шанс апгрейда</p>' +
                            '</div>';
                        $('.upgrade-title').append(html);
                        console.log(parent_to, "PAR");
                        console.log(target, "TAR");
                        $(parent_to).addClass('active');
                        $(document).on('click', ".upgrade_to" ,function(e){
                            $(parent_to).removeClass('active');
                        });
                        $(document).on('click', "#start" ,function(e){
                            $(parent_to).removeClass('active');
                        });
                        var html = '<a class="upgrade-cell-void__img upgrade-cell-void__img_full"></a>' +
                            '<div class="upgrade-cell-void__value">' +

                            '<span class="price price-RUB">'+ response.price_to + '</span>' +


                            '</div>'+
                            '<p class="upgrade-cell-void__text upgrade-cell-void__text_full">' +
                            '<span>'+ type + '</span>' + '  ' +
                            market_hash_name +
                            '<a action="remove-drop" href="#" class="upgrade-cell-void__btn-del"></a>' +
                            '</p>';

                        $("#price-right").empty();
                        $("#price-right").html(html);
                        $("#price-right").html(html);

                    } else {
                        var session = null;
                        if("<?= $is_session   ?>" == 1){
                             session = <?= $session   ?>;
                        }


                        var myHtml = $(response).find('#item_list2').html();
                        console.log(session, "SESSION");
                        $('#item_list2').replaceWith(myHtml);

                        var htmlRight = '<div class="upgrade-body__right">' +
                            '<div class="upgrade-cell">' +

                                '<div class="upgrade-cell-void">' +
                                    '<a style="background-image: url(' + session.img_to +')" class="upgrade-cell-void__img item-right"></a>' +
                                    '<div id="price-right">' +
                                        '<p class="upgrade-cell-void__text">' +
                                           session.market_hash_name_to +
                                        '</p>' +
                                    '</div>' +

                                '</div>' +
                            '</div>' +
                        '</div>';


                        $('.upgrade-body__right').replaceWith(htmlRight);
                        $(parent_to).addClass('active');
                        $(document).on('click', ".upgrade_to" ,function(e){
                            $(parent_to).removeClass('active');
                        });
                        $(document).on('click', "#start" ,function(e){
                            $(parent_to).removeClass('active');
                        });
                    }

                    if(response.img_to) {
                        $('.item-right').css('background-image', 'url(' + response.img_to + ')');
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
            // your code here
        });





        $("#start").on("click", function (e) {

            $.ajax({
                url: "/item/upgrade",

                type: "post",

                data: {},

                success: function (response) {
                    if(response.win == 0){
                        alert("Проигрыш");
                    } else {
                        alert("Вы выиграли");
                    }
                    window.location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        });


        $(document).on('click', ".add-drop", function(){
            let parent = $(this).find(".data-js");
            let oi_id = $(this).find(".data-js").data('id');
            let price = $(this).find(".data-js").data('price');
            let type = $(this).find(".data-js").data('type');
            let market_hash_name = $(this).find(".data-js").data('name');
            let parent_from = $(this).find('.upgrade-item');
            data = {
                price: price,
                oi_id: oi_id

            };

            $.ajax({
                url: "/item/index",
                dataType: 'json',
                type: "post",

                data: data,


                success: function (response) {
                    if(!response.skip){
                        var myHtml = $(response).find('#item_list').html();
                        console.log(myHtml);
                        $('#item_list').replaceWith(myHtml);
                    }
                    $.ajax({
                        url: "/item/set-upgrade",

                        type: "post",

                        data: data,
                        success: function (response) {
                            if(response.chance){
                                $(".upgrade-title").empty();
                                var chance_px = (293 / 100) * response.chance;

                                console.log(chance_px, "PX");
                                $(".upgrade-main-cell__chance-bar").css('background-color', '#6dae01');
                                $(".upgrade-main-cell__chance-bar").css('height', chance_px + 'px');
                                var html = '<div class="upgrade-title__percent">' +
                                    '<span>' +   response.chance + '</span>' +
                                    '<p>Шанс апгрейда</p>' +
                                    '</div>';
                                $('.upgrade-title').append(html);
                            }
                            console.log($('.item-left'), "READY");
                            console.log(response, "READY R");
                            if(response.img_from) {
                                $('.item-left').css('background-image', 'url(' + response.img_from + ')');
                            }

                            $(parent_from).addClass('active');
                            $(document).on('click', ".img_left" ,function(e){
                                $(parent_from).removeClass('active');
                            });
                            $(document).on('click', "#start" ,function(e){
                                $(parent_from).removeClass('active');
                            });
                            var items = $('.upgrade_to');
                            console.log(items, "UPGR");
                            items.each(function() {
                                var rarity = $(this).find('.data-js').data('rarity');
                                console.log(rarity, "RAR");
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
                                $(this).addClass(jsClass);
                            });
                            var html = '<a class="upgrade-cell-void__img upgrade-cell-void__img_full"></a>' +
                                '<div class="upgrade-cell-void__value">' +

                                '<span class="price price-RUB">'+ price + '</span>' +


                                '</div>'+
                                '<p class="upgrade-cell-void__text upgrade-cell-void__text_full">' +
                                '<span>'+ type + '</span>' + '  ' +
                                market_hash_name +
                                '<a action="remove-drop" href="#" class="upgrade-cell-void__btn-del"></a>' +
                                '</p>';


                            $("#price-left").empty();

                            $("#price-left").html(html);


                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        });



    /*    $(".add-drop").on("click", function (e) {
            let parent = $(this).find(".data-js");
            let oi_id = $(this).find(".data-js").data('id');
            let price = $(this).find(".data-js").data('price');
            let type = $(this).find(".data-js").data('type');
            let market_hash_name = $(this).find(".data-js").data('name');
             let parent_from = $(this).find('.upgrade-item');
            data = {
                price: price,
                oi_id: oi_id

            };

            $.ajax({
                url: "/item/index",

                type: "post",

                data: data,


                success: function (response) {
                    var myHtml = $(response).find('#item_list').html();
                    console.log(myHtml);
                    $('#item_list').replaceWith(myHtml);

                    $.ajax({
                        url: "/item/set-upgrade",

                        type: "post",

                        data: data,
                        success: function (response) {
                                    console.log($('.item-left'), "READY");
                                    console.log(response, "READY R");
                                    if(response.img_from) {
                                        $('.item-left').css('background-image', 'url(' + response.img_from + ')');
                                    }

                                    $(parent_from).addClass('active');
                                    $(document).on('click', ".img_left" ,function(e){
                                        $(parent_from).removeClass('active');
                                    });
                                    $(document).on('click', "#start" ,function(e){
                                        $(parent_from).removeClass('active');
                                    });
                            var items = $('.upgrade_to');
                            console.log(items, "UPGR");
                            items.each(function() {
                                var rarity = $(this).find('.data-js').data('rarity');
                                console.log(rarity, "RAR");
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


                                $(this).addClass(jsClass);


                            });


                                var html = '<a class="upgrade-cell-void__img upgrade-cell-void__img_full"></a>' +
                                    '<div class="upgrade-cell-void__value">' +

                                    '<span class="price price-RUB">'+ price + '</span>' +


                                    '</div>'+
                                    '<p class="upgrade-cell-void__text upgrade-cell-void__text_full">' +
                                    '<span>'+ type + '</span>' + '  ' +
                                         market_hash_name +
                                    '<a action="remove-drop" href="#" class="upgrade-cell-void__btn-del"></a>' +
                                    '</p>';


                                $("#price-left").empty();

                                $("#price-left").html(html);


                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        }); */





    });

</script>

<!-- head -->
<div class="upgrade-head">
    <div class="upgrade-head__switch">
        <a action="switch-upgrade-type" data-action="balance">Баланс</a>
        <a action="switch-upgrade-type" data-action="drop" class="active">Скин</a>
    </div>

    <div class="upgrade-title">



        <div class="upgrade-title__title">
            <h1>UPGRADE</h1>
        </div>



    </div>

    <div class="upgrade-head__coefficient">
        <span>0</span>
        <p>КОЭФФИЦИЕНТ</p>
    </div>

</div>
<!-- head end-->

<!-- body -->
<div class="upgrade-body">
    <div class="upgrade-body__left">
        <div class="upgrade-cell">


            <!-- void -->
            <div id="void-price" class="upgrade-cell-void">
                <a class="upgrade-cell-void__img item-left"></a>
                <div id="price-left">
                    <p class="upgrade-cell-void__text">
                        Выберите предмет из инвентаря
                    </p>
                </div>

            </div>
            <!-- void end-->



            <!-- void-coin -->
            <div class="upgrade-cell-void upgrade-cell-void_coin" style="display: none;">
                <a class="upgrade-cell-void__img upgrade-cell-void__img_coin"></a>

                <div class="upgrade-balance">
                    <div class="upgrade-balance__value">
                        <span class="price price-RUB">0.00</span>
                    </div>
                    <div class="upgrade-balance__slider">
                        <!-- <p>Min: <span class="price price-{{getCurrencyStyle}}">12.00 - test</span></p> -->
                        <div class="rangeslider-price">
                            <span class="irs js-irs-1 irs-disabled"><span class="irs"><span class="irs-line" tabindex="-1"><span class="irs-line-left"></span><span class="irs-line-mid"></span><span class="irs-line-right"></span></span><span class="irs-min" style="display: none;">0</span><span class="irs-max" style="display: none;">1</span><span class="irs-from" style="visibility: hidden; display: none;">0</span><span class="irs-to" style="visibility: hidden; display: none;">0</span><span class="irs-single" style="display: none;">0</span></span><span class="irs-grid"></span><span class="irs-bar"></span><span class="irs-bar-edge"></span><span class="irs-shadow shadow-single"></span><span class="irs-slider single"></span><span class="irs-disable-mask"></span></span><input type="text" id="rangeslider-price" name="rangeslider-price" value="" action="balance-input" class="irs-hidden-input" readonly="" disabled="">
                        </div>
                        <p>Max: <span class="price price-RUB">0.00</span></p>
                    </div>
                </div>
            </div>
            <!-- void-coin end-->
        </div>

    </div>

    <div class="upgrade-body__center">
        <div class="
							upgrade-main-cell







						">
            <div class="upgrade-main-cell__chance-bar">
                <div class="upgrade-main-cell__chance-bar-back"></div>
                <div action="indicator" class="upgrade-main-cell__indicator"></div>
            </div>


        </div>

        <!-- btn -->
        <div class="upgrade-body__btn">

            <button id="start" class="button button_upgrade active">
                <span>UPGRADE</span>
            </button>
        </div>
        <!-- btn end-->
    </div>

    <?php \yii\widgets\Pjax::begin(['id' => 'upgrade-right']); ?>

    <div class="upgrade-body__right">
        <div class="upgrade-cell">

            <!-- void -->
            <div class="upgrade-cell-void">
                <?php if(Yii::$app->session->has('upgrade') && $session = Yii::$app->session->get('upgrade')  && isset($session['upgrade']['img_to'])):    ?>
                <a style=<?='background-image: url(' . $session['upgrade']['img_to'] . ')'?>  class="upgrade-cell-void__img item-right"></a>
                <div id="price-right">
                    <p class="upgrade-cell-void__text">
                       HEHE
                    </p>
                </div>
                <?php else: ?>
                    <a  class="upgrade-cell-void__img item-right"></a>
                    <div id="price-right">
                        <p class="upgrade-cell-void__text">
                            Выберите предмет для апгрейда
                        </p>
                    </div>

                <?php endif; ?>

            </div>
            <!-- void end-->

        </div>

    </div>

    <?php \yii\widgets\Pjax::end(); ?>


</div>
<!-- body end-->

<div class="upgrade-items">
    <!-- mob-nav -->
    <div class="upgrade-items__nav">
        <a action="switch-select-items" class="active" data-action="drops">Мои предметы</a>
        <a action="switch-select-items" data-action="items">Апгрейд</a>
    </div>
    <!-- mob-nav end-->

    <!-- my-items -->
    <div id="my-items-upgrade-left" class="upgrade-items__section upgrade-items__section_my active">
        <div class="upgrade-items__bar upgrade-items__bar_my">
            <p>Мои предметы</p>
            <!--<label class="upgrade-items__search">
                <input action="search-drops-items" type="text" placeholder="Быстрый поиск">
                <button class="upgrade-items__btn-search"></button>
            </label> !-->
        </div>

        <div id="replace2">
            <?php \yii\widgets\Pjax::begin(['id' => 'item_list2']); ?>
            <?php echo \yii\widgets\ListView::widget([
                'dataProvider' => $myScinsDataProvider,
                'itemView' => '_myItem',
                'itemOptions' => [
                    'class' => 'add-drop',

                ],
                //    'options' => ['class' => 'cases'],
                'layout' => "<div><div class='upgrade-items__grid'>{items}</div><br><div></div></div>"
            ]); ?>
            <?php \yii\widgets\Pjax::end(); ?>

        </div>



    </div>
    <!-- my-items end-->

    <!-- upgrade-items -->
    <div id="my-items-upgrade-right" class="upgrade-items__section upgrade-items__section_up">
        <div class="upgrade-items__bar upgrade-items__bar_my">
            <p>Скины</p>

        <!--    <a action="selling-items-sort" class="upgrade-items__btn-sort">Цена</a>

            <div class="upgrade-items__price-sort">
                <div class="upgrade-price-sort">
                    <label>
                        <input action="selling-items-min-price" type="text" placeholder="0">
                        <span class="price price-RUB"></span>
                    </label>

                    <label>
                        <input action="selling-items-max-price" type="text" placeholder="100 000">
                        <span class="price price-RUB"></span>
                    </label>
                </div>
            </div>

            <label class="upgrade-items__search">
                <input action="search-selling-items" type="text" placeholder="Быстрый поиск">
                <button class="upgrade-items__btn-search"></button>
            </label> !-->
        </div>
        <div id="replace">
            <?php \yii\widgets\Pjax::begin(['id' => 'item_list']); ?>

            <?= \yii\widgets\ListView::widget([
                'dataProvider' => $allScinsDataProvider,
                'itemView' => '_item',
                'itemOptions' => [
                    'class' => 'upgrade-item upgrade_to',

                ],
                //    'options' => ['class' => 'cases'],
                'layout' => "<div><div class='upgrade-items__grid'>{items}</div><br><div></div></div>"
            ]); ?>
            <?php \yii\widgets\Pjax::end(); ?>
        </div>

        </div>

    <!-- upgrade-items end-->
</div>



