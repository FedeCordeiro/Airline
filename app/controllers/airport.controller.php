<?php
require_once ("./app/models/airport.model.php");
require_once ("./app/views/airport.view.php");
require_once ("./app/controllers/user.controller.php");
require_once ("./Helpers/AuthHelper.php");

class AirportController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new AirportModel();
        $this->view = new AirportView();
    }

    public function showAirportHome()
    {
        $username = AuthHelper::getLoggedUserName();
        $airport = $this->model->getAllAirport();
        $this->view->showAirportHome($airport, $username);
    }

    public function showAirport()
    {
        $logged = AuthHelper::checkLoggedIn();
        $airport = $this->model->getAllAirport();
        $this->view->showAirport($airport, $logged);
    }

    public function showAirportSearch()
    {
        $airport = $this->model->getAllAirport();
        $this->view->showAirportSearch($airport);
    }

    public function showAirportId($airportId)
    {
        $logged = AuthHelper::checkLoggedIn();
        $airport = $this->model->getAirportsById($airportId);
        $this->view->showAirportId($airport, $logged);
    }

    public function editAirport($datos)
    {
        AuthHelper::checkLoggedIn();
        if (isset($_POST['name'], $_POST['ubication'], $_POST['image'])) {
            $airport = [
                'id_airport' => $datos['id_airport'],
                'name' => $_POST['name'],
                'ubication' => $_POST['ubication'],
                'image' => $_POST['image']
            ];

            $this->model->editAirport($airport);

            // Redirigir a la página correspondiente después de editar el aeropuerto
            header("Location: " . BASE_URL . "airport");
            exit;
        } else {
            header("Location: " . BASE_URL . "airport");
            exit;
        }
    }


    public function deleteAirport($id)
    {
        $logged = AuthHelper::checkLoggedIn();
        $this->model->deleteAirportById($id);
        header("Location: " . BASE_URL . "airport");
        exit;
    }

    public function addAirport()
    {
        $logged = AuthHelper::checkLoggedIn();
        if ($logged) {
            if (isset($_POST['name'], $_POST['ubication'], $_POST['image'])) {
                $id_airport = '';
                $name = $_POST['name'];
                $ubication = $_POST['ubication'];
                $image = $_POST['image'];

                $id = $this->model->insertAirport($id_airport, $name, $ubication, $image);

                header("Location: " . BASE_URL . "airport");
                exit;
            } else {
                // Datos de aeropuerto incompletos, redirigir a la página de error o mostrar un mensaje de error
                header("Location: " . BASE_URL . "error");
                exit;
            }
        } else {
            header("Location: " . BASE_URL . "login");
        }
    }
}
