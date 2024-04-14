<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    protected $helpers = ['form'];

    public function register()
    {
        return view('auth/register');
    }

    public function registerCreate()
    {
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'password' => 'required',
            'role' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['username', 'password', 'role']);

        $userModel = new UserModel();

        $data = [
            'username' => $post['username'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'role' => $post['role']
        ];

        $query = $userModel->insert($data);

        if ($query) {
            return redirect()->to('/')->with('success', 'Registro exitoso!');
        }
    }

    public function login()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost(['username', 'password']);

        $userModel = new UserModel();

        $user = $userModel->where('username', $post['username'])->first();

        if ($user && password_verify($post['password'], $user->password)) {
            $data = [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
                'isLoggedIn' => true
            ];

            session()->set($data);

            return redirect()->to('dashboard');
        } else {
            return redirect()->back()->withInput()->with('error', 'Credenciales incorrectas!');
        }
    }

    public function logout()  
    {
        session()->destroy();
        
        return redirect()->to('/');
    }
}
