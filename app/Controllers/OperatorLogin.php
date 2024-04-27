<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class OperatorLogin extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('login/operator');
    }

    public function auth()
    {
        $email = $this->request->getPost('email');
        $password = (string)  $this->request->getPost('password');

        $check = $this->db->table('operator')->where('email', $email)->get()->getRowArray();

        if ($check) {
            $verify = password_verify($password, $check['password']);

            if ($verify) {
                session()->set([
                    'id' => $check['id'],
                    'email' => $check['email'],
                    'operator_logged_in' => true
                ]);

                return redirect()->to(base_url('OperatorPanel'))->with('type-status', 'info')
                    ->with('message', 'Selamat Datang Kembali ' . $check['email']);
            }

            return redirect()->to(base_url('Login/Operator'))->with('type-status', 'error')
                ->with('message', 'Maaf password yang dimasukkan salah!');
        }

        return redirect()->to(base_url('Login/Operator'))->with('type-status', 'error')
            ->with('message', 'Maaf email tidak terdaftar, silahkan hubungi operator!');
    }

    public function logoff()
    {
        session()->set('operator_logged_in', false);

        return redirect()->to(base_url('Login/Operator'))->with('type-status', 'info')
            ->with('message', 'Berhasil keluar');
    }
}