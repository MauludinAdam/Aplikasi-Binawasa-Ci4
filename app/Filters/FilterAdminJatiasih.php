<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterAdminJatiasih implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do you something
        if(session()->get('level') == "") {
            session()->setFlashdata('error','Session anda habis, Silahkan login terlebih dahulu');
            return redirect()->to('auth/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do you something

        if(session()->get('level') == "Admin Jatiasih") {
            return redirect()->to('Home');
        }
    }
}
