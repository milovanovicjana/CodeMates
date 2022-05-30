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

    <div class="row">
        <div class="col-sm-12 text-center">
            <h3>Pick an ingredient and add it to the cocktail:</h3>
            <br>
        </div>
        <div class="col-sm-12 text-center">

            <form>
                <select class = "custom-select" id="ingredient-select">
                <?php 
                    foreach ($ingrByType as $ingrTypeKey => $ingrTypeValue) {
                        echo "<optgroup label=".$ingrTypeKey.">";
                        foreach ($ingrTypeValue as $ingredient) {
                            echo "<option>".$ingredient->Name."</option>";
                        }
                    }
                ?>
                </select>

                <input id="amount" type="number" placeholder="amount in mililiters">
                <button class="btn btn-light" id="submit-btn" type="submit">Add</button>

            </form>
            
            <br>
        </div>

    </div>


</body>
</html>