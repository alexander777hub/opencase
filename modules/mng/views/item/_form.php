<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Item $model */
/** @var yii\widgets\ActiveForm $form */
\app\assets\JQAsset::register($this);

?>

<script type="text/javascript">
    $(document).ready(function(){

        //  $( ".inner" ).append( "<p>Test</p>" );
        var divs = $(".card-body");
        console.log(divs, "DIVS");
        var avatar = "<?= $model && $model->icon ? $model->icon : "/uploads/profile/default.png"  ?>";
        $("#icon").attr("src", avatar);
        $(".card-body").each(function (i) {
            var id = $(this).next().find('img').attr('id');
            var rem = $(this).find('.rem');
            rem.remove();
            var userform_id =  "<?= strval($model->id) ?>";
            console.log(userform_id,"UFID");


            var href = '/mng/item/remove-photo?photo_id=' + id;
            $(this).append("<a href=" + href +
                " class='btn btn-danger ml-2'>Удалить</a>" );


        });
        if($('.avatar')){
            $('.avatar').on("click", function(e){
                // e.preventDefault();
                var id =  $(this).attr("data-id");


            });

        }
    })

</script>

< class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'internal_name')->textInput() ?>
<?= $form->field($model, 'rarity')->textInput() ?>
<?= $form->field($model, 'exterior')->textInput() ?>
    <?= $form->field($model, 'icon_url')->textInput(['maxlength' => true]) ?>
    <img src=<?php  $model->icon_url ? 'https://community.cloudflare.steamstatic.com/economy/image/'.$model->icon_url.'/image.png ' : '/uploads/profile/default.png' ?>>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
