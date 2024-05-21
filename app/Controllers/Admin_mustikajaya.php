<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_mustikajaya;
use App\Models\ModelPelatih_mustikajaya;
use App\Models\UserModel;

class Admin_mustikajaya extends BaseController
{
    public function __construct()
    {
        $this->ModelPembina_mustikajaya = new ModelPembina_mustikajaya();
        $this->ModelPelatih_mustikajaya = new ModelPelatih_mustikajaya();
        $this->UserModel = new UserModel();
    }

    // Halaman Admin User Mustika Jaya

    public function pembina_mustika_jaya()
    {
        $data = [
            'title'         => 'Halaman Admin User Mustikajaya',
            'subtitle'      => 'Data Pembina',
            'page'          => 'Pembina Mustika Jaya',
            'menu'          => 'mustikajaya',
            'submenu'       => 'datapembina',
            'mustikajaya'   => $this->ModelPembina_mustikajaya->findAll(),
            'user'          => $this->UserModel->where('role','Admin Mustika Jaya'),
        ];

        return view('Admin_mustikajaya/pembina_mustika_jaya', $data);
    }

    public function tambahData_pembina()
    {
        $data = [
            'title'         => 'Form Input Data Pembina',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'mustikajaya',
            'submenu'       => 'datapembina',
        ];

        return view('Admin_mustikajaya/tambahData_pembina', $data);
    }

    public function insertData_pembina()
    {
    if ($this->validate([
        'nta'       => [
            'label'     => 'Nta',
            'rules'     => 'required|is_unique[pembina_mustikajaya.nta]',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique' => '{field} sudah ada dan tidak boleh sama',
            ]
        ],
        'no_gudep'       => [
            'label'     => 'No Gudep',
            'rules'     => 'required|is_unique[pembina_mustikajaya.no_gudep]',
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
            'rules'             => 'required|is_unique[pembina_mustikajaya.no_telp]',
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

        $this->ModelPembina_mustikajaya->insertData_pembina($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('Admin_mustikajaya/pembina_mustika_jaya'));
    }else{
        // jika valid gagal
        session()->setflashdata('errors', \Config\Services::validation()->getErrors());

        return redirect()->to(base_url('Admin_mustikajaya/tambahData_pembina'))->withInput('validation', \Config\Services::validation());
    }
}

    public function editData_pembina($idpembina_mustikajaya)
    {
        $data = [
            'title'         => 'Form Ubah Data Pembina',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'mustikajaya',
            'submenu'       => 'datapembina',
            'mustikajaya'   => $this->ModelPembina_mustikajaya->detailData_pembina($idpembina_mustikajaya),
        ];

        return view('Admin_mustikajaya/editData_pembina', $data);
    }

    public function ubahData_pembina($idpembina_mustikajaya)
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
                'idpembina_mustikajaya'     => $idpembina_mustikajaya,
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

            $this->ModelPembina_mustikajaya->ubahData_pembina($idpembina_mustikajaya, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('Admin_mustikajaya/pembina_mustika_jaya'));
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin_mustikajaya/editData_pembina/' . $idpembina_mustikajaya))->withInput('validation', \Config\Services::validation());
        }
    }

