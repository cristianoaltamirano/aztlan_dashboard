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
<body>


<?php $this->load->view("includes/nav"); ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-social-dribbble font-green hide"></i>
                        <span class="caption-subject font-dark bold uppercase">Table Pagination</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-cloud-upload"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-wrench"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-trash"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <table id="table-pagination" data-toggle="table" data-url="../assets/global/plugins/bootstrap-table/data/data2.json" data-height="299" data-pagination="true" data-search="true">
                        <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="id" data-align="right" data-sortable="true">Item ID</th>
                            <th data-field="name" data-align="center" data-sortable="true">Item Name</th>
                            <th data-field="price" data-sortable="true" data-sorter="priceSorter">Item Price</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view("includes/footer"); ?>

</body>
</html>
