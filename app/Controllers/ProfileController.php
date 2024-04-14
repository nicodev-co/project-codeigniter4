<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('id'));

        return view('profile/index',[
            'user' => $user
        ]);
    }

    public function update($id = null)  
    {
        $rules = [
            'username' => "required|is_unique[users.username,username,{$this->request->getPost('username')}]"
        ]; 

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error',$this->validator->listErrors());
        }

        $post = $this->request->getPost(['username','password']);

        $data = [
            'username' => $post['username']
        ];

        if ($post['password']) {
            $data['password'] = password_hash($post['password'],PASSWORD_DEFAULT);
        }

        $userModel = new UserModel();

        $query = $userModel->update($id,$data);
        if ($query) {
            return redirect()->back()->with('success','Perfil actualizado!');
        }
    }
}
