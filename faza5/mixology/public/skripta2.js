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

    $("#search").click(function(){
 
      myArray=[];
      $('.filters input:checked').each(function() {
         if($(this).attr("name")!="Type") myArray.push($(this).val()); 
      });

      userType=$("#userType").text().trim();

      if(userType=="Registered"){
        u="/mixology/public/index.php/RegisteredController/search";
      }
      else{
        u="/mixology/public/index.php/GuestController/search";
      }
      
      $.ajax({
        url:u, 
          type:"POST",
          data:{
            cocktailName:$("#cName").val(),
            Type:$('input[name=Type]:checked', '.filters').val(),
            filter:myArray
          },
        success: function(result){
          $("#results").html(result);
        }});
    });
});