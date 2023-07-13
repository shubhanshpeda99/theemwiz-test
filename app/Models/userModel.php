<?php

namespace App\Models;

class userModel extends \CodeIgniter\Model
{

    protected  $table = 'user';

    protected $allowedFields = ['name', 'email', 'password', 'phone_no', 'activation_hash'];

    protected $returnType = 'App\Entities\User';

    protected $useTimestamps = true;

    protected $validationRules = [
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[user.email]',
        'phone_no' => 'required|max_length[10]',
        'password' => 'required|min_length[6]',
        'password_confirmation' => 'required|matches[password]'
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'That Email Address Is Taken.'
        ],
        'password_confirmation' => [
            'required' => 'Please Confirm Password.',
            'matches' => 'Please Enter The Same Password Again.'
        ]
    ];

    protected $beforeInsert = ['hashPassword'];

    protected $beforeUpdate = ['hashPassword'];


    protected function hashPassword(array $data)
    {

        if (isset($data['data']['password'])) {

            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

            unset($data['data']['password']);
            unset($data['data']['password_confirmation']);
        }

        return $data;
    }


    public function findByEmail($email)
    {

        return $this->where('email', $email)
            ->first();
    }

    public function activateByToken($token)
    {

        $activation_hash = hash_hmac('sha256', $token, $_ENV['HASH_SECRET_KEY']);

        $user = $this->where('activation_hash', $activation_hash)
            ->first();

        if ($user != null) {

            $user->activate();

            $this->protect(false)->save($user);
        }
    }
}
