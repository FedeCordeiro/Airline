<?php
require_once './libs/Smarty/Smarty.class.php';

class AirportView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showAirportHome($airport, $username) {
        $this->smarty->assign('airport', $airport);
        $this->smarty->assign('username', $username);
        $this->smarty->display('home.tpl'); 
    }

    function showAirport($airport, $logged)
    {
        $this->smarty->assign('airport', $airport);
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('listAirport.tpl');
    }

    function showAirportSearch($airport) {
        $this->smarty->assign('airport', $airport);
        $this->smarty->display('searchByAirport.tpl');
    }

    function showAirportId($airport, $logged) {
        $this->smarty->assign('airport', $airport);
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('detailsAirport.tpl');
    }
    
    function showEditAirport($airport) {
        $this->smarty->assign('airport', $airport);
        $this->smarty->display('detailsAirport.tpl');
    }

    function renderAddAirport() {
        require_once("templates/header.tpl");
        require_once("templates/addAirport.tpl");
    }
}