
$(document).ready(function(){
    var modalLoginVisible = false;
    $("#btnLogin").click(function(){
        if(modalLoginVisible){
            $("#modalLogin").slideUp(500);
            $(".cover").fadeOut(500);
            modalLoginVisible = false;
        }
        else{
            $("#modalLogin").slideDown(500);
            $(".cover").fadeIn(500);
            modalLoginVisible = true;
        }
    });
    $(".cover").click(function(){
        if(modalLoginVisible){
            $("#modalLogin").slideUp(500);
            $(".cover").fadeOut(500);
            modalLoginVisible = false;
        }
        else{
            $("#modalLogin").slideDown(500);
            $(".cover").fadeIn(500);
            modalLoginVisible = true;
        }
    });
});