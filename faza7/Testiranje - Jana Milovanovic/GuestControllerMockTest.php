<?php
namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\URI;
use Config\Services;

class GuestControllerMockTest extends CIUnitTestCase
{

    //VAZNO: Za pokretanje testova neophodno izmeniti kod RegisteredController.php tako da Model klasu dohvata
    //iz fabrike: $model=Factories::models('App\Models\Model');

    use ControllerTester;

    public function setUp(): void
	{
		parent::setUp();

		
	}
    

    public function test_cocktailDisplayUnregistered(){

        
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
          (object)['IdCocktail'=>14,'Id'=>1,'Step'=>'Garnish with a brandied cherry or a lemon twist.']

        ];

        $existing3=[
            (object)['IdCocktail'=>14,'IdIngredient'=>12,'Quantity'=>0, 'Name'=>'Cherry', 'Type'=>'FRUIT', 'AveragePrice'=>0]
        ];

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->method("getCocktailById")->willReturn($existing1); //vraca Manhattan
        $mockModel->method("getSteps")->willReturn($existing2); //vraca sve stepove
        $mockModel->method("getAllIngredientsForCocktail")->willReturn($existing3); //vraca sve sastojke
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

    
        $results =$this->controller('\App\Controllers\GuestController')
                   ->execute("cocktailDisplayUnregistered",14);
                     $this->assertTrue($results->see('Ingredients','h3'));
                     $this->assertTrue($results->see('Manhattan','font'));
                     $this->assertFalse($results->see('Tom'));
    }



}