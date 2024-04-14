<?php if (session()->getFlashData('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashData('success') ?>
    </div>
<?php endif ?>
<?php if (session()->getFlashData('error')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashData('error') ?>
    </div>
<?php endif ?>