<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-6 mt-5">
            <h3 class="text-center fw-bold">Nueva oferta</h3>
            <div class="card mt-3">
                <div class="card-body">
                    <?= $this->include('alerts') ?>
                    <form action="<?= base_url("jobs/create") ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="<?= set_value('title') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
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