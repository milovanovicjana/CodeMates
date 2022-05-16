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
       
      $b=$this->db->table('cocktail');
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

   
}