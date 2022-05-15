$(document).ready(function(){
    $(document).on('click','.show_more',function(){
        console.log($(this).attr("id"));
        var ID = $(this).attr('id');
        var username = $(".show_more_username").attr('id');
        $('.show_more').hide();
        $('.loding').show();
        setTimeout(() => {
            $.ajax({
                type:'POST',
                url:'ajax_more.php',
                data:'id='+ID+'&username='+username,
                success:function(html){
                    $('#show_more_main'+ID).remove();
                    $('.usersList').append(html);
                }
            });
        }, 500);
    });
});