{include file="header.tpl"}

<body>
    <section>
        <div id="container-table">
            <h1>Lista de Aeropuerto</h1>
            <table>
                <tr>
                    <th>Aeropuerto</th>
                    <th>Ubicacion</th>
                    <th>Explorar</th>
                    {if $logged}
                        <th>Eliminar</th>
                    {/if}
                </tr>
                {foreach $airport as $airportItem}
                    <tr>
                        <td>{$airportItem->name}</td>
                        <td>{$airportItem->ubication}</td>
                        <td><a href="router.php?action=airportdetail/{$airportItem->id_airport}">Abrir</a></td>
                        {if $logged}
                            <td><a href="deleteAirport/{$airportItem->id_airport}" type='button'
                                    class='btn btn-danger'>Borrar</a>
                            </td>
                        {/if}
                    </tr>
                {/foreach}
            </table>
            {if $logged}
                <div>
                    <h2>ATENCION!</h2>
                    <h3>Si eliminas un aeropuerto, todos los vuelos relacionados se perdaran definitivamente</h3>
                </div>
            {/if}
        </div>
    </section>
</body>