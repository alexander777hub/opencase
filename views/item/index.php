<?php


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

        $(".upgrade_to").on("click", function (e) {

            let oi_id_to = $(this).find(".data-js").data('id');


            data = {
                oi_id_to: oi_id_to

            };
            var el = $(this).find(".data-js");

            $.ajax({
                url: "/item/set-upgrade",

                type: "post",

                data: data,
                success: function (response) {
                    console.log(response);
                    console.log(response.chance, "CHANCE");
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
                        el.addClass('active');
                    }

                    console.log(response.img_from, "IMG");
                    if(response.img_from) {
                        $('.item-left').css('background-image', 'url(' + response.img_from + ')');
                    }
                    if(response.img_to) {
                        $('.item-right').css('background-image', 'url(' + response.img_to + ')');
                    }



                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        });

        $("#start").on("click", function (e) {

            $.ajax({
                url: "/item/upgrade",

                type: "post",

                data: {},


                success: function (response) {


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        });



        $(".add-drop").on("click", function (e) {

            let oi_id = $(this).find(".data-js").data('id');
            let price = $(this).find(".data-js").data('price');
            var el = $(this).find(".data-js");

            data = {
                price: price,
                oi_id: oi_id

            };

            $.ajax({
                url: "/item/set-upgrade",

                type: "post",

                data: data,


                success: function (response) {
                    console.log(response);
                    if(response.img_from) {
                        $('.item-left').css('background-image', 'url(' + response.img_from + ')');
                    }


                    el.addClass('active');



                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        });





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
            <div class="upgrade-cell-void">
                <a class="upgrade-cell-void__img item-left"></a>
                <p class="upgrade-cell-void__text">
                    Выберите предмет из инвентаря
                </p>
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

    <div class="upgrade-body__right">
        <div class="upgrade-cell">

            <!-- void -->
            <div class="upgrade-cell-void">
                <a class="upgrade-cell-void__img item-right"></a>
                <p class="upgrade-cell-void__text">
                    Выберите предмет для апгрейда
                </p>
            </div>
            <!-- void end-->

        </div>

    </div>

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
    <div id="my-items-upgrade" class="upgrade-items__section upgrade-items__section_my active">
        <div class="upgrade-items__bar upgrade-items__bar_my">
            <p>Мои предметы</p>
            <label class="upgrade-items__search">
                <input action="search-drops-items" type="text" placeholder="Быстрый поиск">
                <button class="upgrade-items__btn-search"></button>
            </label>
        </div>

            <?php echo \yii\widgets\ListView::widget([
                'dataProvider' => $myScinsDataProvider,
                'itemView' => '_myItem',
                'itemOptions' => [
                    'class' => 'add-drop',

                ],
                //    'options' => ['class' => 'cases'],
                'layout' => "<div><div class='upgrade-items__grid'>{items}</div><br><div></div></div>"
            ]); ?>

    </div>
    <!-- my-items end-->

    <!-- upgrade-items -->
    <div id="my-items-upgrade" class="upgrade-items__section upgrade-items__section_up">
        <div class="upgrade-items__bar upgrade-items__bar_my">
            <p>Скины</p>

            <a action="selling-items-sort" class="upgrade-items__btn-sort">Цена</a>

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
            </label>
        </div>

        <?php echo \yii\widgets\ListView::widget([
            'dataProvider' => $allScinsDataProvider,
            'itemView' => '_item',
            'itemOptions' => [
                'class' => 'upgrade-item covert upgrade_to',

            ],
            //    'options' => ['class' => 'cases'],
            'layout' => "<div><div class='upgrade-items__grid'>{items}</div><br><div></div></div>"
        ]); ?>
    </div>
    <!-- upgrade-items end-->
</div>

