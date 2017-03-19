<?php

/**
 * Created by PhpStorm.
 * User: calta
 * Date: 19/3/2017
 * Time: 04:12
 */
class Dashboard_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();

        $data["title"] = 'HOME';

        $this->load->view( 'home_view', $data );
    }
}