<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

/**
 * @author Jana Milovanovic 0292/2019 
 *
 * RegisteredFilter - klasa koja sprecava da neulogovani korisnici iil admin otvaraju stranice ulogovanog korisnika 
 */

class RegisteredFilter implements FilterInterface
{
     /**
     * poziva se pre bilo koje funkcije iz RegisteredController-a
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session=session();
        if(!$session->has('usertype')){
            return redirect()->to('GuestController');
        }
        if($session->get('usertype')=='Admin'){
            return redirect()->to('AdminController');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}