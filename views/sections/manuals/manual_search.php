<?php $this->layout('layout/layout', [
    'mainTitle' => 'Busqueda de manuales',
]) ?>
<?= $this->insert('partials/search-form'); ?>

<?php if(count($manuals) === 0): ?>
    <p>No hemos encontrado manuales relacionados con tu busqueda</p>
<?php else: ?>

    <?php if($query === ''): ?>
        <p>No hemos recibido ningun criterio de busqueda, se muestran todos los manuales.</p>
    <?php else: ?>
        <p>Buscando manuales de <b><?= $query ?></b>. Hemos encontrado <?= count($manuals) ?> manuales relacionados. </p>
    <?php endif; ?>

    <?php foreach(manuals as $manual): ?>
        <?= $this->insert('partials/manual-card', [
            "manual" => $manual,
        ]) ?>
    <?php endforeach; ?>
<?php endif; ?>