<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $mainTitle ?></title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>
<body>
    <header>
    <p> <a href="/"><img src="/assets/images/logo.svg" alt="logo"></a></p>
    </header>
    <main>
        <?= $this->section('content') ?>
    </main>
    <footer>
        <Copyright class="">Copyright  lo que se</Copyright>
        <?= $this->section('footerLinks') ?>
    </footer>

</body>
</html>