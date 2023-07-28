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
            <a href="/case/lake" class="item__icon status linkcase" title="Кейс"> Test</a>
            <div class="item__icon status selled">
                <span class="tooltip tooltip_center tooltip_extramin">Продано</span>
            </div>
        </div>
        <div class="item__btns">


        </div>


    </div>
</div>
