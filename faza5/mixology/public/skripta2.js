// Set this to the width of one star.


jQuery(document).ready(function(){
   var starWidth = 40;

    $.fn.stars = function() {
      return $(this).each(function() {
        $(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * starWidth));
      });
    }
    $(document).ready(function() {
      $('span.stars').stars();
    });

    $("#save").click(function(){
      $.ajax({url:"/mixology/public/index.php/RegisteredController/saveCocktail", 
      type:"POST",
      data:{
        id:$("#cocktailId").text()
      },
      success: function(result){
        $("#cnt").html(result);
      }});
    });


    $(".star").click(function(){
    grade=$(this).val();
    })


    $("#grade").click(function(){

    $.ajax({url:"/mixology/public/index.php/RegisteredController/gradeCocktail", 
    type:"POST",
    data:{
      id:$("#cocktailId").text(),
      stars:grade
    },
    success: function(result){
      $("#cocktailGrade").html(result);
    }});
});
});