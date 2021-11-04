<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        helper('form');
    }

    public function index()
    {
    }

    public function login()
    {
        echo view('v_login-user');
    }

    public function cek_login_user()
    {
        if ($this->validate([
            'user' => [
                'label' => 'User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ]
        ])) {
            //valid
            $user = $this->request->getPost('user');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->login_user($user, $password);
            if ($cek_login) {
                session()->set('nama_user', $cek_login['nama_user']);
                session()->set('user', $cek_login['user']);
                session()->set('foto', $cek_login['foto']);
                session()->set('level', 'Admin');
                return redirect()->to(base_url('Admin'));
            } else {
                session()->setFlashdata('pesan', 'Email atau Password Salah !!!');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function logout()
    {
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Logout Succses');
        return redirect()->to(base_url('auth/login'));
    }

    // Login Siswa
    public function loginSiswa()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Login Siswa',
            'validation' =>  \Config\Services::validation(),
        ];
        return view('v_login-siswa', $data);
    }

    public function cek_login_siswa()
    {
        if ($this->validate([
            'no_pendaftaran' => [
                'label' => 'ID',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!',
                ],
            ]
        ])) {
            //valid
            $no_pendaftaran = $this->request->getPost('no_pendaftaran');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->login_siswa($no_pendaftaran, $password);
            if ($cek_login) {
                session()->set('id_siswa', $cek_login['id_siswa']);
                session()->set('nisn', $cek_login['nisn']);
                session()->set('nama_lengkap', $cek_login['nama_lengkap']);
                session()->set('level', 'siswa');
                return redirect()->to('/Siswa');
            } else {
                session()->setFlashdata('pesan', 'ID atau Password Salah !!!');
                return redirect()->to('/Auth/LoginSiswa');
            }
        } else {
            //tidak valid
            $validation =  \Config\Services::validation();
            return redirect()->to('/Auth/LoginSiswa')->withInput()->with('validation', $validation);
        }
    }

    public function logout_siswa()
    {
        session()->remove('nisn');
        session()->remove('nama_lengkap');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Logout Succses');
        return redirect()->to('/Auth/LoginSiswa');
    }
}
