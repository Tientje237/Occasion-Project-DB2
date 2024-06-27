
{block name="content"}
    <title>Admin Dashboard</title>
    <br>
    {foreach from=$cars item=car}
        <div>
            <h2>{$car->getBrand()} {$car->getModel()}</h2>
            <p>€{$car->getPrice()} | {$car->getYear()} | {$car->getMileage()}km</p>
            <form method="POST" action="index.php?action=verwijderen">
                <input type="hidden" name="car_id" value="{$car->getID()}">
                <button type="submit" name="verwijderen">Verwijderen</button>
            </form>
        </div>
    {/foreach}
{/block}
