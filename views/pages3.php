<?php $this->layout('layout/layout', [
    'mainTitle' => 'views separation 3'
]) ?>

<h1>other content</h1>

<?php $this->insert('partials/some-markup', [
    'courseTitle' => 'Professional php applications'

]);