<!--Jana Milovanovic-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mixology(home page-unreg)</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('images/others/logo5.png')?>"/>

    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('style.css')?>">
    
    
 

</head>

<body>
<div class="row">
   
          
          <div class="col-sm-3">&nbsp;</div>
        
        
          <div class="col-sm-6" style="background-color:white; padding-left: 10px;">
           
          <form method="post" action="<?=site_url("AdminController/deleteAccounts")?>">

              <table class="table table-light " >
                
               
                 
                  <tr style="height: 100px;">
                      <td >
                          <table style="width: 100%; height: 100%; ">
                              <tr >
                                  <th ></th>
                                  <th style="background-color: rgb(216, 221, 221);  text-align: right; vertical-align: middle;"><font color="grey">USER</font></th>
                                 
                                  <th style="background-color: rgb(216, 221, 221);  text-align: right; vertical-align: middle;"><font color="grey">USERNAME</font></th>
                                  <th style="background-color: rgb(216, 221, 221);  text-align: right; vertical-align: middle;"><font color="grey">EMAIL</font></th>
                                  <th style="background-color: rgb(216, 221, 221);  text-align: right; vertical-align: middle;"><font color="grey">NAME</font></th>
                           
                                
                              </tr>
                          </table>
                      
                      </td>
                  </tr>
                  <?php foreach($users as $user){?>
                    <tr style="height: 100px;">
                            <td >
                                <table style="width: 100%; height: 100%; " align="center" cellspacing="0">
                                    <tr >
                                        <td><input type="checkbox" style=" width: 20px; height: 20px" name="users[]" value="<?=$user->IdUser?>"></td>

                                        <td style="background-color: rgb(216, 221, 221); " ><img src="<?php 
                                                if($user->Gender=="M") echo base_url('images/others/avatar_man.png');
                                                else echo base_url('images/others/avatar_woman.png');
                                        ?>" alt="" style="width:140px; height: 130px;"></td>
                                        <td style="background-color: rgb(216, 221, 221);text-align: right;  vertical-align: middle; text-align:center" ><?=$user->Username?></td>
                                        <td style="background-color: rgb(216, 221, 221); text-align: right; vertical-align: middle;" ><?=$user->Mail?></td>
                                        <td style="background-color: rgb(216, 221, 221); text-align: right; vertical-align: middle;" ><?=$user->Name?></td>
                                    
                                    </tr>
                                </table>
                            
                            </td>
                        </tr>

                
                   <?php } ?>
                
                  
              </table>
          </div>
          <div class="col-sm-3">&nbsp;</div>
      </div>
      <div class="row">
            <div class="col" >&nbsp;
                
            </div>
        </div>
        <p style="text-align: center;"> <button class="btn btn-light"> DELETE </button> </p>

                  </form>

</body>

</html>