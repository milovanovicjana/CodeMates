<?php
namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\URI;
use Config\Services;

class GuestControllerMockTestMilica extends CIUnitTestCase
{

    //VAZNO: Za pokretanje testova neophodno izmeniti kod RegisteredController.php tako da Model klasu dohvata
    //iz fabrike: $model=Factories::models('App\Models\Model');

    use ControllerTester;

    public function setUp(): void
	{
		parent::setUp();
      

	
	}

   public function test_login_uspesno(){

        $user = (object)[
            'IdUser'=>1,
            'Name' => 'Tom',
            'Surname' => 'Jones',
            'Mail' => 'tom99@gmail.com',
            'Username' => 'tom',
            'DateOfBirth' => '1999-05-10',
            'Gender' => 'M',
            'Password' => 'tom123'
        ];
        

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->expects($this->once())->method("getUserByUsername")->with($this->equalTo("tom"))->willReturn($user);
        $mockModel->expects($this->once())->method("getAllUsers")->willReturn([]);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $mockRegModel = $this->createMock(\App\Models\RegisteredModel::class);
        $mockRegModel->method("find")->with($this->equalTo(1))->willReturn(null);
        Factories::injectMock('models', 'App\Models\RegisteredModel', $mockRegModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'username'=>'tom',
            'password'=>'tom123'  
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\GuestController')->execute("login");

        $results = $this->withRequest($request)->controller('\App\Controllers\AdminController')->execute("index");
        $this->assertTrue($results->see('USERNAME','font'));
    }


    public function test_login_pogresan_username(){

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->expects($this->once())->method("getUserByUsername")->with($this->equalTo("tom"))->willReturn(null);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'username'=>'tom',
            'password'=>'tom123'  
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\GuestController')->execute("login");
        $this->assertTrue($results->see('User not found.','p'));
    }

    public function test_login_pogresna_lozinka(){

        $user = (object)[
            'IdUser'=>1,
            'Name' => 'Tom',
            'Surname' => 'Jones',
            'Mail' => 'tom99@gmail.com',
            'Username' => 'tom',
            'DateOfBirth' => '1999-05-10',
            'Gender' => 'M',
            'Password' => 'tom123'
        ];

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->expects($this->once())->method("getUserByUsername")->with($this->equalTo("tom"))->willReturn($user);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'username'=>'tom',
            'password'=>'123'  
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\GuestController')->execute("login");
        $this->assertTrue($results->see('Incorrect password.','p'));
    }

    public function test_register_neispravan_datum(){

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->method("getRegisterIngredients")->willReturn([]);
        $mockModel->method("getUserByUsername")->with($this->equalTo("tom"))->willReturn(null);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'firstname'=>'Tom',
            'lastname'=>'Jones',
            'email'=>'tom99@gmail.com' ,
            'username'=>'tom',
            'password'=>'tom123',
            'passwordrpt'=>'tom123',
            'birthdate'=>'2008-05-10',
            'gender'=>'M'
        ]);
        
        $results = $this->withRequest($request)->controller('\App\Controllers\GuestController')->execute("register");
        $this->assertTrue($results->see('You must be 18 or older to register.','p'));
    }

    public function test_register_postoji_username(){

        $user = (object)[
            'IdUser'=>2,
            'Name' => 'Tom',
            'Surname' => 'Charles',
            'Mail' => 'tom.charles@gmail.com',
            'Username' => 'tom',
            'DateOfBirth' => '1985-06-11',
            'Gender' => 'M',
            'Password' => '123'
        ];

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->method("getRegisterIngredients")->willReturn([]);
        $mockModel->method("getUserByUsername")->with($this->equalTo("tom"))->willReturn($user);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'firstname'=>'Tom',
            'lastname'=>'Jones',
            'email'=>'tom99@gmail.com' ,
            'username'=>'tom',
            'password'=>'tom123',
            'passwordrpt'=>'tom123',
            'birthdate'=>'1999-05-10',
            'gender'=>'M'
        ]);
        
        $results = $this->withRequest($request)->controller('\App\Controllers\GuestController')->execute("register");
        $this->assertTrue($results->see('User name already taken.','p'));
    }

    public function test_register_nepodudarnost_lozinki(){

        $ingredients = [
            (object)[
                'IdIngredient'=>2,
                'Name'=>'Votka',
                'Type'=>'ALCOHOL',
                'AveragePrice'=>20
            ],
            (object)[
                'IdIngredient'=>4,
                'Name'=>'Tequila',
                'Type'=>'ALCOHOL',
                'AveragePrice'=>50
            ]
        ];

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->method("getRegisterIngredients")->willReturn($ingredients);
        $mockModel->method("getUserByUsername")->with($this->equalTo("tom"))->willReturn(null);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'firstname'=>'Tom',
            'lastname'=>'Jones',
            'email'=>'tom99@gmail.com' ,
            'username'=>'tom',
            'password'=>'tom123',
            'passwordrpt'=>'tom12',
            'birthdate'=>'1999-05-10',
            'gender'=>'M'
        ]);
        
        $results = $this->withRequest($request)->controller('\App\Controllers\GuestController')->execute("register");
        $this->assertTrue($results->see('Passwords do not match','p'));
    }

   /*public function test_register_uspesno(){

        $user = (object)[
            'IdUser'=>1,
            'Name' => 'Tom',
            'Surname' => 'Jones',
            'Mail' => 'tom99@gmail.com',
            'Username' => 'tom',
            'DateOfBirth' => '1999-05-10',
            'Gender' => 'M',
            'Password' => 'tom123'
        ];

        $ingredients = [
            (object)[
                'IdIngredient'=>2,
                'Name'=>'Votka',
                'Type'=>'ALCOHOL',
                'AveragePrice'=>20
            ],
            (object)[
                'IdIngredient'=>4,
                'Name'=>'Tequila',
                'Type'=>'ALCOHOL',
                'AveragePrice'=>50
            ]
        ];

        $preference = (object)[
            'IdUser'=>1,
            'IdIngredient'=>2,
            'Value'=>30
        ];

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->method("getRegisterIngredients")->willReturn($ingredients);
        $mockModel->method("getUserByUsername")->with($this->equalTo("tom"))->willReturn($user);
        $mockModel->expects($this->once())->method("getTopRatedCocktails")->willReturn([]);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        
        $mockUserModel = $this->createMock(\App\Models\UserModel::class);
       $mockUserModel->method('insert')->with($this->equalTo($user));
        Factories::injectMock('models', 'App\Models\UserModel', $mockUserModel);

        $mockRegModel = $this->createMock(\App\Models\RegisteredModel::class);
        $mockRegModel->method("insert")->with($this->equalTo($user));
        Factories::injectMock('models', 'App\Models\RegisteredModel', $mockRegModel);

        $mockPrefModel = $this->createMock(\App\Models\PreferencesModel::class);
        $mockPrefModel->method("insert")->with($this->equalTo($preference));
        Factories::injectMock('models', 'App\Models\PreferencesModel', $mockPrefModel);
        


        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'firstname'=>'Tom',
            'lastname'=>'Jones',
            'email'=>'tom99@gmail.com' ,
            'username'=>'tom',
            'password'=>'tom123',
            'passwordrpt'=>'tom123',
            'birthdate'=>'1999-05-10',
            'gender'=>'M'
        ]);
        
        $results = $this->withRequest($request)->controller('\App\Controllers\GuestController')->execute("register");
        
       $results = $this->withRequest($request)->controller('\App\Controllers\RegisteredController')->execute("index");
        $this->assertTrue($results->see('Tom'));
    }*/

}