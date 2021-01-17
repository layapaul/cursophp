<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spaghetti</title>
    <link rel="stykesheet" href="/assets/styles.css">
</head>
<body>
    <h1>Spaghetti php</h1>
    <?php
    require '../vendor/autoload.php';

    use Carbon\Carbon;
    use Lib\Breadcrumbs;
    use Lib\Dates;

    $date = Carbon::now();
    echo $date->format('Y');

    Carbon::SetLocale('es');
    $today = Carbon::now();
    $tomorrow = $today->addDays(1);
    echo $tomorrow->isoFormat('dddd DD [de] MMMM');

    // include '../Lib/Dates.php';
    // include '../Lib/Breadcrumbs.php';
    

    $scrum = new Breadcrumbs();
    $scrum->add('/link', 'Seccion');
    $scrum->show();
    
    ?>


    <p> Con php es facil hacer Spaguetti code </p>

    <p>
        Pero en 
        <?= Dates::longDate(Dates::tomorrow()) ?>
        lo vamos a solucionar.
    </p>
</body>
</html>