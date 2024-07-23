<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
  <div class="row">
    <div class="col-12">
      <h1>Semua Kegiatan</h1>
    </div>
    <div class="col-12">
      <div class="row">
        <?php foreach($kegiatans as $kegiatan) { ?>
        <div class="mb-4 col-12 col-md-6 col-lg-4 col-xl-3">
          <div class="card">
            <img 
              src="/image/kegiatan/<?= $kegiatan['cover'];?>" 
              class="card-img-top" 
              alt="<?= $kegiatan['nama_kegiatan'];?>"
            >
            <div class="card-body">
              <a href="/kegiatan/<?= $kegiatan['slug'];?>">
                <h5 class="card-title"><?= $kegiatan['nama_kegiatan'];?></h5>
              </a>
              <p class="card-text">Tanggal Kegiatan: 
                <b><?= date('d F Y', strtotime($kegiatan['tanggal_kegiatan'])); ?></b>
              </p>
              <p class="card-text">Batas Pendaftaran: 
                <b><?= date('d F Y, H:i', strtotime($kegiatan['batas_pendaftaran'])) . " WIB"; ?></b>
              </p>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>