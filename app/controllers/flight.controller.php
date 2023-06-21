<?php

require_once("./app/views/flight.view.php");
require_once("./app/models/flight.model.php");
require_once("./app/models/airport.model.php");
require_once("./Helpers/AuthHelper.php");

class FlightController
{
    private $model;
    private $modelAirport;
    private $view;

    public function __construct()
    {
        $this->model = new FlightModel();
        $this->modelAirport = new AirportModel();
        $this->view = new FlightView();
    }

    // Muestra todos los vuelos
    public function showFlight()
    {
        $logged = AuthHelper::checkLoggedIn();
        $flights = $this->model->getAllFlight();
        $airports = $this->modelAirport->getAllAirport();

        $airportNameById = $this->buildAirportNameById($airports);

        $this->view->showFlight($flights, $airportNameById, $logged);
    }

    public function prepareEditFlight($flightId)
    {
        $logged = AuthHelper::checkLoggedIn();
        $flightId = $this->model->getFlightsById($flightId);
        $airports = $this->modelAirport->getAllAirport();

        $airportNameById = $this->buildAirportNameById($airports);

        $this->view->prepareEditFlight($flightId, $airports, $airportNameById, $logged);
    }

    public function editFlight($datos)
    {
        $logged = AuthHelper::checkLoggedIn();

        $flight = [
            'id_flight' => $datos['id_flight'],
            'destination' => $datos['destination'],
            'price' => $datos['price'],
            'duration' => $datos['duration']
        ];

        $this->model->editFlight($flight);
    }

    public function deleteFlight($id)
    {
        $logged = AuthHelper::checkLoggedIn();
        $this->model->deleteFlightById($id);
        header("Location: " . BASE_URL . "flight");
    }

    public function addFlight()
    {
        $logged = AuthHelper::checkLoggedIn();
        if ($logged) {
            if (isset($_POST['destination'], $_POST['price'], $_POST['duration'])) {
                $destination = $_POST['destination'];
                $price = $_POST['price'];
                $duration = $_POST['duration'];

                $airports = $this->modelAirport->getAllAirport();
                $foundAirport = false;

                foreach ($airports as $airport) {
                    if ($airport->id_airport == $destination) {
                        $foundAirport = true;
                        break;
                    }
                }

                if ($foundAirport) {
                    $id_flight = '';
                    $id = $this->model->insertFlight($id_flight, $destination, $price, $duration);

                    header("Location: " . BASE_URL . "flight");
                } else {
                    header("Location: " . BASE_URL . "flight");
                }
            }
        } else {
            header("Location: " . BASE_URL . "login");
        }
    }

    private function buildAirportNameById($airports)
    {
        $airportNameById = [];
        foreach ($airports as $airport) {
            $airportNameById[$airport->id_airport] = $airport->name;
        }
        return $airportNameById;
    }

    function searchByAirport()
    {
        $id_airport = $_POST['SelectAirports'];
        $flightByAirport = $this->model->getFlightByAirport($id_airport);
        $airport = $this->modelAirport->getAllAirport();
        $this->view->RenderDetalle($flightByAirport, $airport);
    }
}
