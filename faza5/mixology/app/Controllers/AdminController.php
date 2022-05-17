<?php

namespace App\Controllers;
use App\Models\Model;
use App\Models\PreferencesModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    
    public function show($path,$data) {
        $data['firstname'] = $this->session->get('user')->Name;
        echo view("Views/adminHeader",$data);
        echo view("Views/$path",$data);
        echo view("Views/footer");
    }
    
    public function index()
    {
        $db= db_connect();
        $model=new Model($db);
        $users=$model->getAllUsers();
        return $this->show('deleteAccounts',['users'=>$users]);

    }
    public function approveCocktailsPage(){
        $db= db_connect();
        $model=new Model($db);
        $cocktails=$model->getUnapprovedCocktails();
        return $this->show('approveCocktails',['cocktails'=>$cocktails]);
     }
    
     
 
     public function deleteAccounts()
     {
         $db= db_connect();
         $model=new Model($db);
         $usersCheckBoxs=$this->request->getVar('users');
         if($usersCheckBoxs==[])return  $this->index();;
         $model->deleteUsersAccounts($usersCheckBoxs);
         
         return $this->index();
     }
 
     public function approveCocktails(){
         $db= db_connect();
         $model=new Model($db);
         $cocktailsCheckBoxs=$this->request->getVar('cocktail');
         $tip=$this->request->getVar('type');
         if($cocktailsCheckBoxs==[])return  $this->approveCocktailsPage();;
         $model->approveCocktails($cocktailsCheckBoxs,$tip);
         return $this->approveCocktailsPage();
      }

}