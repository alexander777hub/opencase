var tbody =  $("#w1").find('.table').find('tbody');
tbody.attr("id", "comments");

$(".show-comment").on("click", function(){
    $("#send").val($(this).attr("data-id"));

    $("#send").on("click", function(){
        var data = {

        }
        data.comment =  $("#text-comment").val();
        data.userform_id = $("#send").val();
        console.log(data, "DATa");
        $.ajax({
            type: "POST",
            url: '/comment/add',
            ContentType: 'application/json',
            data: {'data': data},
            success    : function (data) {
               console.log("SUCCESS");
                $("#text-comment").val(' ');
               if(data.error == 0){
                   alert(data.success);
                   console.log(data, 'DATA');


                   var href = "/userform/remove-comment?id=" + data.id + '&userform_id=' + data.userform_id;
                   var html2 = '<div data-key=' + data.id +'>\n' +
                       '\n' +
                       '<div class="d-flex flex-row comment-row">\n' +
                       '    <div class="p-2"><span class="round"></span></div>\n' +
                       '    <div class="comment-text w-100">\n' +
                       '        <div class="comment-footer">\n' +
                       '            <span class="date"> ' + data.username +' </span>\n' +
                       '            <span class="label label-info">'+ data.created_at +'</span>\n' +
                       '            <span class="action-icons">\n' +
                       '                <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a>\n' +
                       '                <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a>\n' +
                       '                <a href="#" data-abc="true"><i class="fa fa-heart"></i></a>\n' +
                       '            </span>\n' +
                       '        </div>\n' +
                       '        <p class="m-b-5 m-t-10">' + data.text +'</p>\n' +
                       '    </div>\n' +
                       '   <a href=' + href +'>\n' +
                       '       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">\n' +
                       '           <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>\n' +
                       '           <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>\n' +
                       '       </svg>\n' +
                       '   </a>\n' +
                       '\n' +
                       '\n' +
                       '\n' +
                       '</div></div>';
                   var html = '<tr data-key=' + data.id +'>' +
                       '<td>'+data.id+'</td>' +
                       '<td>' + data.user_id +
                        '</td>' +
                        '<td>' + data.text +
                        '</td><td> <a href=' + href +
                        ' + title="Удалить"' +
                       ' aria-label="Удалить" data-pjax="0"' +
                       ' data-confirm="Вы уверены, что хотите удалить этот элемент?"' +
                       ' data-method="post"><svg aria-hidden="true"' +
                       ' style="display:inline-block;font-size:inherit;height:1em;overflow:visible;' +
                       'vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg"' +
                       ' viewBox="0 0 448 512"><path fill="currentColor" ' +
                       'd="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"></path></svg></a></td>' +
                       '</tr>';
                 //  console.log($("#w1").find('.table').find('tbody'), "FIND");
                  // var tbody =  $("#w1").find('.table').find('tbody');
                   //tbody.append('<tr data-key="1"><td>1</td><td>TEST</td><td>sdds</td><td> <a href="/userform/delete?id=1" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"></path></svg></a></td></tr>');

                   $(".comment-widgets").append(html2);
                   // tbody.append(html);
                   // $("tbody")[1].append('<tr></tr>');
                    //console.log($("tbody")[1], "TBODY");
               } else {
                   alert(data.error);
               }
                $('.modal').modal('hide');


            },
        });

    })
});