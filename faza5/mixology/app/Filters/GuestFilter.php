<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class GuestFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session=session();
        if ($session->has('usertype')){//ako je admin ili registrovani
            if($session->get('usertype')=='Registered'){
                return redirect()->to('RegisteredController');
            }
            if($session->get('usertype')=='Admin'){
                return redirect()->to('AdminController');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}