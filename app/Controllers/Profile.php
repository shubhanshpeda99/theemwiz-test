<?php 

namespace App\Controllers;

Class Profile extends BaseController{

    private $user;

    public function __construct()
    {
        $this->user = service('auth')->getCurrentUser();
    }

    public function edit(){

        if(! service('auth')->isLoggedIn()){

            session()->set('redirect_url',current_url());
            
            return redirect()->to('/')
                             ->with('info','Please Login First.');
        }

        return view('Profile/edit',[
            'user' => $this->user
        ]);
    }

    public function update(){

        $this->user->fill($this->request->getPost());

        if(! $this->user->hasChanged()){

            return redirect()->back()
                             ->with('warning','Nothing To Update.')
                             ->withInput();

        }

        $model = new \App\Models\userModel;

        if( $model->save($this->user) ){

            return redirect()->to('/login/index')
                             ->with('info','Profile Updated Successfully.');
        }else{

            return redirect()->back()
                             ->with('errors',$model->errors())
                             ->with('warning','Invalid Data')
                             ->withInput();
        }
    }

    public function editPassword(){

        if(! service('auth')->isLoggedIn()){

            session()->set('redirect_url',current_url());
            
            return redirect()->to('/')
                             ->with('info','Please Login First.');
        }

        return view('Profile/edit_password');
    }

    public function updatePassword(){
        
        if( ! $this->user->verifyPassword($this->request->getPost('current_password')) ){

            return redirect()->back()
                             ->with('warning','Invalid Current Password.');

        }

        $this->user->fill($this->request->getPost());

        $model = new \App\Models\userModel;

        if($model->save($this->user)){

            return redirect()->to('/login/index')
                             ->with('info','Password updated Successfully.');

        }else{

            return redirect()->back()
                             ->with('errors',$model->errors())
                             ->with('warning','Inavlid Data');
        }
    }
}