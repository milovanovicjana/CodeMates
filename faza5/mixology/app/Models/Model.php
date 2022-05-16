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
}