<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Occasion Aanbod</title>
</head>
<body>
<h1>Aanbod</h1>
{foreach from=$cars item=car}
    <div>
        <h2>{$car->getBrand()} {$car->getModel()}</h2>
        <p>€{$car->getPrice()} | {$car->getYear()} | {$car->getMileage()}km</p>
        <a href="index.php?action=detailpagina&id={$car->getID()}">Bekijk details</a>

    </div>
{/foreach}

</body>
</html>