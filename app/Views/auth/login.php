<?= $this->extend('auth/layout'); ?>

<?= $this->section('authContent'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
            <!-- <div class="col-md-6"> -->

            <div class="card o-hidden border-0 shadow my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-6 d-none d-lg-block">
                            <img src="<?= base_url('/image/login2.jpg'); ?>" alt="Sign in concept illustration Free Vector" class="img-fluid">
                        </div>
                        <div class="col-6 border-left">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
                                </div>
                                <!-- _message_block -->
                                <?= form_open('login', ['method' => 'post']); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Kata sandi">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                <?= form_close(); ?>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/register">Buat akun?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?=  $this->endSection(); ?>