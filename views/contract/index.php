<?php


?>

<script
        src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function (){
        let increase = 0;
        let amount = 0;
        $(document).on('click', ".add-drop", function(){
            if(increase > 10) {
                alert("Вы превысили максимальное количество");
                return;
            }
            let parent_from = $(this).find('.upgrade-item');
            let oi_id = $(this).find(".data-js").data('id');
            let price = $(this).find(".data-js").data('price');
            let type = $(this).find(".data-js").data('type');
            let img = $(this).find(".data-js").data('img');
            let market_hash_name = $(this).find(".data-js").data('name');
            console.log(parent_from, "PARENT");
            if(parent_from.hasClass('active')) {
                return;
            }
            var html = '<div data-id="' + oi_id + '"class="new-contract__added-item">' +
                '<div class="new-contract-skin milspec">' +
                '<div class="new-contract-skin__img">' +
                '<img src="' +img + '" alt="Дроп">' +
                '</div>' +
            '<div class="new-contract-skin__info">' +
                '<div class="new-contract-skin__type">' +
                    type +
                '</div>' +
                '<div class="new-contract-skin__name">' +
                    market_hash_name +
                '</div>' +
                '<div class="new-contract-skin__price">' +
                    '<span class="price price-RUB">' + price + '</span>' +

                '</div>' +
            '</div>' +
        '</div>' +
        '</div>';

            $(".new-contract__added-items").append(html);
            parent_from.addClass('active');
            $("#increase").empty();
            increase ++;
            $("#increase").text(increase + '/10');
            amount = amount + price;
            amount =  parseFloat(amount.toFixed(2))
            $("#amount").empty();
            $("#amount").text(amount);
            console.log(increase, "INC");
            if(increase >=3) {
                $("#create").removeAttr('disabled');
                console.log("HERE");
                var html2 =  "В результате вы получите предмет стоимостью   от  " +
                '<strong><span class="price price-RUB"></span>' + parseFloat((amount/4 ).toFixed(2)) + '</strong>' +
                " до " +
                '<strong><span class="price price-RUB"></span>' + parseFloat((amount * 4 ).toFixed(2)) + '</strong>';
                $(".new-contract__info-text").empty();
                $(".new-contract__info-text").append(html2);
            }



        });

        $(document).on("click", "#create",  function() {
            var items = $(".new-contract__added-item");
            var arr = [];
            items.each(function() {
                var id = $(this).data('id');
               arr.push(id);

            });

            var data = JSON.stringify(arr);
            console.log(data, "DATA");
            $.ajax({
                url: "/rest-api/contract",

                type: "post",

                data: {
                    ids: arr,
                    min: parseFloat((amount/4 ).toFixed(2)),
                    max: parseFloat((amount * 4).toFixed(2)),
                },

                success: function (response) {
                    console.log(response);
                    var html = '<div id="winner-modal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: block;">' +
                        '<div class="modal-dialog modal-dialog-centered" role="document">' +
                        '<div class="modal-content">' +
                        '<div style="color: red" class="modal-body">' +
                        'Выигрыш:' + response.winner.market_hash_name +
                        '<div id="win">' +
                        '<p>Имя предмета :' + response.winner.market_hash_name +'</p>  <br>'+
                        '<p>Цена предмета : ' + response.winner.price +'</p>' +
                        /*   '<p>Rarity : ' + response.rarity +'</p>' + */
                        '</div>' +
                        '</div>' +
                        '<div class="card" style="width: 18rem;">' +
                        '<img class="card-img-top" src='+ response.winner.icon_url +' alt="Card image cap">' +

                        '</div>' +
                        '<div class="modal-footer">' +
                        '<button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +

                        '</div>' +
                        '</div>' +
                        '</div>';
                    $("#append").prepend(html);
                    console.log($("#close"), "CLOSE");
                    $("#close").on("click", function(){
                        $("#winner-modal").remove();
                    })
                    window.location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        });
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
<style>
    .upgrade-item.active {
        border: 2px solid red;
    }

</style>

<div class="contract-page__contract">
    <div class="new-contract">

        <div class="new-contract__main">
            <div class="new-contract__scrollable-area">
                <div class="new-contract__added-items">
                    <div class="new-contract__progress"></div>



           <!--         <div class="new-contract__added-item">
                        <div class="new-contract-skin common">
                            <div class="new-contract-skin__img">
                                <img src="https://community.cloudflare.steamstatic.com/economy/image/IzMF03bi9WpSBq-S-ekoE33L-iLqGFHVaU25ZzQNQcXdB2ozio1RrlIWFK3UfvMYB8UsvjiMXojflsZalyxSh31CIyHz2GZ-KuFpPsrTzBG0quyECnHkVzTWIDLKGVomH-FeNmGNqzCi5-THFDyaQO5-EVhVfvAApDcaaZ2BbEc41NEO8zO-xAptEBFuccpKfx2233gHOK0p0XxLIZ5UnnXACv7zdw/243fx182f/image.png" alt="Дроп">
                            </div>
                            <div class="new-contract-skin__info">
                                <div class="new-contract-skin__type">
                                    Запечатанный граффити
                                </div>
                                <div class="new-contract-skin__name">
                                    Скрещённые ножи (Нежный розовый)
                                </div>
                                <div class="new-contract-skin__price">
                                    <span class="price price-RUB">0.78</span>

                                </div>
                            </div>
                        </div>
                    </div>  !-->







                </div>
            </div>

            <div class="new-contract__controls-counters">
                <div class="new-contract__counter">
                    <div class="new-contract__counter-content">
                        <div id="increase" class="new-contract__counter-value"> 0/10</div>
                        <div class="new-contract__counter-label">Мин. 3</div>
                    </div>
                </div>
                <div class="new-contract__counter">
                    <div class="new-contract__counter-content">
                        <div class="new-contract__counter-value"><span class="price price-RUB"></span> <span id="amount"> 0</span></div>
                        <div class="new-contract__counter-label">Сумма</div>
                    </div>
                </div>
                <div class="new-contract__control">
                    <button disabled="disabled" id="create" class="button new-contract-button" action="createContract">
                        <span class="new-contract-button__content">Создать контракт</span>
                    </button>
                </div>

            </div>
            <div class="new-contract__info-text">

            </div>

        </div>

    </div>
</div>


<div class="contract-page__user-items">
    <div class="upgrade-items__bar upgrade-items__bar_my">
        <div id="sell-all">
            <div class="items-topbar__section items-topbar__section_btn">
                <button class="btn btn_color-success btn_uppercase btn_fullwidth">
                    <div class="btn__content">
                        <div class="btn__label">Создать контракт</div>
                    </div>
                </button>
            </div>

        </div>
        <p>Доступные для контракта предметы</p>

        <button action="drops-item-price-sort" class="upgrade-items__btn-sort active">Цена</button>

        <div class="upgrade-items__price-sort">
            <div class="upgrade-price-sort">
                <label>
                    <input name="drops-items-min-price" type="text" placeholder="0">
                    <span class="price price-RUB"></span>
                </label>

                <label>
                    <input name="drops-items-max-price" type="text" placeholder="1000">
                    <span class="price price-RUB"></span>
                </label>
            </div>
        </div>

        <label class="upgrade-items__search">
            <input name="search-drops-items" type="text" placeholder="Быстрый поиск">
            <button class="upgrade-items__btn-search"></button>
        </label>
    </div>
    <?php   if($myScinsDataProvider->getModels()): ?>
    <div id="replace2">

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
    <?php  else:  ?>
    <div class="upgrade-items__grid">



        <div class="upgrade-items__item upgrade-items__item_fluid">
            <a href="/">Пока предметов нет. Открой несколько кейсов, вернись на эту страницу, и ты сможешь создать контракт!</a>
        </div>


    </div>
    <?php endif; ?>
</div>
