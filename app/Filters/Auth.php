<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface // filtre qui permet de rediriger un utilisateur qui n'est pas logger
{
    public function before(RequestInterface $request)
    {
        // Do something here
        if(!session()->get('isLoggedIn')){
          return redirect()->to('/');
        }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}
