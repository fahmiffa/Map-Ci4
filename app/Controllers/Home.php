<?php

namespace App\Controllers;
use App\Models\user;
use Exception;
use App\Models\Map;

class Home extends BaseController
{
    function __construct()
    {
        $this->user = New User();
        $this->map = New Map();
    }

    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    public function daftar()
    {                
        return view('daftar');
    }

    public function reg()
    {
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required|min_length[4]',           
            'email' => 'required|valid_email|is_unique[user.email]',
        ],
        [   // Errors
            'username' => [
                'required' => 'Username harus di isi',
            ],
            'password' => [
                'min_length' => 'Password minimal 4 karakter',
                'required'=> 'Password harus di isi'
            ],
            'email'=> [
                'required'=> 'Email harus di isi',
                'valid_email'=> 'Format Email tidak valid',
                'is_unique'=> 'Email sudah terdaftar'
            ]
        ]
        )) {
            return redirect()->back()->withInput()->with('err',$this->validator->getErrors());   
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email'   => $this->request->getVar('email'),
            'status'=>0,
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $this->user->insert($data);

        return redirect()->back()->with('info', '<p class="text-white">Pendaftaran Berhasil, Silahkan hubungi admin untuk aktifkan akun</p>');


    }

    public function log()
    {
        if (!$this->validate([
            'email' => 'required',
            'password' => 'required',                       
        ],
        [   // Errors
            'email' => [
                'required' => 'Email harus di isi',
            ],
            'password' => [                
                'required'=> 'Password harus di isi'
            ], 
        ]
        )) {
            return redirect()->back()->withInput()->with('err',$this->validator->getErrors());  
        }

        $user = $this->user->where('email', $this->request->getPost('email'))->first();

        try {

            if($user == null)
            {                
                throw new Exception("Email atau password tidak ditemukan");
            }   

            // validasi password
            $pass = $user->password;
            if(!password_verify($this->request->getPost('password'),$pass))
            {
                throw new Exception("Password atau email tidak ditemukan");
            }
            $session = $this->session;

            $newdata = [
                'username'  => $user->username,
                'email'     => $user->email,
                'role'      => $user->role,
                'is_loggedIn' => true,
            ];
            
            $session->set($newdata);

            return redirect()->to('dashboard');
            

        } catch (Exception $e) {            
            return redirect()->back()->with('info','<p class="text-white">'.$e->getMessage().'</p>');
        }
        
 
    }

    public function map()
    {
        $data['map'] = $this->map->findAll();
        return view('map',$data);
    }

}
