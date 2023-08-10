<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Ad;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->params['breadcrumbs'][] = $this->title;

?>
<div class="topbar">
    <div class="topbar__hometop">
        <div class="hometop">
            <div class="hometop__section hometop__section_quicklinks">
                <div class="nav-categories js-nav-categories">
                    <div class="nav-categories__btn">Fast links</div>
                    <div class="nav-categories__links">
                        <div class="nav-categories__links-list">
                            <a data-anchor="#rarity-cases" class="nav-categories__link">Cases by rarity</a>

                            <a data-anchor="#free-cases" class="nav-categories__link">Free cases</a>


                            <a data-anchor="#bonus-cases" class="nav-categories__link">Bonus cases</a>




                            <a data-anchor="#users-cases" class="nav-categories__link">New cases of users</a>


                            <a data-anchor="#pop-users-cases" class="nav-categories__link">Popular cases of users</a>





                            <a data-anchor="#limited-cases" class="nav-categories__link">Limited edition</a>


                            <a data-anchor="#custom-cases" class="nav-categories__link">Custom cases</a>


                            <a data-anchor="#youtubers-cases" class="nav-categories__link">Bloggers' cases</a>


                            <a data-anchor="#battles-cases" class="nav-categories__link">Battles</a>


                            <a data-anchor="#weapon-cases" class="nav-categories__link">Weapon cases</a>


                            <a data-anchor="#classic-cases" class="nav-categories__link">Classic cases</a>


                            <a data-anchor="#collections-cases" class="nav-categories__link">Collections</a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="hometop__section hometop__section_promocode">
                <div class="new-promocode">
                    <div class="new-promocode__label">

                        Bonus amount <strong>35 %</strong>

                    </div>
                    <div class="new-promocode__value" action="copy" data-value="1882332C-734A-498B-8684">1882332C-734A-498B-8684</div>
                </div>
            </div>


            <div class="hometop__section hometop__section_bonus">
                <a href="https://gleam.io/D4vm9/giveaway-of-purple-skins-by-forcedropgg" class="new-bonus" target="_blank" rel="noreferrer noopener">
                    <div class="new-bonus__title-and-counter">
                        <div class="new-bonus__title">GLEAM</div>
                    </div>
                    <div class="new-bonus__text">Giveaway of purple CS:GO skins</div>
                    <div class="new-bonus__img" style="background-image: url(/public/img/gleam.png);"></div>
                </a>
            </div>



            <a href="/refill_prizes" class="hometop__section hometop__section_refill">

                <div class="new-refill-prize-widget covert">
                    <div class="new-refill-prize-widget__text-and-name">
                        <div class="new-refill-prize-widget__text">Top up your balance on <strong class="price price-USD">8.09</strong></div>
                        <div class="new-refill-prize-widget__text">and get a chance to win</div>
                        <div class="new-refill-prize-widget__name">M4A4 | Desert-Strike</div>
                    </div>
                    <div class="new-refill-prize-widget__img">
                        <img src="https://community.cloudflare.steamstatic.com/economy/image/fWFc82js0fmoRAP-qOIPu5THSWqfSmTELLqcUywGkijVjZYMUrsm1j-9xgEObwgfEh_nvjlWhNzZCveCDfIBj98xqodQ2CZknz52YOLkDzRyTRDLFaFQT-E15gXTBCI24dJuGoSzp71UcF-6vYSTYbYtY4saH5TRD6WFZQz46kpshfddKcCLoyLn3i73ejBdZpZKYDI/100fx74f/image.png" alt="">
                    </div>
                </div>

            </a>


        </div>
    </div>
    <div class="topbar__filters">
        <div class="topbar__search">
            <div class="cases-search">
                <div class="cases-search__selector">
                    <div class="cases-search__selector-item" title="Search by case name" data-key="type" action="filters">
                        <input type="radio" id="casesRadio" name="typeSearch" class="cases-search__selector-item-radio">
                        <label for="casesRadio" class="cases-search__selector-item-label icon icon_cases-new"></label>
                    </div>
                    <div class="cases-search__selector-item" title="Search by item name" data-key="type" data-value="items" action="filters">
                        <input type="radio" id="skinsRadio" name="typeSearch" class="cases-search__selector-item-radio">
                        <label for="skinsRadio" class="cases-search__selector-item-label icon icon_skins-new"></label>
                    </div>
                </div>
                <div class="cases-search__field">
                    <input type="text" name="search" placeholder="Quick search" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="topbar__price">
            <div class="price-filters price-filters_in-topbar">
                <div class="price-filters__filter" data-key="available" action="filters"><span>Available</span></div>

                <div class="price-filters__filter" data-key="prices" data-value="0-1" action="filters"><span class="price price-USD">0-1</span></div>

                <div class="price-filters__filter" data-key="prices" data-value="1-5" action="filters"><span class="price price-USD">1-5</span></div>

                <div class="price-filters__filter" data-key="prices" data-value="5-15" action="filters"><span class="price price-USD">5-15</span></div>

                <div class="price-filters__filter" data-key="prices" data-value="15+" action="filters"><span class="price price-USD">15+</span></div>

            </div>
        </div>
        <div class="topbar__btns">

            <div class="topbar__btn topbar__btn_fav" action="filters" data-key="favorite">
                <div class="topbar__btn-fav btn btn_color-primary btn_size-fill btn_transparent btn_with-icon btn_no-padding btn_fav">
                    <div class="btn__content">
                        <div class="btn__icon icon icon_fav"></div>
                        <div class="btn__label topbar__btn-fav-label">Favorites</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper_"></div>
<div class="home decorated-page">
    <!-- <div class="no-items no-items_home icon icon_drops">
					<div class="no-items__title">{{_ "CASES_NOT_FOUND"}}</div>
					<div class="no-items__btn">
						<div class="btn btn_style-outline btn_color-primary btn_uppercase" action="clearFilters">
							<span class="btn__content">
								<span class="btn__label">{{_ "reset_filters"}}</span>
							</span>
						</div>
					</div>
				</div> -->








    <div class="home__user-cases">
        <div class="cases-section__title" id="mine-cases">


            <div class="home__series">
                <div class="cases-section cases-section_limited">
                    <div class="cases-section__title" id="limited-cases">
                        <div class="new-title new-title_with-icon new-title_icon-limited">
                            <div class="new-title__text"> Список кейсов</div>
                        </div>
                    </div>
                    <div class="cases-section__cases">

                            <?php echo \yii\widgets\ListView::widget([
                                'dataProvider' => $dataProvider,
                                'itemView' => '_item',
                                'itemOptions' => [
                                    'class' => 'cases__item',
                                ],
                            //    'options' => ['class' => 'cases'],
                                'layout' => "<div class='cases'>{items}</div>"

                            ]); ?>

                    </div>
                </div>
            </div>



        </div>

    </div>
</div>











