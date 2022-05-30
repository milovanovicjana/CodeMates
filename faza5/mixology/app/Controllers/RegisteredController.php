<?php

namespace App\Controllers;
use App\Models\Model;
use App\Models\PreferencesModel;
use App\Models\UserModel;

class RegisteredController extends BaseController
{
    
    public function show($path,$data) {
        
        echo view("Views/registeredHeader",$data);
        echo view("Views/$path",$data);
        echo view("Views/footer");
    }
    
    public function index()
    {
       $db= db_connect();
       $model=new Model($db);
       $topRatedCocktails=$model->getTopRatedCocktails();
       $user = $this->session->get('user');
       return $this->show('search',['topRatedCocktails'=>$topRatedCocktails, 'firstname'=>$user->Name]);

    }


    public function cocktailDisplayRegistered($id){

        $db= db_connect();
        $model=new Model($db);

        $cocktail = $model->getCocktailById($id);
        $savings = $model->getCntSavings($id);
        $cntSavings=0;
        foreach($savings as $saving) $cntSavings=$cntSavings+1;

        $steps = $model->getSteps($id);
        $ingredients = $model->getAllIngredientsForCocktail($id);
        return $this->show('cocktail_registered',['cocktail'=> $cocktail, 'ingredients'=>$ingredients,'cntSavings'=>$cntSavings,'steps'=>$steps]);

    }

    public function gradeCocktail(){
        $id=$this->request->getVar('id');
        $stars = $this->request->getVar('stars');
 
         $db= db_connect();
         $model=new Model($db);
 
         
         $userId = $this->session->get('user')->IdUser;
 
       
        
         $ocenio = $model->checkGrade($id, $userId);
         if($ocenio == null){
             //ubaci
             $model->insertGrade($id, $userId, $stars);
         }else{
             //update
             $model->updateGrade($id, $userId, $stars);
         }
 
         $allGrades = $model->getAllGradesForCocktail($id);
         $cnt = 0;
         $sum = 0;
         foreach($allGrades as $grade){
             $cnt = $cnt + 1;
             $sum = $sum + $grade->Grade;
         }
 
         $avg = $sum/$cnt;
         $model->updateAvgGradeForCocktail($id, $avg);
 
         $savings = $model->getCntSavings($id);
         $cntSavings=0;
         foreach($savings as $saving) $cntSavings=$cntSavings+1;
 
         $ingredients = $model->getAllIngredientsForCocktail($id);
         $cocktail = $model->getCocktailById($id);
         
         echo $cocktail->AvgGrade."/5";
    }

    public function displaySavedCocktails(){
       $db= db_connect();
       $model=new Model($db);
       $user = $this->session->get('user');
       $savedCocktails=$model->getSavedCocktails($user->IdUser);
       return $this->show('saved_cocktails',['savedCocktails'=>$savedCocktails]);
       
    }

    public function saveCocktail(){
        $id=$this->request->getVar('id');
        $db= db_connect();
        $model=new Model($db);
        $user = $this->session->get('user');
        $userId = $user->IdUser;
        $model->saveCocktailByUser($id,$userId);
        $savings = $model->getCntSavings($id);
        $cntSavings=0;
        foreach($savings as $saving) $cntSavings=$cntSavings+1;
        echo $cntSavings;
    }

