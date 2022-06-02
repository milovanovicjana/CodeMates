$(document).ready(function(){

    $("#amount").prop('required',true);

    $("#ingredient-select").mouseleave(function() {
        var groupLabel = $( "#ingredient-select option:selected" ).parent().attr('label');
        if(groupLabel=="ALCOHOL" || groupLabel=="JUICE" || groupLabel=="SYRUP"){
            $("#amount").prop('disabled', false);
            $("#amount").prop('required',true);
        }else{
            $("#amount").val("");
            $("#amount").prop('required',true);
            $("#amount").prop('disabled', true);
        }
    });


});