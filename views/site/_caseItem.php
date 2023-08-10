<?php

?>


<a href=<?= "https://market.csgo.com/?search=" . $model->market_hash_name ?> target="_blank" rel="noreferrer noopener" class="skin skin_in-case milspec">
    <div  data-rarity=<?= !$model->is_gold ?  $model->rarity : "Special_Gold"    ?>  class="skin__content js_class">
        <img src=<?= $model->icon_url   ?> srcset="https://community.cloudflare.steamstatic.com/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot6-iFA957PLddgJW4864q4-ZlvnzNoTdn2xZ_Isk2euUpI2l2gaw-Es5Mmr6cdDDd1BoMw2E81O7xO-71pG4vcjIziFgpGB8siZU0y43/260fx194f/image.png 2x" class="skin__img">
        <div class="skin__info">
            <div class="skin__type"><?= $model->type    ?></div>
            <div class="skin__type"><?= $model->rarity    ?></div>
            <div class="skin__name"><?= $model->market_hash_name    ?></div>
        </div>
    </div>
</a>
