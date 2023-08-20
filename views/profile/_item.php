<?php

use app\models\Item;
use app\modules\mng\models\OpeningItem;



$icon = isset($model['icon_url']) && $model['icon_url'] ? $model['icon_url'] : '/uploads/photo/default.png';
$show_sell_btns = false;
 $status = $model ? $model['status'] : null;
 $upgrade_status = $model ? $model['upgrade_status'] : null;
 $contract_status = $model ? $model['contract_status'] : null;
  if(!$status) {
      $show_sell_btns = true;
  } else {
      if($status == 5){
          $show_sell_btns = true;
      }

  }
  if($upgrade_status == OpeningItem::UPGRADE_STATUS_FAIL || $upgrade_status == OpeningItem::UPGRADE_STATUS_REPLACED){
      $show_sell_btns = false;
  }
  if($model['is_sold']){
      $show_sell_btns = false;
  }
  if($contract_status == \app\modules\mng\models\Contract::CONTRACT_STATUS_REPLACED){
      $show_sell_btns = false;
  }


  $oi_id = $model ? isset($model['oi_id']) : $model['oi_id'];



?>


<script type="text/javascript">

    $(document).ready(function() {

    });

</script>

    <div data-rarity="<?= !$model['is_gold'] ?  $model['rarity']  : "Special_Gold"    ?>" data-id=<?= intval($model['oi_id'])     ?> class="item uncommon js_class">
        <div class="item__content">
            <div class="item__img">
                <img src="<?= $icon  ?>" class="case-image">
            </div>

            <div class="item__price"><span class="price price-RUB"><?=  number_format((float)$model['price'], 2, '.', '');   ?></span></div>
            <div class="item__icons">
                <a href="/case/hole" class="item__icon status linkcase" title="Кейс"></a>
                <div class="item__icon status selled">
                    <span class="tooltip tooltip_center tooltip_extramin">Продано</span>
                </div>
            </div>
            <div class="item__btns">

                <?php if($show_sell_btns): ?>

                <div class="item__btn">
                    <div class="btn btn_color-success btn_size-small btn_uppercase btn_with-icon tosell">
                        <div class="btn__content">
                            <i  style="margin-right: 5px;" class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <div  data-oi=<?= intval($model['oi_id'])     ?> data-id="<?= $model ? $model['id'] :  null ?>"  data-name="<?= $model ? $model['market_hash_name'] :  null ?>" data-price="<?= $model ? round($model['price'],2) :  null ?>" class="btn__label data-price"><span class="price price-RUB"><?= $model ? round($model['price'],2)  :  null ?></span></div>
                        </div>
                    </div>
                </div>

                <div class="item__btn">
                    <div class="btn btn_type-square btn_with-icon btn_style-outline btn_color-primary btn_size-small btn_uppercase tomarket">
                        <div class="btn__content">
                            <i style="margin-right: 5px;" class="fa fa-arrow-down" aria-hidden="true"></i>
                            <div data-id="<?= $model ? $model['id'] :  null ?>"  data-name="<?= $model ? $model['market_hash_name'] :  null ?>" data-price="<?= $model ? round($model['price'], 2) :  null ?>"  data-oi="<?= $model ? $model['oi_id'] :  null ?>" class="btn__label data-price"></div>
                            <!-- <div class="btn__label">{{_ "withdraw_items_1"}}</div> -->
                        </div>
                    </div>
                </div>
                <?php endif; ?>



            </div>

            <div class="item__type-and-name">
                <div class="item__type"><?= $model['type']   ?></div>
                <div class="item__name"><?= $model['market_hash_name']   ?></div>
            </div>
        </div>

    </div>

