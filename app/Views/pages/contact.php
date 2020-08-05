<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Contact</h1>
            <?php foreach ($addresses as $address) : ?>
                <ul>
                    <li><?= $address['type']; ?></li>
                    <li><?= $address['road']; ?></li>
                    <li><?= $address['city']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>