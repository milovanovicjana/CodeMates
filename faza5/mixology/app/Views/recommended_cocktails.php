<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved</title>
    <link rel="icon" type="image/png" href="images/logo5.png"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('style.css')?>">
</head>
<body>

    <div class="container-fluid">

       

       <div class="row">
           <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-6" style="background-color:white; padding-left: 10px;">
                <p align="center">  <font size="15pt" ; color="grey"; face="Brush Script MT, Brush Script Std, cursive";><b>Recommended cocktails</b></font><br> </p>
                
                <table class="table  table-light recipes">
               <?php 
                
                foreach($recommendedCocktails as $cocktail){
                    ?>
                          <tr>
                        <td >
                            <form method="post" action="<?=site_url("RegisteredController/unsaveCocktail/".$cocktail->IdCocktail)?>">
                                <table style="width: 100%; height: 100%; ">
                                    <tr>
                                        <td style="background-color: rgb(216, 221, 221); " ><img src="<?php echo base_url('images/cocktails/'.$cocktail->Image)?>" alt="" style="width:150px; height: 200px;"></td>
                                        <td style="background-color: rgb(216, 221, 221); "><font size="15pt" ; color="grey"; face="Brush Script MT, Brush Script Std, cursive";><b><a href="
                                        <?php $tip=$session = \Config\Services::session()->get("usertype");
                                            echo site_url("RegisteredController/cocktailDisplayRegistered/".$cocktail->IdCocktail);
                                        ?>
                                        "> <?=$cocktail->CocktailName?></a></b></font><br>

                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $cocktail->match ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $cocktail->match ?>% match</div>
                                        </div>

                                        <br><i><?=$cocktail->Description?></i> </td>
                                    
                                    </tr>
                                </table>
                            </form>
                        
                        </td>
                    </tr>
                    
                <?php    
                }
                
                ?>
            
                 </table>
              

               
            </div>
            <div class="col-sm-3">&nbsp;</div>
       </div>

    </div>

    
</body>
</html>