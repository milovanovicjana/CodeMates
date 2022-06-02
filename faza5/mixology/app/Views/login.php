<!-- Autor: Aleksa Vujnić 0479/2019 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - Mixology</title>
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
            <div class="col-sm-12 text-center" >


                <form class="form-signin" method="post" action="<?=site_url("GuestController/login")?>">
                    <p style="color:red"><?php if(isset($message)) echo $message?></p>
                    <input type="text" id="inputUsername" class="form-control" placeholder="User name" name="username" required autofocus>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                    
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                </form>


            </div>
        </div>
    </div>
</body>
</html>