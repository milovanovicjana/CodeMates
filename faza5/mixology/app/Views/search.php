<!--Jana Milovanovic-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mixology(home page-unreg)</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('images/others/logo5.png')?>"/>

    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('style.css')?>">
    
    
 

</head>
<body>
   

        
        <div class="row " style="text-align:center">
            <div class="col-4 search">
                   <form method="post" action="<?=site_url("GuestController/search")?>">
               <?php if(isset($message)) echo $message;?>
                <br>
               <input type="text" name="cocktailName" placeholder="Find your perfect cocktail">
              <img src="<?php echo base_url('images/others/search1.png')?>" alt="">
             
            </div>
        </div>

             
        <div class="row">
           
            <div class="col-sm-4  filters">
                <br>
               
              <p class="filter">Filters</p>
                <hr>
                <ul type="square">
                    <li >  <p class="filter1">Type</p>
                       
                        
                            
                                <table  cellpadding="4" style="background-color:rgba(229, 244, 252, 0.89); width:500px; ">
                                    <tr >
                                        <td>  <input type="radio" name="Type" value="Alcoholic">Alcoholic &nbsp; </td>
                                        <td>  <input type="radio"  name="Type" value="Non alcoholic">Non alcoholic</td>
                                    </tr>
                                </table>
                               
                               
                            
                        
                    </li>
                    <hr>
                    <li >
                        <p class="filter1">Alcohols</p>
                      
                      
                                <table  cellpadding="4" style="background-color:rgba(229, 244, 252, 0.89);width:500px;">
                                    <tr >
                                        <td> <input type="checkbox" name="filter[]" value="Vodka">Vodka </td>
                                        <td> <input type="checkbox" name="filter[]" value="Rye Whiskey">Rye Whiskey</td>
                                        <td> <input type="checkbox" name="filter[]" value="Gin">Gin</td>
                                         <td> <input type="checkbox" name="filter[]" value="Aperol"> Aperol</td>
                                    </tr>
                                    <tr>
                                        <td> <input type="checkbox" name="filter[]" value="Dark rum">Dark rum</td>
                                        <td><input type="checkbox" name="filter[]" value="White rum"> White rum</td>
                                        <td><input type="checkbox" name="filter[]" value="Tequila">Tequila</td>
                                        <td> <input type="checkbox" name="filter[]" value="Vermouth">Vermouth</td>
                                      
                                    </tr>
                                     <tr>
                                    
                                        <td> <input type="checkbox" name="filter[]" value="White wine">White wine</td>
                                        <td> <input type="checkbox" name="filter[]" value="Prosecco"> Prosecco</td>
                                        <td> <input type="checkbox" name="filter[]" value="Cointreau">Cointreau</td>
                                        <td> <input type="checkbox" name="filter[]" value="Peach schnapps">Peach schnapps</td>
                                    </tr>
                                    <tr>
                                        <td> <input type="checkbox" name="filter[]" value="Orange liqueur">Orange liqueur</td>
                                        <td> <input type="checkbox" name="filter[]" value="Coconut liqueur">Coconut liqueur</td>
                                        <td> <input type="checkbox" name="filter[]" value="Coffee flavored liqueur">Coffee flavored liqueur</td>
                                        <td> <input type="checkbox" name="filter[]" value="Tripple sec liqueur">Tripple sec liqueur</td>
                                        <td> <input type="checkbox" name="filter[]" value="Blue curacao">Blue curacao</td>
                   
                                    </tr>
                                </table>
                           
                    </li>
                    <hr>
                    <li >
                        <p class="filter1">Syrups</p>
                      
                      
                                <table  cellpadding="4" style="background-color:rgba(229, 244, 252, 0.89);width:500px;">
                                    <tr >
                                        <td> <input type="checkbox" name="filter[]" value="Orgeat syrup">Orgeat syrup </td>
                                        <td> <input type="checkbox" name="filter[]" value="Simple syrup">Simple syrup</td>
                                        <td> <input type="checkbox" name="filter[]" value="Grenadine syrup">Grenadine syrup</td>
                                         <td> <input type="checkbox" name="filter[]" value="Honey syrup"> Honey syrup</td>
                                          <td> <input type="checkbox" name="filter[]" value="Elderflower syrup">Elderflower syrup</td>
                                    </tr>
                                  
                                </table>
                           
                    </li>
                    <hr>
                    <li> <p class="filter1">Juices</p>
                       
                        
                                <table  cellpadding="4" style="background-color:rgba(229, 244, 252, 0.89); width:500px;">
                                    <tr >
                                        <td> <input type="checkbox" name="filter[]" value="Lemon juice">Lemon juice</td>
                                        <td> <input type="checkbox" name="filter[]" value="Lime juice">Lime juice</td>
                                        <td> <input type="checkbox" name="filter[]" value="Orange juice">Orange juice</td>
                                        <td>  <input type="checkbox" name="filter[]" value="Cranberry juice">Cranberry juice</td>
                                    </tr>
                                    <tr>
                                        <td> <input type="checkbox" name="filter[]" value="Grapefruit juice">Grapefruit juice</td>
                                        <td><input type="checkbox" name="filter[]" value="Pineapple juice">Pineapple juice</td>
                                        <td> <input type="checkbox" name="filter[]" value="Apple juice">Apple juice</td>
                                        <td><input type="checkbox" name="filter[]" value="Grape juice"> Grape juice</td>
                                    </tr>
                                     <tr>
                                        <td> <input type="checkbox" name="filter[]" value="Coca cola">Coca cola</td>
                                        <td><input type="checkbox" name="filter[]" value="Coconut milk">Coconut milk </td>
                                        <td> <input type="checkbox" name="filter[]" value="Lemon soda">Lemon soda</td>
                                        <td><input type="checkbox" name="filter[]" value=" Soda">  Soda</td>
                                    </tr>
                                </table>
                           
                    </li>
                    <hr>
                    
                     <li><p class="filter1">Fruits</p>
                        
                      
                                <table  cellpadding="4" style="background-color:rgba(229, 244, 252, 0.89); width:500px;">
                                    <tr >
                                        <td> <input type="checkbox" name="filter[]" value="Apple">Apple </td>
                                        <td> <input type="checkbox" name="filter[]" value="Lime">Lime</td>
                                        <td> <input type="checkbox" name="filter[]" value="Orange">Orange</td>
                                        <td>  <input type="checkbox" name="filter[]" value="Cranberry">Cranberry</td>
                                        <td>  <input type="checkbox" name="filter[]" value="Lemon">Lemon</td>
                                        <td>  <input type="checkbox" name="filter[]" value="Pineapple">Pineapple</td>
                                        <td>  <input type="checkbox" name="filter[]" value="Cherry">Cherry</td>

                                    </tr>
                                </table>
                           
                    </li>
                     <hr>
                    <li><p class="filter1">Others</p>
                        
                      
                                <table  cellpadding="4" style="background-color:rgba(229, 244, 252, 0.89); width:500px;">
                                    <tr >
                                        <td> <input type="checkbox" name="filter[]" value="Ice">Ice </td>
                                        <td> <input type="checkbox" name="filter[]" value="Mint">Mint</td>
                                        <td> <input type="checkbox" name="filter[]" value="Sugar">Sugar</td>
                                        <td>  <input type="checkbox" name="filter[]" value="Coconut cream">Coconut cream</td>
                                        <td>  <input type="checkbox" name="filter[]" value="Cucumber">Cucumber</td>
                                    </tr>
                                </table>
                           
                    </li>
                    <hr>
                    <br>
                 
                        <p style="text-align: center;"> <button class="btn btn-light" type="submit">SEARCH </button>
                  
                   
     
                
                </p> 

                </ul>
               
               
            </div>
             </form>
           
            <div class="col-sm-1" >&nbsp;</div>
           
            <div class="col-sm-6" style="background-color:white; padding-left: 10px;">
                <p align="center">  <font size="15pt" ; color="grey"; face="Brush Script MT, Brush Script Std, cursive";><b>Top 10 highest rated cocktails</b></font><br> </p>
                
                <table class="table  table-light recipes">
               <?php 
                
                foreach($topRatedCocktails as $cocktail){
                    ?>
                          <tr>
                        <td >
                            <table style="width: 100%; height: 100%;">
                                <tr>
                                    <td style="background-color: rgb(216, 221, 221); " ><img src="<?php echo base_url('images/cocktails/'.$cocktail->Image)?>" alt="" style="width:150px; height: 200px;"></td>
                                    <td style="background-color: rgb(216, 221, 221); "><font size="15pt" ; color="grey"; face="Brush Script MT, Brush Script Std, cursive";><b><a href="cocktail_unregistered.html"> <?=$cocktail->CocktailName?></a></b></font><br>
                                        <img src="<?php echo base_url('images/others/starss.png')?>" alt="" style="width:130px; height: 40px;">
                                      
                                     
                                        <br><i><?=$cocktail->Description?></i> </td>
                                   
                                </tr>
                            </table>
                        
                        </td>
                    </tr>
                    
                <?php    
                }
                
                ?>
            
                 </table>
              

               
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>


      
</body>
   
</html>