$(document).ready(function(){
    $(document).on('click','.toggle--label',function(){
        $.ajax({
            method: "POST",
            url:'theme.php',
            data: {text: ""}
        });
        setTimeout(() => {
            document.location.reload(true);
        }, 500);
    });
});