<!-- Milica Aleksic 716/19 -->

<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mixology(pass change)</title>
    <link rel="icon" type="image/png" href="images/logo5.png"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('style_mili.css')?>">

</head>

<body>

        <!--PROMENA LOZINKE - POGRESAN UNOS-->

        <div class="container">
            <div class="row center">
                <div class="col-sm-4"> &nbsp; </div>
                <form class="col-sm-4" method="post" action="<?=site_url("AdminController/changeAdminPass")?>">
                    
                    <label id="wr_in">Wrong input</label>
                    <div class="form-group"> 
                        <input type="password" class="form-control is-invalid" placeholder="Current Password" name="curpass" required> 
                    </div> 
                    <label>&nbsp;</label>
                    <div class="form-group"> 
                        <input type="password" class="form-control is-invalid" placeholder="New Password" name="newpass" required> 
                    </div> 
                    
                    <div class="form-group"> 
                        <input type="password" class="form-control is-invalid" placeholder="Confirm Password" name="newpassconf" required> 
                    </div> 
                    
                    <button class="btn btn-lg btn-primary btn-block button_confirm btn-light">Change password</button>

                </form> 
                <div class="col-sm-4"> &nbsp; </div> 
            </div>
        </div>

</body>

</html>