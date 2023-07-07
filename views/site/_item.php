<?php

/* @var $model app\models\Ad */
use app\models\Profile;
use app\models\Ad;
use app\models\Userform;


$userform = \app\models\Userform::find()->where(["user_id" => $model->user_id])->one();


/*var_dump($model->user_id);
if($userform){
    var_dump($userform->user_id);
} */
if ($userform && !$userform->avatar_id ){
    $src = "/uploads/profile/default.png";
} else {
    if(!$userform){
        $src =  "/uploads/profile/default.png";

    } else {
        $src =  Userform::getAvatarUrl($userform->avatar_id);

    }

}

//$age = $userform && $userform->was_born ? \app\models\Userform::getAge($userform->was_born) : "Не задано";

$city = $userform && $userform->city_id && isset(\app\models\Profile::$city_list[$userform->city_id]) ? \app\models\Profile::$city_list[$userform->city_id] : "Не задано";

$name = $userform && $userform->first_name ? $userform->first_name  : "Не задано";
    $sex =$userform && \app\models\Profile::$sex_list[$userform->sex] && $userform->sex != 0 ? \app\models\Profile::$sex_list[$userform->sex] : 'Не задано';
//$model->description = trim(htmlentities(strip_tags($model->description), ENT_QUOTES, 'UTF-8'));
$type = $model->type && isset(Ad::getTypeList()[$model->type]) ? Ad::getTypeList()[$model->type] : "Не задано";

?>


<div class="card flex-row flex-wrap" style="width: 18rem;">
    <div class="card-header border-0">
        <img width="100" height="111" src="<?= $src  ?>" alt="">
    </div>
    <div class="card-block px-2">
        <h4  class="card-title mt-2"><?= $name  ?></h4>
        <p class="card-text"><?= $sex  ?></p>
        <p class="card-text"><?= $city  ?></p>
        <p class="card-text"><?= $type  ?></p>
    </div>
    <div class="w-100"></div>
    <div class="card-footer w-100 text-muted">
        <a href=<?= \yii\helpers\Url::toRoute('/site/view?id=' . strval($model->id))   ?> class="btn btn-primary mb-2">Просмотр</a>
    </div>
</div>





