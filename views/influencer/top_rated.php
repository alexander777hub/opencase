<?php


?>
<table class="table">
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Имя</th>
        <th scope="col">Аудитория</th>
        <th scope="col">Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($data)):?>
        <?php foreach($data as $key=>$value){ ?>
            <tr>
                <td><img src=<?= $value['userpic'] ?> class="rounded-circle img-fluid" style="width: 50px;"></td>
                <td class="font-weight-bold"><?= $value['username'] ?></td>
                <td><?= ($value['audience'] > 1000) ? $value['audience'] / 1000 . 'K' : $value['audience'] ?></td>
                <td><a href=<?= \yii\helpers\Url::to('/influencer/view?id='. intval($value['id'])) ?> class="btn btn-primary">Получить данные</a></td>
            </tr>

        <?php } ?>

    <?php endif; ?>


    </tbody>
</table>


