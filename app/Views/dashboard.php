<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            Hola! <?= session()->get('username') ?>
        </div>
        <div class="card-body">
            <h5 class="card-title">Bienvenido a Remote and Talent</h5>
            <p class="card-text">Aqui podras encontrar muchas ofertas.</p>
            <a href="<?= base_url('jobs') ?>" class="btn btn-primary">Ver ofertas</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>