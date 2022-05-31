<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

/**
 * @author  Ana Vukasinovic 0298/2019, Milica Aleksic 0716/2019, Jana Milovanovic 0292/2019, Aleksa Vujnic 0479/2019
 *
 * Model - klasa modela za pristup bazi podataka
 */

class Model
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }

    /**Jana Milovanovic 0292/2019 
     * search - funkcija koja vrsi pretragu koktela tako sto vrsi spajanje tabela ingredient,contains i cocktail 
     * @return dohvaceni kokteli
     */
    
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
        if($name!=""){
            $b->like('CocktailName',$name);
            
        }
  
        $b->where('Approved',1);//only approved cocktails
    

        return $b->get()->getResult();
    }
    
    /**Jana Milovanovic 0292/2019 
     * getTopRatedCocktails - funkcija koja iz baze dohvata sve koktele, zatim ih sortira opadajuce po oceni i vraca 10 najbolje ocenjenih koktela 
     * @return dohvaceni kokteli
     */
    public function getTopRatedCocktails() {
          return $this->db->table('cocktail')
                  ->orderBy('AvgGrade',"DESC")
                  ->where('Approved',1)
                  ->limit(10)->get()->getResult();
    }

    // Milica Aleksić 0716/2019
    // menja username korisnika u tabeli
    // @params id korisnika($userId), novo korisnicko ime($username)
    // @return void
    public function changeUsername($userId, $username){
        $this->db->table('user')->where('IdUser',$userId)->set('Username',$username)->update();
    }

    // Milica Aleksić 0716/2019
    // menja ime korisnika u tabeli
    // @params id korisnika($userId), novo ime($firstname)
    // @return void
    public function changeName($userId, $firstname){
        $this->db->table('user')->set('Name',$firstname)->where('IdUser',$userId)->update();
    }

    // Milica Aleksić 0716/2019
    // menja prezime korisnika u tabeli
    // @params id korisnika($userId), novo prezime($lastname)
    // @return void
    public function changeSurname($userId, $lastname){
        $this->db->table('user')->set('Surname',$lastname)->where('IdUser',$userId)->update();
    }

    // Milica Aleksić 0716/2019
    // menja mejl korisnika u tabeli
    // @params id korisnika($userId), nov mejl($email)
    // @return void
    public function changeMail($userId, $email){
        $this->db->table('user')->set('Mail',$email)->where('IdUser',$userId)->update();
    }

    // Milica Aleksić 0716/2019
    // menja pol korisnika u tabeli
    // @params id korisnika($userId), nov pol($gender)
    // @return void
    public function changeGender($userId, $gender){
        $this->db->table('user')->set('Gender',$gender)->where('IdUser',$userId)->update();
    }

    // Milica Aleksić 0716/2019
    // menja sifru korisnika u tabeli
    // @params id korisnika($userId), nova sifra($password)
    // @return void
    public function changePassword($userId, $password){
        $this->db->table('user')->set('Password',$password)->where('IdUser',$userId)->update();
    }

    // Milica Aleksić 0716/2019
    // dohvata poslednji dodat koktel
    // @return red iz tabele cocktail
    public function getLastCocktail() {
        return $this->db->table('cocktail')
                ->orderBy('IdCocktail',"DESC")
                ->limit(1)->get()->getRow();
    }

    // Milica Aleksić 0716/2019
    // dohvata poslednji unet korak za odredjeni koktel
    // @params id koktela($IdC)
    // @return red iz tabele steps
    public function getLastStep($IdC) {
        return $this->db->table('steps')
                ->orderBy('Id', "DESC")
                ->where('IdCocktail', $IdC)
                ->limit(1)->get()->getRow();
    }

    // Milica Aleksić 0716/2019
    // dodaje novi korak u recept
    // @params id koktela($IdC), id koraka($IdS), tekst koraka($step)
    // @return void
    public function addStep($IdC, $IdS, $step){
        $this->db->table('steps')->insert([
            'IdCocktail' => $IdC,
            'Id' => $IdS,
            'Step' => $step
        ]);
    }

    // Milica Aleksić 0716/2019
    // dodaje koktel u tabelu
    // @params naziv koktela($name), opis koktela($description), ime slike($image)
    // @return void
    public function insertCocktail($name, $description, $image){
        $this->db->table('cocktail')->insert([
            'CocktailName' => $name,
            'Description' => $description,
            'Image' => $image,
            'AvgGrade' => 0,
            'Recipes' => "",
            'Alcoholic' => 0,
            'Approved' => 0,
            'Price' => 0
        ]);
    }

      /**Jana Milovanovic 0292/2019 
     * getAllUsers - funkcija koja iz baze dohvata sve korisnike
     * @return dohvaceni korisnici
     */
    public function getAllUsers(){
        return $this->db->table('user')->get()->getResult();
    }

    /**Jana Milovanovic 0292/2019 
     * getUnapprovedCocktails - funkcija koja iz baze dohvata sve neodobrene koktele
     * @return dohvaceni kokteli
     */
    public function getUnapprovedCocktails(){
        return $this->db->table('cocktail')->where("Approved",0)->get()->getResult();
    }
    
    /**Jana Milovanovic 0292/2019 
     * deleteUsersAccounts - funkcija koja iz baze brise oznacene korisnike
     * @return void
     */
    public function deleteUsersAccounts($usersCheckBoxs){
     
       foreach($usersCheckBoxs as $userCb){
           $this->db->table('user')->where('IdUser',$userCb)->delete();
       }
    }

     /**Jana Milovanovic 0292/2019 
     * approveCocktails - funkcija koja iz baze brise koktel, ako admin ne zeli da ga odobri ili
     * update-uje bazu postavljanjem polja approved na 1, ako admin zeli da odobri kokktel
     * @return void
     */

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

     /**Ana Vukašinović 0298/2019
     *  getCocktailById - sluzi za dohvatanje koktela iz baze prema id-u
     * @param $id - identifikator koktela koji se dohvata
     * @return red iz tabele, ukoliko koktel postoji ili null ako ne postoji
     */
    
    public function getCocktailById($id){
        return $this->db->table('cocktail')->where('idCocktail',$id)->get()->getRow();
    }

    /**Ana Vukašinović 0298/2019
     * getAllIngredientsForCocktail - sluzi za dohvatanje svih sastojaka za odredjeni koktel
     * @param $id - identifikator koktela
     * @return redovi iz tabele koji predstavljaju sastojke
     */

    public function getAllIngredientsForCocktail($id){
        return $this->db->table('contains')->where('contains.idCocktail',$id)
                                           ->join('ingredient','contains.idIngredient=ingredient.idIngredient')
                                           ->get()
                                           ->getResult();

    }

    /**Ana Vukašinović 0298/2019
     * checkGrade - sluzi za proveru da li je odredjeni korisnik ranije vec ocenio dati koktel
     * @param $cocktailId - identifikator koktela , $userId - identifikator korisnika
     * @return red tabele ukoliko je korisnik vec ocenio koktel ili null u suprotnom
     */
    

    public function checkGrade($cocktailId, $userId){
        return $this->db->table('grade')->where('IdUser', $userId)->where('IdCocktail',$cocktailId)->get()->getRow();
    }

    /**Ana Vukašinović 0298/2019
     * insertGrade - sluzi za unos ocene za odredjeni koktel od strane odredjenog korisnika
     * @param $cocktailId - identifikator koktela , $userId - identifikator korisnika , $grade - ocena
     * @return void
     */
    

    public function insertGrade($cocktailId, $userId, $grade){
        $this->db->table('grade')->insert([
            'IdUser' => $userId,
            'IdCocktail' => $cocktailId,
            'Grade' => $grade
        ]);
    }

    /**Ana Vukašinović 0298/2019
     * updateGrade - sluzi za update ocene za odredjeni koktel od strane odredjenog korisnika
     * @param $cocktailId - identifikator koktela , $userId - identifikator korisnika , $grade - ocena
     * @return void
     */

    public function updateGrade($cocktailId, $userId, $grade){
        $this->db->table('grade')->replace([
            'IdUser' => $userId,
            'IdCocktail' => $cocktailId,
            'Grade' => $grade
        ]);
    }


    /**Ana Vukašinović 0298/2019
     * getAllGradesForCocktail - sluzi za dohvatanje svih ocena za odredjeni koktel
     * @param $cocktailId - identifikator koktela 
     * @return redovi ocena ukoliko je koktel ocenjivan, null u suprotnom
     */

    public function getAllGradesForCocktail($cocktailId){
        return $this->db->table('grade')->where('IdCocktail',$cocktailId)->get()->getResult();
    }

    /**Ana Vukašinović 0298/2019
     * updateAvgGradeForCocktail - sluzi za azuriranje prosecne ocene koktela
     * @param $id - identifikator koktela , $avg ' prosecna ocena
     * @return void
     */


    public function updateAvgGradeForCocktail($id, $avg){
        $this->db->table('cocktail')->set('AvgGrade',$avg)->where('IdCocktail',$id)->update();
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

    /**Ana Vukašinović 0298/2019
     * getCntSavings - sluzi za odredjivanje broja cuvanja odredjenog koktela
     * @param $id - identifikator koktela 
     * @return redovi cuvanja ukoliko je koktel sacuvan ranije, null u suprotnom
     */
    public function getCntSavings($id){
        return $this->db->table('saved')->where('IdCocktail',$id)->get()->getResult();
    }

    /**Ana Vukašinović 0298/2019
     * getCntSavings - sluzi za dohvatanje koktela koje je korisnik sacuvao
     * @param $userId - identifikator korisnika 
     * @return redovi cuvanja ukoliko je koktel sacuvan ranije, null u suprotnom
     */

    public function getSavedCocktails($userId){
        return $this->db->table('saved')->where('IdUser',$userId)
                                        ->join('cocktail','saved.IdCocktail=cocktail.IdCocktail')
                                        ->get()->getResult();
    }

    /**Ana Vukašinović 0298/2019
     * saveCocktailBzUser - sluzi za cuvanje koktela u listi sacuvanih za odredjenog korisnika
     * @param $userId - identifikator korisnika  , $id ' identifikator koktela
     * @return void
     */


    public function saveCocktailByUser($id,$userId){
        $saved = $this->db->table('saved')->where('IdCocktail',$id)->where('IdUser',$userId)->get()->getRow();
        if($saved == null){
            $this->db->table('saved')->insert([
                'IdUser'=>$userId,
                'IdCocktail'=>$id
            ]);
        }
        
    }

     /**Ana Vukašinović 0298/2019
     * deleteSavedCocktail - sluzi za uklanjanje koktela iz liste sacuvanih za odredjenog korisnika
     * @param $userId - identifikator korisnika  , $id ' identifikator koktela
     * @return void
     */


    public function deleteSavedCocktail($id,$userId){
        $this->db->table('saved')->where('IdCocktail',$id)->where('IdUser',$userId)->delete();
    }

    public function getRecommended($userId){
        return $this->db->table('cocktail')
        ->where('Approved',1)
        ->join('contains','contains.IdCocktail=cocktail.IdCocktail')
        ->join('preferences','contains.IdIngredient=preferences.IdIngredient')
        ->where('IdUser', $userId)
        ->get()->getResult();
    }

    /**Ana Vukašinović 0298/2019
     * getSteps - sluzi za dohvatanje koraka za recept koktela
     * @param $id ' identifikator koktela
     * @return void
     */

    public function getSteps($id){
        return $this->db->table('steps')->where('IdCocktail',$id)->orderBy('Id','ASC')->get()->getResult();
    }

    /**Ana Vukašinović 0298/2019
     *  getAllIngredients - sluzi za dohvatanje svih sastojaka
     * @return redovi sastojaka ukoliko koktel postoji u bazi
     */

    public function getAllIngredients(){
        return $this->db->table('ingredient')->get()->getResult();
    }

    public function getIngredient($idIngredient){
        return $this->db->table('ingredient')->where('IdIngredient', $idIngredient)->get()->getRow();
    }

    public function addContains($idIngredient, $idCocktail, $quantity){
        $newIngredient = $this->db->table('ingredient')->where('IdIngredient', $idIngredient)->get()->getRow();
        $priceIncr = ($newIngredient->AveragePrice * $quantity) / 10;
        $cocktail = $this->db->table('cocktail')->where('IdCocktail',$idCocktail)->get()->getRow();
        $newPrice = $priceIncr + $cocktail->Price;
        $this->db->table('cocktail')->where('IdCocktail',$idCocktail)->set('Price',$newPrice)->update();
        if($newIngredient->Type == "ALCOHOL"){
            $this->db->table('cocktail')->where('IdCocktail',$idCocktail)->set('Alcoholic',1)->update();
        }
        $this->db->table('contains')->insert([
            'IdCocktail' => $idCocktail,
            'IdIngredient' => $idIngredient,
            'Quantity' => $quantity
        ]);
    }

}