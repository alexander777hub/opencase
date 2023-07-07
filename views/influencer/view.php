<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */


?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <?php if (!empty($model)):?>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src=<?= $model['userpic'] ?> alt="userpic" class="rounded-circle img-fluid" style="width: 80px;">
                            <h5 class="my-3"><?= $model['username'] ?></h5>
                            <?php if (!empty($model['niches'])):?>
                                <p class="text-muted mb4"><?= join(', ', $model['niches']) ?></p>
                            <?php endif; ?>
                            <div class="d-flex justify-content-center mb-2">
                                <a href=<?= \yii\helpers\Url::to($model['profile_url']) ?> class="btn btn-primary" target="_blank">
                                    Профиль
                                </a>
                                <?php if (!empty(Yii::$app->user->identity) && !\app\models\Influencer::hasRecord($model['id']) && !Yii::$app->user->isGuest):?>
                                    <button data-id=<?= $model['id'] ?> class="btn btn btn-outline-primary ml-2">Сохранить</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> Аудитория</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?=
                                            ($model['audience'] > 1000)
                                            ? $model['audience'] / 1000 . 'K'
                                            : $model['audience']
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Коэффициент вовлеченности</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= ($model['engagement_rate'] != 0) ? $model['engagement_rate'] : 'неизвестно' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (!empty($model)):?>
    <div class="mt-2">
        <?php foreach($model['insights'] as $insight): ?>
            <span><?= $insight['datawrapper'] ?></span>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<script type="text/javascript">
    $(document).ready(function(){
        var redirect_url = "<?= \yii\helpers\Url::to('/influencer/index', true); ?>";
        $(".btn-outline-primary").on("click", function(){

            console.log($(this).attr("data-id"));
            var id = $(this).attr("data-id");
            $.ajax({
                type: "POST",
                url: "/influencer/create",
                data: { id: $(this).attr("data-id") },
                success: function (response) {
                    console.log(response, "RES");
                    window.location.href = redirect_url;
                },
                error: function (exception) {
                    console.log(exception, "EX");
                    if (exception.status == 200) {
                        window.location.href = redirect_url;
                    }
                },
            });
        });
    })
</script>