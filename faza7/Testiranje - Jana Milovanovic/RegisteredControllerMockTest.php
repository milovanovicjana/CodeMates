<?php
namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\URI;
use Config\Services;

class RegisteredControllerMockTest extends CIUnitTestCase
{

    //VAZNO: Za pokretanje testova neophodno izmeniti kod RegisteredController.php tako da Model klasu dohvata
    //iz fabrike: $model=Factories::models('App\Models\Model');

    use ControllerTester;

    public function setUp(): void
	{
		parent::setUp();

        $user = (object)[
            'IdUser'=>1,
            'Name' => 'Tom',
            'Surname' => 'Jones',
            'Mail' => 'tom99@gmail.com',
            'Username' => 'tom99',
            'DateOfBirth' => '1999-05-10',
            'Gender' => 'M',
            'Password' => 'tom123'
        ];

        $sessionMock = $this->getMockBuilder('CodeIgniter\Session')
            ->setMethods(['get','set'])
            ->getMock();
        $sessionMock->method('get')->willReturn($user);
        $sessionMock->method('set');
        Services::injectMock('session', $sessionMock);
		
	} 

    public function test_displaySavedCocktails(){
        $existing =[
           (object) [
            'IdUser'=>1,
            'IdCocktail' => 14,
            'CocktailName'=>'Manhattan', 
            'AvgGrade'=> 0,
            'Recipes'=>'The Manhattan was the most famous cocktail in the world shortly after it was invented in New York City’s Manhattan Club, some time around 1880 (as the story goes). Over the years, the whiskey classic has dipped in and out of fashion before finding its footing as one of the cornerstones of the craft cocktail renaissance.\nAmazingly, the drink that socialites tipped to their lips in the 19th century looks and tastes pretty much the same as the one served today at any decent cocktail bar. The Manhattan’s mix of American whiskey and Italian vermouth, enlivened with a few dashes of aromatic bitters, is timeless and tasty—the very definition of what a cocktail should be.\nDespite all of the Manhattan’s unassailable qualities, bartenders and enterprising drinkers have still found ways to tweak the recipe into myriad variations. If you split the vermouth between sweet and dry, you get the Perfect Manhattan. If you switch the ratios to make vermouth the star, you’ve stirred up a Reverse Manhattan. The Rob Roy is essentially a scotch Manhattan. And then you’ve got other named-for-New York cocktails like the Red Hook and Brooklyn, which employ their own twists to take the drink in new directions.\nBut regardless of all the options, there is only one classic Manhattan: two parts whiskey, one part sweet vermouth and bitters. Mix one (stirred, never shaken), and you’ll see why this storied drink has remained a favorite since its inception.' , 
            'Image'=>'Manhattan_14.png', 
            'Price'=> 9,
            'Alcoholic'=> 1, 
            'Approved'=> 1,
            'Description'=>'Combine vermouth and whiskey to make the perfect Manhattan cocktail. Add lemon,  and cherry to complete the classic flavour combination'],
            (object) [
                'IdUser'=>1,
                'IdCocktail' => 15,
                'CocktailName'=>'Tom Collins', 
                'AvgGrade'=> 0,
                'Recipes'=>'The Tom Collins was immortalized in Harry Johnson’s 1882 book, “New and Improved Bartender’s Manual: Or How to Mix Drinks of the Present Style.” It remained popular over the decades and is still a prominent drink today, available at bars across the world. You don’t need to visit a bar to drink one, however. As the Tom Collins requires no special tools—not even a shaker or strainer—it’s a snap to make at home. Simply build the drink in a tall glass, add ice and an optional garnish, and you’re done. Take one refreshing sip, and you’ll quickly see why this cocktail lives up to its classic status.\nThere’s some debate as to the cocktail’s origin. According to drinks historian David Wondrich, the Tom Collins is strikingly similar to the gin punches being served in London bars during the 19th century. An enterprising barkeep named John Collins named the concoction after himself, whether or not he invented it. But given that the cocktail was typically made with Old Tom gin, drinkers eventually took to requesting Tom rather than John Collinses.', 
                'Image'=>'Tom Collins_15.png', 
                'Price'=> 9,
                'Alcoholic'=> 1, 
                'Approved'=> 1,
                'Description'=>'Master the art of the classic Tom Collins cocktail, plus three twists. Gin, lemon, simple syrup and soda water are the ingredients for your cocktail cupboard']
        ] ;

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->expects($this->once())->method("getSavedCocktails")->willReturn($existing);//vratice 2 koktela
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $results = $this->controller('\App\Controllers\RegisteredController')->execute("displaySavedCocktails");

        $this->assertTrue($results->see('Saved cocktails','p'));
        $this->assertTrue($results->see('Manhattan','a'));
        $this->assertTrue($results->see('Tom Collins','a'));

        
    }

