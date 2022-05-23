<!--Jana Milovanovic-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mixology(home page-unreg)</title>
    <link rel="icon" type="image/png" href="images/others/logo5.png"/>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('style.css')?>">

</head>
<body>
    <div class="container-fluid">
      
        <div class="row header">
            <div class="col-4">
       
             </div>
             <div class="col-4 title">
               <a href="#go"></a>   Mixology  
            </div>
            <div class="col-4 logo">
                
               <img src="<?php echo base_url('images/others/logo5.png')?>" alt="">
               <button class="btn btn-light btn-lg" onclick="window.location='<?php echo site_url("GuestController/showLogin"); ?>'" >Log in</button>
               <button class="btn btn-light btn-lg"  onclick="window.location='<?php echo site_url("GuestController/showRegister"); ?>'" ">Sign up</button>
            </div>
   
        </div>
     

        <div class="row">
            <div class="col-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url("GuestController/index")?>"> Home page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled " href="#"> Recommended</a>
                    </li>
                   
                    <li class="nav-item ">
                        <a class="nav-link disabled" href="#">Saved</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Add new cocktail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">My info</a>
                    </li>
                  
                </ul>
            </div>
        </div>


        <br>
        <br>
        <br>
        
        </body>
   
</html>
        