    public function unsaveCocktail($id){
       $db= db_connect();
       $model=new Model($db);
       $user = $this->session->get('user');
       $userId = $user->IdUser;
       $model->deleteSavedCocktail($id,$userId);
       $savedCocktails=$model->getSavedCocktails($user->IdUser);
       return $this->show('saved_cocktails',['savedCocktails'=>$savedCocktails]);
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url('GuestController'));
    }


    public function displayRecommendedCocktails(){
        $db= db_connect();
        $model=new Model($db);
        $user = $this->session->get('user');

        $retval = $model->getRecommended($user->IdUser);

        $cocktails = [];

        foreach ($retval as $ingredient) {
            
            if(!array_key_exists($ingredient->IdCocktail, $cocktails)){
                $cocktails[$ingredient->IdCocktail] = $ingredient;
                $cocktails[$ingredient->IdCocktail]->sumAlcohol = 0;
                $cocktails[$ingredient->IdCocktail]->sumGrading = 0;
            }
            $cocktails[$ingredient->IdCocktail]->sumAlcohol += $ingredient->Quantity * 10;
            $cocktails[$ingredient->IdCocktail]->sumGrading += $ingredient->Quantity * $ingredient->Value;
        }

        foreach ($cocktails as $cocktail) {
            if($cocktail->sumGrading != 0){
                $cocktail->match = round(($cocktail->sumGrading / $cocktail->sumAlcohol)*100);
            }else{
                $cocktail->match = 0;
            }
            
        }

        usort($cocktails, function($c1, $c2) {return $c2->match - $c1->match;});

        return $this->show('recommended_cocktails',['recommendedCocktails'=>$cocktails]);
        
    }


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

     // prikazuje pocetnu (1/1) stranicu za dodavanje koktela
     public function showAddCocktail1(){
        return $this->show('add_cocktail_1',[]);
     }

     // prikazuje 3/3 stranicu za dodavanje koktela
     public function showAddCocktail3(){
        return $this->show('add_cocktail_3',[]);
     }

     // prikazuje stranicu za promenu informacija korisnika
     public function showInfoChange(){
        return $this->show('user_info_change',[]);
     }

     // prikazuje stranicu sa informacijama korisnika
     public function showUserInfo(){
        return $this->show('user_info', []);
     }

     // prikazuje stranicu za promenu lozinke korisnika
     public function showPassChange(){
        return $this->show('password_change', []);
    }

    // prikazuje stranicu kviza
    public function showQuiz(){
        return $this->show('quiz', []);
    }

    // funkcija koja dodaje osnovne informacije o koktelu u bazu podataka
    // @return preusmerava na sledecu (2/3) stranicu za dodavanje koktela
    public function addCocktail(){

        $name = $this->request->getVar('name');
        $description = $this->request->getVar('description');
        echo($description);
        $image = $this->request->getFile('image');

        $nameCocktail = $name.'.'.$image->getExtension();
        $image->store('../../public/images/cocktails', $nameCocktail);

        $db= db_connect();
        $model=new Model($db);

        $model->insertCocktail($name, $description, $nameCocktail);

        return redirect()->to(site_url('RegisteredController/showAddCocktail3'));

    }

    // funkcija se poziva na 3/3 stranici za dodavanje koktela i vrsi dodavanje koraka po principu korak po korak
    // @return vraca opet na stranicu za dodavnje koraka
    public function addSteps(){

        $step = $this->request->getVar('step');

        $db= db_connect();
        $model=new Model($db);

        $cocktail = $model->getLastCocktail();

        $IdC = $cocktail->IdCocktail;
        $lastStep = $model->getLastStep($IdC);
        
        if($lastStep == null) {
            $IdS = 1;
        }
        else {
            $IdS = $lastStep->Id + 1;
        }
        $model->addStep($IdC, $IdS, $step);

        return redirect()->to(site_url('RegisteredController/showAddCocktail3'));

    }

    // funkcija menja informacije o korisniku
    // @return vraca stranicu za prikaz informacija
     public function changeInfo(){
        $firstname = $this->request->getVar('firstname');
        $lastname = $this->request->getVar('lastname');
        $email = $this->request->getVar('email');
        $username = $this->request->getVar('username');
        $gender = $this->request->getVar('gender');
        
        $db= db_connect();
        $model=new Model($db);

        $user = $this->session->get('user');
        $userId = $user->IdUser;

        $uUsername = $user->Username;
        if($uUsername != $username){
            $tmpuser = $model->getUserByUsername($username);
            if($tmpuser!=null){
                return $this->show('user_info_change',['message'=>'Username already taken.']);
            }else{
                $model->changeUsername($userId, $username);
            }
        }

        $uName = $user->Name;
        if($uName != $firstname){
            $model->changeName($userId, $firstname);
        }

        $uSurname = $user->Surname;
        if($uSurname != $lastname){
            $model->changeSurname($userId, $lastname);
        }

        $uMail = $user->Mail;
        if($uMail != $email){
            $model->changeMail($userId, $email);
        }

        $uGender = $user->Gender;
        if($uGender != $gender){
            $model->changeGender($userId, $gender);
        }

        $userSession = $model->getUserByUsername($username);
        $this->session->set('user',$userSession);
        $this->session->set('usertype', 'Registered');

        return redirect()->to(site_url('RegisteredController/showUserInfo'));
    }

    // funkcija menja sifru korisnika
    // @return vraca stranicu za prikaz informacija korisnika
    public function changePass(){
        $curpass = $this->request->getVar('curpass');
        $newpass = $this->request->getVar('newpass');
        $newpassconf = $this->request->getVar('newpassconf');

        $db= db_connect();
        $model=new Model($db);

        $user = $this->session->get('user');
        $userId = $user->IdUser;

        $uPass = $user->Password;

        if($curpass != $uPass){
            return $this->show('password_change_miss', []);
        }
        if($newpass != $newpassconf){
            return $this->show('password_change_miss', []);
        }

        $model->changePassword($userId, $newpass);

        $userSession = $model->getUserByUsername($user->Username);
        $this->session->set('user',$userSession);
        $this->session->set('usertype', 'Registered');

        return redirect()->to(site_url('RegisteredController/showUserInfo'));
    }

    // funkcija obradjuje odgovore koje je uneo korisnik i na osnovu rezultata odredjuje rezultat kviza
    // @return vraca stranicu na kojoj ispisuje rezultat kviza
    public function quiz(){

        $question1 = $this->request->getVar('inlineRadioOptions1');
        $question2 = $this->request->getVar('inlineRadioOptions2');
        $question3 = $this->request->getVar('inlineRadioOptions3');
        $question4 = $this->request->getVar('inlineRadioOptions4');
        $question5 = $this->request->getVar('inlineRadioOptions5');

        $sum = $question1 + $question2 + $question3 + $question4 + $question5;

        if($sum < 8){
            return $this->show('quiz_result', ['tekst'=>'You are a Blue Lagoon!', 'slika'=>'bluelagoon']);
        }
        else if($sum < 14){
            return $this->show('quiz_result', ['tekst'=>'You are a Tequila Sunrise!', 'slika'=>'tequilasunrise']);
        }
        else if($sum < 18){
            return $this->show('quiz_result', ['tekst'=>'You are a Mohito!', 'slika'=>'mohito']);
        }
        else if($sum <22){
            return $this->show('quiz_result', ['tekst'=>'You are a Bloody Mary!', 'slika'=>'bloodymary']);
        }
        else{
            return $this->show('quiz_result', ['tekst'=>'You are a Sex On The Beach!', 'slika'=>'sexonthebeach']);
        }
    }

    public function showaddcocktail2(){
        $db= db_connect();
        $model=new Model($db);

        $ingrDB = $model->getAllIngredients();
        $ingrByType = [];

        foreach ($ingrDB as $ingredient) {
            if(!array_key_exists($ingredient->Type, $ingrByType)){
                $ingrByType[$ingredient->Type] = [];
            }
            array_push($ingrByType[$ingredient->Type], $ingredient);
        }

        $this->show("add_cocktail_ingr",['ingrByType'=>$ingrByType]);
    }



}