<!DOCTYPE html>
<!--Jana Milovanovic-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mixology(home page-admin-approve)</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('images/others/logo5.png')?>"/>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('style.css')?>">
    <script src="<?php echo base_url('skripta2.js')?>"></script>

</head>
<body>
    <div class="container-fluid">
   
    
        <div class="row">
          
            <div class="col-sm-1">&nbsp;</div>
           
          
            <div class="col-sm-10" style="background-color:white; padding-left: 10px;">
        
            <div class="stars">
                        <span class="star on"></span>
                        <span class="star half"></span>
                        <span class="star"></span>
                    </div>
            <form method="post" action="<?=site_url("AdminController/approveCocktails")?>">
                <table class="table table-light"> 
                    <?php foreach($cocktails as $cocktail){  ?>       
                    <tr>
                        <td >
                            <table style="width: 100%; height: 100%;">
                         
                                <tr>
                                    <td><input type="checkbox" style=" width: 20px; height: 20px" name="cocktail[]" value="<?=$cocktail->IdCocktail ?>"></td>
                                    <td style="background-color: rgb(216, 221, 221); " ><img src="<?php echo base_url('images/cocktails/'.$cocktail->Image)?>" alt="" style="width:120px; height: 150px;"></td>
                                    <td style="background-color: rgb(216, 221, 221); "><font size="15pt" ; color="grey"; face="Brush Script MT, Brush Script Std, cursive";><b> <?=$cocktail->CocktailName?></b></font><br>
                                    <br><i><?=$cocktail->Description?></i> </td>
                                   
                                </tr>
                            </table>
                        
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>

      
        <div class="row">
            <div class="col" >&nbsp;
                
            </div>
        </div>

        <p style="text-align: center;"> <input type="radio" name="type" value="A" checked> APPROVE 
        <input type="radio" name="type" value="R"> REJECT </button>   
        <button class="btn btn-light"> SUBMIT </button>     
    </form> </p>
    

    
</body>

</html>