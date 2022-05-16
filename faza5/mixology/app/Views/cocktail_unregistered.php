<!--Ana Vukašinović-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktail(Unregistered)</title>
    <link rel="icon" type="image/png" href="images/logo5.png"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <link rel="stylesheet" href="<?php echo base_url('style_cocktail.css')?>">
</head>
<body>

    <div class="container-fluid">

        
        <div class="row">
            <div class="col-sm-6">
            &nbsp;&nbsp;
            </div>
            <div class="col-sm-6 ranges" align=right>
            <?=$cocktail->AvgGrade."/5" ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3" style="margin-bottom:20px" >&nbsp; &nbsp;</div>
            <div class="col-sm-9"></div>
        </div>

        

        <div class="row" >
            <div class="col-sm-4 slikaKoktela" style="margin-top:5px" >
                <img name="cocktail_image" src="<?php echo base_url('images/cocktails/'.$cocktail->Image)?>" alt="">
                <br>
                <br>
                <div class="ingredients">
                    <ul type="square" class="uli">
                        <h3 class="ing1">Ingredients:</h3>
                        <?php 
                            foreach($ingredients as $ingredient){
                         ?>
                            <?php 
                                if($ingredient->Type != "OTHER" && $ingredient->Type != "FRUIT"){
                                    $quantity = $ingredient->Quantity."ml";
                                }else{
                                    $quantity="";
                                }
                            ?>
                            <li><?=$quantity." ".$ingredient->Name ?></li>
                           
                        <?php 
                            }
                         ?>
                    </ul>
                </div>
                <div id="price" >Average price : <?=$cocktail->Price?>&euro; </div>
            </div>
            <div class="col-sm-8 center" >
                <p><?=$cocktail->Recipes?>

                
                
                    
                <!--The Mojito is one of the most popular rum cocktails served today, with a recipe known around the world. The origins of this classic drink can be traced to Cuba and the 16th-century cocktail El Draque. Named for Sir Francis Drake, the English sea captain and explorer who visited Havana in 1586, El Draque was composed of aguardiente (a cane-spirit precursor to rum), lime, mint and sugar. It was supposedly consumed for medicinal purposes, but it’s easy to believe that drinkers enjoyed its flavor and effects.

                <br>
                <br>
                <br>

                Appropriately, almost all of the ingredients in the Mojito are indigenous to Cuba. Rum, lime, mint and sugar (the island nation grows sugar cane) are joined together and then lengthened with thirst-quenching club soda to create a delicious, lighthearted cocktail. The drink is traditionally made with unaged white rum, which yields a light, crisp flavor. Using Cuban rum will score you points for authenticity, although many modern Cuban rums are lighter in style than their predecessors, so you might try experimenting with white rums until you find one that you like best.

                <br>
                <br>
                <br>

                The Mojito is slightly more labor-intensive than other cocktails because it involves muddling the mint, but the end result is worth the effort. The mint combines with the other ingredients for an extra dose of refreshment that, while often associated with summer, can be enjoyed any time of the year.

                <br>
                <br>
                <br>
                
                If you prefer your cocktails with a dash of literary history, you’re in luck. The Mojito is said to have been a favorite of Ernest Hemingway who, according to local lore, partook of them regularly at the Havana bar La Bodeguita del Medio.
                
                <br>
                <br>
                <br>
                

                <ol type="1">

                    <h3>Steps:</h3>
                    <br>
                        <li> Lightly muddle the mint with the simple syrup in a shaker.</li>   <br>
                        <li> Add the rum, lime juice and ice, and give it a brief shake.</li>   <br>
                        <li> Strain into a highball glass over fresh ice.</li>   <br>
                        <li> Top with the club soda.</li>   <br>
                        <li> Garnish with a mint sprig and lime wheel.</li>   <br>
                </ol>
                        -->  

                </p>
            </div>
        </div>

       
        

    </div>
</body>
</html>