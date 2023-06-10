<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <h2>Semua Kegiatan</2>
    </div>
    <div class="col-12">
      <div class="row">
        <?php foreach($kegiatans as $kegiatan) { ?>
        <div class="col-lg-3">
          <div class="card" style="width: 18rem;">
            <img 
              src="/image/kegiatan/<?= $kegiatan['cover'];?>" 
              class="card-img-top" 
              alt="<?= $kegiatan['nama_kegiatan'];?>"
            >
            <div class="card-body">
              <a href="/kegiatan/<?= $kegiatan['slug'];?>">
                <h5 class="card-title"><?= $kegiatan['nama_kegiatan'];?></h5>
              </a>
              <p class="card-title">Tanggal Kegiatan: <b><?= $kegiatan['tanggal_kegiatan'];?></b></p>
              <p class="card-title">Tanggal Mulai: <b><?= $kegiatan['tanggal_mulai'];?></b></p>
              <p class="card-title">Batas Pendaftaran: <b><?= $kegiatan['batas_pendaftaran'];?></b></p>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>