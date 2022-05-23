<!-- @author Milica Aleksic -->

<html>

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <title>Mixology(user info)</title>
        <link rel="icon" type="image/png" href="images/logo5.png"/>
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url('style_mili.css')?>">
    
    </head>
    
    <body>

            <!--PRIKAZ PERSONALNIH PODATAKA KORISNIKA-->
            <?php $user=$session = \Config\Services::session()->get("user");?>
            <div class="container">
                <div class="row center">
                    <div class="col-sm-3"> &nbsp; </div>
                    <form class="col-sm-6">
                        <h3>My info</h3>
                        <br>
                        <label>First name</label>
                        <div class="form-group"> 
                            <input type="text" value=<?=$user->Name?> class="form-control" disabled> 
                        </div> 
                        <label>Last name</label>
                        <div class="form-group"> 
                            <input type="text" value=<?=$user->Surname?> class="form-control" disabled> 
                        </div>
                        <label>E-mail</label>
                        <div class="form-group"> 
                            <input type="email" value=<?=$user->Mail?> class="form-control" disabled> 
                        </div>
                        <label>Username</label>
                        <div class="form-group"> 
                            <input type="text" value=<?=$user->Username?> class="form-control" disabled> 
                        </div>
                        <label>Birth date</label>
                        <div class="form-group"> 
                            <input type="date" value=<?=$user->DateOfBirth?> class="form-control" disabled> 
                        </div>
                        <label >Gender</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="male" value="M" name="gender" <?php if($user->Gender=="M"){echo "checked";}?> disabled>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="female" value="F" name="gender" <?php if($user->Gender=="F"){echo "checked";}?> disabled>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="other" value="O" name="gender" <?php if($user->Gender=="O"){echo "checked";}?> disabled>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block btn-light button_confirm" type="button" onclick="window.location='<?php echo site_url("RegisteredController/showInfoChange"); ?>'" >Change info</button>
                        <label>Password</label>
                        <div class="form-group"> 
                            <input type="password" value=<?=$user->Password?> class="form-control" disabled> 
                        </div>
                        <button class="btn btn-lg btn-primary btn-block btn-light button_confirm" type="button"onclick="window.location='<?php echo site_url("RegisteredController/showPassChange"); ?>'">Change password</button>
                    </form>
                    <div class="col-sm-3"> &nbsp; </div>
                </div>
            </div>
        </div>  
    </body>      

</html>