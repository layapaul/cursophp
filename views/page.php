<?php $this->layout('layout/layout', [
    'mainTitle' => 'views separation 2'
]) ?>

<h1>Hola</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae quasi vitae rem rerum commodi maiores maxime quas aliquam libero dolores! Dolor quibusdam sapiente veritatis ex error unde tenetur aliquid ipsam.
</p>

<ul>
    <li>item</li>
    <li>item</li>
    <li>item</li>
    <li>item</li>
</ul>


<?php $this->start('footerLinks') ?>
    <a href="http://">item 0</a>
    <a href="http://">item 1</a>
    <a href="http://">item 2</a>
    <a href="http://">item 3</a>
<?php $this->stop() ?>