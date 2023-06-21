{include file="header.tpl"}

<body>
    <section>
        <div id="container-table">
            <h1>Vuelos disponibles para este destino</h1>
            <table>
                <thead>
                    <tr>
                        <th>Aeropuerto</th>
                        <th>Destino</th>
                        <th>Precio</th>
                        <th>Duración</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $flight as $flightItem}
                        <tr>
                            {foreach $airport as $airportItem}
                                {if $flightItem->destination eq $airportItem->id_airport}
                                    <td>{$airportItem->name}</td>
                                    <td>{$airportItem->ubication}</td>
                                {/if}
                            {/foreach}
                            <td>{$flightItem->price}</td>
                            <td>{$flightItem->duration}</td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </section>
</body>