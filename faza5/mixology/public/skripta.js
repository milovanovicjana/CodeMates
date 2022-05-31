$(document).ready(function(){

    $("#ingredient-select").mouseleave(function() {
        var groupLabel = $( "#ingredient-select option:selected" ).parent().attr('label');
        if(groupLabel=="ALCOHOL" || groupLabel=="JUICE" || groupLabel=="SYRUP"){
            $("#amount").prop('disabled', false);
        }else{
            $("#amount").val("");
            $("#amount").prop('disabled', true);
        }
    });


});