<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Dashboard'
        ];
        echo view('dashboard', $data);
    }

    //--------------------------------------------------------------------

}
