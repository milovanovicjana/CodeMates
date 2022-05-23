<!-- Autor: Aleksa Vujnić 0479/2019 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Mixology</title>
    <link rel="icon" type="image/png" href="images/logo5.png"/>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('style.css')?>">

</head>
<body>
    <div class="container-fluid">

        <br>
        <br>

        <div id="form-register-div">
            <h4>Personal details</h4>
            <p style="color:red"><?php if(isset($message)) echo $message?></p>
            <br>
            <form class="form-register" method="post" action="<?=site_url("GuestController/register")?>">
                <label for="firstname">First name</label>
                <div class="form-group"> 
                <input type="text" class="form-control" id="firstname" name="firstname" required></input>
                </div>
                <label for="lastname">Last name</label>
                <div class="form-group"> 
                <input type="text" class="form-control" id="lastname" name="lastname" required></input>
                </div>
                <label for="email">Email</label>
                <div class="form-group"> 
                <input type="email" class="form-control" id="email" name="email" required></input>
                </div>
                <label for="username">User name</label>
                <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" required></input>
                </div>
                <label for="password">Password</label>
                <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" required></input>
                </div>
                <label for="password">Repeat password</label>
                <div class="form-group">
                <input type="password" class="form-control" id="passwordrpt" name="passwordrpt" required></input>
                </div>

                <label for="birthdate">Birth date</label>
                <div class="form-group">
                <input type="date" class="form-control" id="birthdate" name="birthdate" required></input>
                </div>

                <label >Gender</label>
                <br>
                <div class="form-check form-check-inline">
                    <input type="radio" name="gender" id="male" checked>
                    <label  for="male" style="margin-left: 5px;">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input  type="radio" name="gender" id="female" >
                    <label  for="female" style="margin-left: 5px;">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="gender" id="other">
                    <label for="other" style="margin-left: 5px;">Other</label>
                </div>

                <br><br><br>
                <h4>Drink preferences</h4>
                <br><br>

                <?php 
                foreach($ingredients as $ingredient){
                ?>

                    <input type="range" class="custom-range" min="0" max="10" id="<?=$ingredient->IdIngredient?>range" name="<?=$ingredient->IdIngredient?>">
                    <label for="<?=$ingredient->IdIngredient?>range" class="range-label"><?=$ingredient->Name?></label>
                    
                    <br>

                    
                <?php    
                }
                ?>
                
                

                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            </form>
        </div>

        
            
    </div>
</body>
</html>