<!-- Milica Aleksic 716/19 -->

<!-- dodavanje koktela 3/3 -->

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

        <!-- dodavanje koraka u receptu -->
        <div class="container">
            <div class="row center">
                <div class="col-sm-2"> &nbsp; </div>
                <div class="col-sm-8">
                <form method="post" action="<?=site_url("RegisteredController/addSteps")?>">
                <h2>Recipe information (3/3)</h2>
                <br>
                <label>Add your recipe by entering each step by step:</label>
                <br>
                <div class="form-group"> 
                    <textarea class="form-control" id="step" name="step" rows="3"></textarea>
                </div>  
                <button class="btn btn-lg btn-primary btn-block button_add_step btn-light" type="submit">Add step</button>
                <br>
                <br>
                <br>
                </form>
                <button class="btn btn-lg btn-primary btn-block button_finish btn-light" onclick="window.location='<?php echo site_url("RegisteredController/");?>'">Finish</button>
                </div>
                <div class="col-sm-2"> &nbsp; </div> 
        </div>

            
        </div>


    </div>
</body>
</html>