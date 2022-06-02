<?php

namespace App\Controllers;
use App\Models\Model;
use App\Models\PreferencesModel;
use App\Models\RegisteredModel;
use App\Models\UserModel;

/**
 * @author Jana Milovanovic 0292/2019, Ana Vukasinovic 0298/2019, Aleksa Vujnic 0479/2019
 *
 * GuestController - klasa kontrolera za funkcionalnosti neulogovanog korisnika
 */

class GuestController extends BaseController
{
    /**Jana Milovanovic 0292/2019 
     * show - sluzi za prikaz stranica za neulogovanog korisnika, poziva se iz nekih fja ove klase
     * @return void
     */
    public function show($path,$data) {
        
        echo view("Views/guestHeader");
        echo view("Views/$path",$data);
        echo view("Views/footer");
    }

    public function showLogin(){
        $this->show('login',[]);
    }

    public function showRegister(){
        $db= db_connect();
        $model=new Model($db);

        $this->show('register', ['ingredients'=>$model->getRegisterIngredients()]);
    }
    
    /**Jana Milovanovic 0292/2019 
     * index - dohvata 10 najbolje ocenjenih koktela iz baze i prikazuje ih korisniku na pocetnoj strani
     * @return poziv fje show
     */
    public function index()
    {
       $db= db_connect();
       $model=new Model($db);
       $topRatedCocktails=$model->getTopRatedCocktails();
       return $this->show('search',['topRatedCocktails'=>$topRatedCocktails]);
    }
    

