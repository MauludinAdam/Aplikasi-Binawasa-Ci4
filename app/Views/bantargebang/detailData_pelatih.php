<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header" style="background:#800080;">
            <h3 class="card-title text-white">Detail Ijazah</h3>
            <div class="card-tools">
                <a href="/Bantargebang/pelatih_bantargebang" class="btn btn-success "><i class="fas fa-backward"></i> Kembali</a>
            </div>
        </div>
        <div class="card-body">
        <div class="row ">
        <div class="col-sm-4">
            <div class="card shadow mt-2">
                <img src="/ijazah/<?= $bantargebang['ijazah'] ?>" width="100%" class="card-img-top mb-4" alt="...">
            </div>
        </div>
        <div class="col-md-8">
        <div class="card shadow">
        <div class="col-sm-12 mt-3">
            <div class="form-group row">
                <label for="inputPassword" readonly class="col-sm-3 col-form-label ml-2">NTA</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bantargebang['nta'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" readonly class="col-sm-3 col-form-label ml-2">No Gudep</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bantargebang['no_gudep'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" readonly class="col-sm-3 col-form-label ml-2">Nama Lengkap</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext ml-2" id="staticEmail" value="<?= $bantargebang['nama'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label ml-3">Tempat Lahir</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bantargebang['tempat_lhr'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label ml-3">Tanggal Lahir</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bantargebang['tgl_lhr'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label ml-3">No Telpon</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bantargebang['no_telp'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label ml-3">Email</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bantargebang['email'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label ml-3">Kualifikasi</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bantargebang['kualifikasi'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label ml-3">Golongan</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bantargebang['golongan'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label ml-3">Thn Lulus KPD</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bantargebang['thn_lulus_kpd'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label ml-3">Thn Lulus KPL</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bantargebang['thn_lulus_kpl'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label ml-3">Alamat</label>
                <span class="mt-2 ml-2">:</span>
                <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $bantargebang['alamat'] ?>">
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