    public function test_cocktailDisplayRegistered(){
        
        $existing1 =(object)[
            'IdCocktail'=>14, 
            'CocktailName'=>'Manhattan', 
            'AvgGrade'=>0,
             'Recipes'=>"The Manhattan was the most famous cocktail in the world shortly after it was invented in New York City’s Manhattan Club, some time around 1880 (as the story goes). Over the years, the whiskey classic has dipped in and out of fashion before finding its footing as one of the cornerstones of the craft cocktail renaissance.\nAmazingly, the drink that socialites tipped to their lips in the 19th century looks and tastes pretty much the same as the one served today at any decent cocktail bar. The Manhattan’s mix of American whiskey and Italian vermouth, enlivened with a few dashes of aromatic bitters, is timeless and tasty—the very definition of what a cocktail should be.\nDespite all of the Manhattan’s unassailable qualities, bartenders and enterprising drinkers have still found ways to tweak the recipe into myriad variations. If you split the vermouth between sweet and dry, you get the Perfect Manhattan. If you switch the ratios to make vermouth the star, you’ve stirred up a Reverse Manhattan. The Rob Roy is essentially a scotch Manhattan. And then you’ve got other named-for-New York cocktails like the Red Hook and Brooklyn, which employ their own twists to take the drink in new directions.\nBut regardless of all the options, there is only one classic Manhattan: two parts whiskey, one part sweet vermouth and bitters. Mix one (stirred, never shaken), and you’ll see why this storied drink has remained a favorite since its inception." , 
            'Image'=>"Manhattan_14.png", 
            'Price'=>9,
            'Alcoholic'=>1, 
            'Approved'=>1,
            'Description'=>"Combine vermouth and whiskey to make the perfect Manhattan cocktail. Add lemon,  and cherry to complete the classic flavour combination"
        ];

        $existing2=[
            (object)['IdUser'=>2,
            'IdCocktail'=>14]

        ];

        $existing3=[
          (object)['IdCocktail'=>14,'Id'=>1,'Step'=>'Garnish with a brandied cherry or a lemon twist.']

        ];

        $existing4=[
            (object)['IdCocktail'=>14,'IdIngredient'=>12,'Quantity'=>0, 'Name'=>'Cherry', 'Type'=>'FRUIT', 'AveragePrice'=>0]
        ];

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->method("getCocktailById")->willReturn($existing1); //vraca Manhattan
        $mockModel->method("getCntSavings")->willReturn($existing2); //vraca sva svidjanja za taj koktel
        $mockModel->method("getSteps")->willReturn($existing3); //vraca sve stepove
        $mockModel->method("getAllIngredientsForCocktail")->willReturn($existing4); //vraca sve sastojke
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

       

        $results =$this->controller('\App\Controllers\RegisteredController')
                   ->execute("cocktailDisplayRegistered",14);
                     $this->assertTrue($results->see('Ingredients','h3'));
                     $this->assertTrue($results->see('Manhattan','font'));
                     $this->assertTrue($results->see('Tom'));
    }

