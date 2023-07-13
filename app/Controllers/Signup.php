<?php

namespace App\Controllers;

class Signup extends BaseController{

    public function create(){

            $user = new \App\Entities\User($this->request->getPost());

            $model = new \App\Models\userModel;

            $user->startActivation();

            if($model->insert($user)){

                $this->sendActivationEmail($user);

                return redirect()->back()
                                 ->with('success','SignUp Successfully.');
        
                }else{
                    
                    return redirect()->back()
                                     ->with('errors',$model->errors())
                                     ->with('warning','Invalid Data')
                                     ->withInput();
                                     
                }

    }

    public function activate($token){

        $model = new \App\Models\userModel;

        $model->activateByToken($token);

        return redirect()->to('/')
                         ->with('success','Account Activated Successfully,Please Login To Continue.');

    }


    private function sendActivationEmail($user){

        $email = service('email');

        $email->setTo($user->email);

        $email->setSubject('Account Activation');

        $message = view('signup/activation_email',[
            'token' => $user->token
        ]);

        $email->setMessage($message);

        $email->send();
    }

}