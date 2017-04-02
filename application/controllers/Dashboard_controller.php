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
        if ( !isLogged() ) {
            redirect( base_url() . 'login' );
        }
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('pagination');
        $this->load->model( "Dashboard_model" );
    }

    public function index()
    {
        reservas();
    }

    public function getReservas(){
        echo json_encode($this->Dashboard_model->get_reservas('10','1'));
    }

    public function setReserva(){
        $this->Dashboard_model->set_reserva();
    }

    public function reservas(){
        //pagination settings
        $config['base_url'] = site_url('Dashboard_controller/reservas');
        $config['total_rows'] = $this->db->count_all('reservas');
        $config['per_page'] = "100";
        $config['uri_segment'] = $this->uri->total_segments();
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = 10;

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['use_page_numbers'] = true;
        $config['first_link'] = "&lt;&lt; Primero";
        $config['last_link'] = "Último &gt;&gt;";
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['reservaslist'] = $this->Dashboard_model->get_reservas($config["per_page"], $data['page'], NULL);

        $data['pagination'] = $this->pagination->create_links();

        // load view

        $data["title"] = 'RESERVAS';

        $this->load->view( 'reservas_view', $data );
    }

    function search()
    {
        // get search string
        $search = ($this->input->post("reserva_search"))? $this->input->post("reserva_search") : "NIL";

        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
        $config = array();
        $config['base_url'] = site_url("Dashboard_controller/search/$search");
        $config['total_rows'] = $this->Dashboard_model->get_reservas_count($search);
        $config['per_page'] = "100";
        $config['uri_segment'] = $this->uri->total_segments();
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = 10;

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['reservaslist'] = $this->Dashboard_model->get_reservas($config['per_page'], $data['page'], $search);

        $data['pagination'] = $this->pagination->create_links();
        $data["title"] = 'SEARCH';
        //load view
        $this->load->view('reservas_view',$data);
    }
}