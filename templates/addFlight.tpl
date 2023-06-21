<body>
    <div id="conteiner-formAdd">
        <div>
            <h1>Agregar Vuelos</h1>
            <form id="form-addFlight" action="processAddFlight" method="POST">
                <label for="destination">Destino</label>
                <input type="text" id="add-destination" name="destination" required>

                <label for="price">Precio</label>
                <input type="number" id="add-price" name="price" min="10000" max="50000" required>

                <label for="price">Duracion (00:00:00)</label>
                <input type="text" id="add-duration" name="duration" required>

                <input id="button-submit" type="submit" value="Agregar">
            </form>
        </div>
    </div>
</body>