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

    public function get_reservas(){
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

    //fetch books
    function get_books($limit, $start, $st = NULL)
    {
        if ($st == "NIL") $st = "";
        //$sql = "select * from tbl_books where name like '%$st%' limit " . $start . ", " . $limit;
        $sql = '
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
        LIMIT ' . $start. ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_books_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        //$sql = "select * from tbl_books where name like '%$st%'";
        $sql = '
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
        WHERE * LIKE "%$st%"';
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}