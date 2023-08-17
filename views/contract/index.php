<?php



?>

<div class="contract-page__contract">
    <div class="new-contract">

        <div class="new-contract__start">
            <div class="new-contract__text">
                <div class="new-contract__title">Контракты ForceDrop</div>
                <div class="new-contract__subtitle">Выберите предметы для создания контракта</div>

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
        <?php \yii\widgets\Pjax::begin(['id' => 'item_list2']); ?>
        <?php echo \yii\widgets\ListView::widget([
            'dataProvider' => $myScinsDataProvider,
            'itemView' => '_myItem',
            'itemOptions' => [
                'class' => 'add-drop',
            ],
            //    'options' => ['class' => 'cases'],
            'layout' => "<div><div class='upgrade-items__grid'>{items}</div><br><div></div></div>"
        ]); ?>
        <?php \yii\widgets\Pjax::end(); ?>

    </div>
    <?php  else:  ?>
    <div class="upgrade-items__grid">



        <div class="upgrade-items__item upgrade-items__item_fluid">
            <a href="/">Пока предметов нет. Открой несколько кейсов, вернись на эту страницу, и ты сможешь создать контракт!</a>
        </div>


    </div>
    <?php endif; ?>
</div>
