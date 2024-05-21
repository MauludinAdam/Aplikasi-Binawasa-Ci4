<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_jatisampurna;
use App\Models\ModelPelatih_jatisampurna;

class Admin_jatisampurna extends BaseController
{
    protected $ModelPembina_jatisampurna;
    protected $ModelPelatih_jatisampurna;
    public function __construct()
    {
        $this->ModelPembina_jatisampurna = new ModelPembina_jatisampurna();
        $this->ModelPelatih_jatisampurna = new ModelPelatih_jatisampurna();
    }
    public function pembina_jati_sampurna()
    {
        $data = [
            'title'         => 'Halaman Admin User Pembina Jatisampurna',
            'subtitle'      => 'Data Pembina',
            'page'          => 'Pembina Jatisampurna',
            'menu'          => 'jatisampurna',
            'submenu'       => 'datapembina',
            'jatisampurna'  => $this->ModelPembina_jatisampurna->findAll()
        ];

        return view('admin_jatisampurna/pembina_jati_sampurna', $data);
    }

    public function tambahData_pembina()
    {
        $data = [
            'title'     => 'Form Input Data Pembina',
            'subtitle'  => '',
            'page'      => '',
            'menu'      => 'jatisampurna',
            'submenu'   => 'datapembina',
        ];

        return view('admin_jatisampurna/tambahData_pembina', $data);
    }

    public function insertData_pembina()
    {
    if ($this->validate([
        'nta'       => [
            'label'     => 'Nta',
            'rules'     => 'required|is_unique[pembina_jatisampurna.nta]',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique' => '{field} sudah ada dan tidak boleh sama',
            ]
        ],
        'no_gudep'       => [
            'label'     => 'No Gudep',
            'rules'     => 'required|is_unique[pembina_jatisampurna.no_gudep]',
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
            'rules'             => 'required|is_unique[pembina_jatisampurna.no_telp]',
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

        $this->ModelPembina_jatisampurna->insertData_pembina($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('Admin_jatisampurna/pembina_jati_sampurna'));
    }else{
        // jika valid gagal
        session()->setflashdata('errors', \Config\Services::validation()->getErrors());

        return redirect()->to(base_url('Admin_jatisampurna/tambahData_pembina'))->withInput('validation', \Config\Services::validation());
    }
}

    public function editData_pembina($idpembina_jatisampurna)
    {
        $data = [
            'title'         => 'Form Ubah Data Pembina',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'jatisampurna',
            'submenu'       => 'datapembina',
            'jatisampurna'  => $this->ModelPembina_jatisampurna->detailData_pembina($idpembina_jatisampurna),
        ];

        return view('admin_jatisampurna/editData_pembina', $data); 
    }

    public function ubahData_pembina($idpembina_jatisampurna)
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
                'idpembina_jatisampurna'    => $idpembina_jatisampurna,
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

            $this->ModelPembina_jatisampurna->ubahData_pembina($idpembina_jatisampurna, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('Admin_jatisampurna/pembina_jati_sampurna'));
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin_jatisampurna/editData_pembina/' . $idpembina_jatisampurna))->withInput('validation', \Config\Services::validation());
        }
    }

