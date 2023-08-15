<?php


?>


    <img src=<?= $model['icon_url']    ?> class="upgrade-item__img">
    <div id=<?= intval($model['id'])     ?> data-img=<?= $model['icon_url']    ?> data-id="<?= intval($model['id'])     ?>"  class="upgrade-item__price data-js">
        <span class="price price-RUB">"<?= round($model['price'], 2)     ?>"</span>

    </div>
    <div class="upgrade-item__type">AWP</div>
    <div class="upgrade-item__name"><?= $model['market_hash_name']    ?></div>



