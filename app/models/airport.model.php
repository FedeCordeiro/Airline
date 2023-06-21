<?php

class AirportModel
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_airline;charset=utf8', 'root', '');
    }

    public function getAllAirport()
    {
        $query = $this->db->prepare("SELECT * FROM airport");
        $query->execute();

        $airports = $query->fetchAll(PDO::FETCH_OBJ);

        return $airports;
    }

    public function getAirportsById($airportId)
    {
        $query = $this->db->prepare("SELECT * FROM airport WHERE id_airport = :airportId");
        $query->bindParam(":airportId", $airportId);
        $query->execute();

        $airport = $query->fetch(PDO::FETCH_OBJ);

        return $airport;
    }

    function editAirport($airport)
    {
        $query = $this->db->prepare('UPDATE airport SET id_airport=?, name=?, ubication=?, image=? WHERE id_airport=?');
        $query->execute([$airport['id_airport'], $airport['name'], $airport['ubication'], $airport['image'], $airport['id_airport']]);
    }

    function deleteAirportById($id)
    {
        $query = $this->db->prepare('DELETE FROM airport WHERE id_airport = ?');
        $query->execute([$id]);
    }

    // Función para insertar un nuevo aeropuerto
    public function insertAirport($id_airport, $name, $ubication, $image)
    {
        $query = $this->db->prepare("INSERT INTO airport (id_airport, name, ubication, image) VALUES (?, ?, ?, ?)");
        $query->execute([$id_airport, $name, $ubication, $image]);

        return $this->db->lastInsertId();
    }
}
