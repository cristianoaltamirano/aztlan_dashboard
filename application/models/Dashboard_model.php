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

    public function set_reserva()
    {
        $idUsuario = $this->searchUsuario($this->input->post('pk'));

        $data = array(
            $this->input->post('name') => $this->input->post('value')
        );
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('usuarios', $data);

        echo '0';
    }

    public function searchUsuario($idReserva)
    {
        $query = $this->db->query('
        SELECT reservas.usuarios_idUsuario 
        FROM reservas
        WHERE reservas.idReserva = ?
        ', array($idReserva));

        return $query->result()[0]->usuarios_idUsuario;
    }

    public function getTipoEvento($idEventoTipo)
    {
        $query = $this->db->query('
        SELECT * 
        FROM tipos_evento
        WHERE tipos_evento.idTipo = ?
        ', array($idEventoTipo));

        if(isset($query->result()[0]->nombre)){
            return $query->result()[0]->nombre;
        }else{
            return '';
        }
    }

    public function getSource($idSource)
    {
        $query = $this->db->query('
        SELECT * 
        FROM fuentes
        WHERE fuentes.idFuente = ?
        ', array($idSource));

        if(isset($query->result()[0]->nombre)){
            return $query->result()[0]->nombre;
        }else{
            return '';
        }
    }

    public function getOwner($idOwner)
    {
        $query = $this->db->query('
        SELECT * 
        FROM owners
        WHERE owners.idOwner = ?
        ', array($idOwner));

        if(isset($query->result()[0]->nombre)){
            return $query->result()[0]->nombre;
        }else{
            return '';
        }
    }

    public function get_reservas($limit, $start, $st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = '
        SELECT SQL_NO_CACHE r.idReserva,r.fecha,r.source,r.owners_idOwner,u.nombre,u.apellido,u.motivo, u.dni,u.email,u.telefono,u.facebook,u.linkfacebook, u.situacion, u.quien, u.consulta, e.titulo, e.tipoEvento_idTipo, e.horario, e.fechaStr
        FROM reservas r
        JOIN usuarios u
        ON usuarios_idUsuario=idUsuario
        JOIN eventos e
        ON eventos_idEvento=idEvento
        WHERE u.nombre LIKE "%' . $st . '%"
        OR u.apellido LIKE "%' . $st . '%"
        OR u.dni LIKE "%' . $st . '%"
        OR u.email LIKE "%' . $st . '%"
        OR u.telefono LIKE "%' . $st . '%"
        OR u.facebook LIKE "%' . $st . '%"
        OR r.fecha LIKE "%' . $st . '%"
        OR r.owners_idOwner LIKE "%' . $st . '%"
        OR e.titulo LIKE "%' . $st . '%"
        ORDER BY r.idReserva DESC
        LIMIT ' . $start . ', ' . $limit;
        $this->db->cache_delete_all();
        $query = $this->db->query($sql);
        $this->db->flush_cache();
        return $query->result();
    }

    public function get_reservas_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = '
        SELECT SQL_NO_CACHE r.idReserva,r.fecha,r.source,r.owners_idOwner,u.nombre,u.apellido,u.motivo,u.dni,u.email,u.telefono,u.facebook,u.linkfacebook, u.situacion, u.quien, u.consulta, e.titulo, e.tipoEvento_idTipo, e.horario, e.fechaStr
        FROM reservas r
        JOIN usuarios u
        ON usuarios_idUsuario=idUsuario
        JOIN eventos e
        ON eventos_idEvento=idEvento
        WHERE u.nombre LIKE "%' . $st . '%"
        OR u.apellido LIKE "%' . $st . '%"
        OR u.dni LIKE "%' . $st . '%"
        OR u.email LIKE "%' . $st . '%"
        OR u.telefono LIKE "%' . $st . '%"
        OR u.facebook LIKE "%' . $st . '%"
        OR r.fecha LIKE "%' . $st . '%"
        OR r.owners_idOwner LIKE "%' . $st . '%"
        OR e.titulo LIKE "%' . $st . '%" 
        ORDER BY r.idReserva DESC';
        $this->db->cache_delete_all();
        $query = $this->db->query($sql);
        $this->db->flush_cache();
        return $query->num_rows();
    }
}