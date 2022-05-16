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
}