<?= $this->extend('admin/layout'); ?>

<?= $this->section('adminContent'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>
  <div class="row">
    <div class="col-12 col-xl-8">
      <?= form_open('admin/kegiatan/save'); ?>
        <?= csrf_field(); ?>
        <div class="mb-3 row">
          <label for="nama_kegiatan" class="col-3 form-label">Nama</label>
          <div class="col-9">
            <input 
              type="text" 
              class="form-control <?=(isset($errors['nama_kegiatan'])) ? 'is-invalid' : '';?>" 
              id="nama_kegiatan" 
              name="nama_kegiatan"
              value="<?= old('nama_kegiatan') ;?>"
              placeholder="Nama Kegiatan"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('nama_kegiatan');?>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="kategori_kegiatan" class="col-3 form-label">Kategori</label>
          <div class="col-9">
            <select 
              class="form-control <?=(isset($errors['kategori_kegiatan'])) ? 'is-invalid' : '';?>" 
              id="kategori_kegiatan" 
              name="kategori_kegiatan"
            >
              <option value="">Pilih Kategori</option>
              <?php foreach ($kategori as $item) : ?>
                <option 
                  value="<?= $item['id'];?>"
                  <?= (old('kategori_kegiatan') == $item['id']) ? 'selected' : '';?>
                >
                  <?= $item['nama_kategori'];?>
                </option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
              <?= validation_show_error('kategori_kegiatan');?>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="deskripsi_kegiatan" class="col-3 form-label">Deskripsi</label>
          <div class="col-9">
            <textarea 
              class="form-control <?=(isset($errors['deskripsi_kegiatan'])) ? 'is-invalid' : '';?>" 
              id="deskripsi_kegiatan" 
              name="deskripsi_kegiatan"
              rows="10"
            ><?= old('deskripsi_kegiatan') ;?></textarea>
            <div class="invalid-feedback">
              <?= validation_show_error('deskripsi_kegiatan');?>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tanggal_kegiatan" class="col-3 form-label">Tanggal</label>
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
        <div class="mb-3 row">
          <label for="link_pendaftaran" class="col-3 form-label">Link Pendaftaran</label>
          <div class="col-9">
            <input 
              type="text" 
              class="form-control <?=(isset($errors['link_pendaftaran'])) ? 'is-invalid' : '';?>" 
              id="link_pendaftaran" 
              name="link_pendaftaran"
              value="<?= old('link_pendaftaran') ;?>"
              placeholder="https://"
            >
            <div class="invalid-feedback">
              <?= validation_show_error('link_pendaftaran');?>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
      <?= form_close(); ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>