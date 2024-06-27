{*{extends file="Layout.tpl"}*}

{block name="content"}
    <title>Occasion Favorieten</title>
    <h2>Favoriete Auto's</h2>
    {if empty($favorites)}
        <p>Je hebt nog geen auto's aan favorieten toegevoegd.</p>
    {else}
        <ul>
            {foreach $favorites as $favorite}
                <div>
                    <h2>{$car.brand} {$car.model}</h2>
                    <p>Prijs: €{$car.price}</p>
                    <a href="index.php?action=detailpagina&id={$car.ID}">Bekijk details</a>
                    <br><br>
                    <form method="post" action="index.php?action=favorieten">
                        <input type="hidden" name="car_id" value="{$car.ID}">
                        <input type="hidden" name="remove" value="1">
                        <button type="submit">Verwijderen uit favorieten</button>
                    </form>
                </div>
            {/foreach}
        </ul>
    {/if}
{/block}
