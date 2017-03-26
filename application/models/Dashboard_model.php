<?php

/**
 * Created by PhpStorm.
 * User: calta
 * Date: 23/3/2017
 * Time: 01:55
 */
class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        ini_set('memory_limit', "256M");
    }

    public function get_reservas(){
        $query = $this->db->query('
        SELECT * 
        FROM reservas
        JOIN usuarios
        ON usuarios_idUsuario=idUsuario
        JOIN eventos
        ON eventos_idEvento=idEvento
        ');

       /* $this->db->select('*');
        $this->db->from('reservas');
        $this->db->join('usuarios', 'reservas.usuarios_idUsuario = usuarios.idUsuario');
        $this->db->join('eventos', 'reservas.eventos_idEvento = eventos.idEvento');
        $query = $this->db->get();*/

        // Return the result object
        return $query->result();
    }
}