    /**Jana Milovanovic 0292/2019 
     * search - sluzi za pretragu koktela u bazi(pretraga se moze vrsiti po nazivu koktela, po sastojku ili po oba parametra)
     * ako korisnik ne unese ni filter ni naziv koktela, kao i ako trazeni koktel ne postoji, dobija odgovarajucu poruku
     * @return dohvaceni kokteli
     */
    public function search() { //dodat ajax

       $db= db_connect();
       $model=new Model($db);
       
       $name=$this->request->getVar('cocktailName');
       $type=$this->request->getVar('Type');
       $filters= $this->request->getVar('filter');
    
       if($name=="" && $type=="" && $filters==[]){
        echo "<p align='center'>  <font size='15pt' ; color='grey'; face='Brush Script MT, Brush Script Std, cursive';><b>";
        echo "Please enter a cocktail name or click on the filters to start searching.";
        echo "</b></font><br> </p>";
           return;
       }
       
      if($filters!=[]) {
          $arrayOfFilters= implode(",", $this->request->getVar('filter'));
          $cocktails=$model->search($arrayOfFilters,$type,$name);
      }
      else{
          $cocktails=$model->search([],$type,$name);
      }

      echo "<script type='text/JavaScript'> 
      jQuery(document).ready(function(){
        var starWidth = 40;
     
         $.fn.stars = function() {
           return $(this).each(function() {
             $(this).html($('<span/>').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * starWidth));
           });
         }
         $(document).ready(function() {
             $('span.stars').stars();
         });});
      </script>";

    
      echo "<table class='table  table-light recipes'>";
      echo "<p align='center'>  <font size='15pt' ; color='grey'; face='Brush Script MT, Brush Script Std, cursive';><b>";
      if($cocktails==null)    echo 'Sorry, no results were found';
      else echo 'Recipe results:';
      echo "</b></font><br> </p>";
      foreach($cocktails as $cocktail){   
                 echo  "<tr>";
                     echo   "<td >";
                            echo "<table style='width: 100%; height: 100%;'>";
                               echo "<tr>";
                                    echo "<td style='background-color: rgb(216, 221, 221);'><img src='";echo base_url('images/cocktails/'.$cocktail->Image)."'";echo "alt='' style='width:150px; height: 200px;'></td>";
                                    echo "<td style='background-color: rgb(216, 221, 221); '><font size='15pt' ; color='grey'; face='Brush Script MT, Brush Script Std, cursive'>";
                                    echo "<b><a href='";
                                    $tip=$session = \Config\Services::session()->get("usertype");
                                    if($tip=="Registered")
                                        echo site_url("RegisteredController/cocktailDisplayRegistered/".$cocktail->IdCocktail);
                                    else if($tip==null) echo site_url("GuestController/cocktailDisplayUnregistered/".$cocktail->IdCocktail);
                                    echo "'>";
                                    echo $cocktail->CocktailName;
                                    echo "</a></b></font><br>";  echo  "<span class='stars'>";
                                    echo $cocktail->AvgGrade ;
                                    echo "</span>"; echo "<br><i>";
                                    echo $cocktail->Description;
                                    echo "</i> </td>"; echo    "</table>";   echo    "</td>";   echo    "</tr>";                        
     }
        echo  "</table>";
    }

    /**Ana Vukašinović 0298/2019
     *  cocktailDisplayUnregistered - sluzi za prikaz informacija o odredjenom koktelu neregistrovanom korisniku
     * @param $id je identifikator koktela cije informacije se prikazuju
     * @return poziv fje show
     */

    public function cocktailDisplayUnregistered($id){
        
        $db= db_connect();
        $model=new Model($db);

        $cocktail = $model->getCocktailById($id);
       
        $steps = $model->getSteps($id);
        $ingredients = $model->getAllIngredientsForCocktail($id);
        return $this->show('cocktail_unregistered',['cocktail'=> $cocktail, 'ingredients'=>$ingredients, 'steps'=>$steps]);

    } 

    /**Aleksa Vujnic 0479/2019 
     * register - kreiranje novog registrovanog korisnika na osnovu podataka popunjenih u okviru forme
     */
    public function register(){

        $firstname = $this->request->getVar('firstname');
        $lastname = $this->request->getVar('lastname');
        $email = $this->request->getVar('email');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $passwordrpt = $this->request->getVar('passwordrpt');
        $birthdate = $this->request->getVar('birthdate');
        $gender = $this->request->getVar('gender');


        $db= db_connect();
        $model=new Model($db);

        $ingredients = $model->getRegisterIngredients();
        $tmpuser = $model->getUserByUsername($username);

        if($birthdate != null){
            $latestValid = date("Y-m-d", mktime(0, 0, 0, date("m"),   date("d"),   date("Y")-18));
            if($birthdate > $latestValid){
                return $this->show('register',['ingredients'=>$model->getRegisterIngredients(), 'message'=>'You must be 18 or older to register.']);
            }
        }

        if($tmpuser!=null){
            return $this->show('register',['ingredients'=>$model->getRegisterIngredients(), 'message'=>'User name already taken.']);
        }

        if($password!=$passwordrpt){
            return $this->show('register',['ingredients'=>$model->getRegisterIngredients(), 'message'=>'Passwords do not match']);
        }

        $userModel = new UserModel();
        $newUser = [
            'Name'=>$firstname,
            'Surname'=>$lastname,
            'Mail'=>$email,
            'Password'=>$password,
            'Username'=>$username,
            'DateOfBirth'=>$birthdate,
            'Gender'=>$gender,
        ];

        $userModel->insert($newUser);
        $newUser = $model->getUserByUsername($username);
        $this->session->set('usertype', 'Registered');
        $this->session->set("user",$newUser);

        $registeredModel = new RegisteredModel();
        $newRegistered = [
            'IdUser'=>$newUser->IdUser
        ];
        $registeredModel->insert($newRegistered);
        
        $preferencesModel = new PreferencesModel();
        foreach ($ingredients as $ingredient) {

            $newPreference=[
                'IdUser'=>$newUser->IdUser,
                'IdIngredient'=>$ingredient->IdIngredient,
                'Value'=>$this->request->getVar($ingredient->IdIngredient),
            ];
            $preferencesModel->insert($newPreference);
        }

        return redirect()->to(site_url('RegisteredController'));
    }


    /**Aleksa Vujnic 0479/2019 
     * login - proverava unete kredencijale korisnika iz forme za logovanje i ukoliko su korektni
     * korisnik dobija ovlascenja svog tipa korisnickog naloga
     */
    public function login(){

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $db= db_connect();
        $model=new Model($db);

        $user = $model->getUserByUsername($username);
        
        if($user==null){
            return $this->show('login',['ingredients'=>$model->getRegisterIngredients(), 'message'=>'User not found.']);
        }

        if($user->Password != $password){
            return $this->show('login',['ingredients'=>$model->getRegisterIngredients(), 'message'=>'Incorrect password.']);
        }
        
        $registeredModel = new RegisteredModel();
        $reguser = $registeredModel->find($user->IdUser);

        $this->session->set('user',$user);
        if($reguser==null){
            $this->session->set('usertype', 'Admin');
            return redirect()->to(site_url('AdminController'));
        }else{
            $this->session->set('usertype', 'Registered');
            return redirect()->to(site_url('RegisteredController'));
        }
        


    }

}
