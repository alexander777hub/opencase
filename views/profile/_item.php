<?php

use app\models\Item;



$icon = isset($model['icon']) && $model['icon'] ? $model['icon'] : '/uploads/photo/default.png';

$original = Item::getOriginal($icon);


?>



    <div class="item uncommon">

        <div class="item__content">
            <div class="item__img">
                <img src="<?= $original  ?>" class="case-image">
            </div>

            <div class="item__price"><span class="price price-RUB"><?= $model['price']   ?></span></div>
            <div class="item__icons">
                <a href="/case/hole" class="item__icon status linkcase" title="Кейс"></a>
                <div class="item__icon status selled">
                    <span class="tooltip tooltip_center tooltip_extramin">Продано</span>
                </div>
            </div>
            <div class="item__btns">


            </div>

            <div class="item__type-and-name">
                <div class="item__type">XM1014</div>
                <div class="item__name"><?= $model['internal_name']   ?></div>
            </div>
        </div>

    </div>

