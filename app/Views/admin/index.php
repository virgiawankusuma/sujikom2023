<?= $this->extend('admin/layout'); ?>

<?= $this->section('adminContent'); ?>
<div class="container-fluid">
  
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">Admin</h5>
          <div class="card-text no-gutters">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus error consectetur voluptatum esse. Voluptas illum laudantium quae accusamus. Atque odit ducimus natus iste dolor molestiae quidem quam et repudiandae modi.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>