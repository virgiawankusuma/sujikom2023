<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-12 mt-2">
      <h1>Detail Kegiatan</h1>
    </div>
    <div class="col-12">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img 
              src="<?= base_url('/image/kegiatan/' . $kegiatan['cover']);?>" 
              class="img-fluid rounded-start w-100" 
              alt="<?= $kegiatan['nama_kegiatan'];?>"
            >
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $kegiatan['nama_kegiatan'];?></h5>
              <p class="card-text">Tanggal Kegiatan: 
                <b><?= date('d F Y', strtotime($kegiatan['tanggal_kegiatan'])); ?></b>
              </p>
              <p class="card-text">Batas Pendaftaran: 
                <small class="text-body-secondary">
                  <b><?= date('d F Y, H:i', strtotime($kegiatan['batas_pendaftaran'])) . " WIB"; ?></b>
                </small>
              </p>

              <p class="card-text">Deskripsi Kegiatan:
                <?= $kegiatan['deskripsi_kegiatan'];?>
              </p>
              <br><br>
              <a href="/">Kembali ke Beranda</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>