    public function test_saveCocktail(){
        $existing=[
            (object)['IdUser'=>2,
            'IdCocktail'=>14]

        ];//sva svidjanja za koktel Manhattan

        $mockModel = $this->createMock(\App\Models\Model::class);
		$mockModel->expects($this->once())->method("saveCocktailByUser")->with($this->equalTo(14),$this->equalTo(1));//cuvanje koktela Manhattan od stane korsinika 1
        $mockModel->method("getCntSavings")->willReturn($existing); //vraca sva svidjanja za taj koktel
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'id'=>14
        ]);

        $results = $this->withRequest($request)
                ->controller('\App\Controllers\RegisteredController')
                ->execute("saveCocktail");

        //provera u sacuvanim da li se on sada nalazi

        $existing1 =[
            (object) [
             'IdUser'=>1,
             'IdCocktail' => 14,
             'CocktailName'=>'Manhattan', 
             'AvgGrade'=> 0,
             'Recipes'=>'The Manhattan was the most famous cocktail in the world shortly after it was invented in New York City’s Manhattan Club, some time around 1880 (as the story goes). Over the years, the whiskey classic has dipped in and out of fashion before finding its footing as one of the cornerstones of the craft cocktail renaissance.\nAmazingly, the drink that socialites tipped to their lips in the 19th century looks and tastes pretty much the same as the one served today at any decent cocktail bar. The Manhattan’s mix of American whiskey and Italian vermouth, enlivened with a few dashes of aromatic bitters, is timeless and tasty—the very definition of what a cocktail should be.\nDespite all of the Manhattan’s unassailable qualities, bartenders and enterprising drinkers have still found ways to tweak the recipe into myriad variations. If you split the vermouth between sweet and dry, you get the Perfect Manhattan. If you switch the ratios to make vermouth the star, you’ve stirred up a Reverse Manhattan. The Rob Roy is essentially a scotch Manhattan. And then you’ve got other named-for-New York cocktails like the Red Hook and Brooklyn, which employ their own twists to take the drink in new directions.\nBut regardless of all the options, there is only one classic Manhattan: two parts whiskey, one part sweet vermouth and bitters. Mix one (stirred, never shaken), and you’ll see why this storied drink has remained a favorite since its inception.' , 
             'Image'=>'Manhattan_14.png', 
             'Price'=> 9,
             'Alcoholic'=> 1, 
             'Approved'=> 1,
             'Description'=>'Combine vermouth and whiskey to make the perfect Manhattan cocktail. Add lemon,  and cherry to complete the classic flavour combination'],
        ]; 
        
        $mockModel->expects($this->once())->method("getSavedCocktails")->willReturn($existing1);//vratice Manhattan
        $results = $this->controller('\App\Controllers\RegisteredController')->execute("displaySavedCocktails");

        $this->assertTrue($results->see('Saved cocktails','p'));
        $this->assertTrue($results->see('Manhattan','a'));
                
    }

    public function test_saveCocktail_Failed(){

        //provera  da ima samo 1 lajk
        $existing1 =(object)[
            'IdCocktail'=>14, 
            'CocktailName'=>'Manhattan', 
            'AvgGrade'=>0,
             'Recipes'=>"The Manhattan was the most famous cocktail in the world shortly after it was invented in New York City’s Manhattan Club, some time around 1880 (as the story goes). Over the years, the whiskey classic has dipped in and out of fashion before finding its footing as one of the cornerstones of the craft cocktail renaissance.\nAmazingly, the drink that socialites tipped to their lips in the 19th century looks and tastes pretty much the same as the one served today at any decent cocktail bar. The Manhattan’s mix of American whiskey and Italian vermouth, enlivened with a few dashes of aromatic bitters, is timeless and tasty—the very definition of what a cocktail should be.\nDespite all of the Manhattan’s unassailable qualities, bartenders and enterprising drinkers have still found ways to tweak the recipe into myriad variations. If you split the vermouth between sweet and dry, you get the Perfect Manhattan. If you switch the ratios to make vermouth the star, you’ve stirred up a Reverse Manhattan. The Rob Roy is essentially a scotch Manhattan. And then you’ve got other named-for-New York cocktails like the Red Hook and Brooklyn, which employ their own twists to take the drink in new directions.\nBut regardless of all the options, there is only one classic Manhattan: two parts whiskey, one part sweet vermouth and bitters. Mix one (stirred, never shaken), and you’ll see why this storied drink has remained a favorite since its inception." , 
            'Image'=>"Manhattan_14.png", 
            'Price'=>9,
            'Alcoholic'=>1, 
            'Approved'=>1,
            'Description'=>"Combine vermouth and whiskey to make the perfect Manhattan cocktail. Add lemon,  and cherry to complete the classic flavour combination"
        ];

        $existing2=[
            (object)['IdUser'=>1,
            'IdCocktail'=>14]

        ];

        $existing3=[
          (object)['IdCocktail'=>14,'Id'=>1,'Step'=>'Garnish with a brandied cherry or a lemon twist.']

        ];

        $existing4=[
            (object)['IdCocktail'=>14,'IdIngredient'=>12,'Quantity'=>0, 'Name'=>'Cherry', 'Type'=>'FRUIT', 'AveragePrice'=>0]
        ];

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->method("getCocktailById")->willReturn($existing1); //vraca Manhattan
        $mockModel->method("getCntSavings")->willReturn($existing2); //vraca sva svidjanja za taj koktel
        $mockModel->method("getSteps")->willReturn($existing3); //vraca sve stepove
        $mockModel->method("getAllIngredientsForCocktail")->willReturn($existing4); //vraca sve sastojke
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

       

        $results =$this->controller('\App\Controllers\RegisteredController')
                   ->execute("cocktailDisplayRegistered",14);
                     $this->assertTrue($results->see('Ingredients','h3'));
                     $this->assertTrue($results->see('Manhattan','font'));
                     $this->assertTrue($results->see('1','span'));   //PROVERA DA IMA SAMO 1 LAJK

      
        //zatim lajkovanje, opet istog koktela

		$mockModel->expects($this->once())->method("saveCocktailByUser")->with($this->equalTo(14),$this->equalTo(1));//cuvanje koktela Manhattan od stane korsinika 1
        $mockModel->method("getCntSavings")->willReturn($existing2); //vraca sva svidjanja za taj koktel
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'id'=>14 
        ]);

        $results = $this->withRequest($request)
                ->controller('\App\Controllers\RegisteredController')
                ->execute("saveCocktail");


        //provera da li idalje postoji samo 1 lajk
        $results =$this->controller('\App\Controllers\RegisteredController')->execute("cocktailDisplayRegistered",14);
          $this->assertTrue($results->see('Ingredients','h3'));
          $this->assertTrue($results->see('Manhattan','font'));
          $this->assertTrue($results->see('1','span'));   //PROVERA DA IMA SAMO 1 LAJK
    }

    public function test_unsaveCocktail(){

        $mockModel = $this->createMock(\App\Models\Model::class);
		$mockModel->expects($this->once())->method("deleteSavedCocktail")->with($this->equalTo(14),$this->equalTo(1));//brisanje iz liste sacuvanih koktela Manhattan od stane korsinika 1
        $existing1 =[]; 
        $mockModel->method("getSavedCocktails")->willReturn($existing1); //vraca sva svidjanja za taj koktel
        Factories::injectMock('models', 'App\Models\Model', $mockModel);


        $results = $this->controller('\App\Controllers\RegisteredController')
                ->execute("unsaveCocktail",14);

        //provera u sacuvanim da li se on sada nalazi

        $this->assertTrue($results->see('Saved cocktails','p'));
        $this->assertFalse($results->see('Manhattan','a'));
   

    }


    public function test_gradeCocktail(){

        $koktel=(object) [
             'IdCocktail' => 14,
             'CocktailName'=>'Manhattan', 
             'AvgGrade'=> 0,
             'Recipes'=>'The Manhattan was the most famous cocktail in the world shortly after it was invented in New York City’s Manhattan Club, some time around 1880 (as the story goes). Over the years, the whiskey classic has dipped in and out of fashion before finding its footing as one of the cornerstones of the craft cocktail renaissance.\nAmazingly, the drink that socialites tipped to their lips in the 19th century looks and tastes pretty much the same as the one served today at any decent cocktail bar. The Manhattan’s mix of American whiskey and Italian vermouth, enlivened with a few dashes of aromatic bitters, is timeless and tasty—the very definition of what a cocktail should be.\nDespite all of the Manhattan’s unassailable qualities, bartenders and enterprising drinkers have still found ways to tweak the recipe into myriad variations. If you split the vermouth between sweet and dry, you get the Perfect Manhattan. If you switch the ratios to make vermouth the star, you’ve stirred up a Reverse Manhattan. The Rob Roy is essentially a scotch Manhattan. And then you’ve got other named-for-New York cocktails like the Red Hook and Brooklyn, which employ their own twists to take the drink in new directions.\nBut regardless of all the options, there is only one classic Manhattan: two parts whiskey, one part sweet vermouth and bitters. Mix one (stirred, never shaken), and you’ll see why this storied drink has remained a favorite since its inception.' , 
             'Image'=>'Manhattan_14.png', 
             'Price'=> 9,
             'Alcoholic'=> 1, 
             'Approved'=> 1,
             'Description'=>'Combine vermouth and whiskey to make the perfect Manhattan cocktail. Add lemon,  and cherry to complete the classic flavour combination'
        ];

        $ocene=[
            (object)['IdUser'=>2,
            'IdCocktail'=>14,
            'Grade'=>5
            ],
            (object)['IdUser'=>1, //ova koju ubacujemo
            'IdCocktail'=>14,
            'Grade'=>4
            ]

        ];

        $cuvanja=[
            (object)['IdUser'=>2,
            'IdCocktail'=>14
            ]

        ];

        $stepovi=[
          (object)['IdCocktail'=>14,'Id'=>1,'Step'=>'Garnish with a brandied cherry or a lemon twist.']

        ];

        $sastojci=[
            (object)['IdCocktail'=>14,'IdIngredient'=>12,'Quantity'=>0, 'Name'=>'Cherry', 'Type'=>'FRUIT', 'AveragePrice'=>0]
        ];

        $mockModel = $this->createMock(\App\Models\Model::class);
		$mockModel->expects($this->once())->method("insertGrade")->with($this->equalTo(14),$this->equalTo(1),$this->equalTo(4));
        $mockModel->method("getAllGradesForCocktail")->willReturn($ocene); 
        $mockModel->expects($this->once())->method("checkGrade")->willReturn(null);
        $mockModel->method("getCntSavings")->willReturn($cuvanja); //vraca sva svidjanja za taj koktel
        $mockModel->method("getAllIngredientsForCocktail")->willReturn($sastojci); //vraca sve sastojke
        $mockModel->method("getCocktailById")->willReturn($koktel); //vraca Manhattan
        $mockModel->method("updateAvgGradeForCocktail")->with($this->equalTo(14),$this->equalTo(4.5));   //PROVERA DA LI RACUNA DOBRO PROSECNU OCENU
        $mockModel->method("getSteps")->willReturn($stepovi); //vraca sve stepove
      
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'id'=>'14',
            'stars'=>'4'
        ]);

        $results = $this->withRequest($request)
                ->controller('\App\Controllers\RegisteredController')
                ->execute("gradeCocktail");
    }

    public function test_gradeCocktail_failed(){

        $koktel=(object) [
             'IdCocktail' => 14,
             'CocktailName'=>'Manhattan', 
             'AvgGrade'=> 0,
             'Recipes'=>'The Manhattan was the most famous cocktail in the world shortly after it was invented in New York City’s Manhattan Club, some time around 1880 (as the story goes). Over the years, the whiskey classic has dipped in and out of fashion before finding its footing as one of the cornerstones of the craft cocktail renaissance.\nAmazingly, the drink that socialites tipped to their lips in the 19th century looks and tastes pretty much the same as the one served today at any decent cocktail bar. The Manhattan’s mix of American whiskey and Italian vermouth, enlivened with a few dashes of aromatic bitters, is timeless and tasty—the very definition of what a cocktail should be.\nDespite all of the Manhattan’s unassailable qualities, bartenders and enterprising drinkers have still found ways to tweak the recipe into myriad variations. If you split the vermouth between sweet and dry, you get the Perfect Manhattan. If you switch the ratios to make vermouth the star, you’ve stirred up a Reverse Manhattan. The Rob Roy is essentially a scotch Manhattan. And then you’ve got other named-for-New York cocktails like the Red Hook and Brooklyn, which employ their own twists to take the drink in new directions.\nBut regardless of all the options, there is only one classic Manhattan: two parts whiskey, one part sweet vermouth and bitters. Mix one (stirred, never shaken), and you’ll see why this storied drink has remained a favorite since its inception.' , 
             'Image'=>'Manhattan_14.png', 
             'Price'=> 9,
             'Alcoholic'=> 1, 
             'Approved'=> 1,
             'Description'=>'Combine vermouth and whiskey to make the perfect Manhattan cocktail. Add lemon,  and cherry to complete the classic flavour combination'
        ];

        $ocene=[
            (object)['IdUser'=>2,
            'IdCocktail'=>14,
            'Grade'=>5
            ]

        ];

        $cuvanja=[
            (object)['IdUser'=>2,
            'IdCocktail'=>14
            ]

        ];

        $stepovi=[
          (object)['IdCocktail'=>14,'Id'=>1,'Step'=>'Garnish with a brandied cherry or a lemon twist.']

        ];

        $sastojci=[
            (object)['IdCocktail'=>14,'IdIngredient'=>12,'Quantity'=>0, 'Name'=>'Cherry', 'Type'=>'FRUIT', 'AveragePrice'=>0]
        ];

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->method("getAllGradesForCocktail")->willReturn($ocene); 
        $mockModel->expects($this->once())->method("checkGrade")->willReturn(null);
        $mockModel->method("getCntSavings")->willReturn($cuvanja); //vraca sva svidjanja za taj koktel
        $mockModel->method("getAllIngredientsForCocktail")->willReturn($sastojci); //vraca sve sastojke
        $mockModel->method("getCocktailById")->willReturn($koktel); //vraca Manhattan
        $mockModel->method("updateAvgGradeForCocktail")->with($this->equalTo(14),$this->equalTo(5));   //PROVERA DA LI RACUNA DOBRO PROSECNU OCENU, nista se nije promenilo
        $mockModel->method("getSteps")->willReturn($stepovi); //vraca sve stepove
      
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'id'=>'14',
            'stars'=>''  //nije uneo ocenu, stanje ostaje neporomenjeno
        ]);

        $results = $this->withRequest($request)
                ->controller('\App\Controllers\RegisteredController')
                ->execute("gradeCocktail");
    }


}