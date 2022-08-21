<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="<?= base_url('auth/registration') ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Nama Lengkap" value="<?= set_value('name') ?>">
                                <?= form_error('name', '<small class="text-danger ml-3">', '</small>')  ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                                <?= form_error('username', '<small class="text-danger ml-3">', '</small>')  ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger ml-3">', '</small>')  ?>

                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="passconf" name="passconf" placeholder="Konfirmasi Password">
                                    <?= form_error('passconf', '<small class="text-danger ml-3">', '</small>')  ?>
                                </div>
                            </div>
                            <button href="login.html" class="btn btn-primary btn-user btn-block">
                                Buat Akun!
                            </button>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth/login') ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>