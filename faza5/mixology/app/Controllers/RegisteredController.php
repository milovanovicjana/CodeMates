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

}