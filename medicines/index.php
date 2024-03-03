<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/functions.php';?>
<?get_header()?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Препараты</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Производитель</th>
                            <th>Годен до</th>
                            <th>Количество</th>
                            <th>Категория</th>
                            <!-- <th></th> -->
                        </tr>
                    </thead>
                    <tbody data-table="medicines" id="tableRender">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?get_footer()?>