<?php
namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\URI;
use Config\Services;

class AdminControllerMockTestAna extends CIUnitTestCase
{

    //VAZNO: Za pokretanje testova neophodno izmeniti kod RegisteredController.php tako da Model klasu dohvata
    //iz fabrike: $model=Factories::models('App\Models\Model');

    use ControllerTester;

    public function setUp(): void
	{
		parent::setUp();

        $user = (object)[
            'IdUser'=>1,
            'Name' => 'Mark',
            'Surname' => 'Smith',
            'Mail' => 'mark@gmail.com',
            'Username' => 'admin',
            'DateOfBirth' => '1999-05-10',
            'Gender' => 'M',
            'Password' => 'admin123'
        ];

        $sessionMock = $this->getMockBuilder('CodeIgniter\Session')
            ->setMethods(['get','set'])
            ->getMock();
        $sessionMock->method('get')->willReturn($user);
        $sessionMock->method('set');
        Services::injectMock('session', $sessionMock);

    } 

    

    public function test_deleteAccounts_admin_failed(){
        //svi korisnici
       
 
        $existing=[
            (object)[
                'IdUser'=>1,
                'Name' => 'Mark',
                'Surname' => 'Smith',
                'Mail' => 'mark@gmail.com',
                'Username' => 'admin',
                'DateOfBirth' => '1999-05-10',
                'Gender' => 'M',
                'Password' => 'admin123'
            ],
            (object)[
                'IdUser'=>2,
                'Name' => 'Tom',
                'Surname' => 'Jones',
                'Mail' => 'tom99@gmail.com',
                'Username' => 'tom99',
                'DateOfBirth' => '1999-05-10',
                'Gender' => 'M',
                'Password' => 'tom123'
            ],
            (object)[
                'IdUser'=>3,
                'Name' => 'Monika',
                'Surname' => 'Taylor',
                'Mail' => 'monika@hotmail.com',
                'Username' => 'monika123',
                'DateOfBirth' => '2000-05-13',
                'Gender' => 'F',
                'Password' => 'monikaaa123'
            ]
        ];

        $mockModel = $this->createMock(\App\Models\Model::class);
        
        //svi korisnici ispisani

        //uklanjanje naloga Tom-a
        
        $mockModel->expects($this->once())->method("deleteUsersAccounts")->with($this->equalTo(['1']));
        $mockModel->expects($this->once())->method("getAllUsers")->willReturn($existing);
         Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'users'=>['1']
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\AdminController')->execute("deleteAccounts");
       //gotovo brisanje
       //provera sta admin dobija kao ispis, niko ne treba da bude obrisan
       $this->assertTrue($results->see('Tom','td')); //svi su tu
       $this->assertTrue($results->see('Monika','td'));
       $this->assertTrue($results->see('Mark','td'));


    }

    public function test_deleteAccounts_only_one(){
       
        $existing1=[
            (object)[
                'IdUser'=>1,
                'Name' => 'Mark',
                'Surname' => 'Smith',
                'Mail' => 'mark@gmail.com',
                'Username' => 'admin',
                'DateOfBirth' => '1999-05-10',
                'Gender' => 'M',
                'Password' => 'admin123'
            ],
            (object)[
                'IdUser'=>3,
                'Name' => 'Monika',
                'Surname' => 'Taylor',
                'Mail' => 'monika@hotmail.com',
                'Username' => 'monika123',
                'DateOfBirth' => '2000-05-13',
                'Gender' => 'F',
                'Password' => 'monikaaa123'
            ]
        ];


        $mockModel = $this->createMock(\App\Models\Model::class);
        
        $mockModel->expects($this->once())->method("deleteUsersAccounts")->with($this->equalTo(['2']));
        $mockModel->expects($this->once())->method("getAllUsers")->willReturn($existing1);
         Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'users'=>['2']
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\AdminController')->execute("deleteAccounts");
       //gotovo brisanje
       //provera sta admin dobija kao ispis, treba jedino Tom da bude obrisan
       $this->assertFalse($results->see('Tom','td'));
       $this->assertTrue($results->see('Monika','td'));
       $this->assertTrue($results->see('Mark','td'));


    }

    public function test_deleteAccounts_two(){
        
       
 
            $existing1=[
            (object)[
                'IdUser'=>1,
                'Name' => 'Mark',
                'Surname' => 'Smith',
                'Mail' => 'mark@gmail.com',
                'Username' => 'admin',
                'DateOfBirth' => '1999-05-10',
                'Gender' => 'M',
                'Password' => 'admin123'
            ]
        ];


        $mockModel = $this->createMock(\App\Models\Model::class);
        
        $mockModel->expects($this->once())->method("deleteUsersAccounts")->with($this->equalTo(['2','3']));
        $mockModel->expects($this->once())->method("getAllUsers")->willReturn($existing1);
         Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'users'=>['2','3']
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\AdminController')->execute("deleteAccounts");
       //gotovo brisanje
       //provera sta admin dobija kao ispis, treba jedino Tom da bude obrisan
       $this->assertFalse($results->see('Tom','td'));
       $this->assertFalse($results->see('Monika','td'));
       $this->assertTrue($results->see('Mark','td'));


    }

    public function test_approveCocktail_A(){
        
        $mockModel = $this->createMock(\App\Models\Model::class);
        //odobravamo koktel Hugo sa id=2
        $mockModel->expects($this->once())->method("approveCocktails")->with($this->equalTo(['2']),$this->equalTo('A'));
        $mockModel->expects($this->once())->method("getUnapprovedCocktails")->willReturn([]);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'cocktail'=>['2'],
            'type'=>"A"
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\AdminController')->execute("approveCocktails");

        //nema vise Hugo koktela u listi koktela za odobravanje
        $this->assertFalse($results->see('Hugo','font'));
        $this->assertTrue($results->see('Approve or Reject','p'));

        //da proverimo kad searchujemo da li ima Hugo koktela


    }

    public function test_approveCocktail_R(){
        
        $mockModel = $this->createMock(\App\Models\Model::class);
        //odobravamo koktel Hugo sa id=2
        $mockModel->expects($this->once())->method("approveCocktails")->with($this->equalTo(['2']),$this->equalTo('R'));
        $mockModel->expects($this->once())->method("getUnapprovedCocktails")->willReturn([]);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'cocktail'=>['2'],
            'type'=>"R"
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\AdminController')->execute("approveCocktails");

        //nema vise Hugo koktela u listi koktela za odobravanje
        $this->assertFalse($results->see('Hugo','font'));
        $this->assertTrue($results->see('Approve or Reject','p'));

        //da proverimo kad searchujemo da li ima Hugo koktela


    }

    public function test_approveCocktail_cocktail_not_selected(){
        
        $mockModel = $this->createMock(\App\Models\Model::class);
        
        /*$mockModel->expects($this->once())->method("approveCocktails")->with($this->equalTo(['2']),$this->equalTo('R'));*/
        $mockModel->expects($this->once())->method("getUnapprovedCocktails")->willReturn([]);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);
        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'cocktail'=>[],
            'type'=>"R"
        ]);

        $results = $this->withRequest($request)->controller('\App\Controllers\AdminController')->execute("approveCocktails");

        
        $this->assertTrue($results->see('Approve or Reject','p'));
        //da proverimo kad searchujemo da li ima Hugo koktela


    }






    
}