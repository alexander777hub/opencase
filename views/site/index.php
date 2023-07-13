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


    <div class="home__series">
        <div class="cases-section cases-section_categories cases-section_cases">
            <div class="cases-section__cases" id="rarity-cases">
                <div class="cases">

                    <div class="cases__item">
                        <a href="/case/milspec" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/1new_milspec.png" class="case__img">
                            </div>



                            <div class="case__name">Mil-Spec Grade</div>



                            <div class="case__price case__price_old">
                                <div class="case__old-price">
                                    <span class="price price-USD">0.398</span>
                                </div>
                                <div class="case__new-price">
                                    <span class="price price-USD">0.265</span>
                                </div>
                            </div>



                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/restricted" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/1new_restricted.png" class="case__img">
                            </div>



                            <div class="case__name">Restricted</div>



                            <div class="case__price case__price_old">
                                <div class="case__old-price">
                                    <span class="price price-USD">1.13</span>
                                </div>
                                <div class="case__new-price">
                                    <span class="price price-USD">1</span>
                                </div>
                            </div>



                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/classified" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/1new_classified.png" class="case__img">
                            </div>



                            <div class="case__name">Classified</div>



                            <div class="case__price">
                                <div class="case__current-price">
                                    <span class="price price-USD">4.38</span>
                                </div>
                            </div>



                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/covert" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/1new_covert.png" class="case__img">
                            </div>



                            <div class="case__name">Covert</div>



                            <div class="case__price">
                                <div class="case__current-price">
                                    <span class="price price-USD">10.6</span>
                                </div>
                            </div>



                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/rare" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/1new_rare.png" class="case__img">
                            </div>



                            <div class="case__name">Knife</div>



                            <div class="case__price">
                                <div class="case__current-price">
                                    <span class="price price-USD">251.63</span>
                                </div>
                            </div>



                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="home__series">
        <div class="cases-section cases-section_cases cases-section_other-cases">
            <div class="cases-section__title" id="free-cases">
                <div class="new-title new-title_with-icon new-title_icon-free">
                    <div class="new-title__text">Free cases</div>
                </div>
            </div>
            <div class="cases-section__cases">
                <div class="cases">

                    <div class="cases__item">
                        <a href="/case/freecase" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/free_case_lvl1_512x396.png" class="case__img">
                            </div>



                            <div class="case__name">Free №1</div>



                            <div class="case__price">
                                <div class="case__current-price">
                                    <span class="price price-USD">0</span>
                                </div>
                            </div>



                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/freecase2" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/free_case_lvl2_512x396.png" class="case__img">
                            </div>



                            <div class="case__name">Free №2</div>



                            <div class="case__price">
                                <div class="case__current-price">
                                    <span class="price price-USD">0</span>
                                </div>
                            </div>



                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/freecase3" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/free_case_lvl3_512x396.png" class="case__img">
                            </div>



                            <div class="case__name">Free №3</div>



                            <div class="case__price">
                                <div class="case__current-price">
                                    <span class="price price-USD">0</span>
                                </div>
                            </div>



                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/freecase4" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/free_case_lvl4_512x396.png" class="case__img">
                            </div>



                            <div class="case__name">Free №4</div>



                            <div class="case__price">
                                <div class="case__current-price">
                                    <span class="price price-USD">0</span>
                                </div>
                            </div>



                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/freecase5" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/free_case_lvl5_512x396.png" class="case__img">
                            </div>



                            <div class="case__name">Free №5</div>



                            <div class="case__price">
                                <div class="case__current-price">
                                    <span class="price price-USD">0</span>
                                </div>
                            </div>



                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="home__series">
        <div class="cases-section cases-section_farm">
            <div class="cases-section__title" id="farm-cases">
                <div class="new-title new-title_with-icon new-title_icon-farm">
                    <div class="new-title__text">Farm cases</div>
                </div>
            </div>
            <div class="cases-section__cases">
                <div class="cases">

                    <div class="cases__item">
                        <a href="/case/farmm4a4" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/FARMM4A4CASE.png" class="case__img">
                            </div>



                            <div class="case__name">Farm M4A4</div>



                            <div class="case__price case__price_old">
                                <div class="case__old-price">
                                    <span class="price price-USD">0.53</span>
                                </div>
                                <div class="case__new-price">
                                    <span class="price price-USD">0.093</span>
                                </div>
                            </div>



                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/farmak47" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/FARMAK-47CASE.png" class="case__img">
                            </div>



                            <div class="case__name">Farm AK-47</div>



                            <div class="case__price case__price_old">
                                <div class="case__old-price">
                                    <span class="price price-USD">0.8</span>
                                </div>
                                <div class="case__new-price">
                                    <span class="price price-USD">0.106</span>
                                </div>
                            </div>



                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/farmawp" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/FARMAWPCASE.png" class="case__img">
                            </div>



                            <div class="case__name">Farm AWP</div>



                            <div class="case__price case__price_old">
                                <div class="case__old-price">
                                    <span class="price price-USD">1.73</span>
                                </div>
                                <div class="case__new-price">
                                    <span class="price price-USD">0.133</span>
                                </div>
                            </div>



                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/farmcovert" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/FARMCOVERTCASE.png" class="case__img">
                            </div>



                            <div class="case__name">Farm Covert</div>



                            <div class="case__price">
                                <div class="case__current-price">
                                    <span class="price price-USD">0.199</span>
                                </div>
                            </div>



                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/farmknife" class="case">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/FARMKNIFECASE.png" class="case__img">
                            </div>



                            <div class="case__name">Farm Knife</div>



                            <div class="case__price case__price_old">
                                <div class="case__old-price">
                                    <span class="price price-USD">5.3</span>
                                </div>
                                <div class="case__new-price">
                                    <span class="price price-USD">2.65</span>
                                </div>
                            </div>



                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="home__series">
        <div class="cases-section cases-section_bonuses">
            <div class="cases-section__title" id="bonus-cases">
                <div class="new-title new-title_with-icon new-title_icon-bonus">
                    <div class="new-title__text">Bonus cases</div>
                </div>
            </div>
            <div class="cases-section__cases">
                <div class="cases">

                    <div class="cases__item">
                        <a href="/case/ezcase" class="case case_bonus">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/EZCASE.png" class="case__img">
                            </div>



                            <div class="case__name">EZ</div>


                            <div class="case__price case__price_bonus">
                                <span class="price price-bonus">1.06</span>
                            </div>


                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/glhfcase" class="case case_bonus">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/GLHFCASEE.png" class="case__img">
                            </div>



                            <div class="case__name">GLHF</div>


                            <div class="case__price case__price_bonus">
                                <span class="price price-bonus">1.99</span>
                            </div>


                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/headshotcase" class="case case_bonus">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/HEADSHOTCASEE.png" class="case__img">
                            </div>



                            <div class="case__name">Headshot</div>


                            <div class="case__price case__price_bonus">
                                <span class="price price-bonus">2.65</span>
                            </div>


                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/ggwpcase" class="case case_bonus">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/GGWPCASEE.png" class="case__img">
                            </div>



                            <div class="case__name">GGWP</div>


                            <div class="case__price case__price_bonus">
                                <span class="price price-bonus">3.98</span>
                            </div>


                        </a>
                    </div>

                    <div class="cases__item">
                        <a href="/case/noscopecase" class="case case_bonus">

                            <div class="case__wrapper-img">
                                <img src="https://images.steamcdn.io/forcedrop/cases/NOSCOPECASE.png" class="case__img">
                            </div>



                            <div class="case__name">No scope</div>


                            <div class="case__price case__price_bonus">
                                <span class="price price-bonus">4.64</span>
                            </div>


                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <div class="home__user-cases">
        <div class="cases-section__title" id="mine-cases">
            <div class="new-title new-title_with-icon new-title_icon-user">
                <div class="new-title__text">Personal cases</div>
            </div>

            <div class="home__series">
                <div class="cases-section cases-section_limited">
                    <div class="cases-section__title" id="limited-cases">
                        <div class="new-title new-title_with-icon new-title_icon-limited">
                            <div class="new-title__text">Limited edition</div>
                        </div>
                    </div>
                    <div class="cases-section__cases">
                        <div class="cases">

                            <div class="cases__item">
                                <a href="/case/summer" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">29536</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">30000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/summerrrrr.png" class="case__img">
                                    </div>



                                    <div class="case__name">Summer</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.18</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/7years" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">31966</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">35000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/Case-FD_7years.png" class="case__img">
                                    </div>



                                    <div class="case__name">7 years Forcedrop</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">2.06</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/mdust2" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">22731</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">30000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/dust2case.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Dust 2</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.73</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/mMirage" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">3472</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">36000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/miragecase.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Mirage</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">2.39</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/mCobblestone" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">17633</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">55000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/cbblest.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Cobblestone</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">4.64</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/mInferno" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">11547</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">26000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/infcase.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Inferno</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">2.19</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/mOverpass" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">7256</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">46000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/overpascase.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Overpass</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/mTrain" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">23659</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">30000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/traincase.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Train</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.2</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/mNuke" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">33433</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">35000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/nukecase.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Nuke</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.464</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/valve" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">4466</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">38000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/valffq.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Valve</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">4.57</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/boombl4" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">15195</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">35000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/boom4.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Boombl4</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">3.32</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">2.26</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/SimpleDimple" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">20809</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">50000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/simple.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Simple Dimple</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.79</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.06</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/popit" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">23098</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">40000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/popit.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Pop It</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.2</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.67</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/vaccine" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">15298</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">36000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/vaccine.png" class="case__img">
                                    </div>



                                    <div class="case__name">Vaccine</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.93</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/coronavirus" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">34089</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">35000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/COR.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Сovid-19</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">2.26</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.46</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/youtube" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">2265</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">35000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/ytcase121.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">YouTube</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.59</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.93</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/twitch" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">6830</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">45000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/twitwwe.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Twitch</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">2.64</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.2</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/TikTok" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">1451</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">35000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/TikTok.png" class="case__img">
                                    </div>



                                    <div class="case__name">Tik Tok</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.32</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/telegram" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">10512</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">37000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/telegram.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Telegram</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.8</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.67</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/twitter" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">42244</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">45000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/twitter.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Twitter</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">2.26</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.93</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/VAC" class="case item-limited">

                                    <div class="case__limit">
                                        <div class="case__limit-inner">
                                            <div class="case__limit-left">340497</div>
                                            <div class="case__limit-separator">/</div>
                                            <div class="case__limit-reserve">350000</div>
                                        </div>
                                    </div>

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/VAC.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Vac Ban</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.398</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.239</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="home__series">
                <div class="cases-section cases-section_cases cases-section_custom-cases">
                    <div class="cases-section__title" id="custom-cases">
                        <div class="new-title new-title_with-icon new-title_icon-custom">
                            <div class="new-title__text">Custom cases</div>
                        </div>
                    </div>
                    <div class="cases-section__cases">
                        <div class="cases">

                            <div class="cases__item">
                                <a href="/case/source2" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/sourcecasee.png" class="case__img">
                                    </div>



                                    <div class="case__name">Source 2</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">9.28</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/hole" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/hole.png" class="case__img">
                                    </div>



                                    <div class="case__name">Hole</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.093</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.027</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/homeless" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/homeless22.png" class="case__img">
                                    </div>



                                    <div class="case__name">Homeless</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.048</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.031</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/nerdcase" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/zadrot.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Nerd</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.046</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.036</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/camouflage" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/camocase.png" class="case__img">
                                    </div>



                                    <div class="case__name">Camouflage</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.073</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/water" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/FD_water.png" class="case__img">
                                    </div>



                                    <div class="case__name">Water</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.106</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/graffiti" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/graff.png" class="case__img">
                                    </div>



                                    <div class="case__name">Graffiti</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.053</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/sticker" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/Nakleiki.png" class="case__img">
                                    </div>



                                    <div class="case__name">Stickers</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.186</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.146</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/chickencase" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/chickencase.png" class="case__img">
                                    </div>



                                    <div class="case__name">Chicken</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.385</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.265</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/ninjadefuse" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/ninkde22.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Ninja defuse</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.18</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/jackpotcase" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/jackpotcase.png" class="case__img">
                                    </div>



                                    <div class="case__name">Jackpot</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.67</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.385</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/CS16" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/CS16.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Counter-Strike 1.6</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.358</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/CSGO" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/CSGOb.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Counter-Strike: Global Offensive</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.53</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/C4" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/bobmbcsfd.png" class="case__img">
                                    </div>



                                    <div class="case__name">C4</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.99</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/FORCEDROP" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/FORCEDROPCASE.png" class="case__img">
                                    </div>



                                    <div class="case__name">FORCEDROP</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">7.95</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">4.91</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/ACE" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/ACEcase.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">ACE</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">6.63</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/eSports" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/CYBERSPORTCASE.png" class="case__img">
                                    </div>



                                    <div class="case__name">Cyber Sport</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">6.36</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/championcase" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/CHAMPIONCASE.png" class="case__img">
                                    </div>



                                    <div class="case__name">Champion</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">23.18</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/Gabe" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/GABENCASE.png" class="case__img">
                                    </div>



                                    <div class="case__name">Gaben</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">31.78</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">19.87</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/rich" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/RICHBOYCASE.png" class="case__img">
                                    </div>



                                    <div class="case__name">Rich boy</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">39.72</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/VIP" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/VIPCASE.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">VIP</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">105.95</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">66.22</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/printstream" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/1PrintStream.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Print stream</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.45</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/MechaIndustries" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/mecha.png" class="case__img">
                                    </div>



                                    <div class="case__name">Mecha Industries</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">7.95</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">4.38</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/safarimesh" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/safarimreere.png" class="case__img">
                                    </div>



                                    <div class="case__name">Safari Mesh</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">5.3</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.53</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/damascussteel" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/DAMASCU.png" class="case__img">
                                    </div>



                                    <div class="case__name">Damascus Steel</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.99</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.398</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/engraving" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/grav.png" class="case__img">
                                    </div>



                                    <div class="case__name">Engraving</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.53</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/Imperial" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/emperial.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Imperial</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">11.26</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">3.32</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/NeoNoir" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/neo.png" class="case__img">
                                    </div>



                                    <div class="case__name">Neo-Noir</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">5.96</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">2.65</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/neon" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/neon.png" class="case__img">
                                    </div>



                                    <div class="case__name">Neon</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.93</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.53</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/WastelandRebel" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/rebel.png" class="case__img">
                                    </div>



                                    <div class="case__name">Wasteland Rebel</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">4.97</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/fade" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/Gradient.png" class="case__img">
                                    </div>



                                    <div class="case__name">Fade</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">2.39</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/HyperBeast" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/hyperbeast1.png" class="case__img">
                                    </div>



                                    <div class="case__name">Hyper Beast</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">2.65</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.79</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/Asiimov" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/asimov.png" class="case__img">
                                    </div>



                                    <div class="case__name">Asiimov</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">3.98</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.99</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/ultraviolet" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/ulta.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Ultraviolet</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">6.03</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/HARDENEDCASE" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/HARDENEDCASE.png" class="case__img">
                                    </div>



                                    <div class="case__name">Hardened</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">59.6</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">19.87</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/agents" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/Agents.png" class="case__img">
                                    </div>



                                    <div class="case__name">Agents</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">5.24</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/glovecase" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/glcases.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Gloves</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">189.39</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/abandoned" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/abandoned2.png" class="case__img">
                                    </div>



                                    <div class="case__name">Abandoned</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.53</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.332</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/scorched" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/scor.png" class="case__img">
                                    </div>



                                    <div class="case__name">Scorched Battle</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.67</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/fire" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/fireee.png" class="case__img">
                                    </div>



                                    <div class="case__name">Fire</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.385</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/SNOWCASE" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/SNOWCASE.png" class="case__img">
                                    </div>



                                    <div class="case__name">Snow</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.06</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.54</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/COWBOYCASE" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/COWBOYCASE.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Cowboy</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.93</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.398</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/yellowcase" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/Case-FD_Yellow.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Yellow</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.53</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/green" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/Case-FD_Green.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Green</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">2.39</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.06</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/rage" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/Case-FD_Red.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Red</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.99</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.53</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/BLACKCASE" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/Case-FD_Black.png" class="case__img">
                                    </div>



                                    <div class="case__name">Black</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.99</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.305</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/silver" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/FD_Silver.png" class="case__img">
                                    </div>



                                    <div class="case__name">Silver</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.67</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/goldcase" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/goldd.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Gold</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">3.32</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">2.51</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/ecocase" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/ecocase.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Eco Round</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">2.19</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.4</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/farmround" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/farmcase.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Farm Round</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.59</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.2</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/forcebuycase" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/forcebuy.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Force Buy</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.8</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/buycase" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/buycase.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Buy Round</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">3.78</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/DragonFire" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/DragonFire.png" class="case__img">
                                    </div>



                                    <div class="case__name">SSG or AWP?</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.93</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.332</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/FW" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/Case-FD_Fire-and-Water.png" class="case__img">
                                    </div>



                                    <div class="case__name">Fire &amp; Water</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">4.64</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.67</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="home__series">
                <div class="cases-section cases-section_youtubers">
                    <div class="cases-section__title" id="youtubers-cases">
                        <div class="new-title new-title_with-icon new-title_icon-bloggers">
                            <div class="new-title__text">Bloggers' cases</div>
                        </div>
                    </div>
                    <div class="cases-section__cases">
                        <div class="cases">

                            <div class="cases__item">
                                <a href="/case/airscape" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/airsmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Airscape</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">2.65</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/milsiq" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/milsiqsmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Milsiq</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">2.65</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/lavieoubourse" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/laviesmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Lavieoubourse</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">2.65</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/rachelr" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/rachelrsmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">RachelR</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">3.32</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/predator" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/predatorsmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Predator</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">3.32</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/vnsof" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/vnssmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">VNS_OF</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">3.32</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/ivanlogan" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/ivanlogansmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Logan</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">3.98</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/Сoffi" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/coffismall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Coffi</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">3.98</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/pokanoname" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/pokasmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Pokanoname</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">4.64</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/QRUSH" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/qrushsmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">QRUSH</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">4.64</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/buster" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/bustersmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Buster</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">4.64</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/skywhywalker" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/skysmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Skywhywalker</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">4.64</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/evelone" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/evelonesmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Evelone</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">4.64</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/JOSKIY" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/joskiysmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Joskiy</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">4.64</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/fry" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/frysmall.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Fry</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">4.64</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="home__series">
                <div class="cases-section cases-section_battle">
                    <div class="cases-section__title" id="battles-cases">
                        <div class="new-title new-title_with-icon new-title_icon-battles">
                            <div class="new-title__text">Battles</div>
                        </div>
                    </div>
                    <div class="cases-section__cases">
                        <div class="cases">

                            <div class="cases__item">
                                <div class="case-special case-special_waiting">
                                    <div class="case-special__img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/hole.png">
                                    </div>
                                    <div class="case-special__title">Hole</div>
                                    <div class="case-special__price price price-RUB">
                                        0.027

                                        <button class="case-special__label-join" action="joinLiveBattle">
                                            <div class="case-special__btn case-special__btn_label"><span class="icon icon_thunder"></span>Join</div>
                                        </button>

                                    </div>
                                    <div class="case-special__btns">
                                        <button class="case-special__btn case-special__btn_second" action="createBattle">
                                            <span class="icon icon_battle"></span>Create battle
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="cases__item">
                                <div class="case-special case-special_waiting">
                                    <div class="case-special__img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseak-47.png">
                                    </div>
                                    <div class="case-special__title">AK-47</div>
                                    <div class="case-special__price price price-RUB">
                                        0.67

                                        <button class="case-special__label-join" action="joinLiveBattle">
                                            <div class="case-special__btn case-special__btn_label"><span class="icon icon_thunder"></span>Join</div>
                                        </button>

                                    </div>
                                    <div class="case-special__btns">
                                        <button class="case-special__btn case-special__btn_second" action="createBattle">
                                            <span class="icon icon_battle"></span>Create battle
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="cases__item">
                                <div class="case-special">
                                    <div class="case-special__img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/graff.png">
                                    </div>
                                    <div class="case-special__title">Graffiti</div>
                                    <div class="case-special__price price price-RUB">
                                        0.053

                                    </div>
                                    <div class="case-special__btns">
                                        <button class="case-special__btn case-special__btn_second" action="createBattle">
                                            <span class="icon icon_battle"></span>Create battle
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="cases__item">
                                <div class="case-special">
                                    <div class="case-special__img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/camocase.png">
                                    </div>
                                    <div class="case-special__title">Camouflage</div>
                                    <div class="case-special__price price price-RUB">
                                        0.073

                                    </div>
                                    <div class="case-special__btns">
                                        <button class="case-special__btn case-special__btn_second" action="createBattle">
                                            <span class="icon icon_battle"></span>Create battle
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="cases__item">
                                <div class="case-special">
                                    <div class="case-special__img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12lake.png">
                                    </div>
                                    <div class="case-special__title">Lake</div>
                                    <div class="case-special__price price price-RUB">
                                        0.08

                                    </div>
                                    <div class="case-special__btns">
                                        <button class="case-special__btn case-special__btn_second" action="createBattle">
                                            <span class="icon icon_battle"></span>Create battle
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="cases__item">
                                <div class="case-special">
                                    <div class="case-special__img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeeTEC-9.png">
                                    </div>
                                    <div class="case-special__title">Tеc-9</div>
                                    <div class="case-special__price price price-RUB">
                                        0.08

                                    </div>
                                    <div class="case-special__btns">
                                        <button class="case-special__btn case-special__btn_second" action="createBattle">
                                            <span class="icon icon_battle"></span>Create battle
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="cases__item">
                                <a href="/battles" class="create-battle-case">
                                    <div class="create-battle-case__content">
                                        <div class="create-battle-case__icon"></div>
                                        <div class="create-battle-case__text">All battles</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="home__series">
                <div class="cases-section cases-section_weapon-cases">
                    <div class="cases-section__title" id="weapon-cases">
                        <div class="new-title new-title_with-icon new-title_icon-weapon">
                            <div class="new-title__text">Weapon cases</div>
                        </div>
                    </div>
                    <div class="cases-section__cases">
                        <div class="cases">

                            <div class="cases__item">
                                <a href="/case/usp" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeUSP-S.png" class="case__img">
                                    </div>



                                    <div class="case__name">USР-S</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.51</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/glock" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseGLOCK.png" class="case__img">
                                    </div>



                                    <div class="case__name">Glоck-18</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.305</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/deagle" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseDESERTEAGLE.png" class="case__img">
                                    </div>



                                    <div class="case__name">Desеrt Eаgle</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.371</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/fn" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseFIVE-SEVEN.png" class="case__img">
                                    </div>



                                    <div class="case__name">Fivе-sevеN</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.146</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/tec9" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeeTEC-9.png" class="case__img">
                                    </div>



                                    <div class="case__name">Tеc-9</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.08</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/P2000" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeP2000.png" class="case__img">
                                    </div>



                                    <div class="case__name">Р2000</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.332</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.265</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/P250" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeP250.png" class="case__img">
                                    </div>



                                    <div class="case__name">Р250</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.12</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.093</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/CZ75" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseCZ75-AUTO.png" class="case__img">
                                    </div>



                                    <div class="case__name">СZ75-АUTO</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.398</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.265</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/DualBerettas" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseDUALBERETTAS.png" class="case__img">
                                    </div>



                                    <div class="case__name">Dual Berettas</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.093</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/R8" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeR8REVOLVER.png" class="case__img">
                                    </div>



                                    <div class="case__name">Rеvоlver R8</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.12</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/MAC10" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeeMAC-10.png" class="case__img">
                                    </div>



                                    <div class="case__name">MAC-10</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.118</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/MP9" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeMP9.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">МP9</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.093</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/MP5SD" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeMP5.png" class="case__img">
                                    </div>



                                    <div class="case__name">МP5-SD</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.133</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.093</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/MP7" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeMP7.png" class="case__img">
                                    </div>



                                    <div class="case__name">МP7</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.106</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/UMP45" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeeUMP-45.png" class="case__img">
                                    </div>



                                    <div class="case__name">UМP-45</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.093</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/Bizon" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/casePP-BIZON.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">PP-Bizon</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.146</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.093</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/p90" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeP90.png" class="case__img">
                                    </div>



                                    <div class="case__name">Р90</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.133</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.093</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/GalilAR" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseGALILAR.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">GАLIL AR</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.226</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.118</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/FAMAS" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseFAMAS.png" class="case__img">
                                    </div>



                                    <div class="case__name">FАMAS</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.186</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/SG553" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeeSG553.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">SG 553</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.265</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.12</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/aug" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseAUG.png" class="case__img">
                                    </div>



                                    <div class="case__name">АUG</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.106</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/ak47" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseak-47.png" class="case__img">
                                    </div>



                                    <div class="case__name">AK-47</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.67</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/m4a1s" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeM4A1-S.png" class="case__img">
                                    </div>



                                    <div class="case__name">М4А1-S</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">3.32</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.53</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/m4a4" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeM4A4.png" class="case__img">
                                    </div>



                                    <div class="case__name">М4А4</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.67</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.398</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/SSG08" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeSSG08.png" class="case__img">
                                    </div>



                                    <div class="case__name">SSG 08</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.106</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/awp" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseawpp.png" class="case__img">
                                    </div>



                                    <div class="case__name">АWP</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.53</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/SCAR20" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeeSCAR-20.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">SCАR-20</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.106</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/G3SG1" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseG3SG1.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">G3SG1</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.12</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.093</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/MAG7" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeMAG-7.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">MАG-7</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.12</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/Sawedoff" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeSawed-Off.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Sаwеd-off</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.093</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/Nova" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeeNova.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Novа</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.08</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/XM1014" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeXM1014.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">XМ1014</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.106</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/negev" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeNegev.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Nеgеv</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.199</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.12</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/M249" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeM249.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">М249</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.265</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="home__series">
                <div class="cases-section cases-section_cases cases-section_other-cases">
                    <div class="cases-section__title" id="classic-cases">
                        <div class="new-title new-title_with-icon new-title_icon-standard">
                            <div class="new-title__text">Classic cases</div>
                        </div>
                    </div>
                    <div class="cases-section__cases">
                        <div class="cases">

                            <div class="cases__item">
                                <a href="/case/revolution" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeRevolution.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Revolution</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.199</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/recoil" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/recoilcasee.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Recoil</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.71</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.226</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/brokenfang" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/BrokenFangcase.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Broken Fang</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.87</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/fracture" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseFracture.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Fracture</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.265</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/DreamsNightmares" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseDreamsNightmares.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Dreams &amp; Nightmares</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.59</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.265</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/snakebite" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeeSnakebite.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Snakebite</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">2.65</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.53</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/OperationRiptideCase" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeRiptide.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Riptide</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.59</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.73</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/Prisma2" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseePrisma2.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Prisma 2</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.265</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/ShatteredWeb" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeShatteredWeb.png" class="case__img">
                                    </div>



                                    <div class="case__name">Shattered Web</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.59</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/CS20" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeCS20.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">CS20</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.332</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/prisma" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseePrisma.png" class="case__img">
                                    </div>



                                    <div class="case__name">Prisma</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.67</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/dangerzonecase" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseDangerZone.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Danger Zone</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.265</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/horizon" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeHorizon.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Horizon</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.398</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/clutch" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseClutch.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Clutch</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.332</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/hydra" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeHydra.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Hydra</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">7.88</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/spectrum" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeeSpectrum.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Spectrum</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.398</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/spectrum2" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeSpectrum2.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Spectrum 2</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.332</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/glove" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/glovecasee.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Glove</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.73</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.53</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/shadow" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeShadow.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Shadow</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.53</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/revolver" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeRevolver.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Revolver</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.398</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/wildfire" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeeWildfire.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Wildfire</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.92</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/gamma2" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseGamma2.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Gamma 2</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.332</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/gamma" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseGamma.png" class="case__img">
                                    </div>



                                    <div class="case__name">Gamma</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.398</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/chroma3" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseChroma3.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Chroma 3</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.332</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/winter_offensive" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeWinterOffensive.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Winter Offensive</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">2.65</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.99</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/breakout" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/Breakoutcasee.png" class="case__img">
                                    </div>



                                    <div class="case__name">Breakout</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.358</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/chroma" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeChroma.png" class="case__img">
                                    </div>



                                    <div class="case__name">Chroma</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.73</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/chroma2" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseChroma2.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Chroma 2</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.398</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/falchion" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseFalchion.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Falchion</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.6</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/huntsman" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeHuntsman.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Huntsman</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">3.17</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/phoenix" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseePhoenix.png" class="case__img">
                                    </div>



                                    <div class="case__name">Phoenix</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">1.99</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.6</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/vanguard" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeeVanguard.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Vanguard</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.66</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/esports_summer_2014" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeSports2014Summer.png" class="case__img">
                                    </div>



                                    <div class="case__name">eSports 2014 Summer</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">3.98</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">3.32</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/esports_2013" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeSports2013.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">eSports 2013</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">4.11</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.53</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/esports_winter_2013" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseeSports2013Winter.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">eSports 2013 Winter</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">2.64</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.06</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/bravo" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/bravocasee.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Bravo</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">17.88</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">9.94</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/weapon" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseCSGOWeapon1.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">CS:GO Weapon</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">31.79</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">4.64</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/weapon_2" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseCSGOWeapon2.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">CS:GO Weapon 2</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">4.38</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.2</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/weapon_3" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/caseCSGOWeapon3.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">CS:GO Weapon 3</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">3.32</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">2.39</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="home__series">
                <div class="cases-section cases-section_collections">
                    <div class="cases-section__title" id="collections-cases">
                        <div class="new-title new-title_with-icon new-title_icon-collections">
                            <div class="new-title__text">Collections</div>
                        </div>
                    </div>
                    <div class="cases-section__cases">
                        <div class="cases">

                            <div class="cases__item">
                                <a href="/case/Anubis" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/anubis.png" class="case__img">
                                    </div>



                                    <div class="case__name">Anubis</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.146</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/2021Dust2Collection" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/dust20211.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Dust 2 2021</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.67</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.332</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/mirage2021" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/mirage20211.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Mirage 2021</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.252</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.146</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/2021TrainCollection" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/train20211.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Train 2021</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.17</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/2021VertigoCollection" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/vertigo2021.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Vertigo 2021</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.6</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/2018InfernoCollection" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12inferno.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Inferno 2018</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.199</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/2018NukeCollection" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12nuke.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Nuke 2018</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.398</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.199</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/controlcollection" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/control1.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Control</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.93</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.265</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/havoccollection" class="case" style="opacity: 0.6;">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12havoc.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Havoc</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.8</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.377</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/ancientcollection" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/anicent.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Ancient</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.65</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/alpha" class="case" style="opacity: 0.6;">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12alpha.png" class="case__img">
                                    </div>



                                    <div class="case__name">Alpha</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">3.25</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/cobblestone" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12cobble.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Cobblestone</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">3.18</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/cache" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12cache.png" class="case__img">
                                    </div>



                                    <div class="case__name">Cache</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">3.12</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/baggage" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12baggage.png" class="case__img">
                                    </div>



                                    <div class="case__name">Baggage</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.8</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/bank" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12bank.png" class="case__img">
                                    </div>



                                    <div class="case__name">Bank</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.146</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.093</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/dust_2" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12dust2.png" class="case__img">
                                    </div>



                                    <div class="case__name">Dust 2</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.332</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/gods_and_monsters" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/gods-of-monster1.png" class="case__img">
                                    </div>



                                    <div class="case__name">Gods and Monsters</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">9.28</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.59</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/chop_shop" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12chop-shop.png" class="case__img">
                                    </div>



                                    <div class="case__name">Chop Shop</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">2.85</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/mirage" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12mirage.png" class="case__img">
                                    </div>



                                    <div class="case__name">Mirage</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">6.89</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.87</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/norse" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/norse1.png" class="case__img">
                                    </div>



                                    <div class="case__name">Norse</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">7.29</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.06</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/nuke" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/nuke-2.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Nuke</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">13.25</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">6.63</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/office" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12office.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Office</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">4.24</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/overpass" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/overpass1.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Overpass</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.332</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/rising_sun" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/1rising-sun.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Rising Sun</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">2.26</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/thecanalscollection" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/canals1.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">The Canals</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">2.85</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/thestmarccollection" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12st-marc.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">St. Marc</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">4.97</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/train" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12train.png" class="case__img">
                                    </div>



                                    <div class="case__name">Train</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">0.08</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/vertigo" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/vertigo-old.png" class="case__img">
                                    </div>



                                    <div class="case__name">Vertigo</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">7.95</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">4.84</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/safehouse" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12safehouse.png" class="case__img">
                                    </div>



                                    <div class="case__name">Safehouse</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.252</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.106</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/militia" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/milita1.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Militia</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.2</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/lake" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12lake.png" class="case__img">
                                    </div>



                                    <div class="case__name">Lake</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.106</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.08</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/italy" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12italy.png" class="case__img">
                                    </div>



                                    <div class="case__name">Itаly</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">0.12</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.093</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/inferno" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/inferno-old.png" class="case__img">
                                    </div>



                                    <div class="case__name">Inferno</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">2.65</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.8</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/dust" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12dust.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Dust</div>



                                    <div class="case__price">
                                        <div class="case__current-price">
                                            <span class="price price-USD">1.33</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/aztec" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/12aztec.png" class="case__img">
                                    </div>



                                    <div class="case__name">Aztec</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">2.12</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">0.8</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                            <div class="cases__item">
                                <a href="/case/assault" class="case">

                                    <div class="case__wrapper-img">
                                        <img src="https://images.steamcdn.io/forcedrop/cases/assault1.png" class="case__img">
                                    </div>


                                    <div class="case__plus-bonus">
                                        <span class="icon icon_bonus"></span>
                                    </div>


                                    <div class="case__name">Assault</div>



                                    <div class="case__price case__price_old">
                                        <div class="case__old-price">
                                            <span class="price price-USD">15.9</span>
                                        </div>
                                        <div class="case__new-price">
                                            <span class="price price-USD">1.2</span>
                                        </div>
                                    </div>



                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="home__advantages">
                <div class="about">
                    <div class="about__inner">
                        <div class="about__logo"></div>
                        <div class="about__items">
                            <div class="about__item about__item_legendary">
                                <div class="about__item-title">Legendary</div>
                                <div class="about__item-text">We are the market leader and have been working for you since 2016</div>
                            </div>
                            <div class="about__item about__item_honest">
                                <div class="about__item-title">Honest</div>
                                <div class="about__item-text">High chances to win the skin you like, millions of our users have seen it</div>
                            </div>
                            <div class="about__item about__item_unique">
                                <div class="about__item-title">Unique</div>
                                <div class="about__item-text">We are constantly working on the functionality of the site to meet the requirements of our users</div>
                            </div>
                            <div class="about__item about__item_responsive">
                                <div class="about__item-title">Responsive</div>
                                <div class="about__item-text">We always listen to the opinion of our users and are ready to help solve any problem</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>











