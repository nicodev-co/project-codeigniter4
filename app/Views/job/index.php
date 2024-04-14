<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between">
            <h4 class="fw-bold">Encuentra aqui todas las ofertas</h4>
            <?php if (session()->get('role') == 'Recruiter') : ?>
                <a class="btn btn-primary" href="<?= base_url('jobs/create') ?>">Nueva oferta</a>
            <?php endif ?>
        </div>
        <div class="card-body">
            <?php if (count($jobs)) : ?>
                <?php foreach ($jobs as $job) : ?>
                    <div class="card w-75 mb-3">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                <strong><?= $job->title ?></strong> -
                                <span class="fs-6">Ofertada por:
                                    <strong>
                                        <?= $job->username ?>
                                    </strong>
                                </span>
                            </h5>
                            <p class="card-text"><?= $job->description ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else : ?>
                <h5 class="text-center">No hay ofertas en el momento</h5>
            <?php endif ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>