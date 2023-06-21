{include file="header.tpl"}

<body>
    <h1>Busca los vuelos disponibles a tu destino!</h1>
    <form action="searchByAirport" method="POST">
        <select name="SelectAirports">
            {foreach from=$airport item=airportItem}
                <option value={$airportItem->id_airport}>{$airportItem->ubication}</option>
            {/foreach}
        </select>
        <button type="submit"> APLICAR FILTRO </button>
    </form>
</body>