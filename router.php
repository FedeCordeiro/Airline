<?php

require_once './app/controllers/flight.controller.php';
require_once './app/controllers/airport.controller.php';
require_once './app/controllers/user.controller.php';

// Instancias de las clases
$airportController = new AirportController();
$flightController = new FlightController();
$userController = new UserController();

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'login'; // Acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

// Tabla de ruteo
switch ($params[0]) {
    case 'home':
        $airportController->showAirportHome();
        break;
    case 'flight':
        $flightController->showFlight();
        break;
    case 'flightDetail':
        if (isset($params[1])) {
            $flightController->prepareEditFlight($params[1]);
        }
        break;
    case 'editFlight':
        $flightController->editFlight($_POST);
        header("Location: " . BASE_URL . "flight");
        exit;
    case 'deleteFlight':
        $id = $params[1];
        $flightController->deleteFlight($id);
        exit;
    case 'addFlight':
        $flightView = new FlightView();
        $flightView->renderAddFlight();
        break;
    case 'processAddFlight':
        $flightController->addFlight();
        header("Location: " . BASE_URL . "flight");
        exit;
    case 'airport':
        $airportController->showAirport();
        break;
    case 'airportdetail':
        if (isset($params[1])) {
            $airportController->showAirportId($params[1]);
        }
        break;
    case 'editAirport':
        $airportController->editAirport($_POST);
        header("Location: " . BASE_URL . "airport");
        exit;
    case 'deleteAirport':
        $id = $params[1];
        $airportController->deleteAirport($id);
        exit;
    case 'addAirport':
        $airportView = new AirportView();
        $airportView->renderAddAirport();
        break;
    case 'processAddAirport':
        $airportController->addAirport();
        header("Location: " . BASE_URL . "airport");
        exit;
    case 'flightByAirport':
        $airportController->showAirportSearch();
        break;
    case 'searchByAirport':
        $flightController->searchByAirport();
        break;
    case 'login':
        $userController->showLogin();
        break;
    case 'verifyLogin':
        $userController->verify();
        break;
    case 'verifyRegister':
        $userController->register();
        break;
    case 'logout':
        $userController->logout();
        break;
    default:
        require("templates/error404.tpl");
        break;
}
