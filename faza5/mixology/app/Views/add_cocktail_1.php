<!-- Milica Aleksic 716/19 -->

<!-- dodavanje koktela 1/3 -->

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
    <link rel="stylesheet" href="<?php echo base_url('style_mili.css')?>">

</head>
<body>

    <!-- unos opstih informacija o koktelu -->
    <div class="container">
        <div class="row center">
            <div class="col-sm-2"> &nbsp; </div>
            <div class="col-sm-8">
            <?= form_open_multipart('RegisteredController/addCocktail') ?>                
            <h2>Basic information (1/3)</h2>
                <br>
                <label>Name</label>
                <div class="form-group"> 
                    <input type="text" name="name" class="form-control" required> 
                </div> 
                <label>Description</label>
                <div class="form-group"> 
                    <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                </div> 
                <label>Image</label>
                <div class="form-group"> 
                    <input type="file" name="image"> 
                </div>
                <label>Recipe</label>
                <div class="form-group"> 
                    <textarea class="form-control" name="recipe" id="recipe" rows="5"></textarea>
                </div> 
                <br>
                <button class="btn btn-lg btn-primary btn-block button_next btn-light" type="submit">Next</button>
                <br>
            </form> 
            </div>
            <div class="col-sm-2"> &nbsp; </div> 
        </div>
    </div>

</body>
</html>