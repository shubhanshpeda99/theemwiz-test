<?php

namespace App\Controllers;

use App\Entities\User;

Class Login extends BaseController{

    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\userModel;
        
    }

    public function index(){

        if(! service('auth')->isLoggedIn()){

            session()->set('redirect_url',current_url());
            
            return redirect()->to('/')
                             ->with('info','Please Login First.');
        }
        
        return view('home/index');
    }

    public function create(){

        $email = $this->request->getPost('email');

        $password = $this->request->getPost('password');

        $auth = service('auth');

        if($auth->login($email,$password)){

            $redirect_url = session('redirect_url') ?? '/';

            unset($_SESSION['redirect_url']);

            return redirect()->to('/login/index')
                                ->with('info','Login Successful.');

        }else{

            return redirect()->back()
            ->with('warning','InValid Login.')
            ->withInput();
        }
    }

    public function logOut(){

        

        service('auth')->logout();

        return redirect()->to('/login/showLoggoutMessage');
    }

    public function showLoggoutMessage(){

        return redirect()->to('/')
                  ->with('info','LogOut Successful.');
    }
}