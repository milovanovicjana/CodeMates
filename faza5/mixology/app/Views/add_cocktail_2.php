<!-- Autor: Aleksa Vujnić 0479/2019 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new cocktail - Mixology</title>
    <link rel="icon" type="image/png" href="images/logo5.png"/>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('style.css')?>">
    <script src="<?php echo base_url('skripta.js')?>"></script>

</head>
<body>
    
    <div class="row center">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">

            
            <h2>Add ingredients to the cocktail (2/3)</h2>
            <br>
            <form class="form-inline" method="post" action="<?=site_url("RegisteredController/addIngredient")?>">

                <div class="form-group mb-2">
                    <select class = "custom-select" id="ingredient-select" name='idIngredient'>
                    <?php 
                        foreach ($ingrByType as $ingrTypeKey => $ingrTypeValue) {
                            echo "<optgroup label=".$ingrTypeKey.">";
                            foreach ($ingrTypeValue as $ingredient) {
                                echo "<option value='".$ingredient->IdIngredient."'>".$ingredient->Name."</option>";
                            }
                        }
                    ?>
                    </select>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <input class="form-control" id="amount" type="number" placeholder="amount in mililiters" name='quantity'>
                </div>

                <button class="btn btn-success mb-2" id="submit-btn" type="submit">Add</button>
            
            </form>

            <br>
            <button class="btn btn-lg btn-primary btn-block btn-light" onclick="window.location='<?php echo site_url("RegisteredController/showAddCocktail3");?>'">Next</button>
            

        </div>
        <div class="col-sm-2"></div>
    </div>


</body>
</html>