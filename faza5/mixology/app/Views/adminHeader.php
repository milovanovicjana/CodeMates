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
                <i><font size="5pt" color="grey"></font> </i>  &nbsp;&nbsp;&nbsp;
               <button class="btn btn-light btn-lg"><a href="start_unreg.html"> Sign out</a></button>
               
            </div>
   
        </div>
     

        <div class="row">
        <div class="col-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link " href="<?= site_url("AdminController/index")?>"> Delete accounts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="<?= site_url("AdminController/approveCocktailsPage")?>"> 
                            Approve cocktails</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= site_url("AdminController/")?>">My info</a>
                    </li>
                   
                </ul>
            </div>
        </div>


        <br>
        <br>
        <br>
        
        </body>
   
</html>
        