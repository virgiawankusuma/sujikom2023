<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-12 mt-2">
      <h1>Detail Kegiatan</h1>
    </div>
    <div class="col-12">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img 
              src="<?= base_url('/image/kegiatan/' . $kegiatan['cover']);?>" 
              class="img-fluid rounded-start" 
              alt="<?= $kegiatan['nama_kegiatan'];?>"
            >
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $kegiatan['nama_kegiatan'];?></h5>
              <p class="card-text"><b>Tanggal Kegiatan : </b><?= $kegiatan['tanggal_kegiatan'];?></p>
              <p class="card-text"><small class="text-body-secondary"><b>Tanggal Mulai : </b><?= $kegiatan['tanggal_mulai'];?></small></p>
              <p class="card-text"><small class="text-body-secondary"><b>Batas Pendaftaran : </b><?= $kegiatan['batas_pendaftaran'];?></small></p>
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