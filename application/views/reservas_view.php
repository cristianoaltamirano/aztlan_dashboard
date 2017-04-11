<?php
/**
 * Created by PhpStorm.
 * User: calta
 * Date: 28/3/2017
 * Time: 02:16
 */

?>

<!DOCTYPE html>
<html>

<head>

    <?php $this->load->view("includes/header"); ?>

    <style>
        table {
            border: 0;
            padding: 0;
            margin: 0 0 20px 0;
            border-collapse: collapse;
        }

        th {
            padding: 5px;
            /* NOTE: th padding must be set explicitly in order to support IE */
            text-align: right;
            font-weight: bold;
            line-height: 2em;
            color: #FFF;
            background-color: #555;
        }

        tbody td {
            padding: 10px;
            line-height: 18px;
            border-top: 1px solid #E0E0E0;
        }

        tbody tr:nth-child(2n) {
            background-color: #F7F7F7;
        }

        tbody tr:hover {
            background-color: #EEEEEE;
        }

        td {
            text-align: right;
        }

        td:first-child, th:first-child {
            text-align: left;
        }
    </style>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-closed">
<div class="page-wrapper">

    <?php $this->load->view("includes/nav"); ?>
    <div class="page-container">

        <?php $this->load->view("includes/sidebar"); ?>

        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-dark sbold uppercase">Reservas</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
                                    echo form_open("search", $attr); ?>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input class="form-control" id="reserva_search" name="reserva_search"
                                                   placeholder="Buscar" type="text"
                                                   value="<?php echo set_value('reserva_search'); ?>"/>
                                        </div>

                                        <div class="col-md-6">
                                            <input id="btn_search" name="btn_search" type="submit"
                                                   class="btn btn-default dark"
                                                   value="Buscar"/>
                                            <a href="<?php echo base_url(); ?>"
                                               class="btn btn-default blue">Mostrar Todo</i></a>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 bg-border">
                                    <div class="table-responsive" style="max-height: 500px;">
                                        <table id="table-reservas"
                                               class="table table-fixed table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">Reserva</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Tipo Evento</th>
                                                <th scope="col">Fuente</th>
                                                <th scope="col">Owner</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Situación</th>
                                                <th scope="col">Motivo</th>
                                                <th scope="col">Teléfono</th>
                                                <th scope="col">DNI</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Facebook</th>
                                                <th scope="col">Link</th>
                                                <th scope="col">Día</th>
                                                <th scope="col">Horario</th>
                                                <th scope="col">Quien</th>
                                                <th scope="col">Consulta</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php for ($i = 0; $i < count($reservaslist); ++$i) {
                                                $colorRow = '';
                                                switch ($reservaslist[$i]->situacion) {
                                                    case 'Confirmó':
                                                        $colorRow = '';
                                                        break;
                                                    case 'Envíe Whats app':
                                                        $colorRow = '#ffb7b5';
                                                        break;
                                                    case 'Rellamar':
                                                        $colorRow = '#c1ccff';
                                                        break;
                                                    case 'Entrevista':
                                                        $colorRow = '';
                                                        break;
                                                    case 'Dudas':
                                                        $colorRow = '';
                                                        break;
                                                    case 'Enviar mail':
                                                        $colorRow = '';
                                                        break;
                                                    case 'Canceló - reprogramar':
                                                        $colorRow = '';
                                                        break;
                                                    case 'Mal el número':
                                                        $colorRow = '';
                                                        break;
                                                    case 'Se anotó':
                                                        $colorRow = '#62ff5b';
                                                        break;
                                                    case 'Vino, no se anotó':
                                                        $colorRow = '';
                                                        break;
                                                    case 'No le interesa':
                                                        $colorRow = '';
                                                        break;
                                                    case 'No llamar':
                                                        $colorRow = '';
                                                        break;
                                                    case 'Rechazado':
                                                        $colorRow = '#d7b3da';
                                                        break;
                                                    case 'En espera':
                                                        $colorRow = '#faff57';
                                                        break;
                                                    case 'Aprobado':
                                                        $colorRow = '#ffb7b5';
                                                        break;
                                                }
                                                ?>
                                                <tr <?php if ($colorRow != '') {
                                                    echo 'style="background-color:' . $colorRow . ';"';
                                                } ?> >
                                                    <td><?php echo $reservaslist[$i]->idReserva; ?></td>
                                                    <td style="min-width: 135px;"><?php echo $reservaslist[$i]->fecha; ?></td>
                                                    <td><?php echo $dashboard_model->getTipoEvento($reservaslist[$i]->tipoEvento_idTipo); ?></td>
                                                    <td><?php echo $dashboard_model->getSource($reservaslist[$i]->source); ?></td>
                                                    <td><?php echo $dashboard_model->getOwner($reservaslist[$i]->owners_idOwner); ?></td>

                                                    <td><a href="javascript:;" class="nombre" data-name='nombre'
                                                           data-type="text"
                                                           data-pk="<?php echo $reservaslist[$i]->idReserva; ?>"
                                                           data-original-title="Enter nombre"> <?php echo $reservaslist[$i]->nombre; ?></a>
                                                    </td>
                                                    <td><a href="javascript:;" class="apellido" data-name='apellido'
                                                           data-type="text"
                                                           data-pk="<?php echo $reservaslist[$i]->idReserva; ?>"
                                                           data-original-title="Enter apellido"> <?php echo $reservaslist[$i]->apellido; ?></a>
                                                    </td>
                                                    <td><a href="javascript:;" class="situacion" data-name='situacion'
                                                           data-type="select"
                                                           data-pk="<?php echo $reservaslist[$i]->idReserva; ?>"
                                                           data-original-title="Enter situacion"> <?php if ($reservaslist[$i]->situacion == null) {
                                                                echo 'Vacío';
                                                            } else {
                                                                echo $reservaslist[$i]->situacion;
                                                            }; ?></a>
                                                    </td>
                                                    <td><a href="javascript:;" class="motivo" data-name='motivo'
                                                           data-type="text"
                                                           data-pk="<?php echo $reservaslist[$i]->idReserva; ?>"
                                                           data-original-title="Enter motivo"> <?php if ($reservaslist[$i]->motivo == null) {
                                                                echo 'Vacío';
                                                            } else {
                                                                echo $reservaslist[$i]->motivo;
                                                            }; ?></a>
                                                    </td>
                                                    <td><a href="javascript:;" class="telefono" data-name='telefono'
                                                           data-type="text"
                                                           data-pk="<?php echo $reservaslist[$i]->idReserva; ?>"
                                                           data-original-title="Enter teléfono"> <?php if ($reservaslist[$i]->telefono == null) {
                                                                echo 'Vacío';
                                                            } else {
                                                                echo $reservaslist[$i]->telefono;
                                                            }; ?></a>
                                                    </td>
                                                    <td><a href="javascript:;" class="dni" data-name='dni'
                                                           data-type="text"
                                                           data-pk="<?php echo $reservaslist[$i]->idReserva; ?>"
                                                           data-original-title="Enter dni"> <?php if ($reservaslist[$i]->dni == null) {
                                                                echo 'Vacío';
                                                            } else {
                                                                echo $reservaslist[$i]->dni;
                                                            }; ?></a>
                                                    </td>
                                                    <td><a href="javascript:;" class="email" data-name='email'
                                                           data-type="text"
                                                           data-pk="<?php echo $reservaslist[$i]->idReserva; ?>"
                                                           data-original-title="Enter email"> <?php if ($reservaslist[$i]->email == null) {
                                                                echo 'Vacío';
                                                            } else {
                                                                echo $reservaslist[$i]->email;
                                                            }; ?></a>
                                                    </td>
                                                    <td><a href="javascript:;" class="facebook" data-name='facebook'
                                                           data-type="text"
                                                           data-pk="<?php echo $reservaslist[$i]->idReserva; ?>"
                                                           data-original-title="Enter facebook"> <?php if ($reservaslist[$i]->facebook == null) {
                                                                echo 'Vacío';
                                                            } else {
                                                                echo $reservaslist[$i]->facebook;
                                                            }; ?></a>
                                                    </td>
                                                    <td><a href="javascript:;" class="linkfacebook"
                                                           data-name='linkfacebook'
                                                           data-type="text"
                                                           data-pk="<?php echo $reservaslist[$i]->idReserva; ?>"
                                                           data-original-title="Enter linkfacebook"> <?php if ($reservaslist[$i]->linkfacebook == null) {
                                                                echo 'Vacío';
                                                            } else {
                                                                echo $reservaslist[$i]->linkfacebook;
                                                            }; ?></a>
                                                    </td>
                                                    <td><?php echo $reservaslist[$i]->fechaStr; ?></td>
                                                    <td><?php echo $reservaslist[$i]->horario; ?></td>
                                                    <td><a href="javascript:;" class="quien" data-name='quien'
                                                           data-type="text"
                                                           data-pk="<?php echo $reservaslist[$i]->idReserva; ?>"
                                                           data-original-title="Enter quien"> <?php if ($reservaslist[$i]->quien == null) {
                                                                echo 'Vacío';
                                                            } else {
                                                                echo $reservaslist[$i]->quien;
                                                            }; ?></a>
                                                    </td>
                                                    <td><a href="javascript:;" class="consulta" data-name='consulta'
                                                           data-type="text"
                                                           data-pk="<?php echo $reservaslist[$i]->idReserva; ?>"
                                                           data-original-title="Enter consulta"> <?php if ($reservaslist[$i]->consulta == null) {
                                                                echo 'Vacío';
                                                            } else {
                                                                echo $reservaslist[$i]->consulta;
                                                            }; ?></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
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
        </div>
    </div>
</div>

<?php $this->load->view("includes/footer"); ?>


</body>
</html>

