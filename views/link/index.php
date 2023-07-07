<?php



?>



<table class="table">
    <thead>
    <tr>
        <th scope="col">Анкета</th>
        <th scope="col">Ссылка</th>
        <th scope="col">Истекает</th>
    </tr>
    </thead>
    <tbody>
    <?php   if(!empty($links)): ?>

        <?php foreach($links as $key=>$val){ ?>
            <tr>
                <td><?= $val['id'] ?></td>
                <td><?= $key ?></td>
                <td><?= intval($val['exp']) . ' ' . "мин" ?></td>
            </tr>
        <?php } ?>

    <?php   endif; ?>



    </tbody>
</table>
