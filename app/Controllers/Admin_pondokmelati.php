<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Response;
use App\Models\ModelPembina_pondokmelati;
use App\Models\ModelPelatih_pondokmelati;

class Admin_pondokmelati extends BaseController
{
    protected $ModelPembina_pondokmelati;
    protected $ModelPelatih_pondokmelati;
    public function __construct()
    {
        $this->ModelPembina_pondokmelati = new ModelPembina_pondokmelati();
        $this->ModelPelatih_pondokmelati = new ModelPelatih_pondokmelati();
    }

    public function pembina_pondok_melati()
    {
        $data = [
            'title'         => 'Halaman Admin User Pembina Pondok Melati',
            'subtitle'      => 'Data Pembina', 
            'page'          => 'Pembina Pondok Melati',
            'menu'          => 'pondokmelati',
            'submenu'       => 'datapembina',
            'pondokmelati'  => $this->ModelPembina_pondokmelati->findAll(),
        ];

        return view('admin_pondokmelati/pembina_pondok_melati', $data);
    }

    public function tambahData_pembina()
    {
        $data = [
            'title'         => 'Form Input Data Pembina',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokmelati',
            'submenu'       => 'datapembina',
        ];

        return view('admin_pondokmelati/tambahData_pembina', $data);
    }

    public function insertData_pembina()
    {
    if ($this->validate([
        'nta'       => [
            'label'     => 'Nta',
            'rules'     => 'required|is_unique[pembina_pondokmelati.nta]',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique' => '{field} sudah ada dan tidak boleh sama',
            ]
        ],
        'no_gudep'       => [
            'label'     => 'No Gudep',
            'rules'     => 'required|is_unique[pembina_pondokmelati.no_gudep]',
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
            'rules'             => 'required|is_unique[pembina_pondokmelati.no_telp]',
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

        $data = [
            'nta'               => $this->request->getPost('nta'),
            'no_gudep'          => $this->request->getPost('no_gudep'),
            'nama'              => $this->request->getPost('nama'),
            'jenkel'            => $this->request->getPost('jenkel'),
            'tempat_lhr'       => $this->request->getPost('tempat_lhr'),
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

        $this->ModelPembina_pondokmelati->insertData_pembina($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('Admin_pondokmelati/pembina_pondok_melati'));
    }else{
        // jika valid gagal
        session()->setflashdata('errors', \Config\Services::validation()->getErrors());

        return redirect()->to(base_url('Admin_pondokmelati/tambahdata_pembina'))->withInput('validation', \Config\Services::validation());
    }
}

    public function editData_pembina($idpembina_pondokmelati)
    {
        $data = [
            'title'         => 'Form Ubah Data Pembina',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokmelati',
            'submenu'       => 'datapembina',
            'pondokmelati'  => $this->ModelPembina_pondokmelati->detailData_pembina($idpembina_pondokmelati),
        ];

        return view('Admin_pondokmelati/editData_pembina', $data);
    }

    public function ubahData_pembina($idpembina_pondokmelati)
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
            
            $data = [
                'idpembina_pondokmelati'    => $idpembina_pondokmelati,
                'nta'                       => $this->request->getPost('nta'),
                'no_gudep'                  => $this->request->getPost('no_gudep'),
                'nama'                      => $this->request->getPost('nama'),
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

            $this->ModelPembina_pondokmelati->ubahData_pembina($idpembina_pondokmelati, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('Admin_pondokmelati/pembina_pondok_melati'));
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin_pondokmelati/editData_pembina/' . $idpembina_pondokmelati))->withInput('validation', \Config\Services::validation());
        }
    }

    public function detailData_pembina($idpembina_pondokmelati)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Pondok Melati',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokmelati',
            'submenu'       => 'datapembina',
            'pondokmelati'    => $this->ModelPembina_pondokmelati->detailData_pembina($idpembina_pondokmelati),
        ];

        return view('/Admin_pondokmelati/detailData_pembina', $data);
    }

    public function download_pembina($idpembina_pondokmelati)
    {
        $namaGambar = $this->ModelPembina_pondokmelati->find($idpembina_pondokmelati);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'pondokmelati'    => $this->ModelPembina_pondokmelati->findAll(),
        ];

