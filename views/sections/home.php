<?php $this->layout('layout/layout')?>
<h1>Separando la vista</h1>
<p>Estamos haciendo la separacion de la vistas.</p>
<?php $this->insert('partials/some-markup',['courseTitle'=>'El titulo']); ?>
<?php $this->start('footerLinks')?>
    <p>
        <a href="/otra/carpeta/1">Otra Carpeta</a>
        <a href="/producto/1">Producto 1</a>
        <a href="/producto/1">Producto 22</a>
    </p>
<?php $this->stop() ?>
