<?= $this->extend('admin/layout'); ?>

<?= $this->section('adminContent'); ?>
<div class="container-fluid">
  
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  
  <div class="row">
    <div class="col-12 mb-3">
      <div class="d-sm-flex align-items-center justify-content-between">
        <a href="/admin/kategori/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
          <i class="fas fa-plus fa-sm"></i> Tambah Kategori
        </a>
      </div>
    </div>
    <div class="col-12 mb-3">
    <?php if (session()->getFlashdata('messageSuccess')) { ?>
      <div class="alert alert-success alert-dismissible fade show">
        <strong>Success!</strong> <?= session()->getFlashdata('messageSuccess'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php }; ?>
    <?php if (session()->getFlashdata('messageError')) { ?>
      <div class="alert alert-danger alert-dismissible fade show">
        <strong>Failed!</strong> <?= session()->getFlashdata('messageError'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php }; ?>
    <div class="table-responsive shadow px-3 py-3">
      <table class="table table-hover" id="tablePosts">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Slug</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          foreach ($kategoris as $kategori) { ?>
            <tr>
              <td><?= $i++; ?></td>
              <td>
                  <a href="/admin/kategori/<?= $kategori['slug']; ?>"><?= $kategori['nama_kategori']; ?></a>
                  <div class="d-flex">
                    <?php 
                      $attributes = ['method' => 'post', 'class' => 'd-inline'];
                      echo form_open('/admin/kategori/' . $kategori['id'], $attributes); 
                      ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button 
                      type="submit"
                      class="btn btn-sm px-0 text-danger"
                      onclick="return confirm('Yakin ingin menghapus katgori <?= $kategori['nama_kategori']; ?> ?');">
                      Hapus
                    </button>
                    <?= form_close(); ?>
                  </div>
              </td>
              <td><?= $kategori['slug']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Slug</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>