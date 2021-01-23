<?php $this->layout('layout/layout', [
    'mainTitle' => 'Editar' . $manual["title"],
] )?>

<h1>Editar <?= $manual["title"] ?></h1>

<?php if(count($errors) !== 0): ?>
    <div class="errors">
        Hay errores en el formulario: 
        <ul>
            <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>

<?php if($msg !== ''): ?>
<div class="success">
    <?= $msg ?>
</div>
<?php endif; ?>

<?= $this->insert('section/manuals/partials/manual-form', [
    'data' => $data,
    'manual' => $manual,
]);?>