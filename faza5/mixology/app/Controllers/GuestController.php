<?php

namespace App\Controllers;
use App\Models\Model;
use App\Models\PreferencesModel;
use App\Models\RegisteredModel;
use App\Models\UserModel;

class GuestController extends BaseController
{
    
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
    
    public function index()
    {
       $db= db_connect();
       $model=new Model($db);
       $topRatedCocktails=$model->getTopRatedCocktails();
       return $this->show('search',['topRatedCocktails'=>$topRatedCocktails]);
    }
    
    public function search() {
       $db= db_connect();
       $model=new Model($db);
       
       $name=$this->request->getVar('cocktailName');
       $type=$this->request->getVar('Type');
       $filters= $this->request->getVar('filter');
       
       if($name=="" && $type=="" && $filters==[]){
           $topRatedCocktails=$model->getTopRatedCocktails();
           return $this->show('search',['message'=>'Please enter a cocktail name or click on the filters to start searching.','topRatedCocktails'=>$topRatedCocktails]);;
       }
       
      if($filters!=[]) {
          $arrayOfFilters= implode(",", $this->request->getVar('filter'));
          $cocktails=$model->search($arrayOfFilters,$type,$name);
      }
      else{
          $cocktails=$model->search([],$type,$name);
      }
      if($cocktails==null){
          //Sorry, no results were found for “sdsdsds”. 
          return $this->show('searchResults',['cocktails'=>$cocktails,'messageResultNotFound'=>'Sorry, no results were found']);
          
      }
       
       return $this->show('searchResults',['cocktails'=>$cocktails]);
    }


    public function cocktailDisplayUnregistered($id){
        
        $db= db_connect();
        $model=new Model($db);

        $cocktail = $model->getCocktailById($id);
       
        $steps = $model->getSteps($id);
        $ingredients = $model->getAllIngredientsForCocktail($id);
        return $this->show('cocktail_unregistered',['cocktail'=> $cocktail, 'ingredients'=>$ingredients, 'steps'=>$steps]);

    }

    

    

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
