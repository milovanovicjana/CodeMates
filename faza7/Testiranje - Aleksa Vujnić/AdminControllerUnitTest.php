<?php
namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\URI;
use Config\Services;

class AdminControllerUnitTest extends CIUnitTestCase
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

	public function test_showAdminInfo()
	{		
		$results = $this->controller('\App\Controllers\AdminController')
                ->execute("showAdminInfo");
		
        $this->assertTrue($results->see('My info', 'h3'));
        $this->assertTrue($results->see('First name', 'label'));
        $this->assertTrue($results->see('Tom'));
	}

    public function test_changeAdminInfo(){

        $mockModel = $this->createMock(\App\Models\Model::class);
		$mockModel->expects($this->once())->method("changeUsername")->with($this->equalTo(1),$this->stringContains('mariar'));
        $mockModel->expects($this->once())->method("changeName")->with($this->equalTo(1),$this->stringContains('Maria'));
        $mockModel->expects($this->once())->method("changeSurname")->with($this->equalTo(1),$this->stringContains('Robinson'));
        $mockModel->expects($this->once())->method("changeMail")->with($this->equalTo(1),$this->stringContains('mariar@gmail.com'));
        $mockModel->expects($this->once())->method("changeGender")->with($this->equalTo(1),$this->stringContains('F'));
        $mockModel->expects($this->exactly(2))->method("getUserByUsername")->willReturn(null);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'firstname'=>'Maria',
            'lastname'=>'Robinson',
            'email'=>'mariar@gmail.com',
            'username' => 'mariar',
            'gender' => 'F'
        ]);

        $results = $this->withRequest($request)
                ->controller('\App\Controllers\AdminController')
                ->execute("changeAdminInfo");

    }

    public function test_changeAdminInfo_usernameTaken(){

        $existing = (object)[
            'IdUser'=>2,
            'Username' => 'mariar'
        ];

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->expects($this->once())->method("getUserByUsername")->willReturn($existing);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'firstname'=>'Maria',
            'lastname'=>'Robinson',
            'email'=>'mariar@gmail.com',
            'username' => 'mariar',
            'gender' => 'F'
        ]);

        $results = $this->withRequest($request)
                ->controller('\App\Controllers\AdminController')
                ->execute("changeAdminInfo");
        $this->assertTrue($results->see('Username already taken.','p'));

    }

    public function test_changeAdminPass(){

        $mockModel = $this->createMock(\App\Models\Model::class);
		$mockModel->expects($this->once())->method("changePassword")->with($this->equalTo(1),$this->stringContains('maria123'));
        $mockModel->expects($this->once())->method("getUserByUsername")->willReturn(null);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'curpass'=>'tom123',
            'newpass'=>'maria123',
            'newpassconf'=>'maria123'
        ]);

        $results = $this->withRequest($request)
                ->controller('\App\Controllers\AdminController')
                ->execute("changeAdminPass");
                
    }

    public function test_changeAdminPass_wrongCurrent(){

        $mockModel = $this->createMock(\App\Models\Model::class);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'curpass'=>'tommy123',
            'newpass'=>'maria123',
            'newpassconf'=>'maria123'
        ]);

        $results = $this->withRequest($request)
                ->controller('\App\Controllers\AdminController')
                ->execute("changeAdminPass");

        $this->assertTrue($results->see('Wrong input','label'));
                
    }

    public function test_changeAdminPass_nonMatching(){

        $mockModel = $this->createMock(\App\Models\Model::class);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $request = new \CodeIgniter\HTTP\IncomingRequest(new \Config\App(), new URI('http://example.com/'),'',new \CodeIgniter\HTTP\UserAgent());
        $request->setGlobal('request',[
            'curpass'=>'tom123',
            'newpass'=>'mariaaa123',
            'newpassconf'=>'maria123'
        ]);

        $results = $this->withRequest($request)
                ->controller('\App\Controllers\AdminController')
                ->execute("changeAdminPass");

        $this->assertTrue($results->see('Wrong input','label'));
                
    }



}