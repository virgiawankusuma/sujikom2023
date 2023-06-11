<?= $this->extend('admin/layout'); ?>

<?= $this->section('adminContent'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>
  <div class="row">
    <div class="col-8">
      <?= form_open('admin/kegiatan/save'); ?>
        <?= csrf_field(); ?>
        <div class="mb-3 row">
          <label for="nama_kegiatan" class="col-3 form-label">Nama Kegiatan</label>
          <div class="col-9">
            <input 
              type="text" 
              class="form-control <?=(isset($errors['nama_kegiatan'])) ? 'is-invalid' : '';?>" 
              id="nama_kegiatan" 
              name="nama_kegiatan"
              value="<?= old('nama_kegiatan') ;?>"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('nama_kegiatan');?>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tanggal_kegiatan" class="col-3 form-label">Tanggal Kegiatan</label>
          <div class="col-9">
            <input 
              type="date" 
              class="form-control <?=(isset($errors['tanggal_kegiatan'])) ? 'is-invalid' : '';?>" 
              id="tanggal_kegiatan" 
              name="tanggal_kegiatan"
              value="<?= old('tanggal_kegiatan') ;?>"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('tanggal_kegiatan');?>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tanggal_mulai" class="col-3 form-label">Tanggal Mulai</label>
          <div class="col-9">
            <input 
              type="date" 
              class="form-control <?=(isset($errors['tanggal_mulai'])) ? 'is-invalid' : '';?>" 
              id="tanggal_mulai" 
              name="tanggal_mulai"
              value="<?= old('tanggal_mulai') ;?>"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('tanggal_mulai');?>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="batas_pendaftaran" class="col-3 form-label">Batas Pendaftaran</label>
          <div class="col-9">
            <input 
              type="datetime-local" 
              class="form-control <?=(isset($errors['batas_pendaftaran'])) ? 'is-invalid' : '';?>" 
              id="batas_pendaftaran" 
              name="batas_pendaftaran"
              value="<?= old('batas_pendaftaran') ;?>"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('batas_pendaftaran');?>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
      <?= form_close(); ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>