<?php


?>


<div id=<?= intval($model['oi_id'])     ?>  data-price=<?= $model['price']    ?> data-rarity="<?= !$model['is_gold'] ?  $model['rarity']  : "Special_Gold"    ?>" data-id=<?= intval($model['oi_id'])     ?>  class="upgrade-item common data-js">
   <input id="upgrate-session" value="" type="hidden">
    <img src="<?= $model['icon_url']    ?>" class="upgrade-item__img">
    <div class="upgrade-item__price">
        <span class="price price-RUB"><?= round($model['price'], 2)     ?></span>

    </div>
    <div class="upgrade-item__type">P250</div>
    <div class="upgrade-item__name"><?= $model['market_hash_name']    ?></div>
</div>
