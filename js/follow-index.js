$(document).ready(function(){
    $(document).on('click','.follow2',function(){
        console.log($(this).attr("id"));
        var ID = $(this).attr('id');
        console.log($('.ajax-follow-'+ID));
        $.ajax({
            type:'POST',
            url:'follow2.php',
            data:'id='+ID,
            success:function(html){
                $('.button-follow-'+ID).remove();
                $('.ajax-follow-'+ID).append(html);
            }
        });
        $('#feed-outstanding').load("include/users-noF.php");
        $('#feed-following').load("include/users-f.php");
    });
});

$(document).ready(function(){
    $(document).on('click','.unfollow2',function(){
        console.log($(this).attr("id"));
        var ID = $(this).attr('id');
        $.ajax({
            type:'POST',
            url:'unfollow2.php',
            data:'id='+ID,
            success:function(html){
                $('.button-follow-'+ID).remove();
                $('.ajax-follow-'+ID).append(html);
            }
        });
        $('#feed-outstanding').load("include/users-noF.php");
        $('#feed-following').load("include/users-f.php");
    });
});