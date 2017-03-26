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
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
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

                                <div class="portlet-body">
                                    <table id="table-pagination" data-toggle="table"
                                           data-url="<?php echo base_url(); ?>getReservas" data-height="600"
                                           data-pagination="true" data-search="true">
                                        <thead>
                                        <tr>
                                            <!--<th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id" data-align="right" data-sortable="true">Item ID</th>
                                            <th data-field="name" data-align="center" data-sortable="true">Item Name</th>
                                            <th data-field="price" data-sortable="true" data-sorter="priceSorter">Item Price</th>-->

                                            <th data-field="fecha" data-align="right" data-sortable="true">Fecha</th>
                                            <th data-field="idReserva" data-align="right" data-sortable="true">Nro</th>
                                            <th data-field="nombre" data-align="right" data-sortable="true">

                                            </th>
                                            <th data-field="apellido" data-align="right" data-sortable="true">Apellido
                                            </th>
                                            <th data-field="situacion" data-align="right" data-sortable="true">Situación
                                            </th>
                                            <th data-field="telefono" data-align="right" data-sortable="true">Teléfono
                                            </th>
                                            <th data-field="dni" data-align="right" data-sortable="true">Dni</th>
                                            <th data-field="mail" data-align="right" data-sortable="true">Mail</th>
                                            <th data-field="facebook" data-align="right" data-sortable="true">Facebook
                                            </th>
                                            <th data-field="link" data-align="right" data-sortable="true">Link</th>
                                            <th data-field="ok" data-align="right" data-sortable="true">OK</th>
                                            <th data-field="tipo" data-align="right" data-sortable="true">Tipo</th>
                                            <th data-field="interes" data-align="right" data-sortable="true">Interés
                                            </th>
                                            <th data-field="dia" data-align="right" data-sortable="true">Día</th>
                                            <th data-field="hs" data-align="right" data-sortable="true">Hs</th>
                                            <th data-field="quien" data-align="right" data-sortable="true">Quien</th>
                                            <th data-field="fuente" data-align="right" data-sortable="true">Fuente</th>
                                            <th data-field="hora" data-align="right" data-sortable="true">Hora</th>
                                            <th data-field="consulta" data-align="right" data-sortable="true">Consulta
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
