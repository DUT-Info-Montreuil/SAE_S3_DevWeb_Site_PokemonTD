console.log("TRI FILTRE JS");

$(document).ready(function(){
    $(".boiteTour__triButton").click(function(){
        console.log("CA MARCHE");

        $.ajax({
            url: 'back/ajax/getTourDisponible.php',
            type: 'GET',
            dataType: 'json',
            success: function(response){
                console.log(response);
            },
            error: function(error){
                console.log('Il y a une erreur ????', error);
            }
        });

    });
});