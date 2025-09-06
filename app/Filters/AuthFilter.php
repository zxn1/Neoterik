<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (env('UNDERMAINTENANCE') == true && $request->getUri()->getPath() !== route_to('maintenance')) {
            return redirect()->to(route_to('maintenance'));
        } else if(env('UNDERMAINTENANCE') == false && $request->getUri()->getPath() === route_to('maintenance')) {
            return redirect()->to('login/');
        } else if(env('UNDERMAINTENANCE') == true && $request->getUri()->getPath() === route_to('maintenance')) {
            return;
        }

        // Excluded url list
        $excluded_url = [
            route_to('gen_acc')
        ];

        if (in_array($request->getUri()->getPath(), $excluded_url)) {
            return; // allow access
        }
        // end

        // Do something here
        $session = service('session');
        $sm_id = $session->get('sm_id');
        

        if (empty($sm_id)){
            return redirect()->to('login/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}