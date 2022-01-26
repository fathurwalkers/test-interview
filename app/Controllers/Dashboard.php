<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Config\Database;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->usermodel = new UsersModel();
    }

    public function index()
    {
        $users = session('username');
        if (!$users) {
            return redirect()->to('/login');
        } else {
            return view('dashboard/index', ['users' => $users]);
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('username');
        return redirect()->to('/login');
    }

    public function login()
    {
        $users = session('username');
        if ($users == NULL) {
            return view('login');
        } else {
            return redirect()->to('/');
        }
        // return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function postregister()
    {
        $this->usermodel->save([
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'level' => "admin",
        ]);
        return redirect()->to('/login');
    }

    public function postlogin()
    {
        $session = session();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cocokuser = $this->usermodel->where('username', $username)->first();
        if ($cocokuser) {
            $cocokpassword = $this->usermodel->where('password', $password)->first();
            if ($cocokpassword) {
                $setData = [
                    'username' => $username,
                    'password' => $password
                ];
                $session->set($setData);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/login');
            }
        } else {
            return redirect()->to('/login');
        }
        return redirect()->to('/login');
    }
}
