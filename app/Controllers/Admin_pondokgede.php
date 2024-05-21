<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Response;
use App\Models\ModelPembina_pondokgede;
use App\Models\ModelPelatih_pondokgede;
use App\Models\UserModel;


class Admin_pondokgede extends BaseController
{
    public function __construct()
    {
        $this->ModelPembina_pondokgede = new ModelPembina_pondokgede();
        $this->ModelPelatih_pondokgede = new ModelPelatih_pondokgede();
        $this->UserModel               = new UserModel();
    }

    public function pembina_pondok_gede()
    {

        $session = \Config\Services::session();
        $data['session'] = $session;

        $data = [
            'title'         => 'Halaman Admin User Pembina Pondok Gede',
            'subtitle'      => 'Data Pembina',
            'page'          => 'Pembina Pondok Gede',
            'menu'          => 'pondokgede',
            'submenu'       => 'datapembina',
            'pondokgede'    => $this->ModelPembina_pondokgede->findAll(),
            'user'          => $this->UserModel->where('level', 'Admin Pondok Gede')->findAll(),
        ];

        return view('/Admin_pondokgede/pembina_pondok_gede', $data);
    }

    public function tambahdata_pembina()
    {
        $data = [
            'title'         => 'Form Input Data',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokgede',
            'submenu'        => 'datapembina',
            'pondokgede'    => $this->ModelPembina_pondokgede->findAll()
           
        ];

        return view('Admin_pondokgede/tambahdata_pembina', $data);

    }

    public function insertData_pembina()
    {
        if ($this->validate([
            'nta'       => [
                'label'     => 'Nta',
                'rules'     => 'required|is_unique[pembina_pondokgede.nta]',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                    'is_unique' => '{field} sudah ada dan tidak boleh sama',
                ]
            ],
            'no_gudep'       => [
                'label'     => 'No Gudep',
                'rules'     => 'required|is_unique[pembina_pondokgede.no_gudep]',
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
                'rules'             => 'required|is_unique[pembina_pondokgede.no_telp]',
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

            $this->ModelPembina_pondokgede->insertData($data);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('Admin_pondokgede/pembina_pondok_gede'));
        }else{
            // jika valid gagal
            session()->setflashdata('errors', \Config\Services::validation()->getErrors());

            return redirect()->to(base_url('Admin_pondokgede/tambahdata_pembina'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function editdata_pembina($idpembina_pondokgede)
    {
        $data = [
            'title'         => 'Form Ubah Data Pembina',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokgede',
            'submenu'       => 'datapembina',
            'pondokgede'    => $this->ModelPembina_pondokgede->detailData_pembina($idpembina_pondokgede),   
        ];
        
        return view('/Admin_pondokgede/editdata_pembina', $data);
    }

    public function ubahData_pembina($idpembina_pondokgede)
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
                'idpembina_pondokgede'   => $idpembina_pondokgede,
                'nta'                   => $this->request->getPost('nta'),
                'no_gudep'              => $this->request->getPost('no_gudep'),
                'nama'                  => $this->request->getPost('nama'),
                'slug'                  => $slug,
                'jenkel'                => $this->request->getPost('jenkel'),
                'tempat_lhr'            => $this->request->getPost('tempat_lhr'),
                'tgl_lhr'               => $this->request->getPost('tgl_lhr'),
                'email'                 => $this->request->getPost('email'),
                'no_telp'               => $this->request->getPost('no_telp'),
                'pangkalan'             => $this->request->getPost('pangkalan'),
                'kualifikasi'           => $this->request->getPost('kualifikasi'),
                'golongan'              => $this->request->getPost('golongan'),
                'thn_lulus_kmd'         => $this->request->getPost('thn_lulus_kmd'),
                'thn_lulus_kml'         => $this->request->getPost('thn_lulus_kml'),
                'alamat'                => $this->request->getPost('alamat'),
            ];

            $this->ModelPembina_pondokgede->ubahData_pembina($idpembina_pondokgede, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('Admin_pondokgede/pembina_pondok_gede'));
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin_pondokgede/editdata_pembina/' . $idpembina_pondokgede))->withInput('validation', \Config\Services::validation());
        }
    }

    public function detailData_pembina($idpembina_pondokgede)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Pondok Gede',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokgede',
            'submenu'       => 'datapembina',
            'pondokgede'    => $this->ModelPembina_pondokgede->detailData_pembina($idpembina_pondokgede),
        ];

        return view('/Admin_pondokgede/detailData_pembina', $data);
    }

