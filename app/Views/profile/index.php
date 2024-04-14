<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-6 mt-5">
            <h3 class="text-center fw-bold">Actualizar tu perfil</h3>
            <div class="card mt-3">
                <div class="card-body">
                   <?= $this->include('alerts') ?>
                    <form action="<?= base_url("profile/update/$user->id") ?>" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username',$user->username) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>