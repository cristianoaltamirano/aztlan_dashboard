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
                <div class="container-fluid" id="cont-home">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject font-dark sbold uppercase">Reservas</span>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <table id="table-pagination" data-toggle="table"
                                           data-url="<?php echo base_url(); ?>getReservas"
                                           data-height="600"
                                           data-pagination="true"
                                           data-search="true"
                                           data-refresh="true"
                                           data-id-field="idReserva"
                                           data-editable-emptytext="Vacío"
                                           data-show-refresh="true"
                                           data-show-toggle="true"
                                           data-show-columns="true"
                                           data-editable-url="<?php echo base_url(); ?>setReserva">
                                        <thead>
                                        <tr>

                                            <th data-field="fecha" data-align="right" data-sortable="true">Fecha</th>
                                            <th data-field="idReserva" data-align="right" data-sortable="true">Nro</th>
                                            <th data-field="nombre" data-align="right" data-sortable="true" data-editable="true">Nombre</th>
                                            <th data-field="apellido" data-align="right" data-sortable="true" data-editable="true">Apellido
                                            </th>
                                            <th data-field="situacion" data-align="right" data-sortable="true" data-editable="true">Situación
                                            </th>
                                            <th data-field="telefono" data-align="right" data-sortable="true" data-editable="true">Teléfono
                                            </th>
                                            <th data-field="dni" data-align="right" data-sortable="true" data-editable="true">Dni</th>
                                            <th data-field="email" data-align="right" data-sortable="true" data-editable="true">Mail</th>
                                            <th data-field="facebook" data-align="right" data-sortable="true" data-editable="true">Facebook
                                            </th>
                                            <th data-field="linkfacebook" data-align="right" data-sortable="true" data-editable="true">Link</th>
                                            <th data-field="ok" data-align="right" data-sortable="true" data-editable="true">OK</th>
                                            <th data-field="tipo" data-align="right" data-sortable="true">Tipo</th>
                                            <th data-field="interes" data-align="right" data-sortable="true" data-editable="true">Interés
                                            </th>
                                            <th data-field="fechaStr" data-align="right" data-sortable="true" >Día</th>
                                            <th data-field="horario" data-align="right" data-sortable="true" data-editable="true">Hs</th>
                                            <th data-field="quien" data-align="right" data-sortable="true" data-editable="true">Quien</th>
                                            <th data-field="source" data-align="right" data-sortable="true" data-editable="true">Fuente</th>
                                            <th data-field="hora" data-align="right" data-sortable="true" data-editable="true">Hora</th>
                                            <th data-field="consulta" data-align="right" data-sortable="true" data-editable="true">Consulta
                                            </th>

                                        </tr>
                                        </thead>
                                    </table>
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
