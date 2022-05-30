<!-- Milica Aleksic 716/19 -->

<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mixology(quiz)</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('images/others/logo5.png')?>"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('style_mili.css')?>">
    

</head>

<body>


<div class="container">
    <div class="row center">
        <div class="col-sm-2"> &nbsp; </div>
        <div class="col-sm-8">
            
        <h2 style="text-align:center"><?php echo $tekst ?></h2>
        <br>
        <img src="<?php echo base_url('images/others/'.$slika.'.png')?>" alt="" height="600" width="150" id="cocktail_picture">
        <br>
        <button class="btn btn-lg btn-primary btn-block btn-light button_confirm" onclick="window.location='<?php echo site_url("RegisteredController/");?>'">Return</button>
        </div>
        <div class="col-sm-2"> &nbsp; </div>
    </div>
</div>


</body>

</html>