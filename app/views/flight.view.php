<?php
require_once './libs/Smarty/Smarty.class.php';

class FlightView
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty(); // Inicializa la instancia de Smarty
    }

    // Muestra la vista de todos los vuelos
    function showFlight($flights, $airportNameById, $logged)
    {
        $this->smarty->assign('flights', $flights); // Asigna los vuelos a la variable 'flights' en Smarty
        $this->smarty->assign('airportNameById', $airportNameById); // Asigna el arreglo de nombres de aeropuertos
        $this->smarty->assign('logged', $logged);
        $this->smarty->display("listFlight.tpl"); // Muestra la plantilla 'listFlight.tpl'
    }

    function prepareEditFlight($flightId, $airports, $airportNameById, $logged)
    {  
        $this->smarty->assign('airports', $airports);
        $this->smarty->assign('flightId', $flightId);
        $this->smarty->assign('airportNameById', $airportNameById);
        $this->smarty->assign('logged', $logged);
        $this->smarty->display("detailsFlight.tpl");
    }
    
    function renderAddFlight() {
        require_once("templates/header.tpl");
        require_once("templates/addFlight.tpl");
    }

    function RenderDetalle($flightByAirport,$airport){
        $this->smarty->assign('flight', $flightByAirport);
        $this->smarty->assign('airport', $airport);
        $this->smarty->display("detailSearch.tpl"); 
    }
}
