{include file="header.tpl"}

<body>
    <section>
        <div id="container-table">
            <h1>Lista de Vuelos</h1>
            <table>
                <tr>
                    <th>Destino</th>
                    <th>Precio</th>
                    <th>Duración</th>
                    <th>Explorar</th>
                    {if $logged}
                        <th>Eliminar</th>
                    {/if}
                </tr>
                {foreach $flights as $flightItem}
                    <tr>
                        <td>{$airportNameById[$flightItem->destination]}</td>
                        <td>{$flightItem->price}</td>
                        <td>{$flightItem->duration}</td>
                        <td><a href="router.php?action=flightDetail/{$flightItem->id_flight}">Abrir</a></td>
                        {if $logged}
                            <td><a href="deleteFlight/{$flightItem->id_flight}" type='button' class='btn btn-danger'>Borrar</a>
                            </td>
                        {/if}
                    </tr>
                {/foreach}
            </table>
        </div>
    </section>
    </div>
</body>