        return view('Admin_pondokmelati/excelData_pembina', $data);
    }

    public function deleteData_pembina($idpembina_pondokmelati)
    {
        $pondokmelati = $this->ModelPembina_pondokmelati->find($idpembina_pondokmelati);

        unlink('image/' . $pondokmelati['foto']);
        $data = [
            'idpembina_pondokmelati' => $idpembina_pondokmelati,
        ];

        $this->ModelPembina_pondokmelati->deleteData_pelatih($idpembina_pondokmelati, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to(base_url('Admin_pondokmelati/pembina_pondok_melati'));
    }

    // Halaman Admin User Pelatih Pondok Melati 

    public function pelatih_pondok_melati()
    {
        $data = [
            'title'         => 'Halaman Admin User Pelatih Pondok Melati',
            'subtitle'      => 'Data Pelatih', 
            'page'          => 'Pelatih Pondok Melati',
            'menu'          => 'pondokmelati',
            'submenu'       => 'datapelatih',
            'pondokmelati'  => $this->ModelPelatih_pondokmelati->findAll(),
        ];

        return view('admin_pondokmelati/pelatih_pondok_melati', $data);
    }

    public function tambahData_pelatih()
    {
        $data = [
            'title'         => 'Form Input Data Pelatih',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokmelati',
            'submenu'       => 'datapelatih',
        ];

        return view('admin_pondokmelati/tambahData_pelatih', $data);
    }

    public function insertData_pelatih()
    {
        if ($this->validate([
            'nta'       => [
                'label'     => 'Nta',
                'rules'     => 'required|is_unique[pelatih_pondokmelati.nta]',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                    'is_unique' => '{field} sudah ada dan tidak boleh sama',
                ]
            ],
            'no_gudep'       => [
                'label'     => 'No Gudep',
                'rules'     => 'required|is_unique[pelatih_pondokmelati.no_gudep]',
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
                'rules'             => 'required|is_unique[pembina_pondokmelati.no_telp]',
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
           
            'thn_lulus_kpl'     => [
                'label'         => 'Tahun Lulus KPL',
                'rules'         => 'required',
                'errors'        => [
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
    
            $data = [
                'nta'               => $this->request->getPost('nta'),
                'no_gudep'          => $this->request->getPost('no_gudep'),
                'nama'              => $this->request->getPost('nama'),
                'jenkel'            => $this->request->getPost('jenkel'),
                'tempat_lhr'       => $this->request->getPost('tempat_lhr'),
                'tgl_lhr'           => $this->request->getPost('tgl_lhr'),
                'email'             => $this->request->getPost('email'),
                'no_telp'           => $this->request->getPost('no_telp'),
                'pangkalan'         => $this->request->getPost('pangkalan'),
                'kualifikasi'       => $this->request->getPost('kualifikasi'),
                'golongan'          => $this->request->getPost('golongan'),
                'thn_lulus_kpl'     => $this->request->getPost('thn_lulus_kpl'),
                'thn_lulus_kpd'     => $this->request->getPost('thn_lulus_kpd'),
                'alamat'            => $this->request->getPost('alamat'),
                'ijazah'            => $namaGambar,
                'foto'              => $namaFoto,
            ];
    
            $this->ModelPelatih_pondokmelati->insertData_pelatih($data);
    
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('Admin_pondokmelati/pelatih_pondok_melati'));
        }else{
            // jika valid gagal
            session()->setflashdata('errors', \Config\Services::validation()->getErrors());
    
            return redirect()->to(base_url('Admin_pondokmelati/tambahData_pelatih'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function editData_pelatih($idpelatih_pondokmelati)
    {
        $data = [
            'title'         => 'Form Ubah Data Pelatih',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokmelati',
            'submenu'       => 'datapelatih',
            'pondokmelati'  => $this->ModelPelatih_pondokmelati->detailData_pelatih($idpelatih_pondokmelati),
        ];

        return view('Admin_pondokmelati/editData_pelatih', $data);
    }

    public function ubahData_pelatih($idpelatih_pondokmelati)
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
           
            'thn_lulus_kpl'     => [
                'label'         => 'Tahun Lulus KPL',
                'rules'         => 'required',
                'errors'        => [
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
            'alamat'        => [
                'label'     => 'Alamat',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
        ])){
            
            $data = [
                'idpelatih_pondokmelati'    => $idpelatih_pondokmelati,
                'nta'                       => $this->request->getPost('nta'),
                'no_gudep'                  => $this->request->getPost('no_gudep'),
                'nama'                      => $this->request->getPost('nama'),
                'jenkel'                    => $this->request->getPost('jenkel'),
                'tempat_lhr'                => $this->request->getPost('tempat_lhr'),
                'tgl_lhr'                   => $this->request->getPost('tgl_lhr'),
                'email'                     => $this->request->getPost('email'),
                'no_telp'                   => $this->request->getPost('no_telp'),
                'pangkalan'                 => $this->request->getPost('pangkalan'),
                'kualifikasi'               => $this->request->getPost('kualifikasi'),
                'golongan'                  => $this->request->getPost('golongan'),
                'thn_lulus_kpl'             => $this->request->getPost('thn_lulus_kpl'),
                'thn_lulus_kpd'             => $this->request->getPost('thn_lulus_kpd'),
                'alamat'                    => $this->request->getPost('alamat'),
            ];

            $this->ModelPelatih_pondokmelati->ubahData_pelatih($idpelatih_pondokmelati, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('Admin_pondokmelati/pelatih_pondok_melati'));
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin_pondokmelati/editData_pelatih/' . $idpelatih_pondokmelati))->withInput('validation', \Config\Services::validation());
        }
    }

    public function detailData_pelatih($idpelatih_pondokmelati)
    {
        $data = [
            'title'             => 'Halaman Detail Pelatih Pondok Melati',
            'subtitle'          => '',
            'page'              => '',
            'menu'              => 'pondokmelatih',
            'submenu'           => 'datapelatih',
            'pondokmelatih'     => $this->ModelPelatih_pondokmelati->detailData_pelatih($idpelatih_pondokmelati),
        ];

        return view('/Admin_pondokmelati/detailData_pelatih', $data);
    }

    public function download_pelatih($idpelatih_pondokmelati)
    {
        $namaGambar = $this->ModelPelatih_pondokmelati->find($idpelatih_pondokmelati);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'pondokmelati'    => $this->ModelPelatih_pondokmelati->findAll(),
        ];

        return view('Admin_pondokmelati/excelData_pelatih', $data);
    }

    public function deleteData_pelatih($idpelatih_pondokmelati)
    {
        $pondokmelati = $this->ModelPelatih_pondokmelati->find($idpelatih_pondokmelati);

        unlink('image/' . $pondokmelati['foto']);
        $data = [
            'idpelatih_pondokmelati' => $idpelatih_pondokmelati,
        ];

        $this->ModelPelatih_pondokmelati->deleteData_pelatih($idpelatih_pondokmelati, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to(base_url('Admin_pondokmelati/pelatih_pondok_melati'));
    }
    
}