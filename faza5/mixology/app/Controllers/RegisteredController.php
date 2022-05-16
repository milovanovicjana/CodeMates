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

        $ingredients = $model->getAllIngredientsForCocktail($id);
        return $this->show('cocktail_registered',['cocktail'=> $cocktail, 'ingredients'=>$ingredients]);

    }

    public function gradeCocktail($id){
        $db= db_connect();
        $model=new Model($db);

        
        $user = $this->session->get('user')->IdUser;

        $stars = $this->request->getVar('star');
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

        $ingredients = $model->getAllIngredientsForCocktail($id);
        $cocktail = $model->getCocktailById($id);
        return $this->show('cocktail_registered',['cocktail'=> $cocktail, 'ingredients'=>$ingredients]);
    }


}