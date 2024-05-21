<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_jatiasih;
use App\Models\ModelPelatih_jatiasih;

class Admin_jatiasih extends BaseController
{
    protected $ModelPembina_jatiasih;
    protected $ModelPelatih_jatiasih;
    public function __construct()
    {
        $this->ModelPembina_jatiasih = new ModelPembina_jatiasih();
        $this->ModelPelatih_jatiasih = new ModelPelatih_jatiasih();
    }
    public function pembina_jati_asih()
    {
        $data = [
            'title'         => 'Halaman Admin User Pembina Jatiasih',
            'subtitle'      => 'Data Pembina',
            'page'          => 'Pembina Jatiasih',
            'menu'          => 'jatiasih',
            'submenu'       => 'datapembina',
            'jatiasih'      => $this->ModelPembina_jatiasih->findAll(),
        ];

        return view('admin_jatiasih/pembina_jati_asih', $data);
    }

    public function tambahData_pembina()
    {
        $data = [
            'title'     => 'Form Input Data Pembina',
            'subtitle'  => '',
            'page'      => '',
            'menu'      => 'jatiasih',
            'submenu'   => 'datapembina',
        ];

        return view('admin_jatiasih/tambahData_pembina', $data);
    }

    public function insertData_pembina()
    {
    if ($this->validate([
        'nta'       => [
            'label'     => 'Nta',
            'rules'     => 'required|is_unique[pembina_jatiasih.nta]',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique' => '{field} sudah ada dan tidak boleh sama',
            ]
        ],
        'no_gudep'       => [
            'label'     => 'No Gudep',
            'rules'     => 'required|is_unique[pembina_jatiasih.no_gudep]',
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
            'rules'             => 'required|is_unique[pembina_jatiasih.no_telp]',
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

        $this->ModelPembina_jatiasih->insertData_pembina($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('Admin_jatiasih/pembina_jati_asih'));
    }else{
        // jika valid gagal
        session()->setflashdata('errors', \Config\Services::validation()->getErrors());

        return redirect()->to(base_url('Admin_jatiasih/tambahdata_pembina'))->withInput('validation', \Config\Services::validation());
    }
}

    public function editData_pembina($idpembina_jatiasih)
    {
        $data = [
            'title'     => 'Form Ubah Data Pembina',
            'subtitle'  => '',
            'page'      => '',
            'menu'      => 'jatiasih',
            'submenu'   => 'datapembina',
            'jatiasih'  => $this->ModelPembina_jatiasih->detailData_pembina($idpembina_jatiasih),
        ];

        return view('admin_jatiasih/editData_pembina', $data);
    }

    public function ubahData_pembina($idpembina_jatiasih)
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
                'idpembina_jatiasih'        => $idpembina_jatiasih,
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

            $this->ModelPembina_jatiasih->ubahData_pembina($idpembina_jatiasih, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('Admin_jatiasih/pembina_jati_asih'));
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin_jatiasih/editData_pembina/' . $idpembina_jatiasih))->withInput('validation', \Config\Services::validation());
        }
    }

