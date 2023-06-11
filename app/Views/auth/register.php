<?= $this->extend('auth/layout'); ?>

<?= $this->section('authContent'); ?>
<div class="container">
    <div class="card o-hidden border-0 shadow my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                    <img src="<?= base_url('image/register1.jpg'); ?>" alt="Sign up concept illustration Free Vector" class="img-fluid">
                </div>
                <div class="col-lg-7 border-left">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
                        </div>
                        <?= form_open('register', ['method' => 'post']); ?>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user <?=(isset($errors['nama'])) ? 'is-invalid' : '';?>" id="nama" placeholder="Nama Lengkap" name="nama" autofocus value="<?= old('nama'); ?>">
                            <div class="invalid-feedback">
                                <?= validation_show_error('nama');?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user <?=(isset($errors['email'])) ? 'is-invalid' : '';?>" id="email" placeholder="Email" name="email" value="">
                            <div class="invalid-feedback">
                                <?= validation_show_error('email');?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user <?=(isset($errors['password'])) ? 'is-invalid' : '';?>" id="password" placeholder="Kata sandi" name="password" value="">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('password');?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user <?=(isset($errors['repassword'])) ? 'is-invalid' : '';?>" id="repassword" placeholder="Ulangi kata sandi" name="repassword" value="">
                                <div class="invalid-feedback">
                                    <?= validation_show_error('repassword');?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Daftar
                        </button>
                        <?= form_close(); ?>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('login'); ?>">Sudah terdaftar? Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?=  $this->endSection(); ?>