<?php
namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\URI;
use Config\Services;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class RegisteredControllerMockTestAna extends CIUnitTestCase
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

   
    public function test_search_only_name_entered(){
        $existing =[ 
            (object)[
                'IdCocktail' => 14,
                'CocktailName'=>'Manhattan', 
                'AvgGrade'=> 0,
                'Recipes'=>'The Manhattan was the most famous cocktail in the world shortly after it was invented in New York City’s Manhattan Club, some time around 1880 (as the story goes). Over the years, the whiskey classic has dipped in and out of fashion before finding its footing as one of the cornerstones of the craft cocktail renaissance.\nAmazingly, the drink that socialites tipped to their lips in the 19th century looks and tastes pretty much the same as the one served today at any decent cocktail bar. The Manhattan’s mix of American whiskey and Italian vermouth, enlivened with a few dashes of aromatic bitters, is timeless and tasty—the very definition of what a cocktail should be.\nDespite all of the Manhattan’s unassailable qualities, bartenders and enterprising drinkers have still found ways to tweak the recipe into myriad variations. If you split the vermouth between sweet and dry, you get the Perfect Manhattan. If you switch the ratios to make vermouth the star, you’ve stirred up a Reverse Manhattan. The Rob Roy is essentially a scotch Manhattan. And then you’ve got other named-for-New York cocktails like the Red Hook and Brooklyn, which employ their own twists to take the drink in new directions.\nBut regardless of all the options, there is only one classic Manhattan: two parts whiskey, one part sweet vermouth and bitters. Mix one (stirred, never shaken), and you’ll see why this storied drink has remained a favorite since its inception.' , 
                'Image'=>'Manhattan_14.png', 
                'Price'=> 9,
                'Alcoholic'=> 1, 
                'Approved'=> 1,
                'Description'=>'Combine vermouth and whiskey to make the perfect Manhattan cocktail. Add lemon,  and cherry to complete the classic flavour combination']
            ]; 

        
        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->expects($this->once())->method("search")->with($this->equalTo([]),$this->equalTo(""),$this->equalTo("Manhattan"))->willReturn($existing);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'cocktailName'=>"Manhattan",
            'Type'=>"",
            'filter'=>[]
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\RegisteredController')->execute("search");

        $this->assertTrue($results->see('Recipe results:'));
        $this->assertTrue($results->see('Manhattan','a'));
    }


    public function test_search_failed(){

        $mockModel = $this->createMock(\App\Models\Model::class);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'cocktailName'=>"",
            'Type'=>"",
            'filter'=>[]
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\RegisteredController')->execute("search");

        $this->assertTrue($results->see('Please enter a cocktail name or click on the filters to start searching.','p'));
        
    }

    public function test_search_failed_no_cocktails(){
        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->expects($this->once())->method("search")->with($this->equalTo([]),$this->equalTo("Alcoholic"),$this->equalTo("Kubana"))->willReturn([]);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'cocktailName'=>"Kubana",
            'Type'=>"Alcoholic",
            'filter'=>[]
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\RegisteredController')->execute("search");

        $this->assertTrue($results->see('Sorry, no results were found'));
    }

    public function test_search_more_filters(){
        $existing =[ 
            (object)[
                'IdCocktail' => 18,
                'CocktailName'=>'Mojito', 
                'AvgGrade'=> 0,
                'Recipes'=>'The Mojito is one of the most popular rum cocktails served today, with a recipe known around the world. The origins of this classic drink can be traced to Cuba and the 16th-century cocktail El Draque. Named for Sir Francis Drake, the English sea captain and explorer who visited Havana in 1586, El Draque was composed of aguardiente (a cane-spirit precursor to rum), lime, mint and sugar. It was supposedly consumed for medicinal purposes, but it’s easy to believe that drinkers enjoyed its flavor and effects.\nAppropriately, almost all of the ingredients in the Mojito are indigenous to Cuba. Rum, lime, mint and sugar (the island nation grows sugar cane) are joined together and then lengthened with thirst-quenching club soda to create a delicious, lighthearted cocktail. The drink is traditionally made with unaged white rum, which yields a light, crisp flavor. Using Cuban rum will score you points for authenticity, although many modern Cuban rums are lighter in style than their predecessors, so you might try experimenting with white rums until you find one that you like best.\nThe Mojito is slightly more labor-intensive than other cocktails because it involves muddling the mint, but the end result is worth the effort. The mint combines with the other ingredients for an extra dose of refreshment that, while often associated with summer, can be enjoyed any time of the year.\nIf you prefer your cocktails with a dash of literary history, you’re in luck. The Mojito is said to have been a favorite of Ernest Hemingway who, according to local lore, partook of them regularly at the Havana bar La Bodeguita del Medio.\n',
                'Image'=>'Mojito_18.png', 
                'Price'=> 9,
                'Alcoholic'=> 1, 
                'Approved'=> 1,
                'Description'=>'Mix this classic cocktail for a party using fresh mint, white rum, zesty lime and cooling soda water. Play with the quantities to suit your taste.']
            ]; 

        
        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->expects($this->once())->method("search")->with($this->equalTo("White rum,Lime juice"),$this->equalTo("Alcoholic"),$this->equalTo("Mojito"))->willReturn($existing);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'cocktailName'=>"Mojito",
            'Type'=>"Alcoholic",
            'filter'=>["White rum","Lime juice"]
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\RegisteredController')->execute("search");

        $this->assertTrue($results->see('Recipe results:'));
        $this->assertTrue($results->see('Mojito','a'));
    }


    /*public function test_addCocktail(){

        $existing = 
            (object)[
                'IdCocktail' => 23,
                'CocktailName'=>'Kubana', 
                'AvgGrade'=> 0,
                'Recipes'=>'Recipe', 
                'Image'=>'Kubana_23.jpg', 
                'Price'=> 0,
                'Alcoholic'=> 0, 
                'Approved'=> 0,
                'Description'=>'Nice cocktail']; 

        $mockModel = $this->createMock(\App\Models\Model::class);

        $file = UploadedFile::fake()->create('image.jpg');
        $mockModel->expects($this->once())->method("insertCocktail")->with($this->equalTo("Kubana"),$this->equalTo("Nice cocktail"), $this->equalTo("Recipe"));//prima name, description, recipe

        $mockModel->expects($this->once())->method("getLastCocktail")->willReturn($existing);//dohvata se poslednji koktel

        $mockModel->expects($this->once())->method("addImage")->with($this->equalTo('23'),$this->equalTo('Kubana_23.jpg'));//dohvata se poslednji koktel
        
        $mockModel->expects($this->once())->method("getAllIngredients")->willReturn([]);


        Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'name'=>"Kubana",
            'description'=>"Nice cocktail",
            'image'=>$file,
            'recipe'=>'Recipe'
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\RegisteredController')->execute("addCocktail");
        $this->assertTrue($results->see('Add ingredients to the cocktail (2/3)','h2'));

    }*/

    public function test_addIngredient(){

        $existing = 
            (object)[
                'IdCocktail' => 23,
                'CocktailName'=>'Kubana', 
                'AvgGrade'=> 0,
                'Recipes'=>'Recipe', 
                'Image'=>'Kubana_23.jpg', 
                'Price'=> 0,
                'Alcoholic'=> 0, 
                'Approved'=> 0,
                'Description'=>'Nice cocktail'];
        

        
        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->expects($this->once())->method("getLastCocktail")->willReturn($existing);//dohvata se poslednji koktel
        
        $mockModel->expects($this->once())->method("addContains")->with($this->equalTo(1),$this->equalTo(23),$this->equalTo(100))->willReturn(true);
        $mockModel->expects($this->once())->method("getAllIngredients")->willReturn([]);

        Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'idIngredient'=>'1',
            'quantity'=>'100',
            
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\RegisteredController')->execute("addIngredient");
        

        $results = $this->withRequest($request)->controller('\App\Controllers\RegisteredController')->execute("showAddCocktail2");
        $this->assertTrue($results->see('Add ingredients to the cocktail (2/3)','div'));


    }



    public function test_addIngredient_fail(){

        $existing = 
            (object)[
                'IdCocktail' => 23,
                'CocktailName'=>'Kubana', 
                'AvgGrade'=> 0,
                'Recipes'=>'Recipe', 
                'Image'=>'Kubana_23.jpg', 
                'Price'=> 0,
                'Alcoholic'=> 0, 
                'Approved'=> 0,
                'Description'=>'Nice cocktail'];
        

        
        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->expects($this->once())->method("getLastCocktail")->willReturn($existing);//dohvata se poslednji koktel
        
        $mockModel->expects($this->once())->method("addContains")->with($this->equalTo(1),$this->equalTo(23),$this->equalTo(100))->willReturn(false);
        $mockModel->expects($this->once())->method("getAllIngredients")->willReturn([]);

        Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'idIngredient'=>'1',
            'quantity'=>'100',
            
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\RegisteredController')->execute("addIngredient");
        $this->assertTrue($results->see('Already added this ingredient.','p'));


    }

    public function test_addSteps(){
        $existing = 
            (object)[
                'IdCocktail' => 23,
                'CocktailName'=>'Kubana', 
                'AvgGrade'=> 0,
                'Recipes'=>'Recipe', 
                'Image'=>'Kubana_23.jpg', 
                'Price'=> 0,
                'Alcoholic'=> 0, 
                'Approved'=> 0,
                'Description'=>'Nice cocktail'];
        
       
        
        
        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->expects($this->once())->method("getLastCocktail")->willReturn($existing);//dohvata se poslednji koktel
        $mockModel->expects($this->once())->method("getLastStep")->with($this->equalTo(23))->willReturn(null);//dohvata se poslednji step
        $mockModel->expects($this->once())->method("addStep")->with($this->equalTo(23),$this->equalTo(1),$this->equalTo('Step 1'));//dodaje step.


        Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'step'=>'Step 1',
         ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\RegisteredController')->execute("addSteps");
        

        $results = $this->withRequest($request)->controller('\App\Controllers\RegisteredController')->execute("showAddCocktail3");
        $this->assertTrue($results->see('Add your recipe by entering each step by step:','label'));


    }

    




}