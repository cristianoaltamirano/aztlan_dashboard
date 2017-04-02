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
        //ini_set('memory_limit', "-1");
    }

    /*public function get_reservas(){
        $query = $this->db->query('
        SELECT reservas.fecha, 
               reservas.idReserva,
               usuarios.nombre,
               usuarios.apellido,
               usuarios.situacion,
               usuarios.telefono,
               usuarios.dni,
               usuarios.email,
               usuarios.facebook,
               usuarios.linkfacebook,
               usuarios.ok,
               usuarios.tipo,
               usuarios.interes,
               eventos.fechaStr,
               eventos.horario,
               usuarios.quien,
               reservas.source,
               usuarios.hora,
               usuarios.consulta
        FROM reservas
        JOIN usuarios
        ON usuarios_idUsuario=idUsuario
        JOIN eventos
        ON eventos_idEvento=idEvento
        ORDER BY reservas.fecha DESC
        LIMIT 5000
        ');

        // Return the result object
        return $query->result();
    }*/

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


    function get_reservas($limit, $start, $st = NULL)
    {
        /*SELECT *
        FROM reservas
        JOIN usuarios
        ON usuarios_idUsuario=idUsuario
        JOIN eventos
        ON eventos_idEvento=idEvento
        WHERE nombre LIKE "%' . $st . '%"
        ORDER BY reservas.fecha DESC*/
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
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_reservas_count($st = NULL)
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
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}