<?php
namespace App\Controllers;

use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Config\Factories;
use CodeIgniter\HTTP\URI;
use Config\Services;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BaseControllerMockTestMilica extends CIUnitTestCase
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
            ->setMethods(['get','set','destroy'])
            ->getMock();
        $sessionMock->method('get')->willReturn($user);
        $sessionMock->method('set');
        $sessionMock->method('destroy');
        Services::injectMock('session', $sessionMock);	
     
	} 

    public function test_logout(){

        $mockModel = $this->createMock(\App\Models\Model::class);
        $mockModel->method("getTopRatedCocktails")->willReturn([]);
        Factories::injectMock('models', 'App\Models\Model', $mockModel);

        $results =$this->controller('\App\Controllers\BaseController')->execute("logout");

        $results =$this->controller('\App\Controllers\GuestController')->execute("index");
        $this->assertTrue($results->see('Sign up'));
        $this->assertTrue($results->see('Log in'));

    }

}