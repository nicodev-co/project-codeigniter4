<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JobModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class JobController extends BaseController
{
    protected $helpers = ['form'];
    
    public function index()
    {
        $jobModel = new JobModel();
        $jobs = $jobModel->getUser();

        return view('job/index',[
            'jobs' => $jobs
        ]);
    }

    public function new()  
    {
        return view('job/create');
    }

    public function create()  
    {
        $rules = [
            'title' => 'required',
            'description' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error',$this->validator->listErrors());
        }

        $post = $this->request->getPost(['title','description']);

        $jobModel = new JobModel();
        $userModel = new UserModel();

        $user = $userModel->find(session()->get('id'));

        $data = [
            'title' => $post['title'],
            'description' => $post['description'],
            'user_id' => $user->id,
        ];

        $query = $jobModel->insert($data);

        if ($query) {
            return redirect()->to('jobs')->with('success','Oferta registrada!');
        }
    }
}
