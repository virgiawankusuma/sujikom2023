<?= $this->extend('admin/layout'); ?>

<?= $this->section('adminContent'); ?>
<div class="container-fluid">
  
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  
  <div class="row">
    <div class="col-12 mb-3">
      <div class="d-sm-flex align-items-center justify-content-between">
        <a href="/admin/kegiatan/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
          <i class="fas fa-plus fa-sm"></i> Tambah Kegiatan
        </a>
      </div>
    </div>
    <div class="col-12 mb-3">
    <?php if (session()->getFlashdata('message')) { ?>
      <div class="alert alert-success alert-dismissible fade show">
        <strong>Success!</strong> <?= session()->getFlashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php }; ?>
    <div class="table-responsive shadow px-3 py-3">
      <table class="table table-hover" id="tablePosts">
        <thead>
          <tr>
            <th class="d-none" scope="col">id</th>
            <th scope="col">Nama Kegiatan</th>
            <th scope="col">Slug</th>
            <th scope="col">Tanggal Kegiatan</th>
            <th scope="col">Tanggal Mulai</th>
            <th scope="col">Batas Pendaftaran</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          foreach ($kegiatans as $kegiatan) { ?>
            <tr>
              <td class="d-none"><?= $kegiatan['id']; ?></td>
              <td>
                  <a href="/admin/kegiatan/<?= $kegiatan['slug']; ?>"><?= $kegiatan['nama_kegiatan']; ?></a>
                  <div class="d-flex">
                    <?php 
                      $attributes = ['method' => 'post', 'class' => 'd-inline'];
                      echo form_open('/admin/kegiatan/' . $kegiatan['id'], $attributes); 
                      ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button 
                      type="submit"
                      class="btn btn-sm px-0 text-danger"
                      onclick="return confirm('Yakin ingin menghapus pos <?= $kegiatan['nama_kegiatan']; ?> ?');"
                      >
                      Hapus
                    </button>
                    <?= form_close(); ?>
                    <span class="mx-1"> | </span>
                    <a href="/kegiatan/<?=$kegiatan['slug']; ?>" class="btn btn-sm px-0 text-primary" target="_blank">Tampil</a>
                  </div>
              </td>
              <td><?= $kegiatan['slug']; ?></td>
              <td><?= $kegiatan['tanggal_kegiatan']; ?></td>
              <td><?= $kegiatan['tanggal_mulai']; ?></td>
              <td><?= $kegiatan['batas_pendaftaran']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th class="d-none" scope="col">id</th>
            <th scope="col">Nama Kegiatan</th>
            <th scope="col">Slug</th>
            <th scope="col">Tanggal Kegiatan</th>
            <th scope="col">Tanggal Mulai</th>
            <th scope="col">Batas Pendaftaran</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>