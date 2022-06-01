<?php

namespace App\Controllers;
use App\Models\Model;
use App\Models\PreferencesModel;
use App\Models\UserModel;

/**
 * @author Milica Aleksic 0716/2019, Aleksa Vujnic 0479/2019, Jana Milovanovic 0292/2019 
 *
 * AdminController - klasa kontrolera za funkcionalnosti administratora
 */

class AdminController extends BaseController
{
    /**Jana Milovanovic 0292/2019 
     * show - sluzi za prikaz stranica za admina, poziva se iz nekih fja ove klase
     * @return void
     */
    
    public function show($path,$data) {
        $data['firstname'] = $this->session->get('user')->Name;
        echo view("Views/adminHeader",$data);
        echo view("Views/$path",$data);
        echo view("Views/footer");
    }

    /**Jana Milovanovic 0292/2019 
     * index - dohvata sve korisnike iz baze i prikazuje administratoru stranicu za brisanje korisnika
     * @return poziv fje show
     */
    
    public function index()
    {
        $db= db_connect();
        $model=new Model($db);
        $users=$model->getAllUsers();
        return $this->show('deleteAccounts',['users'=>$users]);

    }
    /**Jana Milovanovic 0292/2019 
     * approveCocktailsPage - dohvata sve neodobrene koktele iz baze i prikazuje administratoru stranicu za odobravanje/odbijanje koktela
     * @return poziv fje show
     */
    public function approveCocktailsPage(){
        $db= db_connect();
        $model=new Model($db);
        $cocktails=$model->getUnapprovedCocktails();
        return $this->show('approveCocktails',['cocktails'=>$cocktails]);
     }
    
    /**Jana Milovanovic 0292/2019 
     * deleteAccounts - brise iz baze sve korisnike koje je administrator oznacio da zeli da obrise
     * @return poziv fje index
     */
    public function deleteAccounts()
     {
         $db= db_connect();
         $model=new Model($db);
         $usersCheckBoxs=$this->request->getVar('users');
         if($usersCheckBoxs==[])return  $this->index();;
         $model->deleteUsersAccounts($usersCheckBoxs);
         
         return $this->index();
     }
 
   
     /**Jana Milovanovic 0292/2019 
     * approveCocktails - odobrava(postavlja polje approved u bazi na 1) ili brise sve koktele koje je administrator oznacio da zeli da odobri/odbije
     * @return poziv fje approveCocktailsPage
     */

   
    public function approveCocktails(){
         $db= db_connect();
         $model=new Model($db);
         $cocktailsCheckBoxs=$this->request->getVar('cocktail');
         $tip=$this->request->getVar('type');
         if($cocktailsCheckBoxs==[])return  $this->approveCocktailsPage();;
         $model->approveCocktails($cocktailsCheckBoxs,$tip);
         return $this->approveCocktailsPage();
      }

    
    public function showAdminInfoChange(){
        return $this->show('admin_info_change',[]);
    }

     public function showAdminInfo(){
        return $this->show('admin_info', []);
    }

     public function showAdminPassChange(){
        return $this->show('admin_password_change', []);
    }

    public function changeAdminInfo(){
        $firstname = $this->request->getVar('firstname');
        $lastname = $this->request->getVar('lastname');
        $email = $this->request->getVar('email');
        $username = $this->request->getVar('username');
        $gender = $this->request->getVar('gender');
        //echo($gender);
        $db= db_connect();
        $model=new Model($db);

        $user = $this->session->get('user');
        $userId = $user->IdUser;

        $uUsername = $user->Username;
        if($uUsername != $username){
            $tmpuser = $model->getUserByUsername($username);
            if($tmpuser!=null){
                return $this->show('admin_info_change',['message'=>'Username already taken.']);
            }else{
                $model->changeUsername($userId, $username);
            }
        }

        $uName = $user->Name;
        if($uName != $firstname){
            $model->changeName($userId, $firstname);
        }

        $uSurname = $user->Surname;
        if($uSurname != $lastname){
            $model->changeSurname($userId, $lastname);
        }

        $uMail = $user->Mail;
        if($uMail != $email){
            $model->changeMail($userId, $email);
        }

        $uGender = $user->Gender;
        if($uGender != $gender){
            $model->changeGender($userId, $gender);
        }

        $userSession = $model->getUserByUsername($username);
        $this->session->set('user',$userSession);
        $this->session->set('usertype', 'Admin');

        return redirect()->to(site_url('AdminController/showAdminInfo'));
    }

    public function changeAdminPass(){
        $curpass = $this->request->getVar('curpass');
        $newpass = $this->request->getVar('newpass');
        $newpassconf = $this->request->getVar('newpassconf');

        $db= db_connect();
        $model=new Model($db);

        $user = $this->session->get('user');
        $userId = $user->IdUser;

        $uPass = $user->Password;

        if($curpass != $uPass){
            return $this->show('admin_password_change_miss', []);
        }
        if($newpass != $newpassconf){
            return $this->show('admin_password_change_miss', []);
        }

        $model->changePassword($userId, $newpass);

        $userSession = $model->getUserByUsername($user->Username);
        $this->session->set('user',$userSession);
        $this->session->set('usertype', 'Registered');

        return redirect()->to(site_url('AdminController/showAdminInfo'));
    }
}