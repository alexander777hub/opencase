<?php

/* @var $model app\models\Ad */
use app\models\Userform;

$src =  Userform::getAvatarUrl($model->avatar_id);



?>

<div class="card" style="width: 18rem;">
    <?php if($src == \app\models\Profile::DEFAULT_PROFILE_ICON):   ?>
    <img height="380"  class="card-img-top" src="<?= $src  ?>" alt="Card image cap">
    <?php else:   ?>
        <img   class="card-img-top" src="<?= $src  ?>" alt="Card image cap">
    <?php endif;   ?>
    <div class="card-body">
        <h4  class="card-title mt-2">
            <a href=<?= "test/view?id=" . $model->id ?>><?= $model->first_name ?  $model->first_name : "Не указано"  ?></a>
        </h4>
    </div>
</div>