    public function detailData_pembina($idpembina_mustikajaya)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Mustikajaya',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'mustikajaya',
            'submenu'       => 'datapembina',
            'mustikajaya'    => $this->ModelPembina_mustikajaya->detailData_pembina($idpembina_mustikajaya),
        ];

        return view('/Admin_mustikajaya/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_mustikajaya)
    {
        $namaGambar = $this->ModelPembina_mustikajaya->find($idpembina_mustikajaya);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'mustikajaya'    => $this->ModelPembina_mustikajaya->findAll(),
        ];

        return view('Admin_mustikajaya/excelData_pembina', $data);
    }

    public function deleteData_pembina($idpembina_mustikajaya)
    {
        $mustikajaya = $this->ModelPembina_mustikajaya->find($idpembina_mustikajaya);

        unlink('image/' . $mustikajaya['foto']);
        $data = [
            'idpembina_mustikajaya' => $idpembina_mustikajaya
        ];

        $this->ModelPembina_mustikajaya->deleteData_pembina($idpembina_mustikajaya, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to(base_url('Admin_mustikajaya/pembina_mustika_jaya'));
    }

    // Halaman Admin User Pelatih MustikaJaya

    public function pelatih_mustika_jaya()
    {
        $data = [
            'title'         => 'Halaman Admin User pelatih Admin_mustikajaya',
            'subtitle'      => 'Data Pelatih',
            'page'          => 'Pelatih Mustika Jaya',
            'menu'          => 'mustikajaya',
            'submenu'       => 'datapelatih',
            'mustikajaya'   => $this->ModelPelatih_mustikajaya->findAll(),
        ];

        return view('Admin_mustikajaya/pelatih_mustika_jaya', $data);
    }

    public function tambahData_pelatih()
    {
       $data = [
        'title'         => 'Form Input Data Pelatih',
        'subtitle'      => '',
        'page'          => '',
        'menu'          => 'mustikajaya',
        'submenu'       => 'datapelatih',
       ];

       return view('Admin_mustikajaya/tambahData_pelatih', $data);
    }

    public function insertData_pelatih()
    {
    if ($this->validate([
        'nta'       => [
            'label'     => 'Nta',
            'rules'     => 'required|is_unique[pelatih_mustikajaya.nta]',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique' => '{field} sudah ada dan tidak boleh sama',
            ]
        ],
        'no_gudep'       => [
            'label'     => 'No Gudep',
            'rules'     => 'required|is_unique[pelatih_mustikajaya.no_gudep]',
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
            'rules'             => 'required|is_unique[pelatih_mustikajaya.no_telp]',
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

        $this->ModelPelatih_mustikajaya->insertData_pelatih($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('Admin_mustikajaya/pelatih_mustika_jaya'));
    }else{
        // jika valid gagal
        session()->setflashdata('errors', \Config\Services::validation()->getErrors());

        return redirect()->to(base_url('Admin_mustikajaya/tambahData_pelatih'))->withInput('validation', \Config\Services::validation());
    }
}

    public function editData_pelatih($idpelatih_mustikajaya)
    {
        $data = [
            'title'         => 'Form Ubah Data Pelatih',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'mustikajaya',
            'submenu'       => 'datapelatih',
            'mustikajaya'   => $this->ModelPelatih_mustikajaya->detailData_pelatih($idpelatih_mustikajaya),
        ];

        return view('Admin_mustikajaya/editData_pelatih', $data);
    }

    public function ubahData_pelatih($idpelatih_mustikajaya)
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
                'idpelatih_mustikajaya'     => $idpelatih_mustikajaya,
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

            $this->ModelPelatih_mustikajaya->ubahData_pelatih($idpelatih_mustikajaya, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('Admin_mustikajaya/pelatih_mustika_jaya'));
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin_mustikajaya/editData_pelatih/' . $idpelatih_mustikajaya))->withInput('validation', \Config\Services::validation());
        }
    }

    public function detailData_pelatih($idpelatih_mustikajaya)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Mustikajaya',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'mustikajaya',
            'submenu'       => 'datapelatih',
            'mustikajaya'    => $this->ModelPelatih_mustikajaya->detailData_pelatih($idpelatih_mustikajaya),
        ];

        return view('/Admin_mustikajaya/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_mustikajaya)
    {
        $namaGambar = $this->ModelPelatih_mustikajaya->find($idpelatih_mustikajaya);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'mustikajaya'    => $this->ModelPelatih_mustikajaya->findAll(),
        ];

        return view('Admin_mustikajaya/excelData_pelatih', $data);
    }


    public function deleteData_pelatih($idpelatih_mustikajaya)
    {
        $data = [
            'idpelatih_mustikajaya' => $idpelatih_mustikajaya
        ];

        $this->ModelPelatih_mustikajaya->deleteData_pelatih($idpelatih_mustikajaya, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to(base_url('Admin_mustikajaya/pelatih_mustika_jaya'));
    }
}