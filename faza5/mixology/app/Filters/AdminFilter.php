<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


/**
 * @author Jana Milovanovic 0292/2019 
 *
 * AdminFilter - klasa koja sprecava da neulogovani iil ulogovani korisnik(koji nije admin) otvaraju stranice admina 
 */

class AdminFilter implements FilterInterface
{
    /**
     * poziva se pre bilo koje funkcije iz AdminController-a
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session=session();
        if(!$session->has('usertype')){
            return redirect()->to('GuestController');
        }
        if($session->get('usertype')=='Registered'){
            return redirect()->to('RegisteredController');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}