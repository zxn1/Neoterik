<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return redirect()->to(route_to('dashboard'));
    }

    public function maintenance()
    {
        return view('maintenance');
    }
}
