<?= $this->extend('layout/guest'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-6 mt-5">
            <h3 class="text-center fw-bold">Inciar sesión</h3>
            <div class="card mt-3">
                <div class="card-body">
                   <?= $this->include('alerts') ?>
                    <form action="<?= base_url('login') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?= base_url('register') ?>">Crear cuenta</a>
                            <button class="btn btn-primary">Inciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>