    public function detailData_pembina($idpembina_jatisampurna)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Jatisampurna',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'jatisampurna',
            'submenu'       => 'datapembina',
            'jatisampurna'  => $this->ModelPembina_jatisampurna->detailData_pembina($idpembina_jatisampurna),
        ];

        return view('/Admin_jatisampurna/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_jatisampurna)
    {
        $namaGambar = $this->ModelPembina_jatisampurna->find($idpembina_jatisampurna);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'jatisampurna'    => $this->ModelPembina_jatisampurna->findAll(),
        ];

        return view('Admin_jatisampurna/excelData_pembina', $data);
    }

    public function deleteData_pembina($idpembina_jatisampurna)
    {
        $jatisampurna = $this->ModelPembina_jatisampurna->find($idpembina_jatisampurna);

        unlink('image/' . $jatisampurna['foto']);

        $data = [
            'idpembina_jatisampurna' => $idpembina_jatisampurna,
        ];

        $this->ModelPembina_jatisampurna->deleteData_pembina($idpembina_jatisampurna, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to(base_url('Admin_jatisampurna/pembina_jati_sampurna'));
    }

    public function pelatih_jati_sampurna()
    {
        $data = [
            'title'         => 'Halaman Admin User Pelatih Jatisampurna',
            'subtitle'      => 'Data Pelatih',
            'page'          => 'Pelatih Jatisampurna',
            'menu'          => 'jatisampurna',
            'submenu'       => 'datapelatih',
            'jatisampurna'  => $this->ModelPelatih_jatisampurna->findAll()
        ];

        return view('admin_jatisampurna/pelatih_jati_sampurna', $data);
    }

    public function tambahData_pelatih()
    {
        $data = [
            'title'     => 'Form Input Data Pelatih',
            'subtitle'  => '',
            'page'      => '',
            'menu'      => 'jatisampurna',
            'submenu'   => 'datapelatih',
        ];

        return view('admin_jatisampurna/tambahData_pelatih', $data);
    }

    public function insertData_pelatih()
    {
    if ($this->validate([
        'nta'       => [
            'label'     => 'Nta',
            'rules'     => 'required|is_unique[pelatih_jatisampurna.nta]',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique' => '{field} sudah ada dan tidak boleh sama',
            ]
        ],
        'no_gudep'       => [
            'label'     => 'No Gudep',
            'rules'     => 'required|is_unique[pelatih_jatisampurna.no_gudep]',
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
            'rules'             => 'required|is_unique[pelatih_jatisampurna.no_telp]',
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

        $this->ModelPelatih_jatisampurna->insertData_pelatih($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('Admin_jatisampurna/pelatih_jati_sampurna'));
    }else{
        // jika valid gagal
        session()->setflashdata('errors', \Config\Services::validation()->getErrors());

        return redirect()->to(base_url('Admin_jatisampurna/tambahData_pelatih'))->withInput('validation', \Config\Services::validation());
    }
}

    public function editData_pelatih($idpelatih_jatisampurna)
    {
        $data = [
            'title'         => 'Form Ubah Data Pelatih',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'jatisampurna',
            'submenu'       => 'datapelatih',
            'jatisampurna'  => $this->ModelPelatih_jatisampurna->detailData_pelatih($idpelatih_jatisampurna),
        ];

        return view('admin_jatisampurna/editData_pelatih', $data); 
    }

    public function ubahData_pelatih($idpelatih_jatisampurna)
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
        ])){
            
            $slug = url_title($this->request->getPost('nama'), '-', true);
            $data = [
                'idpelatih_jatisampurna'    => $idpelatih_jatisampurna,
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

            $this->ModelPelatih_jatisampurna->ubahData_pelatih($idpelatih_jatisampurna, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('Admin_jatisampurna/pelatih_jati_sampurna'));
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin_jatisampurna/editData_pelatih/' . $idpelatih_jatisampurna))->withInput('validation', \Config\Services::validation());
        }
    }

    public function detailData_pelatih($idpelatih_jatisampurna)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Jatisampurna',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'jatisampurna',
            'submenu'       => 'datapelatih',
            'jatisampurna'    => $this->ModelPelatih_jatisampurna->detailData_pelatih($idpelatih_jatisampurna),
        ];

        return view('/Admin_jatisampurna/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_jatisampurna)
    {
        $namaGambar = $this->ModelPelatih_jatisampurna->find($idpelatih_jatisampurna);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'jatisampurna'    => $this->ModelPelatih_jatisampurna->findAll(),
        ];

        return view('Admin_jatisampurna/excelData_pelatih', $data);
    }

    public function deleteData_pelatih($idpelatih_jatisampurna)
    {
        $jatisampurna = $this->ModelPelatih_jatisampurna->find($idpelatih_jatisampurna);

        unlink('image/' . $jatisampurna['foto']);

        $data = [
            'idpelatih_jatisampurna' => $idpelatih_jatisampurna,
        ];

        $this->ModelPelatih_jatisampurna->deleteData_pelatih($idpelatih_jatisampurna, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to(base_url('Admin_jatisampurna/pelatih_jati_sampurna'));
    }
}