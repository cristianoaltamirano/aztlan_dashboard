<?php
/**
 * Created by PhpStorm.
 * User: calta
 * Date: 28/3/2017
 * Time: 02:16
 */

?>

<?php
/**
 * Created by PhpStorm.
 * User: calta
 * Date: 9/3/2017
 * Time: 14:29
 */

?>

<!DOCTYPE html>
<html>

<head>

    <?php $this->load->view("includes/header"); ?>

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-closed">
<div class="page-wrapper">

    <?php $this->load->view("includes/nav"); ?>
    <div class="page-container">

        <?php $this->load->view("includes/sidebar"); ?>

        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 well">
                            <?php
                            $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
                            echo form_open("Dashboard_controller/search", $attr);?>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input class="form-control" id="book_name" name="book_name" placeholder="Search for Book Name..." type="text" value="<?php echo set_value('book_name'); ?>" />
                                </div>
                                <div class="col-md-6">
                                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                                    <a href="<?php echo base_url(). "index.php/Dashboard_controller/reservas"; ?>" class="btn btn-primary">Show All</a>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 bg-border">
                            <table id="table-reservas" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" >Reserva</th>
                                    <th scope="col" >Fecha</th>
                                    <th scope="col" >Nombre</th>
                                    <th scope="col" >Apellido</th>
                                    <th scope="col" >Situación</th>
                                    <th scope="col" >Teléfono</th>
                                    <th scope="col" >DNI</th>
                                    <th scope="col" >Email</th>
                                    <th scope="col" >Facebook</th>
                                    <th scope="col" >Link</th>
                                    <th scope="col" >Ok</th>
                                    <th scope="col" >Tipo</th>
                                    <th scope="col" >Interes</th>
                                    <th scope="col" >Día</th>
                                    <th scope="col" >Horario</th>
                                    <th scope="col" >Quien</th>
                                    <th scope="col" >Fuente</th>
                                    <th scope="col" >Hora</th>
                                    <th scope="col" >Consulta</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for ($i = 0; $i < count($booklist); ++$i) { ?>
                                    <tr>
                                        <td><?php echo $booklist[$i]->idReserva; ?></td>
                                        <td><?php echo $booklist[$i]->fecha; ?></td>
                                        <td><a href="javascript:;" class="nombre" data-name='nombre' data-type="text" data-pk="<?php echo $booklist[$i]->idReserva; ?>" data-original-title="Enter nombre"> <?php echo $booklist[$i]->nombre; ?></a></td>
                                        <td><a href="javascript:;" class="apellido" data-name='apellido' data-type="text" data-pk="<?php echo $booklist[$i]->idReserva; ?>" data-original-title="Enter apellido"> <?php echo $booklist[$i]->apellido; ?></a></td>
                                        <td><a href="javascript:;" class="situacion" data-name='situacion' data-type="text" data-pk="<?php echo $booklist[$i]->idReserva; ?>" data-original-title="Enter situacion"> <?php echo $booklist[$i]->situacion; ?></a></td>
                                        <td><?php echo $booklist[$i]->telefono; ?></td>
                                        <td><?php echo $booklist[$i]->dni; ?></td>
                                        <td><?php echo $booklist[$i]->email; ?></td>
                                        <td><?php echo $booklist[$i]->facebook; ?></td>
                                        <td><?php echo $booklist[$i]->linkfacebook; ?></td>
                                        <td><?php echo $booklist[$i]->ok; ?></td>
                                        <td><?php echo $booklist[$i]->tipo; ?></td>
                                        <td><?php echo $booklist[$i]->interes; ?></td>
                                        <td><?php echo $booklist[$i]->fechaStr; ?></td>
                                        <td><?php echo $booklist[$i]->horario; ?></td>
                                        <td><?php echo $booklist[$i]->quien; ?></td>
                                        <td><?php echo $booklist[$i]->source; ?></td>
                                        <td><?php echo $booklist[$i]->hora; ?></td>
                                        <td><?php echo $booklist[$i]->consulta; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("includes/footer"); ?>

</body>
</html>

