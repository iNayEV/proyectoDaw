$(document).ready(function(){
    $(document).on('click','.follow',function(){
        console.log($(this).attr("id"));
        var ID = $(this).attr('id');
        $.ajax({
            type:'POST',
            url:'follow.php',
            data:'id='+ID,
            success:function(html){
                $('.button-follow').remove();
                $('.ajax-follow').append(html);
            }
        });
    });
});

$(document).ready(function(){
    $(document).on('click','.unfollow',function(){
        console.log($(this).attr("id"));
        var ID = $(this).attr('id');
        $.ajax({
            type:'POST',
            url:'unfollow.php',
            data:'id='+ID,
            success:function(html){
                $('.button-follow').remove();
                $('.ajax-follow').append(html);
            }
        });
    });
});