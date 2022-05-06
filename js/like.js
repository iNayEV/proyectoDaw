$(document).ready(function(){
    $(document).on('click','.actions_tikTok',function(){
        console.log($(this).attr("id"));
        var ID = $(this).attr('id');
        $.ajax({
            type:'POST',
            url:'likes.php',
            data:'id='+ID,
            success:function(html){
                $('.delete').remove();
                $('.posts-list').append(html);
            }
        });
    });
});

$(document).ready(function(){
    $(document).on('click','.like-red',function(){
        console.log($(this).attr("id"));
        var ID = $(this).attr('id');
        $.ajax({
            type:'POST',
            url:'dislikes.php',
            data:'id='+ID,
            success:function(html){
                $('.delete').remove();
                $('.posts-list').append(html);
            }
        });
    });
});