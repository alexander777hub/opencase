<?php


?>


    <img src=<?= $model['icon_url']    ?> class="upgrade-item__img">
    <div data-price="<?= round($model['price'], 2)     ?>" data-img=<?= $model['icon_url']    ?> id=<?= intval($model['id'])     ?> data-rarity="<?= !$model['is_gold'] ?  $model['rarity']  : "Special_Gold"    ?>" data-img=<?= $model['icon_url']    ?> data-id="<?= intval($model['id'])     ?>" data-type=<?= $model['type']    ?> data-name="<?= $model['market_hash_name']    ?>"  class="upgrade-item__price data-js">
        <span class="price price-RUB"><?= round($model['price'], 2)     ?></span>

    </div>
    <div class="upgrade-item__type">AWP</div>
    <div class="upgrade-item__name"><?= $model['market_hash_name']    ?></div>



