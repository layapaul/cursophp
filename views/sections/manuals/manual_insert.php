<?php $this->layout('layouts/layout', [
    'mainTitle' => 'Crear un nuevo manual',
]);?>


<h1>nuevo manual</h1>

<?= $this->insert('partials/errors', [ 'errors' => $errors ]) ?>

<?= $this->insert('section/manuals/partials/manual-form', [
    'data' => $data,
    'manual' =>[],
    'action' => $action,
]); ?>