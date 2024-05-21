<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use App\Models\ModelAdmin;

class Auth extends BaseController
{
    protected $AuthModel;
    protected $ModelAdmin;
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->AuthModel = new AuthModel();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title'         => 'Halaman Login',
            'page'          =>  'login', 
        ];

        return view('auth/template_login', $data);
    }

    public function register()
    {
        $data = [
            'title'     => 'Form Registrasi'
        ];

        return view('auth/register', $data);
    }

    public function save_register()
    {
        if($this->validate([
            'nama_lengkap'          => [
                'label'             => 'Nama Lengkap',
                'rules'             => 'required',
                'errors'            => [
                    'required'      => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
            'level'                 => [
                'label'             => 'Level',
                'rules'             => 'required',
                'errors'            => [
                    'required'      => '{field} Admin kecamatan harus diisi dan tidak boleh kosong',
                ]
            ],
            'email'                 => [
                'label'             => 'Email',
                'rules'             => 'required|valid_email',
                'errors'            => [
                    'required'      => '{field} wajib diisi dan tidak boleh kosong',
                    'valid_email'   => '{field} anda sudah terdaftar, silahkan gunakan {field} yang lain'
                ]
            ],
            'password'              => [
                'label'             => 'Password',
                'rules'             => 'required|min_length[6]|max_length[8]',
                'errors'            => [
                    'reuired'       => '{field} wajib diisi dan tidak boleh kosong',
                    'min_length'    => '{field} anda terlalu pendek,minimal 6 karakter',
                    'max_length'    => '{field} anda terlalu panjang, maksimal 8 karakter',
                    
                ]
            ],
            'cpassword'             => [
                'label'             => 'Confirm Password',
                'rules'             => 'required|matches[password]',
                'errors'            => [
                    'required'      => '{field} wajib diisi dan tidak boleh kosong',
                    'matches'       => '{field} Tidak sama, Mohon periksa kembali {field} anda'
                ]
            ],
            'foto'                  => [
                'rules'             => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors'            => [
                    'uploaded'      => 'Pilih foto terlebih dahulu',
                    'max_size'      => 'Ukuran foto yang diupload terlalu besar',
                    'is_image'      => 'Yang anda pilih bukan gambar/foto',
                    'mime_in'       => 'Yang anda pilih bukan gambar/foto',
                ]
            ]
        ])){
            // jika valid
            $fileFoto = $this->request->getFile('foto');

            $fileFoto->move('gambar');

            $namaFile = $fileFoto->getName();

            $data = [
                'nama_lengkap'      => $this->request->getPost('nama_lengkap'),
                'level'             => $this->request->getPost('level'),
                'email'             => $this->request->getPost('email'),
                'password'          => $this->request->getPost('password'),
                'foto'              => $namaFile,
            ];

            $this->AuthModel->save_register($data);

            session()->setFlashdata('pesan','Registrasi berhasil');
            return redirect()->to('Auth/register');
        }else{
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('auth/register')->withInput('validation', \Config\Services::validation());
        }
    }

    public function login()
    {
        $data = [
            'title'     => 'Form Login',
            'page'  =>  'Selamat Datang Di Aplikasi Kwartir Ranting Binawasa Kota Bekasi',
        ];

        return view('auth/login', $data);
    }

    public function login_admin()
    {
        $data = [
            'title'     => 'Form Login Admin',
        ];

        return view('auth/login_admin', $data);
    }

    public function CekLoginAdmin()
    {
        if($this->validate([
            'email'                 => [
                'label'             => 'Email',
                'rules'             => 'required|valid_email',
                'errors'            => [
                    'required'      => '{field} wajib diisi dan tidak boleh kosong',
                    'valid_email'   => '{field} tidak sesuai, silahkan cek kembali {field} anda'
                ]
            ],
            'password'              => [
                'label'             => 'Password',
                'rules'             => 'required',
                'errors'            => [
                    'required'      => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ]
        ])){
            $email      = $this->request->getPost('email');
            $password   = $this->request->getPost('password');

            $cek = $this->AuthModel->login_admin($email, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('nama_lengkap', $cek['nama_lengkap']);
                session()->set('email', $cek['email']);
                session()->set('password', $cek['password']);
                session()->set('level', $cek['level']);
                session()->set('foto', $cek['foto']);

                // jika login sukses
                session()->setFlashdata('pesan', 'Login berhasil');
                return redirect()->to('home');
            }else{

                // jika login gagal

                session()->setFlashdata('error','email atau password salah');
                return redirect()->to('auth/login_admin');
            }
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('auth/login_admin');
        }
    }

    public function login_user()
    {
        $data = [
            'title'     => 'Form Login User',
        ];

        return view('auth/login_user', $data);
    }

    public function CekLoginUser()
    {
        if($this->validate([
            'email'                 => [
                'label'             => 'Email',
                'rules'             => 'required|valid_email',
                'errors'            => [
                    'required'      => '{field} wajib diisi dan tidak boleh kosong',
                    'valid_email'   => '{field} tidak sesuai, silahkan cek kembali {field} anda'
                ]
            ],
            'password'              => [
                'label'             => 'Password',
                'rules'             => 'required',
                'errors'            => [
                    'required'      => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ]
        ])){
            $email      = $this->request->getPost('email');
            $password   = $this->request->getPost('password');

            $cek = $this->AuthModel->login_user($email, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('nama_lengkap', $cek['nama_lengkap']);
                session()->set('email', $cek['email']);
                session()->set('password', $cek['password']);
                session()->set('level', $cek['level']);
                session()->set('foto', $cek['foto']);

                // jika login sukses
                session()->setFlashdata('pesan', 'Login berhasil');
                return redirect()->to('binawasa');
            }else{

                // jika login gagal

                session()->setFlashdata('error','email atau password salah');
                return redirect()->to('auth/login_user');
            }
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('auth/login_user');
        }
    }

    public function logout()
    {
        sessio()->destroy();
        return redirect()->to('auth/login');
    }

}