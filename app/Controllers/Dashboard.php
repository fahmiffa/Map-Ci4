<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\Map;

class Dashboard extends BaseController
{
    function __construct()
    {
        $this->user = New User();
        $this->map = New Map();
    }

    public function index()
    {

        return view('dashboard');
    }

    public function user()
    {
        $data['user'] = $this->user->findAll();     
        $data['da'] = 'Data Users';
        return view('user',$data);
    }

    public function map()
    {
        $data['map'] = $this->map->findAll();
        // dd($data['map']);
        $data['da'] = 'Data map';
        return view('map/maps',$data);
    }

    public function add_map()
    {
        $data['da'] = 'Tambah map';
        return view('map/add',$data);
    }

    public function store_map()
    {
        if (!$this->validate([
            'nama' => 'required|is_unique[map.nama]',
            'koordinat' => 'required',                       
        ],
        [   // Errors
            'nama' => [
                'required' => 'nama harus di isi',
                'is_unique' => 'nama sudah ada'
            ],
            'koordinat' => [                
                'required'=> 'koordinat harus di isi'
            ], 
        ]
        )) {
            return redirect()->back()->withInput()->with('err',$this->validator->getErrors());   
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'koordinat'   => $this->request->getVar('koordinat'),                        
        ];

        $this->map->insert($data);

        return redirect('dashboard/map');


    }

    public function delete_map($id)
    {
        $this->map->delete($id);        
    }

    public function edit_map($id)
    {
        $data['map'] = $this->map->find($id);
        $data['da'] ='Edit map';
        return view('map/edit',$data);
    }

    public function update_map($id)
    {

        if (!$this->validate([
            'nama' => 'required|is_unique[map.nama]',
            'koordinat' => 'required',                       
        ],
        [   // Errors
            'nama' => [
                'required' => 'nama harus di isi',
                'is_unique' => 'nama sudah ada'
            ],
            'koordinat' => [                
                'required'=> 'koordinat harus di isi'
            ], 
        ]
        )) {
            return redirect()->back()->withInput()->with('err',$this->validator->getErrors());   
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'koordinat'   => $this->request->getVar('koordinat'),                        
        ];

        $this->map->update($id,$data);

        return redirect('dashboard/map');

    }


}
