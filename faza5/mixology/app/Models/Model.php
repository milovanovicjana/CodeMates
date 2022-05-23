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
        if($name!="")$b->like('CocktailName',$name);

        $b->where('Approved',1);//only approved cocktails
   
        return $b->get()->getResult();
    }
    
    public function getTopRatedCocktails() {
          return $this->db->table('cocktail')
                  ->orderBy('AvgGrade',"DESC")
                  ->where('Approved',1)
                  ->limit(10)->get()->getResult();
    }

    public function changeUsername($userId, $username){
        $this->db->table('user')->where('IdUser',$userId)->set('Username',$username)->update();
    }

    public function changeName($userId, $firstname){
        $this->db->table('user')->set('Name',$firstname)->where('IdUser',$userId)->update();
    }

    public function changeSurname($userId, $lastname){
        $this->db->table('user')->set('Surname',$lastname)->where('IdUser',$userId)->update();
    }

    public function changeMail($userId, $email){
        $this->db->table('user')->set('Mail',$email)->where('IdUser',$userId)->update();
    }

    public function changeGender($userId, $gender){
        $this->db->table('user')->set('Gender',$gender)->where('IdUser',$userId)->update();
    }

    public function changePassword($userId, $password){
        $this->db->table('user')->set('Password',$password)->where('IdUser',$userId)->update();
    }
}