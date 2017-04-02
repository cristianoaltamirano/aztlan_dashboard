<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Load form helper library
        $this->load->helper('form');
        $this->load->helper('security');

        $this->load->model('Login_model');
    }

    public function index()
    {
        $this->load->view('login_view');
    }

    public function user_login_process()
    {
        $data = [];

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == false) {
            if (isset($this->session->userdata['logged_in'])) {
                redirect(base_url());
            } else {
                $this->load->view('login_view', $data);
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
        }
        $result = $this->Login_model->login($data);
        if ($result == TRUE) {

            $username = $this->input->post('username');
            $result = $this->Login_model->read_user_information($username);
            if ($result != false) {
                $session_data = array(
                    'username' => $result[0]->user
                );
                // Add user data in session
                $this->session->set_userdata('logged_in', $session_data);
                redirect(base_url());
            }
        } else {
            $data = array(
                'error_message' => 'Usuario o Password inválido.'
            );
            $this->load->view('login_view', $data);
        }

    }

    public function logout()
    {
        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('login_view', $data);
    }

}