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
    }

    public function set_reserva(){
        $idUsuario = $this->searchUsuario($this->input->post('pk'));

        $data = array(
            $this->input->post('name') => $this->input->post('value')
        );
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuarios', $data);

        echo '0';
    }

    public function searchUsuario($idReserva){
        $query = $this->db->query('
        SELECT reservas.usuarios_idUsuario 
        FROM reservas
        WHERE reservas.idReserva = ?
        ',array($idReserva));

        return $query->result()[0]->usuarios_idUsuario;
    }

    public function getTipoEvento($idEventoTipo){
        $query = $this->db->query('
        SELECT * 
        FROM tipos_evento
        WHERE tipos_evento.idTipo = ?
        ',array($idEventoTipo));

        return $query->result()[0]->nombre;
    }

    public function get_reservas($limit, $start, $st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = '
        SELECT * FROM reservas
        JOIN usuarios
        ON usuarios_idUsuario=idUsuario
        JOIN eventos
        ON eventos_idEvento=idEvento
        WHERE usuarios.nombre LIKE "%' . $st . '%"
        OR usuarios.apellido LIKE "%' . $st . '%"
        OR usuarios.dni LIKE "%' . $st . '%"
        OR usuarios.email LIKE "%' . $st . '%"
        OR usuarios.telefono LIKE "%' . $st . '%"
        OR usuarios.facebook LIKE "%' . $st . '%"
        OR reservas.fecha LIKE "%' . $st . '%"
        OR reservas.owners_idOwner LIKE "%' . $st . '%"
        OR eventos.titulo LIKE "%' . $st . '%"
        ORDER BY reservas.fecha DESC
        LIMIT ' . $start. ', ' . $limit;
        $this->db->cache_delete_all();
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_reservas_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = '
        SELECT * FROM reservas
        JOIN usuarios
        ON usuarios_idUsuario=idUsuario
        JOIN eventos
        ON eventos_idEvento=idEvento
        WHERE usuarios.nombre LIKE "%' . $st . '%"
        OR usuarios.apellido LIKE "%' . $st . '%"
        OR usuarios.dni LIKE "%' . $st . '%"
        OR usuarios.email LIKE "%' . $st . '%"
        OR usuarios.telefono LIKE "%' . $st . '%"
        OR usuarios.facebook LIKE "%' . $st . '%"
        OR reservas.fecha LIKE "%' . $st . '%"
        OR reservas.owners_idOwner LIKE "%' . $st . '%"
        OR eventos.titulo LIKE "%' . $st . '%" 
        ORDER BY reservas.fecha DESC';
        $this->db->cache_delete_all();
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}