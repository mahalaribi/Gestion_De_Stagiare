// *********************************code fournisseur***********************************************
$(document).ready(function() {
    $("#mySelect").on('change',function() {
    var value = $(this).val();
    $.ajax({
    url: "photosecritaireajax.php",
    type: "POST",
    data:'request=' + value,
    beforeSend:function(){
    $("#data-container").html("<span>woorjkin...</span>");
    },
    success:function(data){
    $("#data-container").html(data);
    }
    });
    });
    });