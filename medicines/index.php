<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/functions.php';?>
<?get_header()?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Препараты</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <button class="btn btn-success add" type="button" data-toggle="modal" data-target="#addNewElement">Добавить препарат</button>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Производитель</th>
                            <th>Годен до</th>
                            <th>Количество</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody data-table="medicines" id="tableRender">
                        <?php
                        $currentTable = 'medicines';
                        $table = '';
                        $data = getDataTable($currentTable);
                        
                        foreach ($data as $items) {
                            $table .= '<tr data-element-id="' . $items['medicine_id'] . '">';
                            $table .= '<td>' . $items['name'] . '</td>';
                            $table .= '<td>' . $items['price'] . '</td>';
                            $table .= '<td>' . $items['manufacturer'] . '</td>';
                            $table .= '<td>' . $items['expiration_date'] . '</td>';
                            $table .= '<td>' . $items['quantity'] . '</td>';
                            $table .= '<td class="control_buttons">';
                            $table .= '<a href="#" class="btn btn-info btn-circle btn-sm edit" data-element-id="' . $items['medicine_id'] . '"><i class="fas fa-pencil-alt"></i></a>';
                            $table .= '<a href="#" class="btn btn-danger btn-circle btn-sm delete" data-element-id="' . $items['medicine_id'] . '"><i class="fas fa-trash"></i></a>';
                            $table .= '</td>';
                            $table .= '</tr>';
                        }
                        echo $table;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addNewElement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form  method="POST" id="AddForm" data-table-name="medicines">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить препарат</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name_input">Название препарата</label>
                            <input type="text" class="form-control text" id="name_input" name="name_input" placeholder="Введите название препарата">
                        </div>
                        <div class="form-group">
                            <label for="manufacturer_input">Производитель</label>
                            <input type="text" class="form-control text" id="manufacturer_input"  name="manufacturer_input" placeholder="Введите Производителя препарата">
                        </div>
                        <div class="form-group">
                            <label for="price_input">Цена</label>
                            <input type="text" class="form-control text" id="price_input"  name="price_input" placeholder="Введите цену препарата">
                        </div>
                        <div class="form-group">
                            <label for="expiration_date_input" class="form-label">Годен до:</label>
                            <input type="date" class="form-control" id="expiration_date_input" name="expiration_date_input">
                        </div>
                        <div class="form-group">
                           <label for="categories_input" class="form-label">Категория:</label>
                            <select class="form-select form-control" id="categories_input" name="categories_input">
                                <? 
                                $data = getDataTable('categories');
                                foreach ($data as $items) {
                                    echo '<option value="'.$items["category_id"].'">'.$items["name"].'</option>';
                                }
                                ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity_input" class="form-label">Количество:</label>
                            <input type="text" class="form-control text" id="quantity_input"  name="quantity_input" placeholder="Введите количество товара">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-success" href="/login.html">Добавить</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?get_footer()?>