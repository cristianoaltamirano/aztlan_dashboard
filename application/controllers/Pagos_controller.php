<?php

/**
 * Created by PhpStorm.
 * User: calta
 * Date: 6/4/2017
 * Time: 02:23
 */
class Pagos_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

    }

    function reportes()
    {
        $data = [];

        $this->load->view('pagoreportes_view', $data);
    }
}
