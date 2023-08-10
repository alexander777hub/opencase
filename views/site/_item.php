<?php

/* @var $model \app\modules\mng\models\Opening */



?>




    <a href=<?= "/site/view?id=" . $model->id ?>  class="case item-limited">

       <!-- <div class="case__limit">
            <div class="case__limit-inner">
                <div class="case__limit-left">31780</div>
                <div class="case__limit-separator">/</div>
                <div class="case__limit-reserve">35000</div>
            </div>
        </div>  !-->

        <div class="case__wrapper-img">
            <img src=<?= $model->avatar_id ? \app\modules\mng\models\Opening::getOriginal($model->avatar_id)  : "https://images.steamcdn.io/forcedrop/cases/summerrrrr.png"  ?> class="case__img">
        </div>

<!-- https://images.steamcdn.io/forcedrop/cases/summerrrrr.png !-->

        <div class="case__name"><?= $model->name  ?></div>



        <div class="case__price">
            <div class="case__current-price">
                <span class="price price-RUB"><?= round($model->price, 0)  ?></span>
            </div>
        </div>
    </a>







