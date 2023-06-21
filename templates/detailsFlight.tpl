{include file="header.tpl"}

<body>
    <section>
        <div id="container-table">
            <h2>Detalles del Vuelo</h2>
            <table>
                <tr>
                    <th>Destino</th>
                    <th>Precio</th>
                    <th>Duración</th>
                </tr>
                <tr>
                    <td>{$airportNameById[$flightId->destination]}</td>
                    <td>${$flightId->price}</td>
                    <td>{$flightId->duration}</td>
                </tr>
            </table>
        </div>
    </section>

    {if $logged}
        <a id="btn-agregar" href="addFlight">Agregar Vuelo</a>
        <div id="container-forms">
            <form id="form-flight" action="editFlight" method="POST">
                <h2>Editar vuelo<h2>
                        <input type="hidden" name="id_flight" value="{$flightId->id_flight}" required>

                        <label for="destination" class="form-label">Destino</label>
                        <select class="form-control" id="destination" name="destination">
                            {foreach $airports as $airport}
                                <option value="{$airport->id_airport}">{$airport->name}</option>
                            {/foreach}
                        </select>

                        <label for="price">Precio</label>
                        <input type="number" name="price" value="{$flightId->price}" min="10000" max="35000" required>

                        <label for="duration">Duracion</label>
                        <input type="time" name="duration" value="{$flightId->duration}" step="1" min="01:00:00" max="04:00:00">

                        <input class = "boton" type="submit" value="Guardar">
            </form>
        </div>
    {/if}
</body>