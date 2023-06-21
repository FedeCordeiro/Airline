<div id="conteiner-formAdd">
    <div>
        <h1>Agregar Aeropuertos</h1>
        <form id="form-addAirport" action="processAddAirport" method="POST">
            <label for="name">Nombre</label>
            <input type="text" id="add-name" name="name" minlength="8" maxlength="25" required>

            <label for="ubication">Ubicacion</label>
            <input type="text" id="add-ubicacion" name="ubication" minlength="8" maxlength="25" required>

            <label for="image">Imagen</label>
            <input type="text" id="add-image" name="image" minlength="10" maxlength="200" required>

            <input id="button-submit" type="submit" value="Agregar">
        </form>
    </div>
</div>