<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class Model
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }
    
    public function search( $arrayOfFilters,$type,$name){
        
       if($arrayOfFilters!=[]){
                $arrayOfFilters= explode(",", $arrayOfFilters);
                $count= count($arrayOfFilters); //countOfFilters
                $b=$this->db->table('cocktail')
                   ->join('contains','cocktail.IdCocktail=contains.IdCocktail')
                   ->join('ingredient','contains.IdIngredient=ingredient.IdIngredient');
                   $b->whereIn('ingredient.Name',$arrayOfFilters)
                   ->groupBy('cocktail.IdCocktail')
                   ->having('COUNT(cocktail.IdCocktail)', $count);
        }
        else{
                    $b=$this->db->table('cocktail')
                   ->join('contains','cocktail.IdCocktail=contains.IdCocktail')
                   ->join('ingredient','contains.IdIngredient=ingredient.IdIngredient')
                   ->groupBy('cocktail.IdCocktail');
        }
       
        if($type=="Alcoholic")$b->where ('Alcoholic',1);
        if($type=="Non alcoholic")$b->where ('Alcoholic',0);
        if($name!=""){
            $b->like('CocktailName',$name);
            
        }
  
        $b->where('Approved',1);//only approved cocktails
    

        return $b->get()->getResult();
    }
    
    public function getTopRatedCocktails() {
          return $this->db->table('cocktail')
                  ->orderBy('AvgGrade',"DESC")
                  ->where('Approved',1)
                  ->limit(10)->get()->getResult();
    }

    // menja username korisnika u tabeli
    // @params id korisnika($userId), novo korisnicko ime($username)
    // @return void
    public function changeUsername($userId, $username){
        $this->db->table('user')->where('IdUser',$userId)->set('Username',$username)->update();
    }

    // menja ime korisnika u tabeli
    // @params id korisnika($userId), novo ime($firstname)
    // @return void
    public function changeName($userId, $firstname){
        $this->db->table('user')->set('Name',$firstname)->where('IdUser',$userId)->update();
    }

    // menja prezime korisnika u tabeli
    // @params id korisnika($userId), novo prezime($lastname)
    // @return void
    public function changeSurname($userId, $lastname){
        $this->db->table('user')->set('Surname',$lastname)->where('IdUser',$userId)->update();
    }

    // menja mejl korisnika u tabeli
    // @params id korisnika($userId), nov mejl($email)
    // @return void
    public function changeMail($userId, $email){
        $this->db->table('user')->set('Mail',$email)->where('IdUser',$userId)->update();
    }

    // menja pol korisnika u tabeli
    // @params id korisnika($userId), nov pol($gender)
    // @return void
    public function changeGender($userId, $gender){
        $this->db->table('user')->set('Gender',$gender)->where('IdUser',$userId)->update();
    }

    // menja sifru korisnika u tabeli
    // @params id korisnika($userId), nova sifra($password)
    // @return void
    public function changePassword($userId, $password){
        $this->db->table('user')->set('Password',$password)->where('IdUser',$userId)->update();
    }

    // dohvata poslednji dodat koktel
    // @return red iz tabele cocktail
    public function getLastCocktail() {
        return $this->db->table('cocktail')
                ->orderBy('IdCocktail',"DESC")
                ->limit(1)->get()->getRow();
    }

    // dohvata poslednji unet korak za odredjeni koktel
    // @params id koktela($IdC)
    // @return red iz tabele steps
    public function getLastStep($IdC) {
        return $this->db->table('steps')
                ->orderBy('Id', "DESC")
                ->where('IdCocktail', $IdC)
                ->limit(1)->get()->getRow();
    }

    // dodaje novi korak u recept
    // @params id koktela($IdC), id koraka($IdS), tekst koraka($step)
    // @return void
    public function addStep($IdC, $IdS, $step){
        $this->db->table('steps')->insert([
            'IdCocktail' => $IdC,
            'Id' => $IdS,
            'Step' => $step
        ]);
    }

    // dodaje koktel u tabelu
    // @params naziv koktela($name), opis koktela($description), ime slike($image)
    // @return void
    public function insertCocktail($name, $description, $image){
        $this->db->table('cocktail')->insert([
            'CocktailName' => $name,
            'Description' => $description,
            'Image' => $image
        ]);
    }

    public function getAllUsers(){
        return $this->db->table('user')->get()->getResult();
    }

    public function getUnapprovedCocktails(){
        return $this->db->table('cocktail')->where("Approved",0)->get()->getResult();
    }
    
    public function deleteUsersAccounts($usersCheckBoxs){
     
       foreach($usersCheckBoxs as $userCb){
           $this->db->table('user')->where('IdUser',$userCb)->delete();
       }
    }

    public function approveCocktails($cocktailsCheckBoxs,$tip){
       if($tip=='A'){
            foreach($cocktailsCheckBoxs as $cocktail){
                $this->db->table('cocktail')->where('IdCocktail',$cocktail)->update(["Approved"=>1]);
            }
       }
       else{
            foreach($cocktailsCheckBoxs as $cocktail){
                $this->db->table('cocktail')->where('IdCocktail',$cocktail)->delete();
            }

       }
       
     }

   

    public function getCocktailById($id){
        return $this->db->table('cocktail')->where('idCocktail',$id)->get()->getRow();
    }

    public function getAllIngredientsForCocktail($id){
        return $this->db->table('contains')->where('contains.idCocktail',$id)
                                           ->join('ingredient','contains.idIngredient=ingredient.idIngredient')
                                           ->get()
                                           ->getResult();

    }

    public function checkGrade($cocktailId, $userId){
        return $this->db->table('grade')->where('IdUser', $userId)->where('IdCocktail',$cocktailId)->get()->getRow();
    }

    public function insertGrade($cocktailId, $userId, $grade){
        $this->db->table('grade')->insert([
            'IdUser' => $userId,
            'IdCocktail' => $cocktailId,
            'Grade' => $grade
        ]);
    }

    public function updateGrade($cocktailId, $userId, $grade){
        $this->db->table('grade')->replace([
            'IdUser' => $userId,
            'IdCocktail' => $cocktailId,
            'Grade' => $grade
        ]);
    }

    public function getAllGradesForCocktail($cocktailId){
        return $this->db->table('grade')->where('IdCocktail',$cocktailId)->get()->getResult();
    }

    public function updateAvgGradeForCocktail($id, $avg){
        $this->db->table('cocktail')->set('AvgGrade',$avg)->where('IdCocktail',$id)->update();
    }

    public function getRegisterIngredients(){
        return $this->db->table('ingredient')
        ->where('Type', 'ALCOHOL')
        ->get()->getResult();
    }

    public function getUserByUsername($username){
        return $this->db->table('user')
        ->where('Username', $username)
        ->get()->getRow();

    }


    public function getCntSavings($id){
        return $this->db->table('saved')->where('IdCocktail',$id)->get()->getResult();
    }

    public function getSavedCocktails($userId){
        return $this->db->table('saved')->where('IdUser',$userId)
                                        ->join('cocktail','saved.IdCocktail=cocktail.IdCocktail')
                                        ->get()->getResult();
    }

    public function saveCocktailByUser($id,$userId){
        $saved = $this->db->table('saved')->where('IdCocktail',$id)->where('IdUser',$userId)->get()->getRow();
        if($saved == null){
            $this->db->table('saved')->insert([
                'IdUser'=>$userId,
                'IdCocktail'=>$id
            ]);
        }
        
    }


    public function deleteSavedCocktail($id,$userId){
        $this->db->table('saved')->where('IdCocktail',$id)->where('IdUser',$userId)->delete();
    }

    public function getRecommended($userId){
        return $this->db->table('cocktail')
        ->where('Approved',1)
        ->join('contains','contains.IdCocktail=cocktail.IdCocktail')
        ->join('preferences','contains.IdIngredient=preferences.IdIngredient')
        ->where('IdUser', $userId)
        ->get()->getResult();
    }


    public function getSteps($id){
        return $this->db->table('steps')->where('IdCocktail',$id)->orderBy('Id','ASC')->get()->getResult();
    }

    public function getAllIngredients(){
        return $this->db->table('ingredient')->get()->getResult();
    }

}