<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdm implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        // Do something here
        if(session()->get('droits') < 2 ){
            return redirect()->to('/');
        }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}
