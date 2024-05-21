<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_medansat;
use App\Models\ModelPelatih_medansat;
use App\Models\UserModel;

class Admin_medansat extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->ModelPelatih_medansat = new ModelPelatih_medansat();
        $this->ModelPembina_medansat = new ModelPembina_medansat();
    }

    public function pembina_medan_satria()
    {
        $data = [
            'title'         => 'Halaman Admin User Medan Satria',
            'subtitle'      => 'Data Pembina',
            'page'          => 'Pembina Medan Satria',
            'menu'          => 'medansat',
            'submenu'       => 'datapembina',
            'medansat'      => $this->ModelPembina_medansat->findAll(),
            'user'          => $this->UserModel->where('level','Admin Medan Satria'),
        ];

        return view('Admin_medansat/pembina_medan_satria', $data);
    }

    public function tambahData_pembina()
    {
        $data = [
            'title'         => 'Form Input Data Pembina',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'medansat',
            'submenu'       => 'datapembina',
        ];

        return view('Admin_medansat/tambahData_pembina', $data);
    }

    public function insertData_pembina()
    {
    if ($this->validate([
        'nta'       => [
            'label'     => 'Nta',
            'rules'     => 'required|is_unique[pembina_medansatria.nta]',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique' => '{field} sudah ada dan tidak boleh sama',
            ]
        ],
        'no_gudep'       => [
            'label'     => 'No Gudep',
            'rules'     => 'required|is_unique[pembina_medansatria.no_gudep]',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique' => '{field} sudah ada dan tidak boleh sama',
            ]
        ],
        'nama'      => [
            'label'     => 'Nama Lengkap',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong'
            ]
        ],
        'jenkel'        => [
            'label'     => 'Jenis Kelamin',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'tempat_lhr'        => [
            'label'     => 'Tempat Tgl Lahir',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'tgl_lhr'        => [
            'label'     => 'Tempat Tgl Lahir',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'email'                 => [
            'label'             => 'Email',
            'rules'             => 'required|valid_email',
            'errors'            => [
                'required'      => '{field} wajib diisi dan tidak boleh kosong',
                'valid_email'   => '{field} anda sudah ada, silahkan gunakan {field} yang lain'
            ]
        ],
        'no_telp'               => [
            'label'             => 'No Telp',
            'rules'             => 'required|is_unique[pembina_medansatria.no_telp]',
            'errors'            => [
                'required'      => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique'     => '{field} anda sudah ada, silahkan gunakan {field} yang lain'
            ]
        ],
        'pangkalan'     => [
            'label'     => 'Pangkalan',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'kualifikasi'       => [
            'label'         => 'Kualifikasi',
            'rules'         => 'required',
            'errors'        => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'golongan'     => [
            'label'     => 'Golongan',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
       
        'thn_lulus_kmd'     => [
            'label'         => 'Tahun Lulus KmD',
            'rules'         => 'required',
            'errors'        => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'thn_lulus_kml'     => [
            'label'         => 'Tahun Lulus KML',
            'rules'         => 'required',
            'errors'        => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'alamat'        => [
            'label'     => 'Alamat',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'ijazah'            => [
            'rules'         => 'uploaded[ijazah]|max_size[ijazah,1024]|is_image[ijazah]|mime_in[ijazah,image/jpg,image/jpeg,image/png]',
            'errors'    => [
                'uploaded'  => 'Pilih gambar gambar terlebih dahulu',
                'max_size'  => 'Ukuran gambar terlalu besar',
                'is_image'  => 'yang anda pilih bukan gambar',
                'mime_in'   => 'Yang andah pilih bukan gambar',
            ]
        ],
        'foto'          => [
            'rules'     => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
            'errors'    => [
                'uploaded'  => 'Pilih gambar foto terlebih dahulu',
                'max_size'  => 'Ukuran gambar terlalu besar',
                'is_image'  => 'yang anda pilih bukan gambar',
                'mime_in'   => 'Yang andah pilih bukan gambar',
            ]
        ],
        
    ])){
        // jika valid sukses
        
        // ambil gambar ijazah
        $fileGambar = $this->request->getFile('ijazah');

        // pindahkan ke folder ijazah
        $fileGambar->move('ijazah');

        // ambil nama gambar ijazahnya 
        $namaGambar = $fileGambar->getName();

        // ambil gambar foto
        $fileFoto = $this->request->getFile('foto');
       
        // pindahkan file gambar ke folder image
        $fileFoto->move('image');

        // ambil nama file foto
        $namaFoto = $fileFoto->getName();

        $slug = url_title($this->request->getPost('nama'), '-', true);
        $data = [
            'nta'               => $this->request->getPost('nta'),
            'no_gudep'          => $this->request->getPost('no_gudep'),
            'nama'              => $this->request->getPost('nama'),
            'slug'              => $slug,   
            'jenkel'            => $this->request->getPost('jenkel'),
            'tempat_lhr'        => $this->request->getPost('tempat_lhr'),
            'tgl_lhr'           => $this->request->getPost('tgl_lhr'),
            'email'             => $this->request->getPost('email'),
            'no_telp'           => $this->request->getPost('no_telp'),
            'pangkalan'         => $this->request->getPost('pangkalan'),
            'kualifikasi'       => $this->request->getPost('kualifikasi'),
            'golongan'          => $this->request->getPost('golongan'),
            'thn_lulus_kmd'     => $this->request->getPost('thn_lulus_kmd'),
            'thn_lulus_kml'     => $this->request->getPost('thn_lulus_kml'),
            'alamat'            => $this->request->getPost('alamat'),
            'ijazah'            => $namaGambar,
            'foto'              => $namaFoto,
        ];

        $this->ModelPembina_medansat->insertData_pembina($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('Admin_medansat/pembina_medan_satria'));
    }else{
        // jika valid gagal
        session()->setflashdata('errors', \Config\Services::validation()->getErrors());

        return redirect()->to(base_url('Admin_medansat/tambahData_pembina'))->withInput('validation', \Config\Services::validation());
    }
}

    public function editData_pembina($idpembina_medansatria)
    {
        $data = [
            'title'         => 'Form Ubah Data Pembina',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'medansat',
            'submenu'       => 'datapembina',
            'medansat'      => $this->ModelPembina_medansat->detailData_pembina($idpembina_medansatria),
        ];

        return view('Admin_medansat/editData_pembina', $data);
    }

    public function ubahData_pembina($idpembina_medansatria)
    {
        if ($this->validate([
            'nta'       => [
                'label'     => 'Nta',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'no_gudep'       => [
                'label'     => 'No Gudep',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'nama'      => [
                'label'     => 'Nama Lengkap',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
            'jenkel'        => [
                'label'     => 'Jenis Kelamin',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'tempat_lhr'        => [
                'label'     => 'Tempat Tgl Lahir',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'tgl_lhr'        => [
                'label'     => 'Tempat Tgl Lahir',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'email'                 => [
                'label'             => 'Email',
                'rules'             => 'required|valid_email',
                'errors'            => [
                    'required'      => '{field} wajib diisi dan tidak boleh kosong',
                    'valid_email'   => '{field} anda sudah ada, silahkan gunakan {field} yang lain'
                ]
            ],
            'no_telp'               => [
                'label'             => 'No Telp',
                'rules'             => 'required',
                'errors'            => [
                    'required'      => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'pangkalan'     => [
                'label'     => 'Pangkalan',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'kualifikasi'       => [
                'label'         => 'Kualifikasi',
                'rules'         => 'required',
                'errors'        => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'golongan'     => [
                'label'     => 'Golongan',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
           
            'thn_lulus_kmd'     => [
                'label'         => 'Tahun Lulus KMD',
                'rules'         => 'required',
                'errors'        => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'thn_lulus_kml'     => [
                'label'         => 'Tahun Lulus KML',
                'rules'         => 'required',
                'errors'        => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'alamat'        => [
                'label'     => 'Alamat',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
        ])){
            
            $slug = url_title($this->request->getPost('nama'), '-', true);
            $data = [
                'idpembina_medansatria'     => $idpembina_medansatria,
                'nta'                       => $this->request->getPost('nta'),
                'no_gudep'                  => $this->request->getPost('no_gudep'),
                'nama'                      => $this->request->getPost('nama'),
                'slug'                      => $slug,
                'jenkel'                    => $this->request->getPost('jenkel'),
                'tempat_lhr'                => $this->request->getPost('tempat_lhr'),
                'tgl_lhr'                   => $this->request->getPost('tgl_lhr'),
                'email'                     => $this->request->getPost('email'),
                'no_telp'                   => $this->request->getPost('no_telp'),
                'pangkalan'                 => $this->request->getPost('pangkalan'),
                'kualifikasi'               => $this->request->getPost('kualifikasi'),
                'golongan'                  => $this->request->getPost('golongan'),
                'thn_lulus_kmd'             => $this->request->getPost('thn_lulus_kmd'),
                'thn_lulus_kml'             => $this->request->getPost('thn_lulus_kml'),
                'alamat'                    => $this->request->getPost('alamat'),
            ];

            $this->ModelPembina_medansat->ubahData_pembina($idpembina_medansatria, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('Admin_medansat/pembina_medan_satria'));
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin_medansat/editData_pembina/' . $idpembina_medansatria))->withInput('validation', \Config\Services::validation());
        }
    }

    public function detailData_pembina($idpembina_medansatria)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Medan Satria',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'medansat',
            'submenu'       => 'datapembina',
            'medansat'    => $this->ModelPembina_medansat->detailData_pembina($idpembina_medansatria),
        ];

        return view('/Admin_medansat/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_medansatria)
    {
        $namaGambar = $this->ModelPembina_medansat->find($idpembina_medansatria);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'medansat'    => $this->ModelPembina_medansat->findAll(),
        ];

        return view('Admin_medansat/excelData_pembina', $data);
    }

    public function deleteData_pembina($idpembina_medansatria)
    {
        $data = [
            'idpembina_medansatria'    => $idpembina_medansatria,
        ];

        $this->ModelPembina_medansat->deleteData_pembina($idpembina_medansatria, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to(base_url('Admin_medansat/pembina_medan_satria'));
    }

    // Halaman Pelatih Admin User Medan Satria

    public function pelatih_medan_satria()
    {
        $data = [
            'title'         => 'Halaman Admin User Medan Satria',
            'subtitle'      => 'Data Pelatih',
            'page'          => 'Pelatih Medan Satria',
            'menu'          => 'medansat',
            'submenu'       => 'datapelatih',
            'medansat'      => $this->ModelPelatih_medansat->findAll(),
        ];

        return view('Admin_medansat/pelatih_medan_satria', $data);
    }

    public function tambahData_pelatih()
    {
        $data = [
            'title'         => 'Form Input Data Pelatih',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'medansat',
            'submenu'      => 'datapelatih',
        ];

        return view('/Admin_medansat/tambahData_pelatih', $data);
    }

    public function insertData_pelatih()
    {
    if ($this->validate([
        'nta'       => [
            'label'     => 'Nta',
            'rules'     => 'required|is_unique[pelatih_medansatria.nta]',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique' => '{field} sudah ada dan tidak boleh sama',
            ]
        ],
        'no_gudep'       => [
            'label'     => 'No Gudep',
            'rules'     => 'required|is_unique[pelatih_medansatria.no_gudep]',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique' => '{field} sudah ada dan tidak boleh sama',
            ]
        ],
        'nama'      => [
            'label'     => 'Nama Lengkap',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong'
            ]
        ],
        'jenkel'        => [
            'label'     => 'Jenis Kelamin',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'tempat_lhr'        => [
            'label'     => 'Tempat Tgl Lahir',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'tgl_lhr'        => [
            'label'     => 'Tempat Tgl Lahir',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'email'                 => [
            'label'             => 'Email',
            'rules'             => 'required|valid_email',
            'errors'            => [
                'required'      => '{field} wajib diisi dan tidak boleh kosong',
                'valid_email'   => '{field} anda sudah ada, silahkan gunakan {field} yang lain'
            ]
        ],
        'no_telp'               => [
            'label'             => 'No Telp',
            'rules'             => 'required|is_unique[pelatih_medansatria.no_telp]',
            'errors'            => [
                'required'      => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique'     => '{field} anda sudah ada, silahkan gunakan {field} yang lain'
            ]
        ],
        'pangkalan'     => [
            'label'     => 'Pangkalan',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'kualifikasi'       => [
            'label'         => 'Kualifikasi',
            'rules'         => 'required',
            'errors'        => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'golongan'     => [
            'label'     => 'Golongan',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
       
        'thn_lulus_kpd'     => [
            'label'         => 'Tahun Lulus KPD',
            'rules'         => 'required',
            'errors'        => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'thn_lulus_kpl'     => [
            'label'         => 'Tahun Lulus KPL',
            'rules'         => 'required',
            'errors'        => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'alamat'        => [
            'label'     => 'Alamat',
            'rules'     => 'required',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
            ]
        ],
        'ijazah'            => [
            'rules'         => 'uploaded[ijazah]|max_size[ijazah,1024]|is_image[ijazah]|mime_in[ijazah,image/jpg,image/jpeg,image/png]',
            'errors'    => [
                'uploaded'  => 'Pilih gambar gambar terlebih dahulu',
                'max_size'  => 'Ukuran gambar terlalu besar',
                'is_image'  => 'yang anda pilih bukan gambar',
                'mime_in'   => 'Yang andah pilih bukan gambar',
            ]
        ],
        'foto'          => [
            'rules'     => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
            'errors'    => [
                'uploaded'  => 'Pilih gambar foto terlebih dahulu',
                'max_size'  => 'Ukuran gambar terlalu besar',
                'is_image'  => 'yang anda pilih bukan gambar',
                'mime_in'   => 'Yang andah pilih bukan gambar',
            ]
        ],
        
    ])){
        // jika valid sukses
        
        // ambil gambar ijazah
        $fileGambar = $this->request->getFile('ijazah');

        // pindahkan ke folder ijazah
        $fileGambar->move('ijazah');

        // ambil nama gambar ijazahnya 
        $namaGambar = $fileGambar->getName();

        // ambil gambar foto
        $fileFoto = $this->request->getFile('foto');
       
        // pindahkan file gambar ke folder image
        $fileFoto->move('image');

        // ambil nama file foto
        $namaFoto = $fileFoto->getName();

        $slug = url_title($this->request->getPost('nama'), '-', true);
        $data = [
            'nta'               => $this->request->getPost('nta'),
            'no_gudep'          => $this->request->getPost('no_gudep'),
            'nama'              => $this->request->getPost('nama'),
            'slug'              => $slug,
            'jenkel'            => $this->request->getPost('jenkel'),
            'tempat_lhr'        => $this->request->getPost('tempat_lhr'),
            'tgl_lhr'           => $this->request->getPost('tgl_lhr'),
            'email'             => $this->request->getPost('email'),
            'no_telp'           => $this->request->getPost('no_telp'),
            'pangkalan'         => $this->request->getPost('pangkalan'),
            'kualifikasi'       => $this->request->getPost('kualifikasi'),
            'golongan'          => $this->request->getPost('golongan'),
            'thn_lulus_kpd'     => $this->request->getPost('thn_lulus_kpd'),
            'thn_lulus_kpl'     => $this->request->getPost('thn_lulus_kpl'),
            'alamat'            => $this->request->getPost('alamat'),
            'ijazah'            => $namaGambar,
            'foto'              => $namaFoto,
        ];

        $this->ModelPelatih_medansat->insertData_pelatih($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('Admin_medansat/pelatih_medan_satria'));
    }else{
        // jika valid gagal
        session()->setflashdata('errors', \Config\Services::validation()->getErrors());

        return redirect()->to(base_url('Admin_medansat/tambahData_pelatih'))->withInput('validation', \Config\Services::validation());
    }
}

    public function editData_pelatih($idpelatih_medansatria)
    {
        $data = [
            'title'         => 'form Input Data Pelatih',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'medansat',
            'submenu'       => 'datapelatih',
            'medansat'      => $this->ModelPelatih_medansat->detailData_pelatih($idpelatih_medansatria)
        ];

        return view('Admin_medansat/editData_pelatih', $data);
    }

    public function ubahData_pelatih($idpelatih_medansatria)
    {
        if ($this->validate([
            'nta'       => [
                'label'     => 'Nta',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'no_gudep'       => [
                'label'     => 'No Gudep',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'nama'      => [
                'label'     => 'Nama Lengkap',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong'
                ]
            ],
            'jenkel'        => [
                'label'     => 'Jenis Kelamin',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'tempat_lhr'        => [
                'label'     => 'Tempat Tgl Lahir',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'tgl_lhr'        => [
                'label'     => 'Tempat Tgl Lahir',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'email'                 => [
                'label'             => 'Email',
                'rules'             => 'required|valid_email',
                'errors'            => [
                    'required'      => '{field} wajib diisi dan tidak boleh kosong',
                    'valid_email'   => '{field} anda sudah ada, silahkan gunakan {field} yang lain'
                ]
            ],
            'no_telp'               => [
                'label'             => 'No Telp',
                'rules'             => 'required',
                'errors'            => [
                    'required'      => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'pangkalan'     => [
                'label'     => 'Pangkalan',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'kualifikasi'       => [
                'label'         => 'Kualifikasi',
                'rules'         => 'required',
                'errors'        => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'golongan'     => [
                'label'     => 'Golongan',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
           
            'thn_lulus_kpd'     => [
                'label'         => 'Tahun Lulus KPD',
                'rules'         => 'required',
                'errors'        => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'thn_lulus_kpl'     => [
                'label'         => 'Tahun Lulus KpL',
                'rules'         => 'required',
                'errors'        => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'alamat'        => [
                'label'     => 'Alamat',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
        ])){
            
            $slug = url_title($this->request->getPost('nama'), '-', true);
            $data = [
                'idpelatih_medansatria'     => $idpelatih_medansatria,
                'nta'                       => $this->request->getPost('nta'),
                'no_gudep'                  => $this->request->getPost('no_gudep'),
                'nama'                      => $this->request->getPost('nama'),
                'slug'                      => $slug,
                'jenkel'                    => $this->request->getPost('jenkel'),
                'tempat_lhr'                => $this->request->getPost('tempat_lhr'),
                'tgl_lhr'                   => $this->request->getPost('tgl_lhr'),
                'email'                     => $this->request->getPost('email'),
                'no_telp'                   => $this->request->getPost('no_telp'),
                'pangkalan'                 => $this->request->getPost('pangkalan'),
                'kualifikasi'               => $this->request->getPost('kualifikasi'),
                'golongan'                  => $this->request->getPost('golongan'),
                'thn_lulus_kpd'             => $this->request->getPost('thn_lulus_kpd'),
                'thn_lulus_kpl'             => $this->request->getPost('thn_lulus_kpl'),
                'alamat'                    => $this->request->getPost('alamat'),
            ];

            $this->ModelPelatih_medansat->ubahData_pelatih($idpelatih_medansatria, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('Admin_medansat/pelatih_medan_satria'));
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin_medansat/editData_pelatih/' . $idpelatih_medansatria))->withInput('validation', \Config\Services::validation());
        }
    }

    public function detailData_pelatih($idpelatih_medansatria)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Medan Satria',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'medansat',
            'submenu'       => 'datapelatih',
            'medansat'    => $this->ModelPelatih_medansat->detailData_pelatih($idpelatih_medansatria),
        ];

        return view('/Admin_medansat/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_medansatria)
    {
        $namaGambar = $this->ModelPelatih_medansat->find($idpelatih_medansatria);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'medansat'    => $this->ModelPelatih_medansat->findAll(),
        ];

        return view('Admin_medansat/excelData_pelatih', $data);
    }

    public function deleteData_pelatih($idpelatih_medansatria)
    {
        $medansat = $this->ModelPelatih_medansat->find($idpelatih_medansatria);

        unlink('image/' . $medansat['foto']);

        $data = [
            'idpelatih_medansatria' => $idpelatih_medansatria,
        ];

        $this->ModelPelatih_medansat->deleteData_pelatih($idpelatih_medansatria, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to(base_url('Admin_medansat/pelatih_medan_satria'));
    }
}