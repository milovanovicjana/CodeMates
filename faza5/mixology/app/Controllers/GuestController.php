<?php

namespace App\Controllers;
use App\Models\Model;
class GuestController extends BaseController
{
    
    public function show($path,$data) {
        
        echo view("Views/guestHeader");
        echo view("Views/$path",$data);
        echo view("Views/footer");
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
}
