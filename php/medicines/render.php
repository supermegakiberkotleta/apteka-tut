<?php require_once  $_SERVER['DOCUMENT_ROOT'] . '/functions.php';?>
<?php

$currentTable = $_POST['currentTable'];
$table = '';
$data = getDataTable($currentTable);

foreach ($data as $items) {
    $table .= '<tr data-element-id="' . $items['medicine_id'] . '">';
    $table .= '<td>' . $items['name'] . '</td>';
    $table .= '<td>' . $items['price'] . '</td>';
    $table .= '<td>' . $items['manufacturer'] . '</td>';
    $table .= '<td>' . $items['expiration_date'] . '</td>';
    $table .= '<td>' . $items['quantity'] . '</td>';
    $table .= '<td>' . getNameById('categories', $items['category_id'], 'category_id') . '</td>';
    $table .= '<td class="control_buttons">';
    $table .= '<a href="#" class="btn btn-info btn-circle btn-sm edit" data-element-id="' . $items['medicine_id'] . '"><i class="fas fa-pencil-alt"></i></a>';
    $table .= '<a href="#" class="btn btn-danger btn-circle btn-sm delete" data-element-id="' . $items['medicine_id'] . '"><i class="fas fa-trash"></i></a>';
    $table .= '</td>';
    $table .= '</tr>';
}
echo $table;