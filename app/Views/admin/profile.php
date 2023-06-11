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
      <?= form_open('admin/profil', ['method' => 'post']); ?>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?= $user['id'];?>">
        <?= csrf_field(); ?>
        <!-- nama -->
        <div class="mb-3 row">
          <label for="nama" class="col-3 form-label">Nama Lengkap</label>
          <div class="col-9">
            <input 
              type="text" 
              class="form-control <?=(isset($errors['nama'])) ? 'is-invalid' : '';?>" 
              placeholder="e.g. John Doe"
              id="nama" 
              name="nama"
              value="<?= (old('nama') ? old('nama') : $user['nama']);?>"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('nama');?>
            </div>
          </div>
        </div>

        <!-- email -->
        <div class="mb-3 row">
          <label for="email" class="col-3 form-label">Email</label>
          <div class="col-9">
            <input 
              type="email" 
              class="form-control <?=(isset($errors['email'])) ? 'is-invalid' : '';?>" 
              placeholder="e.g. example@mail.com"
              id="email" 
              name="email"
              value="<?= (old('email') ? old('email') : $user['email']);?>"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('email');?>
            </div>
          </div>
        </div>

        <!-- tanggal_lahir -->
        <div class="mb-3 row">
          <label for="tanggal_lahir" class="col-3 form-label">Tanggal Lahir</label>
          <div class="col-9">
            <input 
              type="date" 
              class="form-control <?=(isset($errors['tanggal_lahir'])) ? 'is-invalid' : '';?>" 
              placeholder="e.g. 01/01/2000"
              id="tanggal_lahir" 
              name="tanggal_lahir"
              value="<?= (old('tanggal_lahir') ? old('tanggal_lahir') : $user['tanggal_lahir']);?>"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('tanggal_lahir');?>
            </div>
          </div>
        </div>

        <!-- nomor telepon -->
        <div class="mb-3 row">
          <label for="nomor_telepon" class="col-3 form-label">Nomor Telepon</label>
          <div class="col-9">
            <input 
              type="text" 
              class="form-control <?=(isset($errors['nomor_telepon'])) ? 'is-invalid' : '';?>" 
              placeholder="e.g. 081234567890"
              id="nomor_telepon" 
              name="nomor_telepon"
              value="<?= (old('nomor_telepon') ? old('nomor_telepon') : $user['nomor_telepon']);?>"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('nomor_telepon');?>
            </div>
          </div>
        </div>

        <!-- alamat -->
        <div class="mb-3 row">
          <label for="alamat" class="col-3 form-label">Alamat</label>
          <div class="col-9">
            <textarea 
              class="form-control <?=(isset($errors['alamat'])) ? 'is-invalid' : '';?>" 
              placeholder="e.g. Jl. Raya No. 1"
              id="alamat" 
              name="alamat"
            ><?= (old('alamat') ? old('alamat') : $user['alamat']);?></textarea>
            <div class="invalid-feedback">
              <?= validation_show_error('alamat');?>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      <?= form_close(); ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>