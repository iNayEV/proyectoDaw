$(document).ready(function(){
    $(document).on('click','#likes',function(){
        console.log("working");
        $.ajax({
            type:'POST',
            url:'ajax/show_likes.php',
            success:function(html){
                $('.remove-content').remove();
                $('.div-content').append(html);
            }
        });
    });
});