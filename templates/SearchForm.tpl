{*{extends file='Layout.tpl'}*}

{block name="contentSearch"}

    <h1>Zoeken</h1>
    <form action="index.php?action=zoeken" method="post">
        <label for="searchTerm">Zoekterm:</label>
        <input type="text" id="searchTerm" name="searchTerm" value="{$searchTerm|escape}" required>
        <button type="submit">Zoeken</button>
    </form>

    {if $searchTerm}
        <h2>Zoekresultaten voor '{$searchTerm}':</h2>
        {if count($searchResults) > 0}
                {foreach from=$searchResults item=car}
                    <div>
                        <h2>{$car->getBrand()} {$car->getModel()}</h2>
                        <p>€{$car->getPrice()} | {$car->getYear()} | {$car->getMileage()}km</p>
                        <a href="index.php?action=detailpagina&id={$car->getID()}">Bekijk details</a>

                    </div>
                {/foreach}
        {else}
            <p>Geen resultaten gevonden.</p>
        {/if}
    {/if}

{/block}
