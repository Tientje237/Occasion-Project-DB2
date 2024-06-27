{block name="content"}
    <title>Occasion Auto Details</title>


<h1>{$car->getBrand()} {$car->getModel()}</h1>
<ul>
    <li>Prijs: €{$car->getPrice()}</li>
    <li>PK: {$car->getHorsePower()}</li>
    <li>Kilometerstand: {$car->getMileage()} km</li>
    <li>Bouwjaar: {$car->getYear()}</li>
    <li>Kleur: {$car->getColor()}</li>
    <li>Brandstof: {$car->getFuelType()}</li>
    <li>Interieur: {$car->getInterior()}</li>
    <li>Transmissie: {$car->getTransmission()}</li>
    <li>Aantal zitplaatsen: {$car->getSeats()}</li>
    <li>Specificaties: {$car->getSpecifications()}</li>
</ul>

{if $is_favorite}
<p>Dit voertuig is al toegevoegd aan favorieten.</p>
{else}
<form action="index.php?action=favorieten" method="post">
    <input type="hidden" name="addFavorite" value="{$car->getId()}">
    <input type="submit" value="Toevoegen aan favorieten">
</form>
{/if}
{/block}