    public function detailData_pembina($idpembina_jatiasih)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Jatiasih',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'jatiasih',
            'submenu'       => 'datapembina',
            'jatiasih'    => $this->ModelPembina_jatiasih->detailData_pembina($idpembina_jatiasih),
        ];

        return view('/Admin_jatiasih/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_jatiasih)
    {
        $namaGambar = $this->ModelPembina_jatiasih->find($idpembina_jatiasih);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'jatiasih'    => $this->ModelPembina_jatiasih->findAll(),
        ];

        return view('Admin_jatiasih/excelData_pembina', $data);
    }

    public function deleteData_pembina($idpembina_jatiasih)
    {
        $jatiasih = $this->ModelPembina_jatiasih->find($idpembina_jatiasih);
        unlink('image/' . $jatiasih['foto']);
        $data = [
            'idpembina_jatiasih'    => $idpembina_jatiasih,
        ];

        $this->ModelPembina_jatiasih->deleteData_pembina($idpembina_jatiasih, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to(base_url('Admin_jatiasih/pembina_jati_asih'));
    }

    public function pelatih_jati_asih()
    {
        $data = [
            'title'     => 'Halaman Admin User Pelatih Jatiasih',
            'subtitle'  => 'Data Pelatih',
            'page'      => 'Pelatih Jatiasih',
            'menu'      => 'jatiasih',
            'submenu'   => 'datapelatih',
            'jatiasih'  => $this->ModelPelatih_jatiasih->findAll(),
        ];

        return view('Admin_jatiasih/pelatih_jati_asih', $data);
    }

    public function tambahData_pelatih()
    {
        $data = [
            'title'     => 'Form Input Data Pelatih',
            'subtitle'  => '',
            'page'      => '',
            'menu'      => 'jatiasih',
            'submenu'   => 'datapelatih',
        ];

        return view('Admin_jatiasih/tambahData_pelatih', $data);
    }

    public function insertData_pelatih()
    {
    if ($this->validate([
        'nta'       => [
            'label'     => 'Nta',
            'rules'     => 'required|is_unique[pelatih_jatiasih.nta]',
            'errors'    => [
                'required'  => '{field} wajib diisi dan tidak boleh kosong',
                'is_unique' => '{field} sudah ada dan tidak boleh sama',
            ]
        ],
        'no_gudep'       => [
            'label'     => 'No Gudep',
            'rules'     => 'required|is_unique[pelatih_jatiasih.no_gudep]',
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
            'rules'             => 'required|is_unique[pelatih_jatiasih.no_telp]',
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

        $slug = url_title($this->request->getPost('nama'), '-', true);
        $data = [
            'nta'               => $this->request->getPost('nta'),
            'no_gudep'          => $this->request->getPost('no_gudep'),
            'nama'              => $this->request->getPost('nama'),
            'slug'              => $slug,
            'jenkel'            => $this->request->getPost('jenkel'),
            'tempat_lhr'       => $this->request->getPost('tempat_lhr'),
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

        $this->ModelPelatih_jatiasih->insertData_pelatih($data);

        session()->setFlashdata('pesan', 'Data Pelatih berhasil ditambahkan');
        return redirect()->to(base_url('Admin_jatiasih/pelatih_jati_asih'));
    }else{
        // jika valid gagal
        session()->setflashdata('errors', \Config\Services::validation()->getErrors());

        return redirect()->to(base_url('Admin_jatiasih/tambahData_pelatih'))->withInput('validation', \Config\Services::validation());
    }
}

    public function editData_pelatih($idpelatih_jatiasih)
    {
        $data = [
            'title'         => 'Form Ubah Data Pelatih',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'jatiasih',
            'submenu'       => 'datapelatih',
            'jatiasih'      => $this->ModelPelatih_jatiasih->detailData_pelatih($idpelatih_jatiasih),
        ];

        return view('Admin_jatiasih/editData_pelatih', $data);
    }

    public function ubahData_pelatih($idpelatih_jatiasih)
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
                'idpelatih_jatiasih'        => $idpelatih_jatiasih,
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

            $this->ModelPelatih_jatiasih->ubahData_pelatih($idpelatih_jatiasih, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('Admin_jatiasih/pelatih_jati_asih'));
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin_jatiasih/editData_pelatih/' . $idpelatih_jatiasih))->withInput('validation', \Config\Services::validation());
        }
    }

    public function detailData_pelatih($idpelatih_jatiasih)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Jatiasih',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'jatiasih',
            'submenu'       => 'datapelatih',
            'jatiasih'    => $this->ModelPelatih_jatiasih->detailData_pelatih($idpelatih_jatiasih),
        ];

        return view('/Admin_jatiasih/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_jatiasih)
    {
        $namaGambar = $this->ModelPelatih_jatiasih->find($idpelatih_jatiasih);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'jatiasih'    => $this->ModelPelatih_jatiasih->findAll(),
        ];

        return view('Admin_jatiasih/excelData_pelatih', $data);
    }

    public function deleteData_pelatih($idpelatih_jatiasih)
    {
        $jatiasih = $this->ModelPelatih_jatiasih->find($idpelatih_jatiasih);

        unlink('image/' . $jatiasih['foto']);

        $data = [
            'idpelatih_jatiasih'    => $idpelatih_jatiasih,
        ];

        $this->ModelPelatih_jatiasih->deleteData_pelatih($idpelatih_jatiasih, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to(base_url('Admin_jatiasih/pelatih_jati_asih'));
    }
}