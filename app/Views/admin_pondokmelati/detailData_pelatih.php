<?= $this->extend('layout_user/template'); ?>
<?= $this->section('content'); ?>
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header" style="background:#800080;">
            <h3 class="card-title text-white"> Ijazah</h3>
            <div class="card-tools">
                <a href="/Admin_pondokmelati/pelatih_pondok_melati" class="btn btn-success "><i class="fas fa-backward"></i> Kembali</a>
            </div>
        </div>
        <div class="card-body">
        <div class="row ">
        <div class="col-sm-4">
            <div class="card shadow mt-2">
                <img src="/ijazah/<?= $pondokmelatih['ijazah'] ?>" width="100%" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-md-8">
        <div class="card shadow">
        <div class="col-sm-12 mt-3">
            <div class="form-group row">
                <label for="inputPassword" readonly class="col-sm-2 col-form-label ml-3">NTA</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $pondokmelatih['nta'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" readonly class="col-sm-2 col-form-label ml-3">No Gudep</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $pondokmelatih['no_gudep'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" readonly class="col-sm-2 col-form-label ml-3">Nama Lengkap</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $pondokmelatih['nama'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label ml-3">Tempat Lahir</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $pondokmelatih['tempat_lhr'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label ml-3">Tanggal Lahir</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $pondokmelatih['tgl_lhr'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label ml-3">No Telpon</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $pondokmelatih['no_telp'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label ml-3">Email</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $pondokmelatih['email'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label ml-3">Kualifikasi</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $pondokmelatih['kualifikasi'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label ml-3">Golongan</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $pondokmelatih['golongan'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label ml-3">Thn Lulus KPL</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $pondokmelatih['thn_lulus_kpl'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label ml-3">Thn Lulus KPD</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $pondokmelatih['thn_lulus_kpd'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label ml-3">Alamat</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $pondokmelatih['alamat'] ?>">
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
</div>
    </div>
</div>
<?= $this->endsection(); ?>