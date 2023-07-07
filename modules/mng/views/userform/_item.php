
<?php


$model->created_at = explode(' ', $model->created_at)[0];

$href = '/userform/remove-comment?id=' . $model->id . '&userform_id=' . $model->userform_id;

?>

<div class="d-flex flex-row comment-row">
    <div class="p-2"><span class="round"></span></div>
    <div  class="comment-text w-100">
        <div class="comment-footer">
            <span class="date"><?= $model->user_name ?></span>
            <span class="label label-info"><?=$model->created_at   ?></span>
            <span class="action-icons">
                <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a>
                <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a>
                <a href="#" data-abc="true"><i class="fa fa-heart"></i></a>
            </span>
        </div>
        <p class="m-b-5 m-t-10"><?= nl2br($model->text) ?></p>
    </div>
   <a href=<?= $href  ?>>
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
           <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
           <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
       </svg>
   </a>



</div>