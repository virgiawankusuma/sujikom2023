<?= $this->extend('admin/layout'); ?>

<?= $this->section('adminContent'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>
  <div class="row">
    <div class="col-8 mb-3">
      <?php if (session()->getFlashdata('message')) { ?>
      <div class="alert alert-success alert-dismissible fade show">
        <strong>Success!</strong> <?= session()->getFlashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php }; ?>
    </div>
    <div class="col-8">
      <?= form_open('admin/ubah-password', ['method' => 'post']); ?>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?= $user['id'];?>">
        <?= csrf_field(); ?>
        <!-- password baru -->
        <div class="mb-3 row">
          <label for="password" class="col-3 form-label">Password Baru</label>
          <div class="col-9">
            <input 
              type="password" 
              class="form-control <?=(isset($errors['password'])) ? 'is-invalid' : '';?>" 
              placeholder="Masukkan password baru"
              id="password" 
              name="password"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('password');?>
            </div>
          </div>
        </div>

        <!-- konfirmasi password baru -->
        <div class="mb-3 row">
          <label for="repassword" class="col-3 form-label">Konfirmasi Password Baru</label>
          <div class="col-9">
            <input 
              type="password" 
              class="form-control <?=(isset($errors['repassword'])) ? 'is-invalid' : '';?>" 
              placeholder="Konfirmasi password baru"
              id="repassword" 
              name="repassword"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('repassword');?>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Password</button>
      <?= form_close(); ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>