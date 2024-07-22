<?= $this->extend('admin/layout'); ?>

<?= $this->section('adminContent'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>
  <div class="row">
    <div class="col-12 col-xl-8">
      <?= form_open('admin/kategori/save'); ?>
        <?= csrf_field(); ?>
        <div class="mb-3 row">
          <label for="nama_kategori" class="col-3 form-label">Nama</label>
          <div class="col-9">
            <input 
              type="text" 
              class="form-control <?=(isset($errors['nama_kategori'])) ? 'is-invalid' : '';?>" 
              id="nama_kategori" 
              name="nama_kategori"
              value="<?= old('nama_kategori') ;?>"
              placeholder="Nama Kategori"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('nama_kategori');?>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
      <?= form_close(); ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>