    public function download($idpembina_pondokgede)
    {
        $namaGambar = $this->ModelPembina_pondokgede->find($idpembina_pondokgede);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);
    }

    public function excelData_pembina()
    {
        $data = [
            'pondokgede'    => $this->ModelPembina_pondokgede->findAll(),
        ];

        return view('Admin_pondokgede/excelData_pembina', $data);
    }


    public function deleteData_pembina($idpembina_pondokgede)
    {   
        // cari gambar foto berdasarkan id
        $pondokgede = $this->ModelPembina_pondokgede->find($idpembina_pondokgede);
        
        // hapus gambar foto nya
        unlink('image/' . $pondokgede['foto']);

       $data = [
        'idpembina_pondokgede'      => $idpembina_pondokgede,
       ];

       $this->ModelPembina_pondokgede->deleteData_pembina($idpembina_pondokgede, $data);

       session()->setFlashdata('pesan', 'Data berhasil dihapus');
       return redirect()->to(base_url('Admin_pondokgede/pembina_pondok_gede'));
    }


    // Halaman user Pelatih pondok gede

    public function pelatih_pondok_gede()
    {
        $data = [
            'title'         => 'User Pelatih Pondok Gede',
            'subtitle'      => 'Pelatih Pondok Gede',
            'page'          => 'Data Pembina',
            'menu'          => 'pondokgede',
            'submenu'       => 'datapelatih',
            'pondokgede'    => $this->ModelPelatih_pondokgede->findAll(),
            'user'          => $this->ModelPelatih_pondokgede->where('role','Admin Pondok Gede')
        ];

        return view('Admin_pondokgede/pelatih_pondok_gede', $data);
    }

    public function tambahdata_pelatih()
    {
        $data = [
            'title'         => 'Form Input Data Pelatih',
            'subtitle'      => 'Pelatih Pondok Gede',
            'page'          => 'Data Pelatih',
            'menu'          => 'pondokgede',
            'submenu'       => 'datapelatih',
        ];

        return view('Admin_pondokgede/tambahdata_pelatih', $data);
    }

    public function insertData_pelatih()
    {
        if ($this->validate([
            'nta'       => [
                'label'     => 'Nta',
                'rules'     => 'required|is_unique[pelatih_pondokgede.nta]',
                'errors'    => [
                    'required'  => '{field} wajib diisi dan tidak boleh kosong',
                    'is_unique' => '{field} sudah ada dan tidak boleh sama',
                ]
            ],
            'no_gudep'       => [
                'label'     => 'No Gudep',
                'rules'     => 'required|is_unique[pelatih_pondokgede.no_gudep]',
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
                'rules'             => 'required|is_unique[pembina_pondokgede.no_telp]',
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

            $this->ModelPelatih_pondokgede->insertData_pelatih($data);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('Admin_pondokgede/pelatih_pondok_gede'));
        }else{
            // jika valid gagal
            session()->setflashdata('errors', \Config\Services::validation()->getErrors());

            return redirect()->to(base_url('Admin_pondokgede/tambahdata_pelatih'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function editdata_pelatih($idpelatih_pondokgede)
    {
        $data = [
            'title'         => 'Form Ubah Data Pelatih',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokgede',
            'submenu'       => 'datapelatih',
            'pondokgede'    => $this->ModelPelatih_pondokgede->detailData_pelatih($idpelatih_pondokgede), 
        ];

        return view('Admin_pondokgede/editdata_pelatih', $data);
    }

    public function ubahData_pelatih($idpelatih_pondokgede)
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
                'idpelatih_pondokgede'      => $idpelatih_pondokgede,
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

            $this->ModelPelatih_pondokgede->ubahData_pelatih($idpelatih_pondokgede, $data);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('Admin_pondokgede/pelatih_pondok_gede'));
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Admin_pondokgede/editdata_pelatih/' . $idpelatih_pondokgede))->withInput('validation', \Config\Services::validation());
        }
    }

    public function detailData_pelatih($idpelatih_pondokgede)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Pondok Gede',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokgede',
            'submenu'       => 'datapelatih',
            'pondokgede'    => $this->ModelPelatih_pondokgede->detailData_pelatih($idpelatih_pondokgede),
        ];

        return view('/Admin_pondokgede/detailData_pelatih', $data);
    }

    public function excelData_pelatih()
    {
        $data = [
            'pondokgede' => $this->ModelPelatih_pondokgede->findAll(),
        ];

        return view('Admin_pondokgede/excelData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_pondokgede)
    {
        $namaGambar = $this->ModelPelatih_pondokgede->find($idpelatih_pondokgede);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function deleteData_pelatih($idpelatih_pondokgede)
    {
        // cari file gambar foto berdasarkan id

        $pondokgede = $this->ModelPelatih_pondokgede->find($idpelatih_pondokgede);

        // hapus gambar foto

        unlink('image/' . $pondokgede['foto']);

        $data = [
            'idpelatih_pondokgede'  => $idpelatih_pondokgede
        ];

        $this->ModelPelatih_pondokgede->deleteData_pelatih($idpelatih_pondokgede, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to(base_url('Admin_pondokgede/pelatih_pondok_gede'));
    }
}