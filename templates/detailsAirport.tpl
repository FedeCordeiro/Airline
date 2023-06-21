{include file="header.tpl"}

<body>
    <section>
        <div id="container-table">
            <h2>Detalles del Aeropuerto</h2>
            <table>
                <tr>
                    <th>Aeropuerto</th>
                    <th>Ubicacion</th>
                    <th>Imagen del destino</th>
                </tr>
                <tr>
                    <td>{$airport->name}</td>
                    <td>{$airport->ubication}</td>
                    <td><img class="img-detail" src={$airport->image}></img></td>
                </tr>
            </table>
    </section>

    {if $logged}
        <a id="btn-agregar" href="addAirport">Agregar Aeropuerto</a>
        <div id="container-forms">
            <form id="form-airport" action="editAirport" method="POST">
                <h2>Editar Aeropuerto<h2>
                        <input type="hidden" name="id_airport" value="{$airport->id_airport}" required>

                        <label for="name">Aeropuerto</label>
                        <input name="name" value="{$airport->name}" minlength="5" maxlength="30" required>

                        <label for="ubication">Ubicacion</label>
                        <input name="ubication" value="{$airport->ubication}" minlength="5" maxlength="50" required>

                        <label for="image">Imagen</label>
                        <input name="image" value="{$airport->image}" minlength="15" maxlength="1000" required>
                        <input class = "boton" type="submit" value="Guardar">
            </form>
        </div>
    {/if}
</body>